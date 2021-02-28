<?php 
/**
 * Template-Part: Numbered-List
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<ol class="section__content list">

    <?php foreach ( (array) $args['list_items'] as $list_item ): ?>
        <!-- List-item -->
        <li class="list__item">
            <p class="list__text">
                
            <!-- Text -->
                <?php echo $list_item['text']; ?>
                
                <!-- Souce Link -->
                <?php if ( array_key_exists( 'has_source_link', $list_item ) ): ?>
                    <a
                        href="<?php echo $list_item['link']; ?>"
                        class="list__source"
                        target="_blank"
                    >
                        <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/arrowright_box-green.svg"
                        alt="zur Quelle"
                    /></a>
                <?php endif; ?>

            </p>
        </li>
    <?php endforeach; ?>

</ol>