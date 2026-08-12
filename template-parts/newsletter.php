<?php
/**
 * Section: Newsletter — Subscribe & Get 30% Off
 * =============================================================================
 * File    : motta-child/template-parts/sections/newsletter.php
 * Plugin  : MC4WP — Mailchimp for WordPress (already installed)
 * Form ID : 192  — found at MC4WP → Forms → Edit → URL param id=192
 * =============================================================================
 */
?>

<section class="tinza-newsletter" id="newsletter" aria-label="Newsletter signup">
    <div class="tinza-newsletter__inner">

        <!-- Left panel — white decorative card with X lines (CSS only) -->
        <div class="tinza-newsletter__deco" aria-hidden="true">
            <span class="tinza-newsletter__line tinza-newsletter__line--1"></span>
            <span class="tinza-newsletter__line tinza-newsletter__line--2"></span>
        </div>

        <!-- Right panel — title + MC4WP form -->
        <div class="tinza-newsletter__content">

            <h2 class="tinza-newsletter__title">
                Subscribe And Get<br>
                <strong>30% Off Your First Order</strong>
            </h2>

            <?php
            /**
             * MC4WP form — ID 192
             * The form markup is managed in MC4WP → Forms → Edit (id=192)
             * Recommended form markup in MC4WP editor:
             *
             * <p>
             *   <input type="email" name="EMAIL" placeholder="john@example.com" required />
             * </p>
             * <p>
             *   <input type="submit" value="Claim Coupon" />
             * </p>
             *
             * CSS overrides in newsletter.css target .mc4wp-form elements.
             */
            if ( function_exists( 'mc4wp_show_form' ) ) :
                echo do_shortcode( '[mc4wp_form id="192"]' );
            else : ?>
                <p class="tinza-newsletter__notice">
                    MC4WP plugin is not active.
                    Please activate <strong>Mailchimp for WordPress</strong>.
                </p>
            <?php endif; ?>

        </div>

    </div>
</section>