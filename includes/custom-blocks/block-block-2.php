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
(function() {
    Block::make( __( 'Block-2' ) )
        ->add_fields(
            array(
                // Block Color
                Field::make( 'select', 'color', __( 'Block-Hintergrundfarbe' ) )
                    ->set_options( array(
                        'orange' => __( 'Orange' ),
                        'green'  => __( 'Grün' ),
                        'grey'   => __( 'Grau' ),
                        'blue'   => __( 'Dunkelblau' ),
                    ) ),

                // Block component types
                Field::make( 'complex', 'content', __( 'Inhalt wählen' ) )
                    ->set_min( 2 )
                    ->set_max( 2 )
                    ->set_layout( 'tabbed-horizontal' )
                    
                    // Image
                    ->add_fields( 'image', array(
                        Field::make( 'checkbox', 'image_is_small', __( 'Kleines Bild mit Rahmen?' ) ),
                        Field::make( 'image', 'image', __( 'Bild wählen' ) )
                    ) )

                    // Content
                    ->add_fields( 'content', array(
                        Field::make( 'textarea', 'text', __( 'Text' ) ),
                        Field::make( 'set', 'text_options', __( 'Text-Optionen' ) )
                            ->add_options( array(
                                'text_is_large'    => __( 'Text vergrößern' ),
                                'text_is_centered' => __( 'Text zentrieren' )
                            ) ),
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
                        Field::make( 'select', 'button_target', __( 'Art des Links wählen' ) )
                            ->set_conditional_logic( array(
                                array(
                                    'field' => 'button_is_enabled',
                                    'value' => true
                                )
                            ) )
                            ->set_options( array(
                                '_blank' => __( 'Link in neuem Tab/Fenster öffnen' ),
                                '_self' => __( 'Link im aktuellen Tab/Fenster öffnen' ),
                            ) ),
                    ) ),
            )
        )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            ?>
                <div class="section__content section__content--large block-2 block-2--<?php echo esc_html( $fields['color'] ); ?>">
                    
                    <?php foreach ( (array) $fields['content'] as $content ): ?>
                        
                        <!-- Image -->
                        <?php if ( 'image' === $content['_type'] ): ?>
                            <?php 
                            $block_class = 'block-2__block';
                            if ( $content['image_is_small'] ) {
                                $block_class .= ' block-2__block--center';
                            }
                            ?>
                            <div class="<?php echo $block_class; ?>">
                                <picture>
                                    <?php echo wp_get_attachment_image( $content['image'], '', false, array( 'class' => 'block-2__img' ) ); ?>
                                </picture>
                            </div>
                        
                        <!-- Content -->
                        <?php else: ?>
                            <div class="block-2__block block-2__block--center">

                                <!-- Text -->
                                <?php
                                $text_class = 'block-2__text';
                                if ( array_key_exists( 'text_options', $content  ) ) {
                                    if ( in_array( 'text_is_large', $content['text_options'] ) ) {
                                        $text_class .= ' block-2__text--large';
                                    }
                                    if ( in_array( 'text_is_centered', $content['text_options'] ) ) {
                                        $text_class .= ' block-2__text--center';
                                    }
                                }
                                ?>
                                <p class="<?php echo $text_class; ?>">
                                    <?php echo esc_html( $content['text'] ); ?>
                                </p>
                            
                                <!-- Button -->
                                <?php if ( $content['button_is_enabled'] ): ?>
                                    <a 
                                        class="block-2__button button button--<?php echo esc_html( $fields['color'] ); ?>" 
                                        href="<?php echo esc_html( $content['button_link'] ); ?>" 
                                        target="<?php echo esc_html( $content['button_target'] ); ?>"
                                    >
                                        <?php echo esc_html( $content['button_text'] ); ?>
                            
                                    </a>
                                <?php endif; ?>
                            
                            </div>
                        <?php endif; ?>
                        
                    <?php endforeach; ?>

                </div>
		    <?php
        } );
})();