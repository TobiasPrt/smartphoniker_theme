<?php
/**
 * Custom Block: Columns-3
 * 
 * Gutenberg block which represents a modular 3 column layout.
 * This block is only allowed within a section block.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block col3
 *
 * @since 1.0.0
 */
function block_col3() {
    Block::make( __( 'Col-3' ) )
        ->add_fields(
            array(
                // Column Options
                Field::make( 'set', 'column_options', __( 'Spaltenoptionen' ) )
                    ->set_options( array(
                        'text_is_left_aligned' => __( 'Text linksbündig ausrichten' ),
                        'has_orange_accent' => __( 'Orange Überschrift / Untertitel' ),
                        'icon_is_small' => __( 'Flache Icons verwenden für z.B. Sterne-Bewertung' ),
                    ) ),

                // Column Types
                Field::make( 'complex', 'columns', __( 'Spalten (3)' ) )
                    ->set_min( 3 )
                    ->set_max( 3 )
                    ->set_layout( 'tabbed-horizontal' )
                    
                    // Icon - Heading - Text
                    ->add_fields( 'icon-heading-text',array(
                        Field::make( 'image', 'icon', __( 'Icon wählen' ) )
                            ->set_required ( true ),
                        Field::make( 'text', 'heading', __( 'Überschrift' ) )
                            ->set_required( true ),
                        Field::make( 'textarea', 'text', __( 'Text' ) )
                            ->set_required( true ),
                    ) )

                    // Smallicon - Text - Subtitle
                    ->add_fields( 'icon-text-subtitle', array(
                        Field::make( 'image', 'icon', __( 'Icon wählen') )
                            ->set_required ( true ),
                        Field::make( 'textarea', 'text', __( 'Text' ) )
                            ->set_required( true ),
                        Field::make( 'text', 'column_subtitle', __( 'Untertitel' ) )
                            ->set_required( true ),
                    ) )

                    // Heading - Text
                    ->add_fields( 'heading-text',array(
                        Field::make( 'text', 'heading', __( 'Überschrift' ) )
                            ->set_required( true ),
                        Field::make( 'textarea', 'text', __( 'Text' ) )
                            ->set_required( true ),
                    ) )
            )
        )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            ?>
                <div class="section__content columns-3">

                    <?php foreach ( $fields['columns'] as $column ): ?>
                        
                        <div class="columns-3__column">

                            <!-- Icon -->
                            <?php 
                            if ( array_key_exists( 'icon', $column ) ) {
                                $icon_class = 'columns-3__icon';

                                if ( array_key_exists( 'icon_is_small', $fields['column_options'] ) ) {
                                    $icon_class .= ' columns-3__icon--small';
                                }

                                echo wp_get_attachment_image( 
                                    $column['icon'], 
                                    'thumbnail', 
                                    true, 
                                    array( 'class' => $icon_class) );
                            }
                            ?>


                            <!-- Heading -->
                            <?php 
                            if ( array_key_exists( 'heading', $column ) ) {
                                $heading_class = 'columns-3__heading';

                                if (array_key_exists( 'text_is_left_aligned', $fields['column_options'] ) ) {
                                    $heading_class .= ' columns-3__heading--left';
                                }

                                if (array_key_exists( 'has_orange_accent', $fields['column_options'] ) ) {
                                    $heading_class .= ' columns-3__heading--altcolor';
                                }
                                
                                echo '<h3 class="' . $heading_class . '">' . $column['heading'] . '</h3>';
                            }
                            ?>


                            <!-- Text -->
                            <?php
                            $text_class = 'columns-3__text';
                            
                            if ( array_key_exists( 'text_is_left_aligned', $fields['column_options'] ) ) {
                                $text_class .= ' columns-3__text--left';
                            }

                            echo '<p class="' . $text_class . '">' . $column['text'] . '</p>';
                            ?>


                            <!-- Subtitle -->
                            <?php if ( array_key_exists( 'subtitle', $column ) ): ?>
                                <p class="columns-3__subtitle">
                                    <?php echo $column['subtitle']; ?>
                                </p>
                            <?php endif; ?>

                        </div>

                    <?php endforeach; ?>

                </div>
		    <?php
        } );
}