<?php
/**
 * Custom Block: Columns-1
 * 
 * Gutenberg block which represents a single column text.
 * This block is only allowed within a section block.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block col1
 *
 * @since 1.0.0
 */
function block_col1() {
    Block::make( __( 'Col-1' ) )
        ->add_fields(
            array(
                Field::make( 'textarea', 'text', __( 'Text' ) )
            )
        )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            ?>
                <div class="section__content section__content--small columns-1">
                    <p class="columns-1__text">
                        <?php echo esc_html( $fields['text'] ); ?>
                    </p>
                </div>
		    <?php
        } );
}