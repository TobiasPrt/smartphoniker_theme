<?php
/**
 * Template: 404 Error
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */

get_header();

$args['text'] = carbon_get_theme_option('404-text');
$args['link_list'] = carbon_get_theme_option('link_list');
?>

<section class="content__section section">
    <!-- Überschrift -->
    <h2 class="section__heading"><?php echo esc_html( carbon_get_theme_option('404-heading') ); ?></h2>

    <!-- Text -->
    <?php get_template_part( 'template-parts/component', 'col-1', $args ); ?>
    <?php get_template_part( 'template-parts/component', 'link-list', $args ); ?>

    <!-- Link-Liste -->
</section>

<?php

get_footer();