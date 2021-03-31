<?php 
/**
 * Template-Part: Grid-5
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<div class="section__content grid-5">

    <?php foreach ( (array) $args['partners'] as $partner ): ?>

        <div class="grid-5__card">
            <?php echo wp_get_attachment_image( $partner['logo'], 'thumbnail', false, array( 'class' => 'grid-5__img') ); ?>
            <a href="<?php echo $partner['link']; ?>" class="grid-5__subtitle"><?php echo $partner['subtitle']; ?></a>
        </div>

    <?php endforeach; ?>
</div>