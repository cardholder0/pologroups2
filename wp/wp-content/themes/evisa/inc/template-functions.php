<?php
/**
 * @package evisa
 */

if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Shim for sites older than 5.2.
     *
     * @link https://core.trac.wordpress.org/ticket/12563
     */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
endif;

/**
 * Adds custom classes to the array of body classes.
 */
function evisa_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    //Check Elementor Page Builder Used or not
    $elementor_used = get_post_meta(get_the_ID(), '_elementor_edit_mode', true);

    if(is_archive() || is_search()){
        $classes[]        = !!$elementor_used ? 'page-builder-not-used' : 'page-builder-not-used';
    }else{
        $classes[]        = !!$elementor_used ? 'page-builder-used' : 'page-builder-not-used';
    }

    return $classes;
}
add_filter( 'body_class', 'evisa_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function evisa_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'evisa_pingback_header' );


/**
 * Words limit
 */
function evisa_words_limit($text, $limit) {
    $words = explode(' ', $text, ($limit + 1));

    if (count($words) > $limit) {
        array_pop($words);
    }

    return implode(' ', $words);
}


/**
 * Get excluded sidebar list
 */
if( ! function_exists( 'evisa_sidebars' ) ) {
    function evisa_sidebars() {
        $default = esc_html__('Default', 'evisa');
        $options = array($default);
        // set ids of the registered sidebars for exclude
        $exclude = array( 'footer-widget' );

        global $wp_registered_sidebars;

        if( ! empty( $wp_registered_sidebars ) ) {
            foreach( $wp_registered_sidebars as $sidebar ) {
                if( ! in_array( $sidebar['id'], $exclude ) ) {
                    $options[$sidebar['id']] = $sidebar['name'];
                }
            }
        }

        return $options;
    }
}


/**
 * Iframe embed
 */

function evisa_iframe_embed( $tags, $context ) {
    if ( 'post' === $context ) {
        $tags['iframe'] = array(
            'src'             => true,
            'height'          => true,
            'width'           => true,
            'frameborder'     => true,
            'allowfullscreen' => true,
        );
    }
    return $tags;
}
add_filter( 'wp_kses_allowed_html', 'evisa_iframe_embed', 10, 2 );



/**
 * Check if a post is a custom post type.
 *
 * @param mixed $post Post object or ID
 *
 * @return boolean
 */
function evisa_custom_post_types( $post = null ) {
    $custom_post_list = get_post_types( array( '_builtin' => false ) );

    // there are no custom post types
    if ( empty ( $custom_post_list ) ) {
        return false;
    }

    $custom_types     = array_keys( $custom_post_list );
    $current_post_type = get_post_type( $post );

    // could not detect current type
    if ( ! $current_post_type ) {
        return false;
    }

    return in_array( $current_post_type, $custom_types );
}


/**
 * Add span tag in archive list count number
 */
function evisa_add_span_archive_count($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="post-count-number">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

add_filter('get_archives_link', 'evisa_add_span_archive_count');


/**
 * Add span tag in category list count number
 */

function evisa_add_span_category_count($links) {
    $links = str_replace('</a> (', '</a> <span class="post-count-number">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

add_filter('wp_list_categories', 'evisa_add_span_category_count');

/**
 * Preloader
 *
 * @return  [type]  [return description]
 */
function evisa_preloader(){
    $preloader_enable = evisa_option('preloader_enable', true);
    if($preloader_enable == true):
        ?>
        <div id="xb-loadding">
            <div class="loader">
                <div class="plane">
                    <img class="plane-img" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/plane.gif'); ?>" alt="">
                </div>
                <div class="earth-wrapper">
                    <div class="earth"></div>
                </div>
            </div>
        </div>
    <?php
    endif;
}
/**
 * Scroll Up
 *
 * @return  [type]  [return description]
 */
function evisa_scroll_up_btn(){
    $scroll_up_btn = evisa_option('scroll_up_btn', true);
    if($scroll_up_btn == true):
        ?>
        <div class="xb-backtotop">
            <a href="#" class="scroll">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>
    <?php
    endif;
}

/**
 * Image id from url
 */
if ( ! function_exists( 'evisa_image_id_by_url' ) ) {
    function evisa_image_id_by_url($image_url) {
        global $wpdb;
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));
        return $attachment[0];
    }
}

/**
 * Prints HTML with meta information for the current post-date/time.
 */
if ( ! function_exists( 'evisa_posted_on' ) ) :

    function evisa_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x( ' %s', 'post date', 'evisa' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on"><i class="far fa-clock"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

    }
endif;


/**
 * Prints HTML with meta information for the current author.
 */
if ( ! function_exists( 'evisa_posted_by' ) ) :

    function evisa_posted_by() {
        $byline = sprintf(
        /* translators: %s: post author. */
            esc_html_x( ' %s', 'post author', 'evisa' ),
            '<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
        );

        echo '<span class="byline"><i class="far fa-user"></i> ' . $byline . '</span>'; // WPCS: XSS OK.

    }
endif;

/**
 * Prints HTML with meta information for the tags.
 */
if ( ! function_exists( 'evisa_post_tags' ) ) :

    function evisa_post_tags() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x('', 'list item separator', 'evisa'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links"><span class="tag-title">' .esc_html__('Tags:','evisa').'</span>' .esc_html__(' %1$s', 'evisa') . '</span>', $tags_list); // WPCS: XSS OK.


            }

        }
    }
endif;

/**
 * Prints HTML with meta information for the categories.
 */

if ( ! function_exists( 'evisa_theme_post_categories' ) ) :

    function evisa_theme_post_categories() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {

            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'evisa'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links"><i class="far fa-folder"></i>' . esc_html__('%1$s', 'evisa') . '</span>', $categories_list); // WPCS: XSS OK.
            }

        }
    }
endif;

/**
 * Prints post's first category
 */

if ( ! function_exists( 'evisa_post_first_category' ) ) :

    function evisa_post_first_category(){

        $post_category_list = get_the_terms(get_the_ID(), 'category');

        $post_first_category = $post_category_list[0];
        if ( ! empty( $post_first_category->slug )) {
            echo '<span class="cat-links"><i class="far fa-folder"></i><a href="'.get_term_link( $post_first_category->slug, 'category' ).'">' . $post_first_category->name . '</a></span>';
        }

    }
endif;

/**
 * Prints HTML with meta information for the comments.
 */
if ( ! function_exists( 'evisa_comment_count' ) ) :

    function evisa_comment_count() {
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && get_comments_number() != 0) {
            echo '<span class="comments-link"><i class="far fa-comments"></i>';
            comments_popup_link('', ''.esc_html__('1', 'evisa').' <span class="comment-count-text">'.esc_html__('Comment', 'evisa').'</span>', '% <span class="comment-count-text">'.esc_html__('Comments', 'evisa').'</span>');
            echo '</span>';
        }
    }
endif;


/**
 * Site Logo
 */
function evisa_default_logo(){
    $site_logo_img = evisa_option('header_default_logo');
    ?>
    <?php
    if(has_custom_logo()){
        the_custom_logo();
    }else{
        if(!empty($site_logo_img['url'])){ ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url($site_logo_img['url']); ?>" alt="<?php echo esc_attr( get_post_meta( $site_logo_img['id'], '_wp_attachment_image_alt', true )); ?>">
            </a>

            <?php

        }else{ ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

            <?php

        }
    }
    ?>
<?php }


function evisa_main_menu(){
    wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'menu_id'        =>'main-nav',
        'link_before' => '<span>','link_after'=>'</span>',
        'container'=>false,
        'fallback_cb'    => 'Evisa_Bootstrap_Navwalker::fallback',
    ));
}

function evisa_mobiel_menu(){
    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_id'        =>'xb-menu-primary',
        'menu_class'     =>'xb-menu-primary clearfix',
        'link_before' => '<span>','link_after'=>'</span>',
        'container'=>false,
        'fallback_cb'    => 'Evisa_Bootstrap_Navwalker::fallback',
    ]);

}

/**
 * Mobile Search
 *
 * @return  [type]  [return description]
 */
function evisa_moble_search(){
    ?>
    <div class="xb-header-mobile-search xb-hide-xl">
        <form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="search-field" type="text" name="s" placeholder="<?php esc_attr_e( 'Search Keywords', 'evisa' );?>" value="<?php the_search_query();?>">
            <button class="search-submit" type="submit"><i class="far fa-search"></i></button>
        </form>
    </div>
    <?php
}


/**
 * Offcanvash Menu
 *
 * @return  [type]  [return description]
 */
function evisa_offcanvasmenu(){
    ?>
    <div class="xb-header-wrap">
        <div class="xb-header-menu">
            <div class="xb-header-menu-scroll">
                <div class="xb-menu-close xb-hide-xl xb-close"></div>
                <div class="xb-logo-mobile xb-hide-xl">
                    <?php evisa_default_logo(); ?>
                </div>
                <nav class="xb-header-nav">
                    <?php
                    evisa_moble_search();
                    evisa_mobiel_menu();
                    ?>
                </nav>
            </div>
        </div>
        <div class="xb-header-menu-backdrop"></div>
    </div>
    <?php
}
/**
 * Header Search
 *
 * @return  [type]  [return description]
 */
function evisa_heder_search(){ ?>
    <div class="xb-search-close xb-close"></div>
    <div class="header-search-container">
        <form role="search" class="search-form" action="<?php echo esc_url(home_url( '/' ));?>">
            <input type="search"  class="search-field" placeholder="<?php esc_attr_e( 'Search Keywords', 'evisa' );?>" value="<?php echo get_search_query();?>" name="s">
            <button class="search-submit" type="submit"><i class="far fa-search"></i></button>
        </form>
    </div>
    <?php
}