<?php
/**
 * Handles the data from all forms
 * 
 * @package Smartphoniker
 * @since 1.0.0
 * @since 1.0.5 Moved several general-purpose function to util file.
 */
add_action( 'wp_ajax_form', 'process_ajax_request');
add_action( 'wp_ajax_nopriv_form', 'process_ajax_request');


/**
 * Processes ajax form data
 *
 * @since 1.0.0
 */
function process_ajax_request() {
	wp_mail(
		"me@tobiaspoertner.com",
		"Form Error",
		json_encode($_POST['data']),
		array(
        'Content-Type: text/html; charset=UTF-8',
        "From: Smartphoniker Kontaktformular <me@tobiaspoertner.com>",
        "Reply-to: smartgg <me@tobiaspoertner.com>",
    );,
		$request_data['attachment'],
	);
	$request_is_valid = validate_ajax_request();
	
	if ( ! $request_is_valid ) {
		wp_send_json_error( 'Request is invalid!' );
		wp_die();
	}
	
	$request_data = get_request_data();

	$message_was_sent = forward_request_by_mail( $request_data );

	delete_uploaded_file( $request_data['attachment'] );
	
	send_response( 
		$message_was_sent,
		'Die Nachricht wurde erfolgreich verschickt. Wir werden uns so schnell wie möglich bei Dir melden!',
		'Ein Fehler ist aufgetreten, die Nachricht konnte nicht gesendet werden.'
	);

	wp_die();
}


/**
 * Returns the request data
 * 
 * @return array [subject, message, attachment]
 *
 * @since 1.0.0
 */
function get_request_data() {
	$decoded_request = decode_request();

	// get request data
	$request_data = array();
    $request_data['type'] = $decoded_request['Type_of_Enquiry'];
    $request_data['sender_name'] = "{$decoded_request['First_Name']} {$decoded_request['Last_Name']}";
	$request_data['sender_email'] = $decoded_request['Email'];
	$request_data['subject'] = "{$decoded_request['Type_of_Enquiry']} von {$request_data['sender_name']}";
    $request_data['message'] = "<html>Absender: {$decoded_request['Email']} <br><br> Nachricht: <br> {$decoded_request['Message']}</html>";

	if ( $decoded_request['Type_of_Enquiry'] === 'Ankaufanfrage' ) {
		$device_info = "Hersteller: {$decoded_request['manufacturer']} <br>Modell: {$decoded_request['modell']}<br><br>";
		$request_data['message'] = substr_replace($request_data['message'], $device_info, 6, 0);
	}
	
	// possibly get attachment
	$request_data['attachment'] = get_request_attachment();
		
	return $request_data;
}


/**
 * Gets request attachment
 * 
 * @return string path to uploaded file
 *
 * @since 1.0.0
 */
function get_request_attachment() {
    if ( ! isset( $_FILES['file'] ) ) {
        return array();
    }

	$file_is_pdf = verify_file_type();
	$file_size_is_ok = verify_file_size();

	// verify mime type
	if ( ! ( $file_is_pdf && $file_size_is_ok ) ) {
		wp_send_json_error( 'Es muss eine .pdf Datei (<2MB) hochgeladen werden.' );
		wp_die();
	}

	// create safe file name from binary content
	$filename = sha1_file( $_FILES['file']['tmp_name'] );

	$upload_dir = wp_upload_dir()['path'];
	$filepath = "$upload_dir/$filename.pdf";

	if ( ! move_uploaded_file( $_FILES['file']['tmp_name'], $filepath ) ) {
		return array();
	}

	return $filepath;
}


/**
 * Verifies the mime type of file
 * 
 * @return bool true if pdf, else false
 *
 * @since 1.0.0
 */
function verify_file_type() {
	if ( ! empty( $_FILES ) && $_FILES['file']['error'] == UPLOAD_ERR_OK ) {
		$type = mime_content_type( $_FILES['file']['tmp_name'] );		

		if ( ! $type === 'application/pdf' ) {
			return false;
		}
	}
	return true;
}


/**
 * Verifies the file size is smaller than 2MB.
 * 
 * @return bool true, if ok, else false
 *
 * @since 1.0.0
 */
function verify_file_size() {
	if ( filesize( $_FILES['file']['tmp_name'] ) <= 2000000 ) {
		return true;
	}
	return false;
}


/**
 * Send message with request to admin
 * 
 * @param array $request_data decoded request content
 * 
 * @return bool true, if mail sent sucessful, else false
 *
 * @since 1.0.0
 */
function forward_request_by_mail( $request_data ) {
	$admin_email = get_option('admin_email');	

	switch ( $request_data['type'] ) {
		case 'Kontaktanfrage':
			$recipient = carbon_get_theme_option('contact_email');
			break;
		case 'Bewerbung':
			$recipient = carbon_get_theme_option('application_email');
			break;
		case 'Ankaufanfrage':
			$recipient = carbon_get_theme_option('sell_email');
			break;
		default:
			$recipient = get_option('admin_email');
			break;
	}

	$headers = array(
        'Content-Type: text/html; charset=UTF-8',
        "From: Smartphoniker Kontaktformular <$admin_email>",
        "Reply-to: {$request_data['sender_name']} <{$request_data['sender_email']}>",
    );

	return wp_mail(
		$recipient,
		$request_data['subject'],
		$request_data['message'],
		$headers,
		$request_data['attachment'],
	);
}


/**
 * Deletes the uploaded file
 * 
 * @param string $path_to_attachment path to file
 * 
 * @since 1.0.0
 */
function delete_uploaded_file( $path_to_attachment ) {
	$file_path = realpath( $path_to_attachment );
	if ( is_writable( $file_path ) ) {
		unlink( $file_path );
	}
}
