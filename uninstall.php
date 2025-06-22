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
// $aagtpPopup = get_post(array(
//     'post_type' => 'aagpt',
//     'numberposts' => -1,
// ));

// foreach( $aagtpPopup as $popup){
//     wp_delete_post($popup->ID, true);
// }

global $wpdb;

// $wpdb->query("DELETE FROM wp_posts WHERE post_type='aagtp'");
// $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
// $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");