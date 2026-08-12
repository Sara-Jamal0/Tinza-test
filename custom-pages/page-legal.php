<?php
    /**
     * Template Name: Legal page
     */

    // remove the page header only for this page 
    add_action('wp_head', function() {
        if (is_page('legal')) {
            echo '<style>#page-header { display: none !important;}</style>';
        }
    });

    get_header(); 
?>

<html>
    <body>
        <div class="layout">
            <!-- Left sidebar -->
            <aside class="sidebar">
                <h3 class="sidebar__heading">Legal Information</h3>
                <p class="sidebar__sub">Quick jump to sections</p>
                <nav class="sidebar__nav">
                    <a href="#ownership">Website Ownership</a>
                    <a href="#liability">Disclaimer of Liability</a>
                    <a href="#products">Product Disclaimer</a>
                    <a href="#links">External Links</a>
                    <a href="#intellectual-property">Intellectual Property</a>
                    <a href="#availability">Website Availability</a>
                    <a href="#governing-law">Governing Law</a>
                    <a href="#contact">Contact</a>
                </nav>

                <div class="sidebar__meta">
                <p class="sidebar__meta-label">Last Updated</p>
                <p class="sidebar__meta-date">May 10, 2026</p>
            </div>
            </aside>

            <!-- Main content --> 
            <main class="main">
                <h1 class="page-title">Legal Notice</h1>

                <!-- section --> 
                 <section class="section" id="ownership">
                    <h2 class="section__title">Website Ownership</h2>
                    <p class="section__lead">This website is owned and operated by:</p> 
                        <ul class="plain-list">
                            <li>Company Name: TINZA - FZCO</li>
                            <li>Registred Address: DSO-IFZA IFZA Properties Dubai Silicon Oasis</li> 
                            <li>Company Registration Number: 59113</li> 
                            <li>VAT Number: 61579</li>
                            <li>Email: support@tinza.com</li>
                        </ul>
                 </section>

                    <!-- section -->
                    <section class="section" id="liability">
                        <h2 class="section__title">Disclaimer of Liability</h2>
                        <p class="section__lead">Tinza makes reasonable efforts to ensure the accuracy of all information published on this website. However, we do not guarantee that:</p>
                        <ul class="plain-list">
                            <li>Product descriptions are error-free</li>
                            <li>Website content is complete or current</li>
                            <li>The website will operate uninterrupted or without errors</li>
                        </ul>
                        <p class="section__note">Use of the website is at the user's own risk.</p>
                    </section>

                    <!-- section -->
                    <section class="section" id="products">
                        <h2 class="section__title">Product Disclaimer</h2>
                        <p class="section__lead">
                            Many Tinza products are handcrafted using brass, copper, and natural materials. <br>
                            As a result:
                        </p> 
                        <ul class="plain-list">
                            <li>Slight imperfections may occur</li>
                            <li>Patina and oxidation may naturally develop over time</li>
                            <li>Handcrafted dimensions and finishes may vary slightly</li> 
                        </ul>
                    </section>

                        <!-- section -->
                        <section class="section" id="links">
                            <h2 class="section__title">External Links</h2>
                            <p class="section__note">This website may contain links to third-party websites. Tinza is not responsible for the content, security, or practices of external websites.</p>
                        </section>

                    <!-- section -->
                     <section class="section" id="intellectual-property">
                        <h2 class="section__title">Intellectual Property Notice</h2>
                        <p class="section__note">
                            All trademarks, logos, images, text, and website content are protected by intellectual property laws and remain the property of Tinza or their respective owners. <br>
                            Unauthorized use is prohibited.
                        </p>
                     </section>

                    <!-- section -->
                     <section class="section" id="availability">
                        <h2 class="section__title">Website Availability</h2>
                        <p class="section__note">Tinza does not guarantee uninterrupted access to the website and may suspend services temporarily for maintenance, upgrades, or technical reasons.</p>
                     </section>

                    <!-- section -->
                     <section class="section" id="governing-law">
                        <h2 class="section__title">Governing Law</h2>
                        <p class="section__note">
                            This Legal Notice shall be governed by the laws of USA.
                        </p>
                     </section>

                     <!-- section -->
                      <section class="section" id="contact">
                        <h2 class="section__title">Contact</h2>
                        <p class="section__lead">For legal inquiries, please contact:</p>
                        <ul class="plain-list">
                            <li>Email: support@tinza.com</li>
                            <li>Address: DSO-IFZA IFZA Properties Dubai Silicon Oasis</li>
                        </ul>
                      </section>
            </main>
        </div>
    </body>
</html>

<?php get_footer(); ?>