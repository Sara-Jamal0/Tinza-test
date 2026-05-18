<?php
/**
 * Tinza — template-parts/sale.php
 * Section "Up to 50% off"
 *
 * LOGIQUE TRI :
 * 1. Récupérer tous les IDs en promotion (WooCommerce natif)
 * 2. Pour chaque produit → calculer % de réduction
 *    formule : ( (regular - sale) / regular ) * 100
 * 3. Trier par % DESC (plus grand rabais en premier)
 * 4. Garder les 4 premiers
 * 5. Afficher
 */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'wc_get_product_ids_on_sale' ) ) return;

/* ── ÉTAPE 1 — Récupérer tous les IDs en promotion ─────── */
$sale_ids = wc_get_product_ids_on_sale();
if ( empty( $sale_ids ) ) return;

/* ── ÉTAPE 2 — Calculer le % de réduction pour chaque ID ─ */
$products_with_discount = [];

foreach ( $sale_ids as $pid ) {

    $product = wc_get_product( $pid );

    /* Ignorer : pas de produit, invisible, variante seule */
    if ( ! $product ) continue;
    if ( ! $product->is_visible() ) continue;
    if ( $product->get_type() === 'variation' ) continue;

    $regular = (float) $product->get_regular_price();
    $sale    = (float) $product->get_sale_price();

    /* Les deux prix doivent exister et être valides */
    if ( $regular <= 0 || $sale <= 0 ) continue;
    if ( $sale >= $regular ) continue;

    /* Calcul du pourcentage de réduction */
    $pct = round( ( ( $regular - $sale ) / $regular ) * 100 );

    /* Stocker le produit avec son % pour le tri */
    $products_with_discount[] = [
        'product'  => $product,
        'pct'      => $pct,
        'regular'  => $regular,
        'sale'     => $sale,
    ];
}

/* Si après filtrage il n'y a rien → ne rien afficher */
if ( empty( $products_with_discount ) ) return;

/* ── ÉTAPE 3 — Trier par % DESC (plus grand rabais en 1er) */
usort( $products_with_discount, function( $a, $b ) {
    return $b['pct'] - $a['pct'];
    /* $b - $a = ordre décroissant
       si $b['pct'] = 60 et $a['pct'] = 30
       → 60 - 30 = 30 (positif) → $b passe avant $a */
} );

/* ── ÉTAPE 4 — Garder seulement les 4 premiers ─────────── */
$products_with_discount = array_slice( $products_with_discount, 0, 4 );

/* Symbole monétaire */
$currency = get_woocommerce_currency_symbol();
?>

<section class="tz-sale" aria-label="Up to 50% off">

    <div class="tz-section-head">
        <h2 class="tz-section-head__title">Up to 50% off</h2>
        <a href="<?php echo esc_url( add_query_arg( 'on_sale', 1, wc_get_page_permalink( 'shop' ) ) ); ?>"
           class="tz-section-head__arrow"
           aria-label="Voir tous les produits en promotion">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
        </a>
    </div>

    <!-- ── ÉTAPE 5 — Afficher les 4 produits triés ─────── -->
    <ul class="tz-sale__grid" role="list">

        <?php foreach ( $products_with_discount as $item ) :

            $product  = $item['product'];
            $pct      = $item['pct'];
            $regular  = $item['regular'];
            $sale     = $item['sale'];
            $pid      = $product->get_id();

            /* Image */
            $img_id  = $product->get_image_id();
            $img_url = $img_id
                ? wp_get_attachment_image_url( $img_id, 'tinza-card' )
                : wc_placeholder_img_src( 'tinza-card' );
            $img_alt = $img_id
                ? ( get_post_meta( $img_id, '_wp_attachment_image_alt', true ) ?: $product->get_name() )
                : $product->get_name();

            /* Vendeur */
            if ( function_exists( 'dokan_get_store_info' ) ) {
                $store  = dokan_get_store_info( $product->get_post_data()->post_author );
                $seller = $store['store_name'] ?? get_post_meta( $pid, '_tinza_seller', true ) ?: 'The Shop';
            } else {
                $seller = get_post_meta( $pid, '_tinza_seller', true ) ?: 'The Shop';
            }

            /* Étoiles */
            $rating = (float) $product->get_average_rating();

            /* Free Shipping */
            $ship = ( get_post_meta( $pid, '_tinza_free_shipping', true ) === 'yes' );

            $link = $product->get_permalink();
        ?>

        <li class="tz-pcard">

            <div class="tz-pcard__img">
                <a href="<?php echo esc_url( $link ); ?>" tabindex="-1" aria-hidden="true">
                    <img src="<?php echo esc_url( $img_url ); ?>"
                         alt="<?php echo esc_attr( $img_alt ); ?>"
                         width="420" height="420"
                         loading="lazy">
                </a>

                <!-- Badge réduction — plus visible = plus grand % -->
                <span class="tz-pcard__badge-discount">
                    -<?php echo $pct; ?>%
                </span>

                <!-- Cœur Wishlist -->
                <button type="button"
                        class="tz-pcard__wish js-wish"
                        data-id="<?php echo esc_attr( $pid ); ?>"
                        aria-label="<?php esc_attr_e( 'Add to wishlist', 'motta-child' ); ?>"
                        aria-pressed="false">
                    <svg width="20" height="20"
                         viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.75"
                         stroke-linecap="round" stroke-linejoin="round"
                         aria-hidden="true">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67
                                 l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78
                                 l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06
                                 a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </button>
            </div>

            <div class="tz-pcard__body">

                <h3 class="tz-pcard__title">
                    <a href="<?php echo esc_url( $link ); ?>">
                        <?php echo esc_html( $product->get_name() ); ?>
                    </a>
                </h3>

                <div class="tz-pcard__seller">
                    <div class="tz-pcard__avatar">
                        <?php echo get_avatar(
                            $product->get_post_data()->post_author,
                            32, '', $seller
                        ); ?>
                    </div>
                    <div class="tz-pcard__seller-meta">
                        <span class="tz-pcard__seller-name">
                            <?php echo esc_html( strtoupper( $seller ) ); ?>
                        </span>
                        <?php if ( $rating > 0 ) : ?>
                        <div class="tz-pcard__stars"
                             aria-label="Note <?php echo esc_attr( $rating ); ?>/5">
                            <?php for ( $i = 1; $i <= 5; $i++ ) :
                                $fill = ( $i <= round( $rating ) )
                                    ? '#161A17' : '#E5E0DA';
                            ?>
                            <svg width="10" height="10"
                                 viewBox="0 0 10 10"
                                 aria-hidden="true">
                                <polygon fill="<?php echo $fill; ?>"
                                         points="5,1 6.2,3.8 9.5,4.1 7,6.3
                                                 7.8,9.5 5,7.8 2.2,9.5 3,6.3
                                                 0.5,4.1 3.8,3.8"/>
                            </svg>
                            <?php endfor; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="tz-pcard__row">
                    <div class="tz-pcard__prices">
                        <span class="tz-pcard__price">
                            <?php echo esc_html( $currency . number_format( $sale, 2 ) ); ?>
                        </span>
                        <span class="tz-pcard__price-old">
                            <?php echo esc_html( $currency . number_format( $regular, 2 ) ); ?>
                        </span>
                    </div>
                    <?php if ( $ship ) : ?>
                    <span class="tz-pcard__ship">Free Shipping</span>
                    <?php endif; ?>
                </div>

            </div>
        </li>

        <?php endforeach; ?>

    </ul>

</section>