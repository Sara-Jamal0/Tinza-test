/**
 * Tinza Child Theme — Product Carousel
 * =============================================================================
 * File    : motta-child/assets/js/products.js
 * Purpose : Mobile drag carousel with dots navigation for product sections.
 *           On desktop: no JS needed — CSS grid handles layout.
 *           On mobile : generates dot buttons, syncs active dot on scroll,
 *                       supports touch drag and mouse drag.
 * Requires: Vanilla JS only — no jQuery, no Swiper
 * =============================================================================
 */

( function () {
    'use strict';

    // Only run on mobile
    function isMobile() {
        return window.innerWidth <= 768;
    }

    /**
     * Init a single carousel instance
     * @param {HTMLElement} carousel - .tinza-carousel element
     */
    function initCarousel( carousel ) {
        var track = carousel.querySelector( '.tinza-carousel__track' );
        var dotsContainer = carousel.querySelector( '.tinza-carousel__dots' );
        var cards = carousel.querySelectorAll( '.tinza-product-card' );

        if ( ! track || ! dotsContainer || cards.length === 0 ) return;

        // Clear existing dots
        dotsContainer.innerHTML = '';

        // Number of visible "pages" based on cards
        // Each page shows ~1 full card — dots = number of cards
        var totalDots = cards.length;
        var dots = [];

        // Create dot buttons
        for ( var i = 0; i < totalDots; i++ ) {
            var dot = document.createElement( 'button' );
            dot.className = 'tinza-carousel__dot' + ( i === 0 ? ' is-active' : '' );
            dot.setAttribute( 'type', 'button' );
            dot.setAttribute( 'role', 'tab' );
            dot.setAttribute( 'aria-label', 'Go to slide ' + ( i + 1 ) );
            dot.setAttribute( 'aria-selected', i === 0 ? 'true' : 'false' );

            // Click dot → scroll to card
            ( function ( index ) {
                dot.addEventListener( 'click', function () {
                    var card = cards[ index ];
                    if ( card ) {
                        track.scrollTo( {
                            left:     card.offsetLeft - 24, // 24px = left padding
                            behavior: 'smooth',
                        } );
                    }
                } );
            } )( i );

            dotsContainer.appendChild( dot );
            dots.push( dot );
        }

        /**
         * Update active dot based on scroll position
         */
        function updateActiveDot() {
            var scrollLeft  = track.scrollLeft;
            var trackWidth  = track.offsetWidth;
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

        // Listen to scroll — throttled
        var scrollTimer;
        track.addEventListener( 'scroll', function () {
            clearTimeout( scrollTimer );
            scrollTimer = setTimeout( updateActiveDot, 50 );
        }, { passive: true } );


        /* -------------------------------------------------------------------
         * Mouse drag support (desktop browser on mobile emulation or wide touch)
         * ------------------------------------------------------------------- */
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
            var walk = ( x - startX ) * 1.5; // scroll speed multiplier
            track.scrollLeft = startScroll - walk;
        } );
    }

    /**
     * Init all carousels on the page
     */
    function initAllCarousels() {
        if ( ! isMobile() ) return;

        var carousels = document.querySelectorAll( '.tinza-carousel' );
        carousels.forEach( function ( carousel ) {
            initCarousel( carousel );
        } );
    }

    /**
     * Re-init on resize (debounced)
     * Handles orientation change: portrait ↔ landscape
     */
    var resizeTimer;
    window.addEventListener( 'resize', function () {
        clearTimeout( resizeTimer );
        resizeTimer = setTimeout( function () {
            // Re-init if switched to mobile, destroy dots if switched to desktop
            var carousels = document.querySelectorAll( '.tinza-carousel' );
            carousels.forEach( function ( carousel ) {
                var dotsContainer = carousel.querySelector( '.tinza-carousel__dots' );
                if ( ! isMobile() ) {
                    // Desktop — clear dots
                    if ( dotsContainer ) dotsContainer.innerHTML = '';
                } else {
                    // Mobile — re-init
                    initCarousel( carousel );
                }
            } );
        }, 200 );
    } );

    // Init on DOM ready
    if ( document.readyState === 'loading' ) {
        document.addEventListener( 'DOMContentLoaded', initAllCarousels );
    } else {
        initAllCarousels();
    }

} )();