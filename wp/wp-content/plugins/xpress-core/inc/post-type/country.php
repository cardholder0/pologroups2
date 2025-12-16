<?php
if ( !function_exists( 'evisa_country' ) ) {

// Register Countries
    function evisa_country() {

        $labels = array(
            'name'                  => esc_html_x( 'Countries', 'Post Type General Name', 'xpress-core' ),
            'singular_name'         => esc_html_x( 'country', 'Post Type Singular Name', 'xpress-core' ),
            'menu_name'             => esc_html__( 'Countries', 'xpress-core' ),
            'name_admin_bar'        => esc_html__( 'Countries', 'xpress-core' ),
            'archives'              => esc_html__( 'Item Archives', 'xpress-core' ),
            'attributes'            => esc_html__( 'Item Attributes', 'xpress-core' ),
            'parent_item_colon'     => esc_html__( 'Parent Item:', 'xpress-core' ),
            'all_items'             => esc_html__( 'All Countries', 'xpress-core' ),
            'add_new_item'          => esc_html__( 'Add New country', 'xpress-core' ),
            'add_new'               => esc_html__( 'Add New country', 'xpress-core' ),
            'new_item'              => esc_html__( 'New country', 'xpress-core' ),
            'edit_item'             => esc_html__( 'Edit country', 'xpress-core' ),
            'update_item'           => esc_html__( 'Update country', 'xpress-core' ),
            'view_item'             => esc_html__( 'View country', 'xpress-core' ),
            'view_items'            => esc_html__( 'View Countries', 'xpress-core' ),
            'search_items'          => esc_html__( 'Search Countries', 'xpress-core' ),
            'not_found'             => esc_html__( 'Not found', 'xpress-core' ),
            'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'xpress-core' ),
            'featured_image'        => esc_html__( 'Featured Image', 'xpress-core' ),
            'set_featured_image'    => esc_html__( 'Set featured image', 'xpress-core' ),
            'remove_featured_image' => esc_html__( 'Remove featured image', 'xpress-core' ),
            'use_featured_image'    => esc_html__( 'Use as featured image', 'xpress-core' ),
            'insert_into_item'      => esc_html__( 'Insert into item', 'xpress-core' ),
            'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'xpress-core' ),
            'items_list'            => esc_html__( 'Items list', 'xpress-core' ),
            'items_list_navigation' => esc_html__( 'Items list navigation', 'xpress-core' ),
            'filter_items_list'     => esc_html__( 'Filter items list', 'xpress-core' ),
        );
        $args = array(
            'label'               => esc_html__( 'Countries', 'xpress-core' ),
            'description'         => esc_html__( 'Add Countries Here', 'xpress-core' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'elementor' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 20,
            'menu_icon'           => 'dashicons-admin-site-alt3',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'rewrite'               => array( 'slug' => 'country' ),
        );
        register_post_type( 'evisa_country', $args );

    }
    add_action( 'init', 'evisa_country', 0 );

}

/**
 * Project Custom Taxonomy
 */

if ( !function_exists( 'evisa_country_tax' ) ) {
    function evisa_country_tax() {
        $labels = [
            'name'          => esc_html__( 'Categories', 'xpress-core' ),
            'menu_name'     => esc_html__( 'Categories', 'xpress-core' ),
            'singular_name' => esc_html__( 'Category', 'xpress-core' ),
            'search_items'  => esc_html__( 'Search Category', 'xpress-core' ),
            'all_items'     => esc_html__( 'All Category', 'xpress-core' ),
            'new_item_name' => esc_html__( 'New Category', 'xpress-core' ),
            'add_new_item'  => esc_html__( 'Add New Category', 'xpress-core' ),
            'edit_item'     => esc_html__( 'Edit New Category', 'xpress-core' ),
            'update_item'   => esc_html__( 'Update New Category', 'xpress-core' ),
        ];
        $args = array(
            'labels'                => $labels,
            'hierarchical'          => true,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'query_var'             => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite'               => array( 'slug' => 'country-category' ),
        );
        register_taxonomy( 'country_cat', 'evisa_country', $args );
    }
    add_action( 'init', 'evisa_country_tax' );
}