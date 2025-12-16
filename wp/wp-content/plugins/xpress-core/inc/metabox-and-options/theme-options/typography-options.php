<?php
// Create typography section
CSF::createSection( $evisa_theme_option, array(
	'title'  => esc_html__( 'Typography', 'xpress-core' ),
	'id'     => 'typography_options',
	'icon'   => 'fa fa-text-width',
	'fields' => array(

		array(
			'id'             => 'body_typo',
			'type'           => 'typography',
			'title'          => esc_html__( 'Body Font', 'xpress-core' ),
			'desc'           => esc_html__( 'Select body typography.', 'xpress-core' ),
			'output'         => 'body',
			'text_align'     => false,
			'text_transform' => false,
			'color'          => false,
			'extra_styles'   => true,
			'default'        => array(
				'font-family'  => 'Plus Jakarta Sans',
				'type'         => 'google',
				'unit'         => 'px',
				'font-weight'  => '500',
				'extra-styles' => array('400','500'),
			),
		),

		array(
			'id'             => 'heading_typo',
			'type'           => 'typography',
			'title'          => esc_html__( 'Heading Font', 'xpress-core' ),
			'desc'           => esc_html__( 'Select heading typography.', 'xpress-core' ),
			'output'         => 'h1,h2,h3,h4,h5,h6',
			'text_align'     => false,
			'text_transform' => false,
			'color'          => false,
			'extra_styles'   => true,
			'default'        => array(
				'font-family'  => 'Plus Jakarta Sans',
				'type'         => 'google',
				'unit'         => 'px',
				'font-weight'  => '600',
				'extra-styles' => array('500','700'),
			),
		),
	)
) );