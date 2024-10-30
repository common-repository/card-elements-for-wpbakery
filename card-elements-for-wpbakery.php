<?php
/**
 * Plugin Name: Card Elements for WPBakery
 * Description: Showcase useful card elements like display team profiles, testimonials and post with card style for WPBakery page builder.
 * Plugin URI: https://www.techeshta.com/product/card-elements-for-wpbakery/
 * Author: Techeshta
 * Version: 1.0.6
 * Author URI: https://www.techeshta.com
 *
 * Text Domain: card-elements-for-wpbakery
 */

/*
 * Exit if accessed directly
 */
if (!defined('ABSPATH')) {
    exit;
}

/*
 * Define variables
 */
define('CEWB_FILE', __FILE__);
define('CEWB_DIR', plugin_dir_path(CEWB_FILE));
define('CEWB_URL', plugin_dir_url(CEWB_FILE));
define('CEWB_TEXTDOMAIN', 'card-elements-for-wpbakery');

/**
 * Main Plugin Card_Elements_For_WPBakery class.
 */
class Card_Elements_For_WPBakery {
    
    /**
     * Card_Elements_For_WPBakery constructor.
     *
     * The main plugin actions registered for WordPress
     * 
     * @version 1.0
     * @since 1.0
     */
    public function __construct() {
        add_action('init', array($this, 'cewb_check_dependencies'));
        $this->hooks();
        add_action('init', array($this, 'cewb_include_files'));
    }

    /**
     * Initialize
     * 
     * @version 1.0
     * @since 1.0
     */
    public function hooks() {
        add_action('plugins_loaded', array($this, 'cewb_load_language_files'));
        add_action('wp_enqueue_scripts', array($this, 'cewb_user_scripts'));
    }
    
    /**
     * Load files
     * 
     * @version 1.0
     * @since 1.0
     */
    public function cewb_include_files() {
        if (defined('WPB_VC_VERSION')) {
            require_once CEWB_DIR . 'widgets/post-card-widget.php';
            require_once CEWB_DIR . 'widgets/profile-card-widget.php';
            require_once CEWB_DIR . 'widgets/testimonial-card-widget.php';
            require_once CEWB_DIR . 'include/post-card/functions-post-card.php';
            require_once CEWB_DIR . 'include/iconpicker-support.php';
            require_once CEWB_DIR . 'include/class-vcy-number-param.php';
        }
    }

    /**
     * Loads plugin textdomain
     * 
     * @version 1.0
     * @since 1.0
     */
    public function cewb_load_language_files() {
        load_plugin_textdomain('card-elements-for-wpbakery', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

    /**
     * Check plugin dependencies
     * Check if WPBakery plugin is installed
     * 
     * @version 1.0
     * @since 1.0
     */
    public function cewb_check_dependencies() {
        if (!defined('WPB_VC_VERSION')) {
            add_action('admin_notices', array($this, 'cewb_widget_fail_load'));
            return;
        }

        $wpbakery_version_required = '5.0';
        if (!version_compare(WPB_VC_VERSION, $wpbakery_version_required, '>=')) {
            add_action('admin_notices', array($this, 'cewb_wpbakery_update_notice'));
            return;
        }
    }
    
    /**
     * This notice will appear if WPBakery is not installed or activated or both
     * 
     * @version 1.0
     * @since 1.0
     */
    public function cewb_widget_fail_load() {
        $screen = get_current_screen();
        if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
            return;
        }

        $plugin = 'js_composer/js_composer.php';
        $file_path = 'js_composer/js_composer.php';
        $installed_plugins = get_plugins();
        if (isset($installed_plugins[$file_path])) { // check if plugin is installed
            if (!current_user_can('activate_plugins')) {
                return;
            }
            $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);
            $message = '<p><strong>' . esc_html__('Card Elements for WPBakery', 'card-elements-for-wpbakery') . '</strong>' . esc_html__(' plugin is not working because you need to activate the WPBakery plugin.', 'card-elements-for-wpbakery') . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, esc_html__('Activate WPBakery Now', 'card-elements-for-wpbakery')) . '</p>';
        } else {
            if (!current_user_can('install_plugins')) {
                return;
            }
            $buy_now_url = esc_url('https://wpbakery.com');
            $message = '<p><strong>' . esc_html__('Card Elements for WPBakery', 'card-elements-for-wpbakery') . '</strong>' . esc_html__(' plugin is not working because you need to install the WPBakery plugin.', 'card-elements-for-wpbakery') . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary" target="_blank">%s</a>', $buy_now_url, esc_html__('Get WPBakery', 'card-elements-for-wpbakery')) . '</p>';
        }
        echo '<div class="error"><p>' . wp_kses_post($message) . '</p></div>';
    }

    /**
     * Display admin notice for WPBakery update if WPBakery version is old
     * 
     * @version 1.0
     * @since 1.0
     */
    public function cewb_wpbakery_update_notice() {
        if (!current_user_can('update_plugins')) {
            return;
        }
        $upgrade_link = esc_url('https://wpbakery.com');
        $message = '<p><strong>' . esc_html__('Card Elements for WPBakery', 'card-elements-for-wpbakery') . '</strong>' . esc_html__(' plugin is not working because you are using an old version of WPBakery.', 'card-elements-for-wpbakery') . '</p>';
        $message .= '<p>' . sprintf('<a href="%s" class="button-primary" target="_blank">%s</a>', $upgrade_link, esc_html__('Get Latest WPBakery', 'card-elements-for-wpbakery')) . '</p>';
        echo '<div class="error">' . wp_kses_post($message) . '</div>';
    }
    
    /**
     *
     * Enqueue admin panel required css/js
     * 
     * @version 1.0
     * @since 1.0
     */
    public function cewb_user_scripts() {
    
        // Register and call custom number style
        wp_register_style('cewb-custom-number', CEWB_URL . 'assets/css/vc-number.css', array(), 1.0, false);
        wp_enqueue_style('cewb-custom-number');

        // Register and call common style
        wp_register_style('cewb-common-card-style', CEWB_URL . 'assets/css/common-card-style.css', array(), 1.0, false);
        wp_enqueue_style('cewb-common-card-style');

        // Register and call post card style
        wp_register_style('cewb-post-card-style', CEWB_URL . 'assets/css/post-card-style.css', array(), 1.0, false);
        wp_enqueue_style('cewb-post-card-style');

        // Register and call profile card style
        wp_register_style('cewb-profile-card-style', CEWB_URL . 'assets/css/profile-card-style.css', array(), 1.0, false);
        wp_enqueue_style('cewb-profile-card-style');

        // Register and call testimonial card style
        wp_register_style('cewb-testimonial-card-style', CEWB_URL . 'assets/css/testimonial-card-style.css', array(), 1.0, false);
        wp_enqueue_style('cewb-testimonial-card-style');

        // Register and call animate style
        wp_register_style('cewb-animate-style', CEWB_URL . 'assets/css/animate.css', array(), 1.0, false);
        wp_enqueue_style('cewb-animate-style');

        // Register and call fontawesome style
        wp_register_script('fontawesome-icon', CEWB_URL . 'assets/js/fontawesome-icon.js', array(), '1.0.0', true);
        wp_enqueue_script('fontawesome-icon');
    }
}

/*
 * Starts our plugin class, easy!
 */
new Card_Elements_For_WPBakery();
