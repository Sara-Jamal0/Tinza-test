<?php

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'tinza_page_url' ) ) {
    function tinza_page_url( $slug, $fallback = '#' ) {
        
        $page = get_page_by_path( $slug, OBJECT, 'page' );
        if ( $page ) {
            return get_permalink( $page->ID );
        }
        return $fallback; 
    }
}
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


        <!-- ══ Column 1 — Get to Know Us ══ -->
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
            <?php wp_nav_menu( [
                'theme_location' => 'footer-col-1',
                'container'      => false,
                'menu_class'     => 'site-footer__menu',
                'fallback_cb'    => function () { ?>
                    <ul class="site-footer__menu">
                        <li><a href="<?php echo esc_url( tinza_page_url( 'about' ) ); ?>">
                            About Us</a></li>
                        <li><a href="<?php echo esc_url( tinza_page_url( 'news-and-blog' ) ); ?>">
                            News &amp; Blog</a></li>
                        <li><a href="<?php echo esc_url( tinza_page_url( 'contact' ) ); ?>">
                            Contact Us</a></li>
                    </ul>
                <?php },
            ] ); ?>
        </div>


        <!-- ══ Column 2 — Customer Service ══ -->
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
            <?php wp_nav_menu( [
                'theme_location' => 'footer-col-2',
                'container'      => false,
                'menu_class'     => 'site-footer__menu',
                'fallback_cb'    => function () { ?>
                    <ul class="site-footer__menu">
                        <li><a href="<?php echo esc_url( tinza_page_url( 'help-center' ) ); ?>">
                            Help Center</a></li>
                    </ul>
                <?php },
            ] ); ?>
        </div>


        <!-- ══ Column 3 — Orders & Returns ══ -->
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
            <?php wp_nav_menu( [
                'theme_location' => 'footer-col-3',
                'container'      => false,
                'menu_class'     => 'site-footer__menu',
                'fallback_cb'    => function () { ?>
                    <ul class="site-footer__menu">
                        <li><a href="<?php echo esc_url( tinza_page_url( 'tracking-order' ) ); ?>">
                            Track Order</a></li>
                        <li><a href="<?php echo esc_url( tinza_page_url( 'shipping-and-delivery' ) ); ?>">
                            Shipping &amp; Delivery</a></li>
                        <li><a href="<?php echo esc_url( tinza_page_url( 'return-and-exchange' ) ); ?>">
                            Return &amp; Exchange</a></li>
                    </ul>
                <?php },
            ] ); ?>
        </div>


        <!-- ══ Column 4 — Legal ══ -->
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
            <?php wp_nav_menu( [
                'theme_location' => 'footer-legal',
                'container'      => false,
                'menu_class'     => 'site-footer__menu',
                'fallback_cb'    => function () { ?>
                    <ul class="site-footer__menu">
                        <li><a href="<?php echo esc_url( tinza_page_url( 'privacy-policy' ) ); ?>">
                            Privacy Policy</a></li>
                        <li><a href="<?php echo esc_url( tinza_page_url( 'terms-of-use' ) ); ?>">
                            Terms of Use</a></li>
                        <li><a href="<?php echo esc_url( tinza_page_url( 'legal' ) ); ?>">
                            Legal</a></li>
                        <li><a href="<?php echo esc_url( tinza_page_url( 'site-map' ) ); ?>">
                            Site Map</a></li>
                    </ul>
                <?php },
            ] ); ?>
        </div>


        <!-- ══ Column 5 — Follow Us + Payment icons ══ -->
        <div class="site-footer__col site-footer__brand">

            <h3 class="site-footer__col-title">Follow Us</h3>

            <div class="site-footer__socials">

                <a href="https://www.facebook.com/profile.php?id=61592450377317"
                  class="site-footer__social-link"
                   aria-label="Facebook"
                   target="_blank"
                   rel="noopener noreferrer">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <rect width="24" height="24" rx="6" fill="#1877F2"/>
                        <path d="M13.2 20V13.2h2.3l0.35-2.65H13.2V8.9c0-.77.21-1.29 1.32-1.29H16V5.26C15.72 5.22 14.8 5.14 13.72 5.14c-2.06 0-3.47 1.26-3.47 3.57v1.98H8v2.65h2.25V20z" fill="#FFFFFF"/>
                    </svg>
                </a>

                <a href="https://www.instagram.com/tinzaofficial/"
                   class="site-footer__social-link"
                   aria-label="Instagram"
                   target="_blank"
                   rel="noopener noreferrer">
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

                <a href="https://x.com/tinzaofficial"
                   class="site-footer__social-link"
                   aria-label="X (Twitter)"
                   target="_blank"
                   rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <rect width="24" height="24" rx="6" fill="#000000"/>
                    <g transform="translate(3.5,3.5) scale(1.05)">
                    <path fill="#FFFFFF" d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                    </g>
                    </svg>
                </a>

                <a href="https://www.pinterest.com/tinzaofficial"
                   class="site-footer__social-link"
                   aria-label="Pinterest"
                   target="_blank"
                   rel="noopener noreferrer">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <rect width="24" height="24" rx="6" fill="#E60023"/>
                        <g transform="translate(6.05 4.35) scale(0.0325)">
                            <path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z" fill="#FFFFFF"/>
                        </g>
                    </svg>
                </a>

            </div><!-- .site-footer__socials -->

            <span class="site-footer__spacer"></span>
            <span class="site-footer__spacer"></span>

            <!-- Icônes paiement — SVG inline, pas de domaine externe -->
            <div class="site-footer__payments">
                <span class="site-footer__payment-icon" aria-label="Visa">
                    <svg viewBox="0 0 38 24" width="35" height="24"><rect width="38" height="24" rx="4" fill="#FFFFFF" stroke="#D9D9D9" stroke-width="1"/><text x="19" y="16" text-anchor="middle" font-family="Arial,sans-serif" font-size="9" font-weight="700" fill="#172B85">VISA</text></svg>
                </span>
                <span class="site-footer__payment-icon" aria-label="Mastercard">
                    <svg viewBox="0 0 38 24" width="35" height="24"><rect width="38" height="24" rx="4" fill="#FFFFFF" stroke="#D9D9D9" stroke-width="1"/><circle cx="14" cy="12" r="6" fill="#EB001B"/><circle cx="24" cy="12" r="6" fill="#F79E1B"/><path d="M19 7.3a6 6 0 010 9.4A6 6 0 0119 7.3z" fill="#FF5F00"/></svg>
                </span>
                <span class="site-footer__payment-icon" aria-label="UnionPay">
                     <svg viewBox="0 0 38 24" width="35" height="24"><rect width="38" height="24" rx="4" fill="#FFFFFF" stroke="#D9D9D9" stroke-width="1"/><svg x="1.5" y="2" width="35" height="20" viewBox="1 9 46 30"><path fill="#e21836" d="M10.09,9h11.585c1.617,0,2.623,1.362,2.246,3.039l-5.394,23.927c-0.381,1.671-2,3.034-3.618,3.034H3.325C1.956,38.999,1.023,38.02,1,36.704c-0.004-0.237,0.021-0.484,0.079-0.739l5.396-23.927C6.852,10.362,8.471,9,10.09,9"/><path fill="#00447c" d="M20.5,9h13.47c1.657,0,0.91,1.362,0.52,3.039l-5.527,23.928C28.575,37.637,28.696,39,27.035,39H13.38c-1.39,0-2.336-0.955-2.379-2.246c-0.008-0.251,0.018-0.516,0.081-0.788l5.711-23.928C17.187,10.362,18.657,9,20.316,9"/><path fill="#007b84" d="M33.273,9h11.401c1.183,0,2.039,0.727,2.266,1.773c0.044,0.204,0.064,0.42,0.059,0.645c-0.005,0.2-0.031,0.408-0.079,0.62l-5.393,23.928C41.146,37.637,39.525,39,37.906,39h-11.58c-1.355,0-2.279-0.953-2.324-2.241c-0.009-0.253,0.016-0.518,0.078-0.792l5.578-23.928C30.036,10.362,31.653,9,33.273,9z"/><path fill="#fefefe" d="M19.364 18.117c-.325-.195-.905-.134-1.302.135-.396.263-.45.636-.126.833.319.189.902.134 1.296-.137C19.626 18.68 19.685 18.31 19.364 18.117zM42.308 19.376l-1.171 2.048L40.874 19l-1.24.294.454 3.963-1.415 2.293c-.038.054-.072.091-.119.107-.052.025-.118.03-.21.03h-.04L38 26.624l.75.001c.53-.002.904-.288 1.092-.625L44 19 42.308 19.376zM22.157 25l-.404.701C21.666 25.854 21.518 26 21.19 26h-.201l-.282.875h.668c.787 0 1.158-.431 1.158-.431h2.086l.301-.933h-1.752l.28-.51L22.157 25zM10.416 19.885c-.194.75-.341 1.24-.679 1.585-.233.238-.593.351-.923.35-.493 0-.91-.311-.883-.823.002-.038.007-.078.014-.119C8.187 19.531 9.242 16 9.242 16H7.275l-1.02 4.03c0 0-.25.968-.255 1.379-.004.313.047.569.164.785C6.54 22.879 7.652 23 8.288 23c1.088 0 1.731-.104 2.257-.424.839-.51 1.082-1.2 1.341-2.175C12.178 19.305 13 16 13 16h-1.595C11.405 16 10.417 19.883 10.416 19.885zM13.701 23l.705-2.869C14.559 20.065 14.709 20 14.851 20c.338 0 .414.281.397.393C15.234 20.529 14.658 23 14.658 23h1.404l.491-2.068c.204-.764.307-1.152.177-1.468C16.594 19.111 16.246 19 15.924 19c-.21 0-.596.073-.946.234-.127.061-.247.132-.374.202l.103-.438-1.493.234L12.25 23H13.701zM25.576 23l.705-2.869C26.434 20.065 26.584 20 26.726 20c.338 0 .414.281.397.393C27.109 20.529 26.533 23 26.533 23h1.404l.491-2.068c.204-.764.307-1.152.177-1.468C28.469 19.111 28.121 19 27.799 19c-.21 0-.596.073-.946.234-.127.061-.247.132-.374.202l.103-.438-1.493.234L24.125 23H25.576zM17 23L18.451 23 19.201 20 17.715 20.22zM35.424 16.62c-.414-.603-1.269-.615-2.257-.62-.001 0-.727 0-.727 0h-1.614L29 23h1.579l.665-2.5h.294c1.007 0 1.972-.014 2.809-.618.585-.426 1.033-.992 1.228-1.757.05-.187.09-.41.096-.633C35.678 17.199 35.588 16.847 35.424 16.62zM33.742 18.19c-.115.467-.428.86-.822 1.049-.324.16-.721.137-1.125.136h-.252L32.175 17c.142 0 .38 0 .62 0 .75 0 .988.477.986.875C33.781 17.978 33.768 18.084 33.742 18.19z"/><path fill="#fefefe" d="M28.824 25c-1.502 0-1.795.67-1.795.67L27.235 25h-1.21l-1.979 6.083c-.021.07-.048.18-.046.299C24.006 31.664 24.174 32 24.964 32l.718-.001L26.002 31c0 0-.36 0-.485 0-.157 0-.125-.13-.125-.13l.709-2.152h1.778c1.47 0 1.743-.9 1.875-1.31L30.538 25C30.538 25 29.369 25 28.824 25zM28.298 28h-2.001l.206-.604h2.005L28.298 28zM28.822 26.518c0 0-1.012-.01-1.175.02-.717.124-1.018.508-1.018.508L26.967 26h2.023L28.822 26.518zM37.507 19.234c0 0-.01.04-.028.111C37.325 19.179 37.07 19 36.668 19c-.5 0-.937.179-1.45.617-.451.39-.677.926-.811 1.439-.052.19-.083.491-.083.694 0 1.25 1.082 1.25 1.345 1.25.395 0 .71-.151.965-.347C36.602 22.776 36.543 23 36.543 23h1.451L39 19 37.507 19.234zM36.098 22.116c-.063 0-.438 0-.429-.411.004-.203.052-.43.125-.691.17-.608.399-1.139 1-1.139.47 0 .461.377.26 1.133-.058.217-.221.609-.348.8C36.521 22.086 36.31 22.116 36.098 22.116zM23.768 19.493C23.471 19.12 22.93 19.001 22.366 19c-.339 0-1.149.031-1.796.579-.465.396-.69.934-.831 1.449-.142.525-.316 1.471.596 1.824C20.616 22.968 21.025 23 21.29 23c.675.001 1.372-.174 1.908-.695.413-.422.614-1.051.685-1.31C24.114 20.138 23.964 19.737 23.768 19.493zM21.429 22.115c-.063 0-.438 0-.429-.411.004-.203.06-.471.125-.691.169-.572.4-1.139 1-1.139.47 0 .461.377.26 1.133-.058.217-.221.609-.348.8C21.852 22.086 21.641 22.116 21.429 22.115zM20.847 27.115L20.556 28h.846l-.248.769h-.848L20 29.706h.845l-.536 1.639c-.072.217-.075.654.738.654h1.627L23 31c0 0-.931 0-1.181 0s-.183-.177-.183-.177l.368-1.132h1.746l.302-.921h-1.747L22.56 28h1.713l.297-.885H20.847zM39.7 27.916L40 27h-4.037l-.294.916h1.211l-.247.743h-1.232l-.263.812h1.082l-.963 1.265C35.18 30.847 35.017 31 34.749 31h-.486l.095-.289H33.94L35.479 26h.547l.172-.518c0 0 0 .381 0 .517 0 .434.125.626.821.626h.478L37.8 25.69h-.223c-.147.003-.217-.044-.205-.138V25c0 0-.799 0-1.25 0-1.175 0-1.903.055-2.193.132-.351.09-.807.357-.807.357L33.279 25H31.98l-1.862 5.722h-.28L29.52 31.69h2.874L32.293 32h1.229l.1-.31h.402L33.919 32h1.02c.259 0 .468-.058.642-.155.182-.101.325-.244.447-.407l.756-1.006.115 1.055C36.928 31.679 37.002 32 37.791 32h.568l.329-1h-.371c-.265 0-.322-.195-.337-.297l-.132-1.024h-.615l.25-.208h1.703l.268-.812h-1.585l.251-.743C38.12 27.916 39.7 27.916 39.7 27.916zM32.964 26h1.303l-.278.853c0 0-.462.028-.693.08-.393.09-.72.248-.72.248L32.964 26zM32.729 30.722h-1.306l.347-1.064h1.303L32.729 30.722zM33.408 28.622c0 0-.346.043-.574.095C32.435 28.832 31.979 29 31.979 29l.4-1.218h1.308L33.408 28.622z"/></svg></svg>
                </span>
                <span class="site-footer__payment-icon" aria-label="JCB">
                    <svg viewBox="0 0 38 24" width="35" height="24"><rect width="38" height="24" rx="4" fill="#FFFFFF" stroke="#D9D9D9" stroke-width="1"/><rect x="5" y="4" width="9" height="16" rx="3" fill="#0E4C96"/><rect x="15" y="4" width="9" height="16" rx="3" fill="#E31837"/><rect x="25" y="4" width="9" height="16" rx="3" fill="#007B40"/><text x="8" y="15.5" font-family="Arial,sans-serif" font-size="6" font-weight="700" fill="#fff">J</text><text x="18" y="15.5" font-family="Arial,sans-serif" font-size="6" font-weight="700" fill="#fff">C</text><text x="28" y="15.5" font-family="Arial,sans-serif" font-size="6" font-weight="700" fill="#fff">B</text></svg>
                </span>
                <span class="site-footer__payment-icon" aria-label="American Express">
                    <svg viewBox="0 0 38 24" width="35" height="24"><rect width="38" height="24" rx="4" fill="#1F72CD"/><text x="19" y="15" text-anchor="middle" font-family="Arial,sans-serif" font-size="6.5" font-weight="700" fill="#FFFFFF" letter-spacing="0.5">AMEX</text></svg>
                </span>
            </div><!-- .site-footer__payments -->

        </div><!-- .site-footer__brand -->

    </div><!-- .site-footer__top -->


    <div class="site-footer__bottom">
        <p class="site-footer__copy">
            <!-- date('Y') retourne l'année courante automatiquement
                 get_bloginfo('name') retourne le nom du site depuis WP Settings
                 → pas de nom hardcodé, fonctionne sur tous les environnements -->
            Copyright &copy; <?php echo esc_html( date( 'Y' ) ); ?>
            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>.
            All rights reserved.
        </p>
    </div>

</footer><!-- .site-footer -->

</div><!-- #page -->

<?php wp_footer();  ?>
</body>
</html>