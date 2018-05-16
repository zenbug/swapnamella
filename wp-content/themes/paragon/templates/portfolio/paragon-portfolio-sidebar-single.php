<?php


if(class_exists('acf') && have_rows('portfolio_about_project')): ?>

	<dl>

	<?php while(have_rows('portfolio_about_project')): the_row(); ?>

		<dt>
			<?php 
				if(get_sub_field('portfolio_about_project_title')){
					the_sub_field('portfolio_about_project_title');
				} 
			?>
		</dt>

		<dd>
			<?php 
				if(get_sub_field('portfolio_about_project_subtitle')){
					the_sub_field('portfolio_about_project_subtitle');
				} 
			?>
		</dd>


	<?php endwhile; ?>

	</dl>

<?php endif; ?>