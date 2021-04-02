<?php
/**
 * Filter: Mod-Rewrite-Rules
 * 
 * Here code can be added to the .htaccess file
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_filter('mod_rewrite_rules', 'smartphoniker_add_custom_htaccess_content');


/**
 * Adds custom htaccess content
 *
 * @param string $rules current htaccess rules
 *
 * @return string new htaccess rules
 * 
 * @since 1.0.0
 */
function smartphoniker_add_custom_htaccess_content( string $rules ) : string {
    $hide_author_page = <<<EOD
        \n\n # BEGIN My Added Content
        # Hide author page
        RewriteCond %{REQUEST_URI} !^/wp-admin [NC]
        RewriteCond %{QUERY_STRING} author=\d
        RewriteRule ^.*$ - [R=404,L]
        # END My Added Content\n
        EOD;    
    $position = strpos( $rules, 'RewriteEngine On') + 16;
    $new_rules = substr_replace( $rules, $position, $position, 0);
    
    return $new_rules;
}
