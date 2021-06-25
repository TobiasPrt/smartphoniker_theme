<?php
/**
 * Mailer Class
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */


/**
 * Mailer Class
 * 
 * @since 1.1.5
 */
class Mailer
{
    /**
     * Recipient of the email.
     *
     * @var string
     */
    private $recipient;
    
    /**
     * Content-Type & Charset header part.
     *
     * @var string
     */
    private $content_type = 'Content-Type: text/html; charset=UTF-8';
    
    /**
     * Headers of email.
     *
     * @var array<string>
     */
    private $headers;

    /**
     * Message of the email.
     *
     * @var string
     */
    private $message;

    /**
     * Subject line of email.
     *
     * @var string
     */
    private $subject;

    /**
     * Create Mailer instance
     *
     * @param Inquiry $inquiry Inquiry of customer. 
     *
     * @since 1.1.5
     */
    public function __construct( Inquiry $inquiry ) {
        $this->recipient = get_option( 'admin_email' );
        $this->message = $inquiry->get_message();
        $this->headers = array(
            $this->content_type,
            "From: Smartphoniker Kontaktformular <{$this->recipient}>",
            "Reply-to: {$inquiry->customer} <{$inquiry->customer->get_email()}>"
        );
        $this->subject = "{$inquiry->get_type()}: {$inquiry->customer} - {$inquiry->customer->get_email()}";
        $this->inquiry = $inquiry;
    }

    /**
     * Set content-type of email.
     *
     * @param string $content_type Text/Plains, Text/HTML, ...
     *
     * @since 1.1.5
     */
    public function set_content_type( string $content_type ) {
        $this->content_type = "Content-Type: $content_type; charset=UTF-8";
        $this->headers[0] = $this->content_type;
    }

    /**
     * Body of the email
     *
     * This is a small html-template wrapped around some basic properties of the
     * inquiry or customer, to give some structure to the email.
     * 
     * @return string
     * 
     * @since 1.1.5
     */
    private function email_body() {
        return "<html><b>Absender:</b> <br> {$this->inquiry->customer} <br>
            {$this->inquiry->customer->get_postal_address()} <br> 
            {$this->inquiry->customer->get_email()}<br><br>
            <b>Gerät:</b> {$this->inquiry->device}<br><br>
            <b>Nachricht:</b> <br> {$this->message}</html>";
    }

    /**
     * Send email.
     *
     * @return bool Whether the email was send succesful or not.
     * 
     * @since 1.1.5
     */
    public function send() {
        return wp_mail(
            $this->inquiry->get_responsible(),
            $this->subject,
            $this->email_body(),
            $this->headers
        );
    }
}