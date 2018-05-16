<?php

	// Global settings

	$link_url = get_permalink($post->ID);  
	$title = get_the_title($post->ID); 
	$ptf_number_of_columns = get_field('ptf_number_of_columns', get_queried_object_id());
	$ptf_type_link = get_field('ptf_type_link', get_queried_object_id());
	$ptf_image_properties = get_field('ptf_image_properties', get_queried_object_id());
	$ratio = explode(':', get_field('ptf_image_ratio', get_queried_object_id()) ? get_field('ptf_image_ratio', get_queried_object_id()) : '4:3');


	$img_one = paragon_get_post_thumb($post->ID, 'full');
	$img_two = '';

	if (class_exists('MultiPostThumbnails')) :
		$img_two = MultiPostThumbnails::get_post_thumbnail_url(
			get_post_type(),
			'secondary-image'
		);
	endif;



	switch ($ptf_image_properties) {
		case 'equal':

			switch ($ptf_number_of_columns) {

				case '2':
					$img_width = 800;
					$img_height = ceil($img_width / $ratio[0] * $ratio[1]);
					break;

				case '3':
					$img_width = 700;
					$img_height = ceil($img_width / $ratio[0] * $ratio[1]);
					break;

				case '4':
					$img_width = 560;
					$img_height = ceil($img_width / $ratio[0] * $ratio[1]);
					break; 

			}

			// img one
			$img_resized_one = aq_resize($img_one, $img_width, $img_height, true, false);

			$img_output_one = '<img class="img-one" src="'.$img_resized_one[0].'" width="'.$img_resized_one[1].'" height="'.$img_resized_one[2].'" alt="">';

		
			break;

		case 'masonry':


			$img_output_one = '<img class="img-one" src="'.$img_one.'" alt="">';

			break;
			
	}


?>

<article
	<?php post_class('vl-portfolio-post vl-portfolio-post--default '); ?>
	data-date="<?php the_time('U'); ?>"
	data-views="<?php echo paragon_get_post_views($post->ID); ?>"
	id="post-<?php the_ID(); ?>">

	<div class="vl-portfolio-post--wrapper">
		<div class="vl-portfolio-post--image">
			<?php 
				echo wp_kses($img_output_one, array(
					'img' => array(
						'height' => array(),
						'width' => array(),
						'src' => array(),
						'alt' => array(),
						'class' => array(),
					)
				)); 

				if(!empty($img_two)){
					echo '<div class="img-two" style="background-image: url('.esc_url($img_two).');"></div>';
				}
				
			?>

			<a class="vl-portfolio-post--link" href="<?php echo esc_url($link_url); ?>"></a>

			<div class="vl-portfolio-post--info">

				<h5 class="vl-portfolio-post--title"><?php echo esc_html($title); ?></h5>
				<p class="vl-portfolio-post--cat"><?php echo paragon_post_taxonomy($post->ID, 'portfolio_category', ', ', 'name', false); ?></p>

			</div>

		</div>

	</div>

</article>