<?php
/**
 * Handles the data from all forms
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'wp_ajax_form', 'form_processor');
add_action( 'wp_ajax_nopriv_form', 'form_processor');


/**
 * Processes ajax form data
 *
 * @since 1.0.0
 */
function form_processor() {
    $form_data = get_formdata( $_POST );  
    $headers = get_email_headers( $form_data );
    $send_to = get_option( 'admin_email' );
    $subject = get_subject( $form_data );
    $message = get_message( $form_data );
    send_email( $send_to, $subject, $message, $headers );
}


/**
 * Parses query string and returns array of data
 *
 * @param array $post_data associative array of variables passed as a http request
 *
 * @return array $formdata only parsed the data part of the postdata
 * 
 * @since 1.0.0
 */
function get_formdata( $post_data ) {
    $formdata = array();
    wp_parse_str( $post_data['data'], $formdata );
    return $formdata;
}


/**
 * Returns email headers
 *
 * @param array $form_data parsed form data
 *
 * @return array email headers
 * 
 * @since 1.0.0
 */
function get_email_headers($form_data) {
    $admin_email = get_option('admin_email');
    return array(
        'Content-Type: text/html; charset=UTF-8',
        'From: Smartphoniker Kontaktformular <' . $admin_email . '>',
        'Reply-to:' . $form_data['Email'],
    );
}


/**
 * Returns subject
 *
 * @param array $form_data parsed form data
 *
 * @return string email subject
 * 
 * @since 1.0.0
 */
function get_subject($form_data) {
    return $form_data['Type_of_Enquiry'] . ' von ' .$form_data['First_Name'] . ' ' . $form_data['Last_Name'];
}


/**
 * Returns message
 *
 * @param array $form_data parsed form data
 *
 * @return string formatted email message
 * 
 * @since 1.0.0
 */
function get_message($form_data) {
    $message = '';

    foreach ( (array) $form_data as $index => $field ) {
        $message .= '<strong>' . $index . ':</strong> ' . $field . '<br>';
    }

    return $message;
}


/**
 * Sends email to admin
 *
 * @param string $send_to receipient
 * @param string $subject email subject
 * @param string $message email body/message
 * @param array $headers email headers
 *
 * @since 1.0.0
 */
function send_email( $send_to, $subject, $message, $headers ) {
    try {
        if ( wp_mail( $send_to, $subject, $message, $headers ) ) {
            wp_send_json_success( 'Die Anfrage wurde erfolgreich versendet' );
        } else {
            wp_send_json_error( 'Ein Fehler ist aufgetreten, die Email konnte nicht gesendet werden.' );
        }
    } catch ( Exception $e ) {
        wp_send_json_error( $e->getMessage() );
    }
}