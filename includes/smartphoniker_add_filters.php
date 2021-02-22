<?php
/**
 * Function containing all filters
 *
 * @package Smartphoniker
 */

function smartphoniker_add_filters()
{
    /**
     * Allow upload of .svg-files in the backend.
     */
    function smartphoniker_mime_types($mime_types)
    {
        $mime_types['svg'] = 'image/svg+xml';
        return $mime_types;
    }
    add_filter('upload_mimes', 'smartphoniker_mime_types', 1, 1);

    /**
     * Disallow all built-in Gutenberg blocks.
     */
    function smartphoniker_theme_allowed_block_types()
    {
        return array( 'carbon-fields/col1', 'carbon-fields/section' );
    }
    // add_filter( 'allowed_block_types', 'smartphoniker_theme_allowed_block_types');
}
