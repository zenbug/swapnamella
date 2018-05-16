<?php

if(class_exists('acf') && get_field('ptf_show_sort', get_queried_object_id())){
	echo '<div class="vl-widget">';

	echo '<h5 class="vl-widget--title">'.esc_html__('Sort by:', 'paragon').'</h5>';

	echo '<div class="vl-sidebar-portfolio-sorting vl-no-select"><ul>';

	echo '<li><a href="#" data-sort="date" class="is-active"><span>'.esc_html__('Date', 'paragon').'</span></a></li>';
	echo '<li><a href="#" data-sort="random"><span>'.esc_html__('Random', 'paragon').'</span></a></li>';
	echo '<li><a href="#" data-sort="views"><span>'.esc_html__('Popularity', 'paragon').'</span></a></li>';
	
	echo '</ul></div>';
	echo '</div>';
}