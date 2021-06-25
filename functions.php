<?php
/**
 * Theme functions file.
 *
 * @package Smartphoniker
 * @since 1.0.0
 * @since 1.1.5 Included classes
 */


// Include Classes
foreach ( glob( __DIR__ . "/includes/classes/*.php" ) as $filename ) {
    require_once $filename;
}

// Require includes (filters and actions)
foreach ( (array) glob( __DIR__ . "/includes/*.php" ) as $filename ) {
    require_once $filename;
}
