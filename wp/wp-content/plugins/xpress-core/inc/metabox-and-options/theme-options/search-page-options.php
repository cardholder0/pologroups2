<?php
//Search Options

CSF::createSection( $evisa_theme_option, array(
	'title'  => esc_html__( 'Search Page', 'xpress-core' ),
	'id'     => 'search_page_options',
	'icon'   => 'fa fa-search',
	'fields' => array(

		array(
			'id'      => 'search_layout',
			'type'    => 'select',
            'chosen'      => true,
			'title'   => esc_html__( 'Search Layout', 'xpress-core' ),
			'options' => array(
				'grid'          => esc_html__( 'Grid Full', 'xpress-core' ),
				'grid-ls'       => esc_html__( 'Grid With Left Sidebar', 'xpress-core' ),
				'grid-rs'       => esc_html__( 'Grid With Right Sidebar', 'xpress-core' ),
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'xpress-core' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'xpress-core' ),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__( 'Select search page layout.', 'xpress-core' ),
		),

		array(
			'id'       => 'search_banner',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Search Banner', 'xpress-core' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'xpress-core' ),
			'text_off' => esc_html__( 'No', 'xpress-core' ),
			'desc'     => esc_html__( 'Enable or disable search page banner.', 'xpress-core' ),
		),

		array(
			'id'                    => 'search_banner_background_options',
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
			'dependency'            => array( 'search_banner', '==', true ),
			'output'                => '.breadcrumb.search-banner',
			'desc'                  => esc_html__( 'If you want different banner background settings for search page then select search page banner background options from here.', 'xpress-core' ),
		),

	)
) );