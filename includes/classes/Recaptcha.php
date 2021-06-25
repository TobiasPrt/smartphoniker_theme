<?php
/**
 * Wrapper around Google reCAPTCHA v3
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */


/**
 * Recaptcha Class
 * 
 * @since 1.1.5
 */
class Recaptcha
{
    /**
     * Google reCAPTCHA endpoint url.
     *
     * @var string
     */
    private const RECAPTCHA_ENDPOINT = 'https://www.google.com/recaptcha/api/siteverify';
    
    /**
     * Google reCAPTCHA secret.
     *
     * @var string
     */
    private const SECRET = RECAPTCHA_SECRET;
    
    /**
     * Google reCAPTCHA token.
     *
     * @var string
     */
    private $token;

    /**
     * Create Recaptcha instance
     *
     * @param string $token reCAPTCHA token
     *
     * @since 1.1.5
     */
    public function __construct( string $token )
    {
        $this->token = $token;
    }

    /**
     * Verify reCAPTCHA data.
     *
     * @return bool Whether the test passes the requirements of being a human.
     * 
     * @since 1.1.5
     */
    public function verify() {
        $request = new Request( self::RECAPTCHA_ENDPOINT, $this->get_payload() );
        $response = $request->post();
        return $response->success && $response->score >= 0.5;
    }

    /**
     * Get payload for verification request.
     *
     * @return array<string>
     * 
     * @since 1.1.5
     */
    public function get_payload() {
        return array(
            'secret' => self::SECRET,
            'response' => $this->token,
        );
    }
}