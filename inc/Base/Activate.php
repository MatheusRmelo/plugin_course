<?php 
/**
 * @package MeloTec
 */

namespace Inc\Base;

class Activate{
    public static function activate(){
        flush_rewrite_rules();

        $default = [];
        
        if(!get_option('melotec')){
            update_option('melotec', $default);
        }

        if(!get_option('melotec_cpt')){
            update_option('melotec_cpt', $default);
        }
    }
}