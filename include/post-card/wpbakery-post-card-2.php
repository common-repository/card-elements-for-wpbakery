<?php
/**
 * HTML css for Post card style 2
 * 
 * @version 1.0
 * @since 1.0
*/

//google font eqnque
$field = WPBMap::getParam( 'cewb_post_card_layout', 'google_fonts' );
$google_fonts_obj = new Vc_Google_Fonts();
$fieldSettings = isset( $field['settings'], $field['settings']['fields'] ) ? $field['settings']['fields'] : array();

$google_fonts_for_category = strlen( $cewb_post_layout_category_font_family ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_post_layout_category_font_family ) : '';
if($google_fonts_for_category != '' ){
    $google_fonts_family_for_category = explode( ':', $google_fonts_for_category['values']['font_family'] );
    $google_fonts_styles_for_category = explode( ':', $google_fonts_for_category['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family_for_category[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_for_category['values']['font_family'], array(), '1.0.0' );
}
$google_fonts_for_title = strlen( $cewb_post_layout_title_font_family ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_post_layout_title_font_family ) : '';
if($google_fonts_for_title != '' ){
    $google_fonts_family_for_title = explode( ':', $google_fonts_for_title['values']['font_family'] );
    $google_fonts_styles_for_title = explode( ':', $google_fonts_for_title['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family_for_title[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_for_title['values']['font_family'], array(), '1.0.0' );
}
$google_fonts_for_excerpt = strlen( $cewb_post_layout_excerpt_font_family) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_post_layout_excerpt_font_family ) : '';
if($google_fonts_for_excerpt != '' ){
    $google_fonts_family_for_excerpt = explode( ':', $google_fonts_for_excerpt['values']['font_family'] );
    $google_fonts_styles_for_excerpt = explode( ':', $google_fonts_for_excerpt['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family_for_excerpt[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_for_excerpt['values']['font_family'], array(), '1.0.0' );
}
$google_fonts_for_read_more = strlen( $cewb_post_layout_read_more_font_family ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_post_layout_read_more_font_family ) : '';
if($google_fonts_for_read_more != '' ){
    $google_fonts_family_for_read_more = explode( ':', $google_fonts_for_read_more['values']['font_family'] );
    $google_fonts_styles_for_read_more = explode( ':', $google_fonts_for_read_more['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family_for_read_more[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_for_read_more['values']['font_family'], array(), '1.0.0' );
}
$google_fonts_for_meta = strlen( $cewb_post_layout_meta_font_family ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_post_layout_meta_font_family ) : '';
if($google_fonts_for_meta != '' ){
    $google_fonts_family_for_meta = explode( ':', $google_fonts_for_meta['values']['font_family'] );
    $google_fonts_styles_for_meta = explode( ':', $google_fonts_for_meta['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family_for_meta[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_for_meta['values']['font_family'], array(), '1.0.0');
}
$google_fonts_for_date = strlen( $cewb_post_layout_date_font_family ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $fieldSettings, $cewb_post_layout_date_font_family ) : '';
if($google_fonts_for_date != '' ){
    $google_fonts_family_for_date = explode( ':', $google_fonts_for_date['values']['font_family'] );
    $google_fonts_styles_for_date = explode( ':', $google_fonts_for_date['values']['font_style'] );
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_family_for_date[0] ), '//fonts.googleapis.com/css?family=' . $google_fonts_for_date['values']['font_family'], array(), '1.0.0');
}

//meta data string to array
$cewb_meta_data_arr = explode(",",$cewb_meta_data);
$column = "";
?>

<div class="vc_grid-item vc_clearfix vc_grid-item-zone-c-bottom vc_visible-item fadeIn animated <?php echo esc_attr($card_style) . ' ' . esc_attr($column); ?>"

style="padding:0; padding-right: <?php echo esc_attr($cewb_post_card_grid_gap) . 'px !important '; ?>; 
margin-top: <?php  echo esc_attr($cewb_post_card_rows_gap). 'px' ?>; 
margin-bottom: <?php echo esc_attr($cewb_post_card_rows_gap) . 'px' ?>; " 

>
    <div class="vc_grid-item-mini vc_clearfix">
        <div class="vc_gitem-animated-block ">
            <!-- Start Post Card 2 -->
            <article class="grid-item column">
                <div class="post-card-image post-module">
                    <!-- Thumbnail-->
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="card-image" style="border-radius: <?php echo esc_attr($cewb_post_layout_image_border_radius).'%'; ?>; >
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($cewb_image_size); ?></a>
                        </div>
                    <?php } else {
                        if ($cewb_show_title == 'true') {
                            ?>
                            <div class="noimage">
                                <h3 class="thumb_title" > <?php the_title(); ?> </h3>
                            </div>
                        <?php
                        }
                    }
                    ?>
                    <div class="post-content post-card-content-bg-box" style='background : <?php echo esc_attr($cewb_post_layout_content_box_background_color); ?>;' >
                    <?php 
                     if ($cewb_show_meta_data == 'true') {
                        if (is_array($cewb_meta_data_arr) && in_array('category', $cewb_meta_data_arr)) {  ?>   
                            <div class="card_meta post-card_category" style="padding: 0 0 <?php echo esc_attr($cewb_post_layout_content_category_spacing).'px';  ?>; ">
                                <a class="category" ><?php echo post_card_posted_categories(); ?></a>
                            </div>
                        <?php } 
                     }
                        $cewb_meta_data_arr = explode(",", $cewb_meta_data);
                        if ($cewb_show_meta_data == 'true') {
                            if (is_array($cewb_meta_data_arr) && in_array('date', $cewb_meta_data_arr)) {
                                ?>
                                <div class="date" >
                                    <div class="day" style=" color : <?php echo esc_attr($cewb_post_layout_content_date_color); ?>;
                                        padding: 0 0 <?php echo esc_attr($cewb_post_layout_content_category_spacing).'px';  ?>;font-family: <?php echo esc_attr($google_fonts_family_for_date[0]); ?>;font-weight: <?php echo esc_attr($google_fonts_styles_for_date[1]); ?>;  font-style: <?php echo esc_attr($google_fonts_styles_for_date[2]); ?>;  
                                    "><?php echo get_the_date('d M, Y'); ?></div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="card_title">
                            <?php
                            if ($cewb_show_title == 'true') {
                                $tag = $cewb_post_title_html_tag;
                                ?>
                                <<?php echo esc_attr($tag); ?> class="title post-card_title post-card-alignment"  style="  text-align :<?php echo esc_attr($cewb_post_layout_alignment); ?>; padding: 0 0 <?php echo esc_attr($cewb_post_layout_content_title_spacing); ?>; "  >
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </<?php echo esc_attr($tag); ?>>
                            <?php
                            }
                            if ($cewb_show_excerpt == 'true') {
                                if ($cewb_post_excerpt_from == 'content') {
                                    $content = get_the_content();
                                } else if ($cewb_post_excerpt_from == 'excerpt') {
                                    $content = get_the_excerpt();
                                } else {
                                    $content = get_the_content();
                                }
                                if ($cewb_show_read_more == 'true') {
                                    $read_more = '<a href="' . esc_url(get_permalink()) . '" rel="bookmark" class="entry-read-more post-card_read-more">' . ' &nbsp;' . $cewb_post_read_more_text . '</a>';
                                } else {
                                    $read_more = "";
                                }
                                ?>
                                <p class="description post-card_excerpt" style="text-align :<?php echo esc_attr($cewb_post_layout_alignment); ?>; color :<?php echo esc_attr($cewb_post_layout_content_excerpt_color); ?>; padding :0 0 <?php echo esc_attr($cewb_post_layout_content_excerpt_spacing).'px';  ?>;
                                font-family: <?php echo esc_attr($google_fonts_family_for_excerpt[0]); ?>;font-weight: <?php echo esc_attr($google_fonts_styles_for_excerpt[1]); ?>;  font-style: <?php echo esc_attr($google_fonts_styles_for_excerpt[2]); ?>; ">
                                <?php
                                echo wp_kses_post(wp_trim_words($content, $cewb_post_excerpt_length, $read_more));
                                ?>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card_action post-card-content-bg-box" style='background : <?php echo esc_attr($cewb_post_layout_content_box_background_color); ?>; padding-bottom: <?php echo esc_attr($cewb_post_layout_content_meta_spacing); ?>;' >
                        <div class="card_author">
                            <?php
                            if ($cewb_show_meta_data == 'true') {
                                if (is_array($cewb_meta_data_arr) && in_array('author', $cewb_meta_data_arr)) {
                                    post_card_2_posted_by();
                                }
                                if (is_array($cewb_meta_data_arr) && in_array('comments', $cewb_meta_data_arr)) {
                                    post_card_comment_count();
                                }
                                if (is_array($cewb_meta_data_arr) && in_array('tags', $cewb_meta_data_arr)) {
                                    post_card_posted_tag();
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </article>
            <!-- End Post Card -->
        </div>
    </div>
</div>

<style>
    .post-card-style-2 .card_meta a {
        color: <?php echo esc_attr($cewb_post_layout_content_category_color).'!important'; ?>;
        font-family: <?php echo esc_attr($google_fonts_family_for_category[0]); ?>;
        font-weight: <?php echo esc_attr($google_fonts_styles_for_category[1]); ?>;  
        font-style: <?php echo esc_attr($google_fonts_styles_for_category[2]); ?>; 
    }
    .post-card-style-2 .description .entry-read-more {
        font-family: <?php echo esc_attr($google_fonts_family_for_read_more[0]); ?>;
        font-weight: <?php echo esc_attr($google_fonts_styles_for_read_more[1]); ?>;  
        font-style: <?php echo esc_attr($google_fonts_styles_for_read_more[2]); ?>; 
    }
    .post-card-style-2 .card_meta a:hover {
        color: <?php echo esc_attr($cewb_post_layout_content_category_hover_color).'!important'; ?>;
    }
    .post-card-style-2 .card_title .title a {
        color :<?php echo esc_attr($cewb_post_layout_content_title_color); ?>;
        font-family: <?php echo esc_attr($google_fonts_family_for_title[0]); ?>;
        font-weight: <?php echo esc_attr($google_fonts_styles_for_title[1]); ?>;  
        font-style: <?php echo esc_attr($google_fonts_styles_for_title[2]); ?>;  
    }
    .post-card-style-2 .card_title .title a:hover {
        color :<?php echo esc_attr($cewb_post_layout_content_title_hover_color); ?>;
    }
    .post-card-style-2 .card_author .fa {
        color : <?php echo esc_attr($cewb_post_layout_content_meta_icon_color); ?>;
    } 
    .post-card-style-2 .card_author span.author.vcard ,
    .post-card-style-2 .card_author .comments-link a{
        color: <?php echo esc_attr($cewb_post_layout_content_meta_text_color); ?>;
        font-family: <?php echo esc_attr($google_fonts_family_for_meta[0]); ?>;
        font-weight: <?php echo esc_attr($google_fonts_styles_for_meta[1]); ?>;  
        font-style: <?php echo esc_attr($google_fonts_styles_for_meta[2]); ?>;
    }
</style>
