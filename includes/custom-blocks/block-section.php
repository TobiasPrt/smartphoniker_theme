<?php
/**
 * Custom Block: Section
 * 
 * Gutenberg Block which represents a section within a page.
 * Contains a heading as well as any number of inner blocks.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block section
 * 
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Section' ) )
        ->add_fields(
            array(
                Field::make( 'text', 'heading', __( 'Section Heading' ) ),
            )
        )
        ->set_inner_blocks( true )
        ->set_inner_blocks_position( 'below' )
        // Disable preview mode as long as there is not a custom editor stylesheet.
        ->set_mode( 'edit' )
        // Only the blocks that have this block as a parent can be inserted.
        ->set_allowed_inner_blocks( array() )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            ?>
                <section class="content__section section">
                    <h2 class="section__heading"><?php echo esc_html( $fields['heading'] ); ?></h2>
                    <?php echo $inner_blocks; ?>
                </section>
            <?php
        } );
})();