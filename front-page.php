<?php
/**
 * front-page.php — Tinza homepage
 * LOCATION : motta-child/front-page.php
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="homepage">

    <?php
    $sections = [
        'slider',
        'products-tabs',
        'sale',
        'shop-by-finish',
        'tinza-promise',
        'banner',
        'faq',
        /*'newsletter',*/
    ];

    foreach ( $sections as $section ) {

        $file = get_stylesheet_directory() . '/template-parts/' . $section . '.php';

        if ( file_exists( $file ) ) {
            get_template_part( 'template-parts/' . $section );
        }

    }
    ?>

</main>

<?php get_footer(); ?>