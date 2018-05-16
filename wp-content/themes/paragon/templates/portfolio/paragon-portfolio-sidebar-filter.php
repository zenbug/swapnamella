<?php

if(class_exists('acf') && get_field('ptf_show_filter', get_queried_object_id())){


	$categories = get_field('ptf_show_post_from_cat', get_queried_object_id());
	$is_show_filter = get_field('ptf_show_filter', get_queried_object_id()) ? true : false;
	$ptf_output_filter = '';
	if(get_field('ptf_filter_all_text', get_queried_object_id())){
		$ptf_output_filter .= '<li><a href="#" data-filter="*" class="is-active"><span>' . get_field('ptf_filter_all_text', get_queried_object_id()) . '</span></a></li>';
	}

	if ($categories) {
		if (sizeof($categories) <= 1) {
			$is_show_filter = false;
		}
		foreach ($categories as $categorie) {
			$filter = get_term_by('id', $categorie, 'portfolio_category');
			$ptf_output_filter .= '<li><a href="#" data-filter=".portfolio_category-' . $filter->slug . '"><span>' . $filter->name . '</span></a></li>';
		}
	} else {
		// If cats is empty
		$categories = get_categories(array('taxonomy'=>'portfolio_category'));
		foreach ($categories as $categorie) {
			$ptf_output_filter .= '<li><a href="#" data-filter=".portfolio_category-' . $categorie->slug . '"><span>' . $categorie->name . '</span></a></li>';
		}
	}

	if ($is_show_filter) {
		echo '<div class="vl-widget">';

		echo '<h5 class="vl-widget--title">'.esc_html__('Filter by:', 'paragon').'</h5>';
		
		echo '<div class="vl-sidebar-portfolio-filter vl-no-select"><ul>' . $ptf_output_filter . '</ul></div>';

		echo '</div>';
	}  
}