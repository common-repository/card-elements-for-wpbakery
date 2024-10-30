<?php
/**
 * Add new custom font to Font Family selection in icon box module
 * 
 * @version 1.0
 * @since 1.0
 */ 
function cewb_add_new_icon_set_to_iconbox() {
    $param = WPBMap::getParam('vc_icon', 'type');
    $param['value'][__('FontAwesome', 'total')] = 'fontawesome';
    vc_update_shortcode_param('vc_icon', $param);
}

add_filter('init', 'cewb_add_new_icon_set_to_iconbox', 40);

/**
 * Add font picker setting to icon box module when you select your font family from the dropdown
 * 
 * @version 1.0
 * @since 1.0
 */ 
function cewb_add_font_picker() {
    vc_add_param('vc_icon', 
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'card-elements-for-wpbakery'),
            'param_name' => 'cewb_social_facebook_icon',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'fontawesome',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'fontawesome',
            )
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'card-elements-for-wpbakery'),
            'param_name' => 'cewb_social_twitter_icon',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'fontawesome',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'fontawesome',
            )
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'card-elements-for-wpbakery'),
            'param_name' => 'cewb_social_googleplus_icon',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'fontawesome',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'fontawesome',
            )
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'card-elements-for-wpbakery'),
            'param_name' => 'cewb_social_wordpress_icon',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'fontawesome',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'fontawesome',
            )
        )
    );
}

add_filter('vc_after_init', 'cewb_add_font_picker', 40);

/**
 * Add array of your fonts so they can be displayed in the font selector
 * 
 * @version 1.0
 * @since 1.0
 */ 
function cewb_icon_array() {
    return array(
        array('fab fa-facebook' => 'facebook'), // Each icon should be added as an array
        array('fab fa-facebook-f' => 'facebook-f'), // Each icon should be added as an array
        array('fab fa-facebook-square' => 'facebook-square'),
        array('fab fa-twitter' => 'twitter'),
        array('fab fa-twitter-square' => 'twitter-square'),
        array('fab fa-google-plus' => 'google-plus'),
        array('fab fa-google-plus-g' => 'google-plus-g'),
        array('fab fa-google-plus-square' => 'google-plus-square'),
        array('fab fa-wordpress' => 'wordpress'),
        array('fab fa-wordpress-simple' => 'wordpress-simple')
    );
}
add_filter('vc_iconpicker-type-fontawesome', 'cewb_icon_array');

/**
 * Register Backend and Frontend CSS Styles
 * 
 * @version 1.0
 * @since 1.0
 */ 
if(!function_exists('cewb_vc_iconpicker_base_register_css')){
    function cewb_vc_iconpicker_base_register_css() {
        wp_register_script('fontawesome-icon', CEWB_URL . 'assets/js/fontawesome-icon.js', array(), '1.0.0', true);
    }
}
add_action('vc_base_register_admin_css', 'cewb_vc_iconpicker_base_register_css');

/**
 * Enqueue Backend and Frontend CSS Styles
 * 
 * @version 1.0
 * @since 1.0
 */ 
function cewb_vc_iconpicker_editor_jscss() {
    wp_enqueue_script('fontawesome-icon');
}
add_action('vc_backend_editor_enqueue_js_css', 'cewb_vc_iconpicker_editor_jscss');
add_action('vc_frontend_editor_enqueue_js_css', 'cewb_vc_iconpicker_editor_jscss');

/**
 * Enqueue CSS in Frontend when it's used
 * 
 * @version 1.0
 * @since 1.0
 */
function cewb_enqueue_font_fontawesome($font) {
    switch ($font) {
        case 'fontawesome': wp_enqueue_style('fontawesome');
    }
}
add_action('vc_enqueue_font_icon_element', 'cewb_enqueue_font_fontawesome');
?>