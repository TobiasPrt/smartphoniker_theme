<?php
/**
 * Enqueue Smartphoniker Styles
 * 
 * @package Smartphoniker
 */

function smartphoniker_load_styles() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Roboto+Condensed:wght@700&display=swap' );
    wp_enqueue_style( 'smartphoniker-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );
}