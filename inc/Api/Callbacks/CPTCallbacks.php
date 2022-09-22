<?php 
/**
 * @package MeloTec
 */

namespace Inc\Api\Callbacks;

class CPTCallbacks 
{
    public function cptSectionManager()
    {
        echo 'Create as many Custom Post Types as you want.';
    }

    public function cptSanitize($input)
    {
        $output = get_option('melotec_cpt');

        if(isset($_POST['remove'])){
            unset($output[$_POST['remove']]);
            
            return $output;
        }

        if(count($output) == 0){
            $output[$input['post_type']] = $input;

            return $output;
        }

        foreach($output as $key => $value){
            if($input['post_type'] === $key){
                $output[$key] = $input;
            }else{
                $output[$input['post_type']] = $input;
            }
        }

        return $output;
    }

    public function textField($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $placeholder = $args['placeholder'];
        $value = '';

        if(isset($_POST['edit_post'])){
            $input = get_option($option_name);
            $value = $input[$_POST['edit_post']][$name];
        }

        echo '<input type="text" class="regular-text" name="'.$option_name.'['.$name.']'.'" id="'.$name.'" 
         value="'.$value.'" placeholder="'.$placeholder.'" required/>';
    }

    public function checkboxField($args)
    {   
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checked = false;

        if(isset($_POST['edit_post'])){
            $checkbox = get_option($option_name);
            $checked = $checkbox[$_POST['edit_post']][$name] ?? false;
        }

        echo '<div class="'.$classes.'"><input id="'.$name.'" 
            type="checkbox" name="'.$option_name.'['.$name.']'.'" 
            value="1" '.($checked ? 'checked' : '').' /><label for="'.$name.'"><div></div></label></div>';
    }
}