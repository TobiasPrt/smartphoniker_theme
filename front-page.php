<?php
/**
 * Landing Page
 *
 * @package Smartphoniker
 * @since 1.0.0
 */

get_header('home');

get_template_part('template-parts/component', 'hero');

the_content();

get_footer();
