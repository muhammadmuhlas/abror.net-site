<?php

	/**
	 * 
	 * ECKO WIDGETS
	 * 
	 */

	function ecko_load_widgets(){
	
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-blog-info-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-share-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-social-author-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-social-blog-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-twitter-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-subscribe-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-author-profile-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-latest-posts-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-related-posts-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-navigation-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-advertisement-widget.php');
		include(ECKO_PLUGIN_DIR . '/inc/widgets/ecko-random-posts-widget.php');


		/*-----------------------------------------------------------------------------------*/
		/* LOAD CUSTOM WIDGETS
		/*-----------------------------------------------------------------------------------*/
	
		if(defined('ECKO_THEME')){
			if(defined('ECKO_WIDGET_BLOG_INFO') && ECKO_WIDGET_BLOG_INFO) register_widget('ecko_widget_blog_info');
			if(defined('ECKO_WIDGET_SHARE') && ECKO_WIDGET_SHARE) register_widget('ecko_widget_share');
			if(defined('ECKO_WIDGET_SUBSCRIBE') && ECKO_WIDGET_SUBSCRIBE) register_widget('ecko_widget_subscribe');
			if(defined('ECKO_WIDGET_TWITTER') && ECKO_WIDGET_TWITTER) register_widget('ecko_widget_twitter');
			if(defined('ECKO_WIDGET_SOCIAL_AUTHOR') && ECKO_WIDGET_SOCIAL_AUTHOR) register_widget('ecko_widget_social_author');
			if(defined('ECKO_WIDGET_SOCIAL_BLOG') && ECKO_WIDGET_SOCIAL_BLOG) register_widget('ecko_widget_social_blog');
			if(defined('ECKO_WIDGET_AUTHOR_PROFILE') && ECKO_WIDGET_AUTHOR_PROFILE) register_widget('ecko_widget_author_profile');
			if(defined('ECKO_WIDGET_LATEST_POSTS') && ECKO_WIDGET_LATEST_POSTS) register_widget('ecko_widget_latest_posts');
			if(defined('ECKO_WIDGET_RELATED_POSTS') && ECKO_WIDGET_RELATED_POSTS) register_widget('ecko_widget_related_posts');
			if(defined('ECKO_WIDGET_NAVIGATION') && ECKO_WIDGET_NAVIGATION) register_widget('ecko_widget_navigation');
			if(defined('ECKO_WIDGET_ADVERTISMENT') && ECKO_WIDGET_ADVERTISMENT) register_widget('ecko_widget_advertisement');
			if(defined('ECKO_WIDGET_RANDOM_POSTS') && ECKO_WIDGET_RANDOM_POSTS) register_widget('ecko_widget_random_posts');
		}

	}
	add_action('widgets_init', 'ecko_load_widgets');

?>
