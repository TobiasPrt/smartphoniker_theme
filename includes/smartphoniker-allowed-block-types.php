<?php
/**
 * Filter: Allowed Gutenberg Block types.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Returns only allowed Gutenberg Block types.
 * 
 * @since 1.0.0
 * 
 * @return array $allowed_block_types Array of all allowed Gutenberg Block types.
 */
function smartphoniker_allowed_block_types(): array {
    $allowed_block_types = array( 
        'carbon-fields/col-1',
        'carbon-fields/section',
        'carbon-fields/block-2',
    );
    return $allowed_block_types;
}