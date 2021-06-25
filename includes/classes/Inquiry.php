<?php
/**
 * Inquiry class.
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */


/**
 * Inquiry Class
 * 
 * @since 1.1.5
 */
class Inquiry
{
    /**
     * Type of the Inquiry
     *
     * Currently supported: Kontaktanfrage, Bewerbung, Gerät einsenden, Ankaufanfrage
     * @var string
     */
    private $type;

    /**
     * Customer, who made the inquiry.
     *
     * @var Customer
     */
    public $customer;

    /**
     * Device part of the inquiry.
     *
     * @var Device
     */
    public $device;

    /**
     * Message in the inquiry.
     *
     * @var string
     */
    private $message;

    /**
     * The email of the person responsible for this type of inquiry.
     *
     * @var string
     */
    private $responsible;

    /**
     * Create Inquiry instance
     *
     * @param   string    $type      Type of the Inquiry
     * @param   Customer  $customer  Customer, who made the inquiry.
     * @param   Device    $device    Device part of the inquiry.
     * @param   string    $message   Message in the inquiry.
     *
     * @since 1.1.5
     */
    public function __construct( string $type, Customer $customer, Device $device = null, string $message )
    {
        $this->type = $type;
        $this->customer = $customer;
        $this->device = $device;
        $this->message = $message;
        $this->set_responsible();
    }

    /**
     * Get the message.
     * 
     * @return string
     * 
     * @since 1.1.5
     */
    public function get_message() {
        return $this->message;
    }

    /**
     * Get the type.
     *
     * @return string
     * 
     * @since 1.1.5
     */
    public function get_type() {
        return $this->type;
    }

    /**
     * Get the email of the responsible.
     *
     * @return string
     * 
     * @since 1.1.5
     */
    public function get_responsible() {
        return $this->responsible;
    }

    /**
     * Sets the correct responsible for the inquiry.
     *
     * @since 1.1.5
     */
    private function set_responsible() {
        switch ( $this->type ) {
            case 'Bewerbung':
                $this->responsible = carbon_get_theme_option('application_email');
                break;
            case 'Gerät einsenden':
            case 'Ankaufanfrage':
                $this->responsible = carbon_get_theme_option('sell_email');
                break;
            case 'Kontaktanfrage':
            default:
                $this->responsible = carbon_get_theme_option('contact_email');
                break;
        }
    }
}