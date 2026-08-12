<?php
/**
 * Tinza Child — header.php
 */
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes();  ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); /* UTF-8 */ ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php wp_head();  ?>
</head>
<body <?php body_class();  ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">


<header class="site-header" id="site-header" role="banner">
    <div class="site-header__inner">


        <div class="site-header__left">

            
            <button class="site-header__hamburger"
                    id="mobile-menu-toggle"
                    aria-label="<?php esc_attr_e( 'Ouvrir le menu', 'motta-child' ); ?>"
                    aria-expanded="false"
                    aria-controls="mobile-nav"
                    type="button">
                <!-- Icône 3 barres (hamburger) en SVG inline -->
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                    <rect x="0" y="1"  width="14" height="2" rx="1" fill="currentColor"/>
                    <rect x="0" y="6"  width="14" height="2" rx="1" fill="currentColor"/>
                    <rect x="0" y="11" width="14" height="2" rx="1" fill="currentColor"/>
                </svg>
            </button>

            <!-- LOGO — lien vers la home -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
               class="site-header__logo"
               aria-label="<?php esc_attr_e( 'Tinza — Accueil', 'motta-child' ); ?>">
                <span class="site-header__logo-text">tinza</span>
            </a>

            <div class="site-header__categories-wrapper">

                <button class="site-header__categories"
                        id="categories-btn"
                        aria-expanded="false"
                        aria-controls="mega-menu"
                        aria-label="<?php esc_attr_e( 'Catégories', 'motta-child' ); ?>"
                        type="button">
                    <span class="site-header__categories-square">
                        <svg class="site-header__categories-icon"
                             width="14" height="14" viewBox="0 0 14 14"
                             fill="none" aria-hidden="true">
                            <rect x="0" y="1"  width="14" height="2" rx="1" fill="currentColor"/>
                            <rect x="0" y="6"  width="14" height="2" rx="1" fill="currentColor"/>
                            <rect x="0" y="11" width="14" height="2" rx="1" fill="currentColor"/>
                        </svg>
                    </span>
                    <!-- Label texte uppercase -->
                    <span class="site-header__categories-label">CATEGORIES</span>
                </button>
               <nav class="mega-menu" id="mega-menu" hidden
     aria-label="<?php esc_attr_e( 'Catégories', 'motta-child' ); ?>">
    <?php
    $cats = get_terms( [
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => 0,
        'orderby'    => 'name',
        'order'      => 'ASC',
    ] );
    if ( ! is_wp_error( $cats ) && $cats ) :
        foreach ( $cats as $cat ) : ?>
            <div class="mega-menu__item">
                <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>">
                    <?php echo esc_html( $cat->name ); ?>
                </a>
            </div>
        <?php endforeach;
    endif;
    ?>
</nav>

            </div><!-- /.site-header__categories-wrapper -->

        </div><!-- /.site-header__left -->

        <div class="site-header__search-outer">

            <div class="site-header__search">
                <input type="search"
                       id="header-search-input"
                       class="site-header__search-input"
                       placeholder="<?php esc_attr_e( 'Search...', 'motta-child' ); ?>"
                       autocomplete="off"
                       aria-label="<?php esc_attr_e( 'Rechercher un produit', 'motta-child' ); ?>">

                <!-- Bouton loupe — déclenche la navigation vers /search?s=... -->
                <button class="site-header__search-btn"
                        id="header-search-btn"
                        aria-label="<?php esc_attr_e( 'Rechercher', 'motta-child' ); ?>"
                        type="button">
                    <!-- Icône SVG chargée depuis template-parts/icons/search.php -->
                    <?php get_template_part( 'template-parts/icons/search' ); ?>
                </button>

            </div><!-- /.site-header__search -->

        
            <div class="search-results-dropdown"
                 id="header-search-results"
                 role="listbox"
                 hidden></div>

        </div><!-- /.site-header__search-outer -->

        <div class="site-header__actions">

            <!-- BOUTON SEARCH MOBILE — visible uniquement ≤768px
                 Affiche l'overlay de recherche au clic
                 aria-controls="mobile-search-overlay" = id de l'overlay -->
            <a class="site-header__mobile-search-btn"
                    id="mobile-search-toggle"
                    aria-label="<?php esc_attr_e( 'Rechercher', 'motta-child' ); ?>"
                    aria-expanded="false"
                    aria-controls="mobile-search-overlay"
                    type="button">
                <?php get_template_part( 'template-parts/icons/search' ); ?>
                <!-- Label texte "Search" affiché en mobile -->
                <span class="site-header__mobile-search-label">Search</span>
            </a>

            <!-- COMPTE UTILISATEUR — lien vers dashboard WooCommerce -->
            <!-- COMPTE UTILISATEUR 
               Connecté   → icône user existante
               Non connecté → bouton "Sign In" -->
            <?php if ( is_user_logged_in() ) : ?>
                <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'dashboard' ) ); ?>"
                    class="site-header__action-btn site-header__action-btn--user"
                    aria-label="<?php esc_attr_e( 'Mon compte', 'motta-child' ); ?>">
                    <?php get_template_part( 'template-parts/icons/user' ); ?>
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"
                    class="site-header__action-btn site-header__action-btn--signin"
                    aria-label="<?php esc_attr_e( 'Se connecter', 'motta-child' ); ?>">
                    Sign In
                </a>
            <?php endif; ?>
            <?php /* WISHLIST DESACTIVEE — plugin WCBoost Wishlist desactive
            <!-- WISHLIST — icône + compteur toutes les pages -->
            <?php
            $wishlist_count = 0;
            if ( is_user_logged_in() && class_exists( 'WCBoost\Wishlist\Plugin' ) ) {
                try {
                    $plugin   = WCBoost\Wishlist\Plugin::instance();
                    $wishlist = null;
                    if ( isset( $plugin->wishlist ) &&
                         method_exists( $plugin->wishlist, 'get_wishlist' ) ) {
                         $wishlist = $plugin->wishlist->get_wishlist();
                   }
                    if ( $wishlist && method_exists( $wishlist, 'get_items' ) ) {
                         $wishlist_count = count( $wishlist->get_items() );
                   }
                } catch ( Exception $e ) {}
            }
            $wl_empty = $wishlist_count === 0 ? ' header__wishlist-count--empty' : '';
            ?>
            <a href="<?php echo esc_url( home_url( '/wishlist/' ) ); ?>"
               class="site-header__action-btn site-header__action-btn--wishlist"
               aria-label="<?php esc_attr_e( 'Wishlist', 'motta-child' ); ?>">
                <span class="site-header__wishlist-wrap">
                    <?php get_template_part( 'template-parts/icons/heart' ); ?>
                    <span class="header__wishlist-count<?php echo esc_attr( $wl_empty ); ?>"
                          id="wishlist-counter"
                          data-count="<?php echo esc_attr( $wishlist_count ); ?>">
                          <?php echo esc_html( $wishlist_count ); ?>
                    </span>
                </span>
            </a>
               */ ?>
            <?php
            /* Récupérer le nombre d'articles dans le panier */
            $cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
            /* Classe CSS pour masquer le badge si panier vide */
            $empty_cls  = $cart_count === 0 ? ' header__cart-count--empty' : '';
            ?>
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"
               class="site-header__cart-btn"
               id='cart-open-btn'
               aria-label="<?php
                   /* Accessibilité : préciser le nombre d'articles */
                   echo esc_attr(
                       sprintf(
                           _n( 'Panier — %d article', 'Panier — %d articles', $cart_count, 'motta-child' ),
                           $cart_count
                       )
                   );
               ?>">

                <!-- Wrapper icône + badge compteur -->
                <span class="site-header__cart-icon-wrap">
                    <?php get_template_part( 'template-parts/icons/cart' ); ?>
                    <span class="header__cart-count<?php echo esc_attr( $empty_cls ); ?>"
                          data-count="<?php echo esc_attr( $cart_count ); ?>">
                        <?php echo esc_html( $cart_count ); ?>
                    </span>
                </span>

                <!-- Label "Cart" — caché sur mobile par CSS -->
                <span class="site-header__cart-label">Cart</span>

            </a><!-- /.site-header__cart-btn -->

        </div><!-- /.site-header__actions -->

    </div><!-- /.site-header__inner -->
</header><!-- /.site-header -->

<!-- OVERLAY RECHERCHE MOBILE -->
<div class="mobile-search-overlay"
     id="mobile-search-overlay"
     hidden
     aria-label="<?php esc_attr_e( 'Recherche', 'motta-child' ); ?>">

    <div class="mobile-search-overlay__bar">

        <!-- .field : ancre dropdown -->
        <div class="mobile-search-overlay__field">

            <!-- .input-wrap : style desktop -->
            <div class="mobile-search-overlay__input-wrap">

                <input type="search"
                       id="mobile-search-input"
                       class="mobile-search-overlay__input"
                       placeholder="<?php esc_attr_e( 'Search...', 'motta-child' ); ?>"
                       autocomplete="off"
                       aria-label="<?php esc_attr_e( 'Rechercher', 'motta-child' ); ?>">

                <!-- Bouton loupe — même style cuivre que desktop -->
                <button class="mobile-search-overlay__submit"
                        id="mobile-search-submit"
                        aria-label="<?php esc_attr_e( 'Rechercher', 'motta-child' ); ?>"
                        type="button">
                    <?php get_template_part( 'template-parts/icons/search' ); ?>
                </button>

                <!-- ✕ CLOSE -->
                <a class="mobile-search-overlay__close"
                   id="mobile-search-close"
                   aria-label="<?php esc_attr_e( 'Fermer', 'motta-child' ); ?>"
                   type="a">✕</a>

            </div><!-- /.input-wrap -->

            <!-- Dropdown -->
            <div class="search-results-dropdown"
                 id="mobile-search-results"
                 role="listbox"
                 hidden></div>

        </div><!-- /.field -->

    </div><!-- /.bar -->

</div><!-- /.mobile-search-overlay -->

<!-- ═══════════════════════════════════════════════════════════
     MINI-CART DRAWER
     ═══════════════════════════════════════════════════════════ -->
<div class="mini-cart" id="mini-cart"
     role="dialog"
     aria-label="<?php esc_attr_e( 'Votre panier', 'motta-child' ); ?>"
     aria-modal="true"
     aria-hidden="true">

    <div class="mini-cart__header">
        <h2 class="mini-cart__title">Shopping Cart</h2>
        <a class="mini-cart__close" id="mini-cart-close"
                aria-label="<?php esc_attr_e( 'Fermer', 'motta-child' ); ?>"
                type="a">✕</a>
    </div>

    <!-- Affiché 4s après jQuery 'added_to_cart' -->
    <div class="mini-cart__notice mini-cart__notice--success" id="mini-cart-success" hidden>
        ✓ <?php esc_html_e( 'Successfully Added To Your Cart', 'motta-child' ); ?>
    </div>
    
    <!-- rouge — suppression -->
    <div id="mini-cart-removed" class="mini-cart__notice mini-cart__notice--removed" hidden>
          ✕ Item Removed From Your Cart
    </div>

    <!-- Contenu WooCommerce — mis à jour par AJAX fragments -->
    <div class="mini-cart__body">
        <div class="widget_shopping_cart_content">
            <?php woocommerce_mini_cart(); ?>
        </div>
    </div>


</div>
<div class="mini-cart__overlay" id="mini-cart-overlay"></div>



<!-- ═══════════════════════════════════════════════════════════
     DRAWER NAV MOBILE
     ═══════════════════════════════════════════════════════════ -->
<aside class="mobile-nav"
       id="mobile-nav"
       hidden
       aria-hidden="true"
       aria-label="<?php esc_attr_e( 'Menu mobile', 'motta-child' ); ?>">

    <!-- En-tête du drawer -->
    <div class="mobile-nav__header">
        <span class="mobile-nav__title">
            <?php esc_html_e( 'Menu', 'motta-child' ); ?>
        </span>
        <!-- Bouton fermer — id géré par initMobileNav() -->
        <a class="mobile-nav__close"
                id="mobile-nav-close"
                aria-label="<?php esc_attr_e( 'Fermer le menu', 'motta-child' ); ?>"
                type="a">✕</a>
    </div>

    <!-- Liens de navigation -->
    <nav class="mobile-nav__content">
    <?php
    $cats = get_terms( [
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => 0,
        'orderby'    => 'name',
        'order'      => 'ASC',
    ] );
    if ( ! is_wp_error( $cats ) && $cats ) :
        foreach ( $cats as $cat ) : ?>
            <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>">
                <?php echo esc_html( $cat->name ); ?>
            </a>
        <?php endforeach;
    endif;
    ?>
    <hr>
</nav>

</aside>

<!-- Overlay sombre derrière le drawer nav -->
<div class="mobile-nav__overlay" id="mobile-nav-overlay"></div>


<!-- ═══════════════════════════════════════════════════════════
     CONTENU PRINCIPAL
     ═══════════════════════════════════════════════════════════ -->
<div id="site-content" class="site-content">
    <?php
    /* Breadcrumb et titre de page — sauf sur la home */
    if ( ! is_front_page() ) {
        do_action( 'motta_after_site_content_open' );
    }
    ?>

    <!-- #main = landmark ARIA principal — référencé par le skip-link -->
    <div id="main" class="site-main" role="main">