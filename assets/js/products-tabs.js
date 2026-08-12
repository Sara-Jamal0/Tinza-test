/**
 * ────────────────────────────────────────────────────────────
 *  LOCATION : motta-child/assets/js/products-tabs.js
 * ────────────────────────────────────────────────────────────
 *  Gère :
 *  1. Navigation onglets (tabs)
 *  2. Pagination ‹ › pour tabs
 *  3. Pagination ‹ › pour section sale
 * ────────────────────────────────────────────────────────────
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    /* ══════════════════════════════════════════════════════
       1. NAVIGATION ONGLETS
    ══════════════════════════════════════════════════════ */
    var containers = document.querySelectorAll('.tinza-tabs');

    containers.forEach(function (container) {

      var buttons = container.querySelectorAll('.tinza-tabs__btn');
      var panels  = container.querySelectorAll('.tinza-tabs__panel');
      if (!buttons.length || !panels.length) return;

      /* Click sur onglet */
      buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
          activateTab(container, buttons, panels, btn);
        });
      });

      /* Navigation clavier */
      container.addEventListener('keydown', function (e) {
        var current = container.querySelector('.tinza-tabs__btn.is-active');
        if (!current) return;

        var idx  = Array.prototype.indexOf.call(buttons, current);
        var next = null;

        if      (e.key === 'ArrowRight' || e.key === 'ArrowDown')  { next = buttons[(idx + 1) % buttons.length]; }
        else if (e.key === 'ArrowLeft'  || e.key === 'ArrowUp')    { next = buttons[(idx - 1 + buttons.length) % buttons.length]; }
        else if (e.key === 'Home')                                  { next = buttons[0]; }
        else if (e.key === 'End')                                   { next = buttons[buttons.length - 1]; }

        if (next) {
          e.preventDefault();
          activateTab(container, buttons, panels, next);
          next.focus();
        }
      });

      /* Initialiser la pagination de chaque panel */
      panels.forEach(function (panel) {
        initPager(
          panel,
          '.tinza-tabs__page',
          '.tinza-tabs__arrow--prev',
          '.tinza-tabs__arrow--next'
        );
      });
    });

    function activateTab(container, buttons, panels, btn) {
      var target = btn.getAttribute('data-tab');
      if (!target) return;

      buttons.forEach(function (b) {
        b.classList.remove('is-active');
        b.setAttribute('aria-selected', 'false');
        b.setAttribute('tabindex', '-1');
      });
      panels.forEach(function (p) {
        p.classList.remove('is-active');
        p.setAttribute('hidden', '');
      });

      btn.classList.add('is-active');
      btn.setAttribute('aria-selected', 'true');
      btn.setAttribute('tabindex', '0');

      var panel = container.querySelector('#' + target);
      if (panel) {
        panel.classList.add('is-active');
        panel.removeAttribute('hidden');
        /* Réinitialiser à la page 1 au changement d'onglet */
        resetPager(panel, '.tinza-tabs__page', '.tinza-tabs__arrow--prev', '.tinza-tabs__arrow--next');
      }
    }


    /* ══════════════════════════════════════════════════════
       2. PAGINATION SECTION SALE
    ══════════════════════════════════════════════════════ */
    var salePager = document.querySelector('.tinza-sale__pager');
    if (salePager) {
      initPager(
        salePager,
        '.tinza-sale__page',
        '.tinza-sale__arrow--prev',
        '.tinza-sale__arrow--next'
      );
    }


    /* ══════════════════════════════════════════════════════
       3. FONCTIONS PARTAGÉES
    ══════════════════════════════════════════════════════ */

    /**
     * initPager — initialise les flèches < > sur un container
     * @param {Element} container  — élément parent contenant les pages + flèches
     * @param {string}  pageSelector  — ex: '.tinza-tabs__page'
     * @param {string}  prevSelector  — ex: '.tinza-tabs__arrow--prev'
     * @param {string}  nextSelector  — ex: '.tinza-tabs__arrow--next'
     */
    function initPager(container, pageSelector, prevSelector, nextSelector) {
      var prev  = container.querySelector(prevSelector);
      var next  = container.querySelector(nextSelector);
      var pages = container.querySelectorAll(pageSelector);

      if (!prev || !next) return;

      /* Une seule page → cacher les flèches */
      if (pages.length <= 1) {
        prev.style.display = 'none';
        next.style.display = 'none';
        return;
      }

      var currentPage = 0;

      function goTo(idx) {
        pages[currentPage].classList.remove('is-active');
        currentPage = idx;
        pages[currentPage].classList.add('is-active');
        updateArrows();
      }

      function updateArrows() {
        prev.disabled = (currentPage === 0);
        next.disabled = (currentPage === pages.length - 1);
      }

      prev.addEventListener('click', function () {
        if (currentPage > 0) goTo(currentPage - 1);
      });

      next.addEventListener('click', function () {
        if (currentPage < pages.length - 1) goTo(currentPage + 1);
      });

      updateArrows();
    }

    /**
     * resetPager — remet le pager à la page 1
     */
    function resetPager(container, pageSelector, prevSelector, nextSelector) {
      var pages = container.querySelectorAll(pageSelector);
      var prev  = container.querySelector(prevSelector);
      var next  = container.querySelector(nextSelector);

      pages.forEach(function (p, i) {
        p.classList.toggle('is-active', i === 0);
      });

      if (prev) prev.disabled = true;
      if (next) next.disabled = (pages.length <= 1);
    }

  });
})();