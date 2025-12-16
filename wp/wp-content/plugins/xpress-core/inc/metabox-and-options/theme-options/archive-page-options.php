<?php
//Archive Options

CSF::createSection( $evisa_theme_option, array(
	'title'  => esc_html__( 'Archive Page', 'xpress-core' ),
	'id'     => 'archive_page_options',
	'icon'   => 'fa fa-file-archive-o',
	'fields' => array(
		array(
			'id'      => 'archive_layout',
			'type'    => 'select',
            'chosen'      => true,
			'title'   => esc_html__( 'Archive Layout', 'xpress-core' ),
			'options' => array(
				'grid'          => esc_html__( 'Grid Full', 'xpress-core' ),
				'grid-ls'       => esc_html__( 'Grid With Left Sidebar', 'xpress-core' ),
				'grid-rs'       => esc_html__( 'Grid With Right Sidebar', 'xpress-core' ),
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'xpress-core' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'xpress-core' ),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__( 'Select archive page layout.', 'xpress-core' ),
		),

		array(
			'id'       => 'archive_banner',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Archive Banner', 'xpress-core' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'xpress-core' ),
			'text_off' => esc_html__( 'No', 'xpress-core' ),
			'desc'     => esc_html__( 'Enable or disable archive page banner.', 'xpress-core' ),
		),

		array(
			'id'                    => 'archive_banner_background_options',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Banner Background', 'xpress-core' ),
			'background_gradient'   => true,
			'background_origin'     => false,
			'background_clip'       => false,
			'background_blend-mode' => false,
			'background_attachment' => false,
			'background_size'       => false,
			'background_position'   => false,
			'background_repeat'     => false,
			'dependency'            => array( 'archive_banner', '==', true ),
			'output'                => '.breadcrumb.archive-banner',
			'desc'                  => esc_html__( 'If you want different banner background settings for archive page then select archive page banner background Options from here.', 'xpress-core' ),
		),
	)
) );