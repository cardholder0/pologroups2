<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Header_Two extends Widget_Base
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
        return 'evisa-header-2';
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
        return esc_html__('Header Two', 'xpress-core');
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
        return ['evisa_hf_widgets'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'container_otpion',
            [
                'label' => esc_html__('Container', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'container_width',
            [
                'label' => esc_html__('Container Width', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .container' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'topbar_option',
            [
                'label' => esc_html__('Top Bar Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'topbar_enable',
            [
                'label' => esc_html__('Enable or Disable Top Bar', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'logoop',
            [
                'label' => esc_html__('Logo Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo', [
                'label' => esc_html__('Logo', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo_sticky', [
                'label' => esc_html__('Logo Sticky', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo_mobile', [
                'label' => esc_html__('Logo Mobile', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
            'logo_max_width',
            [
                'label' => esc_html__('Max Width', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5000,
                    ]
                ],

                'selectors' => [
                    '{{WRAPPER}} .xb-header__logo img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'info_op',
            [
                'label' => esc_html__('Info Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'info_text', [
                'label' => esc_html__('Info Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'hinfos',
            [
                'label' => esc_html__('Add Info Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'social_op',
            [
                'label' => esc_html__('Social Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'link',
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
        $this->add_control(
            'socials',
            [
                'label' => esc_html__('Add Social Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'menu_select',
            [
                'label' => esc_html__('Menu Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'choose-menu',
            [
                'label' => esc_html__('Choose menu', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => evisa_menu_selector(),
                'multiple' => false
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'search_option',
            [
                'label' => esc_html__('Search Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_search',
            [
                'label' => esc_html__('Enable or Disable Search', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'info_style',
            [
                'label' => esc_html__('Info Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'h_bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-style-two' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h_border_color',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-header-top' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .header-style-two .main-menu > ul > li:first-child > a' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .header-style-two .main-menu > ul > li > a' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'info_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-header-top .xb-item--info li span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_bg_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .xb-header-top .xb-item--info li span',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Icon BG Color', 'xpress-core'),
                    ]
                ]
            ]
        );
        $this->add_control(
            'info_text_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'info_text_color',
            [
                'label' => esc_html__('Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-header-top .xb-item--info li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_text_typography',
                'selector' => '{{WRAPPER}} .xb-header-top .xb-item--info li',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'social_style',
            [
                'label' => esc_html__('Social Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            's_icon_color',
            [
                'label' => esc_html__('Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-header-top .xb-item--social li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-header-top .xb-item--social li a svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            's_icon_bg_color',
            [
                'label' => esc_html__('Icon BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-header-top .xb-item--social li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_bg_hover_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .xb-header-top .xb-item--social li a::before',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Icon BG Hover Color', 'xpress-core'),
                    ]
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'menu_style',
            [
                'label' => esc_html__('Menu Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'menu-c',
            [
                'label' => esc_html__('Menu Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'menu-hover-c',
            [
                'label' => esc_html__('Menu Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li.active > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'menu_border_gd_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .header-style-two .main-menu > ul > li > a::before',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Menu Border Gradient Color', 'xpress-core'),
                    ]
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'selector' => '{{WRAPPER}} .main-menu ul li a',
            ]
        );
        $this->add_control(
            'dropdown_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'submenu-bg-c',
            [
                'label' => esc_html__('Submenu BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li .sub-menu' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li .sub-menu::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'submenu-c',
            [
                'label' => esc_html__('Submenu Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li .sub-menu li > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li .main-menu ul li .sub-menu li.active > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'submenu-hover-active-c',
            [
                'label' => esc_html__('Submenu Hover & Active Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li .sub-menu li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li .main-menu ul li .sub-menu li.active > a' => 'color: {{VALUE}}',
                ],
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
            'btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_hover_color',
            [
                'label' => esc_html__('Button Hover BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Button Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'color: {{VALUE}}',
                ],
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
        $this->end_controls_section();

        $this->start_controls_section(
            'search_style',
            [
                'label' => esc_html__('Search Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'search_border_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .header-style-two .header-search::before',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Search Border Color', 'xpress-core'),
                    ]
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'search_typography',
                'selector' => '{{WRAPPER}} .header-style-two .header-search input',
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $sticky_header_enable = evisa_option('sticky_header_enable');
        ?>

        <header class="site-header header-style-two">
            <?php if ($settings['topbar_enable'] == 'yes'): ?>
                <div class="xb-header-top">
                    <div class="container">
                        <div class="xb-item--inner ul_li_between">
                            <div class="header__logo">
                                <a href="<?php if (!empty($settings['logolink']['url'])) {
                                    echo esc_url($settings['logolink']['url']);
                                } else {
                                    echo esc_url(home_url('/'));
                                } ?>"><img src="<?php echo esc_url($settings['logo']['url']); ?>"
                                           alt=""></a>
                            </div>
                            <ul class="xb-item--info ul_li">
                                <?php
                                foreach ($settings['hinfos'] as $info):
                                    ?>
                                    <li>
                                        <span class="gradient-bg"><?php \Elementor\Icons_Manager::render_icon($info['icon'], ['aria-hidden' => 'true']); ?></span><?php echo esc_html($info['info_text']); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="xb-item--social ul_li">
                                <?php
                                foreach ($settings['socials'] as $social):
                                    $target = $social['link']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow = $social['link']['nofollow'] ? ' rel="nofollow"' : '';
                                    ?>
                                    <li>
                                        <a href="<?php echo esc_url($social['link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php \Elementor\Icons_Manager::render_icon($social['icon'], ['aria-hidden' => 'true']); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="header__wrap <?php if ($sticky_header_enable == true): ?> stricky <?php endif; ?>">
                <div class="container">
                    <div class="header__inner ul_li_between">
                        <div class="header__logo">
                            <a href="<?php if (!empty($settings['logolink']['url'])) {
                                echo esc_url($settings['logolink']['url']);
                            } else {
                                echo esc_url(home_url('/'));
                            } ?>"><img src="<?php echo esc_url($settings['logo_sticky']['url']); ?>"
                                       alt=""></a>
                        </div>
                        <div class="main-menu__wrap ul_li navbar navbar-expand-lg">
                            <nav class="main-menu collapse navbar-collapse">
                                <?php
                                wp_nav_menu(array(
                                    'menu' => $settings['choose-menu'],
                                    'menu_id' => 'main-nav',
                                    'link_before' => '<span>', 'link_after' => '</span>',
                                    'container' => false,
                                    'fallback_cb' => 'Evisa_Bootstrap_Navwalker::fallback',
                                ));
                                ?>
                            </nav>
                        </div>
                        <div class="xb-hamburger-menu">
                            <div class="xb-nav-mobile">
                                <div class="xb-nav-mobile-button"><i class="fal fa-bars"></i></div>
                            </div>
                        </div>
                        <?php
                        if ($settings['enable_search'] == 'yes') {
                            evisa_heder_search2();
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="xb-header-wrap">
                <div class="xb-header-menu">
                    <div class="xb-header-menu-scroll">
                        <div class="xb-menu-close xb-hide-xl xb-close"></div>
                        <div class="xb-logo-mobile xb-hide-xl">
                            <a href="<?php if (!empty($settings['logolink']['url'])) {
                                echo esc_url($settings['logolink']['url']);
                            } else {
                                echo esc_url(home_url('/'));
                            } ?>"><img src="<?php echo esc_url($settings['logo_mobile']['url']); ?>"
                                       alt=""></a>
                        </div>
                        <?php
                        evisa_moble_search();
                        ?>
                        <nav class="xb-header-nav">
                            <?php
                            wp_nav_menu(array(
                                'menu' => $settings['choose-menu'],
                                'menu_id' => 'mobile-main-nav',
                                'menu_class' => 'xb-menu-primary clearfix',
                                'link_before' => '<span>', 'link_after' => '</span>',
                                'container' => false,
                                'fallback_cb' => 'Evisa_Bootstrap_Navwalker::fallback',
                            ));
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="xb-header-menu-backdrop"></div>
            </div>
        </header>

        <?php
    }
}


Plugin::instance()->widgets_manager->register(new Evisa_Header_Two());