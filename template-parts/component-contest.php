<?php
/**
 * Template-Part: Contest
 * 
 * @package Smartphoniker
 * @since 1.0.5
 */
?>

<div class="section__content contest">

    <?php foreach ( (array) $args['prices'] as $price ): ?>
        <div class="contest__column">
            <h3 class="contest__heading"><?php echo $price['place']; ?></h3>
            <div class="contest__content">
                <div class="contest__card">
                    <?php echo wp_get_attachment_image( 
                    $price['image'], 
                    'thumbnail', 
                    true, 
                    array( 'class' => 'contest__img') );
                    ?>
                    <h4 class="contest__title"><?php echo $price['title']; ?></h4>
                </div>
                <div class="contest__text">
                    <?php echo wpautop( $price['text'] ) ?>
                </div>
                <a class="contest__button button button--white"
                    <?php if ( isset( $price['button_extern']) && $price['button_extern'] != '' ):?>
                        href="<?php echo $price['button_extern']; ?>" 
                    <?php else: ?>
                        href="<?php echo get_permalink( $price['button_link'] ); ?>" 
                    <?php endif; ?>
                    target="<?php echo esc_html( $price['button_target'] ); ?>"
                >
                    <?php echo esc_html( $price['button_text'] ); ?>
                </a>
            </div>
        </div>
    <?php endforeach; ?>

</div>