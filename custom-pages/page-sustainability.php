<?php
    /**
     * Template Name: Sustainability Page
     */

    // Remove the page header ONLY for this page

    add_action('wp_head', function() {
        if (is_page('sustainability')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();

?>

    <div id="primary" class="content-area buying-guide-page sustainability-blog">
        <main id="main" class="site-main">

            <!-- Article Hero Header -->
            <header class="header">
                <div class="content">
                    <div class="title">
                        <h1>Sustainable by Nature: Why Copper, Brass, and Handmade Are Better for the Planet</h1>
                    </div>
                    <div class="sub">
                        <p>Choosing heirloom‑quality décor is one of the most eco‑friendly decisions you can make.</p>
                    </div>
                </div>
                <div class="image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/nature.webp" alt="Artisanal Sustainable Copper and Brass Forging Workshop">
                </div>
            </header>

            <!-- Main Editorial Content Container -->
            <div class="care-guide-container">
                
                <!-- Introduction Section -->
                <section class="guide-section">
                    <div class="lede">
                        <p class="dropcap">W</p>e hear a lot about sustainability these days. Recycled packaging. Carbon offsets. Energy‑efficient shipping pipelines. While these industrial benchmarks matter, there is a quieter, far older kind of sustainability that Tinza’s generational artisans practice every day: making things that last. Not for a brief fashion season. Not for a passing digital trend. For generations. Here is why copper, brass, and handcrafted production are inherently sustainable architectural choices for your home.
                    </div>
                </section>

                <!-- Circular Material Life Cycle -->
               <div class="care-guide-container">
 
                    <div class="sequence-container">
                
                        <!-- Step 1: Metals That Never Die: Perpetual Circularity -->
                        <div class="step-card">
                            <div class="step-number">01</div>
                            <div class="step-content">
                                <h3>Metals That Never Die: Perpetual Circularity</h3>
                                <p>Copper and brass are among the most structurally recyclable materials on earth. Unlike petroleum-based plastics or engineered composites that degrade in molecular structural integrity each time they are reprocessed, non-ferrous metals can be melted down and re-forged indefinitely with zero loss of baseline quality.</p>
                                
                                <div class="alert-box warning">
                                    <span>The 80% Metric:</span> Industry data reveals that nearly 80% of all copper ever mined throughout human history is still in active commercial use today. Because its scrap value remains exceptionally high, it is insulated from waste streams.
                                </div>

                                <p>At Tinza, our workshop collectives directly integrate this circular loop. Old plumbing fixtures, industrial structural offcuts, and decommissioned copper water tanks find a new lifecycle as handcrafted kitchen basins, vanity bowls, and pendant illumination fixtures without demanding new mining extractions.</p>
                            </div>
                        </div>
                
                        <!-- Step 2: Low-Impact Handcrafting vs. Mass Industry -->
                        <div class="step-card">
                            <div class="step-number">02</div>
                            <div class="step-content">
                                <h3>Low-Impact Handcrafting vs. Mass Industry</h3>
                                <p>Mass factory manufacturing relies on intense, around-the-clock power grids, automated high-pressure stamping presses, and toxic chemical finish plating baths designed for planned obsolescence. Handcrafting alters the entire footprint:</p>
                                
                                <div class="dos-donts-container">
                                    <!-- Low Impact Box -->
                                    <div class="dos-box">
                                        <h3>The Hand-Forged Footprint</h3>
                                        <ul>
                                            <li><span>Energy Efficiency:</span> A single coppersmith using manual hand tools, anvils, and a small heat torch consumes a small fraction of the energy of an automated factory line.</li>
                                            <li><span>Zero Waste Scraping:</span> Industrial lines discard imperfect trim edges. Our artisans measure manually, using every square inch of a metal plate and melting microscopic scraps down for hardware accents.</li>
                                            <li><span>Organic Formulations:</span> Instead of relying on volatile industrial electro-plating chemicals, Tinza’s finishes utilize natural heat patinas, plant waxes, and basic oil polishes.</li>
                                        </ul>
                                    </div>
                                    
                                    <!-- Human Centric Box -->
                                    <div class="donts-box">
                                        <h3>Community & Heritage Value</h3>
                                        <ul>
                                            <li><span>Preserving Skills:</span> Every piece keeps centuries-old metalworking heritage alive in historic crafting regions rather than surrendering them to automation.</li>
                                            <li><span>Direct Economic Equity:</span> Our localized marketplace framework ensures that our partner artisans retain the vast majority of each architectural sale.</li>
                                            <li><span>Amortized Footprint:</span> While global transport emits carbon, the extreme lifespan of an heirloom item minimizes its annualized footprint next to cheap, disposable décor.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <!-- Step 3: Longevity: The Ultimate Ecological Shield -->
                        <div class="step-card">
                            <div class="step-number">03</div>
                            <div class="step-content">
                                <h3>Longevity: The Ultimate Ecological Shield</h3>
                                <p>The single most sustainable product on earth is the one you never have to replace. Cheap builder-grade fixtures are engineered to fail, leaking or pitting within years. Hand-forged copper and brass invert this disposable consumer cycle:</p>
                                
                                <ul class="damage-list">
                                    <li><span>100-Year Structural Life:</span> A solid, heavy-gauge Unlacquered Brass or Copper basin easily outlives the home it is originally installed in, making it a permanent material asset rather than a landfill candidate.</li>
                                    <li><span>Infinite Repairability:</span> Because our structural connections are forged manually by master smiths, they can be re-hammered, patched, or re-soldered easily if damaged.</li>
                                    <li><span>Anti-Obsolescence Finishes:</span> Raw metals change visually over time. Fingerprints, ambient air, and water trace lines create a rich, protective patina coat that grows more complex and desirable with age.</li>
                                </ul>
                            </div>
                        </div>
                
                        <!-- Step 4: Real-World Circular Case Studies -->
                        <div class="step-card">
                            <div class="step-number">04</div>
                            <div class="step-content">
                                <h3>Real-World Circular Materials from Tinza</h3>
                                <p>We actively turn raw waste and industrial secondary streams into premium interior focal points across our collections:</p>

                                <ul class="damage-list">
                                    <li><span>Recycled Tank Basins:</span> Our copper-smithing lines source decommissioned local copper water boilers and industrial containers, transforming heavy-gauge salvage into farmhouse kitchen statement sinks.</li>
                                    <li><span>Industrial Brass Offcuts:</span> Our hardware specialized workshops salvage tiny brass sheet clippings leftover from massive commercial industrial manufacturing runs, transforming scrap into solid cabinet handles and switches.</li>
                                    <li><span>Solid Unplated Faucets:</span> Mass-market fixtures use cheap zinc or plastic coated with toxic chrome plating that peels permanently. Tinza vanity lines are poured from solid brass, meaning the living patina is entirely natural and completely reversible.</li>
                                </ul>
                            </div>
                        </div>
                
                        <!-- Step 5: The Sustainable Buyer's Guide -->
                        <div class="step-card">
                            <div class="step-number">05</div>
                            <div class="step-content">
                                <h3>The Sustainable Buyer's Guide</h3>
                                <p>To maximize the ecological benefits of owning a living metal interior asset, adopt these simple care stewardship principles:</p>

                                <ul class="damage-list">
                                    <li><span>Embrace the Patina:</span> Reduce your reliance on harsh chemical polishing compounds. Allowing the metal to age naturally prevents synthetic chemical runoff from entering local water tables.</li>
                                    <li><span>Choose Raw Unlacquered Finishes:</span> Acrylic lacquer coatings eventually peel or yellow under UV light, requiring toxic chemical solvents to strip. Unlacquered surfaces require nothing but time and human touch.</li>
                                    <li><span>Repair Over Replacement:</span> If your basin or fixture incurs a deep surface dent across its decades of operation, reach out to an artisan to guide you through manual re-hammering techniques.</li>
                                </ul>
                            </div>
                        </div>
                
                    </div>
                
                    <!-- Editorial Outro Block -->
                    <footer class="guide-footer">
                        <h2>The Tinza Promise</h2>
                        <p>We do not claim absolute perfection. Transporting premium architectural items across oceans requires fuel, and safety packaging remains a necessity. However, we stand uncompromised in our commitment to a slow, deliberate form of commerce: one where products are born from human hands, traded transparently with fair local equity, and curated to last an absolute lifetime. That is not just a sustainability metric. That is a meaningful heritage investment.</p>
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