<?php
    /**
     * Template Name: Finish and Patina Page
     */

    // Remove the page header ONLY for this page

    add_action('wp_head', function() {
        if (is_page('finish-and-patina')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();

?>

    <div id="primary" class="content-area buying-guide-page finish-patina-blog">
        <main id="main" class="site-main">

            <!-- Article Hero Header -->
            <header class="header">
                <div class="content">
                    <div class="title">
                        <h1>The Beauty of Living Finishes: Understanding Unlacquered Brass, Aged Copper & More</h1>
                    </div>
                    <div class="sub">
                        <p>Why some of Tinza’s most beautiful pieces are meant to change — and why that’s a good thing.</p>
                    </div>
                </div>
                <div class="image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Oxidized Copper.webp" alt="Artisanal Metal Finishes and Natural Patina Progression">
                </div>
            </header>

            <!-- Main Editorial Content Container -->
            <div class="care-guide-container">
                
                <!-- Introduction Section -->
                <section class="guide-section">
                    <div class="lede">
                        <p>
                            At Tinza, we sell more than objects. We sell materials that breathe. That’s especially true for our living finishes — unlacquered brass, aged copper, and other surfaces that evolve with time, water, and touch. If you’re used to factory‑finished chrome or stainless steel, a living finish can feel mysterious. Will it turn green? Will it stain? Should you polish it? Let’s walk through Tinza’s most popular finishes — what they look like new, how they age, and why so many people fall in love with the journey.
                        </p>
                    </div>
                </section>

                <!-- Brass Breakdown -->
                <div class="care-guide-container">
 
                    <div class="sequence-container">
                
                        <!-- Step 1: Unlacquered Brass -->
                        <div class="step-card">
                            <div class="step-number">01</div>
                            <div class="step-content">
                                <h3>Unlacquered Brass: The Classic That Gets Better</h3>
                                <ul class="damage-list">
                                    <li><span>New Look:</span> Bright, warm, golden. Almost like a freshly minted copper coin.</li>
                                    <li><span>Over Time:</span> It darkens. First, fingerprints appear. Then water spots. Then, slowly, the entire surface deepens into a rich, antique brown with hints of gold in the crevices. In humid or coastal environments, it may even develop faint greenish patches (verdigris).</li>
                                    <li><span>Personality & Placement:</span> Unlacquered brass is honest. It records every touch. Many people choose it exactly for that reason — a faucet that patinas around the handle tells the story of every hand that’s used it. Best for faucets, cabinet hardware, towel bars, lighting, and mirrors.</li>
                                    <li><span>Care Profile:</span> You can let it age naturally (most popular) or polish it back to shiny whenever you like. There’s no wrong way.</li>
                                </ul>
                            </div>
                        </div>
                
                        <!-- Step 2: Aged Brass -->
                        <div class="step-card">
                            <div class="step-number">02</div>
                            <div class="step-content">
                                <h3>Aged Brass: Vintage Charm, Ready to Go</h3>
                                <ul class="damage-list">
                                    <li><span>New Look:</span> Already darkened. A soft, muted gold with subtle brown undertones and light spotting. It looks like it’s been loved for decades right out of the workshop box.</li>
                                    <li><span>Over Time:</span> Aged brass is usually sealed with a light lacquer, so it changes very slowly. Without lacquer, it will continue to darken like unlacquered brass.</li>
                                    <li><span>Personality & Placement:</span> It’s for people who want the antique look immediately — no waiting for patina to develop. Excellent for lighting, mirrors, decorative accents, and hardware where you want consistency.</li>
                                    <li><span>Care Profile:</span> If lacquered, just wipe with a soft damp cloth. If unlacquered, treat it directly like unlacquered brass.</li>
                                </ul>
                            </div>
                        </div>
                
                        <!-- Step 3: Polished Brass -->
                        <div class="step-card">
                            <div class="step-number">03</div>
                            <div class="step-content">
                                <h3>Polished Brass: The Showstopper</h3>
                                <ul class="damage-list">
                                    <li><span>New Look:</span> Mirror‑bright, reflective, almost golden‑yellow. It’s glamorous, precise, and formal.</li>
                                    <li><span>Over Time:</span> If sealed with lacquer, it stays shiny for years. If unlacquered (rare for polished brass), it will quickly lose its shine and begin to tarnish.</li>
                                    <li><span>Personality & Placement:</span> Polished brass demands attention. It’s for statement pieces — chandeliers, prominent focal faucets, or mirrors in powder rooms.</li>
                                    <li><span>Care Profile:</span> Lacquered polished brass needs only dusting. Avoid abrasive cleaners completely. If unlacquered, expect patina and polish regularly if you want to maintain the shine.</li>
                                </ul>
                            </div>
                        </div>
                
                        <!-- Step 4: Aged Copper -->
                        <div class="step-card">
                            <div class="step-number">04</div>
                            <div class="step-content">
                                <h3>Aged Copper</h3>
                                <ul class="damage-list">
                                    <li><span>New Look:</span> Rich, reddish‑brown with warm highlights. Often carries a beautifully subtle hammered texture.</li>
                                    <li><span>Over Time:</span> Continues to darken. Can develop structural patches of green or blue verdigris, especially in humid bathrooms or near salt air. This living transition is highly prized.</li>
                                    <li><span>Best For:</span> Sinks, bathtubs, pendant lights, and outdoor sconces where an earthy, welcoming farmhouse or wine-country aesthetic is desired.</li>
                                </ul>
                            </div>
                        </div>
                
                        <!-- Step 5: Oxidized Copper -->
                        <div class="step-card">
                            <div class="step-number">05</div>
                            <div class="step-content">
                                <h3>Oxidized Copper</h3>
                                <ul class="damage-list">
                                    <li><span>New Look:</span> Deep brown, almost black, with subtle metallic undertones. Dramatic, architectural, and moody.</li>
                                    <li><span>Over Time:</span> Exceptionally stable. It may lighten slightly at raw wear points (handles, edges), but generally retains its dark profile over its lifespan.</li>
                                    <li><span>Best For:</span> Modern kitchen basins, architectural wall art, lifestyle accessories, and contemporary outdoor fixtures where a consistent dark look is key.</li>
                                </ul>
                            </div>
                        </div>
                
                        <!-- Step 6: What Are “Living Finishes”? -->
                        <div class="step-card">
                            <div class="step-number">06</div>
                            <div class="step-content">
                                <h3>What Are “Living Finishes”?</h3>
                                <p>A living finish is any metal surface that is not sealed with lacquer or another permanent coating. Unlacquered brass and aged copper (without sealant) are living finishes. They interact continuously with air, moisture, oils from your hands, and even the food you cook.</p>
                                
                                <div class="alert-box note">
                                    <span>The Organic Process:</span> They darken or lighten over time, develop natural spotting, streaks, or uneven tones, and may grow greenish patches (verdigris) in humid climates. No two living finishes ever look identical — your fixture belongs entirely to your home’s environment.
                                </div>
                            </div>
                        </div>
                
                        <!-- Step 7: Comparison Matrix -->
                        <div class="step-card">
                            <div class="step-number">07</div>
                            <div class="step-content">
                                <h3>Comparing Finishes at a Glance</h3>
                                <p>How our selection compares visually and structurally over time:</p>
                
                                <div class="table-container">
                                    <table class="finishes-table">
                                        <thead>
                                            <tr>
                                                <th>Finish</th>
                                                <th>New Look</th>
                                                <th>Over Time</th>
                                                <th>Living Metal?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span>Unlacquered Brass</span></td>
                                                <td>Bright gold</td>
                                                <td>Darkens, antique brown, verdigris possible</td>
                                                <td>Yes</td>
                                            </tr>
                                            <tr>
                                                <td><span>Aged Brass (Lacquered)</span></td>
                                                <td>Soft antique gold</td>
                                                <td>Stays static and consistent</td>
                                                <td>No</td>
                                            </tr>
                                            <tr>
                                                <td><span>Polished Brass (Lacquered)</span></td>
                                                <td>Mirror‑bright gold</td>
                                                <td>Stays highly reflective</td>
                                                <td>No</td>
                                            </tr>
                                            <tr>
                                                <td><span>Aged Copper (Unlacquered)</span></td>
                                                <td>Warm reddish‑brown</td>
                                                <td>Darkens, develops beautiful green patina</td>
                                                <td>Yes</td>
                                            </tr>
                                            <tr>
                                                <td><span>Oxidized Copper</span></td>
                                                <td>Deep brown / black</td>
                                                <td>Very stable, mild highlight wear</td>
                                                <td>Minimal</td>
                                            </tr>
                                            <tr>
                                                <td><span>Chrome</span></td>
                                                <td>Bright silver</td>
                                                <td>No change, completely static</td>
                                                <td>No</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                
                        <!-- Step 8: Selection Guide -->
                        <div class="step-card">
                            <div class="step-number">08</div>
                            <div class="step-content">
                                <h3>Which Finish Is Right for You?</h3>
                
                                <div class="alert-box info">
                                    <span>Choose Unlacquered Brass if:</span> You love the idea of a faucet or light fixture that records your life, you don’t mind organic fingerprints, and you want something that feels truly alive.
                                </div>
                
                                <div class="alert-box info">
                                    <span>Choose Aged Brass (Lacquered) if:</span> You love the antique aesthetic but demand absolute visual consistency. This is perfect for rentals or projects expecting a fixed appearance.
                                </div>
                
                                <div class="alert-box info">
                                    <span>Choose Polished Brass (Lacquered) if:</span> You want absolute glamour, high shine, and don't want to deal with manual polishing compounds.
                                </div>
                
                                <div class="alert-box warning">
                                    <span>Choose Aged Copper (Unlacquered) if:</span> You dream of an ancestral farmhouse sink that develops a rich, green-tinged patina over years of daily kitchen activity.
                                </div>
                
                                <div class="alert-box warning">
                                    <span>Choose Oxidized Copper if:</span> You prioritize dark, dramatic, modern industrial profiles and want little to no variance across the material footprint.
                                </div>
                            </div>
                        </div>
                
                    </div>
                
                    <!-- Editorial Outro Block -->
                    <footer class="guide-footer">
                        <h2>A Note from Tinza</h2>
                        <p>Most of our artisans will happily customize a piece in any of these finishes — and they can tell you exactly how it will behave in your specific environment (coastal vs. desert, humid bathroom vs. dry living room). Check the product page for finish details, and don’t hesitate to reach out to the maker directly. They love talking about patina.</p>
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