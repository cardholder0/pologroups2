<?php
// Product
CSF::createSection( $evisa_theme_option, array(
    'title'  => esc_html__( 'country', 'xpress-core' ),
    'id'     => 'country_option',
    'icon'   => 'fas fa-globe',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'country Single Breadcrumb', 'xpress-core' ) . '</h3>',
        ),

        array(
            'id'       => 'enable_country_breadcrumb',
            'type'     => 'switcher',
            'title'    => __( 'Breadcrumb', 'xpress-core' ),
            'text_on'  => __( 'Yes', 'xpress-core' ),
            'text_off' => __( 'No', 'xpress-core' ),
            'default'  => true
        ),
  
        array(
            'id'                    => 'banner_port_background',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'xpress-core' ),
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'background_attachment' => false,
            'background_size' => false,
            'background_position' => false,
            'background_repeat' => false,
            'output'                => '.country-breadcrumb',
            'dependency' => array( 'enable_country_breadcrumb', '==', 'true' ),
        ),
        array(
            'id'         => 'country_breadcrumb_title',
            'type'       => 'text',
            'title'      => esc_html__('Country Single Title', 'borex'),
            'desc'       => esc_html__('If you want custom title write title here or If you want to use country default title leave it empty.', 'xpress-core'),
            'dependency' => array( 'enable_country_breadcrumb', '==', 'true' ),
        ),

    ),
) );