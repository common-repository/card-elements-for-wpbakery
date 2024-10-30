<?php
/**
 * HTML css for Profile card style 11
 * 
 * @version 1.0
 * @since 1.0
*/

$cewb_social_facebook_url = vc_build_link($cewb_social_facebook_url);
$cewb_social_twitter_url = vc_build_link($cewb_social_twitter_url);
$cewb_social_googleplus_url = vc_build_link($cewb_social_googleplus_url);
$cewb_social_wordpress_url = vc_build_link($cewb_social_wordpress_url);
if ($cewb_profile_image == '') {
    $cewb_profile_image = CEWB_URL . 'images/person-placeholder.jpg';
}else{
    $cewb_profile_image = wp_get_attachment_image_src($cewb_profile_image, "full")[0];
}
if( $cewb_profile_background_image == ''){
    $cewb_profile_background_image = ' ';
}else{
    $cewb_profile_background_image = wp_get_attachment_image_src($cewb_profile_background_image, "full")[0];
}

$field = WPBMap::getParam( 'cewb_profile_card_layout', 'google_fonts' );
$google_fonts_obj = new Vc_Google_Fonts();
$fieldSettings = isset( $field['settings'], $field['settings']['fields'] ) ? $field['settings']['fields'] : array();

$google_fonts_for_name = strlen( $cewb_profile_card_style_name_font_family ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_profile_card_style_name_font_family ) : '';
if($google_fonts_for_name != '' ){
    $google_fonts_family_for_name = explode( ':', $google_fonts_for_name['values']['font_family'] );
    $google_fonts_styles_for_name = explode( ':', $google_fonts_for_name['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family_for_name[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_for_name['values']['font_family'], array(), '1.0.0' );
}

$google_fonts_for_pos = strlen( $cewb_profile_card_style_position_font_family ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_profile_card_style_position_font_family ) : '';
if($google_fonts_for_pos != '' ){
    $google_fonts_family_for_pos = explode( ':', $google_fonts_for_pos['values']['font_family'] );
    $google_fonts_styles_for_pos = explode( ':', $google_fonts_for_pos['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family_for_pos[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_for_pos['values']['font_family'], array(), '1.0.0' );
}

?>

<div class="profile-card-style-11 <?php echo 'profile_card_class_'.esc_attr($custom_uniq_class);?>" style="background-image: url(<?php echo esc_url($cewb_profile_image); ?>);">
    <div class="triangle-div profile-triangle-background-dynamic-style">
    </div>
    <div class="title">
        <div class="name profile-name-dynamic-style profile-name-background-dynamic-style " style='font-family: <?php echo esc_attr($google_fonts_family_for_name[0]); ?>;font-weight: <?php echo esc_attr($google_fonts_styles_for_name[1]); ?>;  font-style: <?php echo esc_attr($google_fonts_styles_for_name[2]); ?>;'><?php echo esc_html($cewb_profile_name); ?></div>
        <div class="position profile-position-dynamic-style profile-position-background-dynamic-style " style="font-family: <?php echo esc_attr($google_fonts_family_for_pos[0]); ?>;font-weight: <?php echo esc_attr($google_fonts_styles_for_pos[1]); ?>;  font-style: <?php echo esc_attr($google_fonts_styles_for_pos[2]); ?>;"><?php echo esc_html($cewb_profile_position); ?></div>
    </div>
    <?php if( $cewb_social_icon_value === 'true'){ ?>
        <div class="wpbakery-social-icons-wrapper team-member__socialmedia profile-social-background-dynamic-style">
            <?php if (!empty($cewb_social_facebook_icon)) { ?>
                <a class="wpbakery-icon wpbakery-social-icon profile-social-icon-background-dynamic-style cewb-animation-<?php echo esc_attr($cewb_profile_card_social_icon_animation); ?>" href="<?php echo esc_url($cewb_social_facebook_url['url']); ?>" target="<?php echo (strlen($cewb_social_facebook_url['target']) > 0 ? esc_attr($cewb_social_facebook_url['target']) : '_self'); ?>" title="<?php echo esc_attr($cewb_social_facebook_url['title']); ?>" rel="<?php echo esc_attr($cewb_social_facebook_url['rel']); ?>">
                    <i class="<?php echo esc_attr($cewb_social_facebook_icon); ?> profile-social-icon-color-dynamic-style "></i>
                </a>
            <?php } ?>
            <?php if (!empty($cewb_social_twitter_icon)) { ?>
                <a class="wpbakery-icon wpbakery-social-icon profile-social-icon-background-dynamic-style cewb-animation-<?php echo esc_attr($cewb_profile_card_social_icon_animation); ?>" href="<?php echo esc_url($cewb_social_twitter_url['url']); ?>" target="<?php echo (strlen($cewb_social_twitter_url['target']) > 0 ? esc_attr($cewb_social_twitter_url['target']) : '_self'); ?>" title="<?php echo esc_attr($cewb_social_twitter_url['title']); ?>" rel="<?php echo esc_attr($cewb_social_twitter_url['rel']); ?>">
                    <i class="<?php echo esc_attr($cewb_social_twitter_icon); ?> profile-social-icon-color-dynamic-style cewb-animation-<?php echo esc_attr($cewb_profile_card_social_icon_animation); ?>"></i>
                </a>
            <?php } ?>
            <?php if (!empty($cewb_social_googleplus_icon)) { ?>
                <a class="wpbakery-icon wpbakery-social-icon profile-social-icon-background-dynamic-style cewb-animation-<?php echo esc_attr($cewb_profile_card_social_icon_animation); ?>" href="<?php echo esc_url($cewb_social_googleplus_url['url']); ?>" target="<?php echo (strlen($cewb_social_googleplus_url['target']) > 0 ? esc_attr($cewb_social_googleplus_url['target']) : '_self'); ?>" title="<?php echo esc_attr($cewb_social_googleplus_url['title']); ?>" rel="<?php echo esc_attr($cewb_social_googleplus_url['rel']); ?>">
                    <i class="<?php echo esc_attr($cewb_social_googleplus_icon); ?> profile-social-icon-color-dynamic-style "></i>
                </a>
            <?php } ?>
            <?php if (!empty($cewb_social_wordpress_icon)) { ?>
                <a class="wpbakery-icon wpbakery-social-icon profile-social-icon-background-dynamic-style cewb-animation-<?php echo esc_attr($cewb_profile_card_social_icon_animation); ?>" href="<?php echo esc_url($cewb_social_wordpress_url['url']); ?>" target="<?php echo (strlen($cewb_social_wordpress_url['target']) > 0 ? esc_attr($cewb_social_wordpress_url['target']) : '_self'); ?>" title="<?php echo esc_attr($cewb_social_wordpress_url['title']); ?>" rel="<?php echo esc_attr($cewb_social_wordpress_url['rel']); ?>">
                    <i class="<?php echo esc_attr($cewb_social_wordpress_icon); ?> profile-social-icon-color-dynamic-style "></i>
                </a>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<style>
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-name-dynamic-style{
        color: <?php echo esc_attr($cewb_profile_card_style_name_color).'!important'; ?> ;
        text-align : <?php echo esc_attr($cewb_profile_card_style_name_alignment) ; ?>;
        font-size : <?php echo esc_attr($cewb_profile_card_style_name_font_size).'px !important'; ?>; 
    }
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-position-dynamic-style{
        color: <?php echo esc_attr($cewb_profile_card_style_position_color) ; ?> ;
        text-align : <?php echo esc_attr($cewb_profile_card_style_position_alignment) ; ?>;
        font-size : <?php echo esc_attr($cewb_profile_card_style_position_font_size).'px !important'; ?>; 
    }
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-name-background-dynamic-style{
        background : <?php echo esc_attr($cewb_profile_card_style_name_div_background_color) ; ?>;
    }
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-position-background-dynamic-style{
        background : <?php echo esc_attr($cewb_profile_card_style_position_div_background_color) ; ?>;
    }
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-triangle-background-dynamic-style{
        border-top: solid 30px <?php echo esc_attr($cewb_profile_card_style_triangle_div_background_color) ; ?>;
        border-left: solid 30px <?php echo esc_attr($cewb_profile_card_style_triangle_div_background_color) ; ?>;
    }
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-social-background-dynamic-style{
        background : <?php echo esc_attr($cewb_profile_card_style_social_background_color); ?>;
    }
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-social-icon-background-dynamic-style{
        background : <?php echo esc_attr($cewb_profile_card_style_social_icon_background_color).'!important'; ?>;
        border-radius : <?php echo esc_attr($cewb_profile_card_social_icon_box_radius) ; ?>;
    }
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-social-icon-color-dynamic-style{
        color : <?php echo esc_attr($cewb_profile_card_style_social_icon_color) ; ?>;
        font-size : <?php echo esc_attr($cewb_profile_card_social_icon_size); ?>;
    }
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-social-background-dynamic-style:hover{
        background : <?php echo esc_attr($cewb_profile_card_style_social_hover_background_color); ?>;
    }
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-social-icon-background-dynamic-style:hover{
        background : <?php echo esc_attr($cewb_profile_card_style_social_icon_hover_background_color).'!important'; ?>;
        border-radius : <?php echo esc_attr($cewb_profile_card_social_icon_hover_box_radius) ; ?>;
    }
    .profile_card_class_<?php echo esc_attr($custom_uniq_class) ; ?>.profile-card-style-11 .profile-social-icon-color-dynamic-style:hover{
        color : <?php echo esc_attr($cewb_profile_card_style_social_icon_hover_color) ; ?>;
    }
</style>