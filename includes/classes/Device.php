<?php
/**
 * Device class.
 * 
 * @package Smartphoniker
 * @since 1.1.5
 */

/**
 * Device class.
 * 
 * @since 1.1.5
 */
class Device
{
    /**
     * Manufacturer name
     *
     * @var string
     */
    private $manufacturer;

    /**
     * Modell name.
     *
     * @var string
     */
    private $modell;

    /**
     * Unlock code of the device
     *
     * @var string
     */
    private $code;

    /**
     * Create Device instance.
     *
     * @param string $manufacturer Manufacturer name.
     * @param string $modell Modell name.
     * @param string $code Unlock Code/Pin
     *
     * @since 1.1.5
     */
    public function __construct( string $manufacturer, string $modell, string $code )
    {
        $this->manufacturer = $manufacturer;
        $this->modell = $modell;
        $this->code = $code;
    }

    /**
     * Return the full device data.
     *
     * @return string
     * 
     * @since 1.1.5
     */
    public function __toString() {
        return $this->manufacturer . ' ' . $this->modell . ' - Code: ' . $this->code;
    }

    /**
     * Return name of the device
     *
     * @return string
     * 
     * @since 1.1.5
     */
    public function get_device_name() {
        return $this->manufacturer . ' ' . $this->modell;
    }
}