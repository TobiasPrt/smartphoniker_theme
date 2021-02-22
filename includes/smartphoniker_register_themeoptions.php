<?php
/**
 * Register containers for theme options.
 *
 * @package Smartphoniker
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function smartphoniker_register_themeoptions()
{
    /**
     * General theme settings.
     */
    $theme_settings = Container::make('theme_options', __('Allgemeine Theme Einstellungen'))
        ->add_fields(array(
            Field::make('html', 'footer_description', __('Footer Beschreibung'))
                ->set_html('Hier lassen sich alle inhaltlichen Einstellungen, die alle Seiten betreffen einstellen. Die Einstellungen für die Startseite sind auf einer extra Seite. Die Elemente aus den Navigation befinden sich unter Design > Menüs.'),
            Field::make('text', 'phone_number', __('Telefonnummer'))
                ->set_attribute('placeholder', 'z.B. 4943190700390'),
            Field::make('text', 'phone_number_show', __('Telefonnummer für Besucher:innen'))
                ->set_attribute('placeholder', 'z.B. 0431 90 700 39-0'),
            Field::make('media_gallery', 'payment_methods', __('Zahlungsmethoden (Bitte genau 7 wählen)'))
                ->set_duplicates_allowed(false),
            Field::make('text', 'about', __('Über Uns Text'))
                ->set_attribute('maxLength', 80),
            Field::make('text', 'email', __('E-Mail Adresse'))
                ->set_attribute('placeholder', 'z.B. support@smartphoniker.de'),
            Field::make('text', 'facebook_link', __('Facebook Link')),
            Field::make('text', 'instagram_link', __('Instagram Link'))
        ));

    /**
     * Theme settings specifically for the landing page.
     */
    Container::make('theme_options', __('Startseite Einstellungen'))
        ->set_page_parent($theme_settings)
        ->add_fields(array(
            Field::make('html', 'startseite_description', __('Startseite Beschreibung'))
                ->set_html('Hier sind ein paar den ersten Abschnitt der Startseite betreffende Einstellungen. Die Inhalte darunter und auf allen anderen Seiten lassen sich im Block-Editor bearbeiten.'),
            Field::make('checkbox', 'banner_is_enabled', __('Banner anzeigen?')),
            Field::make('radio', 'banner_type', 'Welches Banner soll verwendet werden?')
                ->set_options(array(
                    'whatsapp-orange' => __('WhatsApp (orange)'),
                    'custom' => __('Eigener Text'),
                ))
                ->set_conditional_logic(array(
                    array(
                        'field' => 'banner_is_enabled',
                        'value' => true,
                    )
                )),
            Field::make('html', 'banner_image_whatsapp-orange', __('banner_image_whatsapp-orange'))
                ->set_html('<img src="'.get_template_directory_uri().'/assets/theme_options/banner_whatsapp-orange.jpg" style="max-width: 100%">')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'banner_is_enabled',
                        'value' => true,
                    ),
                    array(
                        'field' => 'banner_type',
                        'value' => 'whatsapp-orange'
                    )
                )),
            Field::make('text', 'banner_text', __('Eigener Banner Text'))
                ->set_conditional_logic(array(
                    array(
                        'field' => 'banner_is_enabled',
                        'value' => true,
                    ),
                    array(
                        'field' => 'banner_type',
                        'value' => 'custom'
                    )
                )),
            Field::make('radio', 'banner_color', __('Banner Farbe'))
                ->set_options(array(
                    'orange' => __('Orange'),
                ))
                ->set_conditional_logic(array(
                    array(
                        'field' => 'banner_is_enabled',
                        'value' => true,
                    )
                )),
            Field::make('text ', 'slogan', __('Slogan'))
                ->set_attribute('placeholder', 'Slogan auf der Startseite'),
            Field::make('textarea', 'slogan_subtitle_short', __('Slogan Untertitel'))
                ->set_attribute('placeholder', 'Text unter dem Slogan, der auf Handys angezeigt wird.'),
            Field::make('textarea', 'slogan_subtitle_long', __('Verlängerung Slogan Untertitel'))
                ->set_attribute('placeholder', 'Text unter dem Slogan, der auf Geräten mit breiten Displays an den Untertitel angehängt wird'),
            Field::make('media_gallery', 'partner_logos', __('Logos von Partnern (Bitte genau 5 wählen)'))
                ->set_duplicates_allowed(false)
        ));
}
