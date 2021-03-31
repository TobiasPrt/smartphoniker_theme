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
        <li class="list__item list__item--<?php echo $args['color']; ?>">
            <p class="list__text">
                
            <!-- Text -->
                <?php echo $list_item['text']; ?>
                
                <!-- Souce Link -->
                <?php if ( $list_item[ 'has_source_link'] ): ?>
                    
                    <?php $box_color = $args['color'] === 'green' ? 'green' : 'orange'; ?>
                    <a
                        href="<?php echo $list_item['link']; ?>"
                        class="list__source"
                        target="_blank"
                    >
                        <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/arrowright_box-<?php echo $box_color; ?>.svg"
                        alt="zur Quelle"
                    /></a>
                    
                <?php endif; ?>

            </p>
        </li>
    <?php endforeach; ?>

</ol>