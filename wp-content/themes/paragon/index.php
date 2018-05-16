<?php get_header(); ?>


<div class="container-fluid">
	<div class="row">

	<?php get_template_part('templates/content/paragon-content', 'page-title'); ?>
	
	<?php get_template_part('loop/loop-post', 'default'); ?>
	</div>
</div>


<?php get_footer(); ?>