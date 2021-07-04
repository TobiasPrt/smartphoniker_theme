<?php 
/**
 * Template-Part: Block-List
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<ul class="section__content block-list <?php if ( in_array( 'columnlayout', $args['list_options'] ) ) echo "block-list--columnlayout" ?>">

    <?php $i = 1; foreach ( (array) $args['list_items'] as $list_item ): ?>
        
        <!-- List-item -->
        <li class="block-list__item">
            <!-- Icon -->
            <?php if ( in_array( 'numbers', $args['list_options'] ) ): ?>
                <h2 class="block-list__image block-list__image--number"><?php echo $i; ?>.</h2>
            <?php else: ?>
                <?php echo wp_get_attachment_image( $list_item['icon'], '', false, array( 'class' => 'block-list__image' ) ); ?>
            <?php endif; ?>
                <!-- Text -->
            <p class="block-list__text"><?php echo $list_item['text']; ?></p>
        </li>
    
    <?php $i++; endforeach; ?>

</ul>