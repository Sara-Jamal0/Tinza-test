<?php
/**
 * ────────────────────────────────────────────────────────────
 * LOCATION: motta-child/template-parts/slider.php
 * ────────────────────────────────────────────────────────────
 * Hero Slider template part
 *
 * Layout (paired with slider.css) :
 *   - DESKTOP : [Text block left]  +  [Image right]
 *   - MOBILE  : [Image top] + [Text + button bottom]
 *
 * Swiper config :
 *   - Autoplay  : 5s, no pause on hover
 *   - Loop      : infinite
 *   - No arrows : navigation hidden
 *   - No dots   : pagination hidden
 *
 * Each slide configurable via :
 *   - title    : main heading
 *   - subtitle : uppercase line below divider
 *   - btn_text : button label
 *   - btn_link : button URL
 *   - img_url  : hero image URL
 *   - img_alt  : image alt text
 *
 * Usage :
 *   get_template_part( 'template-parts/slider' );
 * ────────────────────────────────────────────────────────────
 */

defined( 'ABSPATH' ) || exit;


/* ────────────────────────────────────────────────────────────
   LOAD SLIDES
   Priority 1 : tinza_slide CPT (admin WP)
   Priority 2 : Static fallback array
   ──────────────────────────────────────────────────────────── */
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
            'btn_link' => wc_get_page_permalink( 'shop' ),
            'img_url'  => TINZA_URI . '/assets/images/hero-bathroom.png',
            'img_alt'  => 'Handcrafted copper bathroom with freestanding tub',
        ],

        /* Slide 2 — Unlacquered Brass */
        [
            'title'    => 'Unlacquered Brass',
            'subtitle' => 'Beauty that ages gracefully',
            'btn_text' => 'Get Inspired',
            'btn_link' => wc_get_page_permalink( 'shop' ),
            'img_url'  => TINZA_URI . '/assets/images/hero-unlacquered-brass.jpeg',
            'img_alt'  => 'Unlacquered brass kitchen faucet and farmhouse sink',
        ],

        /* Slide 3 — Lighting */
        [
            'title'    => 'Light up your space',
            'subtitle' => 'With copper warmth',
            'btn_text' => 'Get Inspired',
            'btn_link' => get_term_link( 'lighting', 'product_cat' ),
            'img_url'  => TINZA_URI . '/assets/images/hero-lighting.png',
            'img_alt'  => 'Copper pendant lights above a dining table',
        ],

    ] );
}
?>

<!-- ════════════════════════════════════════════════════════
     HERO SLIDER — Autoplay, no arrows, no dots
     CSS : assets/css/slider.css
     JS  : Swiper init via wp_add_inline_script in functions.php
     ════════════════════════════════════════════════════════ -->
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

        <!-- No arrows — no pagination — autoplay only -->

    </div><!-- /.tinza-slider__swiper -->

</section>

