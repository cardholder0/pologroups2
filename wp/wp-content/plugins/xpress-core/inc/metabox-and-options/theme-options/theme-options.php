<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/*
 *  Create theme options
 */

$evisa_theme_option = 'evisa_theme_options';

// Create options
CSF::createOptions( $evisa_theme_option, array(
    'framework_title' => wp_kses(
        sprintf(__("Evisa Options <small>V %s</small>", 'xpress core'), $evisa_core_data->get('Version')),
        array('small' => array())
    ),
	'menu_title'      => __('Theme Options','xpress-core'),
	'menu_slug'       => 'evisa-options',
    'enqueue_webfont'    => true,
    'show_in_customizer' => true,
    'menu_icon' => 'dashicons-category',
	'show_sub_menu'   => false,
	'class'           => 'evisa-theme-option',
	'menu_position'   =>3,
	'footer_text'   => wp_kses(
		__( 'Developed by: <a target="_blank" href="https://xpressbuddy.com">XpressBuddy</a>', 'xpress-core' ),
		array(
			'a'      => array(
				'href'   => array(),
				'target' => array()
			),
		)
	),
	'async_webfont' => false,
) );

/*
 * General options
 */
require_once 'general-options.php';

/*
 * Typography options
 */
require_once 'typography-options.php';


/*
 * Header options
 */
require_once 'header-options.php';

/*
 * Banner options
 */
require_once 'banner-options.php';

/*
 * Page Options
 */
require_once 'page-options.php';


/*
 * Blog page options
 */
require_once 'blog-page-options.php';

/*
 * Signle Post options
 */
require_once 'single-post-options.php';

/*
 * WooCommerce options
 */
require_once 'woocommerce-options.php';

/*
 * Portfolio options
 */
require_once 'portfolio-options.php';

/*
 * County options
 */
require_once 'county-options.php';

/*
 * Archive Page Options
 */
require_once 'archive-page-options.php';

/*
 * Search Page Options
 */
require_once 'search-page-options.php';

/*
 * Error 404 Page Options
 */
require_once 'error-page-options.php';

/*
 * Footer options
 */
require_once 'footer-options.php';

// Custom Css section
CSF::createSection( $evisa_theme_option, array(
	'title'  => esc_html__( 'Custom Css', 'xpress-core' ),
	'id'     => 'custom_css_options',
	'icon'   => 'fa fa-css3',
	'fields' => array(

		array(
			'id'       => 'evisa_custom_css',
			'type'     => 'code_editor',
			'title'    => esc_html__( 'Custom Css', 'xpress-core' ),
			'settings' => array(
				'theme'  => 'mbo',
				'mode'   => 'css',
			),
			'sanitize' => false,
		),
	)
) );


/*
 * Backup options
 */
CSF::createSection($evisa_theme_option, array(
	'title'  => esc_html__('Backup', 'xpress-core'),
	'id'     => 'backup_options',
	'icon'   => 'fa fa-window-restore',
	'fields' => array(
		array(
			'type' => 'backup',
		),
	)
));

