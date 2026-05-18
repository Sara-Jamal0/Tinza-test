<?php
/**
 * Section: Popular Products
 * =============================================================================
 */

$args = [
    'post_type'      => 'product',
    'posts_per_page' => 4,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'tax_query'      => [[
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
    ]],
];
$products = new WP_Query( $args );

if ( ! $products->have_posts() ) {
    $products = new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => 4,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
}
?>

<!-- CHANGEMENT 1: classe 'tz-products' au lieu de 'tinza-section tinza-products' -->
<section class="tz-products" id="popular-products" aria-label="Popular Products">
    
    <!-- CHANGEMENT 2: structure du header -->
    <div class="tz-section-head">
        <h2 class="tz-section-head__title">POPULAR PRODUCTS</h2>
        <a href="/shop" class="tz-section-head__arrow" aria-label="View all products">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    <?php if ( $products->have_posts() ) : ?>
    
    <!-- CHANGEMENT 3: 'tz-products__grid' et on utilise UL -->
    <ul class="tz-products__grid">

        <?php while ( $products->have_posts() ) : $products->the_post();
            global $product;
            $product = wc_get_product( get_the_ID() );
            if ( ! $product ) continue;

            $image_url = $product->get_image_id()
                ? wp_get_attachment_image_url( $product->get_image_id(), 'woocommerce_thumbnail' )
                : wc_placeholder_img_src();
            $permalink = get_permalink();
            $title     = get_the_title();
            $rating    = $product->get_average_rating();
            
            // CORRECTION: free shipping
            $has_free = ( ! $product->get_shipping_class_id() && ! $product->is_virtual() );
            
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
        ?>

        <!-- CHANGEMENT 4: 'tz-pcard' au lieu de 'tinza-product-card' -->
        <li class="tz-pcard">

            <!-- Image -->
            <div class="tz-pcard__img">
                <a href="<?php echo esc_url( $permalink ); ?>">
                    <img src="<?php echo esc_url( $image_url ); ?>"
                         alt="<?php echo esc_attr( $title ); ?>"
                         loading="lazy"
                         width="315"
                         height="315">
                </a>

                <!-- Wishlist button -->
                <button class="tz-pcard__wish js-wish"
                        type="button"
                        aria-label="Add <?php echo esc_attr( $title ); ?> to wishlist"
                        data-product-id="<?php echo esc_attr( get_the_ID() ); ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="tz-pcard__body">
                <!-- Seller row -->
                <div class="tz-pcard__seller">
                    <span class="tz-pcard__avatar"></span>
                    <div class="tz-pcard__seller-meta">
                        <span class="tz-pcard__seller-name">THE SHOP</span>
                        <?php if ( $rating > 0 ) : ?>
                        <div class="tz-pcard__stars">
                            <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                            <svg viewBox="0 0 10 10" 
                                 fill="<?php echo $i <= round($rating) ? '#161A17' : 'none'; ?>">
                                <path d="M5 1l1.12 2.27L9 3.64l-2 1.95.47 2.75L5 7l-2.47 1.34L3 5.59 1 3.64l2.88-.37z" stroke="#161A17" stroke-width="0.5"/>
                            </svg>
                            <?php endfor; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Title -->
                <h3 class="tz-pcard__title">
                    <a href="<?php echo esc_url( $permalink ); ?>">
                        <?php echo esc_html( $title ); ?>
                    </a>
                </h3>

                <!-- Price row -->
                <div class="tz-pcard__row">
                    <div class="tz-pcard__prices">
                        <?php if ( $sale_price && $regular_price > $sale_price ) : ?>
                            <span class="price-sale"><?php echo wc_price( $sale_price ); ?></span>
                            <span class="price-old"><?php echo wc_price( $regular_price ); ?></span>
                        <?php else : ?>
                            <span class="price-current"><?php echo wc_price( $regular_price ); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if ( $has_free ) : ?>
                    <span class="tz-pcard__ship">Free Shipping</span>
                    <?php endif; ?>
                    
                </div>

            </div>

        </li>

        <?php endwhile; wp_reset_postdata(); ?>
    </ul>

    <?php else : ?>
    <p class="tz-products__empty">No products found.</p>
    <?php endif; ?>

</section>
