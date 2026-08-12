<?php
    /**
     * Template Name: Buying Guide Page
     */

    // Remove the page header ONLY for this page
    add_action('wp_head', function() {
        if (is_page('buying-guide')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();

?>

    <body>
    <!-- HEADER -->
    <div class="header">
        <div class="content">
        <div class="title">
            <h1>The Tinza Buying Guide: How to Choose Finishes, Sizes & Styles for Copper & Brass Pieces</h1>
        </div>
        <div class="sub">
            <p>From bathroom sinks to outdoor lighting — make confident choices for every room.</p>
        </div>
        </div>

        <div class="image">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sitemap1.webp" alt="Tinza Buying Guide Header Image">
        </div>
    </div>

    <!-- MAIN CONTENT CONTAINER -->
    <main class="care-guide-container">
        
        <!-- Intro Paragraphs -->
        <section class="intro-text">
            <div class="lede">
                <p class="dropcap">Bringing handcrafted copper or brass into your home is a beautiful decision. But with finishes like Unlacquered Brass, Aged Copper, and Oxidized Copper, it helps to know what to expect.</p>
                <p>This guide walks you through the most popular Tinza categories — bathroom, kitchen, lighting, mirrors, accessories, outdoor, and tables — so you can pick pieces that fit your space, style, and lifestyle.</p>
            </div>
            </section>

            <div class="sequence-container">
    
            <!-- Step 1: Understanding Our Finishes -->
            <div class="step-card">
                <div class="step-number">01</div>
                <div class="step-content">
                    <h3>Understanding Our Finishes</h3>
                    <p>Each finish has a unique personality. Here’s how they behave across our collections:</p>
    
                    <div class="table-container">
                        <table class="finishes-table">
                        <thead>
                        <tr>
                            <th>Finish</th>
                            <th>Look</th>
                            <th>How It Ages</th>
                            <th>Best For</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Unlacquered Brass</td>
                            <td>Warm golden tone</td>
                            <td>Darkens and patinas naturally over time</td>
                            <td>Sinks, faucets, hardware, lighting</td>
                        </tr>
                        <tr>
                            <td>Aged Copper</td>
                            <td>Rich, dark reddish-brown</td>
                            <td>Continues to deepen; may develop greenish patina</td>
                            <td>Sinks, bathtubs, outdoor fixtures</td>
                        </tr>
                        <tr>
                            <td>Oxidized Copper</td>
                            <td>Deep brown/black with metallic undertones</td>
                            <td>Stable, minimal further change</td>
                            <td>Wall art, accessories, outdoor sconces</td>
                        </tr>
                        <tr>
                            <td>Antique Brass</td>
                            <td>Vintage, muted gold with dark spots</td>
                            <td>Very slow change (often sealed)</td>
                            <td>Lighting, mirrors, towel bars, cabinet pulls</td>
                        </tr>
                        <tr>
                            <td>Chrome</td>
                            <td>Bright, cool, mirror-like</td>
                            <td>Does not patina; stays shiny</td>
                            <td>Faucets, shower systems, modern hardware</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
    
                    <div class="alert-box info">
                        Tip: If you love a lived‑in, evolving look, choose Unlacquered Brass or Aged Copper. If you prefer consistency, go with Chrome or Oxidized Copper.
                    </div>
                </div>
            </div>
    
            <!-- Step 2: Bathroom -->
            <div class="step-card">
                <div class="step-number">02</div>
                <div class="step-content">
                    <h3>Bathroom: Sinks, Faucets, Bathtubs & More</h3>
    
                    <h4>Copper Sinks (Aged Copper or Oxidized Copper)</h4>
                    <ul class="damage-list">
                        <li><span>Aged Copper sink:</span> Warm, rustic, develops character with every use. Perfect for farmhouse or Mediterranean bathrooms.</li>
                        <li><span>Oxidized Copper sink:</span> Dark, dramatic, almost black. Hides water spots well. Great for modern or industrial spaces.</li>
                        <li><span>Size tip:</span> A standard bathroom sink is 16–20 inches wide. For a double vanity, choose two smaller sinks (15–17 inches each).</li>
                    </ul>
    
                    <h4>Faucets in Unlacquered Brass or Chrome</h4>
                    <ul class="damage-list">
                        <li><span>Unlacquered Brass faucet:</span> Will darken over time, especially near water. Many people love this natural evolution.</li>
                        <li><span>Chrome faucet:</span> Bright, easy to clean, stays the same. Best for contemporary or high‑traffic bathrooms.</li>
                        <li><span>Match or mix?</span> A copper sink pairs beautifully with an Unlacquered Brass faucet. Chrome works well with Oxidized Copper.</li>
                    </ul>
    
                    <h4>Bathtubs</h4>
                    <ul class="damage-list">
                        <li><span>Aged Copper bathtub:</span> A true statement piece. Requires gentle cleaning but retains heat wonderfully.</li>
                        <li><span>Unlacquered Brass bathtub:</span> Rare and luxurious. Expect beautiful, organic patina tracking near the water lines.</li>
                    </ul>
    
                    <h4>Bathroom Accessories</h4>
                    <ul class="damage-list">
                        <li><span>Unlacquered Brass Towel Bar and hooks:</span> Will patina from continuous hand contact. Gorgeous over time.</li>
                        <li><span>Aged Copper Soap dish:</span> A small touch of natural warmth next to porcelain surfaces.</li>
                        <li><span>Toilet brush holders & waste bins:</span> Oxidized Copper choices resist fingerprints and stay elegantly dark.</li>
                    </ul>
    
                    <div class="alert-box info">
                        For shower systems and shower rods, Chrome is the most practical choice (making water spots less visible), but Unlacquered Brass makes a bolder, uncompromising luxury statement.
                    </div>
                </div>
            </div>
    
            <!-- Step 3: Kitchen -->
            <div class="step-card">
                <div class="step-number">03</div>
                <div class="step-content">
                    <h3>Kitchen: Sinks, Faucets, Lighting & More</h3>
    
                    <h4>Kitchen Sinks — Copper is a Star</h4>
                    <ul class="damage-list">
                        <li><span>Hammered Oxidized Copper Sink:</span> Naturally antimicrobial, warm, and beautiful. Always choose a premium 16‑gauge (thicker) build variant for timeless structural durability.</li>
                        <li><span>Oxidized Copper sink:</span> Dark and moody. Outstanding variant choice for hiding micro-scratches and routine kitchen water spots.</li>
                        <li><span>Size guide:</span> Single bowl (24–30 inches) • Double bowl (32–36 inches) • Farmhouse apron sinks (30–36 inches).</li>
                    </ul>
    
                    <h4>Kitchen Faucets & Core Accents</h4>
                    <ul class="damage-list">
                        <li><span>Unlacquered Brass bridge faucet:</span> Provides a classic, heritage farmhouse look that patinas intimately with kitchen use.</li>
                        <li><span>Chrome faucet:</span> Modern, easy to clean, completely non-patina dependent.</li>
                        <li><span>Kitchen Lighting:</span> Antique Brass pendant lights deliver a warm, glowing vintage feel. Hang them 30–36 inches above your kitchen island workspace.</li>
                    </ul>
    
                    <h4>Pot Racks & Kitchen Accessories</h4>
                    <ul class="damage-list">
                        <li><span>Aged Copper Pot Rack:</span> Show off your luxury cookware while expanding open spatial storage.</li>
                        <li><span>Brass Pot Rail & Soap Dispenser:</span> Small architectural details in matching Unlacquered Brass that seamlessly tie the room together.</li>
                        <li><span>Kitchen Tables:</span> A copper‑topped table or brass base table acts as a true heirloom piece. Oxidized Copper tops resist stains and acids much better than mirror-finished options.</li>
                    </ul>
                </div>
            </div>
    
            <!-- Step 4: Lighting -->
            <div class="step-card">
                <div class="step-number">04</div>
                <div class="step-content">
                    <h3>Lighting Throughout the Home</h3>
                    <p>Tinza offers Floor Lamps, Pendant Lights, Table Lamps, and Wall Sconces across our signature metal finery:</p>
                    <ul class="damage-list">
                        <li><span>Unlacquered Brass:</span> Warms up beautifully over time. Perfect for curated living rooms and intimate dining spaces.</li>
                        <li><span>Antique Brass:</span> Zero further patina updates required; high-end vintage charm ready right out of the artisan box.</li>
                        <li><span>Aged Copper:</span> Rustic, deep, and rich. Ideal accent colors for statement kitchens and warm entryways.</li>
                        <li><span>Oxidized Copper:</span> Dark, dramatic, and tactile. Stunning addition to contemporary minimalist or industrial interior designs.</li>
                    </ul>
    
                    <div class="alert-box warning">
                        <span>Architectural Height Guide:</span> Hanging a pendant over a dining table requires 30–34 inches of clearance above the surface. Floor lamp shades should sit at eye level when seated (approx. 58–64 inches), and classic wall sconces profile best at 60–66 inches from the finished floor line.
                    </div>
                </div>
            </div>
    
            <!-- Step 5: Mirrors -->
            <div class="step-card">
                <div class="step-number">05</div>
                <div class="step-content">
                    <h3>Mirrors: Wall‑Mounted, Floor, Hanging Strap & Pivot</h3>
                    <p>Frames built in Antique Brass or Unlacquered Brass inject instant structural elegance into structural galleries:</p>
                    <ul class="damage-list">
                        <li><span>Wall‑mounted mirror with Antique Brass frame:</span> Classic and easy to place. Hang centered at standard eye level (about 60 inches from floor).</li>
                        <li><span>Floor mirror in Oxidized Copper:</span> Serves as a heavy, sculptural leaning piece that commands visual focus against minimalist plaster walls.</li>
                        <li><span>Hanging strap mirror:</span> Paired with custom Unlacquered Brass hardware for a more casual, artisanal mood. The mounting straps patina naturally over time.</li>
                        <li><span>Pivot mirror:</span> Functional, adjustable, and distinct. Selecting an Aged Copper frame version adds effortless warmth to neutral bathrooms.</li>
                    </ul>
                </div>
            </div>
    
            <!-- Step 6: Accessories & Small Décor -->
            <div class="step-card">
                <div class="step-number">06</div>
                <div class="step-content">
                    <h3>Accessories & Small Décor</h3>
                    <p>From warm candle holders to brutalist vases, small artisanal elements tie a room's material stories together perfectly:</p>
                    <ul class="damage-list">
                        <li><span>Unlacquered Brass trays:</span> Intended to show immediate fingerprints and living patina maps; a gorgeous centerpiece for a primary coffee table.</li>
                        <li><span>Aged Copper candle holders:</span> Offers a rich, dark background where flickering candle flame reflections bounce beautifully.</li>
                        <li><span>Oxidized Copper bowls:</span> Delivers an ultra-matte, modern charcoal dark aesthetic choice for storage accents.</li>
                    </ul>
                </div>
            </div>
    
            <!-- Step 7: Outdoor & Garden -->
            <div class="step-card">
                <div class="step-number">07</div>
                <div class="step-content">
                    <h3>Outdoor & Garden Installations</h3>
                    <ul class="damage-list">
                        <li><span>Outdoor Showers:</span> Chrome remains heavily weather‑resistant, but opting for Unlacquered Brass will slowly develop a stunning, rich seaside verdigris patina from exposure to elements.</li>
                        <li><span>Outdoor Wall Sconces & Pendant Lights:</span> Select deep Oxidized Copper or robust Aged Copper fixtures to match natural exterior environments. Avoid mirror-polished finishes outdoors, as they display every rain and mineral spot.</li>
                        <li><span>Placement tips:</span> Outdoor sconces match entry door heights best at 66 inches from the ground, spaced roughly 6–8 feet apart. Covered porch pendants require at least 7 feet of structural bottom clearance.</li>
                    </ul>
                </div>
            </div>
    
            <!-- Step 8: Tables -->
            <div class="step-card">
                <div class="step-number">08</div>
                <div class="step-content">
                    <h3>Tables: Dining, Console & Coffee Pieces</h3>
                    <p>Copper table tops (Aged or Oxidized): A structural conversation starter. Heavy Oxidized options behave with maximum stain-resistance during everyday food interactions.</p>
                    <p>Brass base tables (Unlacquered or Antique): The pure metal base framing will patina gently down where feet touch if unlacquered options are utilized.</p>
                    <p>
                        <span>Sizing Rules:</span>
                        Allocate 24–30 inches of dining table width per individual guest. Coffee tables profile best at exactly 2/3 the overall length of your primary living room sofa, while matching console tables should take up 2/3 the length of their backdrop wall space.
                    </p>
                </div>
            </div>
    
            <!-- Step 9: Quick Reference Checklist -->
            <div class="step-card">
                <div class="step-number">09</div>
                <div class="step-content">
                    <h3>Quick Reference: The Buying Checklist</h3>
    
                    <div class="dos-donts-container">
                        <div class="dos-box">
                        <h4>✓ Core Selections to Confirm</h4>
                        <ul>
                            <li>Material finish chosen and verified against room architecture palette.</li>
                            <li>Patina style target set (living unlacquered vs static lacquer/chrome).</li>
                            <li>Precise measurements recorded for overall width, height, and entry depth.</li>
                        </ul>
                        </div>
    
                        <div class="donts-box">
                        <h4>✗ Avoid Ordering Errors</h4>
                        <ul>
                            <li>Do not overlook daily wear frequency (pick oxidized/chrome for high-traffic items).</li>
                            <li>Do not guess dimensions without projecting layout clearance heights.</li>
                            <li>Never hesitate to query our master artisans via Tinza before final curation.</li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </main>

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
    </body>

<?php get_footer(); ?>