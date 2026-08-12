<?php

    /**
     * Template Name: Shipping and Delivery Page
     */

    // Remove the page header ONLY for this page
    add_action('wp_head', function() {
        if (is_page('shipping-and-delivery')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });

    get_header();
?>



<body>

    <div class="tinza-shipping-page-wrapper">

        <!-- HERO -->
        <section class="hero-section">
            <div class="hero-content">
                <span class="hero-eyebrow">
                    Tinza 
                </span>
                <h1 class="hero-title">
                    Shipping &amp;<br>Delivery
                </h1>
                <p class="hero-body">
                    At Tinza, every piece is thoughtfully crafted and shipped with care. 
                    Because our products are handmade and often made-to-order, shipping times 
                    and conditions may vary slightly from one seller to another.
                </p>
            </div>
            <div class="hero-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shipping hero.webp" alt="Shipping and Delivery">
            </div>
        </section>

        <!-- CONTENT -->
        <section class="content-section">
            <div class="container">
                <div class="content-grid">

                    <div class="card">
                        <span class="card-number">01</span>
                        <h3>Processing Time</h3>
                        <div class="card-divider"></div>
                        <p>Many Tinza items are handcrafted or customized, meaning sellers may need 
                        a little extra time to prepare your order. Estimated processing times are 
                        usually listed on each product page.</p>
                    </div>

                    <div class="card">
                        <span class="card-number">02</span>
                        <h3>Shipping Costs</h3>
                        <div class="card-divider"></div>
                        <p>Tinza promotes free express shipping as a general standard. However, shipping 
                        terms may vary depending on the seller and the item. Check the product page 
                        for details specific to your order.</p>
                    </div>

                    <div class="card">
                        <span class="card-number">03</span>
                        <h3>Shipping Time &amp; Delivery</h3>
                        <div class="card-divider"></div>
                        <p>Delivery times depend on the seller, the product, and your location. Estimated 
                        shipping timelines are displayed on the product page to help you plan ahead.</p>
                        <p>For the most accurate information, we recommend reaching out to the seller directly.</p>
                    </div>

                    <div class="card">
                        <span class="card-number">04</span>
                        <h3>Customs &amp; Import Fees</h3>
                        <div class="card-divider"></div>
                        <p>For international orders, customs duties and import taxes may apply upon arrival. 
                        These charges are typically the buyer's responsibility and are set by local authorities.</p>
                        <p><span class="card-note">We recommend checking with your local customs office or contacting the seller in 
                        advance to avoid any unexpected fees.</span></p>
                    </div>

                </div>
            </div>
        </section>

            <div class=" help-section">
                <h3>Need Help?</h3>
                <p>
                    If you have questions about shipping, delivery times, or customs, feel free 
                    to reach out to the seller directly.
                </p>
            </div>
        </section>

    </div>

</body>

<?php get_footer(); ?>