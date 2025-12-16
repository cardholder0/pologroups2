<?php

// Create general section
CSF::createSection( $evisa_theme_option, array(
	'title'  => esc_html__( 'General Options', 'xpress-core' ),
	'id'     => 'general_options',
	'icon'   => 'fa fa-google',
	'fields' => array(

		array(
			'id'     => 'theme_primary_color',
			'type'   => 'color',
			'title'  => esc_html__( 'Primary Color', 'xpress-core' ),
			'desc'   => esc_html__( 'You can change other colors from individual Elemenotor widget\'settings.', 'xpress-core' ),
		),
		array(
			'id'     => 'theme_secondary_color',
			'type'   => 'color',
			'title'  => esc_html__( 'Secondary Color', 'xpress-core' ),
			'desc'   => esc_html__( 'You can change other colors from individual Elemenotor widget\'settings.', 'xpress-core' ),
		),
        array(
            'id'        => 'theme_gradient_color',
            'type'      => 'color_group',
            'title'  => esc_html__( 'Gradient Color', 'xpress-core' ),
            'desc'   => esc_html__( 'You can change other colors from individual Elemenotor widget\'settings.', 'xpress-core' ),
            'options'   => array(
                'color-1' => 'Color From',
                'color-2' => 'Color To',
            ),
        ),
        array(
            'id'      => 'scroll_up_btn',
            'title'   => esc_html__( 'Scroll Up Button', 'xpress-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Scroll Up Button Hide Show', 'xpress-core' ),
            'default' => true,
        ),
        array(
            'id'      => 'preloader_enable',
            'title'   => esc_html__( 'Enable Preloader', 'xpress-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Enable or Disable Preloader', 'xpress-core' ),
            'default' => true,
        ),
        array(
            'id'                    => 'preloader_earth',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Preloader Earth Image', 'xpress-core' ),
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'background_attachment' => false,
            'background_size' => false,
            'background_position' => false,
            'background_repeat' => false,
            'output'                => '.earth',
            'desc'        => esc_html__('Upload Preloader Earth Image. You can change this settings on individual page / post.', 'xpress-core'),
            'dependency' => array( 'preloader_enable', '==', 'true' ),
        ),
        array(
            'id'      => 'sticky_header_enable',
            'title'   => esc_html__( 'Enable Stikcy Header', 'xpress-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Enable or Disable Stikcy Header', 'xpress-core' ),
            'default' => true,
        ),
	)
) );