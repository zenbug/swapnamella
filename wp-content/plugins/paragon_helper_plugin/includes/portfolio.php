<?php



add_theme_support( 'post-thumbnails', 'portfolio' );


add_action( 'init', 'vlthemes_portfolio_init', 0 );

if( !function_exists('vlthemes_portfolio_init') ){
	function vlthemes_portfolio_init() {


		$labels = array(
			'name' => esc_html__( 'Portfolio', 'vlthemes' ),
			'singular_name' => esc_html__( 'Portfolio Item', 'vlthemes' ),
			'add_new' => esc_html__( 'Add New Item', 'vlthemes' ),
			'add_new_item' => esc_html__( 'Add New Portfolio Item', 'vlthemes' ),
			'edit_item' => esc_html__( 'Edit Portfolio Item', 'vlthemes' ),
			'new_item' => esc_html__( 'Add New Portfolio Item', 'vlthemes' ),
			'view_item' => esc_html__( 'View Item', 'vlthemes' ),
			'search_items' => esc_html__( 'Search Portfolio', 'vlthemes' ),
			'not_found' => esc_html__( 'No portfolio items found', 'vlthemes' ),
			'not_found_in_trash' => esc_html__( 'No portfolio items found in trash', 'vlthemes' )
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'revisions', 'comments' ),
			'capability_type' => 'post',
			'menu_position' => 5,
			'has_archive' => false,
			'menu_icon'   => 'dashicons-layout',
		);

		$args = apply_filters('vlthemes_args', $args);

		register_post_type('portfolio', $args);
		flush_rewrite_rules();


		/**
		 * Register a taxonomy for Portfolio Categories
		 * http://codex.wordpress.org/Function_Reference/register_taxonomy
		 */

		$taxonomy_portfolio_category_labels = array(
			'name' => esc_html__( 'Portfolio Categories', 'vlthemes' ),
			'singular_name' => esc_html__( 'Portfolio Category', 'vlthemes' ),
			'search_items' => esc_html__( 'Search Portfolio Categories', 'vlthemes' ),
			'popular_items' => esc_html__( 'Popular Portfolio Categories', 'vlthemes' ),
			'all_items' => esc_html__( 'All Portfolio Categories', 'vlthemes' ),
			'parent_item' => esc_html__( 'Parent Portfolio Category', 'vlthemes' ),
			'parent_item_colon' => esc_html__( 'Parent Portfolio Category:', 'vlthemes' ),
			'edit_item' => esc_html__( 'Edit Portfolio Category', 'vlthemes' ),
			'update_item' => esc_html__( 'Update Portfolio Category', 'vlthemes' ),
			'add_new_item' => esc_html__( 'Add New Portfolio Category', 'vlthemes' ),
			'new_item_name' => esc_html__( 'New Portfolio Category Name', 'vlthemes' ),
			'separate_items_with_commas' => esc_html__( 'Separate portfolio categories with commas', 'vlthemes' ),
			'add_or_remove_items' => esc_html__( 'Add or remove portfolio categories', 'vlthemes' ),
			'choose_from_most_used' => esc_html__( 'Choose from the most used portfolio categories', 'vlthemes' ),
			'menu_name' => esc_html__( 'Portfolio Categories', 'vlthemes' ),
		);

		$taxonomy_portfolio_category_args = array(
			'labels' => $taxonomy_portfolio_category_labels,
			'public' => true,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_tagcloud' => true,
			'hierarchical' => true,
			'query_var' => true,
			'rewrite' => false,
		);

		register_taxonomy( 'portfolio_category', array( 'portfolio' ), $taxonomy_portfolio_category_args );


	}

}

add_filter( 'manage_edit-portfolio_columns', 'vlthemes_add_thumbnail_column', 10, 1 );

if( !function_exists('vlthemes_add_thumbnail_column') ){
	function vlthemes_add_thumbnail_column( $columns ) {

		$column_thumbnail = array( 'thumbnail' => esc_html__('Thumbnail','vlthemes' ) );
		$columns = array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
		return $columns;
	}
}



add_action( 'manage_portfolio_posts_custom_column', 'vlthemes_display_thumbnail', 10, 1 );

if( !function_exists('vlthemes_display_thumbnail') ){
	function vlthemes_display_thumbnail( $column ) {
		global $post;
		switch ( $column ) {
			case 'thumbnail':
				echo get_the_post_thumbnail( $post->ID, array(50, 50) );
				break;
		}
	}
}
