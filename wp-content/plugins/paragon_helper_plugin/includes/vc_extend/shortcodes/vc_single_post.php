<?php



add_shortcode('vc_single_post', 'vc_single_post_function');

function vc_single_post_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'post_id' => '',
		'm' => '0',
		'extra_class' => ''
	), $atts));
	

	$vc_class = 'vc-single-post';
	

	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}


	$args = array(
	    'post_type' => 'post', 
	    'p'=> $post_id, 
	);

	$all_posts = new WP_Query($args);

	ob_start();	
	
	echo '<div class="' . $vc_class . '" style="margin: '.$m.';">';
		if($all_posts->have_posts()):

			while ($all_posts->have_posts()) : $all_posts->the_post();
				add_filter('excerpt_length', 'paragon_supershort_excerpt_length');
				get_template_part('templates/post/paragon-post', 'default');
			endwhile;
		endif;

	echo '</div>';
	

   	wp_reset_query();

	return ob_get_clean();
	
}


add_action('vc_before_init', 'vc_single_post_shortcode');

function vc_single_post_shortcode() {

	vc_map(array(
		'name' => esc_html__('Single Post', 'vlthemes'),
		'base' => 'vc_single_post',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),  
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'param_name' => 'post_id',
				'heading' => esc_html__('Post ID', 'vlthemes'),
				'value' => '',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Margin (px)', 'vlthemes'),
				'param_name' => 'm',
				'value' => '0',
				'group' => 'Margin'
			), 
			array(
				'save_always' => true,
				'type' => 'textfield',
				'holder' => false,
				'heading' => esc_html__('Extra class', 'vlthemes'),
				'param_name' => 'extra_class',
				'value' => '',
				'admin_label' => true,
				'group' => 'Extras'
			)
		)
	));
	
}