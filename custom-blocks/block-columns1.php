<?php
/**
 * Custom Block: Columns-1
 *
 * @package Smartphoniker-Theme
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;

function block_columns() {
	Block::make( __( 'Col1' ) )
		->add_fields(
			array(
				Field::make( 'textarea', 'text', __( 'Col Text' ) )
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
}
