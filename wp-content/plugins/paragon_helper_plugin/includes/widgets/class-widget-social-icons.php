<?php
if(!class_exists('VLThemesSocialWidget'))
{
	class VLThemesSocialWidget extends WP_Widget
	{
		function __construct()
		{
			parent::__construct('VLThemesSocialWidget', esc_html__('VLThemes: Social Links', 'vlthemes'), array(
				'description' => esc_html__('Social Links Widget', 'vlthemes')
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
			echo '<div class="vl-widget-social">';
			if(!empty($instance['twitter']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Twitter" target="_blank" href="' . esc_url($instance['twitter']) . '"><i class="fa fa-fw fa-twitter"></i></a>';
			}
			if(!empty($instance['facebook']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Facebook" target="_blank" href="' . esc_url($instance['facebook']) . '"><i class="fa fa-fw fa-facebook"></i></a>';
			}
			if(!empty($instance['google_plus']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Google Plus" target="_blank" href="' . esc_url($instance['google_plus']) . '"><i class="fa fa-fw fa-google-plus"></i></a>';
			}
			if(!empty($instance['linkedin']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="LinkedIn" target="_blank" href="' . esc_url($instance['linkedin']) . '"><i class="fa fa-fw fa-linkedin"></i></a>';
			}
			if(!empty($instance['pinterest']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Pinterest" target="_blank" href="' . esc_url($instance['pinterest']) . '"><i class="fa fa-fw fa-pinterest"></i></a>';
			}
			if(!empty($instance['instagram']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Instagram" target="_blank" href="' . esc_url($instance['instagram']) . '"><i class="fa fa-fw fa-instagram"></i></a>';
			}
			if(!empty($instance['youtube']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Youtube" target="_blank" href="' . esc_url($instance['youtube']) . '"><i class="fa fa-fw fa-youtube"></i></a>';
			}
			if(!empty($instance['flickr']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Flickr" target="_blank" href="' . esc_url($instance['flickr']) . '"><i class="fa fa-fw fa-flickr"></i></a>';
			}
			if(!empty($instance['tumblr']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Tumblr" target="_blank" href="' . esc_url($instance['tumblr']) . '"><i class="fa fa-fw fa-tumblr"></i></a>';
			}
			if(!empty($instance['vine']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Vine" target="_blank" href="' . esc_url($instance['vine']) . '"><i class="fa fa-fw fa-vine"></i></a>';
			}
			if(!empty($instance['vk']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="VK" target="_blank" href="' . esc_url($instance['vk']) . '"><i class="fa fa-fw fa-vk"></i></a>';
			}
			if(!empty($instance['deviantart']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Reddit" target="_blank" href="' . esc_url($instance['deviantart']) . '"><i class="fa fa-fw fa-deviantart"></i></a>';
			}
			if(!empty($instance['skype']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Skype" target="_blank" href="' . esc_url($instance['skype']) . '"><i class="fa fa-fw fa-skype"></i></a>';
			}
			if(!empty($instance['vimeo']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Vimeo" target="_blank" href="' . esc_url($instance['vimeo']) . '"><i class="fa fa-fw fa-vimeo"></i></a>';
			}
			if(!empty($instance['digg']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Trello" target="_blank" href="' . esc_url($instance['digg']) . '"><i class="fa fa-fw fa-digg"></i></a>';
			}
			if(!empty($instance['soundcloud']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Soundcloud" target="_blank" href="' . esc_url($instance['soundcloud']) . '"><i class="fa fa-fw fa-soundcloud"></i></a>';
			}
			if(!empty($instance['github']))
			{
				echo '<a class="vl-widget-social--social vl-social-icon" title="Github" target="_blank" href="' . esc_url($instance['github']) . '"><i class="fa fa-fw fa-github"></i></a>';
			}
			echo '</div>';
			echo '<div class="clearfix"></div>';
			echo $after_widget;
		}

		function form($instance)
		{
			$defaults = array(
				'title' => '',
				'twitter' => '',
				'facebook' => '',
				'google_plus' => '',
				'linkedin' => '',
				'pinterest' => '',
				'instagram' => '',
				'youtube' => '',
				'flickr' => '',
				'tumblr' => '',
				'deviantart' => '',
				'skype' => '',
				'vimeo' => '',
				'digg' => '',
				'github' => '',
				'vine' => '',
				'soundcloud' => '',
				'vk' => ''
			);

			$instance = wp_parse_args((array) $instance, $defaults);
			$title = $instance['title'];
			$twitter = $instance['twitter'];
			$facebook = $instance['facebook'];
			$google_plus = $instance['google_plus'];
			$linkedin = $instance['linkedin'];
			$pinterest = $instance['pinterest'];
			$instagram = $instance['instagram'];
			$youtube = $instance['youtube'];
			$flickr = $instance['flickr'];
			$tumblr = $instance['tumblr'];
			$deviantart = $instance['deviantart'];
			$skype = $instance['skype'];
			$vimeo = $instance['vimeo'];
			$digg = $instance['digg'];
			$github = $instance['github'];
			$vine = $instance['vine'];
			$soundcloud = $instance['soundcloud'];
			$vk = $instance['vk'];
?>



			<!-- title field -->
			<p><label for="<?php
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

			<!-- twitter field -->
			<p><label for="<?php
			echo $this->get_field_id('twitter');
?>"><?php
			esc_html_e('Twitter Profile Link / URL:', 'vlthemes');
?></label>
		
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('twitter'));
?>" name="<?php
			echo esc_attr($this->get_field_name('twitter'));
?>" value="<?php
			echo esc_attr($twitter);
?>" type="text">
			</p>
			

			<!-- facebook field -->
			<p><label for="<?php
			echo $this->get_field_id('facebook');
?>"><?php
			esc_html_e('Facebook Profile Link / URL:', 'vlthemes');
?></label>
			
			 
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('facebook'));
?>" name="<?php
			echo esc_attr($this->get_field_name('facebook'));
?>" value="<?php
			echo esc_attr($facebook);
?>" type="text">

			</p>

			<!-- Google plus field -->
			<p><label for="<?php
			echo $this->get_field_id('google_plus');
?>"><?php
			esc_html_e('Google Plus Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('google_plus'));
?>" name="<?php
			echo esc_attr($this->get_field_name('google_plus'));
?>" value="<?php
			echo esc_attr($google_plus);
?>" type="text">
			</p>

			<!-- LinkedIn field -->
			<p><label for="<?php
			echo $this->get_field_id('linkedin');
?>"><?php
			esc_html_e('LinkedIn Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('linkedin'));
?>" name="<?php
			echo esc_attr($this->get_field_name('linkedin'));
?>" value="<?php
			echo esc_attr($linkedin);
?>" type="text">
			</p>

			<!-- Pinterest field -->
			<p><label for="<?php
			echo $this->get_field_id('pinterest');
?>"><?php
			esc_html_e('Pinterest Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('pinterest'));
?>" name="<?php
			echo esc_attr($this->get_field_name('pinterest'));
?>" value="<?php
			echo esc_attr($pinterest);
?>" type="text">
			</p>

			<!-- instagram field -->
			<p><label for="<?php
			echo $this->get_field_id('instagram');
?>"><?php
			esc_html_e('Instagram Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('instagram'));
?>" name="<?php
			echo esc_attr($this->get_field_name('instagram'));
?>" value="<?php
			echo esc_attr($instagram);
?>" type="text">
			</p>
			

			<!-- youtube field -->
			<p><label for="<?php
			echo $this->get_field_id('youtube');
?>"><?php
			esc_html_e('Youtube Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('youtube'));
?>" name="<?php
			echo esc_attr($this->get_field_name('youtube'));
?>" value="<?php
			echo esc_attr($youtube);
?>" type="text">
			</p> 

			<!-- flickr field -->
			<p><label for="<?php
			echo $this->get_field_id('flickr');
?>"><?php
			esc_html_e('Flickr Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('flickr'));
?>" name="<?php
			echo esc_attr($this->get_field_name('flickr'));
?>" value="<?php
			echo esc_attr($flickr);
?>" type="text">
			</p> 

			<!-- tumblr field -->
			<p><label for="<?php
			echo $this->get_field_id('tumblr');
?>"><?php
			esc_html_e('Tumblr Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('tumblr'));
?>" name="<?php
			echo esc_attr($this->get_field_name('tumblr'));
?>" value="<?php
			echo esc_attr($tumblr);
?>" type="text">
			</p> 

			<!-- Deviantart field -->
			<p><label for="<?php
			echo $this->get_field_id('deviantart');
?>"><?php
			esc_html_e('Deviantart Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('deviantart'));
?>" name="<?php
			echo esc_attr($this->get_field_name('deviantart'));
?>" value="<?php
			echo esc_attr($deviantart);
?>" type="text">
			</p>

			<!-- skype field -->
			<p><label for="<?php
			echo $this->get_field_id('skype');
?>"><?php
			esc_html_e('Skype Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('skype'));
?>" name="<?php
			echo esc_attr($this->get_field_name('skype'));
?>" value="<?php
			echo esc_attr($skype);
?>" type="text">
			</p>

			<!-- vimeo field -->
			<p><label for="<?php
			echo $this->get_field_id('vimeo');
?>"><?php
			esc_html_e('Vimeo Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('vimeo'));
?>" name="<?php
			echo esc_attr($this->get_field_name('vimeo'));
?>" value="<?php
			echo esc_attr($vimeo);
?>" type="text">
			</p>

			<!-- digg field -->
			<p><label for="<?php
			echo $this->get_field_id('digg');
?>"><?php
			esc_html_e('Digg Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('digg'));
?>" name="<?php
			echo esc_attr($this->get_field_name('digg'));
?>" value="<?php
			echo esc_attr($digg);
?>" type="text">
			</p>


			<!-- github field -->
			<p><label for="<?php
			echo $this->get_field_id('github');
?>"><?php
			esc_html_e('Github Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('github'));
?>" name="<?php
			echo esc_attr($this->get_field_name('github'));
?>" value="<?php
			echo esc_attr($github);
?>" type="text">
			</p>

			<!-- vine field -->
			<p>
				<label for="<?php echo $this->get_field_id('vine'); ?>"><?php esc_html_e('Vine Profile Link / URL:', 'vlthemes'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('vine')); ?>" name="<?php echo esc_attr($this->get_field_name('vine')); ?>" value="<?php echo esc_attr($vine); ?>" type="text">
			</p>

			<!-- soundcloud field -->
			<p><label for="<?php
			echo $this->get_field_id('soundcloud');
?>"><?php
			esc_html_e('Soundcloud Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('soundcloud'));
?>" name="<?php
			echo esc_attr($this->get_field_name('soundcloud'));
?>" value="<?php
			echo esc_attr($soundcloud);
?>" type="text">
			</p>

			<!-- vk field -->
			<p><label for="<?php
			echo $this->get_field_id('vk');
?>"><?php
			esc_html_e('Vk Profile Link / URL:', 'vlthemes');
?></label>
			
				<input class="widefat" id="<?php
			echo esc_attr($this->get_field_id('vk'));
?>" name="<?php
			echo esc_attr($this->get_field_name('vk'));
?>" value="<?php
			echo esc_attr($vk);
?>" type="text">
			</p>
			<?php
		}
		function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['twitter'] = $new_instance['twitter'];
			$instance['facebook'] = $new_instance['facebook'];
			$instance['google_plus'] = $new_instance['google_plus'];
			$instance['linkedin'] = $new_instance['linkedin'];
			$instance['pinterest'] =$new_instance['pinterest'];
			$instance['instagram'] = $new_instance['instagram'];
			$instance['youtube'] = $new_instance['youtube'];
			$instance['flickr'] = $new_instance['flickr'];
			$instance['tumblr'] = $new_instance['tumblr'];
			$instance['deviantart'] = $new_instance['deviantart'];
			$instance['vine'] = $new_instance['vine'];
			$instance['skype'] = $new_instance['skype'];
			$instance['vimeo'] = $new_instance['vimeo'];
			$instance['digg'] = $new_instance['digg'];
			$instance['github'] = $new_instance['github'];
			$instance['soundcloud'] = $new_instance['soundcloud'];
			$instance['vine'] = $new_instance['vine'];
			$instance['vk'] = $new_instance['vk'];
			return $instance;
		}

	}
}
//register widget with hook


add_action('widgets_init', 'register_VLThemesSocialWidget');

if(!function_exists('register_VLThemesSocialWidget'))
{
	function register_VLThemesSocialWidget()
	{
		register_widget('VLThemesSocialWidget');
	}
}
