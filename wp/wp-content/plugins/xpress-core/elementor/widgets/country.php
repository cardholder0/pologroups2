<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Country extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'int-country';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Country', 'xpress-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'xpress-custom-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['evisa_widgets'];
    }


    protected function register_controls()
    {
        $this->start_controls_section(
            'country_option',
            [
                'label' => esc_html__('Country', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'template',
            [
                'type' => Controls_Manager::SELECT2,
                'options' => $this->template_select(),
                'multiple' => false,
                'label' => esc_html__('Country', 'thepack'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'lists',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'prevent_empty' => false,
            ]
        );
        $this->add_control(
            'note_label',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => sprintf(
                    '<div class="elementor-panel-alert elementor-panel-alert-info">
                <p>%s</p>
            </div>',
                    sprintf(
                        __('Please note! Customize your selected Country using Elementor. You can find it under <a href="%s" target="_blank">Countries</a>.', 'xpress-core'),
                        admin_url('edit.php?post_type=evisa_country')
                    )
                ),
                'content_classes' => 'elementor-notice-container',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'color_option',
            [
                'label' => esc_html__('Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cn-c',
            [
                'label' => esc_html__('Country Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-country .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'cn-bg-c',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-country .xb-item--inner' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'cn-border-c',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-country .xb-item--inner' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'cn_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-country .xb-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cn_typography',
                'selector' => '{{WRAPPER}} .xb-country .xb-item--title',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo '<div class="xb-country ul_li">';

        foreach ($settings['lists'] as $a) {
            $country_post = get_post($a['template']);

            if ($country_post) {
                $country_title = esc_html($country_post->post_title);
                $country_permalink = esc_url(get_permalink($country_post));

                $country_flag_meta = get_post_meta($country_post->ID, 'evisa_country_meta', true);

                if (is_array($country_flag_meta) && isset($country_flag_meta['country_flag']['url'])) {
                    $country_flag_url = esc_url($country_flag_meta['country_flag']['url']);

                    echo '<div class="xb-item--item">';
                    echo '<a href="' . $country_permalink . '" class="xb-item--inner ul_li">';
                    echo '<div class="xb-item--flag">';
                    echo '<img src="' . $country_flag_url . '" alt="">';
                    echo '</div>';
                    echo '<h3 class="xb-item--title">' . $country_title . '</h3>';
                    echo '</a>';
                    echo '</div>';
                }
            }
        }

        echo '</div>';
    }




    protected function template_select()
    {
        $type = 'evisa_country';
        global $post;
        $args = array('numberposts' => -1, 'post_type' => $type,);
        $posts = get_posts($args);
        $categories = array(
            '' => __('Select', 'xpress-core'),
        );
        foreach ($posts as $pn_cat) {
            $categories[$pn_cat->ID] = get_the_title($pn_cat->ID);
        }
        return $categories;
    }

    protected function render_template($id)
    {
        return Plugin::instance()->frontend->get_builder_content_for_display($id);
    }

}


Plugin::instance()->widgets_manager->register(new Evisa_Country());