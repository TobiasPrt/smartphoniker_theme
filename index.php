<?php
/**
 * Main Template File
 *
 * @package Smartphoniker
 */


 ?>
<style>
    img {
        width: 100px;
        height: 100px;
    }
</style>
<?php

foreach (carbon_get_theme_option('partner_logos') as $id) {
    echo wp_get_attachment_image($id, array('700', '600'), "", array( "class" => "img-responsive" ));
}
