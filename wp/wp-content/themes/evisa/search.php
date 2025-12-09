<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Evisa
 */

get_header();

$search_banner = evisa_option('search_banner', true);
$search_layout = evisa_option('search_layout', 'right-sidebar');
$banner_text_align = evisa_option('banner_default_text_align', 'start');
?>

    <?php if ($search_banner == true) : ?>
        <div class="breadcrumb search-banner pos-rel">
            <div class="container">
                <div class="col-lg-8">
                    <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                        <h2 class="breadcrumb__title"><?php
                            /* translators: %s: search query. */
                            printf(esc_html__('Search Results for: %s', 'evisa'), '<span>' . get_search_query() . '</span>');
                            ?>
                        </h2>
                        <?php if (function_exists('bcn_display')) : ?>
                            <div class="breadcrumb-container">
                                <?php bcn_display(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__circle">
                <span class="big" data-parallax='{"y" : 100, "scale" : 0.1}'></span>
                <span class="small" data-parallax='{"y" : 100, "scale" : 0.1}'></span>
            </div>
            <?php
            $shape = evisa_option('shape_image', '');
            if (!empty($shape['shape1']['id']) || !empty($icon['shape2']['id'])): ?>
                <div class="breadcrumb__shape">
                    <div class="shape shape--1">
                        <div class="shape-inner" data-parallax='{"x":-50,"y":80}'>
                            <?php echo wp_get_attachment_image($shape['shape1']['id'], 'medium'); ?>
                        </div>
                    </div>
                    <div class="shape shape--2">
                        <div class="shape-inner" data-parallax='{"x":50,"y":-90}'>
                            <?php echo wp_get_attachment_image($shape['shape2']['id'], 'medium'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div id="primary" class="content-area pt-120 pb-120 layout-<?php echo esc_attr($search_layout); ?>">
        <div class="container">
            <?php
            if ($search_layout == 'grid') {
                get_template_part('template-parts/post/post-grid');
            } else {
                get_template_part('template-parts/post/post-sidebar');
            }
            ?>
        </div>
    </div><!-- #primary -->

<?php
get_footer();
