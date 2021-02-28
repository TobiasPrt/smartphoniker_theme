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
    Block::make( __( 'Employees' ) )
        ->add_fields( array(
             Field::make( 'checkbox', 'show_application_link', __( 'Call-To-Action: Jetzt bewerben anzeigen' ) )
                ->set_help_text( 'Dieser Block stellt ein 4-spaltiges Grid aus allen Mitarbeiter:innen von Smartphoniker dar.' )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'employees', $fields );
        } );
})();