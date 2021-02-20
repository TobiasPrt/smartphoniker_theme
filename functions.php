<?php
/**
 * Theme Functions
 *
 * @package Smartphoniker_Theme_CF
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













function register_cf_blocks() {
 
}
add_action( 'carbon_fields_register_fields', 'register_cf_blocks' );

