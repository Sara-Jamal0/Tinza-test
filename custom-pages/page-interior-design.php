<?php
    /**
     * Template Name: Interior Design Page
     */

    // Remove the page header ONLY for this page
    add_action('wp_head', function() {
        if (is_page('interior-design')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();

?>

    <div id="primary" class="content-area buying-guide-page interior-design-blog">
        <main id="main" class="site-main">

            <!-- Article Hero Header -->
            <header class="header">
                <div class="content">
                    <div class="title">
                        <h1>Copper & Brass Are Back: What’s Trending in Interior Design</h1>
                    </div>
                    <div class="sub">
                        <p>From Mediterranean warmth to modern minimalism, here’s how designers are using handcrafted metal to transform bathrooms, kitchens, and luxury spaces.</p>
                    </div>
                </div>
                <!-- Optional image container - hooks into existing header CSS layout -->
                <div class="image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cover.webp" alt="Tinza Buying Guide Header Image">
                </div>
            </header>

            <!-- Main Editorial Content Container -->
            <div class="care-guide-container">
 
                <div class="sequence-container">
            
                    <!-- Step 1: Bathrooms -->
                    <div class="step-card">
                        <div class="step-number">01</div>
                        <div class="step-content">
                            <h3>Bathroom Trends: Warm Metals Take Over</h3>
                            <div class="lede">
                                <p>
                                    The all-chrome bathroom is fading. Today's most striking spaces turn away from sterile, industrial utility in favor of organic textures, living finishes, and artistic focal points that evolve naturally alongside the home.
                                </p>
                            </div> 
            
                            <ul class="damage-list">
                                <li><span>The Main Elements:</span> Striking bathrooms combine unlacquered brass faucets that darken beautifully with use, aged copper sinks that feel more like art than plumbing, and antique brass wall sconces that cast a soft, flattering glow.</li>
                                <li><span>Freestanding Statement Tubs:</span> Aged copper bathtubs have become a signature icon in their own right—especially within spa-inspired master retreats where they retain heat wonderfully.</li>
                                <li><span>Curated Accessories:</span> Pairing these large pieces with open shelving stocked with oxidized copper accessories (soap dishes, waste bins, towel rings) keeps the material narrative consistent.</li>
                                <li><span>The Mixed Metal Secret:</span> Mixed metals are having an editorial moment. A chrome shower system paired intentionally with unlacquered brass towel bars and an oxidized copper mirror feels unexpected and exactly right.</li>
                            </ul>
                        </div>
                    </div>
            
                    <!-- Step 2: Kitchens -->
                    <div class="step-card">
                        <div class="step-number">02</div>
                        <div class="step-content">
                            <h3>Kitchen Trends: Sinks, Lighting, and Soul</h3>
                            <ul class="damage-list">
                                <li><span>The Copper Renaissance:</span> Whether you select aged copper (rich, rustic) or oxidized copper (dark, dramatic), a metal sink anchors the kitchen workspace with warmth.</li>
                                <li><span>Living Faucets:</span> Designers are pairing these basins with unlacquered brass bridge faucets—the kind that patina deeply around the handles and spout, telling the tactile story of every meal made.</li>
                                <li><span>Island Lighting:</span> Over the island, antique brass pendant lights hang lower and bolder. Instead of standard recessed cans, design concepts favor clusters of hand-hammered copper or brass pendants as structural focal points.</li>
                                <li><span>Artisanal Storage Display:</span> Open shelving becomes dynamic display space. A copper pot rack, brass utensil holders, and a few aged copper bowls turn everyday utilitarian objects into sculptural art.</li>
                            </ul>
                        </div>
                    </div>
            
                    <!-- Step 3: Style Spotlight -->
                    <div class="step-card">
                        <div class="step-number">03</div>
                        <div class="step-content">
                            <h3>Style Spotlight: Farmhouse, Rustic, Modern, Mediterranean</h3>
                            <p>Different design ethics call for distinct approaches to handling copper and brass material profiles:</p>
            
                            <ul class="damage-list">
                                <li><span>Farmhouse Style:</span> Tailor-made for aged copper and unlacquered brass. Apron-front copper sinks, heritage bridge faucets, and antique brass wall sconces embrace natural patina as an encouraged asset.</li>
                                <li><span>Rustic Interiors:</span> These concepts lean heavily into oxidized copper and hammered textures. Dark, earthy, and almost black in recessed areas, these finishes pair naturally with raw stone, rough wood, and heavy linen.</li>
                                <li><span>Modern Spaces:</span> Taking the opposite approach with clean lines and high contrast. Think oxidized copper utilized in sleek rectangular sinks, geometric pendant lights, or polished unlacquered brass as a single piercing warm accent.</li>
                                <li><span>Mediterranean Aesthetics:</span> Built on sun-baked structural warmth. Feature antique brass lanterns, aged copper vessel sinks, terracotta tiles, and pivot mirrors with antique brass frames to invoke a timeless Greek or Moroccan villa mood.</li>
                                <li><span>Luxury Settings:</span> Treating copper and brass purely as investment pieces—a freestanding aged copper bathtub resting on a marble platform, a dining table with a solid brass base, or oversized oxidized copper floor mirrors.</li>
                            </ul>
                        </div>
                    </div>
            
                    <!-- Step 4: Why Tinza -->
                    <div class="step-card">
                        <div class="step-number">04</div>
                        <div class="step-content">
                            <h3>Why Designers Are Choosing Tinza</h3>
                            <p>Because Tinza’s master artisans understand that living finishes carry independent design integrity. Every piece is entirely handcrafted, meaning no two architectural elements are exactly alike—delivering the precise uniqueness today’s homeowners crave.</p>
            
                            <ul class="damage-list">
                                <li><span>Unlacquered Brass:</span> Ages with signature grace, shifting tones over seasons of manual touch.</li>
                                <li><span>Aged Copper:</span> Deepens organically over time, moving from bright metal into dark amber tones.</li>
                                <li><span>Oxidized Copper:</span> Arrives dark, dramatic, and stable, resisting fingerprints entirely.</li>
                                <li><span>Antique Brass:</span> Offers instant, high-end vintage charm out of the box with zero maintenance required.</li>
                                <li><span>Chrome:</span> Remains a reliable, bright, and stable option for high-traffic environments.</li>
                            </ul>
            
                            <div class="alert-box info">
                                Copper and brass are no longer minor accents. They have emerged as the main event across sinks, faucets, tubs, lighting, mirrors, and hardware. There is a Tinza piece that belongs in your layout.
                            </div>
                        </div>
                    </div>
            
                </div>
            
                <!-- Editorial Outro Block -->
                <footer class="guide-footer">
                    <h2>Artisanal Quality</h2>
                    <p>Ready to introduce natural warmth to your current project? Explore Tinza’s custom ranges to find the ideal texture match for your space.</p>
                </footer>
            
            </div><!-- .care-guide-container -->
    <!-- ============ RELATED STORIES ============ -->
      <section class="related-stories" aria-label="Related stories">
        <div class="related-header">
          <h2>Related Stories</h2>
          <a href="<?php echo get_permalink(get_page_by_path('news-and-blog')); ?>" class="related-link">View All Journal</a>
        </div>
    
        <div class="related-grid">
    
            <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Oxidized Copper.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="materials">Materials &amp; Craftsmanship</a>
                        <h2 class="card-title">The Beauty of Living Finishes: Understanding Unlacquered Brass, Aged Copper & More</h2>
                        <p class="card-excerpt">Why some of Tinza’s most beautiful pieces are meant to change? And why that’s a good thing?</p>
                        <a href="<?php echo get_permalink(get_page_by_path('finish-and-patina')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
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