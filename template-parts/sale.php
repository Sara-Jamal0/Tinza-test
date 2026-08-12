<?php
defined( 'ABSPATH' ) || exit;
if ( ! function_exists( 'wc_get_product_ids_on_sale' ) ) return;

if ( ! function_exists( 'tinza_vendor_has_badge' ) ) {
    function tinza_vendor_has_badge( $vendor_id ) {
        if ( ! function_exists( 'dokan_pro' ) ) return false;
        $cls = 'WeDevs\\DokanPro\\Modules\\VendorBadge\\Badge';
        if ( ! class_exists( $cls ) ) return false;
        return ! empty( $cls::get_earned_badges( absint( $vendor_id ) ) );
    }
}

$sale_ids = wc_get_product_ids_on_sale();
if ( empty( $sale_ids ) ) return;

$sale_link              = add_query_arg( 'on_sale', 1, wc_get_page_permalink( 'shop' ) );
$products_with_discount = [];

foreach ( $sale_ids as $pid ) {
    $product = wc_get_product( $pid );
    if ( ! $product || ! $product->is_visible() || $product->get_type() === 'variation' ) continue;

    /* Produit variable : get_regular_price()/get_sale_price() retournent
       '' sur le PARENT (metas vivent sur les variations) → (float)'' = 0.0
       → $regular<=0 ci-dessous excluait à tort TOUT produit variable de
       la section Sale. Fix : agréger via les méthodes officielles
       WC_Product_Variable (mêmes données que get_price_html(), déjà
       vérifiées correctes). */
    if ( $product->is_type( 'variable' ) ) {
        if ( ! $product->is_on_sale() ) continue;
        $regular = (float) $product->get_variation_regular_price( 'min', true );
        $sale    = (float) $product->get_variation_sale_price( 'min', true );
    } else {
        $regular = (float) $product->get_regular_price();
        $sale    = (float) $product->get_sale_price();
    }

    if ( $regular <= 0 || $sale <= 0 || $sale >= $regular ) continue;
    $pct = round( ( ( $regular - $sale ) / $regular ) * 100 );
    $products_with_discount[] = [ 'product' => $product, 'pct' => $pct, 'regular' => $regular, 'sale' => $sale ];
}
if ( empty( $products_with_discount ) ) return;
usort( $products_with_discount, function( $a, $b ) { return $b['pct'] - $a['pct']; } );

$products_with_discount = array_slice( $products_with_discount, 0, 9 );
$page1    = array_slice( $products_with_discount, 0, 5 );
$page2    = array_slice( $products_with_discount, 5, 4 );
$currency = get_woocommerce_currency_symbol();

/* Helper : render une carte sale normale */
function tinza_render_sale_card( $item, $currency ) {
    $product   = $item['product'];
    $pct       = $item['pct'];
    $regular   = $item['regular'];
    $sale      = $item['sale'];
    $pid       = $product->get_id();
    $img_id    = $product->get_image_id();
    $img_url   = $img_id ? wp_get_attachment_image_url( $img_id, 'tinza-card' ) : wc_placeholder_img_src( 'tinza-card' );
    $img_alt   = $img_id ? ( get_post_meta( $img_id, '_wp_attachment_image_alt', true ) ?: $product->get_name() ) : $product->get_name();
    $vendor_id = (int) $product->get_post_data()->post_author;
    if ( function_exists( 'dokan_get_store_info' ) ) {
        $store  = dokan_get_store_info( $vendor_id );
        $seller = $store['store_name'] ?? 'The Shop';
    } else {
        $seller = get_post_meta( $pid, '_tinza_seller', true ) ?: 'The Shop';
    }
    $rating    = (float) $product->get_average_rating();
    $has_badge = tinza_vendor_has_badge( $vendor_id );
    $ship      = function_exists( 'tinza_has_free_shipping' ) ? tinza_has_free_shipping( $pid ) : ( get_post_meta( $pid, '_dokan_free_shipping', true ) === 'yes' );
    $link      = $product->get_permalink();
    ?>
    <li class="tz-pcard">
        <div class="tz-pcard__img">
            <a href="<?php echo esc_url( $link ); ?>" tabindex="-1" aria-hidden="true">
                <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" width="420" height="420" loading="lazy">
            </a>
            <span class="tz-pcard__badge-discount" aria-hidden="true">-<?php echo absint( $pct ); ?>%</span>
            <button type="button" class="tz-pcard__wish js-wish"
                    data-product-id="<?php echo esc_attr( $pid ); ?>"
                    aria-label="<?php printf( esc_attr__( 'Add %s to wishlist', 'motta-child' ), esc_attr( $product->get_name() ) ); ?>"
                    aria-pressed="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </button>
        </div>
        <div class="tz-pcard__body">
            <h3 class="tz-pcard__title"><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $product->get_name() ); ?></a></h3>
            <div class="tz-pcard__seller">
                <div class="tz-pcard__avatar"><?php echo get_avatar( $vendor_id, 28, '', esc_attr( $seller ) ); ?></div>
                <div class="tz-pcard__seller-meta">
                    <span class="tz-pcard__seller-name"><?php echo esc_html( strtoupper( $seller ) ); ?></span>
                    <?php if ( $has_badge ) : ?>
                        <div class="tz-pcard__stars tz-pcard__badge-row"><svg class="tz-pcard__badge-icon" viewBox="0 0 10 10" fill="currentColor"><path d="M5 0.5l1.2 2.4 2.7.4-1.95 1.9.46 2.7L5 6.7 2.59 7.9l.46-2.7L1.1 3.3l2.7-.4z" stroke="currentColor" stroke-width="0.4"/></svg><span class="tz-pcard__badge-label">Verified</span></div>
                    <?php elseif ( $rating > 0 ) : ?>
                        <div class="tz-pcard__stars"><?php for ( $i = 1; $i <= 5; $i++ ) : ?><svg width="10" height="10" viewBox="0 0 10 10"><polygon fill="<?php echo ( $i <= round( $rating ) ) ? '#161A17' : '#E5E0DA'; ?>" points="5,1 6.2,3.8 9.5,4.1 7,6.3 7.8,9.5 5,7.8 2.2,9.5 3,6.3 0.5,4.1 3.8,3.8"/></svg><?php endfor; ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="tz-pcard__row">
                <div class="tz-pcard__prices">
                    <span class="tz-pcard__price"><?php echo esc_html( $currency . number_format( $sale, 2 ) ); ?></span>
                    <span class="tz-pcard__price-old"><?php echo esc_html( $currency . number_format( $regular, 2 ) ); ?></span>
                </div>
                <?php if ( $ship ) : ?><span class="tz-pcard__ship"><?php esc_html_e( 'Free Shipping', 'motta-child' ); ?></span><?php endif; ?>
            </div>
        </div>
    </li>
    <?php
}
?>

<section class="tz-sale" aria-label="Up to 50% off">

    <div class="tz-section-head">
        <a href="<?php echo esc_url( $sale_link ); ?>" class="tz-section-head__title-link"
           aria-label="<?php esc_attr_e( 'Voir tous les produits en promotion', 'motta-child' ); ?>">
            <h2 class="tz-section-head__title">Up to 50% off</h2>
        </a>
        <a href="<?php echo esc_url( $sale_link ); ?>" class="tz-section-head__arrow"
           aria-label="<?php esc_attr_e( 'Voir tous les produits en promotion', 'motta-child' ); ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
    </div>

    <div class="tinza-sale__pager">

        <button class="tinza-sale__arrow tinza-sale__arrow--prev" type="button"
                aria-label="<?php esc_attr_e( 'Précédent', 'motta-child' ); ?>" disabled>&#8249;</button>

        <div class="tinza-sale__pages">

            <!-- PAGE 1 : 5 produits normaux -->
            <div class="tinza-sale__page is-active" data-page="0">
                <ul class="tz-sale__grid" role="list">
                    <?php foreach ( $page1 as $item ) : tinza_render_sale_card( $item, $currency ); endforeach; ?>
                </ul>
            </div>

            <!-- PAGE 2 : 4 produits normaux + 1 carte Voir Plus (sans flou) -->
            <div class="tinza-sale__page" data-page="1">
                <ul class="tz-sale__grid" role="list">
                    <?php foreach ( $page2 as $item ) : tinza_render_sale_card( $item, $currency ); endforeach; ?>
                    <!-- Carte Voir Plus : image vide, bouton centré -->
                    <li class="tz-pcard tz-pcard--voir-plus">
                        <div class="tz-pcard__img tz-pcard__img--vp">
                            <a href="<?php echo esc_url( $sale_link ); ?>"
                               class="tz-pcard__voir-plus-cta">
                                <span class="tz-pcard__voir-plus">See All</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

        </div><!-- /.tinza-sale__pages -->

        <button class="tinza-sale__arrow tinza-sale__arrow--next" type="button"
                aria-label="<?php esc_attr_e( 'Suivant', 'motta-child' ); ?>">&#8250;</button>

    </div><!-- /.tinza-sale__pager -->

</section>


