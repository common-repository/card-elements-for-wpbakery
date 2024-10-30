<?php
/**
 * card element widget number type register
 * 
 * @version 1.0
 * @since 1.0
*/
if (!class_exists('CEWB_Number_Param')) {
    class CEWB_Number_Param {
        function __construct() {
            if (defined('card-elements-for-wpbakery') ) {
                if (function_exists('vc_add_shortcode_param')) {
                    vc_add_shortcode_param('vc_number', array(&$this, 'number_field'));
                }
            }
            else {
                if (function_exists('vc_add_shortcode_param')) {
                    vc_add_shortcode_param('vc_number', array(&$this, 'number_field'));
                }
            }
        }

        //vc_number call - Y
        function number_field($settings, $value) {

            $defaults = array(
                'param_name' => '',
                'type' => '',
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'value' => 0,
                'suffix' => '',
                'class' => '',
            );
            $settings = wp_parse_args($settings, $defaults);

            $output = '<div class="lvca-number-wrap">';
            $output .= '<input type="number" min="' . esc_attr($settings['min']) . '" max="' . esc_attr($settings['max']) . '" step="' . esc_attr($settings['step']) . '" class="wpb_vc_param_value ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . ' ' . esc_attr($settings['class']) . '" name="' . esc_attr($settings['param_name']) . '" value="' . esc_attr($value) . '"/>' . esc_attr($settings['suffix']);
            $output .= '</div>';
            return $output;
        }

    }
}

/**
 * Initialize Number Parameter Class
 * 
 * @version 1.0
 * @since 1.0
 * */ 
if (class_exists('CEWB_Number_Param')) {
    new CEWB_Number_Param();
}
