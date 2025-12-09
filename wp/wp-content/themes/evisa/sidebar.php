<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evisa
 */


if ( is_page() || is_singular( 'post' ) || evisa_custom_post_types() && get_post_meta( $post->ID, 'evisa_common_meta', true ) ) {
    $common_meta = get_post_meta( $post->ID, 'evisa_common_meta', true );
} else {
    $common_meta = array();
}

if ( is_array( $common_meta ) && array_key_exists( 'sidebar_meta', $common_meta ) && $common_meta['sidebar_meta'] != '0' ) {
    $selected_sidebar = $common_meta['sidebar_meta'];
} else if ( is_singular( 'post' ) ) {
    $selected_sidebar = evisa_option( 'single_post_default_sidebar', 'sidebar' );
} else if ( is_singular( 'page' ) ) {
    $selected_sidebar = evisa_option( 'page_default_sidebar', 'sidebar' );
}else {
    $selected_sidebar = 'sidebar';
}

?>

<aside class="sidebar-area">
    <?php
    if ( is_active_sidebar( $selected_sidebar ) ) {
        dynamic_sidebar( $selected_sidebar );
    }
    ?>
</aside>
