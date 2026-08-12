/**
 * Tinza Child Theme — products.js
 * =============================================================================
 * File    : motta-child/assets/js/products.js
 * =============================================================================
 */


/* ═══════════════════════════════════════════════════════════
   1. CAROUSEL MOBILE
   ─────────────────────────────────────────────────────────
   Inchangé — drag + dots sur mobile uniquement.
═══════════════════════════════════════════════════════════ */
( function () {
    'use strict';

    function isMobile() {
        return window.innerWidth <= 768;
    }

    function initCarousel( carousel ) {
        var track = carousel.querySelector( '.tinza-carousel__track' );
        var dotsContainer = carousel.querySelector( '.tinza-carousel__dots' );
        var cards = carousel.querySelectorAll( '.tinza-product-card' );

        if ( ! track || ! dotsContainer || cards.length === 0 ) return;

        dotsContainer.innerHTML = '';

        var totalDots = cards.length;
        var dots = [];

        for ( var i = 0; i < totalDots; i++ ) {
            var dot = document.createElement( 'button' );
            dot.className = 'tinza-carousel__dot' + ( i === 0 ? ' is-active' : '' );
            dot.setAttribute( 'type', 'button' );
            dot.setAttribute( 'role', 'tab' );
            dot.setAttribute( 'aria-label', 'Go to slide ' + ( i + 1 ) );
            dot.setAttribute( 'aria-selected', i === 0 ? 'true' : 'false' );

            ( function ( index ) {
                dot.addEventListener( 'click', function () {
                    var card = cards[ index ];
                    if ( card ) {
                        track.scrollTo( {
                            left:     card.offsetLeft - 24,
                            behavior: 'smooth',
                        } );
                    }
                } );
            } )( i );

            dotsContainer.appendChild( dot );
            dots.push( dot );
        }

        function updateActiveDot() {
            var scrollLeft  = track.scrollLeft;
            var closestIdx  = 0;
            var closestDist = Infinity;

            cards.forEach( function ( card, idx ) {
                var cardLeft = card.offsetLeft - 24;
                var dist = Math.abs( cardLeft - scrollLeft );
                if ( dist < closestDist ) {
                    closestDist = dist;
                    closestIdx  = idx;
                }
            } );

            dots.forEach( function ( dot, idx ) {
                var active = idx === closestIdx;
                dot.classList.toggle( 'is-active', active );
                dot.setAttribute( 'aria-selected', active ? 'true' : 'false' );
            } );
        }

        var scrollTimer;
        track.addEventListener( 'scroll', function () {
            clearTimeout( scrollTimer );
            scrollTimer = setTimeout( updateActiveDot, 50 );
        }, { passive: true } );

        var isDragging  = false;
        var startX      = 0;
        var startScroll = 0;

        track.addEventListener( 'mousedown', function ( e ) {
            isDragging  = true;
            startX      = e.pageX - track.offsetLeft;
            startScroll = track.scrollLeft;
            track.style.cursor = 'grabbing';
            e.preventDefault();
        } );
        track.addEventListener( 'mouseleave', function () {
            isDragging = false;
            track.style.cursor = 'grab';
        } );
        track.addEventListener( 'mouseup', function () {
            isDragging = false;
            track.style.cursor = 'grab';
        } );
        track.addEventListener( 'mousemove', function ( e ) {
            if ( ! isDragging ) return;
            e.preventDefault();
            var x    = e.pageX - track.offsetLeft;
            var walk = ( x - startX ) * 1.5;
            track.scrollLeft = startScroll - walk;
        } );
    }

    function initAllCarousels() {
        if ( ! isMobile() ) return;
        var carousels = document.querySelectorAll( '.tinza-carousel' );
        carousels.forEach( function ( carousel ) {
            initCarousel( carousel );
        } );
    }

    var resizeTimer;
    window.addEventListener( 'resize', function () {
        clearTimeout( resizeTimer );
        resizeTimer = setTimeout( function () {
            var carousels = document.querySelectorAll( '.tinza-carousel' );
            carousels.forEach( function ( carousel ) {
                var dotsContainer = carousel.querySelector( '.tinza-carousel__dots' );
                if ( ! isMobile() ) {
                    if ( dotsContainer ) dotsContainer.innerHTML = '';
                } else {
                    initCarousel( carousel );
                }
            } );
        }, 200 );
    } );

    if ( document.readyState === 'loading' ) {
        document.addEventListener( 'DOMContentLoaded', initAllCarousels );
    } else {
        initAllCarousels();
    }

} )();


/* ═══════════════════════════════════════════════════════════
   2. WISHLIST — WCBoost + localStorage
═══════════════════════════════════════════════════════════ */
( function () {
    'use strict';

    var STORAGE_KEY = 'tinza_wishlist';

    /* ── localStorage helpers ───────────────────────────── */
    function getWishlist() {
        try { return JSON.parse( localStorage.getItem( STORAGE_KEY ) || '{}' ); }
        catch ( e ) { return {}; }
    }
    function setWishlist( data ) {
        try { localStorage.setItem( STORAGE_KEY, JSON.stringify( data ) ); }
        catch ( e ) {}
    }
    function deleteItem( id ) {
        var d = getWishlist();
        delete d[ String( id ) ];
        setWishlist( d );
    }
    function getRemoveUrl( id ) {
        return getWishlist()[ String( id ) ] || null;
    }

    function markWishlistedButtons() {
        document.querySelectorAll( '.js-wish' ).forEach( function ( btn ) {
            btn.classList.remove( 'is-wished' );
            btn.setAttribute( 'aria-pressed', 'false' );
        } );
        Object.keys( getWishlist() ).forEach( function ( id ) {
            document.querySelectorAll( '.js-wish[data-product-id="' + id + '"]' )
                .forEach( function ( btn ) {
                    btn.classList.add( 'is-wished' );
                    btn.setAttribute( 'aria-pressed', 'true' );
                } );
        } );
    }

    function unmarkButton( id ) {
        document.querySelectorAll( '.js-wish[data-product-id="' + id + '"]' )
            .forEach( function ( btn ) {
                btn.classList.remove( 'is-wished', 'is-loading' );
                btn.setAttribute( 'aria-pressed', 'false' );
            } );
    }

    function extractWishlistMap( doc ) {
        var map = {};
        doc.querySelectorAll( 'a.remove[data-product_id]' ).forEach( function ( a ) {
            var pid = a.getAttribute( 'data-product_id' );
            var url = a.getAttribute( 'href' ) || '';
            if ( pid ) map[ String( pid ) ] = url;
        } );
        return map;
    }

    function applyWishlistMap( map ) {
        setWishlist( map );
        markWishlistedButtons();
        if ( typeof window.tinzaSetWishlistCountAbsolute === 'function' ) {
            window.tinzaSetWishlistCountAbsolute( Object.keys( map ).length );
        }
    }
    function syncFromWishlistPage() {
        return fetch( '/wishlist/', { credentials: 'same-origin' } )
            .then( function ( res ) {
                if ( ! res.ok ) throw new Error( 'HTTP ' + res.status );
                return res.text();
            } )
            .then( function ( html ) {
                var doc = new DOMParser().parseFromString( html, 'text/html' );
                var map = extractWishlistMap( doc );
                applyWishlistMap( map );
                return map;
            } )
            .catch( function ( err ) {
                console.warn( '[Tinza Wishlist] Sync /wishlist/ failed:', err );
            } );
    }

    function watchWishlistPage() {
        var container = document.querySelector(
            'ul.wishlist_table, .wcboost-wishlist-widget__products, [class*="wishlist_table"]'
        );
        if ( ! container ) return;

        var observer = new MutationObserver( function () {
            applyWishlistMap( extractWishlistMap( document ) );
        } );

        observer.observe( container, { childList: true, subtree: true } );
    }

    /* ── AJOUTER à la wishlist ─────────────────────────────
       Après succès, on re-sync depuis /wishlist/ pour obtenir
       le remove_url exact (cohérent avec syncFromWishlistPage) */
    function addToWishlist( btn, productId ) {
        btn.classList.add( 'is-loading' );

        var body = new URLSearchParams();
        body.append( 'product_id', productId );
        body.append( 'quantity', '1' );
        if ( window.mottaData && window.mottaData.nonce ) {
            body.append( 'nonce', window.mottaData.nonce );
        }

        fetch( '/?wc-ajax=add_to_wishlist', {
            method: 'POST', credentials: 'same-origin', body: body,
        } )
        .then( function ( r ) { if ( ! r.ok ) throw new Error( r.status ); return r.json(); } )
        .then( function ( json ) {
            if ( json.success === true ) {
                return syncFromWishlistPage();
            }
            throw new Error( 'success:false' );
        } )
        .then( function () {
            btn.classList.remove( 'is-loading' );
        } )
        .catch( function ( err ) {
            btn.classList.remove( 'is-loading' );
            console.error( '[Tinza Wishlist] Add error:', err );
        } );
    }

    /* ── RETIRER de la wishlist ────────────────────────────
       Re-sync après succès pour rester cohérent avec le serveur */
    function removeFromWishlist( btn, productId ) {
        btn.classList.add( 'is-loading' );
        var removeUrl = getRemoveUrl( productId );

        if ( ! removeUrl ) {
            deleteItem( productId );
            unmarkButton( productId );
            btn.classList.remove( 'is-loading' );
            if ( typeof window.tinzaSetWishlistCount === 'function' ) {
                window.tinzaSetWishlistCount( -1 );
            }
            return;
        }

        fetch( window.location.origin + '/' + removeUrl, { credentials: 'same-origin' } )
            .then( function () { return syncFromWishlistPage(); } )
            .catch( function ( err ) {
                /* Fallback : nettoyer localement même si re-sync échoue */
                deleteItem( productId );
                unmarkButton( productId );
                console.error( '[Tinza Wishlist] Remove error:', err );
            } )
            .then( function () {
                btn.classList.remove( 'is-loading' );
            } );
    }

    /* ── Init ────────────────────────────────────────────── */
    function initWishlist() {
        markWishlistedButtons();
        syncFromWishlistPage();
        watchWishlistPage();

        document.addEventListener( 'click', function ( e ) {
            var btn = e.target.closest( '.js-wish' );
            if ( ! btn ) return;
            e.preventDefault(); e.stopPropagation();
            var id = btn.getAttribute( 'data-product-id' );
            if ( ! id || btn.classList.contains( 'is-loading' ) ) return;
            btn.classList.contains( 'is-wished' )
                ? removeFromWishlist( btn, id )
                : addToWishlist( btn, id );
        }, true );
    }

    document.readyState === 'loading'
        ? document.addEventListener( 'DOMContentLoaded', initWishlist )
        : initWishlist();

} )();
