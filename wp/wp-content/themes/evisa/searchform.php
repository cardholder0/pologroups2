
<?php $unique_id = uniqid( 'evisa-search-form-' ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr($unique_id); ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'evisa' ); ?></span>
		<input type="search" id="<?php echo esc_attr($unique_id); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'evisa' ); ?>" value="<?php echo get_search_query(); ?>" required name="s" />
	</label>
	<button type="submit" class="search-submit"><i class="far fa-search"></i></button>

</form>