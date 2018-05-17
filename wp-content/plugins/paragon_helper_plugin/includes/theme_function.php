<?php


/***********************************************************
vlthemes_add_contactmethods
***********************************************************/

// add_filter('user_contactmethods', 'vlthemes_add_contactmethods');

// if (!function_exists('vlthemes_add_contactmethods')) {

// 	function vlthemes_add_contactmethods($contactmethods)
// 	{
// 			$contactmethods['facebook'] = esc_html__('Facebook Username', 'vinero');
// 			$contactmethods['instagram'] = esc_html__('Instagram Username', 'vinero');
// 			$contactmethods['google'] = esc_html__('Google Plus Username', 'vinero');
// 			$contactmethods['twitter'] = esc_html__('Twitter Username', 'vinero');
// 			$contactmethods['tumblr'] = esc_html__('Tumblr Username', 'vinero');
// 			$contactmethods['pinterest'] = esc_html__('Pinterest Username', 'vinero');
// 			return $contactmethods;
// 	}

// }


add_filter('wp_title', 'vlthemes_wp_title', 10, 2);

if (!function_exists('vlthemes_wp_title')) {
	
	function vlthemes_wp_title($title, $sep) {
		global $paged, $page;
		
		if (is_feed()) {
			return $title;
		} // end if
		
		// Add the site name.
		$title .= get_bloginfo('name');
		
		// Add the site description for the home/front page.
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page())) {
			$title = "$title $sep $site_description";
		} // end if
		
		// Add a page number if necessary.
		if ($paged >= 2 || $page >= 2) {
			$title = sprintf(esc_html__('Page %s', 'breal'), max($paged, $page)) . " $sep $title";
		} // end if
		
		return $title;
	}
}
