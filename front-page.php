<?php
/**
 * Template: Landing Page
 *
 * @package Smartphoniker
 * @since 1.0.0
 */

get_header( 'home' );

get_template_part( 'template-parts/component', 'hero' );

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        the_content();
    }
}

get_footer();
