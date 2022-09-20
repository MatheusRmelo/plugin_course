<?php 
/**
 * @package MeloTec
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController  
{
    public function dashboard(){
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function customPostTypes(){
        return require_once("$this->plugin_path/templates/custom_post_types.php");
    }
    public function taxonomies(){
        return require_once("$this->plugin_path/templates/taxonomies.php");
    }
    public function widgets(){
        return require_once("$this->plugin_path/templates/widgets.php");
    }
    public function melotecOptionsGroup($input){
        return $input;
    }
}