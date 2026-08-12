<?php
    /**
     * Template Name: News and Blog Page
     */

    // Remove the page header ONLY for this page

    add_action('wp_head', function() {
        if (is_page('news-and-blog')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
    get_header();

?>

    <main>
        <div class="hero-grid">
         
            <div class="main-content-column">
                
                <article class="hero-card">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cover.webp" alt="Brass fixtures in a modern interior" class="hero-image">
                    <div class="hero-body">
                        <a href="#" class="eyebrow" data-category="inspiration">Design &amp; Lifestyle Inspiration</a>
                        <h1 class="hero-title">
                            Copper & Brass Are Back: What’s Trending in Interior Design
                        </h1>
                        <p class="hero-excerpt">
                            From Mediterranean warmth to modern minimalism, here’s how designers are using handcrafted metal to transform bathrooms, kitchens, and luxury spaces.
                        </p>
                        <div class="hero-footer">
                            <span class="byline">By Tinza · March 8, 2026 · 8 min read</span>
                            <a href="<?php echo get_permalink(get_page_by_path('interior-design')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                        </div>
                    </div>
                </article>

                <div class="search-wrapper">
                    <div class="search-inner">
                        <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                        </svg>
                        <input type="text" id="myInput" oninput="searchFunction()" placeholder="Search..." autocomplete="off" />
                    </div>
                    <div class="search-count" id="searchCount"></div>
                </div>

                <div class="tag-row" role="list" aria-label="Browse by category">
                    <a href="#" class="tag" data-category="inspiration">Design &amp; Lifestyle Inspiration</a>
                    <a href="#" class="tag" data-category="materials">Materials &amp; Craftsmanship</a>
                    <a href="#" class="tag" data-category="installation">Buying &amp; Installation Guides</a>
                    <a href="#" class="tag" data-category="real-estate">Home Value &amp; Real Estate</a>
                    <a href="#" class="tag" data-category="industry">Industry, Health &amp; Community</a>
                </div>

            </div> 
            <aside class="sidebar" aria-label="More articles">
                <article class="side-card">
                    <a href="#" class="eyebrow" data-category="inspiration">Design &amp; Lifestyle Inspiration</a>
                    <h2 class="side-title">Seasonal Home Upgrades: What to Refresh This Spring, Summer, Fall & Holiday</h2>
                    <p class="side-excerpt">From spring renovation ideas to holiday hosting — a year‑round guide to elevating your space with copper and brass.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('seasonal-content')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                </article>

                <article class="side-card">
                    <a href="#" class="eyebrow" data-category="industry">Industry, Health &amp; Community</a>
                    <h2 class="side-title">Cleaner Than You Think: The Antimicrobial Power of Copper & Brass</h2>
                    <p class="side-excerpt">Why your grandmother’s copper sink might have been smarter than any modern disinfectant.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('health-benefits')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                </article>

                <article class="side-card">
                    <a href="#" class="eyebrow" data-category="materials">Materials &amp; Craftsmanship</a>
                    <h2 class="side-title">Copper or Stainless? Brass or Chrome? Handmade or Factory?</h2>
                    <p class="side-excerpt">Honest comparisons to help you choose the right metal for your home.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('material-education')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                </article>
            </aside>
        </div>

        <div class="page">
 
            <h2 class="section-heading">News & Blog</h2>
            <div class="archive-grid">
                <!-- Card 1 -->
                    <article class="card">
                        <img
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/care.webp"
                            alt="Brass sculptural objects beside a curved sofa"
                            class="card-image"
                        />
                        <div class="card-body">
                            <a href="#" class="eyebrow" data-category="materials">Materials &amp; Craftsmanship</a>
                            <h2 class="card-title">The Life of Copper & Brass: How to clean, protect, and appreciate the way your handcrafted pieces age?</h2>
                            <p class="card-excerpt">How to clean, polish, and care for your pieces, and when to let time do the work.</p>
                            <a href="<?php echo get_permalink(get_page_by_path('care-and-maintenance')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                        </div>
                    </article>


                <!-- Card 2 -->
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

                <!-- Card 3 -->
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

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sitemap0.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="materials">Materials &amp; Craftsmanship</a>
                        <h2 class="card-title">Copper vs. Brass vs. Bronze vs. Stainless Steel: What’s the Difference?</h2>
                        <p class="card-excerpt">Why your choice of metal matters — for beauty, durability, and the soul of your home.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('material-education')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pic4.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="materials">Materials &amp; Craftsmanship</a>
                        <h2 class="card-title">The Hands Behind the Metal: How Tinza’s Artisans Craft Copper & Brass?</h2>
                        <p class="card-excerpt">From hammer strike to final polish — a look inside the workshops where soulful décor takes shape.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('craftmanship')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/renovation.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="installation">Buying &amp; Installation Guides</a>
                        <a href="#" class="eyebrow" data-category="inspiration">Design &amp; Lifestyle Inspiration</a>
                        <h2 class="card-title">Planning Your Renovation? What You Need to Know Before Installing Copper & Brass</h2>
                        <p class="card-excerpt">From sink measurements to plumbing prep — a friendly heads‑up for a smooth install.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('installation-and-renovation')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>
 
                <!-- Card 1 -->
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

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/kitchen.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="inspiration">Design &amp; Lifestyle Inspiration</a>
                        <h2 class="card-title">Kitchen & Bathroom Upgrades That Actually Increase Home Value</h2>
                        <p class="card-excerpt">Why premium copper and brass fixtures are the smartest investment in your remodel.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('home-improvement')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/nature.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="industry">Industry, Health &amp; Community</a>
                        <h2 class="card-title">Sustainable by Nature: Why Copper, Brass, and Handmade Are Better for the Planet</h2>
                        <p class="card-excerpt">How choosing heirloom‑quality décor is one of the most eco‑friendly decisions you can make.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('sustainability')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/set.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="real-estate">Home Value &amp; Real Estate</a>
                        <h2 class="card-title">Luxury Lives in the Details: How Top Designers Use Copper & Brass</h2>
                        <p class="card-excerpt">From Manhattan penthouses to Malibu beach houses — handcrafted metal is the new signature of high‑end interiors.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('luxury-home')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/material.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="materials">Materials &amp; Craftsmanship</a>
                        <h2 class="card-title">Copper or Stainless? Brass or Chrome? Handmade or Factory?</h2>
                        <p class="card-excerpt">Honest comparisons to help you choose the right metal for your home.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('product-comparison')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
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

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/contact.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="inspiration">Design &amp; Lifestyle Inspiration</a>
                        <h2 class="card-title">What's Next for Home Design: 2026 Market Trends Shaping Luxury Interiors</h2>
                        <p class="card-excerpt">From remodeling booms to the rise of living finishes — where the industry is headed.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('industry-news')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/real.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="real-estate">Home Value &amp; Real Estate</a>
                        <h2 class="card-title">Real Homes, Real Transformations: How Tinza Pieces Changed These Spaces</h2>
                        <p class="card-excerpt">From dated to dazzling — customer stories that prove the power of handcrafted metal.</p>
                        <a href="#" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
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

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/standard.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="real-estate">Home Value &amp; Real Estate</a>
                        <a href="#" class="eyebrow" data-category="inspiration">Design &amp; Lifestyle Inspiration</a>
                        <h2 class="card-title">The New Standard in Hospitality: How Copper & Brass Are Defining Luxury Commercial Spaces</h2>
                        <p class="card-excerpt">From boutique hotels to Michelin-starred restaurants — why the world's most discerning designers specify Tinza.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('commercial-applications')); ?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
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

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pic 2.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="materials">Materials &amp; Craftsmanship</a>
                        <h2 class="card-title">Troubleshooting Copper & Brass: Common Concerns and Simple Solutions</h2>
                        <p class="card-excerpt">Everything you need to know about water spots, tarnishing, hard water, and more.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('problem-solving'))?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Our vision.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image"
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="real-estate">Home Value &amp; Real Estate</a>
                        <h2 class="card-title">Your Vision, Their Hands: The Art of Custom Copper & Brass Design</h2>
                        <p class="card-excerpt">Why settle for off‑the‑shelf when your sink, faucet, or lighting can be made just for you?</p>
                        <a href="<?php echo get_permalink(get_page_by_path('custom-design'))?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                <!-- Card 1 -->
                <article class="card">
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/premium.webp"
                        alt="Brass sculptural objects beside a curved sofa"
                        class="card-image" 
                    />
                    <div class="card-body">
                        <a href="#" class="eyebrow" data-category="real-estate">Home Value &amp; Real Estate</a>
                        <h2 class="card-title">Premium Fixtures, Premium Value: How Copper & Brass Elevate Your Property</h2>
                        <p class="card-excerpt">Why handcrafted metal fixtures are one of the smartest investments in your home's resale value.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('real-estate'))?>" class="read-link">Read Article <span aria-hidden="true">→</span></a>
                    </div>
                </article>

                

    </main>


<?php
    get_footer();
?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const searchInput = document.getElementById('myInput');
            const searchCount = document.getElementById('searchCount');
            const tags = document.querySelectorAll('.tag-row .tag, .sidebar .tag, .archive-grid .eyebrow');
            const archiveGrid = document.querySelector('.archive-grid');
            const cards = Array.from(archiveGrid.querySelectorAll('.card'));

            // State
            let activeCategory = null;
            let searchQuery = '';

            // Initialize/Bind Events
            if (searchInput) {
                searchInput.addEventListener('input', function(e) {
                    searchQuery = e.target.value.toLowerCase().trim();
                    filterAndSortArticles();
                });
            }

            tags.forEach(tag => {
                tag.addEventListener('click', function(e) {
                    e.preventDefault();
                    const category = this.getAttribute('data-category');

                    // Toggle active state
                    if (activeCategory === category) {
                        activeCategory = null; 
                        removeActiveTagClasses();
                    } else {
                        activeCategory = category;
                        updateActiveTagClasses(category);
                    }

                    filterAndSortArticles();
                });
            });

            // Main Filter and Sort Engine
            function filterAndSortArticles() {
                let visibleCount = 0;
                
                // Arrays to separate items based on relevance to push matches to the top
                const matchingCards = [];
                const nonMatchingCards = [];

                cards.forEach(card => {
                    const titleEl = card.querySelector('.card-title');
                    const excerptEl = card.querySelector('.card-excerpt');
                    const eyebrows = Array.from(card.querySelectorAll('.eyebrow'));
                    
                    const titleText = titleEl ? titleEl.textContent.toLowerCase() : '';
                    const excerptText = excerptEl ? excerptEl.textContent.toLowerCase() : '';
                    
                    // Check category match
                    const hasCategoryMatch = !activeCategory || eyebrows.some(eyebrow => eyebrow.getAttribute('data-category') === activeCategory);

                    // Check search match (Title or Subtitle/Excerpt)
                    const hasSearchMatch = !searchQuery || titleText.includes(searchQuery) || excerptText.includes(searchQuery);

                    if (hasCategoryMatch && hasSearchMatch) {
                        card.style.display = ''; // Show
                        matchingCards.push(card);
                        visibleCount++;
                    } else {
                        card.style.display = 'none'; // Hide
                        nonMatchingCards.push(card);
                    }
                });

                // Rearrange DOM: Put matches cleanly on top
                matchingCards.forEach(card => archiveGrid.appendChild(card));
                nonMatchingCards.forEach(card => archiveGrid.appendChild(card));

                // Update Counter Display
                if (searchCount) {
                    if (searchQuery !== '') {
                        searchCount.textContent = `${visibleCount} article${visibleCount !== 1 ? 's' : ''} found`;
                    } else {
                        searchCount.textContent = '';
                    }
                }
            }

            // Helper functions for UI states
            function removeActiveTagClasses() {
                document.querySelectorAll('.tag-row .tag').forEach(t => t.classList.remove('is-active'));
            }

            function updateActiveTagClasses(category) {
                document.querySelectorAll('.tag-row .tag').forEach(t => {
                    if (t.getAttribute('data-category') === category) {
                        t.classList.add('is-active');
                    } else {
                        t.classList.remove('is-active');
                    }
                });
            }
        });
    </script>