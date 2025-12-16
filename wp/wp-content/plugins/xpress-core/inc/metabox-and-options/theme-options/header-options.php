<?php
// Create header Settings section

CSF::createSection( $evisa_theme_option, array(
	'title'  => esc_html__( 'Header Options', 'xpress-core' ),
    'id'    => 'header_options',
	'icon'   => 'fa fa-header',
	'fields' => array(

        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Header Layout', 'evisa-tools' ) . '</h3>',
        ),

        array(
            'id'          => 'header_style',
            'type'        => 'select',
            'chosen'      => true,
            'title'       => __('Select Header Style', 'evisa-tools' ),
            'options'     => Evisa_Plugin_Helper::get_header_types(),
        ),

        array(
            'id' =>'header_default_logo',
            'type'=>'media',
            'title'=>esc_html__( 'Header Logo', 'xpress-core' ),
            'library'      => 'image',
            'url'          => false,
            'button_title' => esc_html__( 'Upload Logo', 'xpress-core' ),
            'desc'         => esc_html__( 'Upload logo image', 'xpress-core' ),
        ),

        array(
            'id'          => 'logo_maximum_width',
            'type'        => 'slider',
            'title'       => esc_html__( 'Logo Maximum Width', 'xpress-core' ),
            'min'         => 50,
            'max'         => 500,
            'step'        => 1,
            'unit'        => 'px',
            'output'      => '.header__logo img',
            'output_mode' => 'max-width',
            'desc'        => esc_html__( 'Logo image maximum width', 'xpress-core' ),
        ),
    )
) );
