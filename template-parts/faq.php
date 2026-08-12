<?php
/**
 * Section: FAQ
 */
$faq = [
    [
        'q'    => 'Are the products handmade?',
        'a'    => 'Many of our products are handcrafted by skilled artisans using traditional metalworking techniques passed down through generations. Because each piece is made by hand, slight variations in texture, finish, or color may occur, making every item unique and full of character.',
        'open' => true,
    ],
    [
        'q'    => 'Are your products made from real copper and brass?',
        'a'    => 'Yes. Tinza specializes in authentic copper and brass home décor, kitchenware, lighting, and accessories. We carefully select products made from genuine materials and provide detailed product descriptions so you can shop with confidence.',
        'open' => false,
    ],
    [
        'q'    => 'Do you ship internationally, and how long does delivery take?',
        'a'    => ' Yes, Tinza ships to customers around the world. Delivery times vary depending on your location and the specific product ordered. Most orders are delivered within 5–15 business days, and tracking information is provided once your order has been shipped.',
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