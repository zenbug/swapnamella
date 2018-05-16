<?php if (have_posts()): ?>

<div class="vl-postlist vl-postlist-default clearfix">

	<?php 

		while (have_posts()) : the_post();
			get_template_part('templates/post/paragon-post', 'default');
		endwhile;	

	?>

</div>

<?php 

	echo paragon_page_navigation(null, true);

	else: 
						
		get_template_part('templates/content/paragon-content','none');
						
	endif;

?>