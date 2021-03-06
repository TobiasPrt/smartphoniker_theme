<?php 
/**
 * Template-Part: Block-List
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<ul class="section__content block-list">

    <?php foreach ( (array) $args['list_items'] as $list_item ): ?>
        
        <!-- List-item -->
        <li class="block-list__item">
            <!-- Icon -->
            <?php echo wp_get_attachment_image( $list_item['icon'], '', false, array( 'class' => 'block-list__image' ) ); ?>
            <!-- Text -->
            <p class="block-list__text"><?php echo $list_item['text']; ?></p>
        </li>
    
    <?php endforeach; ?>

</ul>