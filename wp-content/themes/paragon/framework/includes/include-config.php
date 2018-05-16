<?php

/**
 * Include kirki fields
 */
if ( class_exists( 'Kirki' ) ) {
	require_once PARAGON_REQUIRE_DIRECTORY . 'framework/customizer.php';
}


/***********************************************************
Infinity Load
***********************************************************/

require_once PARAGON_REQUIRE_DIRECTORY . 'framework/includes/helper/infinity-load/infinity-load.php';

/***********************************************************
Aqua Resizer
***********************************************************/

if (!function_exists('aq_resize')) {

	require_once PARAGON_REQUIRE_DIRECTORY . 'framework/includes/helper/aqua_resizer/aq_resizer.php';

}

/***********************************************************
TGM
***********************************************************/ 

require_once PARAGON_REQUIRE_DIRECTORY . 'framework/includes/helper/class-tgm-plugin-activation.php';

/***********************************************************
Multi Thumbnail
***********************************************************/

if(!class_exists('MultiPostThumbnails')){

	require_once PARAGON_REQUIRE_DIRECTORY . 'framework/includes/helper/multi-post-thumbnails/multi-post-thumbnails.php';

	new MultiPostThumbnails(array(
		'label' => 'Secondary Image',
		'id' => 'secondary-image',
		'post_type' => 'portfolio'
	));

}


/***********************************************************
Typekit
***********************************************************/

require_once PARAGON_REQUIRE_DIRECTORY . 'framework/includes/helper/typekit/themeTypekitClass.php';

