<?php
    /**
     * Template Name: Track Order Page
     */

    // Remove the page header ONLY for this page
    add_action('wp_head', function() {
        if (is_page('track-order')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();

?>
<div class="track-order-wrapper">
    <div class="track-inner">
        <h1 class="track-heading">Track Your <span>Order</span></h1>
        
        <div class="track-card-container">
            <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
        </div>
        
        <div class="track-footer">
            Need help? <a href="#">Contact our team</a> · <a href="#">Back to shop</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>