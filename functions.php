<?php
/**
 * Tinza Child Theme — functions.php
 *
 * @package MottaChild
 * @version 1.1.0
 */

defined( 'ABSPATH' ) || exit;


/* ============================================================
   1. CONSTANTS
   ============================================================ */
define( 'TINZA_URI', get_stylesheet_directory_uri() );
define( 'TINZA_DIR', get_stylesheet_directory() );

/**
 * Version d'asset — filemtime avec repli sur la version du thème
 * si le fichier est absent (évite un warning PHP en production).
 */
function tinza_asset_ver( $relative_path ) {
    $file = TINZA_DIR . $relative_path;
    return file_exists( $file )
        ? (string) filemtime( $file )
        : (string) wp_get_theme()->get( 'Version' );
}


/* ============================================================
   2. CACHE BUST AU DÉPLOIEMENT
   ------------------------------------------------------------
   La version est dérivée de la date de modification de ce
   fichier : uploader functions.php déclenche la purge une
   seule fois. Purge manuelle : /?tinza_bust=1 en admin.
   ============================================================ */
define( 'TINZA_CACHE_BUST_VERSION', (string) filemtime( __FILE__ ) );

add_action( 'init', 'tinza_maybe_bust_caches' );

function tinza_maybe_bust_caches() {

    $forced = isset( $_GET['tinza_bust'] ) && current_user_can( 'manage_options' );

    if ( ! $forced && get_option( 'tinza_cache_bust_version', '' ) === TINZA_CACHE_BUST_VERSION ) {
        return;
    }

    delete_transient( 'wc_products_onsale' );

    if ( class_exists( 'WC_Cache_Helper' ) ) {
        WC_Cache_Helper::get_transient_version( 'product', true );
    }

    tinza_recount_product_categories();

    wp_cache_flush();

    update_option( 'tinza_cache_bust_version', TINZA_CACHE_BUST_VERSION, false );
}

/**
 * Recompte les produits par catégorie, parents et enfants.
 *
 * Reprend l'appel de WooCommerce → État → Outils → « Recount terms » :
 * get_terms() en 'id=>parent' et _wc_term_recount() avec
 * $terms_are_term_taxonomy_ids = false.
 *
 * _wc_term_recount() agrège nativement les produits des
 * sous-catégories dans le compteur des catégories parentes pour
 * une taxonomie hiérarchique.
 */
function tinza_recount_product_categories() {

    if ( ! function_exists( '_wc_term_recount' ) ) {
        return;
    }

    $product_cats = get_terms( [
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'fields'     => 'id=>parent',
    ] );

    if ( is_wp_error( $product_cats ) || empty( $product_cats ) ) {
        return;
    }

    _wc_term_recount( $product_cats, get_taxonomy( 'product_cat' ), true, false );

    clean_term_cache( array_keys( $product_cats ), 'product_cat' );
}


/* ============================================================
   3. SYNC TABLE wp_wc_product_meta_lookup (produits Dokan)
   ------------------------------------------------------------
   Les produits créés via le dashboard vendeur Dokan n'ont pas
   leur ligne de lookup (min_price/max_price/onsale) synchronisée
   par WooCommerce → invisibles dans wc_get_product_ids_on_sale().

   Fix : resync à chaque sauvegarde produit + filet de sécurité
   horaire (cron). Couvre les produits simples ET variables.

   wc_delete_product_transients() vide aussi wc_var_prices_{ID},
   cache de la fourchette de prix des produits variables.
   ============================================================ */
function tinza_sync_product_lookup_row( $product_id ) {
    $product = wc_get_product( $product_id );
    if ( ! $product instanceof WC_Product ) {
        return false;
    }

    global $wpdb;

    if ( $product->is_type( 'simple' ) ) {
        $price  = $product->get_price( 'edit' );
        $price  = ( '' === $price || null === $price ) ? 0.0 : (float) $price;
        $min    = $price;
        $max    = $price;
        $onsale = $product->is_on_sale( 'edit' ) ? 1 : 0;

    } elseif ( $product->is_type( 'variable' ) ) {
        $prices      = [];
        $any_on_sale = false;

        foreach ( $product->get_children() as $child_id ) {
            $child = wc_get_product( $child_id );
            if ( ! $child instanceof WC_Product || ! $child->is_purchasable() ) {
                continue;
            }
            $cp = $child->get_price( 'edit' );
            if ( '' === $cp || null === $cp ) {
                continue;
            }
            $prices[] = (float) $cp;
            if ( $child->is_on_sale( 'edit' ) ) {
                $any_on_sale = true;
            }
        }

        if ( empty( $prices ) ) {
            return false; /* aucune variation exploitable — ne pas écraser avec des zéros */
        }

        $min    = min( $prices );
        $max    = max( $prices );
        $onsale = $any_on_sale ? 1 : 0;

    } else {
        delete_transient( 'wc_products_onsale' );
        return false;
    }

    $wpdb->query( $wpdb->prepare(
        "INSERT INTO {$wpdb->prefix}wc_product_meta_lookup (product_id, min_price, max_price, onsale)
         VALUES (%d, %f, %f, %d)
         ON DUPLICATE KEY UPDATE min_price = %f, max_price = %f, onsale = %d",
        $product_id, $min, $max, $onsale, $min, $max, $onsale
    ) );

    return true;
}

add_action( 'save_post_product', 'tinza_sync_lookup_on_save', 20, 3 );

function tinza_sync_lookup_on_save( $post_id, $post, $update ) {

    if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) ) {
        return;
    }

    tinza_sync_product_lookup_row( $post_id );
    wc_delete_product_transients( $post_id );

    $term_ids = wp_get_post_terms( $post_id, 'product_cat', [ 'fields' => 'ids' ] );

    if ( is_wp_error( $term_ids ) || empty( $term_ids ) ) {
        return;
    }

    /* Recompter le terme et tous ses ancêtres, sans modifier
       les assignations de catégorie du produit. */
    $to_recount = [];

    foreach ( $term_ids as $tid ) {
        $tid                = (int) $tid;
        $to_recount[ $tid ] = 0;

        $ancestors = get_ancestors( $tid, 'product_cat', 'taxonomy' );
        foreach ( $ancestors as $aid ) {
            $to_recount[ (int) $aid ] = 0;
        }
    }

    if ( function_exists( '_wc_term_recount' ) ) {
        _wc_term_recount( $to_recount, get_taxonomy( 'product_cat' ), true, false );
        clean_term_cache( array_keys( $to_recount ), 'product_cat' );
    }
}

/* Filet de sécurité — cron horaire */
add_action( 'tinza_lookup_table_safety_sync', 'tinza_run_lookup_safety_sync' );

add_action( 'init', function () {
    if ( ! wp_next_scheduled( 'tinza_lookup_table_safety_sync' ) ) {
        wp_schedule_event( time(), 'hourly', 'tinza_lookup_table_safety_sync' );
    }
} );

function tinza_run_lookup_safety_sync() {
    global $wpdb;

    $mismatched = $wpdb->get_col( "
        SELECT p.ID
        FROM {$wpdb->posts} p
        INNER JOIN {$wpdb->postmeta} price_meta
            ON price_meta.post_id = p.ID AND price_meta.meta_key = '_price'
        LEFT JOIN {$wpdb->prefix}wc_product_meta_lookup lookup
            ON lookup.product_id = p.ID
        WHERE p.post_type = 'product'
          AND p.post_status = 'publish'
          AND (
                lookup.product_id IS NULL
                OR ABS( lookup.min_price - CAST( price_meta.meta_value AS DECIMAL(10,2) ) ) > 0.01
          )
        LIMIT 50
    " );

    foreach ( $mismatched as $product_id ) {
        tinza_sync_product_lookup_row( (int) $product_id );
        wc_delete_product_transients( (int) $product_id );
    }
}

add_action( 'switch_theme', function () {
    wp_clear_scheduled_hook( 'tinza_lookup_table_safety_sync' );
} );


/* ============================================================
   4. THEME SETUP
   ============================================================ */
add_action( 'after_setup_theme', 'tinza_setup' );

function tinza_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'tinza-hero',        1440, 700, true );
    add_image_size( 'tinza-hero-mobile', 440,  560, true );
    add_image_size( 'tinza-card',        420,  420, true );
    add_image_size( 'tinza-product-lg',  800,  800, true );
    add_image_size( 'tinza-thumb',       80,   80,  true );

    register_nav_menus( [
        'primary'      => 'Menu Principal',
        'footer-col-1' => 'Footer — Get to Know Us',
        'footer-col-2' => 'Footer — Customer Service',
        'footer-col-3' => 'Footer — Orders & Returns',
        'footer-legal' => 'Footer — Legal',
    ] );
}


/* ============================================================
   5. BODY CLASS
   ============================================================ */
add_filter( 'body_class', 'tinza_body_classes' );

function tinza_body_classes( $classes ) {
    $classes[] = 'tinza-child';
    if ( is_front_page() ) {
        $classes[] = 'homepage';
    }
    return $classes;
}


/* ============================================================
   6. STYLES — Enqueue conditionnel
   ============================================================ */
add_action( 'wp_enqueue_scripts', 'tinza_styles' );

function tinza_styles() {

    /* ── Toutes les pages ────────────────────────────────── */
    wp_enqueue_style(
        'motta-parent',
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme( 'motta' )->get( 'Version' )
    );

    wp_enqueue_style( 'tinza-fonts',
        TINZA_URI . '/assets/css/fonts.css',
        [ 'motta-parent' ], tinza_asset_ver( '/assets/css/fonts.css' ) );

    wp_enqueue_style( 'tinza-vars',
        TINZA_URI . '/assets/css/variables.css',
        [ 'tinza-fonts' ], tinza_asset_ver( '/assets/css/variables.css' ) );

    wp_enqueue_style( 'tinza-header',
        TINZA_URI . '/assets/css/header.css',
        [ 'tinza-vars' ], tinza_asset_ver( '/assets/css/header.css' ) );

    wp_enqueue_style( 'tinza-footer',
        TINZA_URI . '/assets/css/footer.css',
        [ 'tinza-vars' ], tinza_asset_ver( '/assets/css/footer.css' ) );


    /* ── Home seulement ─────────────────────────────────── */
    if ( is_front_page() ) {

        $home_styles = [
            'tinza-base'          => [ 'base.css',           'tinza-vars' ],
            'tinza-typo'          => [ 'typography.css',     'tinza-base' ],
            'tinza-slider'        => [ 'slider.css',         'tinza-typo' ],
            'tinza-products-tabs' => [ 'products-tabs.css',  'tinza-typo' ],
            'tinza-products-grid' => [ 'products-grid.css',  'tinza-typo' ],
            'tinza-banner'        => [ 'banner.css',         'tinza-typo' ],
            'tinza-finish'        => [ 'shop-by-finish.css', 'tinza-typo' ],
            'tinza-promise'       => [ 'tinza-promise.css',  'tinza-typo' ],
            'tinza-faq'           => [ 'faq.css',            'tinza-typo' ],
            'tinza-newsletter'    => [ 'newsletter.css',     'tinza-typo' ],
        ];

        foreach ( $home_styles as $handle => $conf ) {
            list( $file, $dep ) = $conf;
            wp_enqueue_style(
                $handle,
                TINZA_URI . '/assets/css/' . $file,
                [ $dep ],
                tinza_asset_ver( '/assets/css/' . $file )
            );
        }
    }


    /* ── Catalogue (shop / catégorie / tag) ──────────────── */
    if ( is_shop() || is_product_category() || is_product_tag() ) {

        wp_enqueue_style( 'tinza-archive-product',
            TINZA_URI . '/assets/css/archive-product.css',
            [ 'tinza-vars' ], tinza_asset_ver( '/assets/css/archive-product.css' ) );

        wp_enqueue_style( 'tinza-catalog',
            TINZA_URI . '/assets/css/catalog.css',
            [ 'motta-parent' ], tinza_asset_ver( '/assets/css/catalog.css' ) );
    }


    /* ── Pages sur template — DRY ────────────────────────── */
    $page_styles = [
        'custom-pages/page-about.php'                       => 'about.css',
        'custom-pages/page-track-order.php'                 => 'track-order.css',
        'custom-pages/page-contact.php'                     => 'contact.css',
        'custom-pages/page-shipping-and-delivery.php'       => 'shipping-and-delivery.css',
        'custom-pages/page-help-center.php'                 => 'help-center.css',
        'custom-pages/page-sitemap.php'                     => 'sitemap.css',
        'custom-pages/page-privacy-policy.php'              => 'privacy-policy.css',
        'custom-pages/page-terms-of-use.php'                => 'terms-of-use.css',
        'custom-pages/page-legal.php'                       => 'legal.css',
        'custom-pages/page-return-and-exchange.php'         => 'return-and-exchange.css',
        'custom-pages/page-news-and-blog.php'               => 'news-and-blog.css',
        'custom-pages/page-care-and-maintenance.php'        => 'care-and-maintenance.css',
        'custom-pages/page-buying-guide.php'                => 'buying-guide.css',
        'custom-pages/page-interior-design.php'             => 'interior-design.css',
        'custom-pages/page-material-education.php'          => 'material-education.css',
        'custom-pages/page-craftmanship.php'                => 'craftmanship.css',
        'custom-pages/page-installation-and-renovation.php' => 'installation-and-renovation.css',
        'custom-pages/page-finish-and-patina.php'           => 'finish-and-patina.css',
        'custom-pages/page-home-improvement.php'            => 'home-improvement.css',
        'custom-pages/page-sustainability.php'              => 'sustainability.css',
        'custom-pages/page-luxury-home.php'                 => 'luxury-home.css',
        'custom-pages/page-product-comparison.php'          => 'product-comparison.css',
        'custom-pages/page-health-benefits.php'             => 'health-benefits.css',
        'custom-pages/page-industry-news.php'               => 'industry-news.css',
        'custom-pages/page-historical.php'                  => 'historical.css',
        'custom-pages/page-commercial-applications.php'     => 'commercial-applications.css',
        'custom-pages/page-seasonal-content.php'            => 'seasonal-content.css',
        'custom-pages/page-problem-solving.php'             => 'problem-solving.css',
        'custom-pages/page-custom-design.php'               => 'custom-design.css',
        'custom-pages/page-real-estate.php'                 => 'real-estate.css',
    ];

    foreach ( $page_styles as $template => $css_file ) {
        if ( is_page_template( $template ) ) {
            wp_enqueue_style(
                'tinza-' . sanitize_title( basename( $css_file, '.css' ) ),
                TINZA_URI . '/assets/css/' . $css_file,
                [ 'tinza-vars' ],
                tinza_asset_ver( '/assets/css/' . $css_file )
            );
            break;
        }
    }
}


/* ============================================================
   7. SCRIPTS — Enqueue conditionnel
   ============================================================ */
add_action( 'wp_enqueue_scripts', 'tinza_scripts' );

function tinza_scripts() {

    /* ── Toutes les pages ────────────────────────────────── */
    wp_enqueue_script( 'tinza-header',
        TINZA_URI . '/assets/js/header.js',
        [], tinza_asset_ver( '/assets/js/header.js' ), true );

    /* tinzaData : ajaxUrl (live search), nonce (CSRF), cartUrl (fallback drawer) */
    wp_localize_script( 'tinza-header', 'tinzaData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'tinza_search_nonce' ),
        'cartUrl' => wc_get_cart_url(),
    ] );

    wp_enqueue_script( 'tinza-footer',
        TINZA_URI . '/assets/js/footer.js',
        [], tinza_asset_ver( '/assets/js/footer.js' ), true );

    /* ── Home seulement ─────────────────────────────────── */
    if ( is_front_page() ) {

        wp_enqueue_script( 'tinza-main',
            TINZA_URI . '/assets/js/main.js',
            [], tinza_asset_ver( '/assets/js/main.js' ), true );

        wp_enqueue_script( 'tinza-slider',
            TINZA_URI . '/assets/js/slider.js',
            [], tinza_asset_ver( '/assets/js/slider.js' ), true );

        wp_enqueue_script( 'tinza-products-tabs',
            TINZA_URI . '/assets/js/products-tabs.js',
            [], tinza_asset_ver( '/assets/js/products-tabs.js' ), true );

        wp_enqueue_script( 'tinza-products',
            TINZA_URI . '/assets/js/products.js',
            [], tinza_asset_ver( '/assets/js/products.js' ), true );

        wp_enqueue_script( 'tinza-faq',
            TINZA_URI . '/assets/js/faq.js',
            [ 'jquery' ], tinza_asset_ver( '/assets/js/faq.js' ), true );

        wp_enqueue_script( 'tinza-newsletter',
            TINZA_URI . '/assets/js/newsletter.js',
            [ 'jquery' ], tinza_asset_ver( '/assets/js/newsletter.js' ), true );

        wp_localize_script( 'tinza-newsletter', 'tinzaNL', [
            'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
            'nonce'        => wp_create_nonce( 'tinza_newsletter' ),
            'successMsg'   => __( "Thanks! You're subscribed.", 'motta-child' ),
            'errorEmail'   => __( 'Please enter a valid email address.', 'motta-child' ),
            'errorGeneric' => __( 'Something went wrong. Please try again.', 'motta-child' ),
        ] );
    }
}


/* ============================================================
   8. WOOCOMMERCE — Fragments panier
   ============================================================ */
add_filter( 'woocommerce_add_to_cart_fragments', 'tinza_cart_fragments' );

function tinza_cart_fragments( $fragments ) {
    $count       = WC()->cart->get_cart_contents_count();
    $empty_class = ( $count === 0 ) ? ' header__cart-count--empty' : '';
    ob_start();
    ?>
    <span class="header__cart-count<?php echo $empty_class; ?>"
          data-count="<?php echo esc_attr( $count ); ?>">
        <?php echo absint( $count ); ?>
    </span>
    <?php
    $fragments['.header__cart-count'] = ob_get_clean();
    return $fragments;
}


/* ============================================================
   9. AJAX — Live Search
   ============================================================ */
add_action( 'wp_ajax_tinza_live_search',        'tinza_live_search' );
add_action( 'wp_ajax_nopriv_tinza_live_search', 'tinza_live_search' );

function tinza_live_search() {

    $s = isset( $_GET['s'] )
        ? sanitize_text_field( wp_unslash( $_GET['s'] ) )
        : '';

    $results = [];

    if ( strlen( $s ) >= 1 && strlen( $s ) <= 100 ) {

        $q = new WP_Query( [
            'post_type'      => 'product',
            'post_status'    => 'publish',
            's'              => $s,
            'posts_per_page' => 8,
            'no_found_rows'  => true,
        ] );

        while ( $q->have_posts() ) {
            $q->the_post();
            $p = wc_get_product( get_the_ID() );
            if ( ! $p ) continue;

            $img_id  = $p->get_image_id();
            $img_url = $img_id
                ? wp_get_attachment_image_url( $img_id, 'thumbnail' )
                : wc_placeholder_img_src( 'thumbnail' );

            $results[] = [
                'name'  => esc_html( $p->get_name() ),
                'url'   => esc_url( get_permalink( $p->get_id() ) ),
                'price' => wp_strip_all_tags( $p->get_price_html() ),
                'image' => esc_url( $img_url ),
            ];
        }

        wp_reset_postdata();
    }

    wp_send_json( [ 'results' => $results ] );
}


/* ============================================================
   10. AJAX — Newsletter
   ============================================================ */
add_action( 'wp_ajax_tinza_newsletter_subscribe',        'tinza_newsletter_subscribe' );
add_action( 'wp_ajax_nopriv_tinza_newsletter_subscribe', 'tinza_newsletter_subscribe' );

function tinza_newsletter_subscribe() {

    check_ajax_referer( 'tinza_newsletter' );

    $email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => __( 'Adresse email invalide.', 'motta-child' ) ] );
    }

    /* MC4WP */
    if ( function_exists( 'mc4wp_get_api_v3' ) ) {
        try {
            $api   = mc4wp_get_api_v3();
            $forms = mc4wp_get_forms();
            if ( $forms ) {
                $form    = reset( $forms );
                $list_id = $form->settings['lists'][0] ?? '';
                if ( $list_id ) {
                    $api->add_list_member( $list_id, [
                        'email_address' => $email,
                        'status'        => 'subscribed',
                    ] );
                }
            }
        } catch ( Exception $e ) {}
    }

    /* Fallback DB */
    $subs = get_option( 'tinza_newsletter_subscribers', [] );
    if ( ! in_array( $email, $subs, true ) ) {
        $subs[] = $email;
        update_option( 'tinza_newsletter_subscribers', $subs, false );
        wp_mail( get_option( 'admin_email' ), '[Tinza] Nouveau subscriber', 'Email : ' . $email );
    }

    wp_send_json_success( [ 'message' => __( 'Merci ! Votre coupon a été envoyé par email.', 'motta-child' ) ] );
}


/* ============================================================
   11. PRODUCT QUERIES — Popular / New / Viewed / Recommended
   ============================================================ */
add_action( 'template_redirect', 'tinza_count_product_view' );

/**
 * Incrément atomique (UPDATE … +1) pour éviter la perte de vues
 * en cas d'accès concurrents. Cookie d'une heure par produit pour
 * ne pas compter les rechargements, et exclusion des robots.
 */
function tinza_count_product_view() {

    if ( ! is_product() )                       return;
    if ( current_user_can( 'manage_options' ) ) return;
    if ( defined( 'DOING_CRON' ) )              return;
    if ( defined( 'DOING_AJAX' ) )              return;

    $ua = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : '';
    if ( $ua === '' || preg_match( '/bot|crawl|spider|slurp|preview|headless|monitor/i', $ua ) ) {
        return;
    }

    $id  = get_the_ID();
    $key = 'tinza_viewed_' . $id;

    if ( isset( $_COOKIE[ $key ] ) ) {
        return;
    }

    global $wpdb;

    $updated = $wpdb->query( $wpdb->prepare(
        "UPDATE {$wpdb->postmeta}
         SET meta_value = meta_value + 1
         WHERE post_id = %d AND meta_key = 'tinza_view_count'",
        $id
    ) );

    if ( ! $updated ) {
        add_post_meta( $id, 'tinza_view_count', 1, true );
    }

    wp_cache_delete( $id, 'post_meta' );

    if ( ! headers_sent() ) {
        setcookie( $key, '1', time() + HOUR_IN_SECONDS, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN, is_ssl(), true );
    }
}

/**
 * Tri par meta numérique sans exclure les produits qui n'ont pas
 * encore cette meta (orderby='meta_value_num' seul fait un INNER
 * JOIN qui les exclurait, au lieu de les classer en dernier).
 * Tiebreak par date pour les ex-æquo (ex: tous à 0).
 */
function tinza_get_products_ordered_by_meta_num( $meta_key, $limit = 4 ) {
    return wc_get_products( [
        'status'     => 'publish',
        'limit'      => absint( $limit ),
        'orderby'    => [
            'meta_value_num' => 'DESC',
            'date'           => 'DESC',
        ],
        'meta_key'   => $meta_key,
        'meta_query' => [
            'relation' => 'OR',
            [ 'key' => $meta_key, 'compare' => 'EXISTS' ],
            [ 'key' => $meta_key, 'compare' => 'NOT EXISTS' ],
        ],
    ] );
}

function tinza_get_popular( $limit = 4 ) {
    return tinza_get_products_ordered_by_meta_num( 'total_sales', $limit );
}

function tinza_get_new( $limit = 4 ) {
    return wc_get_products( [
        'status' => 'publish', 'limit' => absint( $limit ),
        'orderby' => 'date', 'order' => 'DESC',
    ] );
}

function tinza_get_viewed( $limit = 4 ) {
    return tinza_get_products_ordered_by_meta_num( 'tinza_view_count', $limit );
}

/**
 * Pays du visiteur sans appel réseau bloquant : en-têtes CDN /
 * serveur d'abord, puis la base MaxMind locale de WooCommerce.
 */
function tinza_get_visitor_country() {

    foreach ( [ 'HTTP_CF_IPCOUNTRY', 'GEOIP_COUNTRY_CODE', 'HTTP_X_COUNTRY_CODE' ] as $header ) {
        if ( ! empty( $_SERVER[ $header ] ) ) {
            $code = strtoupper( sanitize_text_field( $_SERVER[ $header ] ) );
            if ( strlen( $code ) === 2 && $code !== 'XX' ) {
                return $code;
            }
        }
    }

    if ( class_exists( 'WC_Geolocation' ) ) {
        $geo = WC_Geolocation::geolocate_ip( '', false, true );
        if ( ! empty( $geo['country'] ) ) {
            return sanitize_text_field( $geo['country'] );
        }
    }

    return '';
}

function tinza_get_recommended( $limit = 4 ) {
    $limit = absint( $limit );
    if ( is_user_logged_in() ) {
        $orders  = wc_get_orders( [ 'customer_id' => get_current_user_id(), 'status' => [ 'wc-completed', 'wc-processing' ], 'limit' => 10 ] );
        $cat_ids = $exclude = [];
        foreach ( $orders as $order ) {
            foreach ( $order->get_items() as $item ) {
                $pid = absint( $item->get_product_id() );
                $exclude[]  = $pid;
                $cat_ids    = array_merge( $cat_ids, wp_get_post_terms( $pid, 'product_cat', [ 'fields' => 'ids' ] ) );
            }
        }
        $cat_ids = array_unique( $cat_ids );
        $exclude = array_unique( $exclude );
        if ( ! empty( $cat_ids ) ) {
            $products = wc_get_products( [ 'status' => 'publish', 'limit' => $limit, 'category' => $cat_ids, 'exclude' => $exclude, 'orderby' => 'meta_value_num', 'meta_key' => 'total_sales', 'order' => 'DESC' ] );
            if ( count( $products ) >= $limit ) return $products;
        }
    }
    $country = tinza_get_visitor_country();
    if ( $country ) {
        $products = wc_get_products( [ 'status' => 'publish', 'limit' => $limit, 'orderby' => 'meta_value_num', 'meta_key' => 'total_sales', 'order' => 'DESC' ] );
        if ( ! empty( $products ) ) return $products;
    }
    return wc_get_products( [ 'status' => 'publish', 'limit' => $limit, 'orderby' => 'rand' ] );
}


/* ============================================================
   12. SHORTCODES — DRY
   ============================================================ */
add_action( 'init', 'tinza_register_shortcodes' );

function tinza_register_shortcodes() {
    $map = [
        'tinza_products_tabs'    => 'products-tabs',
        'tinza_products_popular' => 'popular-products',
        'tinza_new_arrivals'     => 'new-arrivals',
        'tinza_sale'             => 'sale',
        'tinza_shop_by_finish'   => 'shop-by-finish',
        'tinza_promise'          => 'tinza-promise',
        'tinza_banner'           => 'banner',
        'tinza_faq'              => 'faq',
        'tinza_newsletter'       => 'newsletter',
    ];
    foreach ( $map as $tag => $tpl ) {
        add_shortcode( $tag, static function () use ( $tpl ) {
            ob_start();
            get_template_part( 'template-parts/' . $tpl );
            return ob_get_clean();
        } );
    }
}

/* the_content applique déjà do_shortcode nativement (priorité 11) */
add_filter( 'widget_text', 'do_shortcode' );


/* ============================================================
   13. CPT — tinza_faq
   ============================================================ */
add_action( 'init', 'tinza_register_faq_cpt' );

function tinza_register_faq_cpt() {
    register_post_type( 'tinza_faq', [
        'labels'       => [ 'name' => __( 'FAQ Tinza', 'motta-child' ), 'singular_name' => __( 'Question', 'motta-child' ), 'add_new_item' => __( 'Ajouter une question', 'motta-child' ), 'edit_item' => __( 'Modifier la question', 'motta-child' ) ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-editor-help',
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'show_in_rest' => true,
        'rewrite'      => false,
    ] );
}


/* ============================================================
   14. TAXONOMIE — product_finish
   ============================================================ */
add_action( 'init', 'tinza_register_finish_taxonomy' );

function tinza_register_finish_taxonomy() {
    register_taxonomy( 'product_finish', [ 'product' ], [
        'labels'            => [ 'name' => __( 'Finitions', 'motta-child' ), 'singular_name' => __( 'Finition', 'motta-child' ), 'add_new_item' => __( 'Ajouter une finition', 'motta-child' ) ],
        'hierarchical'      => true,
        'public'            => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => [ 'slug' => 'finish' ],
    ] );
}


/* ============================================================
   15. META PRODUIT WooCommerce
   ============================================================ */
add_action( 'woocommerce_product_options_shipping', function () {
    woocommerce_wp_checkbox( [ 'id' => '_tinza_free_shipping', 'label' => __( 'Badge "Free Shipping"', 'motta-child' ), 'description' => __( 'Afficher sur la card produit.', 'motta-child' ) ] );
} );
add_action( 'woocommerce_process_product_meta', function ( $id ) {
    update_post_meta( $id, '_tinza_free_shipping', isset( $_POST['_tinza_free_shipping'] ) ? 'yes' : '' );
} );

add_action( 'woocommerce_product_options_general_product_data', function () {
    woocommerce_wp_text_input( [ 'id' => '_tinza_seller', 'label' => __( 'Vendeur', 'motta-child' ), 'placeholder' => 'The Shop', 'desc_tip' => true, 'description' => __( 'Affiché sous le titre produit.', 'motta-child' ) ] );
} );
add_action( 'woocommerce_process_product_meta', function ( $id ) {
    if ( isset( $_POST['_tinza_seller'] ) ) {
        update_post_meta( $id, '_tinza_seller', sanitize_text_field( $_POST['_tinza_seller'] ) );
    }
} );

add_action( 'woocommerce_product_options_general_product_data', function () {
    woocommerce_wp_checkbox( [
        'id'          => '_tinza_vendor_badge',
        'label'       => __( 'Badge Vendeur', 'motta-child' ),
        'description' => __( 'Afficher le badge vérifié sur la carte produit.', 'motta-child' ),
    ] );
} );
add_action( 'woocommerce_process_product_meta', function ( $id ) {
    update_post_meta(
        $id,
        '_tinza_vendor_badge',
        isset( $_POST['_tinza_vendor_badge'] ) ? 'yes' : ''
    );
} );


/* ============================================================
   16. FILTRES BOUTIQUE — ?finish=... & ?on_sale=1
   ============================================================ */
add_filter( 'query_vars', function ( $vars ) {
    $vars[] = 'finish';
    $vars[] = 'on_sale';
    return $vars;
} );

add_action( 'pre_get_posts', function ( $q ) {
    if ( is_admin() || ! $q->is_main_query() || ! is_shop() ) {
        return;
    }

    $finish = get_query_var( 'finish', '' );
    if ( $finish ) {
        $tax_query   = $q->get( 'tax_query' ) ?: [];
        $tax_query[] = [ 'taxonomy' => 'product_finish', 'field' => 'slug', 'terms' => sanitize_key( $finish ) ];
        $q->set( 'tax_query', $tax_query );
    }

    if ( get_query_var( 'on_sale' ) ) {
        $ids = wc_get_product_ids_on_sale();
        $q->set( 'post__in', empty( $ids ) ? [ 0 ] : $ids );
    }
} );


/* ============================================================
   17. MC4WP
   ============================================================ */
add_filter( 'mc4wp_form_content', function ( $content, $form, $data ) {
    $content = preg_replace( '/(<input[^>]+type=["\']submit["\'][^>]*value=["\'])[^"\']*(["\'])/i', '$1Claim Coupon$2', $content );
    return $content;
}, 10, 3 );

add_filter( 'mc4wp_form_content', function ( $content, $form, $data ) {
    if ( strpos( $content, 'placeholder' ) === false ) {
        $content = preg_replace( '/(<input[^>]+type=["\']email["\'])([^>]*>)/i', '$1 placeholder="john@example.com"$2', $content );
    }
    return $content;
}, 10, 3 );


/* ============================================================
   18. PERFORMANCE
   ============================================================ */
add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
add_filter( 'elementor/fonts/additional_fonts', function ( $fonts ) { $fonts['Chillax'] = 'system'; return $fonts; } );


/* ============================================================
   19. SIDEBAR — désactivée sur home
   ============================================================ */
add_filter( 'is_active_sidebar', function ( $active, $index ) {
    return ( is_front_page() || is_home() ) ? false : $active;
}, 10, 2 );


/* ============================================================
   20. HELPERS
   ============================================================ */

/**
 * Filtre SQL pour exclure les promos expirées.
 * Non accroché par défaut.
 * Usage : add_filter('posts_where', 'tinza_sale_date_filter');
 */
function tinza_sale_date_filter( $where ) {
    global $wpdb;
    $where .= $wpdb->prepare(
        " AND (NOT EXISTS (SELECT 1 FROM {$wpdb->postmeta} pmd WHERE pmd.post_id = {$wpdb->posts}.ID AND pmd.meta_key = '_sale_price_dates_to' AND pmd.meta_value != '' AND CAST(pmd.meta_value AS SIGNED) < %d))",
        strtotime( current_time( 'Y-m-d' ) )
    );
    return $where;
}


/* ============================================================
   21. RETRAIT DU LOGO MOTTA SUR /my-account
   ------------------------------------------------------------
   Motta accroche son bloc logo/site-title sur le hook WooCommerce
   'woocommerce_before_customer_login_form' (classe singleton
   \Motta\WooCommerce\Account::logo()). Aucune option Customizer
   ne permet de le désactiver → retrait via remove_action().
   ============================================================ */
add_action( 'init', function () {
    if ( class_exists( '\Motta\WooCommerce\Account' ) ) {
        remove_action(
            'woocommerce_before_customer_login_form',
            array( \Motta\WooCommerce\Account::instance(), 'logo' ),
            1
        );
    }
} );