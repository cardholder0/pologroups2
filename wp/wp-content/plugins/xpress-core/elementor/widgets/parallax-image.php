<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Parallax_Image extends Widget_Base
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
        return 'int-parallax-image';
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
        return esc_html__('Parallax Image', 'xpress-core');
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


        $this->add_control(
            'parallax_img', [
                'label' => esc_html__('Shape Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Align', 'xpress-core'),
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
                    '{{WRAPPER}} .parallax-image' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'posY',
            [
                'label' => esc_html__('Parallax Y', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'step' => 5,
            ]
        );
        $this->add_control(
            'posX',
            [
                'label' => esc_html__('Parallax X', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'step' => 5,
            ]
        );


        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="parallax-image">
            <img data-parallax='{<?php if (!empty($settings['posX'])) { ?> "x":<?php echo esc_attr($settings['posX']) ?>, <?php }
            if (!empty($settings['posY'])) { ?> "y":<?php echo esc_attr($settings['posY']) ?> <?php } ?> }'
                 src="<?php echo esc_url($settings['parallax_img']['url']); ?>" alt="">
        </div>

        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Evisa_Parallax_Image());