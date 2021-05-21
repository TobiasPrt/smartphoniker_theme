<?php
/**
 * Smartphoniker Utility Functions
 * 
 * @package Smartphoniker
 * @since 1.0.0
 * @since 1.0.5 Added functions for validating ajax requests.
 */


/**
 * Returns list of all post types of certain post type.
 *
 * @param array|string $post_type name of post type
 *
 * @return array format: [post-id] => [title]
 */
function get_all_posts( $post_type = null, string $category = null ): array {
    // check passed arguments
    if ($post_type === null ) {
        $post_list = get_posts( array(
            'numberposts' => -1,
            'post_type' => get_post_types('', 'names'),
            'post_status' => array('publish'),
            
        ) );
    } elseif ( $category !== null && $post_type !== null) {
        $post_list = get_posts( array(
            'post_type' => $post_type,
            'post_status' => array('publish'),
            'category' => $category,
        ) );
    } else {
        $post_list = get_posts( array(
            'numberposts' => -1,
            'post_type' => $post_type,
            'post_status' => array('publish'),
        ) );
    }

    // write posts to list
    $list = array();
    foreach ( (array) $post_list as $post_item) {  
        $list[$post_item->ID] = $post_item->post_title;
    }

    return array_filter( $list );
}


/**
 * Validates if the request is malicious
 *
 * @return bool true if valid, false if malicious
 *
 * @since 1.0.0
 * @since 1.0.5 moved to util file
 * @since 1.1.0 removed nonce validation
 */
function validate_ajax_request() {
	return validate_recaptcha();
}


/**
 * Validates the WordPress Nonce for protection against csrf.
 * 
 * @return bool true if valid, false if malicious
 *
 * @since 1.0.0
 * @since 1.0.5 moved to util file
 */
function validate_nonce() {
    $nonce = decode_request()['_wpnonce'];
    return wp_verify_nonce( $nonce, 'csrf-protection' );
}


/**
 * Validates the request with Google reCaptcha v3
 * 
 * @return bool
 *
 * @since 1.0.0
 * @since 1.0.5 moved to util file
 */
function validate_recaptcha() {
	// request recaptcha validation from Google
    $response = request_recaptcha_validation();
    
    wp_mail(
		"me@tobiaspoertner.com",
		"Form Error - recaptcha",
		json_encode($response),
		array(
			'Content-Type: text/html; charset=UTF-8',
			"From: Smartphoniker Kontaktformular <me@tobiaspoertner.com>",
			"Reply-to: smartgg <me@tobiaspoertner.com>",
		)
	);
    // evaluate response
    return $response->success && $response->score >= 0.5;
}


/**
 * Sends validation request to Google by curl.
 * 
 * @return array decoded JSON response object
 *
 * @since 1.0.0
 * @since 1.0.5 moved to util file
 */
function request_recaptcha_validation() {
	// set payload
	$payload = array(
		'secret' => RECAPTCHA_SECRET,
        'response' => $_POST['token'],
	);

	// setup curl
	$curl_config = array(
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $payload
    );
    
    // request validation
    $curl_session = curl_init();
    curl_setopt_array( $curl_session, $curl_config );
    $response = curl_exec( $curl_session );
    curl_close( $curl_session );

    return json_decode( $response );
}


/**
 * Decodes string from request body
 * 
 * @return array decoded request body
 *
 * @since 1.0.0
 * @since 1.0.5 moved to util file
 */
function decode_request() {
	$request_data = array();
	wp_parse_str( $_POST['data'], $request_data );
	return $request_data;
}


/**
 * Sends json response to the frontend
 * 
 * @param bool|string $message_was_sent True | Errormessage
 * @param string $success_message Message to return to user when reqeúest was successful.
 * @param bool|string $success_message True | Message to return to user when request was unsuccessful.
 *
 * @since 1.0.0
 * @since 1.0.5 moved to util | added parameters for messages
 */
function send_response( $message_was_sent, $success_message, $error_message ) {
	if ( $message_was_sent === true ) {
		wp_send_json_success( $success_message );
	} else {
		wp_send_json_error( $error_message );
	}
}