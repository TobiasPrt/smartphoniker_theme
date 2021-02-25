<?php
/**
 * Add theme options for landing page.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Adds container with theme options for landing page
 * as a submenu of the top-level theme options container.
 *
 * @since 1.0.0
 * 
 * @param Carbon_Fields\Container\Theme_Options_Container $parent top-level theme options container
 */
function theme_option_home( Carbon_Fields\Container\Theme_Options_Container $parent ) {
    Container::make( 'theme_options', __( 'Startseite Einstellungen' ) )
        ->set_page_parent( $parent )
        ->add_fields( array(
            Field::make( 'html', 'startseite_description', __( 'Startseite Beschreibung' ) )
                ->set_html( 'Hier sind ein paar den ersten Abschnitt der Startseite betreffende Einstellungen. Die Inhalte darunter und auf allen anderen Seiten lassen sich im Block-Editor bearbeiten.' ),
            Field::make( 'checkbox', 'banner_is_enabled', __( 'Banner anzeigen?' ) ),
            Field::make( 'radio', 'banner_type', 'Welches Banner soll verwendet werden?' )
                ->set_options( array(
                    'whatsapp-orange' => __( 'WhatsApp (orange)' ),
                    'custom' => __( 'Eigener Text' ),
                ) )
                ->set_conditional_logic( array(
                    array(
                        'field' => 'banner_is_enabled',
                        'value' => true,
                    )
                ) ),
            Field::make( 'html', 'banner_image_whatsapp-orange', __( 'banner_image_whatsapp-orange' ) )
                ->set_html( '<img src="' . get_template_directory_uri() . '/assets/theme_options/banner_whatsapp-orange.jpg" style="max-width: 100%">' )
                ->set_conditional_logic( array(
                    array(
                        'field' => 'banner_is_enabled',
                        'value' => true,
                    ),
                    array(
                        'field' => 'banner_type',
                        'value' => 'whatsapp-orange'
                    )
                ) ),
            Field::make( 'text', 'banner_text', __( 'Eigener Banner Text' ) )
                ->set_conditional_logic( array(
                    array(
                        'field' => 'banner_is_enabled',
                        'value' => true,
                    ),
                    array(
                        'field' => 'banner_type',
                        'value' => 'custom'
                    )
                ) ),
            Field::make( 'radio', 'banner_color', __( 'Banner Hintergrundfarbe' ) )
                ->set_options( array(
                    'orange' => __( 'Orange' ),
                ) )
                ->set_conditional_logic( array(
                    array(
                        'field' => 'banner_is_enabled',
                        'value' => true,
                    )
                ) ),
            Field::make( 'text ', 'slogan', __( 'Slogan' ) )
                ->set_help_text( 'Slogan auf der Startseite' )
                ->set_required( true ),
            Field::make( 'textarea', 'slogan_subtitle', __( 'Slogan Untertitel' ) )
                ->set_help_text( 'Text unter dem Slogan, der auf Handys angezeigt wird.' )
                ->set_required( true ),
            Field::make( 'textarea', 'slogan_subtitle_extension', __( 'Verlängerung Slogan Untertitel' ) )
                ->set_help_text( 'Text unter dem Slogan, der auf Geräten mit breiten Displays an den Untertitel angehängt wird' )
                ->set_required( true ),
            Field::make( 'media_gallery', 'partner_logos', __( 'Logos von Partnern (Bitte genau 5 wählen)' ) )
                ->set_duplicates_allowed( false )
                ->set_required( true ),
        ) );
}