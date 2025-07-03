<?php

/**
 * Trigger on uninstall
 * 
 * @package AAGetThatPopup
 */

if(!defined('WP_UNINSTALL_PLUGIN')){
    die;
}

//Clear database stored data
$aagtpPopup = get_posts([
    'post_type'     => 'aagtp',
    'numberposts'   => -1,
    'fields'        => 'ids'
]);

if( ! empty($aagtpPopup)){
    foreach( $aagtpPopup as $popup){
        wp_delete_post($popup, true);
    }
}