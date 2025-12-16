<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Newsletter extends Widget_Base
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
        return 'int-newsletter';
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
        return esc_html__('Newsletter', 'xpress-core');
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
            'social_content_option',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sbutitle', [
                'label' => esc_html__('Sub Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
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
        $this->add_control(
            'shortcode', [
                'label' => esc_html__('Shortcode', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'img_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
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
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-social span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-footer-social-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .footer-social span,
                                {{WRAPPER}} .bc-footer-social-title',
            ]
        );
        $this->add_control(
            'social_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'social-c',
            [
                'label' => esc_html__('Social Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-social ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-footer-social li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-footer-social li a svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .footer-social ul li a svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social-bg-c',
            [
                'label' => esc_html__('Social BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-footer-social li a' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );
        $this->add_control(
            'social-c-h',
            [
                'label' => esc_html__('Social Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-social ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-footer-social li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-footer-social li a:hover svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .footer-social ul li a:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social-hover-bg-c',
            [
                'label' => esc_html__('Social Hover BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-footer-social li a:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <section class="newsletter">
            <div class="container">
                <div class="xb-newsletter pos-rel">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="xb-item--inner">
                                <div class="xb-item--holder mb-30">
                                    <?php if (!empty($settings['sbutitle'])): ?>
                                        <span><?php echo esc_html($settings['sbutitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['title'])): ?>
                                        <h3><?php echo wp_kses($settings['title'], true); ?></h3>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['shortcode'])): ?>
                                    <div class="xb-item--form">
                                        <?php echo do_shortcode($settings['shortcode']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['image']['id'])): ?>
                        <div class="xb-newsletter__img">
                            <?php echo wp_get_attachment_image($settings['image']['id'], 'large'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php

    }


}


Plugin::instance()->widgets_manager->register(new Evisa_Newsletter());