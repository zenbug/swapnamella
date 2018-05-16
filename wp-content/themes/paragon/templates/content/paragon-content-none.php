<div class="col-md-6">


	<div class="vl-empty-content">

		<?php if (is_home() && current_user_can('publish_posts')) : ?>

			<p><?php printf(wp_kses(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'paragon'), array('a' => array('href' => array()))), esc_url(admin_url('post-new.php'))); ?></p>

		<?php elseif (is_search()) : ?>

			<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'paragon'); ?></p>


		<?php else : ?>

			<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'paragon'); ?></p>

			<div class="vl-empty-content--input">
				<?php get_search_form(); ?>
			</div>

		<?php endif; ?>

	</div>

	
</div>
