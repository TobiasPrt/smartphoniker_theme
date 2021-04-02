<?php
/**
 * Filter: Login Errors
 * 
 * This file replaces the standard wordpress login error messages
 * to give no clear information about whether username or password is incorrect
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_filter( 'login_errors','smartphoniker_overwrite_login_error_messages' );


/**
 * Overwrites the password error message
 *
 * @param string $error_message old error message
 * 
 * @return string $error_message new error message
 * 
 * @since 1.0.0
 */
function smartphoniker_overwrite_login_error_messages( string $error_message ) : string {
	if ( is_int( strpos( $error_message, 'The password you entered for') ) || is_int( strpos( $error_message, 'Invalid username' ) ) ) {
        $error_message = '<strong>ERROR:</strong> Oops. Wrong login information.<br /><a href="' . wp_lostpassword_url() . '">Lost your password?</a>';
    }
 
	return $error_message;
}