<?php
/**
 * Custom Block: Grid-4
 * 
 * Gutenberg block which represents a 4-column grid containing
 * all of smartphonikers employees with a round image, name and role.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block employees
 *
 * @since 1.0.0
 */
(function() {
    $employees = call_user_func( 'get_all_posts', 'employee' );

    Block::make( __( 'Employees' ) )
        ->set_description( __( 'Ein 4-spaltiges Layout, dass alle Mitarbeiter:innen sortiert nach Gruppen und Alphabetisch mit Foto, Name und Rolle darstellt.') )
        ->set_category( 'widgets', __( 'Vorausgefüllte Blocks' ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'businessperson' )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Employees' ) ),
            Field::make( 'set', 'employees', __( 'Mitarbeiter:innen auswählen' ))
                ->set_options( $employees ),
            Field::make( 'checkbox', 'show_application_link', __( 'Call-To-Action: Jetzt bewerben anzeigen' ) )
                ->set_help_text( 'Dieser Block stellt ein 4-spaltiges Grid aus allen Mitarbeiter:innen von Smartphoniker dar.' )
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            $employees = array();

            foreach ( $fields['employees'] as $employee => $employee_id ) {
                $employees[$employee_id] = get_post_meta( $employee_id );
                $employees[$employee_id]['id'] = $employee_id;
                $employees[$employee_id]['name'] = get_the_title( $employee_id );
            }

            // sort by group and then by name
            uasort( $employees, function($a, $b) {
                if( $a['_group'][0] === $b['_group'][0] ) {
                    if ( $a['name'] > $b['name'] ) {
                        return 1;
                    }
                }
                return $a['_group'][0] > $b['_group'][0] ? 1 : -1;
            });

            $fields['employees'] = $employees;

            get_template_part( 'template-parts/component', 'employees', $fields );
        } );
})();