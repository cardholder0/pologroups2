<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function evisa_default_theme_options() {
    return array(

        'not_found_text' => wp_kses(
            __( '<h2>Hi 👋 Sorry We Can’t Find That Page!</h2><p> Oops! The page you are looking for does not exist. It might have been moved or deleted. </p>', 'evisa' ),
            array(
                'a'      => array(
                    'href'   => array(),
                    'target' => array()
                ),
                'strong' => array(),
                'small'  => array(),
                'span'   => array(),
                'p'      => array(),
                'h1'     => array(),
                'h2'     => array(),
                'h3'     => array(),
                'h4'     => array(),
                'h5'     => array(),
                'h6'     => array(),
            )
        ),

        'blog_title'       => esc_html__( 'Blog', 'evisa' ),
        'error_page_title' => esc_html__( 'Error 404', 'evisa' ),
    );
}

//Get theme options
if ( ! function_exists( 'evisa_option' ) ) {
    function evisa_option( $option = '', $default = null ) {
        $defaults = evisa_default_theme_options();
        $options  = get_option( 'evisa_theme_options' );
        $default  = ( ! isset( $default ) && isset( $defaults[ $option ] ) ) ? $defaults[ $option ] : $default;

        return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
    }
}
