<?php 
/**
 * @package MeloTec
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class CPTCallbacks 
{
    public function cptSection(){
        echo 'Manager your Custom Post Types';
    }

    // public function checkboxField($args)
    // {   
    //     $name = $args['label_for'];
    //     $classes = $args['class'];
    //     $option_name = $args['option_name'];
    //     $checkbox = get_option($option_name);

    //     echo '<div class="'.$classes.'"><input id="'.$name.'" 
    //         type="checkbox" name="'.$option_name.'['.$name.']'.'" 
    //         value="1" '.($checkbox[$name] ?? false ? 'checked' : '').' /><label for="'.$name.'"><div></div></label></div>';
    // }
}