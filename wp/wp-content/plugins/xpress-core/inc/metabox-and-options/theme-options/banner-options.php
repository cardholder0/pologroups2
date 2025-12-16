<?php

// Create banner options
CSF::createSection($evisa_theme_option, array(
	'title'  => esc_html__('Banner Options', 'xpress-core'),
	'id'     => 'banner_default_options',
	'icon'   => 'fa fa-flag-o',
	'fields' => array(

        array(
            'id'                    => 'banner_default_background',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'xpress-core' ),
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'background_attachment' => false,
            'background_size' => false,
            'background_position' => false,
            'background_repeat' => false,
            'output'                => '.breadcrumb',
            'desc'                  => esc_html__( 'Select banner background color and image. You can change this settings on individual page / post.', 'xpress-core' ),
        ),

        array(
            'id'     => 'shape_image',
            'type'   => 'fieldset',
            'title'  => 'Shape Image',
            'fields' => array(
                array(
                    'id' =>'shape1',
                    'type'=>'media',
                    'title'=>esc_html__( 'Shape 1', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Image', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
                array(
                    'id' =>'shape2',
                    'type'=>'media',
                    'title'=>esc_html__( 'Shape 2', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Image', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
            ),
        ),

		array(
			'id'         => 'banner_default_text_align',
			'type'       => 'button_set',
			'title'      => esc_html__( 'Banner Text Align', 'xpress-core' ),
			'options'    => array(
				'start'   => esc_html__( 'Left', 'xpress-core' ),
				'center' => esc_html__( 'Center', 'xpress-core' ),
				'end'  => esc_html__( 'Right', 'xpress-core' ),
			),
			'default'    => 'start',
			'desc'       => esc_html__( 'Select banner text align. You can change this settings on individual page / post.', 'xpress-core' ),
		),

		array(
			'id'          => 'banner_default_height',
			'type'        => 'slider',
			'title'       => esc_html__('Banner Height', 'xpress-core'),
			'min'         => 100,
			'max'         => 800,
			'step'        => 1,
			'unit'        => 'px',
			'output'      => '.breadcrumb',
			'output_mode' => 'height',
			'desc'        => esc_html__('Select banner height. You can change this settings on individual page / post.', 'xpress-core'),
		),
	)
));