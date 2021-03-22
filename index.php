<?php
/**
 * Template: Standard Page
 *
 * @package Smartphoniker
 * @since 1.0.0
 */

get_header();

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        the_content();
    }
}

get_footer();
