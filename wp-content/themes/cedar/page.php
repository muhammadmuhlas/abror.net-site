<?php

	/**
	 * PAGE TEMPLATE
	 */

	get_header();

?>

	<?php while(have_posts()) : the_post(); ?>

		<?php get_template_part('layouts/posttitle'); ?>

		<section class="postcontents wrapper" itemprop="mainContentOfPage">
			<?php the_content(); ?>
			<div class="post-numbers">
				<?php wp_link_pages(); ?>
			</div>
		</section>

		<?php get_template_part('layouts/postbottom'); ?>
		<?php get_template_part('layouts/authorinfo'); ?>

		<?php
			if(get_theme_mod('general_disqus_plugin_support', false)){
				get_template_part('layouts/disqus');
			}else{
				comments_template('', true);
			}
		?>

	<?php endwhile; ?>

<?php get_footer(); ?>
