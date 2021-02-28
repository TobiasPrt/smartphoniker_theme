<?php
/**
 * Custom Block: Grid-4
 * 
 * Gutenberg block which represents a 4-column grid containing
 * all of smartphonikers employees with a round image, name and role.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block employees
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Employees' ) )
        ->add_fields( array(
             Field::make( 'checkbox', 'show_application_link', __( 'Call-To-Action: Jetzt bewerben anzeigen' ) )
                ->set_help_text( 'Dieser Block stellt ein 4-spaltiges Grid aus allen Mitarbeiter:innen von Smartphoniker dar.' )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            $employees = new WP_Query( array(
                'post_type' => 'employee',
                'orderby' => array(
                    'group' => 'ASC',
                    'title' => 'ASC',
                ),
                'meta_query' => array(
                    'group' => array(
                        'key' => 'group',
                        'compare' => 'EXISTS'
                    ),
                ),
            ) ); 
            ?>

            <div class="section__content grid-4">

                <!-- Grid of employees -->
                <?php if ($employees->have_posts() ) : ?>

                        <?php while ( $employees->have_posts() ) : $employees->the_post(); ?>
                            
                            <div class="grid-4__element person">
                                <?php echo wp_get_attachment_image( get_post_meta( get_the_ID(), '_image' )[0], 'thumbnail', false, array( 'class' => 'person__img' ) ); ?>
                                <p class="person__name"> <?php the_title(); ?></p>
                                <p class="person__title"><?php echo get_post_meta( get_the_ID(), '_role' )[0]; ?></p>
                            </div>
                        
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                <?php endif; ?>

                <!-- Link for application -->
                <?php if ( in_array( 'show_application_link', $fields ) ): ?>
                    <div class="grid-4__element person">
                        <a class="person__button button button--white" href="/karriere/"
                        >Jetzt bewerben</a
                        >
                    </div>
                <?php endif; ?>

                

            </div>

            <?php
        } );
})();