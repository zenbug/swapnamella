<?php


$page_title = '';
$page_subtitle = '';


if(class_exists('WooCommerce') && is_shop()){

	$page_title .= get_theme_mod('shop_title');
	$page_subtitle .= get_theme_mod('shop_subtitle');

}


?>


<?php if(!empty($page_title) || !empty($page_subtitle)): ?>


<div class="vl-page-header">
	<div class="row">
		<div class="col-md-8">
			<div class="vl-page-header--inner">
				<?php if(!empty($page_title)): ?>
					<h1 class="vl-page-header--title"><?php echo esc_html($page_title); ?></h1>
				<?php endif; ?>

				<?php if(!empty($page_subtitle)): ?>
					<p class="vl-page-header--subtitle"><?php echo esc_html($page_subtitle); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>