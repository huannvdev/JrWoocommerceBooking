<?php

class JWBBookingServiceTaxonomy {
    private $taxonomy_name = 'jwb-booking-service';

    /**
     * JWBBookingServiceTaxonomy constructor.
     */
    public function __construct() {
        add_action('init', array($this, 'jwb_register_taxonomy'));
        add_action('admin_menu', array($this, 'jwb_remove_booking_service_taxonomy_option'));
    }

    /**
     * Register taxonomy function
     */
    public function jwb_register_taxonomy() {
        if (taxonomy_exists($this->taxonomy_name)) {
            return;
        }
        //Register taxonomy
        $args = array(
            'hierarchical' => true,
            'label' => __('Booking Services', 'jwb-woocommerce-booking'),
            'labels' => array(
                'name' => __('Booking Services', 'jwb-woocommerce-booking'),
                'singular_name' => __('Booking Service', 'jwb-woocommerce-booking'),
                'menu_name' => _x('Booking Services', 'Admin menu name', 'jwb-woocommerce-booking'),
                'all_items' => __('All Booking Services', 'jwb-woocommerce-booking'),
                'edit_item' => __('Edit Booking Service', 'jwb-woocommerce-booking'),
                'view_item' => __('View Booking Service', 'jwb-woocommerce-booking'),
                'update_item' => __('Update Booking Service', 'jwb-woocommerce-booking'),
                'add_new_item' => __('Add New Booking Service', 'jwb-woocommerce-booking'),
                'new_item_name' => __('New Booking Service Name', 'jwb-woocommerce-booking'),
                'parent_item' => __('Parent Booking Service', 'jwb-woocommerce-booking'),
                'parent_item_colon' => __('Parent Booking Service:', 'jwb-woocommerce-booking'),
                'search_items' => __('Search Booking Services', 'jwb-woocommerce-booking'),
                'separate_items_with_commas' => __('Separate booking services with commas', 'jwb-woocommerce-booking'),
                'add_or_remove_items' => __('Add or remove booking services', 'jwb-woocommerce-booking'),
                'choose_from_most_used' => __('Choose among the most popular booking services', 'jwb-woocommerce-booking'),
                'not_found' => __('No booking services found.', 'jwb-woocommerce-booking'),
            ),
            'show_ui' => true,
            'query_var' => true,
            'show_in_nav_menus' => false,
            //'meta_box_cb'       => 'post_categories_meta_box',
            'show_admin_column' => true,
            'capabilities' => array(
                'manage_terms' => 'manage_product_terms',
                'edit_terms' => 'edit_product_terms',
                'delete_terms' => 'delete_product_terms',
                'assign_terms' => 'assign_product_terms',
            ),
            'rewrite' => true,
        );

        register_taxonomy($this->taxonomy_name, array(JWB()->booking_post_type_name->post_type_name, 'product'), $args);
    }

    public function jwb_remove_booking_service_taxonomy_option(){
        remove_meta_box($this->taxonomy_name . 'div', array(JWB()->booking_post_type_name->post_type_name, 'product'), 'side');
    }
}