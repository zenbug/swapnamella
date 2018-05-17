<?php
if(!class_exists('VLThemesAboutWidget'))
{
	class VLThemesAboutWidget extends WP_Widget
	{
		function __construct()
		{
			parent::__construct('VLThemesAboutWidget', esc_html__('VLThemes: About', 'vlthemes'), array(
				'description' => esc_html__('About Widget', 'vlthemes')
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
			$main_image = !empty($instance['main_image']) ? $instance['main_image'] : false;
			$signature_image = !empty($instance['signature_image']) ? $instance['signature_image'] : false;
?>

			<div class="vl-widget-about">


				<?php
			if($main_image):
?>
					<img src="<?php
				echo esc_url($instance['main_image']);
?>" alt="<?php
				echo $instance['title'];
?>">
				<?php
			endif;
?>
				<p class="vl-widget-about--content">
					<?php
			if(!empty($instance['main_content']))
			{
				echo $instance['main_content'];
			}
?>
				</p>

				<?php
			if($signature_image):
?>
					<div class="vl-widget-about--signature">
						<img src="<?php
				echo esc_url($instance['signature_image']);
?>" alt="<?php
				echo $instance['title'];
?>">
					</div>
				<?php
			endif;
?>
				
					
				
			</div>

			<?php
			echo $after_widget;
		}
		function form($instance)
		{
			$defaults = array(
				'title' => '',
				'main_image' => '',
				'signature_image' => '',
				'main_content' => ''
			);
			$instance = wp_parse_args((array) $instance, $defaults);
			$title = $instance['title'];
			$main_image = $instance['main_image'];
			$signature_image = $instance['signature_image'];
			$main_content = $instance['main_content'];
?>

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


			<p>
				<label for="<?php
			echo $this->get_field_id('main_image');
?>"><?php
			esc_html_e('Image URL:', 'vlthemes');
?></label>

				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('main_image'));
?>" name="<?php
			echo esc_attr($this->get_field_name('main_image'));
?>" type="text" value="<?php
			echo esc_attr($main_image);
?>">
			</p>


			<p>
				<label for="<?php
			echo $this->get_field_id('main_content');
?>"><?php
			esc_html_e('Content:', 'vlthemes');
?></label>

				<textarea class="widefat" id="<?php
			echo esc_attr($this->get_field_id('main_content'));
?>" name="<?php
			echo esc_attr($this->get_field_name('main_content'));
?>" type="text" value="<?php
			echo esc_attr($main_content);
?>"></textarea>
			</p>


			  <p>
				<label for="<?php
			echo $this->get_field_id('signature_image');
?>"><?php
			esc_html_e('Singature URL:', 'vlthemes');
?></label>

				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('signature_image'));
?>" name="<?php
			echo esc_attr($this->get_field_name('signature_image'));
?>" type="text" value="<?php
			echo esc_attr($signature_image);
?>">
			</p>
	
		<?php
		}
		function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['main_image'] = $new_instance['main_image'];
			$instance['main_content'] = $new_instance['main_content'];
			$instance['signature_image'] = $new_instance['signature_image'];
			return $instance;
		}
	}
}
//register widget with hook
add_action('widgets_init', 'register_VLThemesAboutWidget');
if(!function_exists('register_VLThemesAboutWidget'))
{
	function register_VLThemesAboutWidget()
	{
		register_widget('VLThemesAboutWidget');
	}
}

