<?php 
/**
 * @package MeloTec
 */

namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class TemplatesController extends BaseController 
{
    public $subpages = array();
    public $callbacks;


    public function register()
    {
        $option = get_option('melotec');

        if(!$option['templates_manager'] ?? false) return;

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        add_action('init', [$this, 'activate']);

        $this->settings->addSubPages($this->subpages)->register();
    }

    public function activate()
    {
       
    }

    public function setSubPages()
    {
        $this->subpages = [
            [
                'parent_slug' => 'melotec',
                'page_title'  => 'Templates',
                'menu_title'  => 'Templates Manager', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'melotec_templates', 
                'callback'    => [$this->callbacks, 'widgets'], 
            ],
        ];
    }
}