<?php
/**
 * @package AAGetThatPopup
*/
require_once plugin_dir_path( __FILE__ ). 'aagtp-cpt.php';
class Aagtp_activate{
    
    public static function activate(){
        //Add CPT
        Aagtp_CPT::add_cpt();

        //Flush rewrite rules
        flush_rewrite_rules();
    }
}