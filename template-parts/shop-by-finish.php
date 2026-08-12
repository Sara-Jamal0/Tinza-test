<?php
/**
 * Section: Shop by Finish
 */

$finishes = [
    [ 'label' => 'Unlacquered Brass', 'image' => 'UnlacqueredBrass.webp', 'slug' => 'unlacquered-brass' ],
    [ 'label' => 'Aged Copper',       'image' => 'Aged Copper.webp',     'slug' => 'aged-copper'       ],
    [ 'label' => 'Oxidized Copper',   'image' => 'Oxidized Copper.webp',  'slug' => 'oxidized-copper'   ],
    [ 'label' => 'Antique Brass',     'image' => 'Antique brass.webp',    'slug' => 'antique-brass'     ],
    [ 'label' => 'Chrome',            'image' => 'chrome .webp',          'slug' => 'chrome'            ],
];

$img_base = get_stylesheet_directory_uri() . '/assets/images/';
?>

<section class="tinza-section tinza-finish" id="shop-by-finish">
    <div class="tinza-section__inner">

        <h2 class="tinza-finish__title">Shop by Finish</h2>

        <div class="tinza-finish__grid">
            <?php foreach ( $finishes as $f ) : 
                // URL de recherche WooCommerce : affiche les produits dont le titre contient le label
                $search_url = add_query_arg( [
                    's'           => urlencode( $f['label'] ),
                    'post_type'   => 'product',
                ], home_url( '/' ) );
            ?>
            <a href="<?php echo esc_url( $search_url ); ?>"
               class="tinza-finish__item">

                <div class="tinza-finish__circle">
                    <img src="<?php echo esc_url( $img_base . $f['image'] ); ?>"
                         alt="<?php echo esc_attr( $f['label'] ); ?>"
                         loading="lazy">
                </div>

                <span class="tinza-finish__name">
                    <?php echo esc_html( $f['label'] ); ?>
                </span>

            </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>