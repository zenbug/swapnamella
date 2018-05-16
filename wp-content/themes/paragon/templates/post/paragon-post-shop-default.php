<?php


global $product, $post;


$link_url = get_permalink($post->ID);
$title = get_the_title($post->ID); 
$img_url = paragon_get_post_thumb($post->ID, 'paragon_small_square');
$img_tmb = '<img src="'.$img_url.'" alt="">';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('vl-product-post'); ?>>

	<div class="vl-product-post--wrapper">
		<div class="vl-product-post--image">
			<?php 
				echo woocommerce_show_product_sale_flash(); 
			?>

			<?php

				echo wp_kses($img_tmb, array(
					'img' => array(
						'src' => array(),
						'alt' => array(),
					)
				)); 

			?>
		</div>

		<div class="vl-product-post--info">
			
			<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>

			<?php echo paragon_post_title('<h3 class="vl-product--title clearfix">', '</h3>', false); ?>
			
			<div class="vl-product--info">
				<?php

					echo woocommerce_template_loop_price();


					echo apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( isset( $quantity ) ? $quantity : 1 ),
							esc_attr( $product->get_id() ),
							esc_attr( $product->get_sku() ),
							esc_attr( isset( $class ) ? $class : 'vl-product--add-to-card' ),
							esc_html( $product->add_to_cart_text() )
						),
					$product );


				?>
			</div>
			

		</div>

	</div>
</article>