<?php
    /**
     * Template Name: Contact Page
     */

    // Remove the page header ONLY for this page

    add_action('wp_head', function() {
        if (is_page('contact')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();


?>

<body>
 
<!-- Hero -->
    <section class="hero-section">
        <div class="hero-content">
            <span class="hero-eyebrow">
                Contact us
            </span>
            <h1 class="hero-title">
                We'd Love to<br>Hear From <span>You</span>
            </h1>
            <p class="hero-body">
                Have a question, a project in mind, or just want to learn more about 
                what Tinza can do for you?<br> Reach out, we'll get back to you within 24 hours.
            </p>
        </div>
        <div class="hero-image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/contact.webp" alt="Contact Us Hero Image">
        </div>
    </section>
 
    
        <section class="form-section">
            <div class="contact-wrap">

            <!-- RIGHT: Form card -->
                    <?php echo do_shortcode('[contact-form-7 id="1f16354" title="Untitled"]'); ?>

                <!-- LEFT: Info column -->
                <div class="info-col">
                    <div>
                        <h2>How Can We Help You?</h2>
                        <p>
                            We're here to point you in the right direction.
                        </p>
                    </div>

                    <ul class="help-list">
                        <li>Shopping &amp; Products</li>
                        <li>Orders &amp; Shipping</li>
                        <li>Returns &amp; Issues</li>
                        <li>Quality &amp; Warranty</li>
                        <li>Customization</li>
                    </ul>

                    <p class="faq-note">
                        Find answers to common questions about buying, selling, shipping, and delivery in our 
                        <span>
                            <a href="<?php echo get_permalink(get_page_by_path('help-center')); ?>">
                                help center 
                            </a>
                        </span>
                    </p>

                    <div class="reach-block">
                        <div class="reach-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                        </div>
                        <div>
                            <h4>Reach us directly</h4>
                            <p>support@tinza.com</p>
                        </div>
                    </div>
                </div>
            </div>
            </section>

        
    
</body>

<?php get_footer(); ?>