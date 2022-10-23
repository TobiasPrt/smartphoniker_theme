<?php
/**
 * Post Meta: Device
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Creates post meta for device post type.
 * 
 * @since 1.0.0
 * @since 1.1.0 added bestseller and image option
 * @since 1.2.0 added single repairs to devices
 */
(function() {
    Container::make( 'post_meta', _( 'Geräte Einstellungen' ) )
        ->where( 'post_type', '=', 'device' )
        ->set_context( 'normal' )
        ->add_fields( array(
            Field::make( 'checkbox', 'is_bestseller', __( 'Gerät ist ein Top-Modell für die Darstellung in anderen Blocks.' ) )
                ->set_option_value( 'yes' ),
            Field::make( 'image', 'device_image', __( 'Geräte-Bild' ) )
                ->set_conditional_logic( array(
                    array(
                        'field' => 'is_bestseller',
                        'value' => true
                    )
                ))
                ->set_required( true ),
            Field::make( 'text', 'link', __( 'Link zum Smartphoniker Shop' ) )
                ->set_required( true ),
            # Adding repair options to this device.
            Field::make( 'complex', 'repairs', __( 'Angebotene Reparaturen' ) )
                ->setup_labels( array(
                    'plural_name' => 'Reparaturen',
                    'singular_name' => 'Reparatur',
                ) )
                ->add_fields( array(
                    # The available repairs.
                    Field::make( 'select', 'repair', __( 'Reparaturbezeichnung' ) )
                        ->add_options( array(
                            'screen' => __( 'Displayreparatur' ),
                            'battery' => __( 'Akkutausch' ),
                            'backcover' => __( 'Backcover-Reparatur' ),
                            'charging_connector' => __( 'Ladebuchsen-Reparatur' ),
                            'glass' => __( 'Displayglas-Reparatur' ),
                            'frame' => __( 'Geräterahmen-Reparatur' ),
                            'data' => __( 'Datenrettung' ),
                            'water' => __( 'Wasserschadenreinigung' ),
                        ) ),
                    # The cost of the repair
                    Field::make( 'text', 'cost', __( 'Preis in Euro' ) )
                        ->set_attribute( 'placeholder', 'z.B. 99,00' )
                        ->set_attribute( 'type', 'number' ),
                    # The time it takes to complete the repair.
                    Field::make( 'select', 'duration', __( 'Reparaturdauer' ) )
                        ->add_options( array(
                            1 => '30min',
                            2 => '90min',
                            3 => '1 Tag',
                            4 => '2-3 Tage',
                            5 => '1 Woche',
                        ) ),
                    # Options whether this repair is part of some promotion or discount.
                    Field::make( 'select', 'state', __( 'Aktion' ) )
                        ->add_options( array(
                            'none' => __( 'keine besondere Aktion' ),
                            'discount' => __( 'Angebot' ),
                            'promotion' => __( 'Aktion' ),
                        ) ),
                ) )
    ) );
})();