<?php



/***********************************************************
paragon_widget_init
***********************************************************/

add_action('widgets_init', 'paragon_widget_init');

if(!function_exists('paragon_widget_init')) {
	function paragon_widget_init() {

		register_sidebar(array(
			'name' => esc_html__('Blog Sidebar', 'paragon'),
			'id' => 'blog_sidebar',
			'description' => esc_html__('Blog Sidebar Area', 'paragon'),
			'before_widget' => '<div id="%1$s" class="vl-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vl-widget--title">',
			'after_title' => '</h5>',
		));

		register_sidebar(array(
			'name' => esc_html__('Contact Sidebar', 'paragon'),
			'id' => 'contact_sidebar',
			'description' => esc_html__('Contact Sidebar Area', 'paragon'),
			'before_widget' => '<div id="%1$s" class="vl-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vl-widget--title">',
			'after_title' => '</h5>',
		));

		register_sidebar(array(
			'name' => esc_html__('Portfolio Sidebar', 'paragon'),
			'id' => 'portfolio_sidebar',
			'description' => esc_html__('Portfolio Sidebar Area', 'paragon'),
			'before_widget' => '<div id="%1$s" class="vl-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vl-widget--title">',
			'after_title' => '</h5>',
		));
		
		if (class_exists('WooCommerce')){


			register_sidebar(array(
				'name' => esc_html__('Shop Sidebar', 'paragon'),
				'id' => 'shop_sidebar',
				'description' => esc_html__('Shop Sidebar Area', 'paragon'),
				'before_widget' => '<div id="%1$s" class="vl-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h5 class="vl-widget--title">',
				'after_title' => '</h5>',
			));

			register_sidebar(array(
				'name' => esc_html__('Shop Singular Sidebar', 'paragon'),
				'id' => 'shop_singular_sidebar',
				'description' => esc_html__('Shop Singular Sidebar Area', 'paragon'),
				'before_widget' => '<div id="%1$s" class="vl-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h5 class="vl-widget--title">',
				'after_title' => '</h5>',
			));
		}

	}
}

/***********************************************************
paragon_fallback_menu
***********************************************************/

if (!function_exists('paragon_fallback_menu')) {
	function paragon_fallback_menu(){

		if(current_user_can( 'administrator' )) {
			echo '<span class="no-menu">' . esc_html__('Please register navigation from', 'paragon') . ' ' .
			'<a href="'. esc_url(admin_url()) . '"nav-menus.php?action=locations" target="_blank">'. esc_html__( 'Appearance > Menus', 'paragon' ) .'</a></span>';
		}
	}
}

/***********************************************************
paragon_sanitize_class
***********************************************************/

if(!function_exists('paragon_sanitize_class')) {
	function paragon_sanitize_class($class, $fallback = null) {

		if(is_string($class)) {
			$class = explode(' ', $class);
		}
		if(is_array($class) && count($class) > 0) {

			$class = array_map('sanitize_html_class', $class);
			return implode(' ', $class);

		} else {

			return sanitize_html_class($class, $fallback);

		}
	}
}


/***********************************************************
paragon_sanitize_style
***********************************************************/

if(!function_exists('paragon_sanitize_style')) {
	function paragon_sanitize_style($style) {

		$allowed_html = array(
			'style' => array()
		);

		return wp_kses($style, $allowed_html);
	}
}


/***********************************************************
paragon_custom_comment
***********************************************************/

if(!function_exists('paragon_custom_comment')) {
	function paragon_custom_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?> 
			<li class="vl-comment--item">
				<div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
	<div class="vl-comment--avatar">
		<?php echo get_avatar($comment, 80, $default = ''); ?>
	</div>

	<div class="vl-comment--content">

		<div class="vl-comment--header">
			<h5 class="vl-comment--author"><?php comment_author(); ?></h5>

			<p class="vl-comment--date">
				<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)) ?>"><?php printf( ' %1$s ' . esc_html__('at', 'paragon') . ' %2$s', get_comment_date(),  get_comment_time() ); ?></a>
			</p>

		</div>

		<div class="vl-comment--text">

			<?php if ($comment->comment_approved == '0') : ?>
			<p><?php esc_html_e('Your comment is awaiting moderation.', 'paragon'); ?></p>
			<?php endif; ?>

			<?php comment_text(); ?>

			<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => esc_html__('Reply', 'paragon')))); ?>

			<?php edit_comment_link(esc_html__( 'Edit', 'paragon' ), '  ', ''); ?>

		</div>

	</div>
</div>

<!-- </li> is added by WordPress automatically -->
<?php
	}
}


/***********************************************************
excerpt_length
***********************************************************/

add_filter('excerpt_length', 'paragon_default_excerpt_length');

if(!function_exists('paragon_default_excerpt_length')) {
	function paragon_default_excerpt_length() {
		return 60;
	}
}

if(!function_exists('paragon_medium_excerpt_length')) {
	function paragon_medium_excerpt_length() {
		return 36;
	}
}

if(!function_exists('paragon_short_excerpt_length')) {
	function paragon_short_excerpt_length() {
		return 26;
	}
}

if(!function_exists('paragon_supershort_excerpt_length')) {
	function paragon_supershort_excerpt_length() {
		return 18;
	}
}

add_filter('excerpt_more', 'paragon_default_excerpt_more');

if(!function_exists('paragon_default_excerpt_more')) {
	function paragon_default_excerpt_more($more) {
		return ' ...';
	}
}


/***********************************************************
paragon_post_taxonomy
***********************************************************/

if(!function_exists('paragon_post_taxonomy')) {

	function paragon_post_taxonomy($post_id, $taxonomy, $delimiter = ', ', $get = 'name', $link = true) {

		$tags = wp_get_post_terms($post_id, $taxonomy);

		$list = '';

		foreach ($tags as $tag) {
			if($link) {
				$list .= '<a href="' . get_category_link($tag->term_id) . '">' . $tag->$get . '</a>' . $delimiter;
			} else {
				$list .= $tag->$get . $delimiter;
			}
		}

		return substr($list, 0, strlen($delimiter) * (-1));

	}

}


/***********************************************************
paragon_post_share_buttons
***********************************************************/

if(!function_exists('paragon_post_share_buttons')) {
	function paragon_post_share_buttons($post_id) {


		$url = urlencode(get_permalink($post_id));
		$title = urlencode(get_the_title($post_id));
		$media = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');

		$output = '<div class="vl-post-share vl-text-center"><a class="vl-post-share-icon" target="_blank" href="https://twitter.com/home?status=' . $title . '+' . $url . '"><i class="fa fa-fw fa-twitter"></i></a>';

		$output .= '<a class="vl-post-share-icon" target="_blank" href="https://www.facebook.com/share.php?u=' . $url . '&title=' . $title . '"><i class="fa fa-fw fa-facebook"></i></a>';

		$output .= '<a class="vl-post-share-icon" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&title=' . $title . '"><i class="fa fa-fw fa-linkedin"></i></a>';

		$output .= '<a class="vl-post-share-icon" target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?media=' . $media[0] . '&url=' . $url . '&is_video=false&description=' . $title . '"><i class="fa fa-fw fa-pinterest"></i></a>';

		$output .= '<a class="vl-post-share-icon" target="_blank" href="https://plus.google.com/share?url=' . $url . '"><i class="fa fa-fw fa-google-plus"></i></a></div>';



		return apply_filters('paragon/post_share_buttons', $output);


	}
}


/***********************************************************
paragon_get_post_thumb
***********************************************************/

if(!function_exists('paragon_get_post_thumb')) {
	function paragon_get_post_thumb($post_id, $size) {

		$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $size);
		return $thumb['0'];

	}
}


/***********************************************************
paragon_post_meta
***********************************************************/

if(!function_exists('paragon_post_meta')) {
	function paragon_post_meta($before = '', $after = ''){

		global $post;

		$output = '';

		$output .= $before;

		$post_categories = get_the_category();
		$post_author_id = get_post_field( 'post_author', $post->ID );
		$userdata = get_userdata( $post_author_id );
		$userdata_url = get_author_posts_url( $post_author_id );

		$output .= '<span>'.esc_html__('By','paragon').'</span> <a href="'.esc_url($userdata_url).'">'. esc_html($userdata->display_name) .'</a>';

		if ( !empty( $post_categories ) ) {
			$output .= ' <span>'.esc_html__('in', 'paragon').'</span> <a href="' . esc_url(get_category_link($post_categories[0]->term_id)) . '">' . esc_html($post_categories[0]->name) . '</a>';
		}


		$output .= ' <span>'.esc_html__('on', 'paragon').'</span> <time datetime="'.get_the_time( 'c' ).'">'.get_the_date('').'</time>';

		$output .= $after;

		return apply_filters('paragon/post_meta', $output);


	}
}


/***********************************************************
paragon_post_title
***********************************************************/

if(!function_exists('paragon_post_title')) {
	function paragon_post_title($before = '', $after = '', $is_single = false){

		global $post;

		$output = $before;;

		if(!$is_single && is_sticky($post->ID)){
			$output .= '<i class="ion ion-android-star"></i>';
		}

		if(!$is_single){
			$output .= '<a href="'.get_permalink($post->ID).'" rel="bookmark">';
		}

		$output .= get_the_title($post->ID);

		if(!$is_single){
			$output .= '</a>';
		}

		$output .= $after;

		return apply_filters('paragon/post_title', $output);

	}
}

		
/***********************************************************
paragon_post_thumbnail_postformat
***********************************************************/

if(!function_exists('paragon_post_thumbnail_postformat')) {
	function paragon_post_thumbnail_postformat($format = '', $size = 'paragon_fullsize'){

		global $post;

		$output = '';

		$before = '<div class="vl-post--thumbnail">';
		$after = '</div>';

		// Post video
		if($format == 'video'){

			if(has_post_thumbnail()):

				$output .= $before;

				if (class_exists('acf') && get_field('post_video_link')):

					$output .= '<div class="vl-video-lightbox"><a href="'.get_field('post_video_link').'" class="vl-video-lightbox--link is-popup"><i class="ion ion-play"></i></a>';

				endif;

				$output .= '<img src="'.paragon_get_post_thumb($post->ID, $size).'" alt="">';

				if (class_exists('acf') && get_field('post_video_link')):

					$output .= '</div>';
					
				endif;

				$output .= $after;

			endif;


		// Post audio
		} elseif($format == 'audio'){


			if(has_post_thumbnail()):

				$output .= $before;

				$output .= '<img src="'.paragon_get_post_thumb($post->ID, $size).'" alt="">';

				if (class_exists('acf') && get_field('post_audio')):

					$field = get_field('post_audio');
					$output .= do_shortcode('[audio src="'.$field.'"]');

				endif;

				$output .= $after;

			endif;


		// Post Gallery
		} elseif($format == 'gallery'){

			if(class_exists('acf')):
			$images = get_field('post_gallery_images');
			$output .= $before;

			if( $images ):
				$output .= '<div class="vl-owl-slider-wrap owl-slider-blog owl-carousel">';	
				
					foreach( $images as $image ):
						$output .= '<div class="owl-item">';
						$output .= '<img src="'.$image['sizes'][$size].'" alt="">';
						$output .= '</div>'; 
					endforeach;
				
				$output .= '</div>';
			endif;

			$output .= $after;
			endif;

		// Other posts
		} else {

			if(has_post_thumbnail()):

				$output .= $before;
					
					if(!is_single()) { $output .= '<a href="'.get_the_permalink($post->ID).'">'; }

						$output .= '<img src="'.paragon_get_post_thumb($post->ID, $size).'" alt="">';
						
					if(!is_single()) { $output .= '</a>'; }

				$output .= $after;

			endif;

		}


		return apply_filters('paragon/post_thumbnail_postformat', $output);
	}
}


/***********************************************************
paragon_post_footer
***********************************************************/

if(!function_exists('paragon_post_footer')) {
	function paragon_post_footer($before = '', $after = '', $is_single = false){

		global $post;

		$output = '';
		if(!$is_single){

			$output .= $before;
			$output .= '<a class="vl-btn vl-btn--primary" href="'.get_permalink($post->ID).'">'.esc_html__('Read More', 'paragon').'</a>';
			$output .= $after;
		}

		return apply_filters('paragon/post_footer', $output);
	}
}



/***********************************************************
paragon_post_navigation
***********************************************************/

if(!function_exists('paragon_post_navigation')) {
	function paragon_post_navigation($before = '', $after = '') {

		global $post;

		$prevPost = get_previous_post();
		$nextPost = get_next_post();

		$output = '';

		if($prevPost || $nextPost):

			$output .= $before;

			$output .= '<div class="row"><div class="col-sm-4 col-xs-6">';
			if($prevPost){
				$output .= '<a class="prev-page vl-icon-animate-left" href="'.get_permalink($prevPost->ID).'"><i class="ion ion-android-arrow-back"></i><span>'.esc_html__('Previous Post', 'paragon').'</span></a>';
			}

			$output .= '</div><div class="col-sm-4 hidden-xs-down">';

			$output .= paragon_post_share_buttons($post->ID);

			$output .= '</div><div class="col-sm-4 col-xs-6">';

			if($nextPost){
				$output .= '<a class="next-page vl-icon-animate-right" href="'.get_permalink($nextPost->ID).'"><span>'.esc_html__('Next Post', 'paragon').'</span><i class="ion ion-android-arrow-forward"></i></a>';
			}


			$output .= '</div></div>';


			$output .= $after;

		endif;

		return apply_filters('paragon/post_navigation', $output);

	}
}



/***********************************************************
paragon_add_thumbnail_column_post
***********************************************************/

add_filter('manage_edit-post_columns', 'paragon_add_thumbnail_column_post', 10, 1);

if(!function_exists('paragon_add_thumbnail_column_post')) {
	function paragon_add_thumbnail_column_post($columns) {

		$column_thumbnail = array(
			'thumbnail' => esc_html__('Thumbnail', 'paragon'),
		);

		$columns = array_slice($columns, 0, 2, true) + $column_thumbnail + array_slice($columns, 1, NULL, true);

		return $columns;

	}
}


/***********************************************************
paragon_display_thumbnail_post
***********************************************************/

add_action('manage_post_posts_custom_column', 'paragon_display_thumbnail_post', 10, 1);

if(!function_exists('paragon_display_thumbnail_post')) {
	function paragon_display_thumbnail_post($column) {

		global $post;

		switch ($column) {
			case 'thumbnail':

			if(get_the_post_thumbnail($post->ID)){

				echo get_the_post_thumbnail($post->ID, array(50,50));

			}

			break;

		}


	}
}

	
/***********************************************************
paragon_change_admin_logo
***********************************************************/

add_action('login_head', 'paragon_change_admin_logo');

if(!function_exists('paragon_change_admin_logo')) {
	function paragon_change_admin_logo() {

		if('' == get_theme_mod('login_logo_image', PARAGON_THEME_DIRECTORY . 'assets/img/vlthemes.png')) {
			return;
		}

		$image_url = get_theme_mod('login_logo_image', PARAGON_THEME_DIRECTORY . 'assets/img/vlthemes.png');
		$image_w = get_theme_mod('login_logo_image_width', '100px');
		$image_h = get_theme_mod('login_logo_image_height', '112px');

		echo '<style type="text/css">
			h1 a { 
				background: transparent url(' . esc_url($image_url) . ') 50% 50% no-repeat !important;
				width:' . esc_attr($image_w) . '!important; 
				height:' . esc_attr($image_h) . '!important; 
				background-size: cover !important;
			}
		</style>';
	}
}


/***********************************************************
paragon_change_admin_logo_link
***********************************************************/

add_filter('login_headerurl', 'paragon_change_admin_logo_link');

if(!function_exists('paragon_change_admin_logo_link')) {
	function paragon_change_admin_logo_link() {

		return home_url('/');

	}
}


/***********************************************************
paragon_page_navigation
***********************************************************/

if(!function_exists('paragon_page_navigation')) {
	function paragon_page_navigation($query = null, $paginated = false) {

		if($query == null) {
			global $wp_query;
			$query = $wp_query;
		}

		$page = $query->query_vars['paged'];
		$pages = $query->max_num_pages;
		$paged = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);


		if($page == 0) {
			$page = 1;
		}


		$numeric_links = paginate_links(array(
			'foramt' => '',
			'add_args' => '',
			'current' => $paged,
			'total' => $pages,
			'prev_text' => '<i class="ion ion-android-arrow-back"></i>',
			'next_text' => '<i class="ion ion-android-arrow-forward"></i>',
		));


		$output = '';


		if($pages > 1) {

			if(false == $paginated) {

				$output .= '<nav class="vl-pagination-buttons clearfix vl-no-select">';
				
				if ($page + 1 <= $pages) {
					$output .= '<a class="prev-page vl-icon-animate-left" href="' . get_pagenum_link($page + 1) . '"><i class="ion ion-android-arrow-back"></i><span>' . esc_html__('Previous Page', 'paragon') . '</span></a>';
				}
				
				
				if ($page - 1 >= 1) {
					$output .= '<a class="next-page vl-icon-animate-right" href="' . get_pagenum_link($page - 1) . '"><span>' . esc_html__('Next Page', 'paragon') . '</span><i class="ion ion-android-arrow-forward"></i></a>';
				}
				
				$output .= '</nav>';

			} else {


				$output .= '<nav class="vl-pagination clearfix vl-no-select vl-text-center">';

				$output .= $numeric_links;

				$output .= '</nav>';

			}

		}


		return apply_filters('paragon/page_navigation', $output);


	}
}


/***********************************************************
paragon_custom_post_password
***********************************************************/

add_filter('the_password_form', 'paragon_custom_post_password');


if(!function_exists('paragon_custom_post_password')) {

	function paragon_custom_post_password() {

		global $post;

		$label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);

		$output = '<form class="post-password-forms" action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post"><input name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . esc_html__('Password:' , 'paragon') . '"><input type="submit" name="Submit" class="vl-btn vl-btn--secondary" value="' . esc_html__('Submit' , 'paragon') . '" /></form>';

		return apply_filters('paragon/custom_post_password', $output);


	}
}




/***********************************************************
paragon_remove_page_in_search
***********************************************************/

add_filter('pre_get_posts', 'paragon_remove_page_in_search');

if(!function_exists('paragon_remove_page_in_search')) {
	function paragon_remove_page_in_search($query) {

		if ($query->is_search) {
			$query->set('post_type', 'post');
		}

		return $query;
		 
	}
}


/***********************************************************
paragon_set_post_views, paragon_track_post_views, paragon_get_post_views
***********************************************************/


if(!function_exists('paragon_set_post_views')) {
	function paragon_set_post_views($postID) {

		$count_key = 'paragon_post_views_count';
		$count = get_post_meta($postID, $count_key, true);

		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
}


add_action( 'wp_head', 'paragon_track_post_views');
if(!function_exists('paragon_track_post_views')) {
	function paragon_track_post_views ($postID) {

		if(!is_single()) return;

		if(empty($postID)){
			global $post;
			$postID = $post->ID;
		}

		paragon_set_post_views($postID);

	}
}

if(!function_exists('paragon_get_post_views')) {
	function paragon_get_post_views($postID){

		$count_key = 'paragon_post_views_count';
		$count = get_post_meta($postID, $count_key, true);

		if($count == ''){
			
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');

			return '0';
		}

		return $count;
	}
}


