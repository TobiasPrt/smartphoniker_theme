<?php 
/**
 * Template-Part: Services
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


$services = new WP_Query( array(
    'post_type' => 'service',
    'meta_query' => array(
        'group' => array(
            'key' => 'group',
            'value' => 'widget'
        ),
    ),
) );
?>


<div class="section__content columns-2">

    <!-- columns of services -->
    <?php if ($services->have_posts() ) : ?>

            <?php while ( $services->have_posts() ) : $services->the_post(); ?>
                
                <div class="columns-2__column">
                    <?php echo wp_get_attachment_image( get_post_meta( get_the_ID(), '_icon' )[0], 'thumbnail', false, array( 'class' => 'columns-2__icon' ) ); ?>
                    <div class="columns-2__contentwrapper">
                        <h3 class="columns-2__heading">
                            <?php the_title(); ?>
                        </h3>
                        <p class="columns-2__text">
                            <?php echo get_post_meta( get_the_ID(), '_description' )[0]; ?>
                        </p>
                    </div>
                </div>
            
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

    <?php endif; ?>

    
</div>