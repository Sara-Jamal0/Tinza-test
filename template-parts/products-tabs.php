<?php
/**
 * Tinza — Products Tabs
 * 4 onglets : Popular | New Arrivals | We Think | Most Viewed
 * Utilise les fonctions tinza_get_*() de functions.php
 */
defined( 'ABSPATH' ) || exit;

$tabs = [
    'popular' => [
        'label'    => __( 'Popular Products', 'motta-child' ),
        'products' => tinza_get_popular( 4 ),
    ],
    'new-arrivals' => [
        'label'    => __( 'New Arrivals', 'motta-child' ),
        'products' => tinza_get_new( 4 ),
    ],
    'we-love' => [
        'label'    => __( "We Think You'll Love", 'motta-child' ),
        'products' => tinza_get_recommended( 4 ),
    ],
    'most-viewed' => [
        'label'    => __( 'Most Viewed Products', 'motta-child' ),
        'products' => tinza_get_viewed( 4 ),
    ],
];

$tab_keys   = array_keys( $tabs );
$active_tab = $tab_keys[0];
?>

<section class="tinza-tabs" aria-label="<?php esc_attr_e( 'Featured Products', 'motta-child' ); ?>">

    <!-- TABS NAV -->
    <ul class="tinza-tabs__nav" role="tablist">
        <?php foreach ( $tabs as $slug => $tab ) :
            $is_active = ( $slug === $active_tab );
        ?>
        <li class="tinza-tabs__item" role="presentation">
            <button class="tinza-tabs__btn<?php echo $is_active ? ' is-active' : ''; ?>"
                    type="button"
                    role="tab"
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

    <!-- TABS PANELS -->
    <div class="tinza-tabs__panels">
        <?php foreach ( $tabs as $slug => $tab ) :
            $is_active = ( $slug === $active_tab );
            $products  = $tab['products'];
        ?>

        <div class="tinza-tabs__panel<?php echo $is_active ? ' is-active' : ''; ?>"
             id="tab-panel-<?php echo esc_attr( $slug ); ?>"
             role="tabpanel"
             aria-labelledby="tab-btn-<?php echo esc_attr( $slug ); ?>"
             <?php echo $is_active ? '' : 'hidden'; ?>>

            <?php if ( ! empty( $products ) ) : ?>

            <ul class="tinza-products" role="list">

                <?php foreach ( $products as $product ) :

                    $pid     = $product->get_id();
                    $img_id  = $product->get_image_id();
                    $img_url = $img_id
                        ? wp_get_attachment_image_url( $img_id, 'tinza-card' )
                        : wc_placeholder_img_src( 'tinza-card' );
                    $img_alt = $img_id
                        ? ( get_post_meta( $img_id, '_wp_attachment_image_alt', true ) ?: $product->get_name() )
                        : $product->get_name();
                    $link    = $product->get_permalink();
                    $rating  = (float) $product->get_average_rating();

                    /* Nom vendeur Dokan */
                    if ( function_exists( 'dokan_get_store_info' ) ) {
                        $store = dokan_get_store_info( $product->get_post_data()->post_author );
                        $seller = ! empty( $store['store_name'] ) ? $store['store_name'] : 'The Shop';
                    } else {
                        $seller = get_the_author_meta( 'display_name', $product->get_post_data()->post_author );
                        if ( ! $seller ) $seller = 'The Shop';
                    }

                    $free_ship = true; /* tous les produits Tinza ont Free Shipping */
                ?>

                <li class="tinza-card" itemscope itemtype="https://schema.org/Product">

                    <div class="tinza-card__img">
                        <a href="<?php echo esc_url( $link ); ?>" tabindex="-1" aria-hidden="true">
                            <img src="<?php echo esc_url( $img_url ); ?>"
                                 alt="<?php echo esc_attr( $img_alt ); ?>"
                                 width="420" height="420"
                                 loading="lazy" itemprop="image">
                        </a>
                    </div>

                    <div class="tinza-card__body">

                        <h3 class="tinza-card__name" itemprop="name">
                            <a href="<?php echo esc_url( $link ); ?>">
                                <?php echo esc_html( $product->get_name() ); ?>
                            </a>
                        </h3>

                        <div class="tinza-card__seller">
                            <div class="tinza-card__avatar">
                                <?php echo get_avatar(
                                    $product->get_post_data()->post_author,
                                    32,
                                    '',
                                    $seller
                                ); ?>
                            </div>
                            <div class="tinza-card__seller-info">
                                <span class="tinza-card__seller-name">
                                    <?php echo esc_html( $seller ); ?>
                                </span>
                                <?php if ( $rating > 0 ) : ?>
                                <div class="tinza-card__stars" aria-label="Rating <?php echo esc_attr( $rating ); ?>/5">
                                    <?php for ( $s = 1; $s <= 5; $s++ ) :
                                        $fill = ( $s <= round( $rating ) )
                                            ? 'var(--color-text)' : 'var(--color-border)';
                                    ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                                        <polygon fill="<?php echo $fill; ?>"
                                                 points="5,1 6.2,3.8 9.5,4.1 7,6.3 7.8,9.5 5,7.8 2.2,9.5 3,6.3 0.5,4.1 3.8,3.8"/>
                                    </svg>
                                    <?php endfor; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="tinza-card__footer">
                            <span class="tinza-card__price" itemprop="offers"
                                  itemscope itemtype="https://schema.org/Offer">
                                <?php echo wp_kses_post( $product->get_price_html() ); ?>
                            </span>
                            <?php if ( $free_ship ) : ?>
                            <span class="tinza-card__badge">Free Shipping</span>
                            <?php endif; ?>
                        </div>

                    </div>
                </li>

                <?php endforeach; ?>

            </ul>

            <?php else : ?>
                <p class="tinza-no-products">
                    <?php esc_html_e( 'No products to display.', 'motta-child' ); ?>
                </p>
            <?php endif; ?>

        </div>

        <?php endforeach; ?>

    </div>

</section>