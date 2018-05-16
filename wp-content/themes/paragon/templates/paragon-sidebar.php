<?php
$general_fixed_sidebar = get_theme_mod('general_fixed_sidebar', false);
$general_fixed_sidebar_class = $general_fixed_sidebar ? ' vl-sidebar-sticky' : '';
?>

<aside class="vl-sidebar-wrapper <?php echo paragon_sanitize_class($general_fixed_sidebar_class); ?>">

    <?php if($general_fixed_sidebar) { echo '<div>'; } ?>

	<div class="vl-sidebar-inner">
		
		<header class="vl-sidebar-header">
			<?php get_template_part('templates/paragon-sidebar', 'logo'); ?>
			<?php get_template_part('templates/paragon-sidebar', 'menu'); ?>
		</header>



		<?php if(get_theme_mod('sidebar_social', true)): ?>

			<div class="vl-sidebar-social">

				<?php get_template_part('templates/paragon-sidebar', 'social'); ?>

			</div>

		<?php endif; ?>



		<div class="vl-sidebar-content">
			<?php get_template_part('templates/paragon-sidebar', 'content'); ?>
		</div>


		<footer class="vl-sidebar-footer">
			<?php get_template_part('templates/paragon-sidebar', 'footer'); ?>
		</footer>

	</div>

    <?php if($general_fixed_sidebar) { echo '</div>'; } ?>

</aside>