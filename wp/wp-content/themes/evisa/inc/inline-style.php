<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function evisa_inline_style() {

    wp_enqueue_style('evisa-inline-style', get_theme_file_uri('assets/css/inline-style.css'), array(), EVISA_VERSION, 'all');

    $css_output = '
        .elementor-inner {margin-left: -10px;margin-right: -10px;}.elementor-inner .elementor-section-wrap > section:first-of-type .elementor-editor-element-settings {display: block !important;}.elementor-inner .elementor-section-wrap > section:first-of-type .elementor-editor-element-settings li {display: inline-block !important;}.elementor-editor-active .elementor-editor-element-setting{height: 25px;line-height: 25px;text-align: center;}.elementor-section.elementor-section-boxed>.elementor-container {max-width: 1320px !important;}.elementor-section-stretched.elementor-section-boxed .elementor-row{padding-left: 5px;padding-right: 5px;}.elementor-section-boxed .elementor-container.elementor-column-gap-extended {margin-left: -5px;margin-right: -5px;}.elementor-section-stretched.elementor-section-boxed .elementor-container.elementor-column-gap-extended {margin-left: auto;margin-right: auto;}
    ';

    $theme_primary_color = evisa_option('theme_primary_color');
    $theme_secondary_color = evisa_option('theme_secondary_color');
    $theme_gradient_color = evisa_option('theme_gradient_color');

    if(!empty($theme_primary_color)){
        $css_output .= '       
        :root {
            --color-primary: '.esc_attr($theme_primary_color).';
        }            
        ';
    }
    if(!empty($theme_secondary_color)){
        $css_output .= '       
        :root {
            --color-secondary: '.esc_attr($theme_secondary_color).'
        }            
        ';
    }
    if(!empty($theme_gradient_color['color-1']) && !empty($theme_gradient_color['color-2'])){
        $css_output .= '       
        :root {
            --gradient-color-from: '.esc_attr($theme_gradient_color['color-1']).';
            --gradient-color-to: '.esc_attr($theme_gradient_color['color-2']).';
            --color-primary-2: '.esc_attr($theme_gradient_color['color-2']).';
        }            
        ';
    }

    $custom_css = evisa_option('evisa_custom_css');

    $css_output .= ''.$custom_css.'';

    wp_add_inline_style('evisa-inline-style', $css_output);
}

add_action('wp_enqueue_scripts', 'evisa_inline_style');