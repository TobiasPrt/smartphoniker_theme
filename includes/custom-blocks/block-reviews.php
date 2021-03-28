<?php
/**
 * Custom Block: Reviews
 * 
 * Gutenberg block which represents reviews in Col-3 format
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block reviews
 *
 * @since 1.0.0
 */
(function() {
    $reviews = call_user_func( 'get_all_posts', 'review' );

    Block::make( __( 'Reviews' ) )
        ->set_description( __( 'Stellt 3 zufällige Bewertungen mit 5-Sternen, Text und Name aus einer Auswahl in einer 3-spaltigen Ansicht dar.') )
        ->set_category( 'widgets' )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'admin-comments' )
        ->add_fields(
            array(
                Field::make( 'separator', 'separator', __( 'Reviews' ) ),
                Field::make( 'checkbox', 'all_reviews', __( 'Aus allen Bewertungen zufällige anzeigen.' ) )
                    ->set_default_value( true ),
                Field::make( 'image', 'review_icon', __('Icon wählen') )
                    ->set_help_text( 'Das Icon, welches oberhalb der Bewertungen angezeigt werden soll wählen.' )
                    ->set_required( true ),
                Field::make( 'set', 'reviews', __( 'Bewertungen auswählen, aus denen zufällige gezeigt werden sollen.' ) )
                    ->set_options( $reviews )
                    ->set_help_text( 'Wenn weniger als 3 Bewertungen ausgewählt wurden, wird die Auswahl ignoriert und aus allen gewählt.' )
                    ->set_conditional_logic( array(
                        array(
                            'field' => 'all_reviews',
                            'value' => false,
                        ),
                    ) ),
            )
        )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {

            $all_reviews = $fields['all_reviews'] ?? false;
            $selected_reviews = $fields['reviews'] ?? array();
            $review_icon = $fields['review_icon'];

            $reviews = count( $selected_reviews ) < 3 
                ? $selected_reviews 
                : call_user_func( 'get_all_posts', 'review' );
                
            $random_reviews = array_rand( $reviews, 3 );
            shuffle( $random_reviews );
            
            $fields = array(
                'column_options' => array('icon_is_small', 'has_orange_accent'),
            );


            foreach( (array) $random_reviews as $review_id ) {
                $fields['columns'][] = array(
                    '_type' => 'icon-text-subtitle',
                    'icon' => $review_icon,
                    'text' => get_post_meta( $review_id, '_text' )[0],
                    'subtitle' => get_the_title( $review_id )
                );
            }

            get_template_part( 'template-parts/component', 'col-3', $fields );
        } );
})();