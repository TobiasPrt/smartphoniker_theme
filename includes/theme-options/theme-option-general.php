<?php
/**
 * Add general theme options.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Adds container with general theme options.
 * 
 * @since 1.0.0
 *
 * @return Carbon_Fields\Container\Theme_Options_Container top-level theme options container
 */
function theme_option_general(): Carbon_Fields\Container\Theme_Options_Container {
    return Container::make( 'theme_options', __( 'Allgemeine Theme Einstellungen' ) )
        ->add_fields( array(
            Field::make( 'html', 'footer_description', __( 'Footer Beschreibung' ) )
                ->set_html( 'Hier lassen sich alle inhaltlichen Einstellungen, die alle Seiten betreffen einstellen. Die Einstellungen für die Startseite sind auf einer extra Seite. Die Elemente aus den Navigation befinden sich unter Design > Menüs.' ),
            Field::make( 'text', 'phone_number', __( 'Telefonnummer' ) )
                ->set_attribute( 'placeholder', 'z.B. 4943190700390' )
                ->set_attribute( 'type', 'tel')
                ->set_attribute( 'pattern', '^[0-9]*$' )
                ->set_help_text( 'Nur Zahlen sind erlaubt.' )
                ->set_required( true ),
            Field::make( 'text', 'phone_number_show', __( 'Telefonnummer für Besucher:innen' ) )
                ->set_attribute( 'placeholder', 'z.B. 0431 90 700 39-0' )
                ->set_attribute( 'type', 'tel' )
                ->set_attribute( 'pattern', '^[0-9-+\s()]*$' )
                ->set_help_text( 'Nur Zahlen, -, +, () und Leerzeichen sind erlaubt.' )
                ->set_required( true ),
            Field::make( 'media_gallery', 'payment_methods', __( 'Zahlungsmethoden (Bitte genau 7 wählen)' ) )
                ->set_duplicates_allowed( false )
                ->set_required( true ),
            Field::make( 'text', 'about', __( 'Über Uns Text' ) )
                ->set_attribute( 'maxLength', 80 )
                ->set_required( true ),
            Field::make( 'text', 'email', __( 'E-Mail Adresse' ) )
                ->set_attribute( 'placeholder', 'z.B. support@smartphoniker.de' )
                ->set_attribute( 'type', 'email' )
                ->set_required( true ),
            Field::make( 'text', 'facebook_link', __( 'Facebook Link' ) )
                ->set_attribute( 'type', 'url' )
                ->set_required( true ),
            Field::make( 'text', 'instagram_link', __( 'Instagram Link' ) )
                ->set_attribute( 'type', 'url' )
                ->set_required( true ),
        ) );
}