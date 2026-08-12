/**
 * Footer Accordion
 * File : motta-child/assets/js/footer.js
 */

(function () {

    function init() {
        var cols = document.querySelectorAll('.site-footer__col:not(.site-footer__brand)');

        if (!cols.length) return;

        for (var i = 0; i < cols.length; i++) {
            (function (col) {
                var btn = col.querySelector('.site-footer__col-btn');
                if (!btn) return;

                btn.addEventListener('click', function () {
                    /* Actif uniquement sur mobile */
                    if (window.innerWidth > 768) return;

                    if (col.classList.contains('open')) {
                        col.classList.remove('open');
                    } else {
                        col.classList.add('open');
                    }
                });

            })(cols[i]);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

}());