<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Evisa_Footer_Links extends Widget_Base
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
        return 'int-footer-links';
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
        return esc_html__('Footer Links', 'xpress-core');
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
            'hero_content_option',
            [
                'label' => esc_html__('Content', 'xpress-core'),
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
                ],
                'default' => 'style_1',
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
            'label', [
                'label' => esc_html__('Label', 'xpress-core'),
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
        $this->add_control(
            'lists',
            [
                'label' => esc_html__('Add List Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
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
            'label-c',
            [
                'label' => esc_html__('Label Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__links li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'label-c-hover',
            [
                'label' => esc_html__('Label Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__links li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'label_typography',
                'selector' => '{{WRAPPER}} .footer__links li a',
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): ?>
        <ul class="footer__links">
            <?php
            foreach ($settings['lists'] as $list):
                $target = $list['link']['is_external'] ? ' target="_blank"' : '';
                $nofollow = $list['link']['nofollow'] ? ' rel="nofollow"' : '';
                ?>
                <li>
                    <a href="<?php echo esc_url($list['link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php echo esc_html($list['label']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <ul class="footer__links list-unstyled">
            <?php
            foreach ($settings['lists'] as $list):
                $target = $list['link']['is_external'] ? ' target="_blank"' : '';
                $nofollow = $list['link']['nofollow'] ? ' rel="nofollow"' : '';
                ?>
                <li>
                    <a href="<?php echo esc_url($list['link']['url']); ?>" <?php echo $target . $nofollow; ?>><span><?php \Elementor\Icons_Manager::render_icon($list['icon'], ['aria-hidden' => 'true']); ?></span><?php echo esc_html($list['label']); ?>
                    </a></li>
            <?php endforeach; ?>
        </ul>
    <?php
    endif;
    }


}


Plugin::instance()->widgets_manager->register(new Evisa_Footer_Links());