<?php
/**
 * Landing Page
 *
 * @package Smartphoniker
 */

get_header('home');

get_template_part('template-parts/component', 'hero');

the_content();

get_footer();
