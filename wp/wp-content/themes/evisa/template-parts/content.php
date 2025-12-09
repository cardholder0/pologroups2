<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evisa
 */


$post_author = evisa_option('single_post_author', true);
$post_date = evisa_option('single_post_date', true);
$post_comment_number = evisa_option('single_post_cmnt', true);
$post_cat_name = evisa_option('single_post_catd', false);
$post_tag = evisa_option('single_post_tag', true);
$author_details = evisa_option('author_details', false);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    if ( get_post_format() === 'gallery' ) {
        get_template_part( 'template-parts/post/post-format-gallery' );
    } else if ( get_post_format() === 'video' ) {
        get_template_part( 'template-parts/post/post-format-video' );
    } else if ( get_post_format() === 'audio' ) {
        get_template_part( 'template-parts/post/post-format-audio' );
    } else {
        get_template_part( 'template-parts/post/post-format-others' );
    }
    ?>

    <?php if ( 'post' === get_post_type() ) : ?>
        <div class="post-meta post-details-meta">
            <ul class="ul_li">
                <?php if ($post_author == true) :?>
                    <li><?php evisa_posted_by(); ?></li>
                <?php endif; ?>

                <?php if ( $post_comment_number == true) : ?>
                    <li><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php print esc_html__('Comments', 'evisa'); ?> (<?php print get_comments_number();?>)</a></li>
                <?php endif; ?>

                <?php if ($post_date == true) :?>
                    <li><?php evisa_posted_on(); ?></li>
                <?php endif; ?>

                <?php if ($post_cat_name == true) :?>
                    <li><?php evisa_theme_post_categories(); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php

        the_content( sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'evisa' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'evisa' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

    <?php if (has_tag() && $post_tag == true) :?>
        <div class="post-footer">

            <div class="post-tags-share ul_li_between">
                <?php if(function_exists('evisa_post_tags')){?>
                <div class="post-tags mt-20">
                    <?php evisa_post_tags(); ?>
                </div>
                <?php }?>

                <?php if(function_exists('evisa_post_share')){?>
                    <div class="social-share ul_li mt-20">
                        <?php evisa_post_share();?>
                    </div>
                <?php }?>
            </div>

        </div><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
