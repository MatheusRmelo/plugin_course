<?php 
/**
 * @package MeloTec
 */

namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController 
{
    public $subpages = array();
    public $callbacks;


    public function register()
    {
        $option = get_option('melotec');

        if(!$option['cpt_manager'] ?? false) return;

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        add_action('init', [$this, 'activate']);

        $this->settings->addSubPages($this->subpages)->register();
    }

    public function activate()
    {
        register_post_type('melotec_products', [
            'labels' => [
                'name'          => 'Products',
                'singular_name' => 'Product'
            ],
            'public'      => true,
            'has_archive' => true,
        ]);
    }

    public function setSubPages()
    {
        $this->subpages = [
            [
                'parent_slug' => 'melotec',
                'page_title'  => 'Custom Post Types',
                'menu_title'  => 'CPT Manager', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'melotec_cpt', 
                'callback'    => [$this->callbacks, 'customPostTypes'], 
            ],
        ];
    }
}