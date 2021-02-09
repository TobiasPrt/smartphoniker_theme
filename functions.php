<!-- override and initiate wordpress functions -->

<?php

function smartphoniker_register_styles() {
    $version = wp_get_theme()->get("Version");
    wp_enqueue_style( "smartphoniker-style", get_template_directory_uri() . "/style.css", array("google-fonts"), $version);
    wp_enqueue_style( "google-fonts", "https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Roboto+Condensed:wght@700&display=swap");
}

function smartphoniker_register_scripts() {
    wp_enqueue_script( "smartphoniker-script", get_template_directory_uri() . "/assets/js/main.js", [], $version, true );
}


add_action( "wp_enqueue_scripts", "smartphoniker_register_styles" );
add_action( "wp_enqueue_scripts", "smartphoniker_register_scripts" );




?>