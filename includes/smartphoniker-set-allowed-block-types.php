<?php
/**
 * Filter: Allowed Gutenberg Block types.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_filter( 'allowed_block_types', 'smartphoniker_allowed_block_types' );


/**
 * Returns only allowed Gutenberg Block types.
 * 
 * @since 1.0.0
 * @since 1.0.5 allowes core/block
 * 
 * @return array $allowed_block_types Array of all allowed Gutenberg Block types.
 */
function smartphoniker_allowed_block_types(): array {
    $custom_block_filenames = smartphoniker_get_custom_block_filenames();
    $custom_block_names = smartphoniker_extract_custom_block_names( $custom_block_filenames );
    $allowed_block_types = smartphoniker_generate_custom_block_identifiers( $custom_block_names );
    array_push( $allowed_block_types, 'core/block' ); // adds reusable block functionality
    return $allowed_block_types;
}

/**
 * Gets all filenames within /custom-blocks/.
 *
 * @since 1.0.0
 * 
 * @return array filtered filenames within /custom-blocks/.
 */
function smartphoniker_get_custom_block_filenames(): array {
    $filenames = scandir( __DIR__ . '/custom-blocks' );
    $filenames = array_diff( $filenames, array( '..', '.' ) );
    return array_values( $filenames );
}

/**
 * Extracts the custom blocks name from filenames.
 *
 * @since 1.0.0
 * 
 * @return array custom blocks names.
 */
function smartphoniker_extract_custom_block_names( array $filenames ): array {
    $custom_block_names = array_map( function( $filename ): string {
        $filename = preg_replace( '/block-/', '', $filename, 1 );
        return strstr( $filename, '.', TRUE );
    } , $filenames ); 
    return $custom_block_names;
}

/**
 * Creates Gutenberg Block identifiers for custom blocks.
 *
 * @since 1.0.0
 * 
 * @return array custom block identifiers.
 */
function smartphoniker_generate_custom_block_identifiers( array $custom_block_names ): array {
    $custom_block_identifiers = array_map( function( $identifier ): string {
        return 'carbon-fields/' . $identifier;
    }, $custom_block_names );
    return $custom_block_identifiers;
}