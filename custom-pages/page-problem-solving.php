<?php
    /**
     * Template Name: Problem Solving Page
     */

    // Remove the page header ONLY for this page

    add_action('wp_head', function() {
        if (is_page('problem-solving')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();

?>

<div id="primary" class="content-area buying-guide-page troubleshooting-blog">
    <main id="main" class="site-main">

        <!-- Article Hero Header --> 
        <header class="header">
            <div class="content">
                <div class="title">
                    <h1>Troubleshooting Copper &amp; Brass: Common Concerns and Simple Solutions</h1>
                </div>
                <div class="sub">
                    <p>Everything you need to know about water spots, tarnishing, hard water, and more.</p>
                </div>
            </div>
            <div class="image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pic 2.webp" alt="Maintenance and Troubleshooting Care Guide for Copper and Brass Architectural Fixtures">
            </div>
        </header>

        <!-- Main Editorial Content Container -->
        <div class="care-guide-container">
            
            <!-- Introduction Section -->
            <div class="step-card">
                <div class="lede">
                    <p class="dropcap">O</p>wning handcrafted copper and brass is a joy. But like any beautiful material, these metals come with questions. Why are there water spots? Is that tarnish normal? How do I handle hard water stains? We've gathered the most common concerns and answered them clearly. No judgment, no jargon — just honest help. Because your Tinza piece is meant to be lived with, not worried about.
                </div>
            </div>

            <div class="sequence-container">

                <!-- Step 1: Water Spots -->
                <div class="step-card">
                    <div class="step-number">01</div>
                    <div class="step-content">
                        <h3>Water Spots: Why They Appear and What to Do</h3>
                        <p><span>Why it happens:</span> Water spots are mineral deposits left behind when water evaporates. They're most visible on shiny, polished surfaces — especially dark finishes like Oxidized Copper.</p>
                        <p><span>The fix:</span> Wipe the piece dry after each use. A soft microfiber cloth works best. For existing spots, use a mixture of equal parts white vinegar and water. Dampen a cloth, wipe gently, rinse, and dry immediately.</p>
                        
                        <div class="alert-box warning" style="margin-top: 1.5rem;">
                            <span>Pro Tip:</span> If you have hard water (more on that below), consider installing a water softener. It'll protect your Tinza pieces and your plumbing.
                        </div>
                    </div>
                </div>

                <!-- Step 2: Tarnishing & Patina -->
                <div class="step-card">
                    <div class="step-number">02</div>
                    <div class="step-content">
                        <h3>Tarnishing and Patina: What's Normal and When to Polish?</h3>
                        <p><span>Why it happens:</span> Copper and brass naturally oxidize when exposed to air and moisture. For some finishes (Unlacquered Brass, Aged Copper), this is a feature, not a flaw. It's the patina that people pay extra for.</p>

                        <div class="dos-donts-container">
                            <div class="dos-box">
                                <h3>Normal Surface Evolution</h3>
                                <ul>
                                    <li>Gradual darkening of the raw metal.</li>
                                    <li>Slight greenish or brownish structural patches.</li>
                                    <li>Uneven toning across high-touch points.</li>
                                </ul>
                            </div>
                            <div class="donts-box">
                                <h3>Abnormal Conditions &amp; Action</h3>
                                <ul>
                                    <li>Surface flaking, peeling, or bubbling.</li>
                                    <li>Green residue that wipes off easily (that's verdigris and is fine — just clean it).</li>
                                    <li><span>When to polish:</span> Only if you prefer a bright look. You never have to polish.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Hard Water Issues -->
                <div class="step-card">
                    <div class="step-number">03</div>
                    <div class="step-content">
                        <h3>Hard Water Issues: Protecting Your Investment</h3>
                        <p><span>Why it happens:</span> Hard water contains high levels of calcium and magnesium. When it dries on metal, it leaves chalky white or gray deposits that can be stubborn to remove.</p>
                        <p><span>The fix:</span> For light deposits, white vinegar and water (1:1) works. For heavier buildup, use a specialized hard water stain remover (check that it's safe for copper and brass).</p>
                        <p><span>Prevention:</span> Dry your fixtures after each use. Install a water softener if hard water is a persistent issue.</p>
                    </div>
                </div>

                <!-- Step 4: Installation Parameters -->
                <div class="step-card">
                    <div class="step-number">04</div>
                    <div class="step-content">
                        <h3>Installation Questions: What to Know Before You Start</h3>
                        <p>Installing a Tinza piece is usually straightforward, but there are a few things to keep in mind:</p>

                        <ul class="damage-list">
                            <li><span>Structural Weight:</span> Copper sinks and brass fixtures are heavier than their mass‑produced counterparts. Ensure your countertops, cabinets, and junction boxes can support the weight.</li>
                            <li><span>Plumbing Connections:</span> Our faucets and fixtures use standard sizes. However, if you're replacing an existing fixture, double‑check compatibility.</li>
                            <li><span>Electrical Requirements:</span> For lighting, ensure your ceiling junction box is rated for the fixture's weight. Many Tinza pendants weigh 5–15 pounds.</li>
                        </ul>

                        <p style="margin-top: 1.5rem;">
                            <span>Pro Tip:</span> Always read the product page carefully. Each listing includes specific installation notes from the artisan. And don't hesitate to Ask the Artisan — they know their pieces best.
                        </p>
                    </div>
                </div>

                <!-- Step 5: Maintenance Concerns -->
                <div class="step-card">
                    <div class="step-number">05</div>
                    <div class="step-content">
                        <h3>Maintenance Concerns: Quick Tips for Long‑Term Care</h3>
                        <p class="section-lead">The key to keeping your copper and brass beautiful is consistency, not perfection:</p>

                        <ul class="damage-list">
                            <li><span>Cleaning:</span> Wipe with a soft, damp cloth and mild soap. Avoid abrasive cleaners, steel wool, and bleach.</li>
                            <li><span>Polishing:</span> Use a metal‑specific polish (like Brasso for brass, Wright's for copper). Apply with a soft cloth, buff gently, and wipe clean. Do this only when you want to remove patina — not as a routine.</li>
                            <li><span>Sealing:</span> If you want to prevent patina entirely, apply a clear metal lacquer or beeswax. This locks in the finish. But once sealed, you can't let it patina naturally.</li>
                            <li><span>Protection:</span> Avoid placing hot pans directly on copper or brass surfaces. Use trivets. For outdoor pieces, consider removing them during extreme weather or applying a protective wax coating.</li>
                        </ul>
                    </div>
                </div>

                <!-- Step 6: Solutions Dashboard -->
                <div class="step-card">
                    <div class="step-number">06</div>
                    <div class="step-content">
                        <h3>Common Solutions at a Glance</h3>
                        <p style="margin-bottom: 1.5rem;">A quick-reference dashboard for managing common material changes and unexpected surface developments:</p>

                        <div class="table-container">
                            <table class="comparison-table">
                            <thead>
                                <tr>
                                    <th>Problem</th>
                                    <th>Solution</th>
                                    <th>Prevention</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span>Water spots</span></td>
                                    <td>Vinegar/water mix, rinse, dry</td>
                                    <td>Wipe after each use</td>
                                </tr>
                                <tr>
                                    <td><span>Hard water deposits</span></td>
                                    <td>Hard water remover, vinegar</td>
                                    <td>Water softener, dry after use</td>
                                </tr>
                                <tr>
                                    <td><span>Tarnish / patina</span></td>
                                    <td>Polish (only if desired)</td>
                                    <td>Leave it alone — it's normal!</td>
                                </tr>
                                <tr>
                                    <td><span>Installation questions</span></td>
                                    <td>Read product page, contact artisan</td>
                                    <td>Measure and check compatibility</td>
                                </tr>
                                <tr>
                                    <td><span>Scratches (minor)</span></td>
                                    <td>Extra‑fine steel wool (0000), then polish</td>
                                    <td>Use cutting boards on copper surfaces</td>
                                </tr>
                                <tr>
                                    <td><span>Discoloration from heat</span></td>
                                    <td>Metal cleaner or polish</td>
                                    <td>Use trivets, avoid direct heat</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>

                    </div>
                </div>

                <!-- Step 7: Artisan Support -->
                <div class="step-card">
                    <div class="step-number">07</div>
                    <div class="step-content">
                        <h3>When to Ask the Artisan</h3>
                        <p>Your Tinza artisan is the ultimate expert. If you have a concern not covered here — or if you've tried a solution and it didn't work. The person who made your piece can recommend specific cleaning products for their metal and finish, advise on sealing and long‑term care, and offer repair options if needed. That's the advantage of buying handmade.</p>
                    </div>
                </div>

                <!-- Step 8: Patina Philosophy -->
                <div class="step-card">
                    <div class="step-number">08</div>
                    <div class="step-content">
                        <h3>Embracing Patina</h3>
                        <p>We often say it, but it's worth repeating: patina is not damage. It's a living finish. Some Tinza customers specifically request accelerated patina — they want the metal to age quickly. If you're in that camp, skip the polishing, let water sit (briefly), and enjoy the evolution. If you prefer a perfectly consistent look, choose lacquered brass or chrome. That's a valid choice too. Knowing what you want is the first step.</p>
                    </div>
                </div>

            </div>

            <!-- Editorial Outro Block -->
            <footer class="guide-footer">
                <h2>Lived In, Not Worried About</h2>
                <p>Handcrafted architectural metal products are not fragile museum artifacts. They are durable, historic materials intended to interface with daily human activity. By mastering these basic care steps, you convert simple maintenance chores into a satisfying home ritual.</p>
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