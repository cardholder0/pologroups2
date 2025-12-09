<?php

//Register widget area
function evisa_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'evisa'),
		'id'            => 'sidebar',
		'description'   => esc_html__('Add widgets here.', 'evisa'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

}

add_action('widgets_init', 'evisa_widgets_init');