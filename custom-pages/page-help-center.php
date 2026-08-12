<?php
    /**
     * Template Name: Help Center Page
     */
 
    add_action('wp_head', function() {
        if (is_page('help-center')) {
            echo '<style>#page-header{display:none !important;}</style>';
        }
    });
 
    get_header();
?>
<body>
 
    <section class="hero">
        <div class="hero-content">
            <p class="hero-faq">SUPPORT</p>
            <h1 class="hero-title">How can we help?</h1> 
            <p class="hero-subtitle">Find answers, browse topics, or reach out to our team.</p>
            <div class="search-wrapper">
                <div class="search-inner">
                    <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                    </svg>
                    <input type="text" id="myInput" oninput="searchFunction()" placeholder="Search for answers…" autocomplete="off" />
                    <button class="search-clear" id="searchClear" onclick="clearSearch()" aria-label="Clear search">✕</button>
                </div>
                <div class="search-count" id="searchCount"></div>
            </div>
        </div>
    </section>
 
    <section class="common-inquiries">
        <div class="hero-tags">
            <a href="#" class="hero-tag" data-category="shopping">Shopping &amp; Products</a>
            <a href="#" class="hero-tag" data-category="orders">Orders &amp; Shipping</a>
            <a href="#" class="hero-tag" data-category="returns">Returns &amp; Issues</a>
            <a href="#" class="hero-tag" data-category="quality">Quality &amp; Warranty</a>
            <a href="#" class="hero-tag" data-category="customization">Customization</a>
        </div>
    </section>
 
    <section class="faq-section">
        <div class="faq-container">
 
            <div class="faq-item" data-category="shopping">
                <button class="faq-question searchable-item">What kind of products can you find on Tinza?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Everything on Tinza is handcrafted from copper and brass — two materials chosen for their beauty, durability, and ability to grow more characterful with time.<br><br>
                        From kitchen and dining essentials to lighting, wall décor, and decorative accents, every piece is designed to bring warmth and intention to a space. You'll also find bathroom fixtures, cabinet hardware, and outdoor pieces for a more complete transformation.<br><br>
                        Every product page lists exact materials and care instructions, so you always know exactly what you're bringing home.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="shopping">
                <button class="faq-question searchable-item">Why Choose Tinza?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Unique handcrafted pieces: No factory lines. No duplicates. Every item is handcrafted with its own personality, texture, and story.<br><br>
                        Made by exceptional artisans: Real people with generations of skill, shaping copper and brass into generational décor built to be passed down.<br><br>
                        Every maker, carefully handpicked: We hold every artisan to the highest standards of craftsmanship, reliability, and authenticity — so you can shop with complete confidence.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="returns">
                <button class="faq-question searchable-item">How do I get help with an order?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Head to the bottom of any page and click Contact Us to reach our support team directly.<br><br>
                        Having your order number on hand will help us resolve your issue as quickly as possible.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="shopping">
                <button class="faq-question searchable-item">How do I purchase an item on Tinza?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Buying on Tinza is simple. Here's how:<br><br>
                        1. Browse or search — Explore our collection by category or use the search bar to find something specific.<br>
                        2. View product details — Click any item to see photos, materials, dimensions, care instructions, and the artisan behind it.<br>
                        3. Contact the seller (optional) — Have a question? Reach out to the artisan directly to get more details before placing your order.<br>
                        4. Add to cart — Select your preferred size, finish, and quantity, then click "Add to Cart."<br>
                        5. Proceed to checkout — Review your cart and click "Proceed to Checkout."<br>
                        6. Enter your details — Provide your shipping address and choose a payment method. All transactions are fully secure.<br>
                        7. Place your order — Review everything and click "Place Order." A confirmation email will land in your inbox right away.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="returns">
                <button class="faq-question searchable-item">How do I contact a shop?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Connecting directly with artisans is simple. Here's how:<br><br>
                        1. Go to the product page — Find the item you're interested in.<br>
                        2. Message the artisan — Look for the contact option near the price or seller info.<br>
                        3. Write your message — Ask about materials, customization, shipping, or anything else on your mind.<br>
                        4. Wait for a reply — The artisan will respond directly to your inbox, usually within 24–48 hours.<br><br>
                        You can also visit the seller's shop page and reach out from there.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="orders">
                <button class="faq-question searchable-item">What's the status of my order?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        You can check your order status anytime in just a few steps:<br><br>
                        1. Log into your account — Head to My Account > Orders.<br>
                        2. Find your order — Click on it to see its current status and details.<br><br>
                        Need more information? Reach out to the artisan directly from the order page.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="shopping">
                <button class="faq-question searchable-item">How to search for items on Tinza?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Finding the perfect copper or brass piece is simple.<br><br>
                        Use the search bar at the top of any page. Type a keyword (e.g., "brass lamp," "copper pitcher," "wall sconce").<br>
                        Filter your results by category, material, price, or artisan location.<br>
                        Browse by category from the main menu: Kitchen & Dining, Lighting, Wall Art, and more.<br><br>
                        Tip: Create a free Tinza account to save your favorite items for later.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="orders">
                <button class="faq-question searchable-item">How do I change my shipping address?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        It depends on where your order is in the process.<br><br>
                        Haven't placed an order yet? Head to My Account > Addresses, click Edit next to your shipping address, update your details, and save.<br><br>
                        Order placed but not yet shipped? Reach out to the artisan immediately through your order page and ask them to update the address. Most artisans can accommodate the change as long as the order hasn't been prepared for shipping yet.<br><br>
                        Order already shipped? Unfortunately, the address can no longer be changed on our end. You'll need to contact the shipping carrier directly with your tracking number to request a redirect — please note that additional fees may apply.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="orders">
                <button class="faq-question searchable-item">Will I have to pay tax, customs, or tariffs on my order?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        It depends on where you are and where your artisan ships from.<br><br>
                        Domestic orders (same country as the artisan): Standard local sales tax or VAT is applied at checkout. No additional customs fees.<br><br>
                        International orders: Your local customs office may charge duties, import taxes, or handling fees upon arrival. These charges are the buyer's responsibility and are not included in the item price or shipping cost shown on Tinza.<br><br>
                        We recommend checking with your local customs office before placing an international order to avoid any unexpected fees.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="shopping">
                <button class="faq-question searchable-item">How long does shipping take?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Shipping times vary depending on the artisan's location and whether your item is ready-made or custom-crafted.<br><br>
                        You'll find the estimated delivery timeframe directly on each product page.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="shopping">
                <button class="faq-question searchable-item">Why might the product I receive look slightly different from the photos?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        All Tinza products are handcrafted, meaning no two pieces are exactly alike.<br><br>
                        You may notice slight variations in color, texture, or finish — this is a natural characteristic of working with materials like copper and brass, and part of what makes each piece truly one of a kind.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="customization">
                <button class="faq-question searchable-item">Can I request a custom-made product?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Absolutely! Tinza offers a personalized customization experience where you can collaborate directly with our artisans to bring your vision to life.<br><br>
                        1. Submit your request through the "Design Your Own" feature.<br>
                        2. Discuss details (design, size, finish, price) with the artisan.<br>
                        3. Confirm your order once everything is agreed upon.<br>
                        4. The artisan begins crafting your piece.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="customization">
                <button class="faq-question searchable-item">How does the customization process work?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        1. Submit your request through the "Design Your Own" feature<br>
                        2. Discuss details (design, size, finish, price) with the artisan<br>
                        3. Confirm your order once everything is agreed upon<br>
                        4. The artisan begins crafting your piece
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="customization">
                <button class="faq-question searchable-item">Can I return a custom-made item?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Because custom and made-to-order items are crafted specifically for you, they are generally not eligible for return.<br><br>
                        However, if your item arrives damaged or significantly different from the agreed design, you can contact us for support.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="returns">
                <button class="faq-question searchable-item">What is the return policy for regular items?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Return policies vary by seller, but most items are eligible for return as long as they are unused, in their original condition, and returned within the seller's specified timeframe.<br><br>
                        For the exact return conditions on any item, check the product page before purchasing.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="returns">
                <button class="faq-question searchable-item">What should I do if there's a problem with my order?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        If your item arrives damaged, incorrect, or not as described, don't worry — we've got you covered.<br><br>
                        Reach out to us or the seller as soon as possible through our support page, and we'll work with you to find the right solution quickly.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="orders">
                <button class="faq-question searchable-item">Do I need to pay additional fees?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Depending on your country, your order may be subject to customs duties, taxes, or import fees upon arrival.<br><br>
                        These charges are set by your local authorities and are the responsibility of the buyer. We recommend checking with your local customs office before placing an order if you're unsure what may apply.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="quality">
                <button class="faq-question searchable-item">Who are the sellers on Tinza?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Tinza brings together a curated network of skilled artisans and workshops, each carefully selected for their expertise in copper and brass craftsmanship.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="quality">
                <button class="faq-question searchable-item">How does Tinza ensure product quality?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        We carefully select sellers based on:<br>
                        - Craftsmanship quality: because the skill behind each piece matters.<br>
                        - Authenticity of their work: we only collaborate with artisans whose work is genuinely their own.<br>
                        - Alignment with Tinza's vision and values.<br><br>
                        Through this rigorous selection process, we ensure every item received by our customers reflects quality, authenticity, and workmanship.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="quality">
                <button class="faq-question searchable-item">What is your warranty policy?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Because Tinza works with independent artisans, warranty terms may vary slightly by seller. What remains constant is our commitment — every product is held to the same high standards of quality and craftsmanship.<br><br>
                        If something isn't right with your item, we'll work with you to find a fair solution.<br><br>
                        Most products are covered against manufacturing defects and damage incurred during delivery. For specific warranty details, check the product page or reach out to the seller directly before placing your order.
                    </p>
                </div>
            </div>
 
            <div class="faq-item" data-category="quality">
                <button class="faq-question searchable-item">What is covered under the warranty?</button>
                <div class="faq-answer searchable-item">
                    <p>
                        Warranty coverage varies by seller, but here's what is generally included and excluded:<br><br>
                        What's covered:<br>
                        - Manufacturing defects<br>
                        - Structural issues affecting the functionality of the piece<br>
                        - Damage that occurred during shipping<br><br>
                        What's not covered:<br>
                        - Normal wear and tear<br>
                        - Natural patina or aging of copper and brass<br>
                        - Damage caused by improper use or cleaning
                    </p>
                </div>
            </div>
 
        </div>
    </section>
 
    <section class="support-section">
        <h2>Can't find what you're looking for?</h2>
        <p>Try rephrasing your search, or reach out and a real person will help you out.</p>
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn-support">Get in touch</a>
    </section>
 
</body>
 
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const faqItems = document.querySelectorAll('.faq-item');
        const heroTags = document.querySelectorAll('.hero-tag');
        const searchWrapper = document.querySelector('.search-wrapper');
        const searchInput = document.getElementById('myInput');
        const searchCount = document.getElementById('searchCount');

        /* --- FAQ Accordion Functionality --- */
        faqItems.forEach(item => {
            const questionBtn = item.querySelector('.faq-question');
            
            questionBtn.addEventListener('click', (e) => {
                // Prevent event from bubbling up unexpectedly
                e.stopPropagation(); 
                
                // Close all other open items
                faqItems.forEach(other => {
                    if (other !== item) {
                        other.classList.remove('active');
                    }
                });
                
                // Toggle the active state on the current item
                item.classList.toggle('active');
            });
        });

        /* --- Category Filtering --- */
        heroTags.forEach(tag => {
            tag.addEventListener('click', function (e) {
                e.preventDefault();

                const category = this.dataset.category;
                const isAlreadyActive = this.classList.contains('active');

                /* Remove active style from all tags */
                heroTags.forEach(t => t.classList.remove('active'));

                /* If the clicked tag is already active, reset everything */
                if (isAlreadyActive) {
                    if (searchWrapper) searchWrapper.style.display = 'block';
                    if (searchInput) searchInput.value = '';
                    if (searchCount) searchCount.textContent = '';

                    faqItems.forEach(item => {
                        item.style.display = '';
                        item.classList.remove('hidden', 'active');
                    });
                    return;
                }

                /* Activate clicked tag */
                this.classList.add('active');

                // Clear search
                if (searchInput) searchInput.value = '';
                if (searchCount) searchCount.textContent = '';

                // Show only matching FAQ items
                faqItems.forEach(item => {
                    if (item.dataset.category === category) {
                        item.style.display = '';
                        item.classList.remove('hidden', 'active'); // Reset active state when changing categories
                    } else {
                        item.style.display = 'none';
                        item.classList.remove('active');
                    }
                });
            });
        });
    });

    /* --- Search & Highlight Logic --- */
    const originalContent = {};
    document.querySelectorAll('.faq-item').forEach((item, i) => {
        item.dataset.index = i;
        originalContent[i] = {
            q: item.querySelector('.faq-question').innerHTML,
            a: item.querySelector('.faq-answer').innerHTML
        };
    });

    function highlight(html, term) {
        if (!term) return html;
        const escaped = term.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        const regex = new RegExp(`(${escaped})`, 'gi');
        return html.replace(/>([^<]*)</g, (match, text) => {
            return '>' + text.replace(regex, '<mark class="search-highlight">$1</mark>') + '<';
        });
    }

    function clearSearch() {
        document.getElementById('myInput').value = '';
        searchFunction();
        document.getElementById('myInput').focus();
    }

    let searchTimeout;

    function searchFunction() {
        clearTimeout(searchTimeout);
        const input = document.getElementById('myInput');
        const filter = input.value.trim().toLowerCase();
        const clearBtn = document.getElementById('searchClear');
        const countEl = document.getElementById('searchCount');
        const faqItems = document.querySelectorAll('.faq-item');
        const container = document.querySelector('.faq-container');
        const commonInquiries = document.querySelector('.common-inquiries');

        if (clearBtn) clearBtn.classList.toggle('visible', filter.length > 0);

        faqItems.forEach(item => {
            const i = item.dataset.index;
            item.querySelector('.faq-question').innerHTML = originalContent[i].q;
            item.querySelector('.faq-answer').innerHTML = originalContent[i].a;
        });

        if (!filter) {
            faqItems.forEach(item => item.classList.remove('hidden', 'fading-out'));
            if (countEl) countEl.textContent = '';
            const msg = document.getElementById('no-results-message');
            if (msg) msg.remove();
            if (commonInquiries) {
                commonInquiries.style.opacity = '1';
                commonInquiries.style.maxHeight = '200px';
                commonInquiries.style.pointerEvents = 'auto';
            }
            return;
        }

        if (commonInquiries) {
            commonInquiries.style.transition = 'opacity 0.3s ease, max-height 0.4s ease';
            commonInquiries.style.overflow = 'hidden';
            commonInquiries.style.opacity = '0';
            commonInquiries.style.maxHeight = '0';
            commonInquiries.style.pointerEvents = 'none';
        }

        searchTimeout = setTimeout(() => {
            let found = 0;

            faqItems.forEach(item => {
                const i = item.dataset.index;
                const qText = item.querySelector('.faq-question').textContent.toLowerCase();
                const aText = item.querySelector('.faq-answer').textContent.toLowerCase();

                if (qText.includes(filter) || aText.includes(filter)) {
                    item.classList.remove('hidden', 'fading-out');
                    item.querySelector('.faq-question').innerHTML = highlight(originalContent[i].q, input.value.trim());
                    item.querySelector('.faq-answer').innerHTML = highlight(originalContent[i].a, input.value.trim());
                    found++;
                } else {
                    item.classList.add('hidden');
                    item.classList.remove('active'); // Close hidden items while searching
                }
            });

            if (countEl) {
                countEl.textContent = found > 0 ? `${found} result${found !== 1 ? 's' : ''} found` : '';
            }

            let noMsg = document.getElementById('no-results-message');
            if (found === 0) {
                if (!noMsg && container) {
                    noMsg = document.createElement('div');
                    noMsg.id = 'no-results-message';
                    noMsg.innerHTML = `<p>No results for "<strong>${input.value.trim()}</strong>"</p><button onclick="clearSearch()">Clear search</button>`;
                    container.appendChild(noMsg);
                }
            } else if (noMsg) {
                noMsg.remove();
            }
        }, 120);
    }
</script>

<?php get_footer(); ?>

