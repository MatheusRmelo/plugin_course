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

    // public function checkboxSanitize($input){
    //     return $input;
    // }

    // public function melotecAdminSection(){
    //     echo 'Check this beatutiful section';
    // }

    public function melotecTextExample(){
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="'.$value.'" placeholder="Write something here..." />';
    }

    public function melotecFirstName(){
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="first_name" value="'.$value.'" placeholder="Write your first name" />';
   
    }
}