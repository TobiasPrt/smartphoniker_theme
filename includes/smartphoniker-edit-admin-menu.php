<?php
/**
 * Customizing admin menu
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'admin_menu', 'smartphoniker_edit_admin_menu' );


/**
 * Calls functions for customizing admin menu.
 * 
 * @since 1.0.0.
 */
function smartphoniker_edit_admin_menu() {
    smartphoniker_remove_menu_pages();
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
