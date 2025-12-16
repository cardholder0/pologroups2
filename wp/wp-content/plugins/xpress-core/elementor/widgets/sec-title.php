<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Section_Title extends Widget_Base
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
        return 'int-sec-title';
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
        return esc_html__('Section Title', 'xpress-core');
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
        return ['seargin_widgets'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'section_title_option',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'xpress-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'xpress-core'),
                    'style_2' => __('Style 2', 'xpress-core'),
                    'style_3' => __('Style 3', 'xpress-core'),
                ],
                'default' => 'style_1',
            ]
        );
        $this->add_control(
            'subtitle', [
                'label' => esc_html__('Sub Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'design_style' => ['style_2', 'style_3'],
                ],
            ]
        );
        $this->add_control(
            'subtitle_icon', [
                'label' => esc_html__('Sub Title Icon', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'condition' => [
                    'design_style' => 'style_1',
                ],
            ]
        );
        $this->add_responsive_control(
            'text_align',
            [
                'label' => esc_html__('Text Align', 'xpress-core'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,

                'options' => [
                    'start' => [
                        'title' => __('Left', 'xpress-core'),
                        'icon' => 'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' => __('Center', 'xpress-core'),
                        'icon' => 'eicon-text-align-center',
                    ],

                    'end' => [
                        'title' => __('Right', 'xpress-core'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],

                'devices' => ['desktop', 'tablet', 'mobile'],

                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .sec-title--sub' => 'justify-content: {{VALUE}};',
                ],
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
            'sub-title-c',
            [
                'label' => esc_html__('Sub Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sec-title--sub' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => ['style_2', 'style_3'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .sec-title .subtitle, {{WRAPPER}} .sec-title--sub',
                'condition' => [
                    'design_style' => ['style_2', 'style_3'],
                ],
            ]
        );

        $this->add_control(
            'cta-box-styl',
            [
                'label' => esc_html__('Title Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sec-title--heading' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title-highlight-c',
            [
                'label' => esc_html__('Title Highlight Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title h2 span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_1',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .sec-title .title, {{WRAPPER}} .sec-title--heading',
            ]
        );
        $this->add_control(
            'title_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sec-title--heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'content_hr',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .sec-title p',
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): ?>
        <div class="sec-title style-2">
            <span class="sec-title--sub"><?php echo wp_get_attachment_image($settings['subtitle_icon']['id'], 'thumbnail') . ' ' . $settings['subtitle'] . ' ' . wp_get_attachment_image($settings['subtitle_icon']['id'], 'thumbnail'); ?></span>
            <?php if (!empty($settings['title'])): ?>
                <h3 class="sec-title--heading"><?php echo wp_kses($settings['title'], true); ?></h3>
            <?php endif; ?>
        </div>
    <?php elseif ($settings['design_style'] === 'style_3'): ?>
        <div class="sec-title sec-title--travel">
            <?php if (!empty($settings['subtitle'])): ?>
                <span class="subtitle"><?php echo esc_html($settings['subtitle']); ?></span>
            <?php endif;
            if (!empty($settings['title'])): ?>
                <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="sec-title">
            <?php
            if (!empty($settings['title'])): ?>
                <h2 class="title wow skewIn"><?php echo wp_kses($settings['title'], true); ?></h2>
            <?php endif;
            if (!empty($settings['content'])): ?>
                <p><?php echo wp_kses($settings['content'], true); ?></p>
            <?php endif; ?>
        </div>
    <?php
    endif;
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Section_Title());