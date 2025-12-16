<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Feature_V2 extends Widget_Base
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
        return 'int-feature-v2';
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
        return esc_html__('Feature V2', 'xpress-core');
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
            'section_title_option',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'subtitle', [
                'label' => esc_html__('Sub Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'subtitle_icon', [
                'label' => esc_html__('Sub Title Icon', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_option',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon_default',
            [
                'label' => esc_html__('Icon Default', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'icon_hover',
            [
                'label' => esc_html__('Icon Hover', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'ftitle', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'fcontent', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'lists',
            [
                'label' => esc_html__('Add List Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub-title-c',
            [
                'label' => esc_html__('Sub Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .sec-title--sub' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .sec-title .sec-title--sub',
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
                    '{{WRAPPER}} .sec-title .sec-title--heading' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .sec-title .sec-title--heading',
            ]
        );
        $this->add_control(
            'title_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title--heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'content_color_option',
            [
                'label' => esc_html__('Content Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'icon-c',
            [
                'label' => esc_html__('Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-feature2 .xb-item--icon .default' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_h-c',
            [
                'label' => esc_html__('Icon Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-feature2 .xb-item--icon .hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_bg-c',
            [
                'label' => esc_html__('Icon BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-feature2 .xb-item--icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'gd_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .xb-feature2 .xb-item--icon::before',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Icon Hover Gradient Color', 'xpress-core'),
                    ]
                ]
            ]
        );

        $this->add_control(
            'ftitle_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'ftitle-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-feature2 .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ftitle_typography',
                'selector' => '{{WRAPPER}} .xb-feature2 .xb-item--title',
            ]
        );
        $this->add_control(
            'fcontent_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'fcontent-c',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-feature2 .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'fcontent_typography',
                'selector' => '{{WRAPPER}} .xb-feature2 .xb-item--content',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <section class="feature pos-rel pt-120 pb-120">
            <div class="container">
                <div class="sec-title style-2 text-center mb-60 z-index-2">
                    <span class="sec-title--sub"><?php echo wp_get_attachment_image($settings['subtitle_icon']['id'], 'thumbnail') . ' ' . $settings['subtitle'] . ' ' . wp_get_attachment_image($settings['subtitle_icon']['id'], 'thumbnail'); ?></span>
                    <?php if (!empty($settings['title'])): ?>
                        <h3 class="sec-title--heading mb-30"><?php echo wp_kses($settings['title'], true); ?></h3>
                    <?php endif; ?>
                </div>
            </div>
            <div class="xb-feature2__wrap">
                <div class="container">
                    <div class="row justify-content-md-center g-0">
                        <?php foreach ($settings['lists'] as $list): ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="xb-feature xb-feature2 text-center">
                                    <div class="xb-item--line"></div>
                                    <div class="xb-item--inner">
                                        <div class="xb-item--icon">
                                            <span class="default"><?php \Elementor\Icons_Manager::render_icon($list['icon_default'], ['aria-hidden' => 'true']); ?></span>
                                            <span class="hover"><?php \Elementor\Icons_Manager::render_icon($list['icon_hover'], ['aria-hidden' => 'true']); ?></span>
                                        </div>
                                        <div class="xb-item--holder">
                                            <?php if (!empty($list['ftitle'])): ?>
                                                <h3 class="xb-item--title"><?php echo esc_html($list['ftitle']); ?></h3>
                                            <?php endif; ?>
                                            <?php if (!empty($list['fcontent'])): ?>
                                                <div class="xb-item--content">
                                                    <?php echo wp_kses($list['fcontent'], true); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="xb-feature-right-line"></div>
                </div>
            </div>
        </section>

        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Evisa_Feature_V2());