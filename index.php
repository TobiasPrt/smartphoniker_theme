<?php
/**
 * Main Template File
 * 
 * @package Smartphoniker_Theme
 */


use Carbon_Fields\Field;

get_header();

// $blocks = parse_blocks( get_the_content());

// print_r(sizeof($blocks));

the_content();



get_footer();
