<?php
/**
 * Handles the data from all forms
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Executes all form processors
 */
(function(){
    foreach ( (array) glob( __DIR__ . "/ajax-form-processors/*.php" ) as $filename ) {
        require_once $filename;
    }
})();