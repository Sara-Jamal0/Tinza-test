<?php
    /**
     * Template Name: About Page
     */

    // Remove the page header ONLY for this page
    add_action('wp_head', function() {
        if (is_page('about')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
  get_header();
?>
<body>
  
    <section class="hero">
      <div class="hero-left">
        <p class="eyebrow fade-up delay-1">Our Story</p>
        <h1 class="hero-title fade-up delay-2">
          At Tinza, <br>
          <span class="accent">we believe in the beauty of tradition.</span>
        </h1>
        <p class="hero-body fade-up delay-3">
          An artisan pours generations of craft and soul into every piece. 
          A collector searches for something beyond the ordinary, 
          a meaningful and unique piece that doesn't just fill a space, 
          but defines it. Tinza is where they find each other.
        </p>
        
      </div>
        <div class="hero-right">
          <div class="img-card img-main">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pic 1.webp" alt="Copper pendant lamps" />
          </div>
          <div class="img-card img-side">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pic 2.webp" alt="Artisan at work" />
          </div>
      </div>
    </section>
 
    <section class="about-section">
      <div class="about-quote-mark">"</div>
      <h2 class="about-heading">
        Some things are too beautiful to be made by machine.
      </h2>
      <p class="about-body">
        Tinza was born from a simple belief: your home deserves pieces with a soul. 
        We connect you directly with skilled artisans across the world  who handcraft 
        copper and brass décor, each piece shaped by hand, finished with care, and made 
        to last a lifetime.
        <br>
        No factories. No shortcuts. Just the quiet pride of a craftsman who signs their work.
      </p>
    </section>

    <section class="split-section">
      <div class="split-image-col">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Our vision.webp" alt="Description of image" />
      </div>
      <div class="split-text-col">
        <p class="split-tag">Our Vision</p>
        <h2 class="split-heading">Bringing meaningful craft into every space</h2>
        <p class="split-body">
          We believe every home deserves objects with meaning. 
          A handcrafted copper lamp that sparks conversation at dinner. 
          A brass bowl that turns a simple shelf into a story. 
          At Tinza, we're building a world where beautiful, soulful 
          décor isn't hard to find ; it's just waiting to be discovered.
        </p>
        <a class="btn" href="<?php echo get_permalink(get_page_by_path('shop')); ?>">Discover the craft</a>
      </div>
    </section>

    <div class="tinza-way">
      <h2 class="tinza-way-heading">The Tinza Way</h2>
      <p class="tinza-way-sub">
        Real artisans. Handcrafted copper and brass. 
        Delivered straight to your door.
      </p>
      <p class="tinza-way-body">
        No factories. No middlemen. 
        Just pieces with warmth, character, and a story worth telling,
        made the Tinza way.
      </p>
    </div>
  
</body>

<?php get_footer(); ?>