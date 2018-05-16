<?php

	$socials = get_theme_mod('sidebar_social_icons');
	
	if($socials) {
		foreach ($socials as $item) {
			echo '<a class="vl-social-icon" target="_blank" href="'.$item['sidebar_social_icons_link'].'"><i class="'.$item['sidebar_social_icons_icon'].'"></i></a>';
		}
	}