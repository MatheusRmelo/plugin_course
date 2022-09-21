<?php 
/**
 * @package MeloTec
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController  
{
    public function checkboxSanitize($input)
    {
        $output = array();
        foreach ($this->managers as $key => $value) {
            $output[$key] = $input[$key] ? true : false;
        }
        return $output;
        //return ($input ? true : false);
    }

    public function adminSectionManager(){
        echo 'Activate the Sections and Features of this Plugin by activating the checkboxes from the following list.';
    }

    public function checkboxField($args)
    {   
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option($option_name);
        echo '<div class="'.$classes.'"><input id="'.$name.'" 
            type="checkbox" name="'.$option_name.'['.$name.']'.'" 
            value="1" '.($checkbox[$name] ? 'checked' : '').' /><label for="'.$name.'"><div></div></label></div>';
    }
}