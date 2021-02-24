<?php
/**
 * Filter: Allowed mime types.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Allow additional mime types to be uploaded.
 * 
 * @since 1.0.0
 *
 * @param   array   $mime_types List of all allowed mime types.
 * 
 * @return  array   $mime_types Extended list of all allowed mime types.
 */
function smartphoniker_mime_types( array $mime_types ): array {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}