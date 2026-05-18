<?php
    /**
     * Template Name: Site Map Page
     */

    // Remove the page header ONLY for this page
    add_action('wp_head', function() {
        if (is_page('site-map')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });

    get_header();

?>

<body>
    <div class="hero-card">
        <div class="hero-text">
            <h1 class="hero-title">Sitemap</h1>
            <p class="hero-description">
                Browse Tinza's structure at a glance — curated navigation for handcrafted copper and brass home décor, organized for quick discovery and story-driven exploration.
            </p>
        </div>
    
        <div class="hero-images">
            <div class="img-wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pic 1.jpeg" alt="Handcrafted copper bowl" />
            </div>
            <div class="img-wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pic 1.jpeg" alt="Artisan crafting brass" />
            </div>
        </div>
    </div>

    <section class="sitemap-grid">
        <!-- Column 1: Shop Categories (Part 1) -->
        <div class="sitemap-col">
            <h3 class="col-title"><i class="ph-storefront"></i> Shop by Category</h3>
            <div class="category-group">
                <h4 class="sub-group-title">Kitchen & Dining</h4>
                <ul>
                    <li><a href="#">Cookware</a></li>
                    <li><a href="#">Drinkware</a></li>
                    <li><a href="#">Serving Sets</a></li>
                    <li><a href="#">Trays & Platters</a></li>
                    <li><a href="#">Pot Racks</a></li>
                </ul>
            </div>
            <div class="category-group">
                <h4 class="sub-group-title">Outdoor & Garden</h4>
                <ul>
                    <li><a href="#">Outdoor Furniture</a></li>
                    <li><a href="#">Planters & Pots</a></li>
                    <li><a href="#">Wind Chimes</a></li>
                </ul>
            </div>
        </div>

        <!-- Column 2: Shop Categories (Part 2) -->
        <div class="sitemap-col">
            <div class="category-group">
                <h4 class="sub-group-title">Lighting</h4>
                <ul>
                    <li><a href="#">Floor Lamps</a></li>
                    <li><a href="#">Pendant Lights</a></li>
                    <li><a href="#">Table Lamps</a></li>
                    <li><a href="#">Wall Sconces</a></li>
                </ul>
            </div>
            <div class="category-group">
                <h4 class="sub-group-title">Hardware & Fixtures</h4>
                <ul>
                    <li><a href="#">Faucets & Fixtures</a></li>
                    <li><a href="#">Drawer Pulls</a></li>
                    <li><a href="#">Handles & Knobs</a></li>
                    <li><a href="#">Curtain Rods</a></li>
                </ul>
            </div>
        </div>

        <!-- Column 3: Decor & Art -->
        <div class="sitemap-col">
            <div class="category-group">
                <h4 class="sub-group-title">Home Décor</h4>
                <ul>
                    <li><a href="#">Candle Holders</a></li>
                    <li><a href="#">Decorative Sculptures</a></li>
                    <li><a href="#">Incense Holders</a></li>
                    <li><a href="#">Vases & Planters</a></li>
                </ul>
            </div>
            <div class="category-group">
                <h4 class="sub-group-title">Wall Art & Mirrors</h4>
                <ul>
                    <li><a href="#">Framed Mirrors</a></li>
                    <li><a href="#">Picture Frames</a></li>
                    <li><a href="#">Wall Clocks</a></li>
                    <li><a href="#">Wall Sculptures</a></li>
                </ul>
            </div>
        </div>

        <!-- Column 4: Information & Legal -->
        <div class="sitemap-col">
            <h3 class="col-title"><i class="ph-info"></i> Information</h3>
            <ul>
                <li><a href="<?php echo get_permalink(get_page_by_path('about')); ?>">About Us</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>">Contact Us</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('track-order')); ?>">Track Order</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('help-center')); ?>">Help Center</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('shipping-delivery')); ?>">Shipping & Delivery</a></li>
            </ul>

            <h3 class="col-title" style="margin-top: 30px;"><i class="ph-scales"></i> Legal</h3>
            <ul>
                <li><a href="<?php echo get_permalink(get_page_by_path('privacy-policy')); ?>">Privacy Policy</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('terms-of-use')); ?>">Terms of Use</a></li>
            </ul>
        </div>        
</section>
    <div class="promo-box">
            <p>Looking for something specific? Use our curated collections to find pieces by technique or artisan.</p>
        </div>
</body>