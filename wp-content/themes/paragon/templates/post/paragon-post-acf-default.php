<?php

	$blog_layout = get_field('blog_layout', get_queried_object_id());

	switch ($blog_layout) {
		case 'masonry-two':
			$image_size = 'paragon_fullsize';
			add_filter('excerpt_length', 'paragon_short_excerpt_length');
			break;
		case 'classic':
			$image_size = 'paragon_large_rect_horizontal';
			break;
	}


?>



<article <?php post_class('vl-post-default clearfix'); ?> id="post-<?php the_ID(); ?>">

	<?php echo paragon_post_thumbnail_postformat(get_post_format(), $image_size); ?>

	<div class="vl-post--content">

		<?php echo paragon_post_title('<h3 class="vl-post--title clearfix">', '</h3>', false); ?>

		<?php echo paragon_post_meta('<div class="vl-post--meta">', '</div>'); ?>

		<?php the_excerpt(); ?>

		<?php echo paragon_post_footer('<div class="vl-post--footer">', '</div>', false); ?>

	</div>

</article>
