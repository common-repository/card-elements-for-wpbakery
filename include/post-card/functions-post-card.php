<?php
/**
 * Return post category array.
 * 
 * @version 1.0
 * @since 1.0
 */
if (!function_exists('card_elements_post_categories')) {

    function card_elements_post_categories() {

        $terms = get_terms(
                array(
                    'taxonomy' => 'category',
                    'hide_empty' => true,
                )
        );

        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
                
            }
        }
        return $options;
    }

}

/**
 * Return post author array.
 * 
 * @version 1.0
 * @since 1.0
 */
if (!function_exists('card_elements_post_author')) {

    function card_elements_post_author() {

        $args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'role__not_in' => array('customer', 'subscriber'),
        );
        $authors = get_users($args);

        $options = array();
        if (!empty($authors) && !is_wp_error($authors)) {
            foreach ($authors as $author) {
                $options[$author->ID] = $author->user_login;
            }
        }
        return $options;
    }

}

/**
 * Return post tags array.
 * 
 * @version 1.0
 * @since 1.0
 */
if (!function_exists('card_elements_post_tags')) {

    function card_elements_post_tags() {

        $terms = get_terms(
                array(
                    'taxonomy' => 'post_tag',
                    'hide_empty' => true,
                )
        );

        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }
        }
        return $options;
    }

}

/**
 * Return post by author
 * 
 * @version 1.0
 * @since 1.0
 * */
if (!function_exists('post_card_posted_by')) {

    function post_card_posted_by() {
        printf(
                /* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
                '<span class="byauthor">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>', '<i class="fas fa-user" aria-hidden="true"></i>', esc_html__('Posted by', 'card-elements-for-wpbakery'), esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())
        );
    }

}

/**
 * Return post by author
 * 
 * @version 1.0
 * @since 1.0
 * */
if (!function_exists('post_card_2_posted_by')) {

    function post_card_2_posted_by() {
        printf(
                /* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
                '<span class="byauthor">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>', esc_html(get_avatar(get_the_author_meta('ID'), 40)), esc_html__('By', 'card-elements-for-wpbakery'), esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())
        );
    }

}

/**
 * Return post by date and time
 * 
 * @version 1.0
 * @since 1.0
 * */
if (!function_exists('post_card_posted_on')) { // Not Use

    function post_card_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
                $time_string, esc_attr(get_the_date(DATE_W3C)), esc_html(get_the_date()), esc_attr(get_the_modified_date(DATE_W3C)), esc_html(get_the_modified_date())
        );

        printf(
                '<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>', '<i class="fa fa-clock-o" aria-hidden="true"></i>', esc_url(get_permalink()), $time_string
        );
    }

}

/**
 * Return post by categories
 * 
 * @version 1.0
 * @since 1.0
 * */
if (!function_exists('post_card_posted_categories')) {

    function post_card_posted_categories() {
        $categories_list = get_the_category_list(__(', ', 'card-elements-for-wpbakery'));
        if ($categories_list) {
            printf(
                    /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
                    '<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>', '', esc_html__('Posted in', 'card-elements-for-wpbakery'), $categories_list
            ); // WPCS: XSS OK.
        }
    }

}

/**
 * Return post by tags
 * 
 * @version 1.0
 * @since 1.0
 * */
if (!function_exists('post_card_posted_tag')) {

    function post_card_posted_tag() {
        /* translators: used between list items, there is a space after the comma. */
        $tags_list = get_the_tag_list('', __(', ', 'card-elements-for-wpbakery'));
        if ($tags_list) {
            printf(
                    /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
                    '<div class="post-card-tags"><span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span> </div>', '<i class="fa fa-tags" aria-hidden="true"></i>', esc_html__('Tags:', 'card-elements-for-wpbakery'), $tags_list
            ); // WPCS: XSS OK.
        }
    }

}

/**
 * Return post by comment count
 * 
 * @version 1.0
 * @since 1.0
 * */
if (!function_exists('post_card_comment_count')) {

    function post_card_comment_count() {
        if (!post_password_required() && ( comments_open() || get_comments_number() )) {
            echo '<span class="comments-link">';
            echo '<i class="fa fa-comments" aria-hidden="true"></i>';

            /* translators: %s: Name of current post. Only visible to screen readers. */
            comments_popup_link(sprintf(__('Leave a comment<span class="screen-reader-text"> on %s</span>', 'card-elements-for-wpbakery'), get_the_title()));

            echo '</span>';
        }
    }

}

/**
 * Return post by image size not in use
 * 
 * @version 1.0
 * @since 1.0
 * */
if (!function_exists('post_card_image_size')) {

    function post_card_image_size() {
        global $_wp_additional_image_sizes;

        $wp_image_sizes = array();

        foreach (get_intermediate_image_sizes() as $_size) {

            if (in_array($_size, array('thumbnail', 'medium', 'medium_large', 'large'))) {

                $wp_image_sizes[$_size] = $_size . ' (' . get_option("{$_size}_size_w") . 'X' . get_option("{$_size}_size_h") . ')';
            } elseif (isset($_wp_additional_image_sizes[$_size])) {

                $wp_image_sizes[$_size] = $_size . ' (' . $_wp_additional_image_sizes[$_size]['width'] . 'X' . $_wp_additional_image_sizes[$_size]['height'] . ')';
            }
        }

        return $wp_image_sizes;
    }

}