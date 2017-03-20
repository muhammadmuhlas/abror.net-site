<?php

	/**
	 * Plugin Name:			Ecko Plugin
	 * Plugin URI:			http://ecko.me
	 * Description:			Shortcodes and widgets for EckoThemes WordPress themes.
	 * Version:				2.7.0
	 * Author:				EckoThemes
	 * Author URI:			http://ecko.me/
	 * License:				GPL-2.0+
	 * License URI:			http://www.gnu.org/licenses/gpl-2.0.txt
	 * Text Domain:			eckoplugin
	 *
	 * @link              http://ecko.me
	 * @since             1.0.1
	 * @package           Ecko_Plugin
	 *
	 */


	if(!defined('WPINC')){
		die;
	}


	define('ECKO_PLUGIN_ID', 'eckoplugin');
	define('ECKO_PLUGIN_VERSION', '2.7.0');
	define('ECKO_PLUGIN_DIR', plugin_dir_path(__FILE__));
	define('ECKO_PLUGIN_URL', plugins_url('', __FILE__));


	$active_theme = wp_get_theme();

	if($active_theme->display('Author', FALSE) === "EckoThemes"){

		include(ECKO_PLUGIN_DIR . '/inc/ecko-shortcodes.php');
		include(ECKO_PLUGIN_DIR . '/inc/ecko-widgets.php');

		/**
		 * 	Enque plugin style-sheets and JavaScript assets
		 */
		function ecko_plugin_enque(){
			if(!is_admin()){
				/* CSS */
				wp_register_style('ecko_plugin_css', ECKO_PLUGIN_URL . '/assets/css/eckoplugin.css', ECKO_PLUGIN_VERSION);
				wp_enqueue_style('ecko_plugin_css');
				/* JAVASCRIPT */
				wp_register_script('ecko_plugin_js', ECKO_PLUGIN_URL . '/assets/js/eckoplugin.js', '', ECKO_PLUGIN_VERSION, true);
				wp_enqueue_script('ecko_plugin_js');
			}
		}
		add_action('wp_enqueue_scripts', 'ecko_plugin_enque');

	}


?>
