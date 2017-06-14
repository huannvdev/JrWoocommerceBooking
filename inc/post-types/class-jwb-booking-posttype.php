<?php

/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 6/14/2017
 * Time: 9:55 AM
 */
if(!defined('ABSPATH')){
    exit;
}
class JWBBookingPostType {
    public $post_type_name = 'jwb-booking';

    public function __construct() {
        add_action('init', array($this, 'jwb_register_post_type'));
        add_action('admin_menu', array($this, 'jwb_add_submenu'));
    }

    /**
     * Register posttype function
     */
    public function jwb_register_post_type() {
        $labels = array(
            'name' => __( 'Bookings', 'jwb-woocommerce-booking' ),
            'singular_name' => __( 'Booking', 'jwb-woocommerce-booking' ),
            'add_new' => __( 'Add Booking', 'jwb-woocommerce-booking' ),
            'add_new_item' => __( 'Add New Booking', 'jwb-woocommerce-booking' ),
            'edit' => __( 'Edit', 'jwb-woocommerce-booking' ),
            'edit_item' => __( 'Edit Booking', 'jwb-woocommerce-booking' ),
            'new_item' => __( 'New Booking', 'jwb-woocommerce-booking' ),
            'view' => __( 'View Booking', 'jwb-woocommerce-booking' ),
            'view_item' => __( 'View Booking', 'jwb-woocommerce-booking' ),
            'search_items' => __( 'Search Bookings', 'jwb-woocommerce-booking' ),
            'not_found' => __( 'No bookings found', 'jwb-woocommerce-booking' ),
            'not_found_in_trash' => __( 'No bookings found in trash', 'jwb-woocommerce-booking' ),
            'parent' => __( 'Parent Bookings', 'jwb-woocommerce-booking' ),
            'menu_name' => _x( 'Bookings', 'Admin menu name', 'jwb-woocommerce-booking' ),
            'all_items' => __( 'All Bookings', 'jwb-woocommerce-booking' ),
        );

        $booking_post_type_args = array(
            'label' => __( 'Booking', 'jwb-woocommerce-booking' ),//
            'labels' => $labels,//
            'description' => __( 'This is where bookings are stored.', 'jwb-woocommerce-booking' ),//
            'public' => false,
            'show_ui' => true,
            //'capability_type'     => 'administrator',
            'capabilities' => array( 'create_posts' => 'do_not_allow' ),
            'map_meta_cap' => true,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'show_in_menu' => true,
            'hierarchical' => false,
            'show_in_nav_menus' => false,
            'rewrite' => false,
            'query_var' => false,
            'supports' => array( '' ),
            'has_archive' => false,
            'menu_icon' => 'dashicons-calendar',
        );

        register_post_type( $this->post_type_name, $booking_post_type_args );
    }

    public function jwb_add_submenu(){
        add_submenu_page( 'edit.php?post_type=' . $this->post_type_name,
            __( 'Calendar', 'jwb-woocommerce-booking' ),
            __( 'Calendar', 'jwb-woocommerce-booking' ),
            'administrator',
            'owb-booking-calendar',
            array( $this, 'jwb_render_calendar_page' )
        );
    }

    public function jwb_render_calendar_page(){
        echo 'Calendar page';
    }
}