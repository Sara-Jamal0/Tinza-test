<?php
/**
 * Tinza Child — header.php
 
 */
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); /* Ajoute lang="fr" ou lang="en" selon WP */ ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); /* UTF-8 */ ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php wp_head(); /* Injecte CSS, meta SEO, etc. enregistrés par WP/plugins */ ?>
</head>
<body <?php body_class(); /* Ajoute les classes CSS body : tinza-child, homepage, etc. */ ?>>
<?php wp_body_open(); /* Hook pour plugins (ex: Google Tag Manager) */ ?>

<!-- Wrapper global de la page — requis par certains thèmes Motta -->
<div id="page" class="site">

<!-- Lien d'accessibilité — permet de sauter la nav au clavier -->
<a class="skip-link screen-reader-text" href="#main">
    <?php esc_html_e( 'Aller au contenu', 'motta-child' ); ?>
</a>


<!-- ═══════════════════════════════════════════════════════════
     HEADER PRINCIPAL
     sticky top:0 — défini dans header.css (.site-header)
     role="banner" = landmark ARIA pour la navigation assistée
     ═══════════════════════════════════════════════════════════ -->
<header class="site-header" id="site-header" role="banner">
    <div class="site-header__inner">


        <!-- ════════════════ LEFT ════════════════
             Contient : Hamburger (mobile) + Logo + Categories (desktop)
             ════════════════════════════════════ -->
        <div class="site-header__left">

            <!-- HAMBURGER — visible uniquement sur mobile (≤768px)
                 aria-expanded="false" = état initial fermé
                 aria-controls="mobile-nav" = id du drawer qu'il contrôle -->
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
                <!-- Texte stylé en CSS (font Chillax, 40px, letter-spacing -0.06em) -->
                <span class="site-header__logo-text">tinza</span>
            </a>

            <!-- CATEGORIES WRAPPER — contient le bouton + le mega-menu
                 position:relative dans CSS pour ancrer le mega-menu en absolu -->
            <div class="site-header__categories-wrapper">

                <!-- Bouton CATEGORIES — desktop uniquement
                     aria-expanded géré par header.js (initCategories)
                     aria-controls="mega-menu" = id du menu qu'il contrôle -->
                <button class="site-header__categories"
                        id="categories-btn"
                        aria-expanded="false"
                        aria-controls="mega-menu"
                        aria-label="<?php esc_attr_e( 'Catégories', 'motta-child' ); ?>"
                        type="button">
                    <!-- Carré 42×42 qui contient l'icône hamburger -->
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

                <!-- MEGA-MENU — liste des catégories
                     hidden = caché par défaut, retiré par JS au clic
                     position:absolute par rapport à .categories-wrapper -->
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


        <!-- ════════════════ SEARCH DESKTOP ════════════════
             Technique double-wrapper pour dropdown visible :
             .search-outer  = position:relative, PAS d'overflow
                              → le dropdown peut dépasser
             .site-header__search = overflow:hidden
                              → arrondi et style Figma intact
             .search-results-dropdown = position:absolute sur .outer
                              → même largeur (left:0 right:0)
             ════════════════════════════════════════════════ -->
        <div class="site-header__search-outer">

            <!-- Barre visuelle (border-radius + overflow:hidden) -->
            <div class="site-header__search">

                <!-- Input texte — id requis par header.js (initLiveSearch) -->
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

            <!-- Dropdown résultats — rempli et affiché par header.js
                 hidden = invisible par défaut
                 role="listbox" = sémantique ARIA autocomplete -->
            <div class="search-results-dropdown"
                 id="header-search-results"
                 role="listbox"
                 hidden></div>

        </div><!-- /.site-header__search-outer -->


        <!-- ════════════════ RIGHT ACTIONS ════════════════
             Contient : Search mobile + User + Heart + Cart
             ════════════════════════════════════════════════ -->
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

            <!-- COMPTE UTILISATEUR — lien vers dashboard WooCommerce
                 Caché sur mobile (CSS : display:none ≤768px) -->
            <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'dashboard' ) ); ?>"
               class="site-header__action-btn site-header__action-btn--user"
               aria-label="<?php esc_attr_e( 'Mon compte', 'motta-child' ); ?>">
                <?php get_template_part( 'template-parts/icons/user' ); ?>
            </a>

            <!-- WISHLIST — lien vers la page wishlist -->
            <a href="<?php echo esc_url( home_url( '/wishlist/' ) ); ?>"
               class="site-header__action-btn"
               aria-label="<?php esc_attr_e( 'Wishlist', 'motta-child' ); ?>">
                <?php get_template_part( 'template-parts/icons/heart' ); ?>
            </a>

            <!-- ════ CART WooCommerce NATIF ════
                 Lien direct vers la page panier WooCommerce.
                 Le compteur (.header__cart-count) est mis à jour
                 automatiquement par woocommerce_add_to_cart_fragments
                 défini dans functions.php → tinza_cart_fragments().
                 Aucun drawer custom — WooCommerce gère son propre UI.
                 ═══════════════════════════════════════════════════ -->
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

                    <!-- Badge compteur — géré par JS fragment WooCommerce
                         data-count est lu par le CSS pour masquer si 0 -->
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


<!-- ═══════════════════════════════════════════════════════════
     OVERLAY RECHERCHE MOBILE
     ─────────────────────────────────────────────────────────
     .field      → ancre du dropdown (overflow:visible)
     .input-wrap → style visuel desktop (overflow:hidden)
     ═══════════════════════════════════════════════════════════ -->
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

                <!-- ✕ CLOSE — à côté de la loupe, pas de background -->
                <button class="mobile-search-overlay__close"
                        id="mobile-search-close"
                        aria-label="<?php esc_attr_e( 'Fermer', 'motta-child' ); ?>"
                        type="button">✕</button>

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
     ─────────────────────────────────────────────────────────
     Ouvert par initMiniCart() dans header.js via capture phase.
     Le clic sur #cart-open-btn est intercepté (e.preventDefault)
     avant que WooCommerce ou Motta puissent rediriger vers /cart/.
     Contenu : woocommerce_mini_cart() = données WC 100% natives.
     CSS     : section 6 de header.css (.mini-cart)
     ═══════════════════════════════════════════════════════════ -->
<div class="mini-cart" id="mini-cart"
     role="dialog"
     aria-label="<?php esc_attr_e( 'Votre panier', 'motta-child' ); ?>"
     aria-modal="true"
     aria-hidden="true">

    <div class="mini-cart__header">
        <h2 class="mini-cart__title">Shopping Cart</h2>
        <button class="mini-cart__close" id="mini-cart-close"
                aria-label="<?php esc_attr_e( 'Fermer', 'motta-child' ); ?>"
                type="button">✕</button>
    </div>

    <!-- Affiché 4s après jQuery 'added_to_cart' -->
    <div class="mini-cart__success" id="mini-cart-success" hidden>
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
     ─────────────────────────────────────────────────────────
     S'ouvre depuis la gauche au clic sur le hamburger.
     hidden = caché par défaut (CSS : display:flex toujours)
     mobile-nav--open = translateX(0) → visible
     Géré par : initMobileNav() dans header.js
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
        <button class="mobile-nav__close"
                id="mobile-nav-close"
                aria-label="<?php esc_attr_e( 'Fermer le menu', 'motta-child' ); ?>"
        type="button">✕</button>
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
    <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'dashboard' ) ); ?>">
        <?php esc_html_e( 'Mon compte', 'motta-child' ); ?>
    </a>
</nav>

</aside>

<!-- Overlay sombre derrière le drawer nav -->
<div class="mobile-nav__overlay" id="mobile-nav-overlay"></div>


<!-- ═══════════════════════════════════════════════════════════
     CONTENU PRINCIPAL
     ─────────────────────────────────────────────────────────
     #site-content et #main sont les wrappers WooCommerce/Motta.
     do_action('motta_after_site_content_open') injecte
     le breadcrumb et le titre de page sur les pages non-home.
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