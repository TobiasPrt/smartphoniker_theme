<?php
/**
 * Theme Functions
 * 
 * @package Smartphoniker_Theme
 */


if( ! function_exists( 'smartphoniker_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function smartphoniker_setup() {
        /**
         * Add support for custom navigations in header and footer.
         */
        register_nav_menus( 
            array(
                'primary' => 'Main Navigation',
                'footer_links' => 'Footer Hilfreiche Links',
                'footer_legal' => 'Footer Informationen',
            )
        );
    }
endif;
add_action('after_setup_theme', 'smartphoniker_setup');


/**
 * Remove main text editor.
 */
function smartphoniker_remove_pages_editor(){
    remove_post_type_support( 'page', 'editor' );
}   
add_action( 'init', 'smartphoniker_remove_pages_editor' );


/**
 * Allow upload of .svg-files in the backend.
 */
function smartphoniker_mime_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'smartphoniker_mime_types', 1, 1);


/**
 * Enqueue Stylesheet & Google Fonts.
 */
function smartphoniker_scripts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Roboto+Condensed:wght@700&display=swap' );
    wp_enqueue_style( 'smartphoniker-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );
    wp_enqueue_script( 'smartphoniker-script', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get('Version'), true );
}
add_action( 'wp_enqueue_scripts', 'smartphoniker_scripts' );