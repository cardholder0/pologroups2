<?php
/*
Plugin Name: Xpress Core
Plugin URI: https://themeforest.net/user/xpressbuddy
Description: After install the Evisa WordPress Theme, you must need to install this "xpress-core" first to get all functions of Evisa WP Theme.
Author: XpressBuddy
Author URI: http://xpressbuddy.com/
Version: 1.0.2
Text Domain: xpress-core
*/
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$evisa_core_data = wp_get_theme();
/**
 * Define Core Path
 */
define( 'EVISA_CORE_VERSION', (WP_DEBUG) ? time() : $evisa_core_data->get('Version'));
define( 'EVISA_DIR_PATH',plugin_dir_path(__FILE__) );
define( 'EVISA_DIR_URL',plugin_dir_url(__FILE__) );
define( 'EVISA_INC_PATH', EVISA_DIR_PATH . '/inc' );
define( 'EVISA_PLUGIN_IMG_PATH', EVISA_DIR_URL . '/assets/img' );

/**
 * Css Framework Load
 */
if ( file_exists(EVISA_DIR_PATH.'/lib/codestar-framework/codestar-framework.php') ) {
    require_once  EVISA_DIR_PATH.'/lib/codestar-framework/codestar-framework.php';
}

// Elementor - Remove Font Awesome 
add_action( 'elementor/frontend/after_register_styles',function() {
    foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
      wp_deregister_style( 'elementor-icons-fa-' . $style );
    }
  }, 20 );


/**
 * Deregister Elementor Animation
 *
 * @return void
 */
function evisa_de_reg() {
    wp_deregister_style( 'e-animations' );
}
add_action( 'wp_enqueue_scripts', 'evisa_de_reg' );
/**
 * Enqueue Admin Style
 *
 * @return void
 */
function evisa_enqueue_admin_customstyle() {
    wp_enqueue_style( 'admin-style', EVISA_DIR_URL . '/assets/css/admin-style.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'evisa_enqueue_admin_customstyle' );


function dequeue_wpml_styles(){
    wp_dequeue_style( 'swiper' );
    wp_deregister_style( 'swiper' );

    wp_dequeue_script( 'swiper' );
    wp_deregister_script( 'swiper' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_wpml_styles', 20 );

/**
 * Script Remove
 *
 * @return  [type]  [return description]
 */
function remove_jquery_sticky() {
		wp_dequeue_script( 'swiper' );
		wp_deregister_script( 'swiper' );
}
add_action( 'elementor/frontend/after_register_scripts', 'remove_jquery_sticky' );



/**
 * Custom Widget
 */
include_once EVISA_INC_PATH . "/custom-widget/recent-post-widget.php";

/**
 * Plugin Helper
 */
include_once EVISA_INC_PATH . "/evisa-plugin-helper.php";

/**
 * Themeoption
 */
include_once EVISA_INC_PATH . "/metabox-and-options/metabox-and-options.php";


/**
 * Helper Function
 */
include_once EVISA_INC_PATH . "/helper.php";



/**
 * Custom Post
 */
include_once EVISA_INC_PATH . "/post-type/header-footer.php";
include_once EVISA_INC_PATH . "/post-type/country.php";


/**
 * Elementor Configuration
 */
include_once EVISA_DIR_PATH . "/elementor/elementor-init.php";

add_filter('wpcf7_autop_or_not', '__return_false');


