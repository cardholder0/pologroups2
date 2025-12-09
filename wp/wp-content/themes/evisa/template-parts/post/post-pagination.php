<div class="row post-pagination text-center">
	<div class="col-lg-12">
		<?php
		the_posts_pagination(array(
			'next_text' => '<i class="far fa-angle-double-right"></i>',
			'prev_text' => '<i class="far fa-angle-double-left"></i>',
			'screen_reader_text' => ' ',
			'type'                => 'list'
		));
		?>
	</div>
</div>