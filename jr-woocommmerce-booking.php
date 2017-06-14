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
         * @var JWBBookingPostType $post_type_name
         */
        public $booking_post_type_name;

        /**
         * @return JrWoocommerceBooking
         */
        public static function getInstance() {
            if (!isset(self::$instance) && !(self::$instance instanceof JrWoocommerceBooking)) {
                self::$instance = new JrWoocommerceBooking();
                self::$instance->booking_post_type_name = new JWBBookingPostType();
                new JWBBookingServiceTaxonomy();
                new JWBProductType();
            }
            return self::$instance;
        }

        /**
         * JrWoocommerceBooking constructor.
         */
        public function __construct() {
            //Define path and url plugin
            define( 'JWB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
            define( 'JWB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

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
            require_once (JWB_PLUGIN_DIR . 'inc/post-types/class-jwb-booking-posttype.php');
            require_once (JWB_PLUGIN_DIR . 'inc/taxonomy/class-jwb-booking-service-taxonomy.php');
            require_once (JWB_PLUGIN_DIR . 'inc/product/class-jwb-product-type.php');
        }
    }

    function JWB() {
        return JrWoocommerceBooking::getInstance();
    }

    JWB();
}

