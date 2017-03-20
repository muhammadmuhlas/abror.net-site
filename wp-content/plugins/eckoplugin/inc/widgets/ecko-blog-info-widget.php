<?php 

	/*-----------------------------------------------------------------------------------*/
	/* BLOG INFO WIDGET
	/*-----------------------------------------------------------------------------------*/

	class ecko_widget_blog_info extends WP_Widget{

		function __construct(){
			parent::__construct(
				'ecko_widget_blog_info', 
				'Ecko Blog Info', 
				array('description' => 'Display blog logo and description.') 
			);
		}

		public function widget($args, $instance){
			$logo_image = "";
			if(!isset($instance['lightlogo'])){
				$logo_image = get_theme_mod('general_blog_image', '');
			}else{
				$logo_image = get_theme_mod('general_blog_light_image', '');
			}
			?>
				<section class="widget blog_info">
					<?php if($logo_image != ""){ ?>
					<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url($logo_image); ?>" class="retina" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
					<?php }else{ ?>
					<a href="<?php echo esc_url(home_url()); ?>"><h2><?php esc_html(bloginfo('name')); ?></h2></a>
					<?php } ?>
					<hr>
					<p><?php echo esc_html(get_theme_mod('general_blog_description')); ?></p>
				</section>
			<?php
		}

		public function form($instance){ 
			$defaults = array( 
				'lightlogo'	=> false
			);
			$instance = wp_parse_args((array) $instance, $defaults);
			?>
				<p>
					<label for="<?php echo $this->get_field_id('lightlogo'); ?>">Use Light Logo: </label> 
					<input id="<?php echo $this->get_field_id('lightlogo'); ?>" name="<?php echo $this->get_field_name('lightlogo'); ?>" type="checkbox" <?php checked($instance['lightlogo'], 'on'); ?> />
				</p>
			<?php 
		}
			
		public function update($new_instance, $old_instance){ 
			$instance = array();
			foreach($new_instance as $key => $value){
				$instance[$key] = (!empty($new_instance[$key])) ? strip_tags($new_instance[$key]) : '';
			}
			return $instance;
		}

	}

?>