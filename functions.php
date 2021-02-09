<!-- override and initiate wordpress functions -->

<?php
// Enqueues stylesheet automatically
function smartphoniker_register_styles() {
    // get current version mentioned in css
    $version = wp_get_theme()->get("Version");
    wp_enqueue_style( "smartphoniker-style", get_template_directory_uri() . "/style.css", array("google-fonts"), $version);
    wp_enqueue_style( "google-fonts", "https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Roboto+Condensed:wght@700&display=swap");
}

// hook for executing enqueued style
add_action( "wp_enqueue_scripts", "smartphoniker_register_styles" );


?>