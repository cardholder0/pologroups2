<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Contact_V2 extends Widget_Base
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
        return 'int-contact-v2';
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
        return esc_html__('Contact V2', 'xpress-core');
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
            'form_option',
            [
                'label' => esc_html__('Form', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'shortcode', [
                'label' => esc_html__('Form Shortcode', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'image_option',
            [
                'label' => esc_html__('Image', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'shape1', [
                'label' => esc_html__('Shape 1', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'shape2', [
                'label' => esc_html__('Shape 2', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'shape3', [
                'label' => esc_html__('Shape 3', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'shape4', [
                'label' => esc_html__('Shape 4', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'color_option',
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
                    '{{WRAPPER}} .sec-title--sub' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .sec-title--sub',
            ]
        );

        $this->add_control(
            'title-style',
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
                    '{{WRAPPER}} .sec-title--heading' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttile_typography',
                'selector' => '{{WRAPPER}} .sec-title--heading',
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
            'form_option_style',
            [
                'label' => esc_html__('Form', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'field-c',
            [
                'label' => esc_html__('Field Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-contact2 .xb-item--field input' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-contact2 .xb-item--field textarea' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'field-bg-c',
            [
                'label' => esc_html__('Field BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-contact2 .xb-item--field input' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-contact2 .xb-item--field textarea' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-contact2 .xb-item--field .nice-select' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'field_typography',
                'selector' => '{{WRAPPER}} .xb-contact2 .xb-item--field input, 
                                {{WRAPPER}} .xb-contact2 .xb-item--field textarea,
                                {{WRAPPER}} .xb-contact2 .xb-item--field select',
            ]
        );

        $this->add_control(
            'button_style',
            [
                'label' => esc_html__('Button Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .grd-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .grd-btn',
            ]
        );
        $this->start_controls_tabs(
            'btn_tabs'
        );

        $this->start_controls_tab(
            'btn_normal_tab',
            [
                'label' => esc_html__('Normal', 'xpres-core'),
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Button Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grd-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_bg_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .grd-btn',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Button BG Color', 'xpress-core'),
                    ]
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'hbtn_hover_tab',
            [
                'label' => esc_html__('Hover', 'xpres-core'),
            ]
        );
        $this->add_control(
            'hbtn_color',
            [
                'label' => esc_html__('Button Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grd-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'hbtn_bg_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .grd-btn:hover',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Button BG Color', 'xpress-core'),
                    ]
                ]
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <section class="contact gray-bg-2">
            <div class="container">
                <div class="xb-contact2 pos-rel">
                    <div class="xb-contact2__bg" <?php if (!empty($settings['image']['url'])): ?>
                         style="background-image: url('<?php echo esc_url($settings['image']['url']); ?>') <?php endif; ?>"></div>
                    <div class="col-lg-7">
                        <div class="xb-item--holder">
                            <div class="sec-title sec-title--white style-2 mb-35">
                                <?php if (!empty($settings['subtitle'])): ?>
                                    <span class="sec-title--sub"><?php echo wp_get_attachment_image($settings['subtitle_icon']['id'], 'thumbnail') . ' ' . $settings['subtitle'] . ' ' . wp_get_attachment_image($settings['subtitle_icon']['id'], 'thumbnail'); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['title'])): ?>
                                    <h3 class="sec-title--heading"><?php echo wp_kses($settings['title'], true); ?></h3>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['shortcode'])): ?>
                            <div class="xb-item--form">
                                <?php echo do_shortcode($settings['shortcode']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="contact-shape">
                        <?php if (!empty($settings['shape1']['id'])): ?>
                            <div class="shape shape--1">
                                <div class="shape-inner" data-parallax='{"x":-50,"y":60}'>
                                    <?php echo wp_get_attachment_image($settings['shape1']['id'], 'large'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['shape2']['id'])): ?>
                            <div class="shape shape--2">
                                <div class="shape-inner" data-parallax='{"x":50,"y":-60}'>
                                    <?php echo wp_get_attachment_image($settings['shape2']['id'], 'large'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['shape3']['id'])): ?>
                            <div class="shape shape--3">
                                <div class="shape-inner" data-parallax='{"x":50}'>
                                    <?php echo wp_get_attachment_image($settings['shape3']['id'], 'large'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['shape4']['id'])): ?>
                            <div class="shape shape--4">
                                <div class="shape-inner" data-parallax='{"x":50,"y":60}'>
                                    <?php echo wp_get_attachment_image($settings['shape4']['id'], 'large'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Evisa_Contact_V2());