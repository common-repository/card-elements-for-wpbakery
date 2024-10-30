<?php
/**
 * Display Profile Card layout element
 * 
 * @version 1.0
 * @since 1.0 
 **/
function cewb_profile_card_shortcode($atts, $content = null, $shortcode_handle = '') {
    $default_atts = array(
        'cewb_profile_card_style' => 'profile-card-style-1',
        'cewb_profile_name' => 'John Doe',
        'cewb_profile_position' => 'Developer',
        'cewb_display_profile_description' => 'true',
        'cewb_profile_description' => 'Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
        'cewb_profile_image' => '',
        'cewb_profile_background_image' => '',
        'cewb_social_icon_value'=>'true',
        'cewb_social_facebook_icon' => 'fab fa-facebook',
        'cewb_social_facebook_url' => '',
        'cewb_social_twitter_icon' => 'fab fa-twitter',
        'cewb_social_twitter_url' => '',
        'cewb_social_googleplus_icon' => 'fab fa-google-plus',
        'cewb_social_googleplus_url' => '',
        'cewb_social_wordpress_icon' => 'fab fa-wordpress',
        'cewb_social_wordpress_url' => '',
        'cewb_profile_card_style_name_color' => '#91e2f7',
        'cewb_profile_card_style_name_font_size' => '',
        'cewb_profile_card_style_name_alignment' => 'center',
        'cewb_profile_card_style_position_color' => '#54595F',
        'cewb_profile_card_style_position_font_size' => '',
        'cewb_profile_card_style_position_alignment' => 'center',
        'cewb_profile_card_style_description_color' => '#7A7A7A',
        'cewb_profile_card_style_description_font_size' => '',
        'cewb_profile_card_style_description_alignment' => 'center',
        'cewb_profile_card_style_background_color' => '#61ce70',
        'cewb_profile_card_style_social_background_color' => '#61ce70',
        'cewb_profile_card_social_icon_size' => '20px',
        'cewb_profile_card_style_social_icon_background_color' => '#61ce70',
        'cewb_profile_card_style_social_icon_color' => '#fff',
        'cewb_profile_card_social_icon_box_radius' => '0px',
        'cewb_profile_card_social_icon_animation'=> 'none',
        'cewb_profile_card_style_social_hover_background_color' => '#61ce70',
        'cewb_profile_card_style_social_icon_hover_background_color' => 'transparent',
        'cewb_profile_card_style_social_icon_hover_color' => '#fff',
        'cewb_profile_card_social_icon_hover_box_radius' => '',
        'cewb_profile_card_style_triangle_div_background_color' => '#61ce70',
        'cewb_profile_card_style_position_div_background_color' => '',
        'cewb_profile_card_style_name_div_background_color' => '',
        'cewb_profile_card_design_options' => '',
        'cewb_profile_card_style_name_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_profile_card_style_position_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_display_profile_description_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal'
    );

    $atts = shortcode_atts($default_atts, $atts);
    extract($atts);

    //Design option class
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $cewb_profile_card_design_options, ' ' ));

    //for uniq global class
    $custom_uniq_class = wp_rand(9712 , 205553);

    ob_start();
    
    ?>
    <div class="vc_grid-container-wrapper vc_clearfix <?php echo esc_attr($css_class); ?>" style='<?php $cewb_profile_card_design_options ?>' >
        <div class="vc_grid-container vc_clearfix wpb_content_element vc_basic_grid">
            <div class="vc_pageable-slide-wrapper vc_clearfix">
                <?php
                if ($cewb_profile_card_style == 'profile-card-style-1') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-1.php';
                } else if ($cewb_profile_card_style == 'profile-card-style-2') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-2.php';
                } else if ($cewb_profile_card_style == 'profile-card-style-3') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-3.php';
                } else if ($cewb_profile_card_style == 'profile-card-style-4') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-4.php';
                } else if ($cewb_profile_card_style == 'profile-card-style-5') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-5.php';
                } else if ($cewb_profile_card_style == 'profile-card-style-11') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-11.php';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('cewb_profile_card_layout', 'cewb_profile_card_shortcode');

/*
 * All profile card styles
 */
$profile_card_style = array(
    __('Card Style 1', 'card-elements-for-wpbakery') => 'profile-card-style-1',
    __('Card Style 2', 'card-elements-for-wpbakery') => 'profile-card-style-2',
    __('Card Style 3', 'card-elements-for-wpbakery') => 'profile-card-style-3',
    __('Card Style 4', 'card-elements-for-wpbakery') => 'profile-card-style-4',
    __('Card Style 5', 'card-elements-for-wpbakery') => 'profile-card-style-5',
    __('Card Style 11', 'card-elements-for-wpbakery') => 'profile-card-style-11'
);

/*
 * Profile Card Visual Composer Elements
 */
$profile_card_fields = array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Profile Card Style', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_card_style',
        'value' => $profile_card_style,
        'admin_label' => true,
        'description' => esc_html__('Select profile card style.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Name', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_name',
        'value' => __('John Doe', 'card-elements-for-wpbakery'),
        'admin_label' => true,
        'description' => esc_html__('Enter profile name.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Position', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_position',
        'value' => __('Developer', 'card-elements-for-wpbakery'),
        'admin_label' => true,
        'description' => esc_html__('Enter profile position.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Display Profile Description', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_display_profile_description',
        'value' => 'true',
        'admin_label' => true,
        'std' => 'true',
        'dependency' => array(
            'element' => 'cewb_profile_card_style',
            'value' => array(
                'profile-card-style-1', 'profile-card-style-2' ,'profile-card-style-3', 'profile-card-style-4' ,'profile-card-style-5'
            ),
        ),
        'description' => esc_html__('Check/Uncheck to show/hide the profile description.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_description',
        'value' => __('Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'card-elements-for-wpbakery'),
        'admin_label' => true,
        'dependency' => array(
            'element' => 'cewb_display_profile_description',
            'value' => 'true',
        ),
        'description' => esc_html__('Enter profile description.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Profile Image', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_image',
        'value' => false,
        'admin_label' => true,
        'description' => esc_html__('Upload profile image.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Profile Background Image', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_background_image',
        'value' => false,
        'admin_label' => true,
        'description' => esc_html__('Upload profile background image.', 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "checkbox",
        "class" => "",
        "heading" => esc_html__("Display Social Media", 'card-elements-for-wpbakery'),
        "param_name" => "cewb_social_icon_value",
        "value" => "true",
        'std' => 'true',
        "description" => esc_html__("Check/Uncheck to show/hide the social media icon.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'iconpicker',
        'heading' => esc_html__('Facebook Icon', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_social_facebook_icon',
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'value' => 'fab fa-facebook',
        'description' => esc_html__('Select icon from library.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type'        => 'vc_link',
        'heading'     => esc_html__('Facebook URL (Link)', 'card-elements-for-wpbakery'),
        'param_name'  => 'cewb_social_facebook_url',
        'value'       => '',
        'admin_label' => true,
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'description' => esc_html__('Add url to Facebook.', 'card-elements-for-wpbakery')
    ),
    array(
        'type' => 'iconpicker',
        'heading' => esc_html__('Twitter Icon', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_social_twitter_icon',
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'value' => 'fab fa-twitter',
        'description' => esc_html__('Select icon from library.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type'        => 'vc_link',
        'heading'     => esc_html__('Twitter URL (Link)', 'card-elements-for-wpbakery'),
        'param_name'  => 'cewb_social_twitter_url',
        'value'       => '',
        'admin_label' => true,
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'description' => esc_html__('Add url to twitter.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'iconpicker',
        'heading' => esc_html__('Google Plus Icon', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_social_googleplus_icon',
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'value' => 'fab fa-google-plus',
        'description' => esc_html__('Select icon from library.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type'        => 'vc_link',
        'heading'     => esc_html__('Google Plus URL (Link)', 'card-elements-for-wpbakery'),
        'param_name'  => 'cewb_social_googleplus_url',
        'value'       => '',
        'admin_label' => true,
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'description' => esc_html__('Add url to google plus.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'iconpicker',
        'heading' => esc_html__('WordPress Icon', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_social_wordpress_icon',
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'value' => 'fab fa-wordpress',
        'description' => esc_html__('Select icon from library.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type'        => 'vc_link',
        'heading'     => esc_html__('WordPress URL (Link)', 'card-elements-for-wpbakery'),
        'param_name'  => 'cewb_social_wordpress_url',
        'value'       => '',
        'admin_label' => true,
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'description' => esc_html__('Add url to WordPress.', 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Name Text color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_name_color",
        "value" => '#65c4dd', 
        'group' => esc_html__('Name Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Set color for name.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Name Font Size', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_card_style_name_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "value"			=> "0",
        "suffix" 		=> 'px',
        "group" 		=> esc_html__('Name Style', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Select Name Alignment', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_card_style_name_alignment',
        'value' => array(
            __( 'Left', 'card-elements-for-wpbakery'  ) => 'left',
            __( 'Center', 'card-elements-for-wpbakery'  ) => 'center',
            __( 'Right', 'card-elements-for-wpbakery'  ) => 'right',
        ),
        'std' => 'center',
        'group' => esc_html__('Name Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Select alignment for name.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_profile_card_style_name_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        'group' => esc_html__('Name Style', 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Position Text color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_position_color",
        "value" => '#54595F', 
        'group' => esc_html__('Position Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Set color for position.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Position Font Size', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_card_style_position_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "value"			=>	"0",
        "suffix" 		=> 'px',
        "group" 		=> esc_html__('Position Style', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Select Position Alignment', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_card_style_position_alignment',
        'value' => array(
            __( 'Left', 'card-elements-for-wpbakery'  ) => 'left',
            __( 'Center', 'card-elements-for-wpbakery'  ) => 'center',
            __( 'Right', 'card-elements-for-wpbakery'  ) => 'right',
        ),
        'std' => 'center',
        'group' => esc_html__('Position Style', 'card-elements-for-wpbakery'),
        "description" => esc_html__("Select alignment for position.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_profile_card_style_position_font_family',
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
        "param_name" => "cewb_profile_card_style_description_color",
        "value" => '#7A7A7A', 
        'group' => esc_html__('Description Style', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_display_profile_description',
            'value' => 'true',
        ),
        "description" => esc_html__("Set color for description.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Description Font Size', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_card_style_description_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "value"			=> "0",
        "suffix" 		=> 'px',
        'dependency' => array(
            'element' => 'cewb_display_profile_description',
            'value' => 'true',
        ),
        "group" 		=> esc_html__('Description Style', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Select Description Alignment', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_card_style_description_alignment',
        'value' => array(
            __( 'Left', 'card-elements-for-wpbakery'  ) => 'left',
            __( 'Center', 'card-elements-for-wpbakery'  ) => 'center',
            __( 'Right', 'card-elements-for-wpbakery'  ) => 'right',
            __( 'Justify' , 'card-elements-for-wpbakery') => 'justify',
        ),
        'std' => 'center',
        'group' => esc_html__('Description Style', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_display_profile_description',
            'value' => 'true',
        ),
        "description" => esc_html__("Select alignment for description.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_display_profile_description_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        'dependency' => array(
            'element' => 'cewb_display_profile_description',
            'value' => 'true',
        ),
        'group' => esc_html__('Description Style', 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Background Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_background_color",
        "value" => '#61ce70', 
        'group' => esc_html__('Content Box Style', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_profile_card_style',
            'value_not_equal_to' => 'profile-card-style-11',
        ),
        "description" => esc_html__("Set card background color.", 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Background Color For name', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_name_div_background_color",
        "value" => '#61ce70', 
        'group' => esc_html__('Content Box Style', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_profile_card_style',
            'value' => 'profile-card-style-11'
        ),
        "description" => esc_html__("Set name background color.", 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Background Color for Position', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_position_div_background_color",
        "value" => '#61ce70', 
        'group' => esc_html__('Content Box Style', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_profile_card_style',
            'value' => 'profile-card-style-11'
        ),
        "description" => esc_html__("Set position background color.", 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Triangle Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_triangle_div_background_color",
        "value" => '#61ce70', 
        'group' => esc_html__('Content Box Style', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_profile_card_style',
            'value' => 'profile-card-style-11'
        ),
        "description" => esc_html__("Set triangle background color.", 'card-elements-for-wpbakery'),
    ),
    
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Social Area Background Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_social_background_color",
        "value" => '#61ce70', 
        'group' => esc_html__('Social Icon', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => esc_html__("social media div background color.", 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Primary Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_social_icon_background_color",
        "value" => '#61ce70', 
        'group' => esc_html__('Social Icon', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => esc_html__("social media icon background color.", 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Secondary Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_social_icon_color",
        "value" => '#fff', 
        'group' => esc_html__('Social Icon', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => esc_html__("social media icon color.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type'        => 'vc_number',
        'heading'     => esc_html__('Icon Size', 'card-elements-for-wpbakery'),
        'param_name'  => 'cewb_profile_card_social_icon_size',
        "edit_field_class" => "vc_col-md-2 vc_column-with-padding",
        'dependency'  => array(
            'element'   => 'cewb_social_icon_value',
            'value'     => 'true',
        ),
        "description" => esc_html__("Select icon size.", 'card-elements-for-wpbakery'),
        "value"	      => "0",
        "suffix"      => 'px',
        "group"       => esc_html__('Social Icon', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Border radius', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_card_social_icon_box_radius',
        'value' => array(
            __( '0px' , 'card-elements-for-wpbakery') => '0px',
            __( '10px' , 'card-elements-for-wpbakery') => '10px',
            __( '15px' , 'card-elements-for-wpbakery') => '15px',
            __( '20px' , 'card-elements-for-wpbakery') => '20px',
            __( '25px' , 'card-elements-for-wpbakery') => '25px',
            __( '30px' , 'card-elements-for-wpbakery') => '30px',
            __( '35px' , 'card-elements-for-wpbakery') => '35px',
            __( '50px' , 'card-elements-for-wpbakery') => '50px',
        ),
        "edit_field_class" => "vc_col-md-2 vc_column-with-padding",
        'std' => '0px',
        'group' => esc_html__('Social Icon', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => esc_html__("Select box border radius in.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Hover Animation', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_card_social_icon_animation',
        'value' => array(
            __( 'None' , 'card-elements-for-wpbakery') => 'none',
            __( 'Grow' , 'card-elements-for-wpbakery') => 'grow',
            __( 'Shrink' , 'card-elements-for-wpbakery') => 'shrink',
            __( 'Pulse' , 'card-elements-for-wpbakery') => 'pulse',
            __( 'Pulse Grow' , 'card-elements-for-wpbakery') => 'pulse-grow',
            __( 'Pulse Shrink' , 'card-elements-for-wpbakery') => 'pulse-shrink',
            __( 'Push' , 'card-elements-for-wpbakery') => 'push',
            __( 'Pop' , 'card-elements-for-wpbakery') => 'pop',
            __( 'Bounce In' , 'card-elements-for-wpbakery') => 'bounce-in',
            __( 'Bounce Out' , 'card-elements-for-wpbakery') => 'bounce-out',
            __( 'Rotate' , 'card-elements-for-wpbakery') => 'rotate',
            __( 'Grow Rotate' , 'card-elements-for-wpbakery') => 'grow-rotate',
            __( 'Float' , 'card-elements-for-wpbakery') => 'float',
            __( 'Sink' , 'card-elements-for-wpbakery') => 'sink',
            __( 'Bob' , 'card-elements-for-wpbakery') => 'bob',
            __( 'Hang' , 'card-elements-for-wpbakery') => 'hang',
            __( 'Skew' , 'card-elements-for-wpbakery') => 'skew',
            __( 'Skew Forward' , 'card-elements-for-wpbakery') => 'skew-forward',
            __( 'Skew Backward' , 'card-elements-for-wpbakery') => 'skew-backward',
            __( 'Wobble Vertical' , 'card-elements-for-wpbakery') => 'wobble-vertical',
            __( 'Wobble Horizontal' , 'card-elements-for-wpbakery') => 'wobble-horizontal',
            __( 'Wobble To Bottom Right' , 'card-elements-for-wpbakery') => 'wobble-to-bottom-right',
            __( 'Wobble To Top Right' , 'card-elements-for-wpbakery') => 'wobble-to-top-right',
            __( 'Wobble Top' , 'card-elements-for-wpbakery') => 'wobble-top',
            __( 'Wobble Bottom' , 'card-elements-for-wpbakery') => 'wobble-bottom',
            __( 'Wobble Skew' , 'card-elements-for-wpbakery') => 'wobble-skew',
            __( 'Buzz' , 'card-elements-for-wpbakery') => 'buzz',
            __( 'Buzz Out' , 'card-elements-for-wpbakery') => 'buzz-out',
        ),
        "edit_field_class" => "vc_col-md-2 vc_column-with-padding",
        'std' => '',
        'group' => esc_html__('Social Icon Hover',  'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => esc_html__("Choose your animation style", 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Social Area Background Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_social_hover_background_color",
        "value" => '#61ce70', 
        'group' => esc_html__('Social Icon Hover',  'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => esc_html__("social media div background color.", 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Primary Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_social_icon_hover_background_color",
        "value" => '', 
        'group' => esc_html__('Social Icon Hover',  'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => esc_html__("social media icon background color.", 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Secondary Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_style_social_icon_hover_color",
        "value" => '', 
        'group' => esc_html__('Social Icon Hover',  'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => esc_html__("social media icon color.", 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Border radius', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_profile_card_social_icon_hover_box_radius',
        'value' => array(
            __( 'default' , 'card-elements-for-wpbakery') => ' ',
            __( '0' , 'card-elements-for-wpbakery') => '0px',
            __( '10' , 'card-elements-for-wpbakery') => '10px',
            __( '15' , 'card-elements-for-wpbakery') => '15px',
            __( '20' , 'card-elements-for-wpbakery') => '20px',
            __( '25' , 'card-elements-for-wpbakery') => '25px',
            __( '30' , 'card-elements-for-wpbakery') => '30px',
            __( '35' , 'card-elements-for-wpbakery') => '35px',
            __( '50' , 'card-elements-for-wpbakery') => '50px',
        ),
        "edit_field_class" => "vc_col-md-2 vc_column-with-padding",
        'std' => '',
        'group' => esc_html__('Social Icon Hover',  'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => esc_html__("Select box border radius in.", 'card-elements-for-wpbakery'),
    ),
    array(  
        "type" => "css_editor",
        "class" => "",
        "heading" => esc_html__("Field Label", 'card-elements-for-wpbakery'),
        "param_name" => "cewb_profile_card_design_options",
        "value" => '', 
        'group' => esc_html__("Design Options", 'card-elements-for-wpbakery'),
        "description" => esc_html__("Enter description.", 'card-elements-for-wpbakery'),
    ),  
);

/*
 * Params
 */
$params = array(
    'name' => esc_html__('Profile Card Layout', 'card-elements-for-wpbakery'),
    'description' => esc_html__('Display profile card layout.', 'card-elements-for-wpbakery'),
    'base' => 'cewb_profile_card_layout',
    'class' => 'cewb_element_wrapper',
    'controls' => 'full',
    'icon' => '',
    'category' => esc_html__('Card Elements', 'card-elements-for-wpbakery'),
    'show_settings_on_create' => true,
    'params' => $profile_card_fields
);

/**
 * wpbakery param to register widget
 * 
 * @version 1.0
 * @since 1.0 
 **/
vc_map($params);
