<?php
/**
 * @package AAGetThatPopup
*/

class Aagtp_CPT{
    public static function add_cpt(){
        register_post_type( 'aagtp', array(
            'labels'      => array(
				'name'          => __( 'AAGTP Popups', 'textdomain' ),
				'singular_name' => __( 'AAGTP Popup', 'textdomain' ),
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'aagtp-popup' ), // my custom slug
        ) );
    }
}