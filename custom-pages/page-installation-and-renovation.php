<?php
    /**
     * Template Name: Installation and Renovation Page
     */

    // Remove the page header ONLY for this page

    add_action('wp_head', function() {
        if (is_page('installation-and renovation')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();

?>

    <div id="primary" class="content-area buying-guide-page installation-renovation-blog">
        <main id="main" class="site-main">

            <!-- Article Hero Header -->
            <header class="header">
                <div class="content">
                    <div class="title">
                        <h1>Planning Your Renovation? What You Need to Know Before Installing Copper & Brass</h1>
                    </div>
                    <div class="sub">
                        <p>From sink measurements to plumbing prep — a friendly heads‑up for a smooth install.</p>
                    </div>
                </div>
                <div class="image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/renovation.webp" alt="Artisanal Plumbing and Lighting Installation Prep">
                </div>
            </header>

            <!-- Main Editorial Content Container -->
            <div class="care-guide-container">
                
                <!-- Introduction Section -->
                <section class="guide-section">
                    <div class="lede">
                        <p>Renovations are full of surprises. Installing handcrafted copper and brass pieces shouldn’t be one of them. Here’s what to think about ahead of time — so your new Tinza treasures fit perfectly, work flawlessly, and bring joy from day one.</p>
                    </div>
                </section>

                <!-- Technical Sequence Timeline -->
                <div class="sequence-container">

                    <!-- Step 1: Sizing -->
                    <div class="step-card">
                        <div class="step-number">01</div>
                        <div class="step-content">
                            <h3>Sizing: Measure Twice, Fall in Love Once</h3>
                            <p>Copper sinks, brass faucets, and lighting fixtures are often larger (or heavier) than their mass‑produced cousins. Never guess your measurements.</p>
                            
                            <p><strong>For a copper sink (undermount or farmhouse):</strong><br>
                            Measure your cabinet width and depth. A 30″ sink needs at least a 33″ cabinet. Check the sink’s exact dimensions — including the bowl depth. Deep farmhouse sinks may require a shorter garbage disposal or modified drainpipes.</p>
                            
                            <p><strong>For a bridge faucet or tall gooseneck:</strong><br>
                            Measure from the faucet hole to your backsplash. The spout should reach the center of the sink. Check your window sill height if the faucet sits under a window so the handle won't hit the glass.</p>
                            
                            <p><strong>For pendant lights over an island or table:</strong><br>
                            Keep height from counter to bottom of shade between 30–36 inches. The overall width of the fixture should stay within 1/2 to 2/3 the width of the surface below.</p>
                            
                            <div class="alert-box note">
                                <strong>Pro tip:</strong> Tape a cardboard template of the sink or light fixture to the wall or counter. Live with it for a day to ensure the scale feels right.
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Plumbing -->
                    <div class="step-card">
                        <div class="step-number">02</div>
                        <div class="step-content">
                            <h3>Plumbing Considerations for Copper & Brass Sinks and Faucets</h3>
                            <p>Handcrafted solid metal pieces carry significantly more structural weight than standard retail alternatives.</p>
                            <ul class="damage-list">
                                <li><span>Weight Support:</span> An undermount copper sink needs proper bracing. Do not rely on just adhesive and clips. Add a plywood support cradle or heavy metal brackets. For farmhouse apron sinks, ensure your cabinet is reinforced to support 40–60 pounds.</li>
                                <li><span>Drain Assembly:</span> Copper kitchen sinks use standard 3.5″ drains, but the artisan flange may be thicker. Have your plumber adjust the tailpiece accordingly.</li>
                                <li><span>Faucet Compatibility:</span> Tinza faucets fit standard 1″ or 1.25″ hole diameters. If you have an existing three‑hole layout, you will need a deck plate or a new sink array.</li>
                            </ul>
                            <div class="alert-box warning">
                                <strong>Hot Water Note:</strong> Copper is an exceptional thermal conductor. Your sink basin will get naturally warm when running hot water. This is structurally fine, but exercise care with raw, high-heat pots.
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Lighting -->
                    <div class="step-card">
                        <div class="step-number">03</div>
                        <div class="step-content">
                            <h3>Lighting Installation Tips</h3>
                            <p>Copper and brass light fixtures act as heavy visual statements. They require meticulous mounting box ratings:</p>
                            <p>Most pendants and chandeliers weigh 5–15 pounds. Ensure your ceiling junction box is specifically rated for structural fixture weight. For sloped architectural ceilings, utilize a slope‑compatible canopy array.</p>
                            <p><strong>Dimming Dynamics:</strong> Copper and brass shades look remarkably better with dimmable bulbs. Install a modern LED‑rated dimmer switch to control color warmth reflections inside the metallic core.</p>
                        </div>
                    </div>

                    <!-- Step 4: Renovation Planning -->
                    <div class="step-card">
                        <div class="step-number">04</div>
                        <div class="step-content">
                            <h3>Renovation Planning: When to Order Your Tinza Pieces</h3>
                            <p>Because items are meticulously crafted by hand, lead times vary based on custom requirements.</p>
                            <ul class="damage-list">
                                <li><span>Order Early:</span> Custom artisanal sinks typically take 4–8 weeks. Lighting structures average 2–4 weeks. Order as soon as design footprints are locked.</li>
                                <li><span>The Dry‑Fit Day:</span> Before your plumber or electrician arrives on site, unbox your pieces and check that everything matches the rough‑ins perfectly. It is infinitely easier to adjust structural frames before drywall goes up.</li>
                                <li><span>Construction Protection:</span> Keep your installed copper sink covered throughout construction. Drywall mud, plaster dust, and dropped tools will scratch raw finishes. Protect it with a heavy cardboard shell.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Step 5: Hardware -->
                    <div class="step-card">
                        <div class="step-number">05</div>
                        <div class="step-content">
                            <h3>Hardware & Accessories: Small Details, Big Impact</h3>
                            <p>Consistency across minor touchpoints elevates full-room interior designs:</p>
                            <p><strong>Placement benchmarks:</strong> Drawer pulls should center precisely horizontally and vertically. Mount towel bars 48 inches from the floor for hand towels, and 36 inches for main bath towels. Position toilet paper holders 26 inches from the floor, centered 8–12 inches in front of the bowl footprint.</p>
                            <div class="alert-box note">
                                <strong>Unlacquered Patina:</strong> Raw hardware will fingerprint and patina unevenly at first. Don't panic. Within a few months, the oxidation evens out into a rich, uniform antique glow.
                            </div>
                        </div>
                    </div>

                    <!-- Step 6: Restoration -->
                    <div class="step-card">
                        <div class="step-number">06</div>
                        <div class="step-content">
                            <h3>A Few Words on Restoration & Reuse</h3>
                            <p>If you are restoring an old architectural property and reusing existing heritage copper pipelines or vintage fixtures, maintenance is highly straightforward.</p>
                            <p>You can polish old copper back to its original shine using balanced mild household abrasives (lemon juice and baking soda) or commercial brass cleaners. If you prefer deep industrial character, pairing vintage mismatch patinas alongside new Tinza focal sinks creates a highly narrative space.</p>
                        </div>
                    </div>

                    <!-- Step 7: Artisan Support -->
                    <div class="step-card">
                        <div class="step-number">07</div>
                        <div class="step-content">
                            <h3>When in Doubt, Ask the Artisan</h3>
                            <p>Every single Tinza piece is completely unique. The master metalsmith who hammered your item knows exactly what your plumbing or electrical crew needs to know.</p>
                            <p>Reach out directly via your account workspace prior to installation day to clarify exact weights, specialized drain clearances, or sloped ceiling modifications.</p>
                        </div>
                    </div>

                </div><!-- .sequence-container -->

                <!-- Editorial Outro Block -->
                <footer class="guide-footer">
                    <h2>Your Renovation, Elevated</h2>
                    <p>Installing luxury copper and brass isn’t complicated — it simply requires intentional attention. The reward is a tailored living space that feels human, warm, and unapologetically extraordinary.</p>
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
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cover.webp "
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
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/anti.webp"
                    alt="Brass sculptural objects beside a curved sofa"
                    class="card-image"
                />
                <div class="card-body">
                    <a href="#" class="eyebrow" data-category="industry">Industry, Health &amp; Community</a>
                    <h2 class="card-title">Cleaner Than You Think: The Antimicrobial Power of Copper & Brass</h2>
                    <p class="card-excerpt">Why your grandmother’s copper sink might have been smarter than any modern disinfectant.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('health-benefits')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                </div>
            </article>
    
            <article class="card">
                <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/finish.webp"
                    alt="Brass sculptural objects beside a curved sofa"
                    class="card-image"
                />
                <div class="card-body">
                    <a href="#" class="eyebrow" data-category="materials">Materials &amp; Craftsmanship</a>
                    <h2 class="card-title">The Living Metal: A Journey Through Copper Craftsmanship and Moroccan Tradition</h2>
                    <p class="card-excerpt">From ancient anvils to modern homes — how copper and brass have shaped human civilization for millennia.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('historical')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                </div>
            </article>

        </div>
      </section>


<?php get_footer(); ?>