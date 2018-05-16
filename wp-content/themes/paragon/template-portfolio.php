<?php

// Template Name: Portfolio Page

get_header();

?>

<?php if(class_exists('acf')): ?>


    <div class="container-fluid">
        <div class="row">


            <?php 

            if(have_posts()): while (have_posts()) : the_post(); 


                if (get_field('ptf_additional_content') == 'above') {
                    the_content();
                } 

                get_template_part('loop/loop-post', 'acf-portfolio');


                if (get_field('ptf_additional_content') == 'below') {
                    the_content();
                } 

            endwhile; endif;


            ?>

        </div>

    </div>



<?php endif; ?>

<?php get_footer(); ?>
