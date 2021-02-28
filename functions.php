<?php
/**
 * Theme functions file.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


// Require includes (filters and actions)
foreach ( (array) glob( __DIR__ . "/includes/*.php" ) as $filename ) {
    require_once $filename;
}
