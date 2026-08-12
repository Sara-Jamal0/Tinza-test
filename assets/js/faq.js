/**
 * FAQ Accordion
 * File : motta-child/assets/js/faq.js
 */

(function ($) {

    function initFaq() {
        var $items = jQuery('#tfaq .tfaq__item');
        if (!$items.length) return;

        $items.each(function () {
            var $item = jQuery(this);
            var $btn  = $item.find('.tfaq__btn');

            $btn.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                $item.toggleClass('open');
            });
        });
    }

    /* jQuery ready */
    jQuery(document).ready(function () {
        initFaq();
    });

})(jQuery);


