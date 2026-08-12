<?php
/**
 * Tinza — Products Tabs
 */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'tinza_vendor_has_badge' ) ) {
    function tinza_vendor_has_badge( $vendor_id ) {
        if ( ! function_exists( 'dokan_pro' ) ) return false;
        $cls = 'WeDevs\\DokanPro\\Modules\\VendorBadge\\Badge';
        if ( ! class_exists( $cls ) ) return false;
        return ! empty( $cls::get_earned_badges( absint( $vendor_id ) ) );
    }
}

$tabs = [
    'popular' => [
        'label'     => __( 'Popular Products', 'motta-child' ),
        'products'  => tinza_get_popular( 10 ),
        'voir_plus' => add_query_arg( 'orderby', 'popularity', wc_get_page_permalink( 'shop' ) ),
    ],
    'new-arrivals' => [
        'label'     => __( 'New Arrivals', 'motta-child' ),
        'products'  => tinza_get_new( 10 ),
        'voir_plus' => add_query_arg( 'orderby', 'date', wc_get_page_permalink( 'shop' ) ),
    ],
    'we-love' => [
        'label'     => __( "We Think You'll Love", 'motta-child' ),
        'products'  => tinza_get_recommended( 10 ),
        'voir_plus' => wc_get_page_permalink( 'shop' ),
    ],
    'most-viewed' => [
        'label'     => __( 'Most Viewed Products', 'motta-child' ),
        'products'  => tinza_get_viewed( 10 ),
        'voir_plus' => add_query_arg( 'orderby', 'popularity', wc_get_page_permalink( 'shop' ) ),
    ],
];

$first_tab = array_key_first( $tabs );
?>

<section class="tinza-tabs" aria-label="<?php esc_attr_e( 'Featured Products', 'motta-child' ); ?>">

    <ul class="tinza-tabs__nav" role="tablist">
        <?php foreach ( $tabs as $slug => $tab ) :
            $is_active = ( $slug === $first_tab );
        ?>
        <li class="tinza-tabs__item" role="presentation">
            <button class="tinza-tabs__btn<?php echo $is_active ? ' is-active' : ''; ?>"
                    type="button" role="tab"
                    id="tab-btn-<?php echo esc_attr( $slug ); ?>"
                    data-tab="tab-panel-<?php echo esc_attr( $slug ); ?>"
                    aria-controls="tab-panel-<?php echo esc_attr( $slug ); ?>"
                    aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                    tabindex="<?php echo $is_active ? '0' : '-1'; ?>">
                <?php echo esc_html( $tab['label'] ); ?>
            </button>
        </li>
        <?php endforeach; ?>
    </ul>

    <div class="tinza-tabs__panels">
        <?php foreach ( $tabs as $slug => $tab ) :
            $is_active = ( $slug === $first_tab );
            $products  = $tab['products'];
            $voir_plus = $tab['voir_plus'];
            $pages     = array_chunk( $products, 5 );
        ?>

        <div class="tinza-tabs__panel<?php echo $is_active ? ' is-active' : ''; ?>"
             id="tab-panel-<?php echo esc_attr( $slug ); ?>"
             role="tabpanel"
             aria-labelledby="tab-btn-<?php echo esc_attr( $slug ); ?>"
             <?php echo $is_active ? '' : 'hidden'; ?>>

            <?php if ( ! empty( $products ) ) : ?>

            <div class="tinza-tabs__pager">

                <button class="tinza-tabs__arrow tinza-tabs__arrow--prev"
                        type="button"
                        aria-label="<?php esc_attr_e( 'Précédent', 'motta-child' ); ?>"
                        disabled>&#8249;</button>

                <div class="tinza-tabs__pages">

                    <?php foreach ( $pages as $page_idx => $page_products ) : ?>

                    <div class="tinza-tabs__page<?php echo $page_idx === 0 ? ' is-active' : ''; ?>"
                         data-page="<?php echo esc_attr( $page_idx ); ?>">

                        <ul class="tinza-products" role="list">

                            <?php foreach ( $page_products as $card_idx => $product ) :
                                if ( ! $product instanceof WC_Product ) continue;

                                $is_last       = ( $card_idx === count( $page_products ) - 1 );
                                $pid           = $product->get_id();
                                $img_id        = $product->get_image_id();
                                $img_url       = $img_id ? wp_get_attachment_image_url( $img_id, 'tinza-card' ) : wc_placeholder_img_src( 'tinza-card' );
                                $img_alt       = $img_id ? ( get_post_meta( $img_id, '_wp_attachment_image_alt', true ) ?: $product->get_name() ) : $product->get_name();
                                $link          = $product->get_permalink();
                                $rating        = (float) $product->get_average_rating();
                                $vendor_id     = (int) $product->get_post_data()->post_author;

                                if ( function_exists( 'dokan_get_store_info' ) ) {
                                    $store  = dokan_get_store_info( $vendor_id );
                                    $seller = ! empty( $store['store_name'] ) ? $store['store_name'] : 'The Shop';
                                } else {
                                    $seller = get_the_author_meta( 'display_name', $vendor_id ) ?: 'The Shop';
                                }

                                $has_badge     = tinza_vendor_has_badge( $vendor_id );
                                $free_ship     = function_exists( 'tinza_has_free_shipping' ) ? tinza_has_free_shipping( $pid ) : ( get_post_meta( $pid, '_dokan_free_shipping', true ) === 'yes' );
                                $regular_price = $product->get_regular_price();
                                $sale_price    = $product->get_sale_price();
                                $currency      = get_woocommerce_currency_symbol();
                                $is_on_sale    = ( $sale_price !== '' && (float) $sale_price < (float) $regular_price );
                            ?>

                            <li class="tinza-card<?php echo $is_last ? ' tinza-card--blurred' : ''; ?>"
                                itemscope itemtype="https://schema.org/Product">

                                <div class="tinza-card__img">
                                    <a href="<?php echo esc_url( $link ); ?>" tabindex="-1" aria-hidden="true">
                                        <img src="<?php echo esc_url( $img_url ); ?>"
                                             alt="<?php echo esc_attr( $img_alt ); ?>"
                                             width="420" height="420"
                                             loading="lazy" itemprop="image">
                                    </a>

                                    <?php if ( $is_last ) : ?>
                                    <div class="tinza-card__voir-plus-overlay">
                                        <a href="<?php echo esc_url( $voir_plus ); ?>"
                                           class="tinza-card__voir-plus"
                                           aria-label="<?php esc_attr_e( 'Voir plus de produits', 'motta-child' ); ?>">
                                            <?php esc_html_e( 'Voir Plus', 'motta-child' ); ?>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <button type="button"
                                            class="tinza-card__wish js-wish"
                                            data-product-id="<?php echo esc_attr( $pid ); ?>"
                                            aria-label="<?php printf( esc_attr__( 'Add %s to wishlist', 'motta-child' ), esc_attr( $product->get_name() ) ); ?>"
                                            aria-pressed="false">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="tinza-card__body">

                                    <h3 class="tinza-card__name" itemprop="name">
                                        <a href="<?php echo esc_url( $link ); ?>">
                                            <?php echo esc_html( $product->get_name() ); ?>
                                        </a>
                                    </h3>

                                    <div class="tinza-card__seller">
                                        <div class="tinza-card__avatar">
                                            <?php echo get_avatar( $vendor_id, 24, '', esc_attr( $seller ) ); ?>
                                        </div>
                                        <div class="tinza-card__seller-info">
                                            <span class="tinza-card__seller-name">
                                                <?php echo esc_html( $seller ); ?>
                                            </span>
                                            <?php if ( $has_badge ) : ?>
                                                <div class="tinza-card__stars tz-pcard__badge-row" aria-label="Verified Vendor">
                                                    <svg class="tz-pcard__badge-icon" viewBox="0 0 10 10" fill="currentColor" aria-hidden="true">
                                                        <path d="M5 0.5l1.2 2.4 2.7.4-1.95 1.9.46 2.7L5 6.7 2.59 7.9l.46-2.7L1.1 3.3l2.7-.4z" stroke="currentColor" stroke-width="0.4"/>
                                                    </svg>
                                                    <span class="tz-pcard__badge-label">Verified</span>
                                                </div>
                                            <?php elseif ( $rating > 0 ) : ?>
                                                <div class="tinza-card__stars" aria-label="Rating <?php echo esc_attr( $rating ); ?>/5">
                                                    <?php for ( $s = 1; $s <= 5; $s++ ) : ?>
                                                    <svg width="8" height="8" viewBox="0 0 10 10" aria-hidden="true">
                                                        <polygon fill="<?php echo ( $s <= round( $rating ) ) ? 'var(--color-text)' : 'var(--color-border)'; ?>"
                                                                 points="5,1 6.2,3.8 9.5,4.1 7,6.3 7.8,9.5 5,7.8 2.2,9.5 3,6.3 0.5,4.1 3.8,3.8"/>
                                                    </svg>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="tz-pcard__row">
                                        <div class="tz-pcard__prices">
                                            <?php if ( $is_on_sale ) : ?>
                                                <span class="tz-pcard__price"><?php echo esc_html( $currency . number_format( (float) $sale_price, 2 ) ); ?></span>
                                                <span class="tz-pcard__price-old"><?php echo esc_html( $currency . number_format( (float) $regular_price, 2 ) ); ?></span>
                                            <?php else : ?>
                                                <span class="tz-pcard__price"><?php echo esc_html( $currency . number_format( (float) $regular_price, 2 ) ); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if ( $free_ship ) : ?>
                                    <span class="tinza-card__badge">Free Shipping</span>
                                    <?php endif; ?>

                                </div>
                            </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <?php endforeach; ?>

                </div><!-- /.tinza-tabs__pages -->

                <button class="tinza-tabs__arrow tinza-tabs__arrow--next"
                        type="button"
                        aria-label="<?php esc_attr_e( 'Suivant', 'motta-child' ); ?>">&#8250;</button>

            </div><!-- /.tinza-tabs__pager -->

            <?php else : ?>
                <p class="tinza-no-products"><?php esc_html_e( 'No products to display.', 'motta-child' ); ?></p>
            <?php endif; ?>

        </div>
        <?php endforeach; ?>
    </div>

</section>