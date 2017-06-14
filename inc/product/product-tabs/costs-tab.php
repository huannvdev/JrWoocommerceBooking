<div class='options_group'>
    <?php
    // Regular price
    woocommerce_wp_text_input(
        array(
            'id'                => 'booking_service_price',
            'label'             => __( 'Base price' ),
            'placeholder'       => '',
            'type'              => 'number',
            'value' => get_post_meta($post_id, '_booking_price',true),
            'custom_attributes' => array(
                'step' 	=> 'any',
                'min'	=> '0'
            )
        )
    );
    ?>

</div>