<?php

// Create blog page options
CSF::createSection( $evisa_theme_option, array(
	'title'  => esc_html__( 'Blog Page', 'xpress-core' ),
	'id'     => 'blog_page_options',
	'icon'   => 'fa fa-pencil-square-o',
	'fields' => array(

		array(
			'id'      => 'blog_layout',
			'type'    => 'select',
            'chosen'      => true,
			'title'   => esc_html__('Blog Layout', 'xpress-core'),
			'options' => array(
				'grid'          => esc_html__('Grid Full', 'xpress-core'),
				'grid-ls'       => esc_html__('Grid With Left Sidebar', 'xpress-core'),
				'grid-rs'       => esc_html__('Grid With Right Sidebar', 'xpress-core'),
				'left-sidebar'  => esc_html__('Left Sidebar', 'xpress-core'),
				'right-sidebar' => esc_html__('Right Sidebar', 'xpress-core'),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__('Select blog page layout.', 'xpress-core'),
		),

		array(
			'id'       => 'blog_banner',
			'type'     => 'switcher',
			'title'    => esc_html__('Enable Blog Banner', 'xpress-core'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'xpress-core'),
			'text_off' => esc_html__('No', 'xpress-core'),
			'desc'     => esc_html__('Enable or disable blog page banner.', 'xpress-core'),
		),

		array(
			'id'                    => 'blog_banner_background_options',
			'type'                  => 'background',
			'title'                 => esc_html__('Banner Background', 'xpress-core'),
			'background_origin'     => false,
			'background_clip'       => false,
			'background_blend-mode' => false,
			'background_attachment' => false,
			'background_size' => false,
			'background_position' => false,
			'background_repeat' => false,
			'dependency'            => array('blog_banner', '==', true),
			'output'                => '.breadcrumb.blog-banner',
			'desc'                  => esc_html__('If you want different banner background settings for blog page then select blog page banner background Options from here.', 'xpress-core'),
		),

		array(
			'id'         => 'blog_title',
			'type'       => 'text',
			'title'      => esc_html__('Banner Title', 'xpress-core'),
			'desc'       => esc_html__('Type blog banner title here.', 'xpress-core'),
            'default'         => esc_html__( 'Blog', 'xpress-core' ),
			'dependency' => array('blog_banner', '==', true),
		),

		array(
			'id'       => 'post_author',
			'type'     => 'switcher',
			'title'    => esc_html__('Show Author Name', 'xpress-core'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'xpress-core'),
			'text_off' => esc_html__('No', 'xpress-core'),
			'desc'     => esc_html__('Hide / Show post author name.', 'xpress-core'),
		),

		array(
			'id'       => 'post_date',
			'type'     => 'switcher',
			'title'    => esc_html__('Show Post Date', 'xpress-core'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'xpress-core'),
			'text_off' => esc_html__('No', 'xpress-core'),
			'desc'     => esc_html__('Hide / Show post date.', 'xpress-core'),
		),

		array(
			'id'         => 'show_category',
			'type'       => 'switcher',
			'title'      => esc_html__('Show Category Name', 'xpress-core'),
			'default'    => false,
			'text_on'    => esc_html__('Yes', 'xpress-core'),
			'text_off'   => esc_html__('No', 'xpress-core'),
			'desc'       => esc_html__('Hide / Show post category name.', 'xpress-core'),
			'dependency' => array('blog_layout', 'any', 'right-sidebar,left-sidebar'),
		),

		array(
			'id'         => 'read_more_button',
			'type'       => 'switcher',
			'title'      => esc_html__('Show Read More Button', 'xpress-core'),
			'default'    => true,
			'text_on'    => esc_html__('Yes', 'xpress-core'),
			'text_off'   => esc_html__('No', 'xpress-core'),
			'desc'       => esc_html__('Hide / Show post read more button.', 'xpress-core'),
		),
        array(
            'id'     => 'blog_shape',
            'type'   => 'fieldset',
            'title'  => 'Blog Shape',
            'fields' => array(
                array(
                    'id' =>'shape1',
                    'type'=>'media',
                    'title'=>esc_html__( 'Shape 1', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Icon', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
                array(
                    'id' =>'shape2',
                    'type'=>'media',
                    'title'=>esc_html__( 'Shape 2', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Icon', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
                array(
                    'id' =>'shape3',
                    'type'=>'media',
                    'title'=>esc_html__( 'Shape 3', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Icon', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
                array(
                    'id' =>'shape4',
                    'type'=>'media',
                    'title'=>esc_html__( 'Shape 4', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Icon', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
                array(
                    'id' =>'shape5',
                    'type'=>'media',
                    'title'=>esc_html__( 'Shape 5', 'xpress-core' ),
                    'library'      => 'image',
                    'url'          => false,
                    'button_title' => esc_html__( 'Upload Icon', 'xpress-core' ),
                    'desc'         => esc_html__( 'Upload icon image', 'xpress-core' ),
                ),
            ),
        ),
	)
) );