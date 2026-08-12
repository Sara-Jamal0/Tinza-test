<?php
    /**
     * Template Name: Craftmanship Page
     */

    // Remove the page header ONLY for this page

    add_action('wp_head', function() {
        if (is_page('craftmanship')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();

?>

    <div id="primary" class="content-area buying-guide-page craftsmanship-blog">
        <main id="main" class="site-main">

            <!-- Article Hero Header -->
            <header class="header">
                <div class="content">
                    <div class="title">
                        <h1>The Hands Behind the Metal: How Tinza’s Artisans Craft Copper & Brass</h1>
                    </div>
                    <div class="sub">
                        <p>From hammer strike to final polish — a look inside the workshops where soulful décor takes shape.</p>
                    </div>
                </div>
                <div class="image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pic4.webp" alt="Tinza Artisan Hammering Copper in Workshop">
                </div>
            </header>

            <!-- Main Editorial Content Container -->
            <div class="care-guide-container">
                
                <!-- Introduction Section -->
                <section class="guide-section">
                    <div class="lede">
                        <p>Every piece on Tinza begins as a raw sheet or ingot of copper or brass. But what happens next is anything but industrial. It’s a quiet dance of fire, force, and finesse — passed down through generations, reimagined for today’s homes.</p>
                    </div>
                </section>

                <!-- The Craftsmanship Sequence Layout -->
                <div class="sequence-container">

                    <!-- Step 1 -->
                    <div class="step-card">
                        <div class="step-number">01</div>
                        <div class="step-content">
                            <h3>The Raw Beginning: Sheets, Tubes, and Solid Metal</h3>
                            <p>It starts with metal. Copper and brass arrive as flat sheets, hollow tubes, or solid castings. Unlike factory production, where a machine stamps out hundreds of identical pieces, Tinza’s artisans handle each sheet individually. They feel its thickness, its grain, its memory.</p>
                            <p>Some workshops use recycled copper — melting down old pipes or scrap into fresh ingots. Others source virgin metal for its consistent purity. Either way, the first step is always human: inspecting the material for flaws, measuring twice, and imagining the finished form.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-card">
                        <div class="step-number">02</div>
                        <div class="step-content">
                            <h3>Hammering: The Heartbeat of Handcraft</h3>
                            <p>This is where the metal comes alive. Using specialized hammers, the artisan strikes the surface again and again. Each blow compresses and shapes the metal.</p>
                            <ul class="damage-list">
                                <li><span>Raising:</span> The artisan hammers a flat sheet over a stake or anvil, gradually curving it into a bowl, a sink, or a vase through dozens of precise passes.</li>
                                <li><span>Planishing:</span> A lighter, rhythmic hammering that smooths and hardens the surface, leaving those beautiful, tiny overlapping dimples unique to handcrafted copper.</li>
                                <li><span>Texturing:</span> Custom‑made hammer heads are deployed to create organic structural patterns like waves, scales, or rustic dimples.</li>
                            </ul>
                            <div class="alert-box note">
                                The sound of hammering is the heartbeat of a workshop. It’s slow, deliberate, and unmistakably human.
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step-card">
                        <div class="step-number">03</div>
                        <div class="step-content">
                            <h3>Forming & Seaming</h3>
                            <p>Not every piece is hammered from a single sheet. Some require bending, folding, and joining. Artisans use wooden forms or steel mandrels to shape copper tubes into complex pendant lights.</p>
                            <p>They solder seams with a torch — a delicate hand that knows exactly how much heat to apply. On larger pieces like bathtubs, multiple sheets are joined with hidden rivets or welded seams, then sanded perfectly flush so you’d never know where one sheet ends and another begins.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="step-card">
                        <div class="step-number">04</div>
                        <div class="step-content">
                            <h3>Surface Finishing: Where Character Emerges</h3>
                            <p>The raw metal after hammering is dull, sometimes rough. Finishing transforms it completely:</p>
                            <ul class="damage-list">
                                <li><span>Polishing:</span> Progressively finer abrasives — from coarse sandpaper to soft cloth wheels with premium compounds — bring out a mirror‑like shine.</li>
                                <li><span>Brushing:</span> Industrial wire brushes create a sleek satin, linear grain that gracefully hides fingerprints and feels soft to the touch.</li>
                                <li><span>Oxidizing:</span> To achieve Tinza’s Oxidized Copper or Antique Brass, artisans apply chemical patinas to darken it instantly, then buff it back to reveal rich highlights.</li>
                                <li><span>Lacquering:</span> A clear protective coating can be applied to lock the finish. Unlacquered pieces are left raw, destined to patina naturally in your home environment.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="step-card">
                        <div class="step-number">05</div>
                        <div class="step-content">
                            <h3>Quality Control: Every Piece Inspected, Twice</h3>
                            <p>Before any piece ships, it must pass a rigorous quality framework check. Not by a machine, but by the exact same hands that made it.</p>
                            <p><span>Visual inspection:</span> Under optimal light, the artisan checks for uneven hammer marks, stray scratches, or areas where the patina didn’t take correctly. <br>
                            <span>Structural check:</span> Does the lamp feel balanced? Are the soldered joints completely solid? <br>
                            <span>Function test:</span> Faucets are connected to water pressure, lights are wired and switched on, and drawer pulls are mounted to a test board before final clearance.</p>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="step-card">
                        <div class="step-number">06</div>
                        <div class="step-content">
                            <h3>Why Handcraft Matters</h3>
                            <p>Mass production can make a copper bowl in seconds. But that bowl has no memory. No individual hammer stroke. No subtle variation in its rim or patina.</p>
                            <p>A Tinza piece carries the evidence of its making: a slightly irregular curve, a fingerprint under the lacquer, the warmth of a craftsman’s attention. These are not flaws. They are proof of humanity. Because our artisans control every step, they can also customize down to the inch.</p>
                        </div>
                    </div>

                    <!-- Step 7 -->
                    <div class="step-card">
                        <div class="step-number">07</div>
                        <div class="step-content">
                            <h3>A Glimpse of the Future</h3>
                            <p>Tinza is committed to preserving these heritage techniques. Many of our artisans apprenticed for years — learning to read the metal, to judge temperature by color, and to strike with total consistency. As we grow, we document their methods through video and photography, sharing the invisible labor behind every listing.</p>
                        </div>
                    </div>

                </div><!-- .sequence-container -->

                <!-- Editorial Outro Block -->
                <footer class="guide-footer">
                    <h2>Supporting a Living Craft</h2>
                    <p>When you buy from Tinza, you’re not just acquiring décor. You’re supporting a lineage of makers, keeping ancient artistry thriving in the modern home.</p>
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