<?php 

	/*-----------------------------------------------------------------------------------*/
	/* ADVERTISEMENT WIDGET
	/*-----------------------------------------------------------------------------------*/

	class ecko_widget_advertisement extends WP_Widget{

		function __construct(){
			parent::__construct(
				'ecko_widget_advertisement', 
				'Ecko Advertisement', 
				array('description' => 'Embed AdSense / Advertisement of 300x250 size.') 
			);
		}

		public function widget($args, $instance){
			if($instance['adcode'] !== ''){
			?>
				<section class="widget advrt">
					<?php echo $instance['adcode']; ?>
				</section>
			<?php 
			}
		}
				
		public function form($instance){
			$defaults = array( 
				'adcode' => ''
			);
			$instance = wp_parse_args((array) $instance, $defaults);
			?>
				<p>
					<label for="<?php echo $this->get_field_id('adcode'); ?>">Advert Embed Code: </label> 
					<input class="widefat" id="<?php echo $this->get_field_id('adcode'); ?>" name="<?php echo $this->get_field_name('adcode'); ?>" type="text" value="<?php echo esc_attr($instance['adcode']); ?>" />
				</p>
			<?php
		}
			
		public function update($new_instance, $old_instance){
			$instance = array();
			foreach($new_instance as $key => $value){
				if($key == 'adcode'){ 
					$instance[$key] = (!empty($new_instance[$key])) ? $new_instance[$key] : ''; 
				}else{
					$instance[$key] = (empty($new_instance[$key])) ? strip_tags($new_instance[$key]) : '';
				}
			}
			return $instance;
		}

	}

?>