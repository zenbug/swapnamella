
<span class="vl-mobile-btn">
	<?php esc_html_e('Menu', 'paragon'); ?>
</span>


<div class="vl-sidebar-navigation">
	<nav>
		<?php
			wp_nav_menu(array(
				'theme_location' => 'primary-menu',
				'class' => '',
				'container' => false,
				'depth' => 3,
				'link_before' => '<span>',
				'link_after' => '</span>',
				'fallback_cb' => 'paragon_fallback_menu'
			));
		?>
	</nav>
</div>
