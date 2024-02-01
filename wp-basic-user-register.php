<?php
/**
 * Plugin Name: WP Basic User Register
 * Plugin URI: https://github.com/thisisalamin/wp-basic-user-register
 * Description: A very basic user registration plugin for WordPress.
 * Version: 1.0.0
 * Author: Mohamed Alamin
 * Author URI: https://www.linkedin.com/in/thisismdalamin/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-basic-user-register
 * Domain Path: /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define constants.
define( 'WP_BASIC_USER_REGISTER_VERSION', '1.0.0' );
define( 'WP_BASIC_USER_REGISTER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WP_BASIC_USER_REGISTER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

class WP_Basic_User_Register {

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'init', array( $this, 'init') );
        
    }

    /**
     * Initialize the plugin.
     */
    public function init() {
        add_action( 'wp_enqueue_scripts', array( $this, 'wp_basic_user_register_scripts' ) );
        add_shortcode( 'wp-burf', array( $this, 'wp_basic_user_register_form' ) );
    }

    /**
     * Enqueue scripts and styles.
     */
    function wp_basic_user_register_scripts() {
        wp_enqueue_style( 'wp-basic-user-register-style', WP_BASIC_USER_REGISTER_PLUGIN_URL . 'assets/css/style.css', array(), '1.0.0', 'all' );
        wp_enqueue_script( 'wp-basic-user-register-script', WP_BASIC_USER_REGISTER_PLUGIN_URL . 'assets/js/script.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2', 'all' );
    }


    // Add Short Code For User Registration Form
    function wp_basic_user_register_form() {
        ob_start();
        include WP_BASIC_USER_REGISTER_PLUGIN_DIR . 'registration-form.php';
        return ob_get_clean();
    }

}

new WP_Basic_User_Register();