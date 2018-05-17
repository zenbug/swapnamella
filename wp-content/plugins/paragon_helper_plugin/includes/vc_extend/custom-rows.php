<?php


add_action('vc_after_init', 'vlthemes_vc_row_full_width');

if (!function_exists('vlthemes_vc_row_full_width')) {
	
	function vlthemes_vc_row_full_width()
	{
		
		
		$param = WPBMap::getParam('vc_row', 'full_width');
		
		$param['weight'] = 2;
		$param['value'][esc_html__('Full width (VLThemes)', 'vinero')] = 'vl-full-width';
		
		vc_update_shortcode_param('vc_row', $param);
	}
}
