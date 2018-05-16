<?php

if(is_page_template('template-portfolio.php')){

	get_template_part('templates/portfolio/paragon-portfolio-sidebar', 'filter');

	get_template_part('templates/portfolio/paragon-portfolio-sidebar', 'sort');


	get_sidebar('portfolio');   


}elseif(is_singular('portfolio')){

	get_template_part('templates/portfolio/paragon-portfolio-sidebar', 'single');

}elseif(is_page_template('template-contact.php')){

	get_sidebar('contact');

}else{

	get_sidebar();

}