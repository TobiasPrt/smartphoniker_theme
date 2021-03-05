<?php
/**
 * Template-Part: Link-List
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<ul class="section__content section__content--small link-list">

    <?php if ( isset($args['link_list'] ) ): ?>

        <?php foreach ( (array) $args['link_list'] as $page => $page_id ): ?>

            <li class="link-list__item">
                <a class="link-list__link" href="<?php echo get_permalink( $page_id ); ?>">
                    <?php echo get_post_field( 'post_title', intval( $page_id ) ); ?>
                </a>
            </li>

        <?php endforeach; ?>

    <?php endif; ?>

</ul>