<?php
Block::make( __( 'Columns1' ) )
    	->add_fields(
    		array(
    			Field::make( 'textarea', 'text', __( 'Columns1 Text' ) )
    		)
    	)
    	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
	?>


	<div class="section__content section__content--small columns-1">
    	<p class="columns-1__text">
        	<?= esc_html( $fields['text'] ); ?>
    	</p>
	</div>

	
	<?php
} );