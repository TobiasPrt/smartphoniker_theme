<?php
/**
 * Handles the data from the newsletter form submissions.
 * 
 * @package Smartphoniker
 * @since 1.1.6
 */
add_action( 'wp_ajax_googleform', 'process_googleform_submission' );
add_action( 'wp_ajax_nopriv_googleform', 'process_googleform_submission' );


/**
 * Handles the submission of a googleform form.
 *
 * @since 1.1.6
 */
function process_googleform_submission() {
    /** @var bool */
    $request_is_valid = validate_ajax_request();
	
	if ( ! $request_is_valid ) {
        wp_send_json_error( 'Request is invalid!' );
		wp_die();
	}
    
    /** @var string The endpoint for the specific form to target */
    $endpoint = 'https://api.newsletter2go.com/forms/submit/rjmpvj03-if462p9j-b8v';
    /** @var bool|string */
    $response = send_to_form( $endpoint );

    
    send_response(
        $response,
        'Wir haben deine Anfrage erhalten! In kürze schicken wir dir dein Geschenk zu!',
        $response
    );
    
    wp_die();
}

/**
 * Requests double opt in from newsletter2go api.
 *
 * @param string $endpoint endpoint to send the request to.
 * @since 1.1.6
 */
function send_to_form( $endpoint ) {
    /** @var string */
    $json = json_encode( array(
        'recipient' => array(
            'first_name' => $_POST['First_Name'],
            'last_name' => $_POST['Last_Name'],
            'email' => $_POST['Email'],
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