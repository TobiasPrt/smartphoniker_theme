<?php

// Allow svg to be uploaded
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);


// Remove editor in page editor from all pages
function smartphoniker_remove_textarea() {
    remove_post_type_support( 'page', 'editor' );
}
add_action('admin_init', 'smartphoniker_remove_textarea');


// Add Custom Navigation
function smartphoniker_nav() {

    $locations = array(
        "primary" => "Main Navigation",
        "footer_links" => "Footer Hilfreiche Links",
        "footer_legal" => "Footer Informationen",
    );

    register_nav_menus( $locations );
}
add_action( "init", "smartphoniker_nav" );

// Adds dynamic Title tag support
function smartphoniker_theme_support() {
    add_theme_support( "title-tag");
}
add_action("after_setup_theme", "smartphoniker_theme_support");



function smartphoniker_register_styles() {
    $version = wp_get_theme()->get("Version");
    wp_enqueue_style( "smartphoniker-style", get_template_directory_uri() . "/style.css", array("google-fonts"), $version);
    wp_enqueue_style( "google-fonts", "https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Roboto+Condensed:wght@700&display=swap");
}
add_action( "wp_enqueue_scripts", "smartphoniker_register_styles" );



function smartphoniker_register_scripts() {
    $version = wp_get_theme()->get("Version");
    wp_enqueue_script( "smartphoniker-script", get_template_directory_uri() . "/assets/js/main.js", [], $version, true );
}
add_action( "wp_enqueue_scripts", "smartphoniker_register_scripts" );
?>