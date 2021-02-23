<?php
/**
 * Custom Block: Block-2
 * 
 * Gutenberg block which represents a 2-column block with an image and text.
 * This block is only allowed within a section block.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block block2.
 *
 * @since 1.0.0
 */
function block_block2() {
    Block::make( __( 'Block-2' ) )
        ->add_fields(
            array(
                Field::make( 'select', 'color', __( 'Block-Hintergrundfarbe' ) )
                    ->set_options( array(
                        'orange' => __( 'Orange' ),
                        'green' => __( 'Grün' ),
                        'grey' => __( 'Grau' ),
                        'blue' => __( 'Dunkelblau' ),
                    ) ),
                Field::make( 'complex', 'content', __( 'Inhalt wählen' ) )
                    ->set_min( 2 )
                    ->set_max( 2 )
                    ->add_fields( 'image', array(
                        Field::make( 'image', 'image', __( 'Bild wählen' ) )
                    ) )
                    ->add_fields( 'content', array(
                        Field::make( 'textarea', 'text', __( 'Text' ) ),
                        Field::make( 'checkbox', 'button_is_enabled', __( 'Button anzeigen?' ) ),
                        Field::make( 'text', 'button_text', __( 'Button Text' ) )
                            ->set_help_text( 'Text der im Button stehen soll (max. 40 Zeichen).' )
                            ->set_conditional_logic( array(
                                array(
                                    'field' => 'button_is_enabled',
                                    'value' => true,
                                ),
                            ) ),
                        Field::make( 'text', 'button_link', __( 'Button Link' ) )
                            ->set_help_text( 'Link zu dem der Button führen soll' )
                            ->set_attribute( 'type', 'url' )
                            ->set_conditional_logic( array(
                                array(
                                    'field' => 'button_is_enabled',
                                    'value' => true,
                                ),
                            ) ),
                        Field::make( 'checkbox', 'button_target', __('Link in neuem Tab öffnen?') )
                            ->set_option_value( '_blank' )
                            ->set_help_text( 'Wenn der Haken nicht gesetzt ist, öffnet sich die verlinkte Seite im aktuellen Tab.' ),
                    ) ),
            )
        )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            ?>
                <div class="section__content section__content--large block-2 block-2--<?php echo esc_html( $fields[ 'color' ] ); ?>">
                    
                    <?php foreach ( $fields[ 'content' ] as $content ): ?>
                        <?php if ( 'image' === $content[ '_type' ] ): ?>

                            <div class="block-2__block">
                                <picture>
                                    <?php echo wp_get_attachment_image( $content[ 'image' ], '', false, array( 'class' => 'block-2__img' ) ); ?>
                                </picture>
                            </div>
                        
                        <?php else: ?>
                        
                            <div class="block-2__block block-2__block--center">
                                <p class="block-2__text">
                                    <?php echo esc_html( $content[ 'text' ] ); ?>
                                </p>

                                <?php if ( $content[ 'button_is_enabled' ] ): ?>
                                    <a 
                                        class="block-2__button button button--<?php echo esc_html( $fields[ 'color' ] ); ?>" 
                                        href="<?php echo esc_html( $content[ 'button_link' ] ); ?>" 
                                        target="<?php echo esc_html( $content[ 'button_target' ] ?? '_self' ); ?>"
                                    >
                                        <?php echo esc_html( $content[ 'button_text' ] ); ?>
                                    </a>
                                <?php endif; ?>

                            </div>
                        
                        <?php endif; ?>
                    <?php endforeach; ?>

                </div>
		    <?php
        } );
}