<?php
    /**
     * Template Name: Terms of Use
    */
    // Remove the page header ONLY for this page
    add_action('wp_head', function() {
        if (is_page('terms-of-use')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });

get_header();
?>

<html>
    <body>
        <!-- ── Left sidebar ── -->
            <aside class="sidebar">
                <p class="sidebar__heading">On this page</p>
                <p class="sidebar__sub">Quick jump to sections</p>
            
                <ul class="sidebar__nav">
                    <li><a href="#about">1. About Tinza</a></li>
                    <li><a href="#eligibility">2. Eligibility</a></li>
                    <li><a href="#accounts">3. User Accounts</a></li>
                    <li><a href="#product">4. Product Information</a></li>
                    <li><a href="#pricing">5. Pricing and Payments</a></li>
                    <li><a href="#shipping">6. Shipping and Delivery</a></li>
                    <li><a href="#return">7. Returns and Refunds</a></li>
                    <li><a href="#disclaimer">8. Intellectual Property</a></li>
                    <li><a href="#prohibited">9. Prohibited Uses</a></li>
                    <li><a href="#marketplace">10. Marketplace and Third-Party Sellers</a></li>
                    <li><a href="#limitations">11. Limitations of Liability</a></li>
                    <li><a href="#governing">12. Governing Law</a></li>
                    <li><a href="#changes">13. Changes to Terms </a></li>
                    <li><a href="#contact">14. Contact Information</a></li>
                </ul>
            
                <div class="sidebar__meta">
                    <p class="sidebar__meta-label">Last Updated</p>
                    <p class="sidebar__meta-date">May 10, 2026</p>
                </div>
            </aside>

        <!-- ── Main content ── -->
            <main class="main">
                <h1 class="page-title">Terms of Use / Terms &amp; Conditions</h1>
                <p class="intro">
                    By using Tinza.com, you agree to these Terms &amp; Conditions. 
                </p>
            <!-- Section -->
            <section class="section" id="about">
                <h2 class="section__title">1. About Tinza</h2>
                <p class="section__note">
                    Tinza is an online marketplace offering brass and copper home décor products, 
                    including handcrafted and artisan-made items.
                </p>
            </section>

            <!-- Section -->
            <section class="section" id="eligibility">
                <h2 class="section__title">2. Eligibility</h2>
                <p class="section__note">
                    Users must be at least 18 years old or have legal parental/guardian consent to use this website.
                </p>
            </section>

            <!-- Section -->
            <section class="section" id="accounts">
                <h2 class="section__title">3. User Accounts</h2>
                <p class="section__lead">Users may create accounts to:</p>
                    <ul class="plain-list">
                        <li>Place orders</li>
                        <li>Track purchases</li>
                        <li>Save preferences</li>
                    </ul>
                <p class="section__note"> 
                    Users are responsible for maintaining the confidentiality of their login credentials. <br>
                    Tinza reserves the right to suspend or terminate accounts that violate these Terms.
                </p>
            </section>

            <!-- Section -->
            <section class="section" id="product">
                <h2 class="section__title">4. Product Information</h2>
                <p class="section__lead">We strive to ensure accurate product descriptions, images, and pricing. However:</p>
                    <ul class="plain-list">
                        <li>Handmade product may vary slightly in appearance</li>
                        <li>Brass and copper materials naturally change over time</li>
                        <li>Colors may appear differently depending on screen settings</li>
                    </ul>
                <p class="section__note"> 
                    Minor variations are not considered defects.
                </p>
            </section>

            <!-- Section -->
            <section class="section" id="pricing">
                <h2 class="section__title">5. Pricing and Payments</h2>
                    <ul class="plain-list">
                        <li>Prices are displaye in [Insert Currency]</li>
                        <li>Taxes and shipping fees may apply</li>
                        <li>Payments must be completes before shipment</li>
                        <li>Tinza reserves the right to correct pricing errors</li>
                    </ul>
                <p class="section__lead"> 
                    Accepted payment methods may include:
                </p>
                    <ul class="plain-list">
                        <li>Credit/debit cards</li>
                        <li>PayPal</li>
                        <li>Other supported payment gateways</li>
                    </ul>
            </section>

            <!-- Section -->
            <section class="section" id="shipping">
                <h2 class="section__title">6. Shipping and Delivery</h2>
                <p class="section__lead">Delivery times are estimates and may vary based on:</p>
                    <ul class="plain-list">
                        <li>Product availability</li>
                        <li>Customs processing</li>
                        <li>Carrier delays</li>
                        <li>International shipping conditions</li>
                    </ul>
                <p class="section__note"> 
                    Tinza is not responsible for delays caused by third-party carriers or customs authorities.
                </p>
            </section>

            <!-- Section -->
            <section class="section" id="return">
                <h2 class="section__title">7. Returns and Refunds</h2>
                <p class="section__lead">Customers may request returns subject to our Return Policy. <br>
                    Returned products must:
                </p>
                    <ul class="plain-list">
                        <li>Be used</li>
                        <li>Be in original packaging</li>
                        <li>Meet return eligibility requirements</li>
                    </ul>
                <p class="section__note"> 
                    Customized or made-to-order items may not be eligible for return unless defective.
                </p>
            </section>

            <!-- Section -->
            <section class="section" id="intellectual">
                <h2 class="section__title">8. Intellectual Property</h2>
                <p class="section__lead">All website content including:</p>
                    <ul class="plain-list">
                        <li>Logos</li>
                        <li>Product images</li>
                        <li>Text</li>
                        <li>Designs</li>
                        <li>Graphics</li>
                    </ul>
                <p class="section__note"> 
                    Are the property of Tinza or its licensors and may not be copied, reproduced, or distribute.
                </p>
            </section>



    </body>
</html>