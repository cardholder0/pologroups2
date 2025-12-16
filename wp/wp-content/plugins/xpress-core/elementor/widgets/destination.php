<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Destination extends Widget_Base
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
        return 'int-destination';
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
        return esc_html__('Destination', 'xpress-core');
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

        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'xpress-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style Destination', 'xpress-core'),
                    'style_2' => __('Style Video', 'xpress-core'),
                ],
                'default' => 'style_1',
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
            'video_url', [
                'label' => esc_html__('Video Url', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );
        $this->add_control(
            'location', [
                'label' => esc_html__('Location', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );
        $this->add_control(
            'package_text', [
                'label' => esc_html__('Package Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'design_style' => ['style_1'],
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
            'border_color',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-destination' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'location_text-c',
            [
                'label' => esc_html__('Location Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-destination .xb-item--title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'location_text_typography',
                'selector' => '{{WRAPPER}} .xb-destination .xb-item--title',
            ]
        );
        $this->add_control(
            'package_text_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'package_text-c',
            [
                'label' => esc_html__('Package Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-destination .xb-item--holder span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'package_text_typography',
                'selector' => '{{WRAPPER}} .xb-destination .xb-item--holder span',
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): ?>
        <div class="xb-destination style-video mt-40">
            <div class="xb-item--img">
                <a class="popup-video" href="<?php echo esc_url($settings['video_url']); ?>"><?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?></a>
                <a class="xb-item--play popup-video" href="https://www.youtube.com/watch?v=cRXm1p-CNyk"><i
                            class="fas fa-play"></i></a>
            </div>
        </div>
    <?php else: ?>
        <div class="xb-destination mt-40">
            <div class="xb-item--img">
                <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
                <div class="xb-item--holder">
                    <h3 class="xb-item--title"><?php echo esc_html($settings['location']); ?></h3>
                    <span><?php echo esc_html($settings['package_text']); ?></span>
                </div>
            </div>
        </div>
    <?php endif;
    }

}


Plugin::instance()->widgets_manager->register(new Evisa_Destination());