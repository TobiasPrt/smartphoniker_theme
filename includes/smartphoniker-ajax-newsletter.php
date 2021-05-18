<?php
/**
 * Handles the data from the newsletter form submissions.
 * 
 * @package Smartphoniker
 * @since 1.0.5
 */
add_action( 'wp_ajax_newsletter', 'process_newsletter_submission' );
add_action( 'wp_ajax_nopriv_newsletter', 'process_newsletter_submission' );


/**
 * Handles the submission of a newsletter form.
 *
 * @since 1.0.5
 */
function process_newsletter_submission() {
    /** @var bool */
    $request_is_valid = validate_ajax_request();
	
	if ( ! $request_is_valid ) {
        wp_send_json_error( 'Request is invalid!' );
		wp_die();
	}
    
    /** @var array The data of the request. */
    $decoded_request = extract_data();
    
    
    /** @var string The endpoint for the specific form to target */
    if ( $decoded_request['target'] === 'newsletter' || $decoded_request['newsletter'] === 'on' ) {
        $endpoint = 'https://api.newsletter2go.com/forms/submit/rjmpvj03-77lrtmjn-a4o';
        /** @var bool|string */
        $response = request_optin_email( $decoded_request, $endpoint );
    }
    
    if ( $decoded_request['target'] === 'contest' ) {
        $endpoint = 'https://api.newsletter2go.com/forms/submit/rjmpvj03-dihpffpf-1b4p';
        /** @var bool|string */
        $response = request_optin_email( $decoded_request, $endpoint );
    }
    
    send_response(
        $response,
        'Fast geschafft! Bestätige deine Anmeldung nur noch mit einem Klick auf den Link in der E-Mail, die wir dir geschickt haben.',
        $response
    );
    
    wp_die();
}


/**
 * Extras email address from request body.
 *
 * @return string The email address in the json body.
 * @since 1.0.5
 */
function extract_data() {
    /** @var string */
    $decoded_request = decode_request();
    return $decoded_request;
}


/**
 * Requests double opt in from newsletter2go api.
 *
 * @param string $email Email to send optin to.
 * @since 1.0.5
 */
function request_optin_email( $decoded_request, $endpoint ) {
    /** @var string */
    $json = json_encode( array(
        'recipient' => array(
            'first_name' => $decoded_request['First_Name'],
            'last_name' => $decoded_request['Last_Name'],
            'email' => $decoded_request['Email'],
        ),
        ) );
    
    /**
     * Sends request to Newsletter2Go API.
     *
     * @var array|WP_Error
     */
    $response = wp_remote_post( $endpoint, 
        array(
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
            'body' => $json,
        ) 
    );

    
    
    if ( ! is_wp_error( $response ) ) {
        if ( wp_remote_retrieve_response_code( $response ) == 201 ) {
            return true;
        } else {
            /** @var mixed */
            $response_body = json_decode( wp_remote_retrieve_body( $response ) );
            /** @var string */
            $error_message = $response_body->errorMessage ?? 'Ein Fehler ist aufgetreten. Bitte überprüfe Deine Daten.';
            return $error_message;
        }
    } else {
        return $response->get_error_message();
    }
}