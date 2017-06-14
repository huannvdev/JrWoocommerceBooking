<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 6/14/2017
 * Time: 4:23 PM
 */
if (!defined('ABSPATH')) {
    exit;
}

class WC_Product_Booking extends WC_Product {

    public function __construct( $product ) {
        $this->product_type = 'booking';
        parent::__construct( $product );
    }

    /**
     * @return array|false|WP_Error
     */
    public function get_list_service(){
        $terms = get_the_terms($this->get_id(), 'owb-booking-service');
        if(!empty($terms)){
            foreach ($terms as $key => $item) {
                $term_meta = get_option('taxonomy_' . $item->term_id);
                $term_price =  $term_meta['book_service_price'];
                $terms[$key]->term_price = $term_price;
            }
        }
        return $terms;
    }
}