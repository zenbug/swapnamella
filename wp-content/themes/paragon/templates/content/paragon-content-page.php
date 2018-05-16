
<article <?php post_class('vl-page-default'); ?> id="post-<?php the_ID(); ?>">

	<?php the_content(); ?>

	<?php
		wp_link_pages(array(
			'before'  => '<nav class="vl-pagination clearfix vl-no-select vl-text-center">',
			'after' => '</nav>',
			'next_or_number' => 'next',
			'nextpagelink' => '<span>' . esc_html__('Next Page', 'paragon') . '</span><i class="ion ion-android-arrow-forward"></i>',
			'previouspagelink' => '<i class="ion ion-android-arrow-back"></i><span>' . esc_html__('Previous Page', 'paragon') . '</span>',
		));
	?>

	<?php edit_post_link(esc_html__('Edit', 'paragon'), '<span class="edit-link">', '</span>'); ?>

</article>
