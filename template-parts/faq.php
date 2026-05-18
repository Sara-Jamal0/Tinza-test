<?php
/**
 * FAQ
 * File : motta-child/template-parts/faq.php
 * CSS  : motta-child/assets/css/faq.css   (enqueued via functions.php)
 * JS   : motta-child/assets/js/faq.js     (enqueued via functions.php)
 */

$faq = [
    [
        'q'    => 'Are all products on Tinza authentic and handmade?',
        'a'    => 'Yes. Every piece listed on Tinza is handcrafted by vetted artisans. Each product goes through a quality and authenticity review before being made available on our platform.',
        'open' => true,
    ],
    [
        'q'    => 'What is your return and money-back policy?',
        'a'    => 'We offer a full money-back guarantee. If you are not satisfied, you can request a return within 14 days of receiving your order. You also have a 24-hour cancellation window after placing your order.',
        'open' => false,
    ],
];
?>

<section class="tfaq" id="tfaq">
    <div class="tfaq__inner">

        <h2 class="tfaq__title">Frequently asked questions</h2>

        <div class="tfaq__list">
            <?php foreach ( $faq as $i => $item ) : ?>
            <div class="tfaq__item<?php echo ! empty( $item['open'] ) ? ' open' : ''; ?>">

                <button class="tfaq__btn" type="button">
                    <span class="tfaq__btn-text"><?php echo esc_html( $item['q'] ); ?></span>
                    <span class="tfaq__chevron" aria-hidden="true">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M6 9L12 15L18 9"
                                  stroke="#161A17" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>

                <div class="tfaq__answer">
                    <p class="tfaq__answer-text"><?php echo esc_html( $item['a'] ); ?></p>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>