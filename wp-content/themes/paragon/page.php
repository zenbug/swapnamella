<?php 

get_header(); the_post();

?>

		
<div class="container-fluid">
	<div class="row">

	<?php get_template_part('templates/content/paragon-content', 'page-title');?>
	
	<?php 
		get_template_part('templates/content/paragon-content', 'page');

		if (comments_open() || get_comments_number()){
			comments_template();
		}
	
	?>
	</div>
</div>




<?php get_footer(); ?>
