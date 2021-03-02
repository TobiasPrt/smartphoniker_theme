<?php 
/**
 * Template-Part: List-2
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>


<div class="section__content columns-2">

    <!-- 1 Column per service -->
    <?php foreach ( (array) $args['list'] as $list_item ): ?>

        <div class="columns-2__column">
                <?php echo wp_get_attachment_image( $list_item['icon'], 'thumbnail', false, array( 'class' => 'columns-2__icon' ) ); ?>
                <div class="columns-2__contentwrapper">
                    <h3 class="columns-2__heading">
                        <?php echo $list_item['heading']; ?>
                    </h3>
                    <p class="columns-2__text">
                        <?php echo $list_item['text']; ?>
                    </p>
                </div>
            </div>

    <?php endforeach; ?>
   
</div>