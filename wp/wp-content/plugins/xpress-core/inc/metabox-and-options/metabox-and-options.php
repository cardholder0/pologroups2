<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_filter( 'csf_welcome_page', '__return_false' );
/*
 * Theme options
 */
require_once 'theme-options/theme-options.php';

/*
 * Common metabox
 */
require_once 'metabox/post-format-metaboxes.php';

/*
 * Common metabox
 */
require_once 'metabox/common-metaboxes.php';

/*
 * Header/Foooter metabox
 */
require_once 'metabox/header-footer-metabox.php';

/*
 * Category metabox
 */
require_once 'metabox/category-metaboxes.php';


/*
 * Career metabox
 */
require_once 'metabox/country-metabox.php';