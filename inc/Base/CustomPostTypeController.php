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
    public $subpages = [];
    public $callbacks;
    public $custom_post_types = [];


    public function register()
    {
        $option = get_option('melotec');

        if(!$option['cpt_manager'] ?? false) return;

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();

        $this->storeCustomPostTypes();

        if(!empty($this->custom_post_types)){
            add_action('init', [$this, 'activate']);
        }
    }

    public function storeCustomPostTypes()
    {
        $this->custom_post_types = [
            [
                'post_type'     => 'melotec_product',
                'name'          => 'Products',
                'singular_name' => 'Product',
                'public'        => true,
                'has_archive'   => true
            ],
            [
                'post_type'     => 'melotec_comics',
                'name'          => 'Comic Books',
                'singular_name' => 'Comic Book',
                'public'        => true,
                'has_archive'   => false
            ],
        ];
    }

    public function activate()
    {
        foreach($this->custom_post_types as $post_type){
            register_post_type($post_type['post_type'], [
                'labels' => [
                    'name'          => $post_type['name'],
                    'singular_name' => $post_type['singular_name']
                ],
                'public'      => $post_type['public'],
                'has_archive' => $post_type['has_archive'],
            ]);
        }
       
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