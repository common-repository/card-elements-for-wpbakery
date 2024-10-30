<?php
/**
 * Display Testimonial Card layout element
 * 
 * @version 1.0
 * @since 1.0
 **/
function cewb_testimonial_card_shortcode($atts, $content = null, $shortcode_handle = '') {
    $default_atts = array(
        'cewb_testimonial_card_style' => 'testimonial-card-style-1',
        'cewb_testimonial_name' => 'John Doe',
        'cewb_testimonial_position' => 'Developer',
        'cewb_display_testimonial_description' => 'true',
        'cewb_testimonial_description' => 'Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
        'cewb_testimonial_image' => '',
        'cewb_testimonial_card_style_name_color' => '#02d871',
        'cewb_testimonial_card_style_name_alignment' => 'left',
        'cewb_testimonial_card_style_name_font_size' => '',
        'cewb_testimonial_card_style_name_font_style' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_testimonial_card_style_position_color' => '#54595f',
        'cewb_testimonial_card_style_position_alignment' => 'left',
        'cewb_testimonial_card_style_position_font_size' => '',
        'cewb_testimonial_card_style_position_font_style' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_testimonial_card_style_description_color' => '#54595f',
        'cewb_testimonial_card_style_description_alignment' => 'left',
        'cewb_testimonial_card_style_description_font_size' => '',
        'cewb_testimonial_card_style_description_font_style' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',                           
        'cewb_testimonial_card_style_background_color' => '#61ce70',
        'cewb_testimonial_card_design_options' => ''
    );

    $atts = shortcode_atts($default_atts, $atts);
    extract($atts);

    // design css class
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $cewb_testimonial_card_design_options, ' ' ));
    ob_start();
    ?>
    <div class="vc_grid-container-wrapper vc_clearfix <?php echo esc_attr($css_class); ?>" style='<?php $cewb_testimonial_card_design_options ?>' >
        <div class="vc_grid-container vc_clearfix wpb_content_element vc_basic_grid">
            <div class="vc_pageable-slide-wrapper vc_clearfix">
                <?php
                if ($cewb_testimonial_card_style == 'testimonial-card-style-1') {
                    include CEWB_DIR . 'include/testimonial-card/wpbakery-testimonial-card-1.php';
                } else if ($cewb_testimonial_card_style == 'testimonial-card-style-2') {
                    include CEWB_DIR . 'include/testimonial-card/wpbakery-testimonial-card-2.php';
                } else if ($cewb_testimonial_card_style == 'testimonial-card-style-6') {
                    include CEWB_DIR . 'include/testimonial-card/wpbakery-testimonial-card-6.php';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('cewb_testimonial_card_layout',  'cewb_testimonial_card_shortcode');

/*
 * All testimonial card styles
 */
$testimonial_card_style = array(
    __('Card Style 1', 'card-elements-for-wpbakery') => 'testimonial-card-style-1',
    __('Card Style 2', 'card-elements-for-wpbakery') => 'testimonial-card-style-2',
    __('Card Style 6', 'card-elements-for-wpbakery') => 'testimonial-card-style-6'
);

/*
 * Testimonial Card Visual Composer Elements
 */
$testimonial_card_fields = array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Testimonial Card Layouts option', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_card_style',
        'value' => $testimonial_card_style,
        'admin_label' => true,
        'description' => esc_html__('Select testimonial card style.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Name', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_name',
        'value' => __('John Doe', 'card-elements-for-wpbakery'),
        'admin_label' => true,
        'description' => esc_html__('Enter testimonial name.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Position', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_position',
        'value' => __('Developer', 'card-elements-for-wpbakery'),
        'admin_label' => true,
        'description' => esc_html__('Enter testimonial position.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_description',
        'value' => __('Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'card-elements-for-wpbakery'),
        'admin_label' => true,
        'description' => esc_html__('Enter testimonial description.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Testimonial Image', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_image',
        'value' => false,
        'admin_label' => true,
        'description' => esc_html__('Upload testimonial image.', 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Name Text color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_testimonial_card_style_name_color",
        "value" => '#02d871', 
        'group' => esc_html__('Name Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Set color for name.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Select Name Alignment', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_card_style_name_alignment',
        'value' => array(
            __( 'Left', 'card-elements-for-wpbakery'  ) => 'left',
            __( 'Center', 'card-elements-for-wpbakery'  ) => 'center',
            __( 'Right', 'card-elements-for-wpbakery'  ) => 'right',
        ),
        'group' => esc_html__('Name Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Select alignment For name.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Name Font Size', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_card_style_name_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "value"			=> "10",
        "suffix" 		=> 'px',
        "group" 		=> esc_html__('Name Style',  'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_testimonial_card_style_name_font_style',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        'group' => esc_html__('Name Style',  'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Position Text color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_testimonial_card_style_position_color",
        "value" => '#54595f', 
        'group' => esc_html__('Position Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Set color for position.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Select Position Alignment', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_card_style_position_alignment',
        'value' => array(
            __( 'Left', 'card-elements-for-wpbakery'  ) => 'left',
            __( 'Center', 'card-elements-for-wpbakery'  ) => 'center',
            __( 'Right', 'card-elements-for-wpbakery'  ) => 'right',
        ),
        'group' => esc_html__('Position Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Select alignment for position.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Position Font Size', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_card_style_position_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "value"			=> "10",
        "suffix" 		=> 'px',
        "group" 		=> esc_html__('Position Style', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_testimonial_card_style_position_font_style',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        'group' => esc_html__('Position Style', 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Description Text color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_testimonial_card_style_description_color",
        "value" => '#7A7A7A', 
        'group' => esc_html__('Description Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Set color for description.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Select Description Alignment', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_card_style_description_alignment',
        'value' => array(
            __( 'Left', 'card-elements-for-wpbakery'  ) => 'left',
            __( 'Center', 'card-elements-for-wpbakery'  ) => 'center',
            __( 'Right', 'card-elements-for-wpbakery'  ) => 'right',
            __( 'Justify' , 'card-elements-for-wpbakery') => 'justify',
        ),
        'group' => esc_html__('Description Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Select alignment for description.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Description Font Size', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_testimonial_card_style_description_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "value"			=> "10",
        "suffix" 		=> 'px',
        "group" 		=> esc_html__('Description Style', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_testimonial_card_style_description_font_style',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        'group' => esc_html__('Description Style', 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Background Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_testimonial_card_style_background_color",
        "value" => '#61ce70', 
        // set dependency of style
        'dependency' => array(
			'element' => 'cewb_testimonial_card_style',
			'value' => array( 'testimonial-card-style-1' ),
		),
        'group' => esc_html__('Content Box Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Set color for description.", 'card-elements-for-wpbakery'),
    ),
    array(  
        "type" => "css_editor",
        "class" => "",
        "heading" => esc_html__("Field Label", 'card-elements-for-wpbakery'),
        "param_name" => "cewb_testimonial_card_design_options",
        "value" => '', 
        'group' => esc_html__('Design Options', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Enter description.", 'card-elements-for-wpbakery'),
    ),
);

/*
 * Params
 */
$params = array(
    'name' => esc_html__('Testimonial Card Layout', 'card-elements-for-wpbakery'),
    'description' => esc_html__('Display testimonial card layout.', 'card-elements-for-wpbakery'),
    'base' => 'cewb_testimonial_card_layout',
    'class' => 'cewb_element_wrapper',
    'controls' => 'full',
    'icon' => '',
    'category' => esc_html__('Card Elements', 'card-elements-for-wpbakery'),
    'show_settings_on_create' => true,
    'params' => $testimonial_card_fields

);

/**
 * wpbakery param to register widget
 * 
 * @version 1.0
 * @since 1.0 
 **/
vc_map($params);
