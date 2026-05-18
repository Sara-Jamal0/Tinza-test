document.addEventListener('DOMContentLoaded', function () {

    // Sticky shadow header
    const header = document.getElementById('site-header');
    if (header) {
        window.addEventListener('scroll', function () {
            header.classList.toggle('site-header--scrolled', window.scrollY > 10);
        });
    }

    // Hamburger mobile (différent du CATEGORIES)
    const hamburger = document.querySelector('.site-header__hamburger');
    const mobileNav = document.getElementById('mobile-nav');
    if (hamburger && mobileNav) {
        hamburger.addEventListener('click', function () {
            const open = mobileNav.classList.toggle('site-header__nav--open');
            mobileNav.hidden = !open;
            hamburger.setAttribute('aria-expanded', open);
        });
    }

    // CATEGORIES Mega Menu
    const catBtn   = document.getElementById('categories-btn');
    const megaMenu = document.getElementById('mega-menu');
    if (catBtn && megaMenu) {
        catBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            const open = megaMenu.classList.toggle('mega-menu--open');
            megaMenu.hidden = !open;
            catBtn.setAttribute('aria-expanded', open);
        });
        document.addEventListener('click', function (e) {
            if (!catBtn.contains(e.target) && !megaMenu.contains(e.target)) {
                megaMenu.classList.remove('mega-menu--open');
                megaMenu.hidden = true;
                catBtn.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Escape ferme tout
    document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') return;
        if (megaMenu)  { megaMenu.classList.remove('mega-menu--open');  megaMenu.hidden = true; }
        if (mobileNav) { mobileNav.classList.remove('site-header__nav--open'); mobileNav.hidden = true; }
    });
});