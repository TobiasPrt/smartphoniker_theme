<?php
/**
 * Template: Landing Page
 *
 * @package Smartphoniker
 * @since 1.0.0
 */

get_header( 'home' );

get_template_part( 'template-parts/component', 'hero' );

the_content();
// var_dump(WP_Block_Type_Registry::get_instance()->get_all_registered());

get_footer();
