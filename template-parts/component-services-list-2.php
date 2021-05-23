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
    <?php foreach ( (array) $args['services'] as $service ): ?>

        <div class="columns-2__column">
                <?php echo wp_get_attachment_image( get_post_meta( intval( $service['service_id'] ), '_icon' )[0], 'thumbnail', false, array( 'class' => 'columns-2__icon' ) ); ?>
                <div class="columns-2__contentwrapper">
                    <a class="columns-2__heading columns-2__heading--link" href="<?php echo get_permalink( $service['service_id'] ); ?>">
                            <?php echo get_post_field( 'post_title', intval( $service['service_id'] ) ); ?>
                    </a>
                    <p class="columns-2__text">
                        <?php echo get_post_meta( intval( $service['service_id'] ), '_description' )[0]; ?>
                    </p>
                </div>
            </div>

    <?php endforeach; ?>
   
</div>