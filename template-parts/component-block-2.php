<?php 
/**
 * Template-Part: Block-2
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<div class="section__content section__content--large block-2 block-2--<?php echo esc_html( $args['color'] ); ?>">
                    
    <?php foreach ( (array) $args['content'] as $content ): ?>
        
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
                        class="block-2__button button button--<?php echo esc_html( $args['color'] ); ?>" 
                        href="<?php echo get_permalink( $content['button_link'] ); ?>" 
                        target="<?php echo esc_html( $content['button_target'] ); ?>"
                    >
                        <?php echo esc_html( $content['button_text'] ); ?>
            
                    </a>
                <?php endif; ?>
            
            </div>
        <?php endif; ?>
        
    <?php endforeach; ?>

</div>