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
        <p class="track-sub">
            Enter your details to see the progress of your artisanal pieces, 
            from the workshop to your doorstep.
        </p>
        <div class="track-card">
        <div class="track-field">
            <label for="order-id">Order ID</label>
            <input type="text" id="order-id" placeholder="e.g. TNZ-5829-X" />
        </div>
        <div class="track-field">
            <label for="email">Email Address</label>
            <input type="email" id="email" placeholder="email@example.com" />
        </div>
        <button class="track-btn">Track Order</button>
        </div>
        <p class="track-footer">
        Need help? <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>">Contact our team</a> · <a href="#">Back to shop</a>
        </p>
    </div>
</div>