<?php get_header(); ?>



<div class="container-fluid">
	<div class="row">

	<?php
		if (have_posts()): the_post();
			the_content();
		endif;

		
		if(comments_open()){
			comments_template();
		}

		echo paragon_post_navigation('<div class="vl-pagination-buttons clearfix vl-no-select">', '</div>');


	?>
	</div>

</div>

<?php get_footer(); ?>
