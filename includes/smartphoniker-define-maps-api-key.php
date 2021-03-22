<?php
/**
 * Filter: Google Maps API Key
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_filter( 'carbon_fields_map_field_api_key', 'smartphoniker_map_api_key' );



/**
 * Returns API Key
 *
 * @param string  $key
 *
 * @return string Google API Key
 */
function smartphoniker_map_api_key( string $key ) {
    return 'AIzaSyC4QnNCsxxSj4yOixOksho0L4EP7vO-SuI';
}

