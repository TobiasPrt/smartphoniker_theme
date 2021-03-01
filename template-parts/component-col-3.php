<?php 
/**
 * Template-Part: Col-3
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<div class="section__content columns-3">

    <?php foreach ( (array) $args['columns'] as $column ): ?>
        
        <div class="columns-3__column">

            <!-- Icon -->
            <?php 
            if ( array_key_exists( 'icon', $column ) ) {
                $icon_class = 'columns-3__icon';

                if ( in_array( 'icon_is_small', $args['column_options'] ) ) {
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

                if ( in_array( 'text_is_left_aligned', $args['column_options'] ) ) {
                    $heading_class .= ' columns-3__heading--left';
                }

                if ( in_array( 'has_orange_accent', $args['column_options'] ) ) {
                    $heading_class .= ' columns-3__heading--altcolor';
                }
                
                echo '<h3 class="' . $heading_class . '">' . $column['heading'] . '</h3>';
            }
            ?>


            <!-- Text -->
            <?php
            $text_class = 'columns-3__text';
            
            if ( in_array( 'text_is_left_aligned', $args['column_options'] ) ) {
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