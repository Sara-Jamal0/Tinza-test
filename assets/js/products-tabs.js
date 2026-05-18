/**
 * ────────────────────────────────────────────────────────────
 *  LOCATION : motta-child/assets/js/products-tabs.js
 * ────────────────────────────────────────────────────────────
 *  Featured Products Tabs — pure JS, no jQuery
 *
 *  Behavior :
 *  - Click on a tab button → activate it + show matching panel
 *  - Keyboard accessible (arrow keys + Enter/Space)
 *  - ARIA states (aria-selected, role="tab", role="tabpanel")
 * ────────────────────────────────────────────────────────────
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    /* Find all tab containers (could be multiple on a page) */
    var containers = document.querySelectorAll('.tinza-tabs');
    if (!containers.length) return;

    containers.forEach(initTabs);

    /* Init one tab container */
    function initTabs(container) {

      var buttons = container.querySelectorAll('.tinza-tabs__btn');
      var panels  = container.querySelectorAll('.tinza-tabs__panel');
      if (!buttons.length || !panels.length) return;

      /* ── Click handler ── */
      buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
          activateTab(btn);
        });
      });

      /* ── Keyboard navigation (arrow left/right) ── */
      container.addEventListener('keydown', function (e) {
        var current = container.querySelector('.tinza-tabs__btn.is-active');
        if (!current) return;

        var idx = Array.prototype.indexOf.call(buttons, current);
        var next = null;

        if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
          next = buttons[(idx + 1) % buttons.length];
        } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
          next = buttons[(idx - 1 + buttons.length) % buttons.length];
        } else if (e.key === 'Home') {
          next = buttons[0];
        } else if (e.key === 'End') {
          next = buttons[buttons.length - 1];
        }

        if (next) {
          e.preventDefault();
          activateTab(next);
          next.focus();
        }
      });

      /* ── Activate a specific tab ── */
      function activateTab(btn) {
        var target = btn.getAttribute('data-tab');
        if (!target) return;

        /* Deactivate all */
        buttons.forEach(function (b) {
          b.classList.remove('is-active');
          b.setAttribute('aria-selected', 'false');
          b.setAttribute('tabindex', '-1');
        });
        panels.forEach(function (p) {
          p.classList.remove('is-active');
          p.setAttribute('hidden', '');
        });

        /* Activate clicked */
        btn.classList.add('is-active');
        btn.setAttribute('aria-selected', 'true');
        btn.setAttribute('tabindex', '0');

        var panel = container.querySelector('#' + target);
        if (panel) {
          panel.classList.add('is-active');
          panel.removeAttribute('hidden');
        }
      }
    }
  });
})();