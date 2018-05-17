<?php



add_shortcode('vc_video_lightbox', 'vc_video_lightbox_function');


function vc_video_lightbox_function($atts, $content = null)
{
	extract(shortcode_atts(array(
		'image' => '',
		'link_to' => '',
		'm' => '0',
		'extra_class' => ''
	), $atts));
	
	
	
	$output = '';
	

	
	$vc_class = 'vl-video-lightbox';
	

	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
	
	$image_done = wp_get_attachment_image_src($image, 'full');
	
	
	$output .= '<div class="' . $vc_class . '" style="margin: '.$m.';">';
	
	$output .= '<div class="vl-video-lightbox--overlay"></div>';

	$output .= '<a href="'.$link_to.'" class="vl-video-lightbox--link is-popup"><i class="ion ion-play"></i></a>';
	$output .= '<img src="' . $image_done[0] . '" alt="">';
	

	$output .= '</div>';
	
	
	return $output;

}


add_action('vc_before_init', 'vc_video_lightbox_schortcode');
function vc_video_lightbox_schortcode()
{
	vc_map(array(
		'name' => esc_html__('Video Popup', 'vlthemes'),
		'base' => 'vc_video_lightbox',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),  
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'img',
				'class' => 'vc-preview-image',
				'heading' => esc_html__('Image', 'vlthemes'),
				'param_name' => 'image',
				'value' => '',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Link to Video (YouTube / Vimeo)', 'vlthemes'),
				'description' => '//player.vimeo.com/video/110894499 <br>//www.youtube.com/embed/6v2L2UGZJAM?version=3',
				'param_name' => 'link_to',
				'admin_label' => true,
				'value' => '#',
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
