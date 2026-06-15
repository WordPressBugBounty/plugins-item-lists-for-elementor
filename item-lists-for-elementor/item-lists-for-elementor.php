<?php
/*
 * Plugin Name: Item Lists for Elementor
 * Description: Item Lists for Elementor: Best Elementor Bullet List & List Widget Plugin for WordPress.
 * Plugin URI: https://www.techeshta.com/product/item-lists-for-elementor/
 * Author: Techeshta
 * Version: 1.4
 * Author URI: https://www.techeshta.com
 * Elementor tested up to: 4.1.3
 * Elementor Pro tested up to: 4.1.1
 * Text Domain: item-lists-for-elementor
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*
 * Define Plugin URL and Directory Path
 */
define('ILE_URL', plugins_url('/', __FILE__));  // Define Plugin URL
define('ILE_PATH', plugin_dir_path(__FILE__));  // Define Plugin Directory Path
define('ILE_DOMAIN', 'item-lists-for-elementor'); // Define Text Domain

/**
 * Main Plugin item-lists-for-elementor class.
 *
 * @access public
 * @since  1.0.0
 */
if (!class_exists('item_lists_elementor')) :
class item_lists_elementor {

	/**
     * ILE constructor.
     * The main plugin actions registered for WordPress
     *
     * @access public
     * @since  1.0.0
    */
    public function __construct() {
		$this->hooks();
		require_once ILE_PATH . 'widgets/elementor-helper.php';
		require_once ILE_PATH . 'widgets/elementor-dependency.php';
    }

	/**
	* Initialize
	*/
	public function hooks() {
        add_action('elementor/widgets/widgets_registered', array($this, 'item_lists_widget_register'));
        add_action('wp_enqueue_scripts', array($this, 'item_lists_widget_script_register'));
        add_action('plugins_loaded', array($this, 'item_lists_plugin_load'));
		add_action('admin_notices', array($this, 'item_lists_reviews_notices'));
		register_activation_hook(__FILE__, array($this, 'item_lists_plugin_activation'));
		register_deactivation_hook(__FILE__, array($this, 'item_lists_plugin_deactivation'));
	}

	/*
	 * Register the widgtes file in elementor widgtes.
	 */
	public function item_lists_widget_register() {
		require_once ILE_PATH . 'widgets/item-lists-widget.php';
	}

	/*
	 * Load scripts and styles
	 */
	public function item_lists_widget_script_register() {

		wp_register_style('item-lists-style', ILE_URL . 'assets/css/item-lists-element.css', array(), 1.0, false);
		wp_enqueue_style('item-lists-style');

	}

	/*
	 * Check for Elementor
	 */
	public function item_lists_plugin_load() {
		// Load plugin textdomain
		load_plugin_textdomain('item-lists-for-elementor');

		if (!did_action('elementor/loaded')) {
			add_action('admin_notices', array($this, 'item_lists_widget_fail_load'));
			return;
		}
	}

	/*
	 * This notice will appear if Elementor is not installed or activated or both
	 */
	public function item_lists_widget_fail_load() {
		$screen = get_current_screen();
		if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
			return;
		}

		$plugin = 'elementor/elementor.php';

		if (item_lists_elementor_installed()) {
			if (!current_user_can('activate_plugins')) {
				return;
			}
			$activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);
			$message = '<p><strong>' . esc_html__('Item Lists for Elementor', 'item-lists-for-elementor') . '</strong>' . esc_html__(' plugin is not working because you need to activate the Elementor plugin.', 'item-lists-for-elementor') . '</p>';
			$message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, __('Activate Elementor Now', 'item-lists-for-elementor')) . '</p>';
		} else {
			if (!current_user_can('install_plugins')) {
				return;
			}

			$install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');
			$message = '<p><strong>' . esc_html__('Item Lists for Elementor', 'item-lists-for-elementor') . '</strong>' . esc_html__(' plugin is not working because you need to install the Elementor plugin.', 'item-lists-for-elementor') . '</p>';
			$message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Install Elementor Now', 'item-lists-for-elementor')) . '</p>';
		}

		echo '<div class="error"><p>' . wp_kses_post($message) . '</p></div>';
	}

	/**
	 * Add reviews metadata on plugin activation
	 */
	public function item_lists_plugin_activation() {

		$notices = get_option('item_lists_reviews', array());

		$plugin_name = esc_html__('Item Lists for Elementor', 'item-lists-for-elementor');
		$rating_url = esc_url('https://wordpress.org/support/plugin/item-lists-for-elementor/reviews/?filter=5#new-post');

		/* translators: %1$s: plugin name (bold) */
		$message = sprintf( __('Hi, you are now using %1$s plugin. I would really appreciate it if you could give me the five star to our plugin.', 'item-lists-for-elementor'), '<strong>' . $plugin_name . '</strong>' );
		$rating_text = esc_html__('Okay, you deserve it', 'item-lists-for-elementor');

		$notice_html = '<p>' . $message . '</p>' . '<p><a href="' . $rating_url . '" target="_blank" class="rating-link"><strong>' . $rating_text . '</strong></a></p>';

		$notices[] = wp_kses_post( $notice_html );
		update_option('item_lists_reviews', $notices);

		// Deactivate Item Lists for elementor (Pro) plugin than activate Item Lists for elementor (free) for elementor plugin
		deactivate_plugins('item-lists-pro-for-elementor/item-lists-pro-for-elementor.php');
	}

	/**
	 * Display admin notice on Item Lists activation for ratings
	 */
	public function item_lists_reviews_notices() {
		if ($notices = get_option('item_lists_reviews')) {
			foreach ($notices as $notice) {
				echo "<div class='notice notice-success is-dismissible'><p>" . wp_kses_post($notice) . "</p></div>";
			}
			delete_option('item_lists_reviews');
		}
	}

	/**
	 * Remove reviews metadata on plugin deactivation.
	 */
	public function item_lists_plugin_deactivation() {
		delete_option('item_lists_reviews');
	}
}
endif;

/**
 * Initialize Plugin Class
 *
 * @access public
 * @since  1.0.0
 */
new item_lists_elementor();
