<?php
/**
 * Plugin Name: Jr Woocommerce Booking
 * Plugin URI: http://kamixkei.com
 * Description: Booking extension for woocommerce plugin
 * Version: 1.0
 * Author: Jream
 * Author URI: http://kamixkei.com
 *
 * Text Domain: jr-woocommerce-booking
 * Domain Path: languages/
 */

// check if request not law
if (!defined('ABSPATH')) {
    exit;
}

//Check active plugin wordpress
if (!function_exists('is_plugin_active')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

// Check required active plugin woocommerce
if (!is_plugin_active('woocommerce/woocommerce.php')) {
    return;
}

if (!class_exists('JrWoocommerceBooking')) {
    final class JrWoocommerceBooking {
        private static $instance;

        /**
         * @var JrBooingPostType $post_type
         */
        public $booking_post_type;

        /**
         * @return JrWoocommerceBooking
         */
        public static function getInstance() {
            if (!isset(self::$instance) && !(self::$instance instanceof JrWoocommerceBooking)) {
                self::$instance = new JrWoocommerceBooking();
            }
            return self::$instance;
        }

        /**
         * JrWoocommerceBooking constructor.
         */
        public function __construct() {

            $this->init_hooks();
            $this->include_files();
        }

        private function init_hooks() {
            add_action('init', array($this, 'load_textdomain'));
        }

        /**
         * Load textdomain for plugin
         */
        public function load_textdomain(){
            load_plugin_textdomain('jr-woocommerce-booking', dirname(plugin_basename( __FILE__ )) . '/languages');
        }

        private function include_files() {

        }
    }

    function JWB() {
        return JrWoocommerceBooking::getInstance();
    }

    JWB();
}

