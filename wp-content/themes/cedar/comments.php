<?php

	/**
	 * COMMENTS TEMPLATE
	 */

	if('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die('Please do not load this page directly.');

	if(post_password_required()){
		return;
	}

?>

	<?php if(comments_open() != false): ?>

	<section class="comments">

		<section id="comments" class="commentheader">
			<div class="wrapper">
				<i class="fa fa-comments-o"></i>
				<span class="commenttitle"><?php esc_html_e('Comments', 'cedar'); ?></span>
				<span class="commentcount"><?php comments_number('0', '1', '%'); ?></span>
			</div>
		</section>

		<section class="commentitems">
			<div class="wrapper">

			<?php if(have_comments()): ?>

					<ul class="commentwrap">
						<?php wp_list_comments('type=comment&callback=cedar_comment_format'); ?>
					</ul>

				<?php previous_comments_link() ?>
				<?php next_comments_link() ?>

			 <?php else : ?>
				<?php if(comments_open()): ?>
					<div class="notification"><i class="fa fa-info"></i> <?php esc_html_e('There are currently no comments.', 'cedar'); ?></div>
				<?php endif; ?>
			<?php endif; ?>

			<?php

				if(comments_open()){
					$args = array(
						'id_form' => 'commentform',
						'id_submit' => 'submit',
						'title_reply' => '',
						'title_reply_to' => '<div class="graybar"><i class="fa fa-comments-o"></i>' . esc_html__('Leave a Reply to', 'cedar') . ' %s' . '</div>',
						'cancel_reply_link' => esc_html__('Cancel Reply', 'cedar'),
						'label_submit' => esc_html__('Post Comment', 'cedar'),
						'comment_field' => '<textarea placeholder="' . esc_attr__('Add your comment here', 'cedar') . '..." name="comment" class="commentbody" id="comment" rows="5" tabindex="4"></textarea>',
						'comment_notes_after' => '',
						'comment_notes_before' => '',
						'fields' => apply_filters( 'comment_form_default_fields', array(
							'author' =>
								'<input type="text" placeholder="' . esc_attr__('Name', 'cedar') . ' ' . ($req ?  '(' . esc_attr__('Required', 'cedar') . ')' : '') . '" name="author" id="author" value="' . esc_attr($comment_author) . '" size="22" tabindex="1" ' . ($req ? "aria-required='true'" : '') . ' />',
							'email' =>
								'<input type="text" placeholder="' . esc_attr__('Email', 'cedar') . ' ' . ($req ? '(' . esc_attr__('Required', 'cedar') . ')' : '') . '" name="email" id="email" value="' . esc_attr($comment_author_email) . '" size="22" tabindex="1" ' . ($req ? "aria-required='true'" : '') . ' />',
							'url' =>
								'<input type="text" placeholder="' . esc_attr__('Website URL', 'cedar') . '" name="url" id="url" value="' . esc_attr($comment_author_url) . '" size="22" tabindex="1" />'
							)
						)
					);
					comment_form($args);
				}

			?>

			</div>
		</section>

	</section>

<?php endif; ?>
