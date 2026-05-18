<?php
/**
 * Tinza Child Theme — functions.php
 *
 * @package MottaChild
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;


/* ============================================================
   1. CONSTANTS
   ============================================================ */

define( 'TINZA_V',   '1.0.0' );
define( 'TINZA_URI', get_stylesheet_directory_uri() );
define( 'TINZA_DIR', get_stylesheet_directory() );


/* ============================================================
   2. SETUP
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
   3. BODY CLASS
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
   4. STYLES — Enqueue conditionnel
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
        [ 'motta-parent' ], TINZA_V );

    wp_enqueue_style( 'tinza-vars',
        TINZA_URI . '/assets/css/variables.css',
        [ 'tinza-fonts' ], TINZA_V );

    wp_enqueue_style( 'tinza-header',
        TINZA_URI . '/assets/css/header.css',
        [ 'tinza-vars' ], TINZA_V );

    wp_enqueue_style( 'tinza-footer',
        TINZA_URI . '/assets/css/footer.css',
        [ 'tinza-vars' ], TINZA_V );


    /* ── Home seulement ─────────────────────────────────── */
    if ( is_front_page() ) {

        wp_enqueue_style( 'tinza-base',
            TINZA_URI . '/assets/css/base.css',
            [ 'tinza-vars' ], TINZA_V );

        wp_enqueue_style( 'tinza-typo',
            TINZA_URI . '/assets/css/typography.css',
            [ 'tinza-base' ], TINZA_V );

        wp_enqueue_style( 'tinza-slider',
            TINZA_URI . '/assets/css/slider.css',
            [ 'tinza-typo' ], TINZA_V );

        wp_enqueue_style( 'tinza-products-tabs',
            TINZA_URI . '/assets/css/products-tabs.css',
            [ 'tinza-typo' ], TINZA_V );

        wp_enqueue_style( 'tinza-products-grid',
            TINZA_URI . '/assets/css/products-grid.css',
            [ 'tinza-typo' ], TINZA_V );

        wp_enqueue_style( 'tinza-banner',
            TINZA_URI . '/assets/css/banner.css',
            [ 'tinza-typo' ], TINZA_V );

        wp_enqueue_style( 'tinza-finish',
            TINZA_URI . '/assets/css/shop-by-finish.css',
            [ 'tinza-typo' ], TINZA_V );

        wp_enqueue_style( 'tinza-promise',
            TINZA_URI . '/assets/css/tinza-promise.css',
            [ 'tinza-typo' ], TINZA_V );

        wp_enqueue_style( 'tinza-faq',
            TINZA_URI . '/assets/css/faq.css',
            [ 'tinza-typo' ], TINZA_V );

        wp_enqueue_style( 'tinza-newsletter',
            TINZA_URI . '/assets/css/newsletter.css',
            [ 'tinza-typo' ], TINZA_V );

    }

    /* ── Catalog — fix layout sidebar (spec 1,2,1 > Motta 1,0,0) ─ */
    if ( is_shop() || is_product_category() || is_product_tag() ) {
        wp_enqueue_style( 'tinza-catalog',
            TINZA_URI . '/assets/css/catalog.css',
            [ 'motta-parent' ], TINZA_V );
    }

    /* ── Pages sur template — DRY ────────────────────────── */
    $page_styles = [
        'custom-pages/page-about.php'                => 'about.css',
        'custom-pages/page-track-order.php'          => 'track-order.css',
        'custom-pages/page-contact.php'              => 'contact.css',
        'custom-pages/page-shipping-and-delivery.php'=> 'shipping-and-delivery.css',
        'custom-pages/page-help-center.php'          => 'help-center.css',
        'custom-pages/page-sitemap.php'              => 'sitemap.css',
        'custom-pages/page-privacy-policy.php'       => 'privacy-policy.css',
        'custom-pages/page-terms-of-use.php'         => 'terms-of-use.css',
    ];

    foreach ( $page_styles as $template => $css_file ) {
        if ( is_page_template( $template ) ) {
            wp_enqueue_style(
                'tinza-' . sanitize_title( basename( $css_file, '.css' ) ),
                TINZA_URI . '/assets/css/' . $css_file,
                [ 'tinza-vars' ],
                TINZA_V
            );
            break;
        }
    }
}


/* ============================================================
   5. SCRIPTS — Enqueue conditionnel
   ─────────────────────────────────────────────────────────
   PRINCIPE : tout fonctionnel géré dans un JS .
   ============================================================ */
add_action( 'wp_enqueue_scripts', 'tinza_scripts' );

function tinza_scripts() {

    /* ── Toutes les pages ────────────────────────────────── */

    /*
     * header.js = script central du header.
     *
     * tinzaData injecte 3 valeurs PHP → JS :
     *  - ajaxUrl : URL admin-ajax.php (obligatoire pour AJAX)
     *  - nonce   : token anti-CSRF pour tinza_live_search
     *  - cartUrl : fallback si le drawer natif Motta n'est pas trouvé
     *              → initCartToggle() dans header.js l'utilise en dernier recours
     */
    wp_enqueue_script( 'tinza-header',
        TINZA_URI . '/assets/js/header.js',
        [], TINZA_V, true );

    wp_localize_script( 'tinza-header', 'tinzaData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'tinza_search_nonce' ),
        'cartUrl' => wc_get_cart_url(),
    ] );

    /* Footer scripts */
    wp_enqueue_script( 'tinza-footer',
        TINZA_URI . '/assets/js/footer.js',
        [], TINZA_V, true );

    /* ── Home seulement ─────────────────────────────────── */
    if ( is_front_page() ) {

        wp_enqueue_script( 'tinza-main',
            TINZA_URI . '/assets/js/main.js',
            [], TINZA_V, true );

        wp_enqueue_script( 'tinza-slider',
            TINZA_URI . '/assets/js/slider.js',
            [], TINZA_V, true );

        wp_enqueue_script( 'tinza-products-tabs',
            TINZA_URI . '/assets/js/products-tabs.js',
            [], TINZA_V, true );

        wp_enqueue_script( 'tinza-faq',
            TINZA_URI . '/assets/js/faq.js',
            [ 'jquery' ], TINZA_V, true );

        wp_enqueue_script( 'tinza-newsletter',
            TINZA_URI . '/assets/js/newsletter.js',
            [ 'jquery' ], TINZA_V, true );

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
   6. WOOCOMMERCE — Fragments panier
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
   8. AJAX — Live Search
   ─────────────────────────────────────────────────────────
   Retourne : name + url + price UNIQUEMENT.
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

            $results[] = [
                'name'  => esc_html( $p->get_name() ),
                'url'   => esc_url( get_permalink( $p->get_id() ) ),
                /*
                 * wp_strip_all_tags : supprime <del><ins> de get_price_html()
                 * pour retourner le prix en texte pur (plus rapide à afficher).
                 */
                'price' => wp_strip_all_tags( $p->get_price_html() ),
                /* ✗ 'image' intentionnellement absent — plus affiché dans header.js */
            ];
        }

        wp_reset_postdata();
    }

    wp_send_json( [ 'results' => $results ] );
}


/* ============================================================
   9. AJAX — Newsletter
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
   10. PRODUCT TABS — Queries backend
   ============================================================ */
add_action( 'template_redirect', 'tinza_count_product_view' );

function tinza_count_product_view() {
    if ( ! is_product() )                       return;
    if ( current_user_can( 'manage_options' ) ) return;
    if ( defined( 'DOING_CRON' ) )              return;
    if ( defined( 'DOING_AJAX' ) )              return;
    $id    = get_the_ID();
    $count = (int) get_post_meta( $id, 'tinza_view_count', true );
    update_post_meta( $id, 'tinza_view_count', $count + 1 );
}

function tinza_get_popular( $limit = 4 ) {
    return wc_get_products( [
        'status' => 'publish', 'limit' => absint( $limit ),
        'orderby' => 'meta_value_num', 'meta_key' => 'total_sales', 'order' => 'DESC',
    ] );
}

function tinza_get_new( $limit = 4 ) {
    return wc_get_products( [
        'status' => 'publish', 'limit' => absint( $limit ),
        'orderby' => 'date', 'order' => 'DESC',
    ] );
}

function tinza_get_viewed( $limit = 4 ) {
    return wc_get_products( [
        'status' => 'publish', 'limit' => absint( $limit ),
        'orderby' => 'meta_value_num', 'meta_key' => 'tinza_view_count', 'order' => 'DESC',
    ] );
}

function tinza_get_visitor_country() {
    if ( isset( $_COOKIE['tinza_country'] ) ) {
        return sanitize_text_field( $_COOKIE['tinza_country'] );
    }
    $ip = sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? '' );
    if ( in_array( $ip, [ '127.0.0.1', '::1', '' ], true ) ) return '';
    $response = wp_remote_get( 'http://ip-api.com/json/' . $ip . '?fields=countryCode', [ 'timeout' => 2 ] );
    if ( is_wp_error( $response ) ) return '';
    $body = json_decode( wp_remote_retrieve_body( $response ), true );
    $code = sanitize_text_field( $body['countryCode'] ?? '' );
    if ( $code ) setcookie( 'tinza_country', $code, time() + DAY_IN_SECONDS, '/', '', is_ssl(), true );
    return $code;
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
   11. SHORTCODES — DRY
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

add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'the_content', 'do_shortcode' );


/* ============================================================
   12. CPT — tinza_faq
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
   13. TAXONOMIE — product_finish
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
   14. META PRODUIT WooCommerce
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


/* ============================================================
   15. FILTRE BOUTIQUE — ?finish=aged-copper
   ============================================================ */
add_filter( 'query_vars', function ( $vars ) { $vars[] = 'finish'; return $vars; } );

add_action( 'pre_get_posts', function ( $q ) {
    if ( ! is_admin() && $q->is_main_query() && is_shop() ) {
        $finish = get_query_var( 'finish', '' );
        if ( $finish ) {
            $tax_query   = $q->get( 'tax_query' ) ?: [];
            $tax_query[] = [ 'taxonomy' => 'product_finish', 'field' => 'slug', 'terms' => sanitize_key( $finish ) ];
            $q->set( 'tax_query', $tax_query );
        }
    }
} );


/* ============================================================
   16. MC4WP
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
   17. PERFORMANCE
   ============================================================ */
add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
add_filter( 'elementor/fonts/additional_fonts', function ( $fonts ) { $fonts['Chillax'] = 'system'; return $fonts; } );


/* ============================================================
   18. SIDEBAR — désactivée sur home
   ============================================================ */
add_filter( 'is_active_sidebar', function ( $active, $index ) {
    return ( is_front_page() || is_home() ) ? false : $active;
}, 10, 2 );


/* ============================================================
   19. HELPERS
   ============================================================ */

/**
 * Filtre SQL pour exclure les promos expirées.
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