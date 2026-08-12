<?php
    /**
     * Template Name: Privacy Policy Page
     */

    // Remove the page header ONLY for this page
    add_action('wp_head', function() {
        if (is_page('privacy-policy')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });

    get_header();

?>

<html>
    <body>
        <div class="layout">
            <!-- ── Left sidebar ── -->
            <aside class="sidebar">
            <p class="sidebar__heading">On this page</p>
            <p class="sidebar__sub">Quick jump to sections</p>
        
            <ul class="sidebar__nav">
                <li><a href="#collect">1. Information We Collect</a></li>
                <li><a href="#use">2. How We Use Your Information</a></li>
                <li><a href="#cookies">3. Cookies &amp; Tracking</a></li>
                <li><a href="#gdpr">4. GDPR Rights</a></li>
                <li><a href="#sharing">5. Sharing of Information</a></li>
                <li><a href="#other">6–12. Other Policies</a></li>
            </ul>
        
            <div class="sidebar__meta">
                <p class="sidebar__meta-label">Last Updated</p>
                <p class="sidebar__meta-date">May 10, 2026</p>
            </div>
            </aside>

            <!-- ── Main content ── -->
            <main class="main">
                <h1 class="page-title">Privacy Policy</h1>
                <p class="intro">
                    This Privacy Policy explains how we collect, use, disclose, and protect your personal
                    information when you use our website, products, and services. By accessing or using our
                    website, you agree to the practices described in this Privacy Policy.
                </p>
        
            <!-- Section 1 -->
            <section class="section" id="collect">
                <h2 class="section__title">1. Information We Collect</h2>
                <p class="section__lead">We may collect the following categories of information:</p>
        
                <div class="info-grid">
                    <div class="info-col">
                        <p class="info-col__heading">Personal Information</p>
                            <ul>
                                <li>Full name</li>
                                <li>Billing and shipping address</li>
                                <li>Email address</li>
                                <li>Phone number</li>
                                <li>Payment details (processed securely through third-party providers)</li>
                                <li>Account login credentials</li>
                            </ul>
                    </div>
                    <div class="info-col">
                        <p class="info-col__heading">Technical &amp; Order Information</p>
                            <ul>
                                <li>IP address, browser &amp; device info</li>
                                <li>Operating system &amp; website usage data</li>
                                <li>Cookies and tracking technologies</li>
                                <li>Products purchased and order history</li>
                                <li>Shipping and delivery information</li>
                                <li>Customer support communications</li>
                            </ul>
                    </div>
                </div>
            </section>
        
            <!-- Section 2 -->
            <section class="section" id="use">
                <h2 class="section__title">2. How We Use Your Information</h2>
                <p class="section__lead">We use your information to:</p>
                    <ul class="plain-list">
                        <li>Process and fulfill orders</li>
                        <li>Manage customer accounts</li>
                        <li>Send order confirmations and shipping updates</li>
                        <li>Respond to customer support inquiries</li>
                        <li>Improve our website, products, and services</li>
                        <li>Comply with legal obligations</li>
                    </ul>
            </section>

            <section class="section" id="cookies">
                <h2 class="section__title">3. Cookies and Tracking Technologies</h2>
                <p class="section__lead">We use cookies and similar technologies to:</p>
                <ul class="plain-list">
                    <li>Improve website functionality</li>
                    <li>Remember user preferences</li>
                    <li>Analyze website traffic</li>
                    <li>Personalize content and advertising</li>
                </ul>
                <p class="section__note">
                    Users may disable cookies through their browser settings; however, some website features may not function properly. <br>
                    For more details, please refer to our Cookie Policy.
                </p>
            </section>

            <section class="section" id="gdpr">
                <h2 class="section__title">4. GDPR and European User Rights</h2>
                <p class="section__lead">If you are located in the European Economic Area (EEA), you have the right to:</p>
                <ul class="plain-list">
                    <li>Access your personal data</li>
                    <li>Correct inaccurate information</li>
                    <li>Request deletion of your data</li>
                    <li>Restrict or object to processing</li>
                    <li>Request data portability</li>
                    <li>Withdraw consent at any time</li>
                </ul>
                <p class="section__note">
                    To exercise your rights, contact us at:
                    Email: support@tinza.com
                </p>
            </section>

            <section class="section" id="sharing">
                <h2 class="section__title">5. Sharing of Information</h2>
                <p class="section__lead">We may share information with:</p>
                <ul class="plain-list">
                    <li>Payment processors</li>
                    <li>Shipping and logistics providers</li>
                    <li>IT and hosting providers</li>
                    <li>Marketing and analytics partners</li>
                    <li>Legal authorities when required by law</li>
                </ul>
                <p class="section__note">
                    We do not sell personal information to third parties.
                </p>
            </section>

            <section class="section" id="other">
                <h2 class="section__title">6. Payment Security</h2>
                <p class="section__lead">
                    Payments are processed through secure third-party payment providers. 
                    Tinza does not store full credit card information on its servers.
                </p>
            </section>
            
            <section class="section" id="data-retention">
                <h2 class="section__title">7. Data Retention</h2>
                <p class="section__lead">We retain personal information only for as long as necessary to:</p>
                <ul class="plain-list">
                    <li>Fulfill contractual obligations</li>
                    <li>Comply with legal requirements</li>
                    <li>Resolve disputes</li>
                    <li>Enforce agreements</li>
                </ul>
                
            </section>

            <section class="section" id="International-transfers">
                <h2 class="section__title">8. International Transfers</h2>
                <p class="section__lead">
                    Your information may be processed outside your country of residence. 
                    We implement appropriate safeguards to protect personal data transferred 
                    internationally.
                </p>
                
            </section>

            <section class="section" id="Handmade">
                <h2 class="section__title">9. Handmade and Natural Material Disclaimer</h2>
                <p class="section__lead">
                    Many products sold on Tinza are handcrafted or made from natural brass 
                    and copper materials. Variations in color, texture, patina, finish, 
                    and dimensions may occur naturally and are not considered defects.
                </p>
                
            </section>

            <section class="section" id="third-party">
                <h2 class="section__title">10. Third-Party Services</h2>
                <p class="section__lead">Our website may contain links or integrations with third-party services including:</p>
                <ul class="plain-list">
                    <li>Payment gateaways</li>
                    <li>Social media platforms</li>
                    <li>Analytics tools</li>
                    <li>Advertising services</li>
                </ul>
                <p class="section__note">
                    We are not responsible for the privacy practices of third-party websites or services.
                </p>
            </section>

            <section class="section" id="childrens-privacy">
                <h2 class="section__title">11. Children's Privacy</h2>
                <p class="section__lead">
                    Our website is not intended for individuals under the age of 16. 
                    We do not knowingly collect personal data from children.
                </p>
                
            </section>

            <section class="section" id="contact-info">
                <h2 class="section__title">12. Contact Information</h2>
                <p class="section__lead">For questions regarding this Privacy Policy, please contact:</p>
                <ul class="plain-list">
                    <li>Company Name: TINZA - FZCO</li>
                    <li>Address: DSO-IFZA IFZA Properties Dubai Silicon Oasis</li>
                    <li>Email: support@tinza.com</li>
                    <li>VAT Number: 61579</li>
                </ul>
            </section>

            </main>

            <!-- ── Right sidebar ── -->
            <aside class="aside">
        
            <!-- Actions -->
            <div>
                <div class="actions">
                    <a 
                        href="<?php echo esc_url( set_url_scheme( get_stylesheet_directory_uri() . '/assets/dossiers/privacy-policy.pdf' )); ?>"
                        class="download-btn"
                        download="privacy-policy.pdf"
                        target="_blank"
                        rel="noopener">
                        Download Policy (PDF)
                    </a>
                    <a href="#" 
                        onclick="printPDF('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/dossiers/privacy-policy.pdf' ); ?>'); return false;"
                        class="print-btn">
                        Print
                    </a>
                    <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="contact-btn">Contact Support</a>
                </div>
            </div>
        
            <!-- Helpful links -->
            <div>
                <p class="aside__section-label">Helpful Links</p>
                    <nav class="helpful-links">
                        <a href="<?php echo get_permalink(get_page_by_path('terms-of-use')); ?>">Terms of Use / Terms &amp; Conditions</a>
                        <a href="<?php echo get_permalink(get_page_by_path('legal')); ?>">Legal Notice</a>
                        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>">Contact Us</a>
                    </nav>
            </div>
        
            </aside>
        </div>

        </div>
        
        <script>
            function printPDF(pdfUrl) {
                // Create a hidden iframe
                const iframe = document.createElement('iframe');
                iframe.style.display = 'none';
                iframe.src = pdfUrl;
                
                document.body.appendChild(iframe);
                
                iframe.onload = function() {
                    iframe.contentWindow.focus();
                    iframe.contentWindow.print();
                    
                    // Optional: Remove the iframe after printing starts
                    setTimeout(() => {
                        document.body.removeChild(iframe);
                    }, 1000);
                };
            }
        </script>
    </body>

</html>

<?php get_footer(); ?>