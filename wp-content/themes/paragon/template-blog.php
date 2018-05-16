<?php

// Template Name: Blog Page

get_header();

?>


<?php if(class_exists('acf')): ?>

<div class="container-fluid">
	<div class="row">

	<?php get_template_part('templates/content/paragon-content', 'page-title'); ?>
	<?php 

		if(have_posts()): while (have_posts()) : the_post(); 

			get_template_part('loop/loop-post', 'acf-blog'); 

		endwhile; endif;

	?>
	</div>

</div>


<?php endif; ?>




<?php get_footer(); ?>
