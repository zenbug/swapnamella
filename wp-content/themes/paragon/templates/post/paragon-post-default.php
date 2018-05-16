<?php if(is_single()): ?>

<article
	<?php post_class('vl-post-default vl-post-single clearfix'); ?>
	id="post-<?php the_ID(); ?>">

	<?php echo paragon_post_thumbnail_postformat(get_post_format(), 'paragon_large_rect_horizontal'); ?>

	<div class="vl-post--content">

		<?php echo paragon_post_title('<h3 class="vl-post--title clearfix">', '</h3>', true); ?>

		<?php echo paragon_post_meta('<div class="vl-post--meta">', '</div>'); ?>

		<?php 

			the_content();

			wp_link_pages(array(
				'before' => '<nav class="vl-pagination clearfix vl-no-select vl-text-center">',
				'after' => '</nav>',
				'next_or_number' => 'next',
				'nextpagelink' => '<span>' . esc_html__('Next Page', 'paragon') . '</span><i class="ion ion-android-arrow-forward"></i>',
				'previouspagelink' => '<i class="ion ion-android-arrow-back"></i><span>' . esc_html__('Previous Page', 'paragon') . '</span>',
			));
		?>

		<?php echo paragon_post_footer('<div class="vl-post--footer">', '</div>', true); ?>

	</div>

</article>

<?php else: ?>

<article
	<?php post_class('vl-post-default clearfix'); ?>
	id="post-<?php the_ID(); ?>">

	<?php echo paragon_post_thumbnail_postformat(get_post_format(), 'paragon_large_rect_horizontal'); ?>

	<div class="vl-post--content">

		<?php echo paragon_post_title('<h3 class="vl-post--title clearfix">', '</h3>', false); ?>

		<?php echo paragon_post_meta('<div class="vl-post--meta">', '</div>'); ?>

		<?php the_excerpt(); ?>

		<?php echo paragon_post_footer('<div class="vl-post--footer">', '</div>', false); ?>

	</div>

</article>

<?php endif; ?>