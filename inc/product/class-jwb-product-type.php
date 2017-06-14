<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 6/14/2017
 * Time: 4:05 PM
 */
if (!defined('ABSPATH')) {
    exit;
}

class JWBProductType {
    private $product_type_name = 'booking';

    /**
     * JWBProductType constructor.
     */
    public function __construct() {
        $this->init_hooks();
    }

    /**
     * Hook init function
     */
    public function init_hooks() {
        add_action('plugins_loaded', array($this, 'jwb_plugins_loaded_booking_type'));
        add_filter('product_type_selector', array($this, 'jwb_add_booking_product_type'));
        add_filter('woocommerce_product_data_tabs', array($this, 'jwb_add_product_data_tab'));
        add_action('woocommerce_product_data_panels', array($this, 'jwb_add_product_data_tab_panel'));
        add_action('woocommerce_process_product_meta_booking', array($this, 'jwb_save_booking_option_field'));
    }

    /**
     * Load class WC_Product_Type_Booking
     */
    public function jwb_plugins_loaded_booking_type() {
        require_once(JWB_PLUGIN_DIR . 'inc/product/class-jwb-product-booking-type.php');
    }

    /**
     * Add Booking product selection in Product data
     * @param $types
     * @return mixed
     */
    public function jwb_add_booking_product_type($types) {
        $types[$this->product_type_name] = __('Booking Product', 'jwb-woocommerce-booking');
        return $types;
    }

    /**
     * Add extra tab for Booking Product
     * @param $tabs
     * @return mixed
     */
    public function jwb_add_product_data_tab($tabs) {
        //
        $tabs['booking_cost'] = array(
            'label' => __('Booking Cost', 'jwb-woocommerce-booking'),
            'target' => 'booking_costs',
            'class' => array('show_if_' . $this->product_type_name),
        );
        $tabs['booking_service'] = array(
            'label' => __('Booking Service', 'jwb-woocommerce-booking'),
            'target' => 'booking_services',
            'class' => array('show_if_' . $this->product_type_name),
        );

        if (isset($tabs['shipping']) && isset($tabs['shipping']['class'])) {
            if (is_array($tabs['shipping']['class'])) {
                $tabs['shipping']['class'][] = 'hide_if_booking';
            }
        }
        return $tabs;
    }

    /**
     * Add product data service panel
     */
    public function jwb_add_product_data_tab_panel() {
        global $post;
        //Tab panel array
        $tabs = array(
            'costs' => 'booking_costs',
            'services' => 'booking_services'
        );

        $post_id = $post->ID;

        //Include template tab
        foreach ($tabs as $key => $tab_id) {
            echo '<div id="' . $tab_id . '" class="panel woocommerce_options_panel">';
            include(JWB_PLUGIN_DIR . 'inc/product/product-tabs/' . $key . '-tab.php');
            echo '</div>';
        }
    }

    /**
     * Save data product tab services
     * @param $post_id
     */
    public function jwb_save_booking_option_field($post_id) {

        if(isset($_POST['booking_service_price'])) {
            update_post_meta($post_id, '_booking_price', $_POST['booking_service_price']);
        }
        //if(isset($_POST['booking_service_price'])){
        //    wp_set_post_terms($post_id, $_POST['booking_service_price'], 'jwb-booking-service');
        //}
    }


}