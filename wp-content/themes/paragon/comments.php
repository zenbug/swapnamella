<?php
	if ( post_password_required() ) {
?>
<div class="vl-alert vl-alert-warning">
	<p><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'paragon' ); ?></p>
</div>
<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>

<!-- Comments -->
<div class="vl-comments">

	<h3 class="vl-comments--number">
		<?php comments_number(esc_html__('No Comments', 'paragon'), esc_html__('One Comment', 'paragon'), esc_html__('% Comments', 'paragon')); ?>
	</h3>

	<?php if(get_comment_pages_count() > 1 && get_option('page_comments')): ?>
	<nav class="vl-comments-navigation">
		<ul>
			<li><?php previous_comments_link(); ?></li>
			<li><?php next_comments_link(); ?></li>
		</ul>
	</nav>
	<?php endif; ?>

	<ul class="vl-comments--list">
		<?php wp_list_comments( 'type=comment&callback=paragon_custom_comment' ); ?>
	</ul>

</div>
<!-- End Comments -->

<?php endif; ?>

<?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')): ?>

<div class="vl-comments">
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'paragon' ); ?></p>
</div>

<?php endif; ?>

<?php if (comments_open()): ?>

<?php
		$commenter = wp_get_current_commenter();

		$args = array(

			'id_form' => 'vl-comment-form',
			'label_submit' => esc_html__('Submit Comment', 'paragon'),
			'title_reply_to'    => esc_html__( 'Leave a Reply to', 'paragon' ) . ' %s',
			'cancel_reply_link' => '<i class="ion ion-close"></i> '.esc_html__( 'Cancel Reply', 'paragon' ),
			'submit_button' => '<button type="submit" id="%2$s" class="%3$s"><span class="vl-btn--text">%4$s</span></button>',
			'class_submit' => 'vl-btn vl-btn--primary vl-btn--sm vl-btn--rounded',
					'comment_field' => 
						'<textarea id="comment" name="comment" placeholder="' . esc_attr('Enter your comment...', 'paragon') . '"  rows="4"></textarea>',

			'fields' => apply_filters(
				'comment_form_default_fields',
				array(
					'author' =>
						'<div class="row">' .
						'<div class="col-sm-4">' .
						'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' .
						' placeholder="' . esc_attr__( 'Name', 'paragon' ) . '" />' .
						'</div>',

					'email' =>
						'<div class="col-sm-4">' .
						'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' .
						' placeholder="' . esc_attr__( 'E-mail', 'paragon' ) . '" />' .
						'</div>',

					'url' =>
						'<div class="col-sm-4">' .
						'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"' .
						' placeholder="' . esc_attr__( 'Website', 'paragon' )  . '" />' .
						'</div>' .
						'</div>'
					)
				),
			);
		?>

<div class="vl-comment-form" id="vl-comment-form">
	<?php
				//Use comment_form() with no parameters if you want the default form instead.
				comment_form( $args );
			?>
</div>

<?php endif;

//Omit closing PHP tag to avoid accidental whitespace output errors.