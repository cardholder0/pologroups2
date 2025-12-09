<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Evisa
 */

get_header();

$error_banner      = evisa_option('error_banner', true);
$error_banner_title = evisa_option('error_page_title');
$banner_text_align = evisa_option('banner_default_text_align', 'start');
$error_img = evisa_option('error_img');
$not_found_text     = evisa_option('not_found_text');
$go_back_home       = evisa_option('go_back_home', true);

?>

<?php if($error_banner == true) : ?>
    <div class="breadcrumb error-page-banner pos-rel">
        <div class="container">
            <div class="col-lg-8">
                <div class="breadcrumb__content text-<?php echo esc_attr( $banner_text_align ); ?>">
                    <h2 class="breadcrumb__title">
                        <?php echo esc_html($error_banner_title); ?>
                    </h2>

                    <?php if ( function_exists( 'bcn_display' ) ) :?>
                        <div class="breadcrumb-container">
                            <?php bcn_display();?>
                        </div>
                    <?php endif;?>
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

    <div id="primary" class="content-area pt-120 pb-120">
        <div class="container not-found-content">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="contant-wrapper text-center">
                        <div class="error-page__img mb-60">
                            <img src="<?php if(!empty($error_img['url'])){ echo esc_url($error_img['url']);}else{echo esc_url(get_template_directory_uri() . '/assets/img/img_404.png');}?>" alt="<?php esc_attr_e( '404', 'evisa' );?>" />
                        </div>
                        <div class="error-page__content mb-50">
                            <?php
                            if (!empty($not_found_text)) {
                                echo wp_kses( $not_found_text, array(
                                    'a'      => array(
                                        'href'   => array(),
                                        'target' => array()
                                    ),
                                    'strong' => array(),
                                    'small'  => array(),
                                    'span'   => array(),
                                    'p'   => array(),
                                    'h1'   => array(),
                                    'h2'   => array(),
                                    'h3'   => array(),
                                    'h4'   => array(),
                                    'h5'   => array(),
                                    'h6'   => array(),
                                ) );
                            }else {
                                ?>
                                <h2><?php esc_html_e( 'Hi 👋 Sorry We Can’t Find That Page!', 'evisa') ?></h2>
                                <p><?php esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'evisa') ?></p>
                                <?php
                            }
                            ?>

                            <?php if ($go_back_home == true) : ?>
                                <div class="error-page-button">
                                    <a class="thm-btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Go Back Home', 'evisa') ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #primary -->

<?php
get_footer();