<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Widget_Country extends Widget_Base
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
        return 'int-widget-country';
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
        return esc_html__('Widget Country', 'xpress-core');
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
                'label' => esc_html__('Country Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'post_order',
            [
                'label' => esc_html__('Country Order', 'xpress-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => esc_html__('Ascending', 'xpress-core'),
                    'DESC' => esc_html__('Descending', 'xpress-core'),
                ],
            ]
        );

        $this->add_control(
            'post_per_page',
            [
                'label' => __('Country Per Page', 'xpress-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'default' => 12,
            ]
        );
        $this->add_control(
            'post_categories',
            [
                'type' => Controls_Manager::SELECT2,
                'label' => esc_html__('Select Categories', 'xpress-core'),
                'options' => evisa_country_category(),
                'label_block' => true,
                'multiple' => true,
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
                    '{{WRAPPER}} .sidebar-widget .widget' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .sidebar-widget .widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'title-c',
            [
                'label' => esc_html__('Country Name Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-widget .widget-category li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'titleh-c',
            [
                'label' => esc_html__('Country Name Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-widget .widget-category li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title-bg-c',
            [
                'label' => esc_html__('Country Name BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-widget .widget-category li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title-bgh-c',
            [
                'label' => esc_html__('Country Name BG Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-widget .widget-category li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .sidebar-widget .widget-category li a',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $args = array(
            'post_type'      => 'evisa_country',
            'posts_per_page' => !empty($settings['post_per_page']) ? $settings['post_per_page'] : 1,
            'post_status'    => 'publish',
            'ignore_sticky_posts' => 1,
            'order'          => $settings['post_order'],
        );

        if (!empty($settings['post_categories'])) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'country_cat', // Change this to your actual taxonomy name
                    'field'    => 'term_id', // Change this to 'id' if your category IDs are being passed
                    'terms'    => $settings['post_categories'],
                ),
            );
        }

        $query = new \WP_Query($args);
        ?>

        <div class="sidebar-widget">
            <div class="widget">
                <ul class="widget-category country-widget list-unstyled" id="country-list">
                    <?php
                    $index = 1;
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $country_flag_meta = get_post_meta(get_the_ID(), 'evisa_country_meta', true);
                            $country_flag_url = esc_url($country_flag_meta['country_flag']['url']);
                            ?>
                            <li class="country-item <?php echo ($index > 6) ? 'hidden-country' : ''; ?>">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?><span><img src="<?php echo $country_flag_url; ?>" alt=""></span></a>
                            </li>
                            <?php
                            $index++;
                        }
                        wp_reset_postdata();

                        if ($index > 6) :
                            ?>
                            <li class="country-item more-button">
                                <a href="#" class="more-button-text" data-more="<?php echo esc_html__('More Country', 'xpress-core'); ?>" data-less="<?php echo esc_html__('Less Country', 'xpress-core'); ?>">
                                    <?php echo esc_html__('More Country', 'xpress-core'); ?>
                                    <span class="plus"><i class="far fa-plus"></i></span>
                                </a>
                            </li>
                        <?php endif;
                    } else {
                        echo '<li>' . esc_html__('No countries found', 'xpress-core') . '</li>';
                    } ?>
                </ul>
            </div>
        </div>
        <script>
            jQuery(document).ready(function ($) {
                $('.more-button-text').on('click', function (e) {
                    e.preventDefault();
                    $('.hidden-country').slideToggle();
                    $(this).toggleClass('reveal-button');
                    var text = $(this).hasClass('reveal-button') ? $(this).data('less') : $(this).data('more');
                    $(this).html(text + ' <span class="plus"><i class="far fa-plus"></i></span>');
                });
            });
        </script>
        <style>
            /* Style for the hidden countries */
            .hidden-country {
                display: none;
            }

            /* Style for the button */
            .more-button-text {
                cursor: pointer;
                display: block;
                padding: 10px;
                margin-top: 10px;
                background-color: #0073e6;
                color: #fff;
                text-align: center;
                text-decoration: none;
            }

            /* Style for the revealed button */
            .reveal-button {
                background-color: #f1f1f1;
            }
        </style>

        <?php
    }





}


Plugin::instance()->widgets_manager->register(new Evisa_Widget_Country());