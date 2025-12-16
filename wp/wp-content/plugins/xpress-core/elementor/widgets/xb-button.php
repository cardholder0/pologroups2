<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Button extends Widget_Base
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
        return 'int-button';
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
        return esc_html__('Button', 'xpress-core');
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
            'btn_option',
            [
                'label' => esc_html__('Button', 'xpress-core'),
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
            'btn_label', [
                'label' => esc_html__('Button Label', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Button Link', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
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

                'selectors' => [
                    '{{WRAPPER}} .xb-tran-btn' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .xb-btn-wrap' => 'text-align: {{VALUE}};',
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
            'btn_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .grd-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .xb-tran-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .thm-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'btn_radius',
            [
                'label' => esc_html__('Border Radius', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .grd-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .thm-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .grd-btn, {{WRAPPER}} .xb-tran-btn, {{WRAPPER}} .thm-btn',
            ]
        );

        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xpress-core'),
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Button Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grd-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-tran-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .thm-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_bg_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .grd-btn, {{WRAPPER}} .xb-tran-btn, {{WRAPPER}} .thm-btn',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Button BG Color', 'xpress-core'),
                    ]
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'xpress-core'),
            ]
        );

        $this->add_control(
            'h_btn_color',
            [
                'label' => esc_html__('Button Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grd-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-tran-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .thm-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'hbtn_bg_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .grd-btn:hover, {{WRAPPER}} .xb-tran-btn:hover, {{WRAPPER}} .thm-btn:hover',
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
        $target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): ?>
        <div class="xb-btn-wrap">
            <a class="xb-tran-btn" href="<?php echo esc_url($settings['btn_link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php echo esc_html($settings['btn_label']); ?><span><?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?></span></a>
        </div>
    <?php elseif ($settings['design_style'] === 'style_3'): ?>
    <div class="xb-btn-wrap">
        <a class="thm-btn thm-btn--trv" href="<?php echo esc_url($settings['btn_link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php echo esc_html($settings['btn_label']); ?><span><?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?></span></a>
    </div>
    <?php else: ?>
        <div class="xb-btn-wrap">
            <a class="grd-btn"
               href="<?php echo esc_url($settings['btn_link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php echo esc_html($settings['btn_label']); ?>
                <span><?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?></span></a>
        </div>

    <?php
    endif;
    }


}


Plugin::instance()->widgets_manager->register(new Evisa_Button());