<?php
    /**
     * Template Name: Care and Maintenance Page
     */

    // Remove the page header ONLY for this page

    add_action('wp_head', function() {
        if (is_page('care-and-maintenance')) {
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
        <h1>The Life of Copper & Brass: How to clean, protect, and appreciate the way your handcrafted pieces age?</h1>
      </div>
      <div class="sub">
        <p>How to clean, polish, and care for your pieces, and when to let time do the work.</p>
      </div>
    </div>

    <div class="image">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/care.webp" alt="Care and Maintenance Header Image">
    </div>
  </div>

  <!-- MAIN CONTENT CONTAINER -->
  <main class="care-guide-container">
    
    <section class="sequence-container">
 
    <!-- Step 1: Everyday Cleaning -->
    <div class="step-card">
        <div class="step-number">01</div>
        <div class="step-content">
            <h3>Everyday Cleaning</h3>
 
            <h4>Light dust or fingerprints</h4>
            <p>A quick wipe with a soft, dry microfiber cloth is all you need.</p>
 
            <h4>Routine cleaning</h4>
            <p>Mix warm water with a drop of mild dish soap and dampen a soft cloth. Wipe the surface, then go over it with a clean damp cloth to rinse. Dry straight away to avoid water spots.</p>
 
            <div class="alert-box warning">
                Skip abrasive sponges, steel wool, or harsh scrubbers. They'll scratch the surface.
            </div>
        </div>
    </div>
 
    <!-- Step 2: Polishing -->
    <div class="step-card">
        <div class="step-number">02</div>
        <div class="step-content">
            <h3>Polishing: Shine vs. Patina</h3>
 
            <h4>To keep the shine</h4>
            <p>Polish every few months with a dedicated copper or brass polish — Brasso, Nevr‑Dull, and Wright's are all good options. Apply with a soft cloth, buff gently, and wipe away any residue.</p>
 
            <h4>To let the patina develop</h4>
            <p>Do nothing — time and air will take care of it. Copper and brass naturally deepen into a warm, antique tone over the years. And if you ever want the shine back, a quick polish will get you there.</p>
 
            <div class="alert-box info">
                Want to slow things down? A thin coat of clear lacquer or beeswax after polishing will keep the shine going longer.
            </div>
        </div>
    </div>
 
    <!-- Step 3: Removing Heavy Tarnish -->
    <div class="step-card">
        <div class="step-number">03</div>
        <div class="step-content">
            <h3>Removing Heavy Tarnish</h3>
            <p>Dark brown or green copper, or dull and spotted brass, can usually be brought back with a simple paste — no specialist equipment needed.</p>
 
            <h4>Copper — lemon juice & baking soda</h4>
            <p>Mix equal parts into a paste and apply with a soft cloth. Rinse well and dry straight away.</p>
 
            <h4>Brass — vinegar, salt & flour</h4>
            <p>Mix equal parts into a paste and leave on for 15 minutes. Rinse and buff dry.</p>
 
            <h4>Store-bought tarnish remover</h4>
            <p>A good option if you want faster results — follow the product instructions and you're good to go.</p>
 
            <div class="alert-box warning">
                Always test on a small, hidden area before applying to the whole piece.
            </div>
        </div>
    </div>
 
    <!-- Step 4: Preventing Damage -->
    <div class="step-card">
        <div class="step-number">04</div>
        <div class="step-content">
            <h3>Preventing Damage</h3>
            <ul class="damage-list">
                <li><span>No dishwashers:</span> The heat and detergents will permanently damage the finish.</li>
                <li><span>High temperatures:</span> Can cause warping and discolouration.</li>
                <li><span>Avoid harsh chemicals:</span> Bleach, ammonia, and acidic cleaners will strip and pit the surface.</li>
                <li><span>Store somewhere dry:</span> Humidity is the fastest way to accelerate tarnish.</li>
                <li><span>Handle with clean hands:</span> Oils from skin leave marks that are hard to shift.</li>
            </ul>
        </div>
    </div>
 
    <!-- Step 5: Restoring Old or Damaged Pieces -->
    <div class="step-card">
        <div class="step-number">05</div>
        <div class="step-content">
            <h3>Restoring Old or Damaged Pieces</h3>
            <p class="section-lead">Even if your piece has deep scratches, dents, or has lost its lacquer coating, don’t worry; Copper and Brass can often be brought back to life with the right care.</p>
 
            <h4>Minor scratches</h4>
            <p>Lightly buff the surface using extra‑fine (0000 grade) steel wool. Follow up with a gentle polish to restore shine.</p>
 
            <h4>Lost lacquer</h4>
            <p>Remove the remaining lacquer with acetone or lacquer thinner. Once the surface is clean, apply a fresh coat of clear metal lacquer or protective wax.</p>
 
            <h4>Deeper damage</h4>
            <p>For dents, heavy scratches, or structural issues, reach out to the original artisan through Tinza. Many offer restoration services or can recommend a skilled professional metalworker.</p>
        </div>
    </div>
 
    <!-- Step 6: Quick Reference: Dos and Don'ts -->
    <div class="step-card">
        <div class="step-number">06</div>
        <div class="step-content">
            <h3>Quick Reference: Dos and Don’ts</h3>
 
            <div class="dos-donts-container">
                <div class="dos-box">
                    <h4>✓ Recommended Practices</h4>
                    <ul>
                        <li><span>Soft cloth:</span> Use microfiber or cotton to avoid scratching.</li>
                        <li><span>Immediate drying:</span> Wipe surfaces right after washing to prevent water spots.</li>
                        <li><span>Metal‑specific polish:</span> Apply products designed for copper, brass, or other metals when extra shine is needed.</li>
                        <li><span>Natural patina:</span> Let the surface age gracefully if you enjoy a vintage look.</li>
                        <li><span>Artisan guidance:</span> Always follow care instructions provided by the maker or listed on the product page.</li>
                    </ul>
                </div>
 
                <div class="donts-box">
                    <h4>✗ Practices to Avoid</h4>
                    <ul>
                        <li><span>Abrasive tools:</span> Avoid steel wool, harsh pads, or scrubbers that can damage the finish.</li>
                        <li><span>Standing water:</span> Never leave moisture on the surface — it can cause stains or corrosion.</li>
                        <li><span>Harsh chemicals:</span> Do not use bleach, ammonia, oven cleaner, or similar products.</li>
                        <li><span>Dishwasher use:</span> Keep copper and brass items out of the dishwasher to preserve their finish.</li>
                        <li><span>Ignoring care guidance:</span> Skipping artisan instructions can shorten the life of your piece.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- Outro / Conclusion -->
    <footer class="guide-footer">
      <h2>Your Piece, Your Way</h2>
      <p>At Tinza, every copper and brass creation is handmade with care; and how you choose to care for it becomes part of its story. Whether you prefer to keep it gleaming like new or allow it to develop a rich, natural patina over time, your piece will always reflect both your touch and the soul of the artisan who crafted it.</p>
    </footer>

      

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
</body>



  <?php get_footer(); ?>