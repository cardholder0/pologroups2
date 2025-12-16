<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Blog_V4 extends Widget_Base
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
        return 'int-blog-v4';
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
        return esc_html__('Blog V4', 'xpress-core');
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
            'post_sec_h_option',
            [
                'label' => esc_html__('Post Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'post_order',
            [
                'label' => esc_html__('Post Order', 'xpress-core'),
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
                'label' => __('Posts Per Page', 'xpress-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'default' => 5,
            ]
        );
        $this->add_control(
            'post_categories',
            [
                'type' => Controls_Manager::SELECT2,
                'label' => esc_html__('Select Categories', 'xpress-core'),
                'options' => xpress_blog_category(),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'title_length',
            [
                'label' => __('Title Length', 'xpress-core'),
                'type' => Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 12,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'nav_button_option',
            [
                'label' => esc_html__('Nav & Button', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'show_nav',
            [
                'label' => esc_html__('Show Nav', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'button_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
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
            'btn_link',
            [
                'label' => esc_html__('Link', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'post_style',
            [
                'label' => esc_html__('Post Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-blog .xb-item--inner' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .xb-blog .xb-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'meta_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'meta-c',
            [
                'label' => esc_html__('Meta Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-blog .xb-item--meta li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'selector' => '{{WRAPPER}} .xb-blog .xb-item--meta li',
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
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-blog3 .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .xb-blog3 .xb-item--title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'nav_btn_style',
            [
                'label' => esc_html__('Nav & Button Style', 'xpress-core'),
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
                    '{{WRAPPER}} .thm-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .xb-blog__nav .nav-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .thm-btn, {{WRAPPER}} .xb-blog__nav .nav-item',
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
                    '{{WRAPPER}} .thm-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .thm-btn svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .xb-blog__nav .nav-item' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'b_bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .thm-btn' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-blog__nav .nav-item' => 'background-color: {{VALUE}}',
                ],
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
                    '{{WRAPPER}} .thm-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .thm-btn:hover svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .xb-blog__nav .nav-item:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hbg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .thm-btn:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-blog__nav .nav-item:hover' => 'background-color: {{VALUE}}',
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

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => !empty($settings['post_per_page']) ? $settings['post_per_page'] : 1,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'order' => $settings['post_order'],
        );
        if (!empty($settings['post_categories'])) {
            $args['category_name'] = implode(',', $settings['post_categories']);
        }

        $query = new \WP_Query($args);
        ?>

        <div class="xb-swiper-sliders">
            <div class="xb-carousel-inner">
                <div class="xb-testimonial-slider xb-swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $user = EVISA_DIR_URL . 'assets/img/user.svg';
                                $calendar = EVISA_DIR_URL . 'assets/img/calendar.svg';

                                ?>
                                <div class="swiper-slide xb-swiper-slide xb-blog xb-blog3">
                                    <div class="xb-item--inner">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="xb-item--img">
                                                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large'); ?></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="xb-item--holder">
                                            <ul class="xb-item--meta ul_li mb-20">
                                                <li><img src="<?php echo esc_url($user); ?>"
                                                         alt=""><?php _e("By"); ?> <?php the_author(); ?></li>
                                                <li><img src="<?php echo esc_url($calendar); ?>"
                                                         alt=""><?php echo get_the_date('j F Y'); ?>
                                                </li>
                                            </ul>
                                            <h2 class="xb-item--title border-effect"><a
                                                        href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], ''); ?></a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            wp_reset_query();
                        } ?>
                    </div>
                </div>
            </div>
            <div class="ul_li_center mt-40">
                <?php if ($settings['show_nav'] === 'yes'): ?>
                    <div class="xb-blog__nav ul_li_center mt-20">
                        <div class="nav-item tm-button-prev"><i class="far fa-long-arrow-left"></i></div>
                        <div class="nav-item tm-button-next"><i class="far fa-long-arrow-right"></i></div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['btn_label'])): ?>
                    <a class="thm-btn thm-btn--white thm-btn--trv mt-20"
                       href="<?php echo esc_url($settings['btn_link']['url']); ?>"><?php echo esc_html($settings['btn_label']); ?>
                        <span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16"
                                    fill="none">
                            <path d="M6.68164 13.28L11.5716 8.9333C12.1491 8.41997 12.1491 7.57997 11.5716 7.06664L6.68164 2.71997"
                                  stroke="#0F172A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                  stroke-linejoin="round"></path>
                          </svg></span></a>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Evisa_Blog_V4());