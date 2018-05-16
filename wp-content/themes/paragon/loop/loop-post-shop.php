<?php

$shop_type_navigation = get_theme_mod('shop_type_navigation', 'ajax');
$shop_number_of_columns = get_theme_mod('shop_number_of_columns', '3');
$shop_container_class = 'vl-postlist vl-shop-masonry-wrapper clearfix isotope is-gutter products';

?>



<?php if ( have_posts() ): ?>
	<div class="<?php echo paragon_sanitize_class($shop_container_class); ?>" data-col="<?php echo esc_attr($shop_number_of_columns); ?>">


		<?php 

			while ( have_posts() ) : the_post();
			
				get_template_part('templates/post/paragon-post-shop', 'default');
			
			endwhile;

			wp_reset_postdata();

		?>
	
	</div>

<?php 
	switch ($shop_type_navigation) {
		case 'pagination':
			echo paragon_page_navigation(null, true);
			break;
		case 'buttons':
			echo paragon_page_navigation(null, false);
			break;
		case 'ajax':
			echo '<div class="vl-pagination-ajax clearfix vl-text-center"><a href="#" class="vl-btn vl-btn-ajax-load"><span>'.esc_html__('Load More', 'paragon').'</span><span class="icon"><i class="ion ion-load-c"></i></span></a></div>' . paragon_infinity_load(null);
			break;
	}


	else: 
			
		get_template_part('templates/content/paragon', 'content-none');
			
	endif;


?>







