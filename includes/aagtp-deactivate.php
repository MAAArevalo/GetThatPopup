<?php
/**
 * @package AAGetThatPopup
*/

class Aagtp_deactivate{
    public static function deactivate(){
        flush_rewrite_rules();
    }
}