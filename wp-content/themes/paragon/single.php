<?php get_header(); ?>



<div class="container-fluid">
	<div class="row">

	<?php
		if (have_posts()): the_post();
			get_template_part('templates/post/paragon-post', 'default');
		endif;


		if(get_the_tags()):

			echo '<div class="tagcloud vl-text-left">';
			the_tags('', ' ', '');
			echo '</div>';

		endif;

		
		if(comments_open()){
			comments_template();
		}

		echo paragon_post_navigation('<div class="vl-pagination-buttons clearfix vl-no-select">', '</div>');


	?>
	</div>

</div>

<?php get_footer(); ?>
