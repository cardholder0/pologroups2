<?php
// Product
CSF::createSection( $evisa_theme_option, array(
    'title'  => esc_html__( 'WooCommerce', 'xpress-core' ),
    'id'     => 'woo_option',
    'icon'  => 'fa fa-shopping-cart',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Shop Breadcrumb', 'xpress-core' ) . '</h3>',
        ),

        array(
            'id'      => 'product_count',
            'title'   => esc_html__( 'Product Count', 'xpress-core' ),
            'type'    => 'text',
            'default' => '12',
        ),
        array(
            'id'       => 'enable_shop_breadcrumb',
            'type'     => 'switcher',
            'title'    => __( 'Page Breadcrumb', 'xpress-core' ),
            'text_on'  => __( 'Yes', 'xpress-core' ),
            'text_off' => __( 'No', 'xpress-core' ),
            'default'  => true
        ),
  
        array(
            'id'                    => 'banner_shop_background',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'xpress-core' ),
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'background_attachment' => false,
            'background_size' => false,
            'background_position' => false,
            'background_repeat' => false,
            'output'                => '.shop-breadcrumb',
            'dependency' => array( 'enable_shop_breadcrumb', '==', 'true' ),
        ),
        array(
            'id'      => 'shop_breadcrumb_title',
            'title'   => esc_html__( 'Shop Breadcrumb Title', 'xpress-core' ),
            'type'    => 'text',
            'dependency' => array( 'enable_shop_breadcrumb', '==', 'true' ),
        ),

        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Single Product Breadcrumb', 'xpress-core' ) . '</h3>',
        ),
        array(
            'id'       => 'enable_single_product_preadcrumb',
            'type'     => 'switcher',
            'title'    => __( 'Page Breadcrumb', 'xpress-core' ),
            'text_on'  => __( 'Yes', 'xpress-core' ),
            'text_off' => __( 'No', 'xpress-core' ),
            'default'  => true
        ),
        array(
            'id'                    => 'product_single_breadcrumb_bg',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'xpress-core' ),
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'background_attachment' => false,
            'background_size' => false,
            'background_position' => false,
            'background_repeat' => false,
            'output'                => '.shop-single-breadcrumb',
            'dependency' => array( 'enable_single_product_preadcrumb', '==', 'true' ),
        ),
        array(
            'id'      => 'product_single_breadcrumb_title',
            'title'   => esc_html__( 'Shop Single Breadcrumb Title', 'xpress-core' ),
            'type'    => 'text',
            'dependency' => array( 'enable_single_product_preadcrumb', '==', 'true' ),
        ),

    ),
) );