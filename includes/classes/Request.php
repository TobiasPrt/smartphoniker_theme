<?php
/**
 * Request Class
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */

 /**
  * Request Class
  * 
  * @since 1.1.5
  */
class Request
{
    /**
     * URL-Endpoint to send the request to.
     *
     * @var string
     */
    private $endpoint;

    /**
     * Body of the Request.
     *
     * @var array
     */
    private $payload;

    /**
     * Create Request instance 
     *
     * @param string $endpoint URL-Endpoint to send the request to.
     * @param array $payload Body of the Request.
     *
     * @since 1.1.5
     */
    function __construct( string $endpoint, array $payload ) {
        $this->endpoint = $endpoint;
        $this->payload = $payload;
    }

    /**
     * Send Request via Post method.
     *
     * @return json The json-decoded response of the request.
     * 
     * @since 1.1.5
     */
    function post() {
        // Initialize curl session
        $curl_session = curl_init();

        // Set curl options
        curl_setopt_array( 
            $curl_session, 
            array(
                CURLOPT_URL => $this->endpoint,
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS => $this->payload
            )
        );

        // Send request
        $response = curl_exec( $curl_session );
        
        // Close curl session
        curl_close( $curl_session );

        // Return decoded response
        return json_decode( $response );
    }
}