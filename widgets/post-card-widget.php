<?php
/**
 * Display Post Card layout element
 * 
 * @version 1.0
 * @since 1.0 
 **/
function cewb_post_card_shortcode($atts, $content = null, $shortcode_handle = '') {
    $default_atts = array(
        'cewb_post_card_style' => 'post-card-style-1',
        'cewb_post_columns' => '3',
        'cewb_number_of_post' => 6,
        'cewb_image_size' => 'thumbnail',
        'cewb_show_title' => 'true',
        'cewb_post_title_html_tag' => 'h2',
        'cewb_show_excerpt' => 'true',
        'cewb_post_excerpt_length' => '25',
        'cewb_post_excerpt_from' => 'content',
        'cewb_show_read_more' => 'false',
        'cewb_post_read_more_text' => '',
        'cewb_show_meta_data' => 'true',
        'cewb_meta_data' => 'author,date,comments,tags,category',
        'cewb_post_order_by' => 'post_date',
        'cewb_post_sort_by' => 'asc',
        'cewb_post_card_grid_gap' => '10',
        'cewb_post_card_rows_gap' => '0',
        'cewb_post_layout_alignment' => 'left',
        'cewb_post_layout_image_border_radius' => '0',
        'cewb_post_layout_image_overlay' => '',
        'cewb_post_layout_category_background_overlay' => '#e74c3c',
        'cewb_post_layout_date_background_color' => '#e74c3c',
        'cewb_post_layout_content_box_background_color' => '',
        'cewb_post_layout_content_date_color' => '',
        'cewb_post_layout_content_category_color' => '',
        'cewb_post_layout_content_category_hover_color' => '',
        'cewb_post_layout_content_category_spacing' => '',
        'cewb_post_layout_content_title_color' => '',
        'cewb_post_layout_content_title_hover_color' => '',
        'cewb_post_layout_content_title_spacing' => '',
        'cewb_post_layout_content_excerpt_color' => '',
        'cewb_post_layout_content_excerpt_spacing' => '',
        'cewb_post_layout_content_read_more_color' => '',
        'cewb_post_layout_content_meta_icon_color' => '',
        'cewb_post_layout_content_meta_text_color' => '',
        'cewb_post_layout_content_meta_spacing' => '',
        'cewb_post_layout_category_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_post_layout_title_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_post_layout_excerpt_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_post_layout_read_more_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_post_layout_meta_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_post_layout_date_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal'
    );

    $atts = shortcode_atts($default_atts, $atts);
    foreach ($atts as $sl_key => $sl_value){
        //remove unwanted ” & ″
        $atts[$sl_key] = str_replace(array('″','”'), '', html_entity_decode($sl_value));
    }   

    //extract for make value of here key
    extract($atts);

    ob_start();
    $cewb_post_columns = "";
    $card_style = $cewb_post_card_style;
    if ($cewb_post_columns == "1") {
        $column = "vc_col-sm-12";
    } else if ($cewb_post_columns == "2") {
        $column = "vc_col-sm-6";
    } else if ($cewb_post_columns == "3") {
        $column = "vc_col-sm-4";
    } else if ($cewb_post_columns == "4") {
        $column = "vc_col-sm-3";
    } else if ($cewb_post_columns == "6") {
        $column = "vc_col-sm-2";
    }

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $cewb_number_of_post,
        'post_status' => 'publish',
        'orderby' => $cewb_post_order_by,
        'order' => $cewb_post_sort_by
    );
    
    //for uniq global class
    $custom_uniq_class = wp_rand(9712 , 205553);

    $blog_posts = new WP_Query($args);
    if ($blog_posts->have_posts()) :
        ?>
        <div class="vc_grid-container-wrapper vc_clearfix" style='<?php $cewb_post_card_design_options ?>' >
            <div class="vc_grid-container vc_clearfix wpb_content_element vc_basic_grid">
                <div class="vc_pageable-slide-wrapper vc_clearfix">
                    <?php
                    while ($blog_posts->have_posts()) : $blog_posts->the_post();
                        if ($cewb_post_card_style == 'post-card-style-1') {
                            include CEWB_DIR . 'include/post-card/wpbakery-post-card-1.php';
                        } else if ($cewb_post_card_style == 'post-card-style-2') {
                            include CEWB_DIR . 'include/post-card/wpbakery-post-card-2.php';
                        } else if ($cewb_post_card_style == 'post-card-style-6') {
                            include CEWB_DIR . 'include/post-card/wpbakery-post-card-6.php';
                        }
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php
    endif;
    return ob_get_clean();
}

add_shortcode('cewb_post_card_layout', 'cewb_post_card_shortcode');

/*
 * All post card styles
 */
$post_card_style = array(
    __('Card Style 1', 'card-elements-for-wpbakery') => 'post-card-style-1',
    __('Card Style 2', 'card-elements-for-wpbakery') => 'post-card-style-2',
    __('Card Style 6', 'card-elements-for-wpbakery') => 'post-card-style-6'
);

/*
 * How many post columns
 */
$post_columns = array(
    __('1', 'card-elements-for-wpbakery') => '1',
    __('2', 'card-elements-for-wpbakery') => '2',
    __('3', 'card-elements-for-wpbakery') => '3',
    __('4', 'card-elements-for-wpbakery') => '4',
    __('6', 'card-elements-for-wpbakery') => '6'
);

/*
 * Post image size
 */
$post_image_size = array(
    __('Thumbnail - 150 x 150', 'card-elements-for-wpbakery') => 'thumbnail',
    __('Medium - 300 x 300', 'card-elements-for-wpbakery') => 'medium',
    __('Medium Large - 768 x 0', 'card-elements-for-wpbakery') => 'medium_large',
    __('Large - 1024 x 1024', 'card-elements-for-wpbakery') => 'large',
    __('1536x1536 - 1536 x 1536', 'card-elements-for-wpbakery') => '1536x1536',
    __('2048x2048 - 2048 x 2048', 'card-elements-for-wpbakery') => '2048x2048',
    __('Post Card Thumb - 680 x 460', 'card-elements-for-wpbakery') => 'post_card_thumb',
    __('Full', 'card-elements-for-wpbakery') => 'full'
);

/*
 * Title HTML Tag
 */
$post_title_html_tag = array(
    __('H1', 'card-elements-for-wpbakery') => 'h1',
    __('H2', 'card-elements-for-wpbakery') => 'h2',
    __('H3', 'card-elements-for-wpbakery') => 'h3',
    __('H4', 'card-elements-for-wpbakery') => 'h4',
    __('H5', 'card-elements-for-wpbakery') => 'h5',
    __('H6', 'card-elements-for-wpbakery') => 'h6',
    __('div', 'card-elements-for-wpbakery') => 'div',
    __('span', 'card-elements-for-wpbakery') => 'span',
    __('p', 'card-elements-for-wpbakery') => 'p'
);

/*
 * Excerpt From
 */
$post_excerpt_from = array(
    __('Content', 'card-elements-for-wpbakery') => 'content',
    __('Excerpt', 'card-elements-for-wpbakery') => 'excerpt'
);

/*
 * Order By
 */
$post_order_by = array(
    __('Date', 'card-elements-for-wpbakery') => 'post_date',
    __('Title', 'card-elements-for-wpbakery') => 'post_title',
    __('Menu Order', 'card-elements-for-wpbakery') => 'menu_order',
    __('Random', 'card-elements-for-wpbakery') => 'rand'
);

/*
 * Sort By
 */
$post_sort_by = array(
    __('ASC', 'card-elements-for-wpbakery') => 'asc',
    __('DESC', 'card-elements-for-wpbakery') => 'desc'
);

/*
 * Post Card Visual Composer Elements
 */
$post_card_fields = array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Post Card Style', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_card_style',
        'value' => $post_card_style,
        'admin_label' => true,
        'description' => esc_html__('Select post card style.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Columns', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_columns',
        'value' => $post_columns,
        'std' => '3',
        'admin_label' => true,
        'description' => esc_html__('Select post columns.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Display Number of Posts', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_number_of_post',
        'value' => '6',
        'admin_label' => true,
        'description' => esc_html__('Enter number of posts. e.g. 6.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Image Size', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_image_size',
        'value' => $post_image_size,
        'admin_label' => true,

        'description' => esc_html__('Select image size.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Show Title', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_show_title',
        'value' => 'true',
        'admin_label' => true,
        'std' => 'true',
        'description' => esc_html__('Check/Uncheck to show/hide the title.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Title HTML Tag', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_title_html_tag',
        'value' => $post_title_html_tag,
        'std' => 'h2',
        'admin_label' => true,
        'description' => esc_html__('Select title HTML tag.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Show Excerpt', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_show_excerpt',
        'value' => 'true',
        'admin_label' => true,
        'std' => 'true',
        'description' => esc_html__('Check/Uncheck to show/hide the excerpt.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Excerpt Length', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_excerpt_length',
        'value' => '25',
        'admin_label' => true,
        'description' => esc_html__('Enter excerpt length for posts. e.g. 25.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Excerpt From', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_excerpt_from',
        'value' => $post_excerpt_from,
        'admin_label' => true,
        'description' => esc_html__('Select excerpt from.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Show Read More', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_show_read_more',
        'value' => false,
        'admin_label' => true,
        'description' => esc_html__('Check/Uncheck to show/hide the read more.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Read More Text', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_read_more_text',
        'value' => false,
        'admin_label' => true,
        'description' => esc_html__('Enter read more text for posts. e.g. Read More.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Show Meta Data', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_show_meta_data',
        'value' => 'true',
        'admin_label' => true,
        'std' => 'true',
        'description' => esc_html__('Check/Uncheck to show/hide the meta data.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Meta Data', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_meta_data',
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        'value' => array(
            __('Author', 'card-elements-for-wpbakery') => 'author',
            __('Date', 'card-elements-for-wpbakery') => 'date',
            __('Comments', 'card-elements-for-wpbakery') => 'comments',
            __('Tags', 'card-elements-for-wpbakery') => 'tags',
            __('Category', 'card-elements-for-wpbakery') => 'category',
        ),
        'admin_label' => true,
        'std' => 'author,date,comments,tags,category',
        'description' => esc_html__('Select the meta data you want to display.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Order By', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_order_by',
        'value' => $post_order_by,
        'admin_label' => true,
        'description' => esc_html__('Select order by.', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Sort By', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_sort_by',
        'value' => $post_sort_by,
        'admin_label' => true,
        'description' => esc_html__('Select sort by.', 'card-elements-for-wpbakery'),
    ),
    // style options start here
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Grid Gap', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_card_grid_gap',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__('Set layout grid gap e.g. 30', 'card-elements-for-wpbakery'),
        'value'			=> '10',
        'suffix' 		=> 'px',
        'group' 		=> esc_html__('Layout', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Rows Gap', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_card_rows_gap',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__('Set layout row gap e.g. 35', 'card-elements-for-wpbakery'),
        'value'			=> '35',
        'suffix' 		=> 'px',
        'group' 		=> esc_html__('Layout', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Alignment', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_layout_alignment',
        'value' => array(
            __( 'Left', 'card-elements-for-wpbakery'  ) => 'left',
            __( 'Center', 'card-elements-for-wpbakery'  ) => 'center',
            __( 'Right', 'card-elements-for-wpbakery'  ) => 'right',
            __( 'Justify' , 'card-elements-for-wpbakery') => 'justify',
        ),
        'std' => 'left',
        'group' => esc_html__('Layout', 'card-elements-for-wpbakery'),
        'description' => esc_html__('Set layout alignment', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Border Radius', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_layout_image_border_radius',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__('Set image border radius', 'card-elements-for-wpbakery'),
        'value'			=> '0',
        'dependency' => array(
            'element' => 'cewb_post_card_style',
            'value_not_equal_to' => 'post-card-style-3',
        ),
        'dependency' => array(
            'element' => 'cewb_post_card_style',
            'value_not_equal_to' => 'post-card-style-6',
        ),
        'suffix' 		=> '%',
        'group' 		=> esc_html__('Image', 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Image Overlay', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_image_overlay",
	"value" => false,
        'group' => esc_html__('Image', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_post_card_style',
            'value_not_equal_to' => 'post-card-style-6',
        ),
        "description" => esc_html__("Set overlay for layout Image", 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Category Background Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_category_background_overlay",
        "value" => '#e74c3c', 
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),

        'dependency' => array(
            'element' => 'cewb_post_card_style',
            'value_not_equal_to' => array('post-card-style-6', 'post-card-style-2'),
        ),
        "group" => esc_html__("Background Color", 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Date background Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_date_background_color",
        "value" => '#e74c3c', 
        "group" => esc_html__("Background Color", 'card-elements-for-wpbakery'),
        "dependency" => array(
            "element" => "cewb_meta_data",
            "value" => "date",
        ),
        'dependency' => array(
            'element' => 'cewb_post_card_style',
            'value_not_equal_to' => 'post-card-style-6',
        ),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Content Box Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_content_box_background_color",
        "value" => false, 
        'group' => esc_html__("Background Color", 'card-elements-for-wpbakery'),
        "dependency" => array(
            "element" => "cewb_meta_data",
            "value" => "content",
        ),
    ),
    // Date start
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Date Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_content_date_color",
        "value" => '#54595F', 
        'group' => esc_html__('Date', 'card-elements-for-wpbakery'),
        "dependency" => array(
            "element" => "cewb_meta_data",
            "value" => "date",
        ),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_date_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        "dependency" => array(
            "element" => "cewb_meta_data",
            "value" => "date",
        ),
        'group' => esc_html__('Date', 'card-elements-for-wpbakery'),
    ),
    // Category start
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Category Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_content_category_color",
        "value" => '#54595F', 
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        'group' => esc_html__('Category', 'card-elements-for-wpbakery'),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Category Hover Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_content_category_hover_color",
        "value" => '#54595F', 
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        'group' => esc_html__('Category', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Spacing For Category', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_layout_content_category_spacing',
        'edit_field_class' => 'vc_col-sm-6',
        'dependency' => array(
            'element' => 'cewb_show_meta_data',
            'value' => 'true',
        ),   
        'value'			=> '0',
        'suffix' 		=> 'px',
        'group' 		=> esc_html__('Category', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_category_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        'dependency' => array(
            'element' => 'cewb_show_meta_data',
            'value' => 'true',
        ), 
        'group' => esc_html__('Category', 'card-elements-for-wpbakery'),
    ),
    // Title start
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Title Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_content_title_color",
        "value" => '#54595F', 
        "group" => esc_html__('Title', 'card-elements-for-wpbakery'),
        "dependency" => array(
            "element" => "cewb_show_title",
            "value" => "true",
        ),
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Title Color hover', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_content_title_hover_color",
        "value" => '#54595F', 
        "dependency" => array(
            "element" => "cewb_show_title",
            "value" => "true",
        ),
        "group" => esc_html__('Title', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Spacing For Title', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_layout_content_title_spacing',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__('Set spacing bottom', 'card-elements-for-wpbakery'),
        'value'			=> '0',
        'suffix' 		=> 'px',
        'dependency' => array(
            'element' => 'cewb_show_title',
            'value' => 'true',
        ),
        'group' 		=> esc_html__('Title', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_title_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        'dependency' => array(
            'element' => 'cewb_show_title',
            'value' => 'true',
        ),
        'group' => esc_html__('Title', 'card-elements-for-wpbakery'),
    ),
    //excerpt start
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Excerpt Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_content_excerpt_color",
        "value" => '', 
        'group' => esc_html__('Excerpt', 'card-elements-for-wpbakery'),
        'dependency' => array(
            'element' => 'cewb_show_excerpt',
            'value' => 'true',
        ),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Spacing For Excerpt', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_layout_content_excerpt_spacing',
        'edit_field_class' => 'vc_col-sm-6',
        'value'			=> '0',
        'suffix' 		=> 'px',
        "dependency" => array(
            "element" => "cewb_show_excerpt",
            "value" => "true",
        ),
        'group' 		=> esc_html__('Excerpt', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_excerpt_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        'dependency' => array(
            'element' => 'cewb_show_excerpt',
            'value' => 'true',
        ),
        'group' => esc_html__('Excerpt', 'card-elements-for-wpbakery'),
    ),
    //read more start
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Read More color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_content_read_more_color",
        "value" => '#61CE70', 
        "dependency" => array(
            "element" => "cewb_show_read_more",
            "value" => "true",
        ),
        'group' => esc_html__('Read more', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_read_more_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        "dependency" => array(
            "element" => "cewb_show_read_more",
            "value" => "true",
        ),
        'group' => esc_html__('Read more', 'card-elements-for-wpbakery'),
    ),
    //meta start
    array(
        'type' => 'colorpicker',
        "class" => '',
        "heading" => esc_html__('Meta Icon Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_content_meta_icon_color",
        "value" => '', 
        'group' => esc_html__('Meta', 'card-elements-for-wpbakery'),
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
    ),
    array(
        'type' => 'colorpicker',
        "class" => '',
        "heading" => esc_html__('Meta Text Color', 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_layout_content_meta_text_color",
        "value" => '', 
        'group' => esc_html__('Meta', 'card-elements-for-wpbakery'),
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
    ),
    array(
        'type' => 'vc_number',
        'heading' => esc_html__('Spacing for meta', 'card-elements-for-wpbakery'),
        'param_name' => 'cewb_post_layout_content_meta_spacing',
        'edit_field_class' => 'vc_col-sm-6',
        'value'			=> '0',
        'suffix' 		=> 'px',
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        'group' 		=> esc_html__('Meta', 'card-elements-for-wpbakery'),
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_meta_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', 'card-elements-for-wpbakery'),
                'font_style_description' => esc_html__('Select font styling.', 'card-elements-for-wpbakery'),
            )
        ),
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        'group' => esc_html__('Meta', 'card-elements-for-wpbakery'),
    ),
    array(  
        "type" => "css_editor",
        "class" => "",
        "heading" => esc_html__("Field Label", 'card-elements-for-wpbakery'),
        "param_name" => "cewb_post_card_design_options",
        "value" => '', 
        'group' => esc_html__('Design Options', 'card-elements-for-wpbakery'),
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        "description" => esc_html__("Enter description.", 'card-elements-for-wpbakery'),
    ),
);

/*
 * Params
 */
$params = array(
    'name' => esc_html__('Post Card Layout', 'card-elements-for-wpbakery'),
    'description' => esc_html__('Display Post Card Layout.', 'card-elements-for-wpbakery'),
    'base' => 'cewb_post_card_layout',
    'class' => 'cewb_element_wrapper',
    'controls' => 'full',
    'icon' => '',
    'category' => esc_html__('Card Elements', 'card-elements-for-wpbakery'),
    'show_settings_on_create' => true,
    'params' => $post_card_fields
);

/**
 * wpbakery param to register widget
 * 
 * @version 1.0
 * @since 1.0 
 **/
vc_map($params);
