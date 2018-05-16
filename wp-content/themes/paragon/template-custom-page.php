<?php

// Template Name: Custom Page

get_header();

?>


<div class="container-fluid">
	<div class="row">
	<?php 

		while (have_posts()) : the_post(); 
			the_content();
	 	endwhile; 
	 	
	?>
	</div>
</div>
   

<?php get_footer(); ?>