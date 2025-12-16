<?php
/**
 * All Elementor widget init
 * @package evisa
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if ( !class_exists('Evisa_Elementor_Widget_Init') ){

	class Evisa_Elementor_Widget_Init{
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/register',array($this,'_widget_registered'));
			add_action('elementor/editor/after_enqueue_styles',array($this,'editor_style'));
			add_action('elementor/documents/register_controls',array($this,'register_document_controls'));
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){
			$elements_manager->add_category(
				'evisa_widgets',
				[
					'title' => __( 'Evisa Addons', 'xpress-core' ),
					'icon' => 'fa fa-plug'
				]
			);
			$elements_manager->add_category(
				'evisa_hf_widgets',
				[
					'title' => __( 'Evisa Header & Footer', 'xpress-core' ),
					'icon' => 'fa fa-plug'
				]
			);
		}
		

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(	
				
				// evisa Theme Widgets
				'hero-one',
				'footer-links',
				'footer-cta',
				'newsletter',
				'contact',
				'brand',
				'sec-title',
				'visa',
				'visa-title',
				'about-content',
				'funfact',
				'team',
				'testimonial',
				'faq',
				'blog',
				'country',
				'country-tab',
				'feature-list',
				'widget-download',
				'widget-banner',
				'widget-country',
				'hero-two',
				'feature',
				'xb-button',
				'about-link',
				'parallax-image',
				'feature-v2',
				'service',
				'cta',
				'funfact-v2',
				'country-v2',
				'faq-v2',
				'testimonial-v2',
				'testimonial-rating',
				'blog-v2',
				'blog-v3',
				'brand-v2',
				'contact-v2',
				'hero-three',
				'book-form',
				'about-image',
				'xb-video',
				'strock-text',
				'package',
				'country-v3',
				'destination',
				'categories',
				'testimonial-v3',
				'funfact-v3',
				'blog-v4',
				'brand-v3',
				'cta-v2',
				'service-v2',
				'widget-category',
				'coaching',
				'team-v2',
				'team-info',
				'skills',
				'contact-me',
				'testimonial-v4',
				'contact-info',

				// header
				'01-header',
				'02-header',
				'03-header',

			);

			$elementor_widgets = apply_filters('evisa_elementor_widget',$elementor_widgets);

			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					$widget_file = 'plugins/elementor/widget/'.$widget.'.php';
					$template_file = locate_template($widget_file);
					if ( !$template_file || !is_readable( $template_file ) ) {
						$template_file = EVISA_DIR_PATH.'/elementor/widgets/'.$widget.'.php';
					}
					if ( $template_file && is_readable( $template_file ) ) {
						include_once $template_file;
					}
				}
			}
		}

		public function editor_style(){
			$cs_icon = plugins_url( 'icons.png', __FILE__ );
			wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .xpress-custom-icon{content: url( '.$cs_icon.');width: 28px;}' );
		}

		/**
		 * Register additional document controls.
		 *
		 * @param \Elementor\Core\DocumentTypes\PageBase $document The PageBase document instance.
		 */
		public function register_document_controls( $document ) {

			if ( ! $document instanceof \Elementor\Core\DocumentTypes\PageBase || ! $document::get_property( 'has_elements' ) ) {
				return;
			}

			$document->start_controls_section(
				'body_typography',
				[
					'label' => esc_html__( 'Body Typography', 'xpress-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$document->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'page_body_font',
					'selector' => '{{WRAPPER}}',
				]
			);
			$document->add_control(
				'body_color',
				[
					'label' => esc_html__( 'Body Color', 'xpress-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}' => 'color: {{VALUE}}',
					],
				]
			);
			$document->add_control(
				'heading_color',
				[
					'label' => esc_html__( 'Heading Color', 'xpress-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} h1, h2, h3, h4, h5, h6' => 'color: {{VALUE}}',
					],
				]
			);
			$document->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'page_heading_font',
					'selector' => '{{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6',
				]
			);

			$document->end_controls_section();
		}
	}

	if ( class_exists('Evisa_Elementor_Widget_Init') ){
		Evisa_Elementor_Widget_Init::getInstance();
	}

}//end if