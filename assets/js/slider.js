/**
 * assets/js/slider.js
 * ─────────────────────────────────────────────────────────────
 * LOCATION : motta-child/assets/js/slider.js
 * ─────────────────────────────────────────────────────────────
 * Swiper init + custom copper dots below slider.
 *
 * Dots behaviour :
 *   - Generated dynamically (1 dot per slide)
 *   - Active dot = filled copper #A87A63 (matches button color)
 *   - Synced with Swiper autoplay — dot updates on every slide change
 *   - Clickable — clicking a dot navigates to its corresponding slide
 *
 * Swiper must be loaded by Motta parent theme (already included).
 * ─────────────────────────────────────────────────────────────
 */

( function () {
    'use strict';

    document.addEventListener( 'DOMContentLoaded', function () {

        var swiperEl = document.querySelector( '.tinza-slider__swiper' );
        if ( ! swiperEl || typeof Swiper === 'undefined' ) return;

        /* ─────────────────────────────────────────────────────
           1. Count real slides (exclude Swiper clones)
           ───────────────────────────────────────────────────── */
        var realSlides = swiperEl.querySelectorAll(
            '.swiper-slide:not(.swiper-slide-duplicate)'
        );
        var slideCount = realSlides.length;
        if ( slideCount === 0 ) return;

        /* ─────────────────────────────────────────────────────
           2. Build dots container below the swiper
           ───────────────────────────────────────────────────── */
        var dotsContainer = document.createElement( 'div' );
        dotsContainer.className = 'tinza-slider__dots';
        dotsContainer.setAttribute( 'role', 'tablist' );
        dotsContainer.setAttribute( 'aria-label', 'Slide navigation' );

        var dots = [];

        for ( var i = 0; i < slideCount; i++ ) {
            var dot = document.createElement( 'button' );
            dot.className     = 'tinza-slider__dot' + ( i === 0 ? ' is-active' : '' );
            dot.type          = 'button';
            dot.setAttribute( 'role', 'tab' );
            dot.setAttribute( 'aria-label', 'Go to slide ' + ( i + 1 ) );
            dot.setAttribute( 'aria-selected', i === 0 ? 'true' : 'false' );

            /* Click → navigate to slide */
            ( function ( index ) {
                dot.addEventListener( 'click', function () {
                    swiper.slideToLoop( index ); /* slideToLoop works with loop:true */
                } );
            } )( i );

            dotsContainer.appendChild( dot );
            dots.push( dot );
        }

        /* Insert dots after the swiper element */
        swiperEl.parentNode.insertBefore( dotsContainer, swiperEl.nextSibling );

        /* ─────────────────────────────────────────────────────
           3. Helper — update active dot
           ───────────────────────────────────────────────────── */
        function setActiveDot( realIndex ) {
            dots.forEach( function ( d, idx ) {
                var active = idx === realIndex;
                d.classList.toggle( 'is-active', active );
                d.setAttribute( 'aria-selected', active ? 'true' : 'false' );
            } );
        }

        /* ─────────────────────────────────────────────────────
           4. Init Swiper
           ───────────────────────────────────────────────────── */
        var swiper = new Swiper( '.tinza-slider__swiper', {

            /* Layout */
            loop:  true,
            speed: 600,

            /* Autoplay — 5s, no pause on hover */
            autoplay: {
                delay:                5000,
                disableOnInteraction: false,
                pauseOnMouseEnter:    false,
            },

            /* No built-in navigation or pagination — using custom dots */
            navigation: false,
            pagination: false,

            /* Touch / drag */
            allowTouchMove: true,

            /* Transition effect */
            effect:     'fade',
            fadeEffect: { crossFade: true },

            /* Accessibility */
            a11y: {
                enabled:          true,
                prevSlideMessage: 'Previous slide',
                nextSlideMessage: 'Next slide',
            },

            /* Responsive */
            breakpoints: {
                0:    { slidesPerView: 1 },
                640:  { slidesPerView: 1 },
                1024: { slidesPerView: 1 },
            },

            /* ── Sync dots on every slide change ── */
            on: {
                slideChange: function () {
                    setActiveDot( this.realIndex );
                },
                /* Also sync on init in case realIndex != 0 */
                init: function () {
                    setActiveDot( this.realIndex );
                },
            },
        } );

    } );

} )();