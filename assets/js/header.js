/**
 * Tinza Child Theme — header.js
 */
(function () {
    'use strict';

    var DEBOUNCE_MS = 250;
    var MIN_CHARS   = 1;

    function debounce(fn, ms) {
        var t;
        return function () { var a = arguments; clearTimeout(t); t = setTimeout(function () { fn.apply(null, a); }, ms); };
    }
    function esc(s) {
        return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }
    function hideResults(el) { el.setAttribute('hidden',''); el.innerHTML = ''; }
    function showResults(el) { el.removeAttribute('hidden'); }

   
    /* ══════════════════════════════════════════════════════
       1. MEGA-MENU
    ══════════════════════════════════════════════════════ */
    function initCategories() {
        var btn  = document.getElementById('categories-btn');
        var menu = document.getElementById('mega-menu');
        if (!btn || !menu) return;
        btn.addEventListener('click', function () {
            var open = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', String(!open));
            open ? menu.setAttribute('hidden','') : menu.removeAttribute('hidden');
        });
        document.addEventListener('click', function (e) {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                btn.setAttribute('aria-expanded','false');
                menu.setAttribute('hidden','');
            }
        });
    }
    

    /* ══════════════════════════════════════════════════════
       2. MOBILE NAV
    ══════════════════════════════════════════════════════ */
    function initMobileNav() {
        var hamburger = document.getElementById('mobile-menu-toggle');
        var nav       = document.getElementById('mobile-nav');
        var overlay   = document.getElementById('mobile-nav-overlay');
        var closeBtn  = document.getElementById('mobile-nav-close');
        if (!hamburger || !nav) return;

        function openNav() {
            nav.removeAttribute('hidden');
            requestAnimationFrame(function () { nav.classList.add('mobile-nav--open'); });
            nav.setAttribute('aria-hidden','false');
            hamburger.setAttribute('aria-expanded','true');
            if (overlay) overlay.classList.add('mobile-nav__overlay--visible');
            document.body.style.overflow = 'hidden';
        }
        function closeNav() {
            nav.classList.remove('mobile-nav--open');
            nav.setAttribute('aria-hidden','true');
            hamburger.setAttribute('aria-expanded','false');
            if (overlay) overlay.classList.remove('mobile-nav__overlay--visible');
            document.body.style.overflow = '';
            setTimeout(function () { nav.setAttribute('hidden',''); }, 300);
        }
        hamburger.addEventListener('click', openNav);
        if (closeBtn) closeBtn.addEventListener('click', closeNav);
        if (overlay)  overlay.addEventListener('click', closeNav);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && nav.classList.contains('mobile-nav--open')) closeNav();
        });
    }


    /* ══════════════════════════════════════════════════════
       3. MOBILE SEARCH OVERLAY
    ══════════════════════════════════════════════════════ */
    function initMobileSearchOverlay() {
        var openBtn  = document.getElementById('mobile-search-toggle');
        var overlay  = document.getElementById('mobile-search-overlay');
        var closeBtn = document.getElementById('mobile-search-close');
        var clearBtn = document.getElementById('mobile-search-clear');
        var input    = document.getElementById('mobile-search-input');
        if (!openBtn || !overlay) return;

        function syncClear() {
            if (!clearBtn || !input) return;
            var has = input.value.length > 0;
            clearBtn.style.display = has ? 'flex' : 'none';
            has ? clearBtn.removeAttribute('hidden') : clearBtn.setAttribute('hidden','');
        }
        function openOverlay() {
            overlay.removeAttribute('hidden');
            openBtn.setAttribute('aria-expanded','true');
            if (input) setTimeout(function () { input.focus(); }, 50);
        }
        function closeOverlay() {
            overlay.setAttribute('hidden','');
            openBtn.setAttribute('aria-expanded','false');
            if (input) input.value = '';
            syncClear();
            var res = document.getElementById('mobile-search-results');
            if (res) hideResults(res);
        }
        function clearInput() {
            if (!input) return;
            input.value = '';
            input.focus();
            syncClear();
            var res = document.getElementById('mobile-search-results');
            if (res) hideResults(res);
        }
        openBtn.addEventListener('click', openOverlay);
        if (closeBtn) closeBtn.addEventListener('click', closeOverlay);
        if (clearBtn) clearBtn.addEventListener('click', clearInput);
        if (input) input.addEventListener('input', syncClear);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !overlay.hasAttribute('hidden')) closeOverlay();
        });
    }


    /* ══════════════════════════════════════════════════════
       4. LIVE SEARCH
    ══════════════════════════════════════════════════════ */
    function renderResults(items, kw, container) {
        container.innerHTML = '';
        showResults(container);
        if (!items || items.length === 0) {
            container.innerHTML = '<p class="search-result-empty">No results for "' + esc(kw) + '"</p>';
            return;
        }
        items.forEach(function (p) {
            var a = document.createElement('a');
            a.className = 'search-result-item';
            a.href = p.url || '#';
            a.setAttribute('role','option');
             /* Image — affichée si disponible */
            var imgHtml = p.image
            ? '<img class="search-result-item__img" src="' + p.image + '" alt="' + esc( p.name ) + '" loading="lazy" width="44" height="44">'
            : '';
            a.innerHTML =
                imgHtml +
                '<div class="search-result-item__info">' +
                    '<span class="search-result-item__name">'  + esc(p.name  || '') + '</span>' +
                    '<span class="search-result-item__price">' + (p.price || '') + '</span>' +
                '</div>';
            container.appendChild(a);
        });
        var all = document.createElement('a');
        all.className   = 'search-result-item search-result-item--all';
        all.href        = '/?s=' + encodeURIComponent(kw) + '&post_type=product';
        all.textContent = 'View all results for "' + kw + '"';
        container.appendChild(all);
    }

    function doSearch(kw, container) {
        if (kw.length < MIN_CHARS) { hideResults(container); return; }
        var url = ((window.tinzaData && window.tinzaData.ajaxUrl) || '/wp-admin/admin-ajax.php')
            + '?action=tinza_live_search&s=' + encodeURIComponent(kw);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                try { renderResults(JSON.parse(xhr.responseText).results || [], kw, container); }
                catch (e) { hideResults(container); }
            } else { hideResults(container); }
        };
        xhr.onerror = function () { hideResults(container); };
        xhr.send();
    }

    function initLiveSearch(inputId, resultsId, btnId) {
        var input   = document.getElementById(inputId);
        var results = document.getElementById(resultsId);
        if (!input || !results) return;
        var deb = debounce(function () { doSearch(input.value.trim(), results); }, DEBOUNCE_MS);
        input.addEventListener('input', deb);
        input.addEventListener('focus', function () {
            if (input.value.trim().length >= MIN_CHARS) doSearch(input.value.trim(), results);
        });
        input.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && input.value.trim())
                window.location.href = '/?s=' + encodeURIComponent(input.value.trim()) + '&post_type=product';
        });
        document.addEventListener('click', function (e) {
            if (!input.contains(e.target) && !results.contains(e.target)) hideResults(results);
        });
        if (btnId) {
            var btn = document.getElementById(btnId);
            if (btn) btn.addEventListener('click', function () {
                if (input.value.trim())
                    window.location.href = '/?s=' + encodeURIComponent(input.value.trim()) + '&post_type=product';
            });
        }
    }


     /* ══════════════════════════════════════════════════════
       5. MINI-CART DRAWER
    ══════════════════════════════════════════════════════ */
    function initMiniCart() {
        var drawer   = document.getElementById('mini-cart');
        var overlay  = document.getElementById('mini-cart-overlay');
        var closeBtn = document.getElementById('mini-cart-close');
        var msgAdded   = document.getElementById('mini-cart-success');  /* ✓ added */
        var msgRemoved = document.getElementById('mini-cart-removed');  /* ✕ removed */
        if (!drawer) return;
 
        /* Timer pour masquer automatiquement les notifications */
        var noticeTimer = null;
 
        /* ── Affiche une notification 3s ── */
        function showNotice(el) {
            /* Masquer toutes les notices d'abord */
            [msgAdded, msgRemoved].forEach(function (m) {
                if (m) m.setAttribute('hidden','');
            });
            clearTimeout(noticeTimer);
 
            if (!el) return;
            el.removeAttribute('hidden');
            noticeTimer = setTimeout(function () {
                el.setAttribute('hidden','');
            }, 3000);
        }
 
        function openCart() {
            drawer.classList.add('mini-cart--open');
            drawer.setAttribute('aria-hidden','false');
            if (overlay) overlay.classList.add('mini-cart__overlay--visible');
            document.body.style.overflow = 'hidden';
        }
 
        function closeCart() {
            drawer.classList.remove('mini-cart--open');
            drawer.setAttribute('aria-hidden','true');
            if (overlay) overlay.classList.remove('mini-cart__overlay--visible');
            document.body.style.overflow = '';
            /* Masquer les notices à la fermeture */
            clearTimeout(noticeTimer);
            [msgAdded, msgRemoved].forEach(function (m) {
                if (m) m.setAttribute('hidden','');
            });
        }
 
        document.addEventListener('click', function (e) {
            var cartLink = e.target.closest
                ? e.target.closest('#cart-open-btn')
                : (function () {
                    var el = e.target;
                    while (el && el !== document) {
                        if (el.id === 'cart-open-btn') return el;
                        el = el.parentElement;
                    }
                    return null;
                }());
 
            if (!cartLink) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            openCart();
        }, true);
 
        if (closeBtn) closeBtn.addEventListener('click', closeCart);
        if (overlay)  overlay.addEventListener('click', closeCart);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawer.classList.contains('mini-cart--open')) closeCart();
        });
 
        /* ── jQuery WooCommerce events ── */
        if (typeof jQuery !== 'undefined') {
 
            jQuery(document.body).on('added_to_cart', function () {
                openCart();
                showNotice(msgAdded);
            });
 
            jQuery(document.body).on('removed_from_cart', function () {
                if (!drawer.classList.contains('mini-cart--open')) {
                    openCart();
                }
                showNotice(msgRemoved);
            });
        }
    }
 
 
    /* ══════════════════════════════════════════════════════
       6. SCROLL SHADOW
    ══════════════════════════════════════════════════════ */
    function initScroll() {
        var h = document.getElementById('site-header');
        if (!h) return;
        window.addEventListener('scroll', function () {
            h.classList.toggle('site-header--scrolled', window.scrollY > 10);
        }, { passive: true });
    }
 
 
    /* ══════════════════════════════════════════════════════
       7. WISHLIST COUNTER
    ══════════════════════════════════════════════════════ */
    function initWishlistCounter() {
        var el = document.getElementById( 'wishlist-counter' );
        if ( ! el ) return;

        var count;
        try {
            var ls = JSON.parse( localStorage.getItem( 'tinza_wishlist' ) || '{}' );
            count = Object.keys( ls ).length;
        } catch ( e ) { count = 0; }

        render( count );

        function render( n ) {
            count = Math.max( 0, n );
            el.textContent = count;
            el.setAttribute( 'data-count', count );
            el.classList.toggle( 'header__wishlist-count--empty', count === 0 );
        }

        /* Relatif — feedback immédiat add/remove */
        window.tinzaSetWishlistCount = function ( delta ) {
            render( count + delta );
        };

        /* Absolu — correction après sync serveur */
        window.tinzaSetWishlistCountAbsolute = function ( n ) {
            render( n );
        };

        /* Multi-onglets */
        window.addEventListener( 'storage', function ( e ) {
            if ( e.key !== 'tinza_wishlist' ) return;
            try {
                render( Object.keys( JSON.parse( e.newValue || '{}' ) ).length );
            } catch ( err ) {}
        } );
    }


    /* BOOT */
    function boot() {
        initCategories();
        initMobileNav();
        initMobileSearchOverlay();
        initLiveSearch('header-search-input', 'header-search-results', 'header-search-btn');
        initLiveSearch('mobile-search-input',  'mobile-search-results', 'mobile-search-submit');
        initMiniCart();
        initScroll();
        initWishlistCounter();
    }
 
    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', boot)
        : boot();
 
}());
























