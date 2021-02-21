<?php
/**
 * Main Template File
 * 
 * @package Smartphoniker-Theme
 */



get_header();

// $blocks = parse_blocks( get_the_content());
var_dump( WP_Block_Type_Registry::get_instance()->get_all_registered() );
// print_r(sizeof($blocks));

the_content();



get_footer();
