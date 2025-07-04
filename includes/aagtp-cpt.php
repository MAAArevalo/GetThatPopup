<?php
/**
 * @package AAGetThatPopup
*/

class Aagtp_CPT{
    public static function add_cpt(){
        register_post_type( 'aagtp', array(
            'labels'      => array(
				'name'          => __( 'AAGTP Popups', 'aa-get-that-popup' ),
				'singular_name' => __( 'AAGTP Popup', 'aa-get-that-popup' ),
				'menu_name'          => 'AAGTP Popups',
        		'name_admin_bar'     => 'AAGTP Popup',
        		'add_new'            => 'Add New',
        		'add_new_item'       => 'Add New Popup',
        		'edit_item'          => 'Edit Popup',
        		'new_item'           => 'New Popup',
        		'view_item'          => 'View Popup',
        		'search_items'       => 'Search Popups',
        		'not_found'          => 'No popups found',
        		'not_found_in_trash' => 'No popups found in Trash',
        		'all_items'          => 'All AAGTP Popups',
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'aagtp-popup' ), // my custom slug
        ) );
    }
}