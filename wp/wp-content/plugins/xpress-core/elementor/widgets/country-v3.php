<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Country_V3 extends Widget_Base
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
        return 'int-country-v3';
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
        return esc_html__('Country V3', 'xpress-core');
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
            'flag', [
                'label' => esc_html__('Flag', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'text', [
                'label' => esc_html__('Country Name', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
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

        $this->end_controls_section();

        $this->start_controls_section(
            'image_option',
            [
                'label' => esc_html__('Image % Shape', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'shape', [
                'label' => esc_html__('Shape', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'dot1', [
                'label' => esc_html__('Dot 1', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'dot2', [
                'label' => esc_html__('Dot 2', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'dot3', [
                'label' => esc_html__('Dot 3', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'dot4', [
                'label' => esc_html__('Dot 4', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'strock_text', [
                'label' => esc_html__('Strock Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
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
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-country3 .xb-item--inner' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-country3 .xb-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'cn-c',
            [
                'label' => esc_html__('Country Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-country3 .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'country_text_typography',
                'selector' => '{{WRAPPER}} .xb-country3 .xb-item--title',
            ]
        );
        $this->add_control(
            'strock_text_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'strock_text-c',
            [
                'label' => esc_html__('Strock Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-strock-text-cat' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'strock_text_typography',
                'selector' => '{{WRAPPER}} .xb-strock-text-cat',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="country pt-md-100 pos-rel pt-170 pb-120">
            <div class="xb-country3__wrap ul_li_between">
                <?php
                foreach ($settings['lists'] as $list):
                    ?>
                    <div class="xb-country3">
                        <div class="xb-item--inner">
                            <div class="xb-item--flag">
                                <?php echo wp_get_attachment_image($list['flag']['id'], 'large'); ?>
                            </div>
                            <h3 class="xb-item--title"><?php echo esc_html($list['text']); ?></h3>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="country-shape" <?php if (!empty($settings['shape']['url'])): ?>
                 style="background-image: url('<?php echo esc_url($settings['shape']['url']); ?>') <?php endif; ?>"></div>
            <?php if (!empty($settings['strock_text'])): ?>
                <h2 class="xb-strock-text-cat xb-strock-text"><?php echo esc_html($settings['strock_text']); ?></h2>
            <?php endif; ?>
            <div class="country-icon-shape">
                <div class="shape shape--1">
                    <?php echo wp_get_attachment_image($settings['dot1']['id'], 'thumbnail'); ?>
                </div>
                <div class="shape shape--2">
                    <?php echo wp_get_attachment_image($settings['dot2']['id'], 'thumbnail'); ?>
                </div>
                <div class="shape shape--3">
                    <?php echo wp_get_attachment_image($settings['dot3']['id'], 'thumbnail'); ?>
                </div>
                <div class="shape shape--4">
                    <?php echo wp_get_attachment_image($settings['dot4']['id'], 'thumbnail'); ?>
                </div>
            </div>
        </section>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Evisa_Country_V3());