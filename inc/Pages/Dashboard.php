<?php 
/**
 * @package MeloTec
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController {

    public $settings;
    public $callbacks;
    public $callbacks_mngr;
    public $pages = array();
    //public $subpages = array();

    public function register(){
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();
        
        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
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

    public function setSettings()
    {   
        $args = [
            [
                'option_group' => 'melotec_settings',
                'option_name'  => 'melotec',
                'callback'     => [$this->callbacks_mngr, 'checkboxSanitize']
            ]
        ];

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = [
            [
                'id'       => 'melotec_admin_index',
                'title'    => 'Settings Manager',
                'callback' => [$this->callbacks_mngr, 'adminSectionManager'],
                'page'     => 'melotec'
            ]
        ];

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = [];

        foreach ($this->managers as $key => $value) {
            $args[] = [
                'id'       => $key,
                'title'    => $value,
                'callback' => [$this->callbacks_mngr, 'checkboxField'],
                'page'     => 'melotec',
                'section'  => 'melotec_admin_index',
                'args'     => [
                    'option_name' => 'melotec',
                    'label_for'   => $key,
                    'class'       => 'ui-toggle'
                ]
            ];
        }

        $this->settings->setFields($args);
    }
}
