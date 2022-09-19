<?php 
/**
 * @package MeloTec
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController {

    public $settings;
    public $pages = array();
    public $subpages = array();

    public function __construct()
    {
        $this->settings = new SettingsApi();
        $this->pages = [
            [
                'page_title' => 'MeloTec',
                'menu_title' => 'MeloTec', 
                'capability' => 'manage_options', 
                'menu_slug'  => 'melotec', 
                'callback'   => function (){echo '<h1>MeloTec</h1>';}, 
                'icon_url'   => 'dashicons-store', 
                'position'   => 110
            ]
        ];
        $this->subpages = [
            [
                'parent_slug' => 'melotec',
                'page_title'  => 'Custom Post Types',
                'menu_title'  => 'CPT', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'melotec_cpt', 
                'callback'    => function (){echo '<h1>CPT Manager</h1>';}, 
            ],
            [
                'parent_slug' => 'melotec',
                'page_title'  => 'Custom Taxonomies',
                'menu_title'  => 'Taxomonies', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'melotec_taxonomies', 
                'callback'    => function (){echo '<h1>Taxonomies Manager</h1>';}, 
            ],
            [
                'parent_slug' => 'melotec',
                'page_title'  => 'Custom Widgets',
                'menu_title'  => 'Widgets', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'melotec_widgets', 
                'callback'    => function (){echo '<h1>Widgets Manager</h1>';}, 
            ]
        ];
    }

    public function register(){
        $this->settings->add_pages($this->pages)->withSubPage('Dashboard')->add_sub_pages($this->subpages)->register();
    }
}
