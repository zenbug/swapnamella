<?php

	$ptf_item_style = get_field('ptf_item_style', get_queried_object_id());
	
	$ptf_type_navigation = get_field('ptf_type_navigation', get_queried_object_id());
	$ptf_max_posts = get_field('ptf_max_posts', get_queried_object_id());
	$ptf_is_gutter = get_field('ptf_is_gutter', get_queried_object_id());
	$ptf_number_of_columns = get_field('ptf_number_of_columns', get_queried_object_id());

	
	$ptf_container_class = 'vl-postlist vl-portfolio-masonry-wrapper clearfix isotope';


	if($ptf_is_gutter){
		$ptf_container_class .= ' is-gutter';
	}


	$ptf_query_filter = '';
	$categories = get_field('ptf_show_post_from_cat', get_queried_object_id());

	if ($categories) {
		foreach ($categories as $categorie) {
			$filter = get_term_by('id', $categorie, 'portfolio_category');
			$ptf_query_filter .= $filter->slug . ',';
		}
	}

			
?>


<div
	class="<?php echo paragon_sanitize_class($ptf_container_class); ?>"
	data-col="<?php echo esc_attr($ptf_number_of_columns); ?>">

	<?php
   

			$paged = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);

			$args = array(
				'post_type' => 'portfolio',
				'portfolio_category' => $ptf_query_filter,
				'posts_per_page' => $ptf_type_navigation == 'none' ? -1 : $ptf_max_posts,
				'paged' => $paged
			);


			$new_query = new WP_Query($args);

			while ($new_query->have_posts()) : $new_query->the_post();


				get_template_part('templates/portfolio/paragon-portfolio-post', $ptf_item_style);

				
			endwhile;

			wp_reset_postdata();


		?>

</div>

<?php

	switch ($ptf_type_navigation) {
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


?>