<?php
if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

if (!class_exists('Modeltheme_Addons_For_Wpbakery_Border_Param')) {
    class Modeltheme_Addons_For_Wpbakery_Border_Param {
        function __construct() {
            if (defined('WPB_VC_VERSION') && version_compare(WPB_VC_VERSION, 4.8) >= 0) {
                if (function_exists('vc_add_shortcode_param')) {
                    vc_add_shortcode_param('mt_border', array(&$this, 'border_field'));
                }
            }
            else {
                if (function_exists('add_shortcode_param')) {
                    add_shortcode_param('mt_border', array(&$this, 'border_field'));
                }
            }
        }

        function border_field($settings, $value) {

            $defaults = array(
                'param_name' => '',
                'radio-type' => 'text', //(image, text, fa-icon)
                'type' => '',
                'max-width' => 'none',
                'value' => 0,
            );
            $settings = wp_parse_args($settings, $defaults);

            if(!empty($value)){
                $hval = $value;
            }else{
                $hval = '';
            }

            // output
            $output = '';
            $output .= '<div class="mt-addons-image-border-param-holder">';
                $output .= '<input type="text" value="'.$hval.'" id="mt_addons'.$settings['param_name'].'" name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-input"><br />';
 

                $output .= '<input type="number" name="mt_addons'.$settings['param_name'].'" id="'.$settings['param_name'].$p.'" value="" class="mt-addons-border'.$settings['param_name'].'" '.$checked.' />';
                $output .= '<select name="border_measure" class="vc_border-measure">
                               <option value="px">PX</option>
                               <option value="em">EM</option>
                            </select>';
                $output .= '<select name="border_style" class="vc_border-style">
                               <option value="">Theme defaults</option>
                               <option value="solid">Solid</option>
                               <option value="dotted">Dotted</option>
                               <option value="dashed">Dashed</option>
                               <option value="none">None</option>
                               <option value="hidden">Hidden</option>
                               <option value="double">Double</option>
                               <option value="groove">Groove</option>
                               <option value="ridge">Ridge</option>
                               <option value="inset">Inset</option>
                               <option value="outset">Outset</option>
                               <option value="initial">Initial</option>
                               <option value="inherit">Inherit</option>
                            </select>';
                $output .= '<input type="text" name="mt_addons'.$settings['param_name'].'" id="'.$settings['param_name'].$p.'" value="" class="color-field mt-addons-border'.$settings['param_name'].'" '.$checked.' />';
            $output .= '</div>';

            // js
            $output .= '<script>
                        (function( $ ) {
                            $(function() {
                                $(".color-field").wpColorPicker();
                            });
                        })( jQuery );

                        // var border = "1";
                        // var measure = "px";
                        // var style = "solid";
                        // var color = "#000";

                        // var array = [];
                        // array.push({border:border, measure:measure, style:style, color:color});

                        // var array = array.join("|");

                        // alert(array);
                    </script>';

            return $output;
        }

    }
}


// Initialize Number Paramater Class
if (class_exists('Modeltheme_Addons_For_Wpbakery_Border_Param')) {
    new Modeltheme_Addons_For_Wpbakery_Border_Param();
}
