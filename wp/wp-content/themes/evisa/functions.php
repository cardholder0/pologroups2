<?php

$evisa_theme_data = wp_get_theme();

/*
 * Define theme version
 */
define('EVISA_VERSION', (WP_DEBUG) ? time() : $evisa_theme_data->get('Version'));

/*
 * Inc folder directory
 */
define('EVISA_INC_DIR', get_template_directory() . '/inc/');

/*
 * After setup theme
 */
require_once EVISA_INC_DIR . 'theme-setup.php';

/*
 * Load default theme options
 */
 require_once EVISA_INC_DIR . 'cs-framework-functions.php';

/*
 * Load meta box and theme options if Codestar framework installed.
 */
if( class_exists( 'CSF' ) ) {
    // require_once EVISA_INC_DIR . 'metabox-and-options/metabox-and-options.php';
}

/**
 * Template Functions
 */
require EVISA_INC_DIR . 'template-functions.php';

/*
 * Enqueue styles and scripts.
 */
require_once EVISA_INC_DIR . 'css-and-js.php';

/*
 * Register widget area
 */
require_once EVISA_INC_DIR . 'widget-area-init.php';

/**
 * tgmp functions file
 */
require_once EVISA_INC_DIR . 'class-tgm-plugin-activation.php';
require_once EVISA_INC_DIR . 'add-plugin.php';

/*
 * Load inline style.
 */
require_once EVISA_INC_DIR . 'inline-style.php';

/**
 * Implement the Custom Header feature.
 */
require EVISA_INC_DIR . 'custom-header.php';

/**
 * Custom template tags for this theme.
 */
require EVISA_INC_DIR . 'class-wp-evisa-navwalker.php';

/**
 * evisa Core Functions
 */
require EVISA_INC_DIR . 'evisa-helper-class.php';

/**
 * Customizer additions.
 */
require EVISA_INC_DIR . '/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require EVISA_INC_DIR . '/jetpack.php';
}

/*
 * Comment Template
 */
require_once EVISA_INC_DIR . 'comment-template.php';

/*
 * Import Demo Content
 */
require_once EVISA_INC_DIR . 'demo-content/import-demo-content.php';


