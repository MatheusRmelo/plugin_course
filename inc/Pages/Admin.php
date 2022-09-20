<?php 
/**
 * @package MeloTec
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController {

    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function register(){
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();
        
        $this->setSubPages();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages(){
        $this->pages = [
            [
                'page_title' => 'MeloTec',
                'menu_title' => 'MeloTec', 
                'capability' => 'manage_options', 
                'menu_slug'  => 'melotec', 
                'callback'   => [$this->callbacks, 'dashboard'], 
                'icon_url'   => 'dashicons-store', 
                'position'   => 110
            ]
        ];
    }

    public function setSubPages(){
        $this->subpages = [
            [
                'parent_slug' => 'melotec',
                'page_title'  => 'Custom Post Types',
                'menu_title'  => 'CPT', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'melotec_cpt', 
                'callback'    => [$this->callbacks, 'customPostTypes'], 
            ],
            [
                'parent_slug' => 'melotec',
                'page_title'  => 'Custom Taxonomies',
                'menu_title'  => 'Taxomonies', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'melotec_taxonomies', 
                'callback'    => [$this->callbacks, 'taxonomies'], 
            ],
            [
                'parent_slug' => 'melotec',
                'page_title'  => 'Custom Widgets',
                'menu_title'  => 'Widgets', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'melotec_widgets', 
                'callback'    => [$this->callbacks, 'widgets'], 
            ]
        ];
    }

    public function setSettings()
    {
        $args = [
            [
                'option_group' => 'melotec_options_group',
                'option_name'  => 'text_example',
                'callback'     => [$this->callbacks, 'melotecOptionsGroup']
            ]
        ];
    }
}
