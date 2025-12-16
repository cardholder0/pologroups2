<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Blog extends Widget_Base
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
        return 'int-blog';
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
        return esc_html__('Blog', 'xpress-core');
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
            'image_option',
            [
                'label' => esc_html__('Image', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'bg_image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_option',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
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
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
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

                'devices' => ['desktop', 'tablet', 'mobile'],

                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

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
        $this->add_control(
            'excerpt_length',
            [
                'label' => __('Excerpt Length', 'xpress-core'),
                'type' => Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 20,
            ]
        );
        $this->add_control(
            'button_label', [
                'label' => esc_html__('Readmore Button', 'xpress-core'),
                'default' => esc_html__('Read the article', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Section Title Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
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
        $this->add_control(
            'title-h-c',
            [
                'label' => esc_html__('Title Highlight Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .title span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
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
        $this->add_control(
            'content_hr',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .sec-title p',
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
            'p_title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'p-title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-blog .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'p_title_typography',
                'selector' => '{{WRAPPER}} .xb-blog .xb-item--title',
            ]
        );
        $this->add_control(
            'readmore_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'p-readmore-c',
            [
                'label' => esc_html__('Readmore Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-blog .xb-item--link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'p_readmore_typography',
                'selector' => '{{WRAPPER}} .xb-blog .xb-item--link',
            ]
        );
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

        <section class="blog pb-130">
            <div class="container">
                <div class="blog-wrap">
                    <div class="sec-title mb-60 text-center">
                        <?php
                        if (!empty($settings['title'])): ?>
                            <h2 class="title wow skewIn"><?php echo wp_kses($settings['title'], true); ?></h2>
                        <?php endif;
                        if (!empty($settings['content'])): ?>
                            <p><?php echo wp_kses($settings['content'], true); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="row justify-content-md-center mt-none-30">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $user = EVISA_DIR_URL . 'assets/img/user.svg';
                                $calendar = EVISA_DIR_URL . 'assets/img/calendar.svg';
                                $right_arrow = EVISA_DIR_URL . 'assets/img/right_arrow.svg';

                                ?>
                                <div class="col-lg-4 col-md-6 mt-30">
                                    <div class="xb-blog">
                                        <div class="xb-item--inner">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="xb-item--img">
                                                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('evisa-medium'); ?></a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="xb-item--holder">
                                                <?php
                                                $categories = get_the_category();
                                                $cat_clr = get_term_meta($categories[0]->term_id, 'evisa_category_color', true);
                                                if (!empty($categories)) {
                                                    if (isset($cat_clr['cat-color'])) {
                                                        $bg = 'style ="background-color:' . $cat_clr['cat-color'] . '" ';
                                                    } else {
                                                        $bg = '';
                                                    }
                                                    echo '<span class="xb-item--category" ' . $bg . ' href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</span>';
                                                }
                                                ?>
                                                <ul class="xb-item--meta ul_li mb-20">
                                                    <li><img src="<?php echo esc_url($user); ?>" alt=""><?php _e("By"); ?> <?php the_author(); ?></li>
                                                    <li><img src="<?php echo esc_url($calendar); ?>" alt=""><?php echo get_the_date('j F Y'); ?>
                                                    </li>
                                                </ul>
                                                <h3 class="xb-item--title border-effect"><a
                                                            href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], ''); ?></a>
                                                </h3>
                                                <?php if (!empty($settings['button_label'])): ?>
                                                    <a class="xb-item--link"
                                                       href="<?php the_permalink(); ?>"><?php echo esc_html($settings['button_label']); ?><span><img src="<?php echo esc_url($right_arrow); ?>" alt=""></span></a>
                                                <?php endif; ?>
                                            </div>
                                            <a class="xb-overlay xb-overlay-link" href="<?php the_permalink(); ?>"></a>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            wp_reset_query();
                        } ?>
                    </div>
                    <div class="xb-blog-bg" <?php if (!empty($settings['bg_image']['url'])): ?>
                         style="background-image: url('<?php echo esc_url($settings['bg_image']['url']); ?>') <?php endif; ?>"></div>
                </div>
            </div>
        </section>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Evisa_Blog());