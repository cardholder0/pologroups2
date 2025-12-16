<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Contact extends Widget_Base
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
        return 'int-contact';
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
        return esc_html__('Contact', 'xpress-core');
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
            'subtitle_icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $this->add_control(
            'sub_title', [
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
            'map_option',
            [
                'label' => esc_html__('Google Map', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'location_input',
            [
                'label' => __('Location Input', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'description' => __('Write the location name or address here.'),
                'default' => '1600 Amphitheatre Parkway, Mountain View, CA 94043, USA',
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
                    '{{WRAPPER}} .sec-title .subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .sec-title .subtitle',
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
                    '{{WRAPPER}} .sec-title .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttile_typography',
                'selector' => '{{WRAPPER}} .sec-title .title',
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
                    '{{WRAPPER}} .xb-contact .xb-item--field input' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-contact .xb-item--field textarea' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'field-bg-c',
            [
                'label' => esc_html__('Field BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-contact .xb-item--field input' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-contact .xb-item--field textarea' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-contact .xb-item--field .nice-select' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'field_typography',
                'selector' => '{{WRAPPER}} .xb-contact .xb-item--field input, 
                                {{WRAPPER}} .xb-contact .xb-item--field textarea,
                                {{WRAPPER}} .xb-contact .xb-item--field select',
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
                    '{{WRAPPER}} .xb-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .xb-btn',
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
                    '{{WRAPPER}} .xb-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'background-color: {{VALUE}}',
                ],
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
                    '{{WRAPPER}} .xb-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hbtn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $location = $settings['location_input'];

        // If a location is provided, use Nominatim API to get latitude and longitude
        if (!empty($location)) {
            $geocoded_data = $this->geocode_location($location);

            if ($geocoded_data) {
                $latitude = $geocoded_data['latitude'];
                $longitude = $geocoded_data['longitude'];
            }
        }
        ?>

        <section class="contact contact-pt gray-bg">
            <div class="container">
                <div class="xb-contact pos-rel">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="xb-item--inner">
                                <div class="xb-item--holder mb-25">
                                    <?php if (!empty($settings['sub_title'])): ?>
                                        <span><span><?php \Elementor\Icons_Manager::render_icon($settings['subtitle_icon'], ['aria-hidden' => 'true']); ?></span><?php echo esc_html($settings['sub_title']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['title'])): ?>
                                        <h3><?php echo wp_kses($settings['title'], true); ?></h3>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['shortcode'])): ?>
                                    <div class="xb-item--form contact-from">
                                        <?php echo do_shortcode($settings['shortcode']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Create a new Google Maps URL with the provided latitude and longitude
                    $map_src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14602.254272231177!2d' . $longitude . '!3d' . $latitude . '!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1592852423971!5m2!1sen!2sbd';

                    echo '<div class="google-map"><iframe src="' . esc_url($map_src) . '"></iframe></div>';
                    ?>
                </div>
            </div>
        </section>
        <?php
    }

    // Function to geocode location using Nominatim API
    private function geocode_location($location)
    {
        $geocode_url = 'https://nominatim.openstreetmap.org/search?format=json&q=' . urlencode($location);

        $response = wp_remote_get($geocode_url);

        if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body, true);

            if (!empty($data) && isset($data[0]['lat']) && isset($data[0]['lon'])) {
                $latitude = $data[0]['lat'];
                $longitude = $data[0]['lon'];

                return ['latitude' => $latitude, 'longitude' => $longitude];
            }
        }

        return false;
    }


}


Plugin::instance()->widgets_manager->register(new Evisa_Contact());