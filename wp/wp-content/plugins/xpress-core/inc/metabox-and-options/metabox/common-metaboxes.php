<?php
$evisa_common_meta = 'evisa_common_meta';

// Create a metabox
CSF::createMetabox($evisa_common_meta, array(
	'title'     => esc_html__('Settings', 'xpress-core'),
	'post_type' => array('page', 'post'),
	'data_type' => 'serialize',
));

// Create layout section
CSF::createSection($evisa_common_meta, array(
	'title'  => esc_html__('Layout Settings ', 'xpress-core'),
	'icon'   => 'fa fa-calculator',
	'fields' => array(

		array(
			'id'      => 'layout_meta',
			'type'    => 'select',
			'title'   => esc_html__('Layout', 'xpress-core'),
			'options' => array(
				'default'       => esc_html__('Default', 'xpress-core'),
				'left-sidebar'  => esc_html__('Left Sidebar', 'xpress-core'),
				'full-width'    => esc_html__('Full Width', 'xpress-core'),
				'right-sidebar' => esc_html__('Right Sidebar', 'xpress-core'),
			),
			'default' => 'default',
			'desc'    => esc_html__('Select layout', 'xpress-core'),
		),

		array(
			'id'         => 'sidebar_meta',
			'type'       => 'select',
			'title'      => esc_html__('Sidebar', 'xpress-core'),
			'options'    => 'evisa_sidebars',
			'dependency' => array('layout_meta', '!=', 'full-width'),
			'desc'       => esc_html__('Select sidebar you want to show with this page.', 'xpress-core'),
		),
	)
));

// Create layout section
CSF::createSection($evisa_common_meta, array(
	'title'  => esc_html__('Header Settings ', 'xpress-core'),
	'icon'   => 'fa fa-header',
	'fields' => array(

        array(
            'id'       => 'meta_header_type',
            'type'     => 'switcher',
            'title'    => __( 'Header Style', 'evisa-plugin' ),
            'text_on'  => __( 'Yes', 'evisa-plugin' ),
            'text_off' => __( 'No', 'evisa-plugin' ),
            'default'  => false
        ),
        array(
            'id'          => 'meta_header_style',
            'type'        => 'select',
            'chosen'      => true,
            'title'       => __('Select Header Style', 'evisa-plugin' ),
            'options'     => Evisa_Plugin_Helper::get_header_types(),
            'dependency' => array( 'meta_header_type', '==', 'true' ),
        ),
        array(
            'id'       => 'page_header_disable',
            'type'     => 'switcher',
            'title'    => __( 'DIsable This page Header?', 'evisa-plugin' ),
            'text_on'  => __( 'Yes', 'evisa-plugin' ),
            'text_off' => __( 'No', 'evisa-plugin' ),
            'default'  => false
        ),
	)
));

// Breadcrumb Section
CSF::createSection( $evisa_common_meta, array(
    'title'  => 'Page Settings',
    'icon'   => 'fas fa-pager',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'Page Color', 'xpress-core' ),
        ),

        array(
            'id'     => 'page-bg-color',
            'type'   => 'color',
            'title'  => 'Page Background Color',
            'output' => array( 'background' => 'body', 'background-color' => '.evisa-main-wrap' )
        ),
        array(
            'id'                    => 'preloader_earth_img',
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
        ),

        array(
            'id'     => 'scroll-top-color',
            'type'   => 'color',
            'title'  => 'Scroll Button BG Color',
            'output' => array( 'background' => '.xb-backtotop .scroll')
        ),
        array(
            'id'     => 'scroll-top-icon-color',
            'type'   => 'color',
            'title'  => 'Scroll Button Icon Color',
            'output' => array( 'color' => '.xb-backtotop .scroll')
        ),
    )
) );

// Create a section
CSF::createSection($evisa_common_meta, array(
	'title'  => esc_html__('Banner Settings', 'xpress-core'),
	'icon' => 'fa fa-flag-o',
	'fields' => array(
		array(
			'id'       => 'enable_banner',
			'type'     => 'switcher',
			'title'    => esc_html__('Enable Banner', 'xpress-core'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'xpress-core'),
			'text_off' => esc_html__('No', 'xpress-core'),
			'desc'     => esc_html__('Enable or disable banner.', 'xpress-core'),
		),

		array(
			'id'                    => 'banner_background_meta',
			'type'                  => 'background',
			'title'                 => esc_html__('Banner Background', 'xpress-core'),
			'background_origin'     => false,
			'background_clip'       => false,
			'background_blend-mode' => false,
			'background_attachment' => false,
			'background_size'       => false,
			'background_position'   => false,
			'background_repeat'     => false,
			'dependency'            => array('enable_banner', '==', true),
			'output'                => '.breadcrumb.post-banner,.breadcrumb.page-banner',
			'desc'                  => esc_html__('Select banner background color and image', 'xpress-core'),
		),

		array(
			'id'         => 'custom_title',
			'type'       => 'text',
			'title'      => esc_html__('Banner Custom Title', 'xpress-core'),
			'dependency' => array('enable_banner', '==', true),
			'desc'       => esc_html__('If you want to use custom title write title here.If you don\'t, leave it empty.', 'xpress-core')
		),

		array(
			'id'         => 'banner_text_align_meta',
			'type'       => 'select',
			'title'      => esc_html__('Banner Text Align', 'xpress-core'),
			'options'    => array(
				'default' => esc_html__('Default', 'xpress-core'),
				'left'    => esc_html__('Left', 'xpress-core'),
				'center'  => esc_html__('Center', 'xpress-core'),
				'right'   => esc_html__('Right', 'xpress-core'),
			),
			'default'    => 'default',
			'dependency' => array('enable_banner', '==', true),
			'desc'       => esc_html__('Select page banner text align.', 'xpress-core'),
		),

		array(
			'id'          => 'banner_height_meta',
			'type'        => 'slider',
			'title'       => esc_html__('Banner Height', 'xpress-core'),
			'min'         => 100,
			'max'         => 800,
			'step'        => 1,
			'unit'        => 'px',
			'output'      => '.breadcrumb.post-banner,.breadcrumb.page-banner',
			'output_mode' => 'height',
			'subtitle'    => esc_html__('Select banner min height.', 'xpress-core'),
			'desc'        => esc_html__('Select banner min height.', 'xpress-core'),
			'dependency'  => array('enable_banner', '==', true),
		),
	)
));


// Create Footer section
CSF::createSection($evisa_common_meta, array(
	'title'  => esc_html__('Footer Options', 'xpress-core'),
	'icon' => 'fa fa-wordpress',
	'fields' => array(

        array(
            'id'       => 'meta_footer_type',
            'type'     => 'switcher',
            'title'    => __( 'Footer Style', 'xpress-core' ),
            'text_on'  => __( 'Yes', 'xpress-core' ),
            'text_off' => __( 'No', 'xpress-core' ),
            'default'  => false
        ),
        array(
            'id'          => 'meta_footer_style',
            'type'        => 'select',
            'title'       => __('Select Footer Style', 'xpress-core' ),
            'options'     => Evisa_Plugin_Helper::get_footer_types(),
            'dependency' => array( 'meta_footer_type', '==', 'true' ),
        ),
        array(
            'id'      => 'page_footer_sticky_disable',
            'title'   => esc_html__( 'Disable Stikcy Footer', 'xpress-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Disable or Disable Stikcy Footer', 'xpress-core' ),
            'default' => false,
        ),
        array(
            'id'       => 'page_footer_disable',
            'type'     => 'switcher',
            'title'    => __( 'DIsable This page Footer?', 'xpress-core' ),
            'text_on'  => __( 'Yes', 'xpress-core' ),
            'text_off' => __( 'No', 'xpress-core' ),
            'default'  => false
        ),

	)
));

/*-------------------------------------
    Page Options
    -------------------------------------*/

