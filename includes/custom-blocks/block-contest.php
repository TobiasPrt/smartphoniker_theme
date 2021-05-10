<?php
/**
 * Custom Block: Contest
 * 
 * Gutenberg block which represents the top3 rewards of a contest
 * with an image, description and link in a 3-column row.
 * 
 * @package Smartphoniker
 * @since 1.0.5
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

(function() {
    Block::make( __( 'Contest' ) )
        ->set_description( __( 'Stellt 3 Gewinne eines Gewinnspiels mit Bild, Titel, Beschreibung und Link dar.' ) )
        ->set_category( 'widgets', __( 'Vorausgefüllte Blocks' ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'awards' )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Contest' ) ),
            Field::make( 'complex', 'prices', __( 'Preise' ) )
                ->set_min( 3 )
                ->set_max( 3 )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'place', __( 'Platzierungstext z.B. Platz 1' ) )
                        ->set_help_text('Standardreihenfolge ist 1-2-3, wobei Platz 1 auf breiten Bildschirmen in die mitte rückt.')
                        ->set_required( true ),
                    Field::make( 'image', 'image', __( 'Bild' ))
                        ->set_width( 33 )
                        ->set_help_text( 'Bitte eines mit weißem oder transparentem Hintergrund wählen' )
                        ->set_required( true ),
                    Field::make( 'text', 'title', __( 'Titel des Gewinnes.' ) )
                        ->set_width( 66 )
                        ->set_help_text( 'Bitte über die Vorschau testen, dass es in eine Zeile passt, da es sonst nicht gut aussieht.' )
                        ->set_required( true ),
                    Field::make( 'rich_text', 'text', __( 'Beschreibung' ) )
                        ->set_help_text( 'Bitte nur die Listen und normalen Text wählen, keine Überschriften oder andere Sachen.')
                        ->set_required( true ),
                    Field::make( 'text', 'button_text', __( 'Button Text' ) )
                            ->set_width( 50 )
                            ->set_help_text( 'Text der im Button stehen soll (max. 40 Zeichen).' ),
                    Field::make( 'select', 'button_target', __( 'Art des Links wählen' ) )
                        ->set_width( 50 )
                        ->set_options( array(
                            '_blank' => __( 'Link in neuem Tab/Fenster öffnen' ),
                            '_self' => __( 'Link im aktuellen Tab/Fenster öffnen' ),
                        ) ),
                    Field::make( 'select', 'button_link', __( 'Button interner Link' ) )
                        ->set_width( 50 )
                        ->set_options( call_user_func( 'get_all_posts', array( 'page', 'job', 'service', 'store' ) ) )
                        ->set_help_text( 'Seite zu dem der Button führen soll' ),
                    Field::make( 'text', 'button_extern', __( 'Externer Link' ) )
                        ->set_width( 50 )
                        ->set_help_text( 'Feld leer lassen, wenn interner Link verwendet werden soll.' ),
                ) )
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'contest', $fields );
        } );
})();