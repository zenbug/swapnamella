<?php

if(!function_exists('paragon_infinity_load')){




	function paragon_infinity_load($wp_query = null) {



		if($wp_query == null) {

			global $wp_query;

		} else {

			$wp_query = $wp_query;

		}

		wp_enqueue_script('paragon_infinity_script', PARAGON_THEME_DIRECTORY . 'framework/includes/helper/infinity-load/infinity-load.js', array('jquery'), '', true);
		
		$max = $wp_query->max_num_pages;
		$paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;
		
		$ptf_load_more_words = get_theme_mod('ptf_load_more_words');

		$words = array();

		foreach ($ptf_load_more_words as $item) {
		    $words[] = $item['word'];
		}

		wp_localize_script(
			'paragon_infinity_script',
			'infinity_load',
			array(
				'startPage' => $paged,
				'maxPages' => $max,
				'nextLink' => next_posts($max, false),
				'loadMoreButtonNone' => esc_html__('No More Posts', 'paragon'),
				'loadMoreButtonText' => $words,
			)
		);
	}

}
