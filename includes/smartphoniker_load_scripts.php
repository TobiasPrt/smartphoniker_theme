<?php
/**
 * Enqueue Smartphoniker Scripts
 * 
 * @package Smartphoniker
 */

function smartphoniker_load_scripts() {
    wp_enqueue_script( 'smartphoniker-script', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get('Version'), true );
}