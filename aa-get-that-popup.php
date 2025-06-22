<?php
/**
 * @package AAGetThatPopup
*/
/*
Plugin Name: AA Get That Popup
Description: A popup maker plugin.
Version: 1.0.0
Author: Ma. Angelica Arevalo
License: GPL v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: aagtp
 */

 /*
 * AA Get That Popup is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * AA Get That Popup is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with AA Get That Popup. If not, see <https://www.gnu.org/licenses/gpl-2.0.html>.
 */

if(!defined('ABSPATH')){
	die('Cant access this');
}

if( !class_exists('AAGetThatPopup')){
	require_once plugin_dir_path( __FILE__ ) . 'includes/aagtp-activate.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/aagtp-deactivate.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/aagtp-cpt.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/aagtp-adminfields.php';
	
	class AAGetThatPopup {

		function __construct(){
			//Enqueue scripts admin hook
			add_action( 'admin_enqueue_scripts', [$this, 'admin_scripts']);
		}

		public static function activate(){

			Aagtp_activate::activate();
		
		}

		//Enqueue admin scripts
		public function admin_scripts(){
			global $post;
			if(isset($post) && $post->post_type === "aagtp"){
				wp_enqueue_style( 'admin_style', plugin_dir_url( __FILE__ )."/admin/css/aagtp-admin-main.css");
				wp_enqueue_script( 'admin_script', plugin_dir_url( __FILE__ )."/admin/js/aagtp-admin-main.js");
			}
		}

		
	}

	$aagtp_main = new AAGetThatPopup();
	//Register Activate
	register_activation_hook( __FILE__, ['AAGetThatPopup', 'activate'] );

	//Register Deactivate
	register_deactivation_hook( __FILE__, ['Aagtp_deactivate', 'deactivate'] );

	//Run CPT
	add_action( 'init', ['Aagtp_CPT', 'add_cpt'] );
	

	//Register meta box
	$admin_fields = new Aagtp_adminfields();
	
	add_action( 'add_meta_boxes', [$admin_fields, 'fields_block'] );

	//Save Fields
	add_action( 'save_post', ['Aagtp_adminfields', 'save_fields'] );



} 
