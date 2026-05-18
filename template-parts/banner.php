<?php
/**
 * Tinza — template-parts/banner.php
 * Fix — Desktop : Banner.jpeg / Mobile : Banner-mobile.jpeg
 */
defined( 'ABSPATH' ) || exit;
?>
 
<section class="tinza-banner"
         aria-label="<?php esc_attr_e( 'Featured banner', 'motta-child' ); ?>">
 
    <div class="tinza-banner__wrap">
 
        <picture>
            <!-- Image mobile — chargée uniquement sur ≤ 768px -->
            <source media="(max-width: 768px)"
                    srcset="<?php echo esc_url( TINZA_URI . '/assets/images/Banner-mobile.jpeg' ); ?>">
 
            <!-- Image desktop — chargée par défaut -->
            <img class="tinza-banner__img"
                 src="<?php echo esc_url( TINZA_URI . '/assets/images/Banner.jpeg' ); ?>"
                 alt="<?php esc_attr_e( 'Handmade pieces that tell a story in every shine', 'motta-child' ); ?>"
                 width="1324"
                 height="662"
                 loading="lazy">
        </picture>
 
    </div>
 
</section>

