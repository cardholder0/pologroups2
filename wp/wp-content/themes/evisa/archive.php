<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evisa
 */

get_header();

$archive_layout = evisa_option('archive_layout', 'right-sidebar');
$archive_banner = evisa_option('archive_banner', true);
$banner_text_align = evisa_option('banner_default_text_align', 'start');
?>

    <?php if ($archive_banner == true) : ?>
        <div class="breadcrumb archive-banner pos-rel">
            <div class="container">
                <div class="col-lg-8">
                    <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                        <?php
                        the_archive_title('<h2 class="breadcrumb__title">', '</h2>');
                        ?>
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

    <div id="primary" class="content-area pt-120 pb-120 layout-<?php echo esc_attr($archive_layout); ?>">
        <div class="container">
            <?php
            if ($archive_layout == 'grid') {
                get_template_part('template-parts/post/post-grid');
            } else {
                get_template_part('template-parts/post/post-sidebar');
            }
            ?>
        </div>
    </div>

<?php
get_footer();
