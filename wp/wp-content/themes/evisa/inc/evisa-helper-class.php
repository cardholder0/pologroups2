<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * evisa Theme Helper
 *
 * @class        Evisa_Helper
 * @version      1.0
 * @category     Class
 */
if (!class_exists('Evisa_Helper')) {
    class Evisa_Helper
    {

        /**
         * Check if Evisa_Plugin_Helper is available
         */
        private static function is_evisa_plugin_active()
        {
            return class_exists('Evisa_Plugin_Helper');
        }

        /**
         * Check if Elementor is active
         */
        private static function is_elementor_active()
        {
            return class_exists('Elementor\Plugin');
        }

        /**
         * Header Template
         */
        public static function evisa_header_template()
        {
            // Check if Evisa_Plugin_Helper and Elementor are available
            if (self::is_evisa_plugin_active() && self::is_elementor_active()) {
                $meta = get_post_meta(get_the_ID(), 'evisa_common_meta', true);
                $meta_header_option = isset($meta['meta_header_type']) ? $meta['meta_header_type'] : '';

                $f_style = evisa_option('header_style');
                $header_style = '';

                $meta_header = isset($meta['meta_header_style']) ? $meta['meta_header_style'] : '';

                if ($meta_header_option == true || $meta_header_option == 1) {
                    $header_style .= $meta_header;
                } else {
                    $header_style .= $f_style;
                }

                // Check if the header_style is not empty
                if (!empty($header_style) && (get_post($header_style))) {
                    $elementor_instance = Elementor\Plugin::instance();
                    echo Evisa_Plugin_Helper::evisa_render_header($header_style);
                } else {
                    // Evisa_Plugin_Helper or Elementor is not available, or header_style is empty, load default header
                    get_template_part('template-parts/header/default', 'header');
                }
            } else {
                // Evisa_Plugin_Helper or Elementor is not available, load default header
                get_template_part('template-parts/header/default', 'header');
            }
        }

        /**
         * Footer Template
         */
        public static function evisa_footer_template()
        {
            // Check if Evisa_Plugin_Helper and Elementor are available
            if (self::is_evisa_plugin_active() && self::is_elementor_active()) {
                $meta = get_post_meta(get_the_ID(), 'evisa_common_meta', true);
                $meta_footer_option = isset($meta['meta_footer_type']) ? $meta['meta_footer_type'] : '';

                $f_style = evisa_option('footer_style');
                $footer_style = '';

                $meta_footer = isset($meta['meta_footer_style']) ? $meta['meta_footer_style'] : '';

                if ($meta_footer_option == true || $meta_footer_option == 1) {
                    $footer_style .= $meta_footer;
                } else {
                    $footer_style .= $f_style;
                }

                // Check if the footer_style is not empty
                if (!empty($footer_style) && (get_post($footer_style))) {
                    $elementor_instance = Elementor\Plugin::instance();
                    echo Evisa_Plugin_Helper::evisa_render_footer($footer_style);
                } else {
                    // Evisa_Plugin_Helper or Elementor is not available, or footer_style is empty, load default footer
                    get_template_part('template-parts/footer/default', 'footer');
                }
            } else {
                // Evisa_Plugin_Helper or Elementor is not available, load default footer
                get_template_part('template-parts/footer/default', 'footer');
            }
        }
    }

    // Instantiate theme
    new Evisa_Helper();
}
