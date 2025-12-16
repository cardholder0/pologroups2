<?php

CSF::createSection( $evisa_theme_option, array(
	'title'  => esc_html__( 'Error 404', 'xpress-core' ),
	'id'     => 'archive_page_options',
	'icon'   => 'fa fa-exclamation-triangle',
	'fields' => array(
		array(
			'id'       => 'error_banner',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Error Banner', 'xpress-core' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'xpress-core' ),
			'text_off' => esc_html__( 'No', 'xpress-core' ),
			'desc'     => esc_html__( 'Enable or disable error / not found page banner.', 'xpress-core' ),
		),

		array(
			'id'                    => 'error_banner_background_options',
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
			'dependency'            => array( 'error_banner', '==', true ),
			'output'                => '.breadcrumb.error-page-banner',
			'desc'                  => esc_html__( 'If you want different banner background settings for error / not found page then select error / not found page banner background options from here.', 'xpress-core' ),
		),

        array(
            'id'      => 'error_img',
            'type'    => 'media',
            'title'   => esc_html__( 'Error Image', 'xpress-core' ),
        ),

		array(
			'id'         => 'error_page_title',
			'type'       => 'text',
			'title'      => esc_html__( 'Error Banner Title', 'xpress-core' ),
			'desc'       => esc_html__( 'Type error banner title here.', 'xpress-core' ),
            'default'         => esc_html__( 'Error 404', 'xpress-core' ),
			'dependency' => array( 'error_banner', '==', true ),
		),

		array(
			'id'            => 'not_found_text',
			'type'          => 'wp_editor',
			'title'         => esc_html__( 'Not Found Text', 'xpress-core' ),
			'tinymce'       => true,
			'quicktags'     => true,
			'media_buttons' => false,
			'height'        => '150px',
			'desc'          => esc_html__( 'Type not found text here.', 'xpress-core' ),
		),
	)
) );