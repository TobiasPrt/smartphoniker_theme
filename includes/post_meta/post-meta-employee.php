<?php
/**
 * Post Meta: Pages
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Creates post meta for employee post type.
 * 
 * @since 1.0.0
 */
(function() {
    Container::make( 'post_meta', _( 'Mitarbeiter:in Einstellungen' ) )
        ->where( 'post_type', '=', 'employee' )
        ->set_context( 'normal' )
        ->add_fields( array(
            Field::make( 'text', 'role', __( 'Position' ) )
                ->set_required( true ),
            Field::make( 'image', 'image', __( 'Bild' ) )
                ->set_help_text( 'Für das beste Ergebnis ein quadratisches Bild wählen.' ),
            Field::make( 'select', 'group', __( 'Gruppe wählen' ) )
                ->set_help_text( 'Die Gruppe gibt an, welche Mitarbeiter:innen zuerst dargestellt werden. Innerhalb einer Gruppe wird alphabetisch sortiert. Es müssen nicht alle Gruppen verwendet werden.' )
                ->set_options( array(
                    'group_a' => __( 'Gruppe A' ),
                    'group_b' => __( 'Gruppe B' ),
                    'group_c' => __( 'Gruppe C' ),
                ) ),
    ) );
})();