<?php
    /**
     * Template Name: Custom Design Page
     */

    // Remove the page header ONLY for this page

    add_action('wp_head', function() {
        if (is_page('custom-design')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();

?>

<div id="primary" class="content-area buying-guide-page custom-design-blog">
    <main id="main" class="site-main">

        <!-- Article Hero Header -->
        <header class="header">
            <div class="content">
                <div class="title">
                    <h1>Your Vision, Their Hands: The Art of Custom Copper &amp; Brass Design</h1>
                </div>
                <div class="sub">
                    <p>Why settle for off‑the‑shelf when your sink, faucet, or lighting can be made just for you?</p>
                </div>
            </div>
            <div class="image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Our vision.webp" alt="Bespoke Metalworking Blueprint and Artisan Coppersmith Shaping Custom Brass Fittings">
            </div>
        </header>

        <!-- Main Editorial Content Container -->
        <div class="care-guide-container">
            
    <!-- Introduction Section -->
    <div class="step-card">
        <div class="lede">
            <p class="dropcap">T</p>here's a special kind of magic in owning something that exists nowhere else. A sink that fits your exact countertop dimensions. A faucet with a spout height that matches your deepest pots. A pendant light that's the perfect scale for your vaulted ceiling. A patina that matches the mood of your entire home. At Tinza, custom isn't a luxury — it's a standard. Our artisans love the challenge of bringing your vision to life. And because every piece is handcrafted, customization is not an exception; it's the rule. Here's everything you need to know about designing your own copper or brass fixture.
        </div>
    </div>

    <div class="sequence-container">

        <!-- Step 1: Scope of Customization -->
        <div class="step-card">
            <div class="step-number">01</div>
            <div class="step-content">
                <h3>What Can Be Customized?</h3>
                <p class="section-lead">Almost everything. Our artisans can adapt nearly any piece to your specific needs.</p>

                <ul class="damage-list">
                    <li><span>Sinks (Copper or Brass, Any Size, Any Style):</span> Farmhouse (apron‑front) sinks with custom widths and depths; Undermount sinks designed to fit your exact cabinet cutout; Vessel sinks in any diameter or depth; Bar sinks perfectly scaled for wet bars or butler's pantries. Customization options encompass size, shape, depth, edge profile, finish, and hammer texture density.</li>
                    <li><span>Faucets (Bespoke Bridge, Gooseneck, and Wall‑Mounted):</span> Spout reach tailored to your sink's center point; Overall height to accommodate large cookware or low-clearance cabinetry; Handle styles matching cross, lever, or single-lever preferences; Finishes stretching across Unlacquered Brass, Antique Brass, Chrome, or custom patinas.</li>
                    <li><span>Lighting (Scale, Finish, and Configuration):</span> Pendants customized by diameter, height, and specific chain or rod drops; Chandeliers optimized by number of arms, overall profile, and hanging weight; Sconces modified by mounting orientation and shade sizing; Lamps customized by base dimensions and shade styles.</li>
                    <li><span>Hardware &amp; Structural Accessories:</span> Cabinet drawer pulls scaled to custom lengths and center-to-center drilling specs; Towel bars crafted to specific clearance widths; Mirrors built to custom frame sizes, finish tones, and hanging methods.</li>
                </ul>
            </div>
        </div>

        <!-- Step 2: The Custom Process Pipeline -->
        <div class="step-card">
            <div class="step-number">02</div>
            <div class="step-content">
                <h3>The Custom Process: How It Works</h3>
                <p>Ordering a custom piece from Tinza is simpler than you might think. Here is the sequential workflow mapping your concept to final delivery:</p>

                <div class="dos-donts-container">
                    <!-- Concept & Collaborative Conception -->
                    <div class="dos-box">
                        <h3>Phase 1: Design &amp; Specification</h3>
                        <ul>
                            <li><span>Step 1: Start with a Vision:</span> Browse our architectural collections for baseline inspiration. Note the pieces you love and identify your targeted modifications (size, finish, texture).</li>
                            <li><span>Step 2: Contact the Artisan:</span> Click "Ask the Artisan" directly on the product detail page to share your baseline dimensions, sketches, and preferences.</li>
                            <li><span>Step 3: Collaborate on Design:</span> The assigned master craftsman will respond with technical queries, structural updates, or renderings to refine the blueprint together.</li>
                        </ul>
                    </div>
                    
                    <!-- Approvals, Production & Freight -->
                    <div class="donts-box">
                        <h3>Phase 2: Fabrication &amp; Logistics</h3>
                        <ul>
                            <li><span>Step 4: Receive a Quote:</span> The artisan provides direct project pricing and a timeline. While customization carries a premium, the resulting piece is completely original.</li>
                            <li><span>Step 5: Place Your Order:</span> Upon design sign-off, confirm your procurement path to clear the workshop to initiate raw material staging.</li>
                            <li><span>Step 6: Follow the Journey:</span> Receive benchmark progress updates, photos, or media directly from the studio floor as your metal is forged.</li>
                            <li><span>Step 7: Delivery &amp; Enjoyment:</span> Your bespoke fixture arrives at your project site, configured precisely to your architectural envelope.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3: Sizing Parameters -->
        <div class="step-card">
            <div class="step-number">03</div>
            <div class="step-content">
                <h3>Sizing Options: The Most Common Custom Requests</h3>
                <p>Dimensional adaptation stands as our primary trade custom request. Below are our most frequent configuration parameters:</p>
                
                <p><span>Sinks:</span> Width alterations expand from standard 24–36 inches out to custom 15–60 inch layouts. Depths can increase from standard 8–10 inch baselines up to 14-inch extra-deep utility thresholds, across single, double, or custom offset bowl basins.</p>
                <p><span>Faucets:</span> Spout reaches scale outward from standard 8–10 inches up to 14-inch projections, while overall structural height can adjust from 12–18 inches up to 24-inch monumental high-clearance towers.</p>
                <p><span>Lighting &amp; Hardware:</span> Pendant diameters configure seamlessly from compact 6-inch mini-fixtures up to statement 36-inch architectural domes, supported by custom hanging hardware loads up to 120 inches for soaring vaulted ceilings. Drawer pulls and handles extend past standard boundaries up to 24-inch full-height appliance pulls.</p>
            </div>
        </div>

        <!-- Step 4: Custom Finishes Matrix -->
        <div class="step-card">
            <div class="step-number">04</div>
            <div class="step-content">
                <h3>Custom Finishes: Patina and Color</h3>
                <p style="margin-bottom: 1.5rem;">The right finish makes all the difference. Our workshops can execute a massive spectrum of chemical-free oxidations and surface treatments beyond our standard inventory catalog:</p>

                <div class="table-container">
                    <table class="comparison-table">
                        <thead>
                            <tr>
                                <th>Finish Option</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span>Unlacquered Brass</span></td>
                                <td>Pure, raw organic metal; darkens and shifts character beautifully based on atmospheric touch.</td>
                            </tr>
                            <tr>
                                <td><span>Aged Brass</span></td>
                                <td>Vintage, muted gold profile displaying immediate historic character (can be clear-lacquered upon request).</td>
                            </tr>
                            <tr>
                                <td><span>Antique Brass</span></td>
                                <td>Pre‑darkened, deeply rich and consistent architectural tone offering an elegant classic baseline.</td>
                            </tr>
                            <tr>
                                <td><span>Aged Copper</span></td>
                                <td>Warm, fiery reddish‑brown undertone engineered to slowly build a stunning variegated greenish patina.</td>
                            </tr>
                            <tr>
                                <td><span>Oxidized Copper</span></td>
                                <td>Deep, rich charcoal brown and structural black tones for a highly dramatic, moody industrial effect.</td>
                            </tr>
                            <tr>
                                <td><span>Custom Patina</span></td>
                                <td>Bespoke formulas developed directly with the artisan—including layered greens, blues, or dark bronzes.</td>
                            </tr>
                            <tr>
                                <td><span>Polished (Shiny)</span></td>
                                <td>Bright, reflective mirror‑like surface character (available in either sealed lacquered or raw raw states).</td>
                            </tr>
                            <tr>
                                <td><span>Brushed Satin</span></td>
                                <td>Soft, directional light sheen displaying a subtle metal grain that expertly conceals tracking fingerprints.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="alert-box warning" style="margin-top: 1.5rem;">
                    <span>The Artisan's Vault:</span> Don't see your target finish profile in our design matrix? Contact the studio. Many master smiths possess historic patina recipes passed down through generations that have never been documented or listed publicly.
                </div>
            </div>
        </div>

        <!-- Step 5: Classification Paths -->
        <div class="step-card">
            <div class="step-number">05</div>
            <div class="step-content">
                <h3>Made‑to‑Order vs. Bespoke</h3>
                <p>We classify our custom workflow under two distinct structural design paths to match your project's lead time and specification requirements:</p>
                <p><span>Made‑to‑Order:</span> The artisan initiates manufacturing only upon order receipt. The foundational geometry matches our catalog design blueprint, but allows tailored modifications to surface patination, texture style, or minor connection scaling. This keeps procurement fast and efficient.</p>
                <p><span>Bespoke:</span> A true blank-page architectural commissions cycle. Every element is modeled from scratch to fit your structural shell—shapes, gauges, joint configurations, and decorative engraving metrics change completely according to your brief. Lead times reflect this meticulous focus.</p>
            </div>
        </div>

        <!-- Step 6: Scheduling & Budget Indicators -->
        <div class="step-card">
            <div class="step-number">06</div>
            <div class="step-content">
                <h3>Lead Times for Custom Pieces &amp; What Custom Costs</h3>
                <p>Hand-forging precious metal assets to your individual specifications demands careful scheduling. Made-to-order catalog configurations generally clear our benches within 2–4 weeks. Complete bespoke designs average a 4–8 week window, while large structural features like freestanding copper bathtubs require an 8–12 week production path.</p>
                
                <p style="margin-top: 1rem;">
                    <span>Contract Pricing Indicators:</span> Fine art custom fabrication involves direct asset valuation tracking material volumes, custom engineering parameters, and structural tooling modifications. Generally, custom contract fulfillment carries a premium of 20–50% over production benchmarks—delivering a permanent, non-commoditized architectural asset.
                </p>
            </div>
        </div>

        <!-- Step 7: Technical Guardrails -->
        <div class="step-card">
            <div class="step-number">07</div>
            <div class="step-content">
                <h3>What Cannot Be Customized?</h3>
                <p>While our network of coppersmiths is incredibly flexible, we maintain a firm commitment to long-term structural integrity. We do not accommodate custom requests that compromise safety, plumbing codes, or mechanical engineering safety limits (such as requesting a structural plate gauge so thin that the item would warp under temperature shifts). Furthermore, unlacquered living finishes change naturally over time and cannot be artificially frozen at an exact state of oxidation.</p>
            </div>
        </div>

        <!-- Step 8: Project Case Overviews -->
        <div class="step-card">
            <div class="step-number">08</div>
            <div class="step-content">
                <h3>Real Custom Projects from Tinza</h3>
                <p class="section-lead">Three structural examples of how our partnering workshops fulfill demanding custom interior briefs:</p>

                <ul class="damage-list">
                    <li><span>Project 1: The 60‑inch Farmhouse Sink:</span> A catering kitchen requested a monumental multi-basin layout. The artisan fabricated an internal structural frame and scaled the raw material thickness up to heavy-duty 16‑gauge copper to handle intense commercial culinary use without flexing.</li>
                    <li><span>Project 2: The Zero‑Patina Brass Faucet:</span> A residential designer required the warmth of raw unlacquered brass but needed to prevent surface oxidation indefinitely. The artisan executed the custom assembly and sealed the metal with an industrial-grade clear lacquer to lock the brilliant gold finish against oxygen exposure.</li>
                    <li><span>Project 3: The 120‑inch Pendant Light Chain:</span> An entryway remodel required a custom hanging light to drop into a double‑height vaulted ceiling. The artisan extended the structural chain length, up-armored the internal hanging canopy plate for safety, and successfully shipped the operational asset in under six weeks.</li>
                </ul>
            </div>
        </div>

    </div>

    <!-- Direct Procurement Outro Call to Action -->
    <footer class="guide-footer">
        <h2>Ready to Start Your Custom Project?</h2>
        <p>Bespoke custom design remains one of the most rewarding collaborative tracks available through Tinza. You acquire an architectural component tailored perfectly to your space, built with generations of heritage. To launch your custom commission, locate your favorite baseline aesthetic style in our portal, select "Ask the Artisan," and submit your targeted sizing requirements. Let our masters forge your vision into living metal.</p>
    </footer>

</div><!-- .care-guide-container -->

    </main>
</div>

<!-- ============ RELATED STORIES ============ -->
      <section class="related-stories" aria-label="Related stories">
        <div class="related-header">
          <h2>Related Stories</h2>
          <a href="<?php echo get_permalink(get_page_by_path('news-and-blog')); ?>" class="related-link">View All Journal</a>
        </div>
    
        <div class="related-grid">
    
            <article class="card">
                <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cover.webp"
                    alt="Brass sculptural objects beside a curved sofa"
                    class="card-image"
                />
                <div class="card-body">
                    <a href="#" class="eyebrow" data-category="inspiration">Design &amp; Lifestyle Inspiration</a>
                    <h2 class="card-title">Copper & Brass Are Back: What’s Trending in Interior Design?</h2>
                    <p class="card-excerpt">Here’s how designers are using handcrafted metal to transform bathrooms, kitchens, and luxury spaces.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('interior-design')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                </div>
            </article>
    
          <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sitemap1.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="installation">Buying &amp; Installation Guides</a>
                        <h2 class="card-title">The Tinza Buying Guide: How to Choose Finishes, Sizes & Styles for Copper & Brass Pieces</h2>
                        <p class="card-excerpt">From bathroom sinks to outdoor lighting — make confident choices for every room.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('buying-guide')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article> 
    
            <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/seasonal.webp" 
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="inspiration">Design &amp; Lifestyle Inspiration</a>
                        <h2 class="card-title">Seasonal Home Upgrades: What to Refresh This Spring, Summer, Fall & Holiday</h2>
                        <p class="card-excerpt">From spring renovation ideas to holiday hosting — a year‑round guide to elevating your space with copper and brass.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('seasonal-content')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

        </div>
      </section>

<?php get_footer(); ?>