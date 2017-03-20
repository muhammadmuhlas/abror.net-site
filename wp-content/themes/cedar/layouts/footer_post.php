<?php

	/**
	 * FOOTER - POST
	 */

?>

	<footer class="postinfo">
		<div class="default">
			<section class="socialoptions">
				<ul class="sharebuttons">
					<li><a href="http://twitter.com/share?text=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&amp;url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;" class="socialdark twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" class="socialdark facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;" class="socialdark google"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>" onclick="window.open(this.href, 'linkedin-share', 'width=490,height=530');return false;" class="socialdark linkedin"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;description=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>" onclick="window.open(this.href, 'pinterest-share', 'width=490,height=530');return false;" class="socialdark pinterest"><i class="fa fa-pinterest"></i></a></li>
					<li><a href="mailto:?body=<?php the_permalink(); ?>" class="socialdark email"><i class="fa fa-envelope"></i></a></li>
					<li><span class="socialdark closeshare"><i class="fa fa-times"></i></span></li>
				</ul>
			</section>
			<section class="authorinfo">
				<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="authorname"><img src="https://0.gravatar.com/avatar/<?php echo esc_attr(md5(get_the_author_meta('user_email'))); ?>?s=24" class="gravatar" alt="<?php the_author(); ?>"> <?php the_author(); ?></a><span class="authordate"><?php esc_html_e('Posted on', 'cedar'); ?> <?php echo esc_html(ecko_date_format()); ?></span>
			</section>
			<ul class="postoptions">
				<?php if(comments_open()){ ?><li class="showcomments"><i class="fa fa-comments-o"></i><?php esc_html_e('Comments', 'cedar'); ?></li><?php } ?>
				<li class="showsocial"><i class="fa fa-bookmark-o"></i><?php esc_html_e('Share', 'cedar'); ?></li>
			</ul>
		</div>
		<div class="relatedposts">
			<?php
				$previous_post = get_previous_post();
				if(!empty( $previous_post )){
					$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post->ID), 'thumbnail_small');
			?>
			<a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>" class="previouspost">
				<?php if(!empty($thumb_url[0])){ ?><img src="<?php echo esc_url($thumb_url[0]); ?>" alt="<?php echo esc_attr(get_the_title($previous_post->ID)); ?>"><?php } ?>
				<div class="info">
					<span><?php esc_html_e('Previous Post', 'cedar'); ?></span>
					<span class="title"><?php echo (strlen(get_the_title($previous_post->ID)) > 13) ? substr(get_the_title($previous_post->ID), 0, 30) . '...' : get_the_title($previous_post->ID); ?></span>
				</div>
			</a>
			<?php } ?>
			<span class="backtotop"><i class="fa fa-chevron-up"></i></span>
			<?php
				$next_post = get_next_post();
				if(!empty($next_post)){
					$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'thumbnail_small');
			?>
			<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="nextpost">
				<?php if(!empty($thumb_url[0])){ ?><img src="<?php echo esc_url($thumb_url[0]); ?>" alt="<?php echo esc_attr(get_the_title($next_post->ID)); ?>"><?php } ?>
				<div class="info">
					<span><?php esc_html_e('Next Post', 'cedar'); ?></span>
					<span class="title"><?php echo (strlen(get_the_title($next_post->ID)) > 13) ? substr(get_the_title($next_post->ID), 0, 30) . '...' : get_the_title($next_post->ID); ?></span>
				</div>
			</a>
			<?php } ?>
		</div>
	</footer>
