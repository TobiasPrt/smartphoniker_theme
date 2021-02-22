<?php
/**
 * Registers all carbon fields custom blocks.
 * 
 * @package Smartphoniker
 */
function smartphoniker_register_cf_blocks() {

    foreach ( glob( __DIR__ . "/../blocks/*.php" ) as $filename ) {
        require_once $filename;
    }

    block_columns();
    block_section();
}