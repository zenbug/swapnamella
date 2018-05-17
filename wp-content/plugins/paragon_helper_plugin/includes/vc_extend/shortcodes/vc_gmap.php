<?php



add_shortcode('vc_gmap', 'vc_gmap_function');


function vc_gmap_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'map_img' => '',
		'address' => '7th Ave, New York, NY',
		'zoom' => 14,
		'size' => '320px',
		'm' => '0',
		'extra_class' => ''
	), $atts));



	$output = '';




	$vc_class = 'vl-map';



	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}




	$vc_init = uniqid('el_');

	$image_done = wp_get_attachment_image_src($map_img, 'full');


	$output .= '<div id="map-' . $vc_init . '" class="' . $vc_class . '" style="height:' . $size . '; margin:' . $m . ';"></div>';

	$output .= '
		<script type="text/javascript">
		jQuery.noConflict()(function($){
			$("#map-'.$vc_init.'").gmap3({
				address :"'.$address.'",
				zoom: '.$zoom.',
				scrollwheel: false,
				draggable: true,
				mapTypeControl: false,
       			mapTypeId : google.maps.MapTypeId.ROADMAP,
						styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#e9f1f4"},{"visibility":"on"}]}],				
					
       		}).marker([
			    {
			    	address: "'.$address.'", 
			    	icon: "'.$image_done[0].'"
			    }
			]);
		});
		</script>';
	return $output;
}


add_action('vc_before_init', 'vc_gmap_shortcode');

function vc_gmap_shortcode() {
	vc_map(array(
		'name' => esc_html__('Google Map', 'vlthemes'),
		'base' => 'vc_gmap',
		 'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'param_name' => 'address',
				'heading' => esc_html__('Addres', 'vlthemes'),
				'admin_label' => true,
				'value' => '7th Ave, New York, NY',
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Map Zoom', 'vlthemes'),
				'param_name' => 'zoom',
				'value' => array(
					esc_html__('14 - Default', 'vlthemes') => 14,
					1,
					2,
					3,
					4,
					5,
					6,
					7,
					8,
					9,
					10,
					11,
					12,
					13,
					15,
					16,
					17,
					18,
					19,
					20
				),
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Map Height (px)', 'vlthemes'),
				'param_name' => 'size',
				'admin_label' => true,
				'value' => '320px',
				'group' => 'General'
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Map Marker', 'vlthemes'),
				'param_name' => 'map_img',
				'value' => '',
				'group' => 'Style'
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
