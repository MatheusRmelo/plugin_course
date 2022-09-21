<?php 
/**
 * @package MeloTec
 */

namespace Inc\Base;

class Activate{
    public static function activate(){
        flush_rewrite_rules();

        if(get_option('melotec')){
            return;
        }

        $default = [];
        update_option('melotec', $default);
    }
}