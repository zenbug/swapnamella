<?php


$blog_type_navigation = get_field('blog_type_navigation', get_queried_object_id());
$blog_max_posts = get_field('blog_max_posts', get_queried_object_id());
$blog_layout = get_field('blog_layout', get_queried_object_id());


$paged = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);

$args = array(
	'paged' => $paged,
	'post_type' => 'post',
	'posts_per_page' => $blog_max_posts
);

$new_query = new WP_Query($args);


$data_col = '';

switch ($blog_layout) {
	case 'masonry-two':
		$blog_container_class = ' vl-postlist vl-postlist-masonry isotope clearfix';
		$data_col = 'data-col=2';
		break;
	case 'classic':
		$blog_container_class = ' vl-postlist vl-postlist-default clearfix';
		break;
}




?>

<?php if ($new_query->have_posts()): ?>

<div
	<?php echo esc_attr($data_col); ?>
	class="<?php echo paragon_sanitize_class($blog_container_class); ?>">

	<?php 

		while ($new_query->have_posts()) : $new_query->the_post();
		
	
			get_template_part('templates/post/paragon-post-acf', 'default');

		endwhile;

		
		wp_reset_postdata();


	?>

</div>

<?php 



		switch ($blog_type_navigation) {
			case 'pagination':
				echo paragon_page_navigation($new_query, true);
				break;
			case 'buttons':
				echo paragon_page_navigation($new_query, false);
				break;
			case 'ajax':
				echo '<div class="vl-pagination-ajax clearfix vl-text-center"><a href="#" class="vl-btn vl-btn-ajax-load"><span>'.esc_html__('Load More', 'paragon').'</span><span class="icon"><i class="ion ion-load-c"></i></span></a></div>' . paragon_infinity_load($new_query);
				break;
		}



			else: 
					
				get_template_part('templates/content/paragon-content','none');
					
			endif;

		?>