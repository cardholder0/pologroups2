<?php

// Create Page Options
CSF::createSection( $evisa_theme_option, array(
	'title'  => esc_html__( 'Page Options', 'xpress-core' ),
	'id'     => 'page_options',
	'icon'   => 'fa fa-file-text-o',
	'fields' => array(
		array(
			'id'      => 'page_default_layout',
			'type'    => 'select',
            'chosen'      => true,
			'title'   => esc_html__('Page Layout', 'xpress-core'),
			'options' => array(
				'full-width'  => esc_html__('Full Width', 'xpress-core'),
				'left-sidebar'  => esc_html__('Left Sidebar', 'xpress-core'),
				'right-sidebar' => esc_html__('Right Sidebar', 'xpress-core'),
			),
			'default' => 'full-width',
			'desc'    => esc_html__('Select page layout.', 'xpress-core'),
		),

		array(
			'id'         => 'page_default_sidebar',
			'type'       => 'select',
			'title'      => esc_html__( 'Sidebar', 'xpress-core' ),
			'options'    => 'evisa_sidebars',
			'default' => 'sidebar',
			'dependency' => array( 'page_default_layout', '!=', 'full-width' ),
			'desc'       => esc_html__( 'Select default sidebar for all pages. You can override this settings on individual page.', 'xpress-core' ),
		),
	)
) );