<?php

	/**
	 * COVER - BLOG TITLE
	 */

	if(!get_theme_mod('blogcover_disable', false)){

		$cover_logo = "";
		if(get_theme_mod('blogcover_logo', false)){
			$cover_logo = get_theme_mod('blogcover_logo');
		}elseif(get_theme_mod('general_blog_light_image', false)){
			$cover_logo = get_theme_mod('general_blog_light_image');
		}

?>

	<section class="cover front" data-height="65">
		<div class="background" style="background-image:url('<?php echo esc_url(cedar_get_blog_cover_background()); ?>');"></div>
		<div class="patternbg"></div>
		<?php get_template_part('layouts/header_bloginfo'); ?>
		<?php
			if((!get_theme_mod('blogcover_use_sticky_post', false) && !get_theme_mod('blogcover_use_first_post', false)) || is_paged() || !is_home()){
		?>
		<section class="blogtitle wrapper">
			<?php if($cover_logo != ""){ ?>
				<a href="<?php echo esc_url(home_url()); ?>" class="logo"><img src="<?php echo esc_url($cover_logo); ?>" class="retina" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
			<?php }else{ ?>
				<a href="<?php echo esc_url(home_url()); ?>"><h1 itemprop="headline"><?php esc_html(bloginfo('name')); ?></h1></a>
			<?php } ?>
			<p class="description" itemprop="description"><?php echo esc_html(get_theme_mod('general_blog_description')); ?></p>
			<hr>
		</section>
		<?php
			}else{
				get_template_part('layouts/cover_blogtitle_post');
			}
		?>
		<div class="mouse">
			<div class="scroll"></div>
		</div>
	</section>

<?php }else{ ?>

	<section class="headerspace"></section>

<?php } ?>
