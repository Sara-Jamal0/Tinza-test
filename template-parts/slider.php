<?php
/**
 * Section: Hero Slider
 */
defined( 'ABSPATH' ) || exit;



$slides = [];

if ( post_type_exists( 'tinza_slide' ) ) {

    $q = new WP_Query( [
        'post_type'      => 'tinza_slide',
        'posts_per_page' => 5,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'post_status'    => 'publish',
    ] );

    while ( $q->have_posts() ) {
        $q->the_post();
        $img_id = get_post_thumbnail_id();

        $slides[] = [
            'title'    => get_the_title(),
            'subtitle' => get_the_excerpt(),
            'btn_text' => get_post_meta( get_the_ID(), '_slide_btn_text', true ) ?: 'Get Inspired',
            'btn_link' => get_post_meta( get_the_ID(), '_slide_btn_link', true ) ?: wc_get_page_permalink( 'shop' ),
            'img_url'  => $img_id ? wp_get_attachment_image_url( $img_id, 'tinza-hero' ) : '',
            'img_alt'  => get_post_meta( $img_id, '_wp_attachment_image_alt', true ) ?: get_the_title(),
        ];
    }
    wp_reset_postdata();
}

/* ────────────────────────────────────────────────────────────
   Static fallback — 3 slides
   Images : motta-child/assets/images/
   ──────────────────────────────────────────────────────────── */
if ( empty( $slides ) ) {
    $slides = apply_filters( 'tinza_slider_slides', [

        /* Slide 1 — Bathroom */
        [
            'title'    => 'Elevate your bathroom',
            'subtitle' => 'With copper elegance',
            'btn_text' => 'Get Inspired',
            'btn_link' => add_query_arg( [ 'post_type' => 'product', 's' => 'Aged Copper' ], home_url( '/' ) ),
            'img_url'  => TINZA_URI . '/assets/images/hero-bathroom.webp',
            'img_alt'  => 'Handcrafted copper bathroom with freestanding tub',
        ],

        /* Slide 2 — Unlacquered Brass */
        [
            'title'    => 'Unlacquered Brass',
            'subtitle' => 'Beauty that ages gracefully',
            'btn_text' => 'Get Inspired',
            'btn_link' => add_query_arg( [ 'post_type' => 'product', 's' => 'Unlacquered Brass' ], home_url( '/' ) ),
            'img_url'  => TINZA_URI . '/assets/images/hero-unlacquered-brass.webp',
            'img_alt'  => 'Unlacquered brass kitchen faucet and farmhouse sink',
        ],

        /* Slide 3 — Lighting */
        [
            'title'    => 'Light up your space',
            'subtitle' => 'With copper warmth',
            'btn_text' => 'Get Inspired',
            'btn_link' => get_term_link( 'lighting', 'product_cat' ),
            'img_url'  => TINZA_URI . '/assets/images/hero-lighting.webp',
            'img_alt'  => 'Copper pendant lights above a dining table',
        ],

    ] );
}
?>


<section class="tinza-slider" aria-label="<?php esc_attr_e( 'Featured collection', 'tinza-child' ); ?>">

    <div class="swiper tinza-slider__swiper">

        <div class="swiper-wrapper">

            <?php foreach ( $slides as $slide ) : ?>

            <div class="swiper-slide tinza-slider__slide">

                <!-- TEXT BLOCK (left desktop / bottom mobile) -->
                <div class="tinza-slider__text">

                    <h2 class="tinza-slider__title">
                        <?php echo esc_html( $slide['title'] ); ?>
                    </h2>

                    <span class="tinza-slider__divider" aria-hidden="true"></span>

                    <?php if ( ! empty( $slide['subtitle'] ) ) : ?>
                    <p class="tinza-slider__sub">
                        <?php echo esc_html( $slide['subtitle'] ); ?>
                    </p>
                    <?php endif; ?>

                    <a href="<?php echo esc_url( $slide['btn_link'] ); ?>"
                       class="tinza-slider__btn">
                        <?php echo esc_html( $slide['btn_text'] ); ?>
                    </a>

                </div><!-- /.tinza-slider__text -->

                <!-- IMAGE BLOCK (right desktop / top mobile) -->
                <div class="tinza-slider__image">
                    <img src="<?php echo esc_url( $slide['img_url'] ); ?>"
                         alt="<?php echo esc_attr( $slide['img_alt'] ); ?>"
                         loading="eager"
                         fetchpriority="high">
                </div>

            </div><!-- /.swiper-slide -->

            <?php endforeach; ?>

        </div><!-- /.swiper-wrapper -->


    </div><!-- /.tinza-slider__swiper -->

</section>



