<?php


/**
 * Enqueue styles and scripts.
 */
function evisa_enqueue_css_and_js() {

    /*
     * Load Google fonts.
     * User can customized this default fonts from theme options
     */
    function evisa_fonts_url() {
        $fonts_url = '';
        $fonts     = [];
        $subsets   = 'latin,latin-ext';

        if ( 'off' !== _x( 'on', 'Plus Jakarta Sans: on or off', 'evisa' ) ) {
            $fonts[] = 'Plus Jakarta Sans:300,400,500,600,700';
        }

        if ( 'off' !== _x( 'on', 'Inter: on or off', 'evisa' ) ) {
            $fonts[] = 'Inter:300,400,500,600,700';
        }

        if ( 'off' !== _x( 'on', 'Dancing Script: on or off', 'evisa' ) ) {
            $fonts[] = 'Dancing Script:400,500,600,700';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $fonts_url );
    }

    wp_enqueue_style( 'evisa-googlefonts', evisa_fonts_url(), [], null );

    // Enqueue Style
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'assets/css/bootstrap.min.css' ), array(), '5.0.', 'all' );

    wp_enqueue_style( 'font-awesome-5', get_theme_file_uri( 'assets/css/fontawesome.css' ), array(), '5.13.0', 'all' );
    
    wp_enqueue_style( 'e-animations', get_theme_file_uri( 'assets/css/animate.css' ), array(), '3.5.1', 'all' );

    wp_enqueue_style( 'swiper-evisa', get_theme_file_uri( 'assets/css/swiper.min.css' ), array(), '6.6.1', 'all' );

    wp_enqueue_style( 'odometer', get_theme_file_uri( 'assets/css/odometer.css' ), array(), '0.4.8', 'all' );

    wp_enqueue_style( 'nice-select', get_theme_file_uri( 'assets/css/nice-select.css' ), array(), '1.0.0', 'all' );

    wp_enqueue_style( 'jquery-ui', get_theme_file_uri( 'assets/css/jquery-ui.min.css' ), array(), '1.12.1', 'all' );

    wp_enqueue_style( 'magnific-popup', get_theme_file_uri( 'assets/css/magnific-popup.css' ), array(), '3.1.9', 'all' );

    wp_enqueue_style( 'evisa-core', get_theme_file_uri( 'assets/css/evisa-core.css' ), array(), EVISA_VERSION, 'all' );

    wp_enqueue_style( 'evisa-main', get_theme_file_uri( 'assets/css/main.css' ), array(), EVISA_VERSION, 'all' );

    wp_enqueue_style( 'evisa-style', get_stylesheet_uri(), array(), EVISA_VERSION, 'all' );

    // Enqueue script

    wp_enqueue_script( 'bootstrap', get_theme_file_uri( 'assets/js/bootstrap.bundle.min.js' ), array( 'jquery' ), '5.0.0', true );

    wp_enqueue_script( 'swiper-slider', get_theme_file_uri( 'assets/js/swiper.min.js' ), array( 'jquery' ), '6.7.0', true );

    wp_enqueue_script( 'wow', get_theme_file_uri( 'assets/js/wow.min.js' ), array( 'jquery' ), '1.1.3', true );

    wp_enqueue_script( 'appear', get_theme_file_uri( 'assets/js/appear.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'odometer', get_theme_file_uri( 'assets/js/odometer.min.js' ), array( 'jquery' ), '0.4.8', true );

    wp_enqueue_script( 'nice-select', get_theme_file_uri( 'assets/js/jquery.nice-select.min.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'imagesloaded', get_theme_file_uri( 'assets/js/imagesloaded.pkgd.min.js' ), array( 'jquery' ), '4.1.4', true );

    wp_enqueue_script( 'isotope', get_theme_file_uri( 'assets/js/isotope.pkgd.min.js' ), array( 'jquery' ), '3.0.5', true );

    wp_enqueue_script( 'magnific-popup', get_theme_file_uri( 'assets/js/jquery.magnific-popup.min.js' ), array( 'jquery' ), '1.1.0', true );

    wp_enqueue_script( 'jquery-ui', get_theme_file_uri( 'assets/js/jquery-ui.min.js' ), array( 'jquery' ), '1.12.1', true );

    wp_enqueue_script( 'parallax', get_theme_file_uri( 'assets/js/parallax.min.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'parallax-scroll', get_theme_file_uri( 'assets/js/parallax-scroll.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'jarallax', get_theme_file_uri( 'assets/js/jarallax.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'evisa-main', get_theme_file_uri( 'assets/js/main.js' ), array( 'jquery' ), EVISA_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'evisa_enqueue_css_and_js' );

/**
 * Enqueue Backend Styles And Scripts.
 **/

function evisa_backend_css_js( $screen ) {

    if ( $screen == "widgets.php" ) {
        wp_enqueue_media();
        wp_enqueue_script( 'evisa-media-upload', get_theme_file_uri( 'assets/js/media-upload.js' ), array( 'jquery' ), '1.0.0', true );
    }
}

add_action( 'admin_enqueue_scripts', 'evisa_backend_css_js' );