<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Team_V2 extends Widget_Base
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
        return 'int-team-v2';
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
        return esc_html__('Team V2', 'xpress-core');
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'name', [
                'label' => esc_html__('Name', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'desig', [
                'label' => esc_html__('Designation', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
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
        $repeater->add_control(
            'social_options',
            [
                'label' => esc_html__('Social Options', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'tw',
            [
                'label' => esc_html__('Twitter', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'ln',
            [
                'label' => esc_html__('Linkedin', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'fb',
            [
                'label' => esc_html__('Facebook', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'teams',
            [
                'label' => esc_html__('Add Team Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'team_style',
            [
                'label' => esc_html__('Team Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'name-c',
            [
                'label' => esc_html__('Name Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team .xb-item--name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .xb-team .xb-item--name',
            ]
        );
        $this->add_control(
            'desig_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'desig-c',
            [
                'label' => esc_html__('Designation Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team .xb-item--designation' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desig_typography',
                'selector' => '{{WRAPPER}} .xb-team .xb-item--designation',
            ]
        );
        $this->add_control(
            'social_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'social_color',
            [
                'label' => esc_html__('Social Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team .xb-item--social li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_hover_color',
            [
                'label' => esc_html__('Social Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team .xb-item--social li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_bg_color',
            [
                'label' => esc_html__('Social BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team .xb-item--social li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="row mt-none-30">
            <?php
            foreach ($settings['teams'] as $team):
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                    <div class="xb-team text-center">
                        <div class="xb-item--inner">
                            <?php if (!empty($team['image']['id'])): ?>
                                <div class="xb-item--img">
                                    <?php echo wp_get_attachment_image($team['image']['id'], 'large'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="xb-item--holder">
                                <?php if (!empty($team['name'])): ?>
                                    <h3 class="xb-item--name"><a
                                                href="<?php echo esc_url($team['link']['url']); ?>"><?php echo esc_html($team['name']); ?></a>
                                    </h3>
                                <?php endif; ?>
                                <?php if (!empty($team['desig'])): ?>
                                    <span class="xb-item--designation"><?php echo esc_html($team['desig']); ?></span>
                                <?php endif; ?>
                            </div>
                            <ul class="xb-item--social list-unstyled">
                                <?php if ($team['tw']['url']): ?>
                                    <li><a href="<?php echo esc_url($team['tw']['url']); ?>"><i
                                                    class="fab fa-twitter"></i></a></li>
                                <?php endif; ?>
                                <?php if ($team['ln']['url']): ?>
                                    <li><a href="<?php echo esc_url($team['ln']['url']); ?>"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                <?php endif; ?>
                                <?php if ($team['fb']['url']): ?>
                                    <li><a href="<?php echo esc_url($team['fb']['url']); ?>"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Evisa_Team_V2());