<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evisa
 */
if (get_post_meta(get_the_ID(), 'evisa_common_meta', true)) {
    $footer_meta = get_post_meta(get_the_ID(), 'evisa_common_meta', true);
} else {
    $footer_meta = array();
}

if (array_key_exists('page_footer_disable', $footer_meta)) {
    $page_footer_disable = $footer_meta['page_footer_disable'];
} else {
    $page_footer_disable = false;
}

$page_footer_sticky_disable = isset($footer_meta['page_footer_sticky_disable']) ? $footer_meta['page_footer_sticky_disable'] : false;
$global_footer_sticky = evisa_option('footer_sticky');
$page_sticky_enabled = !$page_footer_sticky_disable && $global_footer_sticky;
?>
</div>
<footer class="xb-footer <?php if ($page_sticky_enabled) { ?>sticky<?php } ?>">
    <?php if ($page_footer_disable != true) {
        Evisa_Helper::evisa_footer_template();
    } ?>
</footer>

</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
