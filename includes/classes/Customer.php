<?php
/**
 * Customer Class
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */

/**
 * Customer Class
 * 
 * @since 1.1.5
 */
class Customer
{
    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var PostalAddress
     */
    private $address;

    /**
     * @var string
     */
    private $email;

    /**
     * Create Customer
     *
     * @param string $first_name First name of customer.
     * @param string $last_name Last name of customer.
     * @param PostalAddress $address Address of customer.
     * @param string $email Email of customer.
     *
     * @since 1.1.5
     */
    public function __construct( string $first_name, string $last_name, PostalAddress $address, string $email )
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->address = $address;
        $this->email = $email;
    }

    /**
     * Get email of customer
     *
     * @return string
     * 
     * @since 1.1.5
     */
    public function get_email() {
        return $this->email;
    }

    /**
     * Get postal address of customer.
     *
     * @return string
     * 
     * @since 1.1.5
     */
    public function get_postal_address() {
        return (string) $this->address;
    }

    /**
     * Return full name of customer.
     *
     * @return string
     * 
     * @since 1.1.5
     */
    public function __toString() {
        return $this->first_name . " " . $this->last_name;
    }
}