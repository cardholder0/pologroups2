<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_FAQ_V2 extends Widget_Base
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
        return 'int-faq-v2';
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
        return esc_html__('FAQ V2', 'xpress-core');
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
            'content_option',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'active',
            [
                'label' => esc_html__('Active', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'faqs',
            [
                'label' => esc_html__('Add Faq Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
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
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .acc-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title-bg-c',
            [
                'label' => esc_html__('Title BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .acc-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title-border-c',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tt_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .acc-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .accordion_box .block .acc-btn',
            ]
        );
        $this->add_control(
            'arr_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'arr-c',
            [
                'label' => esc_html__('Arrow Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .acc-btn .arrow::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'arr-bg-c',
            [
                'label' => esc_html__('Arrow BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .acc-btn .arrow' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'arr-bg-active-c',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .accordion_box .block .acc-btn .arrow::after',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Arrow BG Active Color', 'xpress-core'),
                    ]
                ]
            ]
        );
        $this->add_control(
            'content_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accordion_box .block ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .accordion_box .block .content p, {{WRAPPER}} .accordion_box .block ul li',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="xb-faq xb-faq2">
            <ul class="xb-accordion accordion_box clearfix">

                <?php foreach ($settings['faqs'] as $faq): ?>
                    <li class="accordion block <?php if ('yes' == $faq['active']) {
                        echo esc_attr('active-block');
                    } ?>">
                        <div class="acc-btn">
                            <?php echo esc_html($faq['title']); ?>
                            <span class="arrow"></span>
                        </div>
                        <div class="acc_body <?php if ('yes' == $faq['active']) {
                            echo esc_attr('current');
                        } ?>">
                            <div class="content">
                                <?php echo wp_kses($faq['content'], true); ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Evisa_FAQ_V2());