<?php 
/**
 * Template-Part: Services
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>


<div class="section__content columns-2">

    <!-- 1 Column per service -->
    <?php foreach ( (array) $args['services'] as $service => $service_id ): ?>

        <div class="columns-2__column">
                <?php echo wp_get_attachment_image( get_post_meta( intval( $service_id ), '_icon' )[0], 'thumbnail', false, array( 'class' => 'columns-2__icon' ) ); ?>
                <div class="columns-2__contentwrapper">
                    <h3 class="columns-2__heading">
                        <?php echo get_post_field( 'post_title', intval( $service_id ) ); ?>
                    </h3>
                    <p class="columns-2__text">
                        <?php echo get_post_meta( intval( $service_id ), '_description' )[0]; ?>
                    </p>
                </div>
            </div>

    <?php endforeach; ?>
   
</div>