<?php
/**
 * Footer
 * File : motta-child/template-parts/footer.php
 * CSS  : motta-child/assets/css/footer.css
 * JS   : motta-child/assets/js/footer.js
 *
 * Desktop : layout inchangé (5 colonnes)
 * Mobile  : accordéon toggleClass('open') — même logique que FAQ
 */
?>
</div><!-- #main -->

    <?php
    if ( ! is_front_page() ) {
        do_action( 'motta_before_site_content_close' );
    }
    ?>
</div><!-- #site-content -->

<footer class="site-footer" role="contentinfo">

    <div class="site-footer__top">

        <!-- Column 1 — Get to Know Us -->
        <div class="site-footer__col">
            <button class="site-footer__col-btn" type="button">
                <h3 class="site-footer__col-title">Get to Know Us</h3>
                <span class="site-footer__chevron" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M6 9L12 15L18 9" stroke="#161A17" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </button>
            <?php wp_nav_menu([
                'theme_location' => 'footer-col-1',
                'container'      => false,
                'menu_class'     => 'site-footer__menu',
                'fallback_cb'    => function() {
                    echo '<ul class="site-footer__menu">
                        <li><a href="https://mpdev.local/about-us-v1">About Us</a></li>
                        <li><a href="#">News &amp; Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>';
                },
            ]); ?>
        </div>

        <!-- Column 2 — Customer Service -->
        <div class="site-footer__col">
            <button class="site-footer__col-btn" type="button">
                <h3 class="site-footer__col-title">Customer Service</h3>
                <span class="site-footer__chevron" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M6 9L12 15L18 9" stroke="#161A17" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </button>
            <?php wp_nav_menu([
                'theme_location' => 'footer-col-2',
                'container'      => false,
                'menu_class'     => 'site-footer__menu',
                'fallback_cb'    => function() {
                    echo '<ul class="site-footer__menu">
                        <li><a href="https://mpdev.local/help-center-2">Help Center</a></li>
                        <li><a href="#">Feedback</a></li>
                        <li><a href="#">Payment Method</a></li>
                    </ul>';
                },
            ]); ?>
        </div>

        <!-- Column 3 — Orders & Returns -->
        <div class="site-footer__col">
            <button class="site-footer__col-btn" type="button">
                <h3 class="site-footer__col-title">Orders &amp; Returns</h3>
                <span class="site-footer__chevron" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M6 9L12 15L18 9" stroke="#161A17" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </button>
            <?php wp_nav_menu([
                'theme_location' => 'footer-col-3',
                'container'      => false,
                'menu_class'     => 'site-footer__menu',
                'fallback_cb'    => function() {
                    echo '<ul class="site-footer__menu">
                        <li><a href="#">Track Order</a></li>
                        <li><a href="#">Shipping &amp; Delivery</a></li>
                        <li><a href="#">Return &amp; Exchange</a></li>
                    </ul>';
                },
            ]); ?>
        </div>

        <!-- Column 4 — Legal -->
        <div class="site-footer__col">
            <button class="site-footer__col-btn" type="button">
                <h3 class="site-footer__col-title">Legal</h3>
                <span class="site-footer__chevron" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M6 9L12 15L18 9" stroke="#161A17" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </button>
            <?php wp_nav_menu([
                'theme_location' => 'footer-legal',
                'container'      => false,
                'menu_class'     => 'site-footer__menu',
                'fallback_cb'    => function() {
                    echo '<ul class="site-footer__menu">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Legal</a></li>
                        <li><a href="#">Site Map</a></li>
                    </ul>';
                },
            ]); ?>
        </div>

        <!-- Column 5 — Follow Us + Payment icons -->
        <div class="site-footer__col site-footer__brand">

            <h3 class="site-footer__col-title">Follow Us</h3>

            <div class="site-footer__socials">

                <a href="https://www.facebook.com/p/Zayian-designs-100092354498343/" class="site-footer__social-link" aria-label="Facebook">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <rect width="24" height="24" rx="6" fill="#1877F2"/>
                        <path d="M16.5 12H14v-1.5c0-.6.3-.9.9-.9H16.5V7.5H14.5C12.6 7.5 11.5 8.6 11.5 10.5V12H9.5v2.5h2V20h2.5v-5.5h2L16.5 12z" fill="#FFFFFF"/>
                    </svg>
                </a>

                <a href="https://www.instagram.com/zayiandesigns/" class="site-footer__social-link" aria-label="Instagram">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <defs>
                            <radialGradient id="ig-bg" cx="35%" cy="100%" r="130%">
                                <stop offset="0%"   stop-color="#FFDD55"/>
                                <stop offset="25%"  stop-color="#FF543E"/>
                                <stop offset="60%"  stop-color="#C837AB"/>
                                <stop offset="100%" stop-color="#3051F1"/>
                            </radialGradient>
                        </defs>
                        <rect width="24" height="24" rx="6" fill="url(#ig-bg)"/>
                        <rect x="6.5" y="6.5" width="11" height="11" rx="3.5" stroke="#fff" stroke-width="1.5" fill="none"/>
                        <circle cx="12" cy="12" r="2.8" stroke="#fff" stroke-width="1.5" fill="none"/>
                        <circle cx="16.2" cy="7.8" r="0.8" fill="#fff"/>
                    </svg>
                </a>

                <a href="https://x.com/ZayianShop" class="site-footer__social-link" aria-label="X">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <rect width="24" height="24" rx="6" fill="#000000"/>
                        <path d="M17.5 4.5h2.5L13.8 11l7.2 8.5H15l-4.5-5.8-5.2 5.8H2.8l6.7-7.4L2.5 4.5H8.1l4 5.3 5.4-5.3zm-.9 12.7h1.4L7.5 5.9H6L16.6 17.2z" fill="#FFFFFF"/>
                    </svg>
                </a>

                <a href="#" class="site-footer__social-link" aria-label="TikTok">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <rect width="24" height="24" rx="6" fill="#010101"/>
                        <path d="M13.5 4.5h2.3c.2 1.3 1 2.4 2.2 2.9v2.2c-1-.3-1.8-.8-2.5-1.5v5.4c0 2.4-1.9 4.3-4.3 4.3S7 16 7 13.5s1.9-4.3 4.2-4.3c.2 0 .4 0 .6.1v2.3c-.2-.1-.4-.1-.6-.1-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2V4.5z" fill="#69C9D0" transform="translate(-0.5 0)"/>
                        <path d="M13.5 4.5h2.3c.2 1.3 1 2.4 2.2 2.9v2.2c-1-.3-1.8-.8-2.5-1.5v5.4c0 2.4-1.9 4.3-4.3 4.3S7 16 7 13.5s1.9-4.3 4.2-4.3c.2 0 .4 0 .6.1v2.3c-.2-.1-.4-.1-.6-.1-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2V4.5z" fill="#EE1D52" transform="translate(0.5 0)"/>
                        <path d="M13.5 4.5h2.3c.2 1.3 1 2.4 2.2 2.9v2.2c-1-.3-1.8-.8-2.5-1.5v5.4c0 2.4-1.9 4.3-4.3 4.3S7 16 7 13.5s1.9-4.3 4.2-4.3c.2 0 .4 0 .6.1v2.3c-.2-.1-.4-.1-.6-.1-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2V4.5z" fill="#FFFFFF"/>
                    </svg>
                </a>

                <a href="https://fr.pinterest.com/yassminayassmina79" class="site-footer__social-link" aria-label="Pinterest">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <rect width="24" height="24" rx="6" fill="#E60023"/>
                        <path d="M12 3C7.03 3 3 7.03 3 12c0 3.74 2.28 6.95 5.54 8.32-.08-.68-.14-1.73.03-2.47l.97-4.1s-.25-.49-.25-1.22c0-1.14.66-2 1.66-2 .78 0 1.16.59 1.16 1.29 0 .79-.5 1.96-.77 3.05-.22.91.46 1.65 1.36 1.65 1.63 0 2.73-2.08 2.73-4.54 0-1.87-1.27-3.25-3.55-3.25-2.59 0-4.21 1.93-4.21 4.1 0 .74.22 1.27.56 1.67.16.19.18.26.12.47l-.2.8c-.06.26-.25.35-.46.25-1.28-.52-1.88-1.94-1.88-3.53 0-3.29 2.77-7.22 8.3-7.22 4.43 0 7.36 3.21 7.36 6.66 0 4.55-2.52 7.94-6.24 7.94-1.25 0-2.43-.67-2.83-1.43l-.79 3.03c-.25.92-.74 1.84-1.18 2.57.89.27 1.83.41 2.8.41 4.97 0 9-4.03 9-9s-4.03-9-9-9z" fill="#FFFFFF"/>
                    </svg>
                </a>

            </div><!-- .site-footer__socials -->

            <span class="site-footer__spacer"></span>
            <span class="site-footer__spacer"></span>

            <div class="site-footer__payments">
                <span class="site-footer__payment-icon" aria-label="Visa">
                    <svg viewBox="0 0 38 24" width="35" height="24"><rect width="38" height="24" rx="4" fill="#FFFFFF" stroke="#D9D9D9" stroke-width="1"/><text x="19" y="16" text-anchor="middle" font-family="Arial,sans-serif" font-size="9" font-weight="700" fill="#172B85">VISA</text></svg>
                </span>
                <span class="site-footer__payment-icon" aria-label="Mastercard">
                    <svg viewBox="0 0 38 24" width="35" height="24"><rect width="38" height="24" rx="4" fill="#FFFFFF" stroke="#D9D9D9" stroke-width="1"/><circle cx="14" cy="12" r="6" fill="#EB001B"/><circle cx="24" cy="12" r="6" fill="#F79E1B"/><path d="M19 7.3a6 6 0 010 9.4A6 6 0 0119 7.3z" fill="#FF5F00"/></svg>
                </span>
                <span class="site-footer__payment-icon" aria-label="UnionPay">
                    <svg viewBox="0 0 38 24" width="35" height="24"><rect width="38" height="24" rx="4" fill="#FFFFFF" stroke="#D9D9D9" stroke-width="1"/><rect x="4" y="4" width="10" height="16" rx="3" fill="#E21836"/><rect x="14" y="4" width="10" height="16" rx="3" fill="#00447C"/><rect x="24" y="4" width="10" height="16" rx="3" fill="#007B84"/><text x="7" y="15.5" font-family="Arial,sans-serif" font-size="5.5" font-weight="700" fill="#fff">U</text><text x="17" y="15.5" font-family="Arial,sans-serif" font-size="5.5" font-weight="700" fill="#fff">P</text><text x="27" y="15.5" font-family="Arial,sans-serif" font-size="5.5" font-weight="700" fill="#fff">C</text></svg>
                </span>
                <span class="site-footer__payment-icon" aria-label="JCB">
                    <svg viewBox="0 0 38 24" width="35" height="24"><rect width="38" height="24" rx="4" fill="#FFFFFF" stroke="#D9D9D9" stroke-width="1"/><rect x="5" y="4" width="9" height="16" rx="3" fill="#0E4C96"/><rect x="15" y="4" width="9" height="16" rx="3" fill="#E31837"/><rect x="25" y="4" width="9" height="16" rx="3" fill="#007B40"/><text x="8" y="15.5" font-family="Arial,sans-serif" font-size="6" font-weight="700" fill="#fff">J</text><text x="18" y="15.5" font-family="Arial,sans-serif" font-size="6" font-weight="700" fill="#fff">C</text><text x="28" y="15.5" font-family="Arial,sans-serif" font-size="6" font-weight="700" fill="#fff">B</text></svg>
                </span>
                <span class="site-footer__payment-icon" aria-label="American Express">
                    <svg viewBox="0 0 38 24" width="35" height="24"><rect width="38" height="24" rx="4" fill="#1F72CD"/><text x="19" y="15" text-anchor="middle" font-family="Arial,sans-serif" font-size="6.5" font-weight="700" fill="#FFFFFF" letter-spacing="0.5">AMEX</text></svg>
                </span>
            </div>

        </div><!-- .site-footer__brand -->

    </div><!-- .site-footer__top -->

    <div class="site-footer__bottom">
        <p class="site-footer__copy">
            Copyright &copy; <?php echo date('Y'); ?> Motta. All rights reserved.
        </p>
    </div>

</footer>
/div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>