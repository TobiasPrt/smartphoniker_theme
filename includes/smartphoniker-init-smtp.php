<?php
/**
 * Initializing smtp configuration
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'phpmailer_init', 'smartphoniker_init_phpmailer' );


/**
 * Inits php mailer to send mails via smtp
 * 
 * @since 1.0.0
 */
function smartphoniker_init_phpmailer( $phpmailer ) {
	$phpmailer->isSMTP();
	$phpmailer->Host       = SMTP_HOST;
	$phpmailer->SMTPAuth   = SMTP_AUTH;
	$phpmailer->Port       = SMTP_PORT;
	$phpmailer->Username   = SMTP_USER;
	$phpmailer->Password   = SMTP_PASS;
	$phpmailer->SMTPSecure = SMTP_SECURE;
	$phpmailer->From       = SMTP_FROM;
	$phpmailer->FromName   = SMTP_NAME;
}