<?php
/**
 * Registers all custom Gutenberg Blocks.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


foreach ( glob( __DIR__ . "/custom-blocks/*.php" ) as $filename ) {
    require_once $filename;
}

/**
 * Calls functions for registering all the custom Gutenberg Blocks.
 *
 * @since 1.0.0
 */
function smartphoniker_register_custom_blocks() {
    block_col1();
    block_col3();
    block_section();
    block_block2();
    block_video();
}