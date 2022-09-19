<?php 
/**
 * @package MeloTec
 */

namespace Inc\Base;
use \Inc\Base\BaseController;

class Enqueue extends BaseController {
    public function register(){
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }

    public function enqueue(){
        wp_enqueue_style('melotec_style',   $this->plugin_url.'assets/style.css', );
        wp_enqueue_script('melotec_script', $this->plugin_url.'assets/script.js');
    }
}