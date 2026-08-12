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
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sitemap0.webp" alt="Handcrafted copper bowl" />
            </div>
            <div class="img-wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sitemap1.webp" alt="Artisan crafting brass" />
            </div>
        </div>
    </div>

    <section class="sitemap-grid">
        <div class="sitemap-col">
            <h3 class="col-title"><i class="ph-bathtub"></i> Bathroom</h3>
            <div class="category-group">
                <ul>
                    <li><a href="<?php echo esc_url(get_term_link('bathroom-accessories', 'product_cat')); ?>">Bathroom Accessories</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('bathroom-sinks', 'product_cat')); ?>">Bathroom Sinks</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('bathroom-faucets', 'product_cat')); ?>">Bathroom Faucets</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('bathtubs', 'product_cat')); ?>">Bathtubs</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('bathroom-mirrors', 'product_cat')); ?>">Bathroom Mirrors</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('bathroom-wall-sconces', 'product_cat')); ?>">Bathroom Wall Sconces</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('hand-towel-rings', 'product_cat')); ?>">Hand Towel Rings</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('shelving', 'product_cat')); ?>">Shelving</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('shower-rods', 'product_cat')); ?>">Shower Rods</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('shower-systems', 'product_cat')); ?>">Shower systems</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('soap-dispensers-and-dishes', 'product_cat')); ?>">Soap Dispensers and Dishes</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('toilet-brush-holders', 'product_cat')); ?>">Toilet Brush Holders</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('toilet-paper-holders', 'product_cat')); ?>">Toilet Paper Holders</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('towel-bars-and-hooks', 'product_cat')); ?>">Towel Bars and Hooks</a></li> 
                    <li><a href="<?php echo esc_url(get_term_link('towel-racks', 'product_cat')); ?>">Towel Racks</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('towel-warmers', 'product_cat')); ?>">Towel warmers</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('waste-bins', 'product_cat')); ?>">Waste Bins</a></li>
                </ul>
            </div>
        </div>

        <div class="sitemap-col">
            <h3 class="col-title"><i class="ph-cooking-pot"></i> Kitchen</h3>
            <div class="category-group">
                <ul>
                    <li><a href="<?php echo esc_url(get_term_link('kitchen-sinks', 'product_cat')); ?>">Kitchen Sinks</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('kitchen-faucets', 'product_cat')); ?>">Kitchen Faucets</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('kitchen-lighting', 'product_cat')); ?>">Kitchen Lighting</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('pot-racks', 'product_cat')); ?>">Pot Racks</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('kitchen-accessories', 'product_cat')); ?>">Kitchen Accessories</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('kitchen-tables', 'product_cat')); ?>">Kitchen Tables</a></li>
                </ul>
            </div>

            <h3 class="col-title" style="margin-top: 30px;"><i class="ph-table"></i> Furniture</h3>
            <div class="category-group">
                <ul>
                    <li><a href="<?php echo esc_url(get_term_link('tables', 'product_cat')); ?>">Tables</a></li>
                </ul>
            </div>

            <h3 class="col-title"><i class="ph-confetti"></i> Accessories</h3>
            <div class="category-group">
                <ul>
                    <li><a href="<?php echo esc_url(get_term_link('accessories', 'product_cat')); ?>">View All Accessories</a></li>
                </ul>
            </div>
        </div>


        <div class="sitemap-col">
            <h3 class="col-title"><i class="ph-lightbulb"></i> Lighting</h3>
            <div class="category-group">
                <ul>
                    <li><a href="<?php echo esc_url(get_term_link('floor-lamps', 'product_cat')); ?>">Floor Lamps</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('pendant-lights', 'product_cat')); ?>">Pendant Lights</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('table-lamps', 'product_cat')); ?>">Table Lamps</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('wall-sconces', 'product_cat')); ?>">Wall Sconces</a></li>
                </ul>
            </div>

            <h3 class="col-title" style="margin-top: 30px;"><i class="ph-frame-corners"></i> Mirrors</h3>
            <div class="category-group">
                <ul>
                    <li><a href="<?php echo esc_url(get_term_link('wall-mounted-mirrors', 'product_cat')); ?>">Wall-Mounted Mirrors</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('floor-mirrors', 'product_cat')); ?>">Floor Mirrors</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('hanging-strap', 'product_cat')); ?>">Hanging Strap Mirrors</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('mirrors-pivot-mirrors', 'product_cat')); ?>">Pivot Mirrors</a></li>
                </ul>
            </div>

            <h3 class="col-title" style="margin-top: 30px;"><i class="ph-tree"></i> Outdoor & Garden</h3>
            <div class="category-group">
                <ul>
                    <li><a href="<?php echo esc_url(get_term_link('shower-systems', 'product_cat')); ?>">Shower systems</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('shower-head', 'product_cat')); ?>">Shower head</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('outdoor-wall-sconces', 'product_cat')); ?>">Outdoor Wall Sconces</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('outdoor-pendant-lights', 'product_cat')); ?>">Outdoor Pendant Lights</a></li>
                    <li><a href="<?php echo esc_url(get_term_link('outdoor-faucets', 'product_cat')); ?>">Outdoor faucets</a></li>
                </ul>
            </div>
        </div>   

        <div class="sitemap-col">

            <h3 class="col-title" style="margin-top: 30px;"><i class="ph-info"></i> Information</h3>
            <ul>
                <li><a href="<?php echo get_permalink(get_page_by_path('about')); ?>">About Us</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>">Contact Us</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('tracking-order')); ?>">Track Order</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('help-center')); ?>">Help Center</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('shipping-and-delivery')); ?>">Shipping & Delivery</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('return-and-exchange')); ?>">Returns & Exchanges</a></li>
            </ul>

            <h3 class="col-title" style="margin-top: 30px;"><i class="ph-scales"></i> Legal</h3>
            <ul>
                <li><a href="<?php echo get_permalink(get_page_by_path('privacy-policy')); ?>">Privacy Policy</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('terms-of-use')); ?>">Terms of Use</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('legal')); ?>">Legal</a></li>
            </ul>
        </div>        
    </section>
    <div class="promo-box">
            <p>Looking for something specific? Use our curated collections to find pieces by technique or artisan.</p>
        </div>
</body>

<?php get_footer(); ?>