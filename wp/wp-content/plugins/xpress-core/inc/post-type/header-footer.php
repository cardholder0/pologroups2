<?php
if(!function_exists('evisa_page_template_type')  ){
    function evisa_page_template_type(){
        register_post_type( 'evisa_template',
            array(
                'labels' => array(
                    'name' => __( 'Header & Footer','xpress-core' ),
                    'singular_name' => __( 'Template','xpress-core' ),
                ),
                'public' => true,
                'rewrite' => array('slug' => 'header-footer'),
                'publicly_queryable' => true,
                'show_in_menu'      => true,
                'menu_icon' => 'dashicons-align-wide',
                'supports' => ['title', 'elementor']
            )
        );
    }
    add_action( 'init','evisa_page_template_type',2 );
}
