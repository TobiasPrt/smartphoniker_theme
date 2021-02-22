<?php
/**
 * Theme setup function.
 * 
 * @package Smartphoniker-Theme
 */

if( ! function_exists( 'smartphoniker_theme_setup' ) ) :
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

        /**
         * Disallow all built-in Gutenberg blocks.
         */
        // function smartphoniker_theme_allowed_block_types() {
        //     return array( 'carbon-fields/col1', 'carbon-fields/section' );
        // }
        // add_filter( 'allowed_block_types', 'smartphoniker_theme_allowed_block_types');
     
    }
endif;