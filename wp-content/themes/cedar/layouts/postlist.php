<?php

	/**
	 * POSTLIST
	 */

	$post_count = 0;

?>

	<?php if(have_posts()): ?>

		<section class="postlist">
			<?php while(have_posts()) : the_post(); ?>

				<?php

					// POST LIST ADVERTS
					if(get_theme_mod('adverts_enable', false)
						&& $wp_query->current_post != 0
						&& ($post_count % get_theme_mod('adverts_occurance_rate', 4)) == 0){
						get_template_part('layouts/postlist-advert');
					}

					$post_format = (get_post_format() === false) ? "standard" : get_post_format();

					switch($post_format){
						case "standard":
							include(locate_template('postformat/standard.php'));
							break;
						case "status":
							include(locate_template('postformat/status.php'));
							break;
						case "aside":
							include(locate_template('postformat/status.php'));
							break;
						case "quote":
							include(locate_template('postformat/quote.php'));
							break;
						case "video":
							include(locate_template('postformat/video.php'));
							break;
						case "audio":
							include(locate_template('postformat/video.php'));
							break;
						case "image":
							include(locate_template('postformat/image.php'));
							break;
						case "gallery":
							include(locate_template('postformat/gallery.php'));
							break;
						case "link":
							include(locate_template('postformat/link.php'));
							break;
						default:
							include(locate_template('postformat/standard.php'));
							break;
					}

					$post_count++;

				 ?>

			<?php endwhile; ?>
		</section>

		<?php get_template_part('layouts/pagination'); ?>

	<?php else : ?>

		<?php get_template_part('no-results'); ?>

	<?php endif; ?>
