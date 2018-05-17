<?php
if(!class_exists('VLThemesPopularPosts'))
{
	class VLThemesPopularPosts extends WP_Widget
	{
		function __construct()
		{
			parent::__construct('VLThemesPopularPosts', esc_html__('VLThemes: Popular Posts', 'vlthemes'), array(
				'description' => esc_html__('Popular Posts Widget', 'vlthemes')
			));
		}
		function widget($args, $instance)
		{
			extract($args);


			echo $before_widget;
		$title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';

	        if ( ! empty( $title ) ) {
	            echo $before_title . esc_html( $title ) . $after_title;
	        }
			echo '<div class="vl-widget-popular-posts">';



			$query_args = array(
				'post_type' => 'post',
				'posts_per_page' => isset($instance['number']) ? $instance['number'] : 3,
				'orderby' => 'comment_count',
				'order' => 'DESC'
			);

			$the_query = new WP_Query($query_args);
			if($the_query->have_posts()):
				while($the_query->have_posts()):
					$the_query->the_post();
?>


				<div class="vl-widget-posts--holder">


					<div class="vl-widget-post--content">
						<h5 class="vl-widget-post--title"><a href="<?php
					echo the_permalink();
?>"><?php
					the_title();
?></a></h5>
						<time class="vl-widget-post--date" datetime="<?php
					the_time('c');
?>"><?php
					the_time('F d, Y');
?></time>
						
						<div class="vl-widget-post--response"><a href="<?php
					comments_link();
?>"><?php
					comments_number(esc_html__('No responses', 'vlthemes'), esc_html__('One response', 'vlthemes'), esc_html__('% responses', 'vlthemes'));
?></a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>


			<?php
				endwhile;
			endif;
			echo '</div>';
			echo $after_widget;
		}
		function form($instance)
		{
			$defaults = array(
				'title' => '',
				'number' => 3
			);
			$instance = wp_parse_args((array) $instance, $defaults);
			$title = $instance['title'];
			$number = $instance['number'];
?>

			<!-- title field -->
			<p>
				<label for="<?php
			echo $this->get_field_id('title');
?>"><?php
			esc_html_e('Title:', 'vlthemes');
?></label>

				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('title'));
?>" name="<?php
			echo esc_attr($this->get_field_name('title'));
?>" type="text" value="<?php
			echo esc_attr($title);
?>">
			</p>


			<!-- number field -->
			<p>
				<label for="<?php
			echo $this->get_field_id('number');
?>"><?php
			esc_html_e('Number of posts to show:', 'vlthemes');
?></label>

				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('number'));
?>" name="<?php
			echo esc_attr($this->get_field_name('number'));
?>" type="text" value="<?php
			echo esc_attr($number);
?>">
			</p>


			<?php
		}
		function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number'] = (int) $new_instance['number'];
			return $instance;
		}
	}
}
add_action('widgets_init', 'register_VLThemesPopularPosts');
if(!function_exists('register_VLThemesPopularPosts'))
{
	function register_VLThemesPopularPosts()
	{
		register_widget('VLThemesPopularPosts');
	}
}
