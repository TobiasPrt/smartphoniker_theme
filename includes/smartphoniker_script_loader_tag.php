<?php
/**
 * Filter: custom html script tag
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Specifies the module type for specific html script handles.
 * 
 * @since 1.0.0
 *
 * @param   string  $tag     default script tag
 * @param   string  $handle  handle of script
 * @param   string  $src     url/path of script
 *
 * @return  string           new script tag
 */
function smartphoniker_script_loader_tag( string $tag, string $handle, string $src ) {
    if ( 'smartphoniker-app' !== $handle ) {
        return $tag;
    }
    return '<script type="module" src="' . esc_url( $src ) . '"></script>';
}