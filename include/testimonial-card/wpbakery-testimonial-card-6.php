<?php
/**
 * HTML css for testimonial card style 6
 * 
 * @version 1.0
 * @since 1.0
*/

if ($cewb_testimonial_image == '') {
    $cewb_testimonial_image = CEWB_URL . 'images/person-placeholder.jpg';
}else{
    $cewb_testimonial_image = wp_get_attachment_image_src($cewb_testimonial_image, "full")[0];
}
$field = WPBMap::getParam( 'cewb_testimonial_card_layout', 'google_fonts' );
$google_fonts_obj = new Vc_Google_Fonts();
$fieldSettings = isset( $field['settings'], $field['settings']['fields'] ) ? $field['settings']['fields'] : array();

$google_fonts_data = strlen( $cewb_testimonial_card_style_name_font_style ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_testimonial_card_style_name_font_style ) : '';
if($google_fonts_data != '' ){
    $google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
    $google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'], array(), '1.0.0' );
}

$google_fonts_data_desc = strlen( $cewb_testimonial_card_style_description_font_style ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_testimonial_card_style_description_font_style ) : '';
if($google_fonts_data_desc != '' ){
    $google_fonts_family_desc = explode( ':', $google_fonts_data_desc['values']['font_family'] );
    $google_fonts_styles_desc = explode( ':', $google_fonts_data_desc['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family_desc[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data_desc['values']['font_family'], array(), '1.0.0' );
}

$google_fonts_data_pos = strlen( $cewb_testimonial_card_style_position_font_style ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_testimonial_card_style_position_font_style ) : '';
if($google_fonts_data_pos != '' ){
    $google_fonts_family_pos = explode( ':', $google_fonts_data_pos['values']['font_family'] );
    $google_fonts_styles_pos = explode( ':', $google_fonts_data_pos['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family_pos[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data_pos['values']['font_family'], array(), '1.0.0' );
}
?>
<div class="testimonial-card-style-6">
    <div class="testimonial6">
        <div class="pic">
            <img src="<?php echo esc_url($cewb_testimonial_image); ?>">
        </div>
        <?php if ($cewb_display_testimonial_description == 'true') { ?>
            <p class="description " style = 'color: <?php echo esc_attr($cewb_testimonial_card_style_description_color) ; ?> ; text-align : <?php echo esc_attr($cewb_testimonial_card_style_description_alignment); ?>; font-size : <?php echo esc_attr($cewb_testimonial_card_style_description_font_size.'px'); ?>; font-family: <?php echo esc_attr($google_fonts_family_desc[0]); ?>;  font-weight: <?php echo esc_attr($google_fonts_styles_desc[1]); ?>;  font-style: <?php echo esc_attr($google_fonts_styles_desc[2]); ?>; '><?php echo esc_html($cewb_testimonial_description ); ?></p>
        <?php } ?>
        <h3 class="name  " style = 'color: <?php echo esc_attr($cewb_testimonial_card_style_name_color.'!important'); ?> ; text-align : <?php echo esc_attr($cewb_testimonial_card_style_name_alignment); ?>; font-size : <?php echo esc_attr($cewb_testimonial_card_style_name_font_size.'px'); ?>; font-family: <?php echo esc_attr($google_fonts_family[0]); ?>; font-weight: <?php echo esc_attr($google_fonts_styles[1]); ?>; font-style: <?php echo esc_attr($google_fonts_styles[2]); ?>;  
        '><?php echo esc_html($cewb_testimonial_name); ?></h3>
        <span class="post " style = ' color: <?php echo esc_attr($cewb_testimonial_card_style_position_color); ?> ; text-align : <?php echo esc_attr($cewb_testimonial_card_style_position_alignment); ?>; font-size : <?php echo esc_attr($cewb_testimonial_card_style_position_font_size.'px'); ?>; font-family: <?php echo esc_attr($google_fonts_family_pos[0]); ?>;font-weight: <?php echo esc_attr($google_fonts_styles_pos[1]); ?>; font-style: <?php echo esc_attr($google_fonts_styles_pos[2]); ?>; 
        '><?php echo esc_html($cewb_testimonial_position); ?></span>
    </div>
</div>