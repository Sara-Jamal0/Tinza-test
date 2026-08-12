/**
 * Newsletter JS
 * =============================================================================
 * File     : motta-child/assets/js/newsletter.js
 * Works    : WITH MC4WP (form id=192) — enhances UX with spinner + messages
 *            AND as standalone AJAX fallback if MC4WP is not active
 * Requires : jQuery (loaded by WordPress)
 * =============================================================================
 */

( function ( $ ) {
    'use strict';

    if ( typeof $ === 'undefined' ) return;

    $( document ).ready( function () {

        /* =====================================================================
         * 1. MC4WP FORM ENHANCEMENTS (form id=192)
         *    MC4WP handles the actual Mailchimp API call.
         *    We enhance it with: spinner on submit, button state, UX polish.
         * ===================================================================== */

        // Target the MC4WP form rendered by [mc4wp_form id="192"]
        $( document ).on( 'submit', '.mc4wp-form', function () {
            var $form   = $( this );
            var $btn    = $form.find( 'input[type="submit"]' );
            var $email  = $form.find( 'input[type="email"]' );

            // Disable button + show loading state
            $btn.val( 'Sending…' )
                .prop( 'disabled', true )
                .addClass( 'is-loading' );

            // Re-enable after 5s safety timeout (MC4WP handles response itself)
            setTimeout( function () {
                $btn.val( 'Claim Coupon' )
                    .prop( 'disabled', false )
                    .removeClass( 'is-loading' );
            }, 5000 );
        } );

        // After MC4WP processes the form — reset button on success
        $( document ).on( 'mc4wp_form_success', function () {
            $( '.mc4wp-form input[type="submit"]' )
                .val( 'Claim Coupon' )
                .prop( 'disabled', false )
                .removeClass( 'is-loading' );
        } );

        // On MC4WP error — reset button
        $( document ).on( 'mc4wp_form_error', function () {
            $( '.mc4wp-form input[type="submit"]' )
                .val( 'Claim Coupon' )
                .prop( 'disabled', false )
                .removeClass( 'is-loading' );
        } );


        /* =====================================================================
         * 2. STANDALONE AJAX FALLBACK (.js-newsletter-form)
         * ===================================================================== */

        $( document ).on( 'submit', '.js-newsletter-form', function ( e ) {
            e.preventDefault();

            var $form    = $( this );
            var $input   = $form.find( 'input[type="email"]' );
            var $btn     = $form.find( 'button[type="submit"]' );
            var $spinner = $form.find( '.tz-nl-spinner' );
            var $msg     = $form.find( '.tz-nl-msg' );
            var email    = $.trim( $input.val() || '' );
            var nonce    = $form.data( 'nonce' ) || ( window.tinzaNL ? window.tinzaNL.nonce : '' );

            /* Client-side email validation */
            var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if ( ! email || ! emailRe.test( email ) ) {
                showMsg( $msg, errEmail(), 'error' );
                $input.focus();
                return;
            }

            /* Loading state */
            $btn.prop( 'disabled', true ).addClass( 'is-loading' );
            $spinner.removeAttr( 'hidden' );
            $msg.attr( 'hidden', '' ).removeClass( 'is-success is-error' ).text( '' );

            /* AJAX call */
            $.ajax( {
                url:  window.tinzaNL ? window.tinzaNL.ajaxUrl : '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    action:      'tinza_newsletter_subscribe',
                    email:        email,
                    _ajax_nonce:  nonce,
                },
                success: function ( res ) {
                    if ( res && res.success ) {
                        showMsg( $msg, ( res.data && res.data.message ) || successMsg(), 'success' );
                        $form[ 0 ].reset();
                    } else {
                        showMsg( $msg, ( res && res.data && res.data.message ) || errGeneric(), 'error' );
                    }
                },
                error: function () {
                    showMsg( $msg, errGeneric(), 'error' );
                },
                complete: function () {
                    $btn.prop( 'disabled', false ).removeClass( 'is-loading' );
                    $spinner.attr( 'hidden', '' );
                },
            } );
        } );


        /* =====================================================================
         * 3. HELPERS
         * ===================================================================== */

        function showMsg( $el, text, type ) {
            $el.removeAttr( 'hidden' )
               .removeClass( 'is-success is-error' )
               .addClass( 'is-' + type )
               .text( text );
        }

        function errEmail()   { return window.tinzaNL ? window.tinzaNL.errorEmail   : 'Please enter a valid email address.'; }
        function errGeneric() { return window.tinzaNL ? window.tinzaNL.errorGeneric : 'Something went wrong. Please try again.'; }
        function successMsg() { return window.tinzaNL ? window.tinzaNL.successMsg   : 'Thanks! You\'re subscribed.'; }

    } );

} )( window.jQuery );