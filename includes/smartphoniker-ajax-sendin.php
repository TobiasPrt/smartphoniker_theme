<?php
/**
 * Handles the data from sendin form
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */
add_action( 'wp_ajax_sendin', 'process_sendin_form' );
add_action( 'wp_ajax_nopriv_sendin', 'process_sendin_form' );

/**
 * Process sendin form.
 *
 * @since 1.1.5
 */
function process_sendin_form() {    
    // Verify reCAPTCHA token
    $recaptcha = new Recaptcha( $_POST['token'] );
    $request_is_valid = $recaptcha->verify();
    
    // Die if reCAPTCHA is not valid
    if ( ! $request_is_valid ) {
        wp_send_json_error( 'Request is invalid!' );
        wp_die();
    }

    // Check if email is valid
    if ( ! is_email( sanitize_email( $_POST['email'] ) ) ) {
        wp_send_json_error( "Invalid email address." );
        wp_die();
    }

    // Create instances of input
    $address = new PostalAddress(
        sanitize_string($_POST['street']), sanitize_string($_POST['zipcode']), sanitize_string($_POST['city'])
    );
    $customer = new Customer(
        sanitize_string($_POST['first_name']), sanitize_string($_POST['last_name']), $address, sanitize_email($_POST['email']));
    $device = new Device(
        sanitize_string($_POST['manufacturer']), sanitize_string($_POST['modell']), sanitize_string($_POST['code'])
    );
    $inquiry = new Inquiry(
        sanitize_string($_POST['type_of_inquiry']), $customer, $device, sanitize_string($_POST['message'])
    );

    // Send mail to Smartphoniker
    $mailer = new Mailer($inquiry);
    $result = $mailer->send();
    
    // Send response to user
    $response = new AJAXResponse( array( 'success' => $result ) );
    $response->add_to_body( array(
        'name' => (string) $customer,
        'address' => (string) $address,
        'email' => (string) $customer->get_email(),
        'device' => (string) $device->get_device_name(),
        'message' => (string) $inquiry->get_message()
    ) );
    $response->send();
}