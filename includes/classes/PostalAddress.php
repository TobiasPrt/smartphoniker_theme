<?php
/**
 * PostalAddress class.
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */

/**
 * PostalAddress class
 * 
 * @since 1.1.5
 */
class PostalAddress
{
    /**
     * Street and number.
     *
     * @var string
     */
    private $street;

    /**
     * Zipcode.
     * 
     * @var int
     */
    private $zipcode;

    /**
     * City.
     *
     * @var string
     */
    private $city;

    /**
     * Create PostalAddress instance
     *
     * @param   string  $street   Street and number
     * @param   string  $zipcode  Zipcode (will be converted to an integer)
     * @param   string  $city     City
     *
     * @since 1.1.5
     */
    public function __construct( string $street, string $zipcode, string $city )
    {
        $this->street = $street;
        $this->zipcode = intval( $zipcode );
        $this->city = $city;
    }

    /**
     * Returns full address in to lines in html.
     *
     * @return string html-formatted
     * 
     * @since 1.1.5
     */
    public function __toString() {
        return $this->street . '<br>' . $this->zipcode . ' ' . $this->city;
    }
}