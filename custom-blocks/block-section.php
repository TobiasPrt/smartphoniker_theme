<?php
/**
 * Custom Block: Section
 *
 * @package Smartphoniker_Theme
 */
Block::make( __( 'Section' ) )
    	->add_fields(
    		array(
        		Field::make( 'text', 'heading', __( 'Section Heading' ) ),
    		)
    	)
    	->set_inner_blocks( true )
    	->set_inner_blocks_position( 'below' )
    	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
    ?>


    <section class="content__section section">
  		<h2 class="section__heading"><?= esc_html( $fields['heading'] ); ?></h2>
  		<?php print_r($inner_blocks); ?>
  	</section>


    <?php
}; );