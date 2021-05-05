<?php
/**
 * Customizing admin menu
 * 
 * @package Smartphoniker
 * @since 1.0.0
 * @since 1.1.0 new function for adding entries to admin menu
 */
add_action( 'admin_menu', 'smartphoniker_edit_admin_menu' );


/**
 * Calls functions for customizing admin menu.
 * 
 * @since 1.0.0
 * @since 1.0.0 call to _add_menu_pages()
 */
function smartphoniker_edit_admin_menu() {
    smartphoniker_remove_menu_pages();
    smartphoniker_add_menu_pages();
}


/**
 * Removes unnecessary menu options.
 * 
 * @since 1.0.0
 */
function smartphoniker_remove_menu_pages() {
  remove_menu_page( 'edit.php' ); //Posts
  remove_menu_page( 'edit-comments.php' ); //Comments
  remove_menu_page( 'users.php' ); //Users
}


/**
 * Adds entries to admin menu
 *
 * @since 1.1.0
 */
function smartphoniker_add_menu_pages() {
  add_menu_page(
			esc_html__( 'Reusable Blocks', 'reusable-blocks-admin-menu-option' ), // page title
			esc_html__( 'Reusable Blocks', 'reusable-blocks-admin-menu-option' ), // menu title
			'read', // capability of user to see this
			'edit.php?post_type=wp_block', // slug (link)
			'', // function to be called to output (here: empty, page outputs itself)
			'dashicons-layout', // icon
			20 // positon: below pages
		);
}