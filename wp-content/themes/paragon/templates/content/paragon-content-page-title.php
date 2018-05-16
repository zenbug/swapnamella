<?php

global $post;

$page_title = '';
$page_subtitle = '';


if(is_home()){

	$page_title .= get_theme_mod('blog_title', esc_html__('Our Latest News', 'paragon'));
	$page_subtitle .= get_theme_mod('blog_subtitle');

}elseif(is_archive()){


	if (is_category()) {

		$page_title .= esc_html__('Categories Archives', 'paragon');
		$page_subtitle .= get_category(get_query_var('cat'))->name;

	} else if (is_author()) {

		$page_title .= esc_html__('Author Archives', 'paragon');
		$page_subtitle .= get_userdata(get_query_var('author'))->display_name;


	} else if (is_tag()) {

		$page_title .= esc_html__('Tags Archives', 'paragon');
		$page_subtitle .= single_tag_title('', false);

	} else if (is_day()) {

		$page_title .= esc_html__('Daily Archives', 'paragon');
		$page_subtitle .= get_the_date();

	} else if (is_month()) {

		$page_title .= esc_html__('Monthly Archives', 'paragon');
		$page_subtitle .= get_the_date('F Y');

	} else if (is_year()) {

		$page_title .= esc_html__('Yearly Archives', 'paragon');
		$page_subtitle .= get_the_date('Y');

	}
	
} elseif(is_search()){

	$page_title .= esc_html__('Search Results', 'paragon');
	$page_subtitle .= esc_html__('For the term ', 'paragon') . '"'.get_search_query().'"';

} else {

	if(class_exists('acf') && get_field('page_title', get_queried_object_id())){

		$page_title .= get_field('page_title', get_queried_object_id());

	}

	if(class_exists('acf') && get_field('page_subtitle', get_queried_object_id())){
		$page_subtitle .= get_field('page_subtitle', get_queried_object_id());
	}

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