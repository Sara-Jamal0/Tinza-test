<?php

    /**
     * Template Name: Return and Exchange Page
     */

    // Remove the page header ONLY for this page
    add_action('wp_head', function() {
        if (is_page('return-and-exchange')) {
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
                    Return &amp;<br>Exchange
                </h1>
                <p class="hero-body">
                    At Tinza we offer free returns and exchanges on most items. <br>
                    For custom or made-to-order pieces, policies vary by seller. 
                    Check the product page for details.
                </p>
            </div>
            <div class="hero-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/set.webp" alt="Return and Exchange">
            </div>
        </section>

        <!-- CONTENT -->
        <section class="content-section">
            <div class="container">
                <div class="content-grid">

                    <div class="card">
                        <span class="card-number">01</span>
                        <h3>Check with the Seller First </h3>
                        <div class="card-divider"></div>
                        <p>
                            Return and exchange options vary by item and artisan. 
                            Before starting a return, we recommend checking with 
                            the seller directly through your order page.
                        </p>
                    </div>

                    <div class="card">
                        <span class="card-number">02</span>
                        <h3>Free Returns on Eligible Items</h3>
                        <div class="card-divider"></div>
                        <p>
                            Most ready-to-ship items are eligible for free returns within 14 days of delivery. 
                            Custom or made-to-order pieces may have different terms. <br>
                            Contact the seller through your order page for details.
                        </p>
                    </div>

                    <div class="card">
                        <span class="card-number">03</span>
                        <h3>Damaged or Missing Items</h3>
                        <div class="card-divider"></div>
                        <p>
                            If your order arrives damaged or not as expected, start by messaging the seller 
                            through your order page, most issues get resolved quickly from there. <br>
                            If you still need help, we're always available through the Help Center.
                        </p>
                    </div>

                    <div class="card">
                        <span class="card-number">04</span>
                        <h3>Refund or Exchange Process </h3>
                        <div class="card-divider"></div>
                        <p>
                            Once your return is approved, the seller will share shipping instructions. 
                            As soon as they receive and inspect the item, you'll get your refund or 
                            your exchange will be on its way.
                        </p>
                    </div>

                </div>
            </div>
        </section>

            <div class=" help-section">
                <h3>Need Help?</h3>
                <p>
                    If you have questions about returns, exchanges, or a damaged order, 
                    feel free to reach out to the seller directly or visit our Help Center.
                </p>
            </div>
        </section>

    </div>

</body>

<?php
    get_footer();
?>