<?php 
/**
 * Template-Part: Block-5
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<div class="section__content section__content--large section__content--space block-5">

    <?php foreach( (array) $args['images'] as $image ): ?>

        <picture>
            <?php echo wp_get_attachment_image( $image, '', false, array( 'class' => 'block-5__img' ) ); ?>
        </picture>

    <?php endforeach; ?>

</div>