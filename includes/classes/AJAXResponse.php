<?php
/**
 * AJAX Request class
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */


/**
 * AJAXResponse class
 * 
 * @since 1.1.5
 */
class AJAXResponse
{
    /**
     * Body of the request.
     *
     * @var array
     */
    private $body;

    /**
     * Create AJAXRequest
     *
     * @param array Body of the request.
     *
     * @since 1.1.5
     */
    public function __construct( $body = array() ) {
        $this->body = $body;
    }

    /**
     * Send request.
     *
     * @since 1.1.5
     */
    public function send() {
        wp_send_json_success( $this->body );
    }

    /**
     * Add element to request body.
     *
     * @param array Element to be added to the body.
     *
     * @since 1.1.5
     */
    public function add_to_body( array $array ) {
        $this->body = array_merge( $this->body, $array);
    }
}