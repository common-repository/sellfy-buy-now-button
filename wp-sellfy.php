<?php
/*
 * Plugin Name: Sellfy 'Buy now' button
 * Plugin URI: http://wordpress.org/plugins/sellfy-buy-now-button/
 * Description: This plugin provide an easy way to add Sellfy's 'Buy button' to your wordpress blog. Use this shortcode in your posts, pages or even widgets.
 * Version: 1.1
 * Author: Sellfy.com
 * Author URI: https://sellfy.com/
 */

class SellfyBuyNowButtonLoader {
	
	/**
	 * Plugin initialization with registering all required Wordpress hooks
	 */
	static function Init() {
		add_filter( 'plugin_row_meta', array('SellfyBuyNowButtonLoader','RegisterPluginLinks'), 10, 2);	
		add_shortcode( 'sellfy-button', array('SellfyBuyNowButtonLoader', 'RegisterShortCode'));
		add_action('wp_footer', array('SellfyBuyNowButtonLoader', 'PrintScriptUrl'));
		add_action('admin_notices', array('SellfyBuyNowButtonLoader', 'RegisterAdminNotice'));
		add_action('admin_init', array('SellfyBuyNowButtonLoader', 'RegisterIgnoreNotice'));
	}
	
	/**
	 * Add support link to plugin page
	 */
	static function RegisterPluginLinks($links, $file) {
		$base = SellfyBuyNowButtonLoader::GetPluginName();
		if ($file == $base) {
			$links[] = '<a href="http://docs.sellfy.com/support/" target="_blank">Support</a>';
		}
		return $links;
	}
	
	/**
	 * Connect Sellfy's buy now button javascript code
	 */
	static function PrintScriptUrl() {
		echo "\n<script type=\"text/javascript\" src=\"https://sellfy.com/js/api_buttons.js\"></script>\n";
	}
	
	/**
	 * Adds new shortcode [sellfy-button]
	 */
	static function RegisterShortCode($atts) {
		extract(shortcode_atts(array(
			'key' => null,
			'type' => 'modal',
		), $atts));
		$content = '';
		$class = '';
		if($type==='new-window') {
			$class = 'in-new-page';  
		}
		if($key) {
			$content = "<a href=\"https://sellfy.com/p/{$key}/\" id=\"{$key}\" class=\"sellfy-buy-button {$class}\" target=\"_blank\">buy</a>";
		}
		return $content;
	}
	
	/**
	 * Show message about mandatory wp_footer() tag 
	 */
	static function RegisterAdminNotice() {
		global $current_user, $pagenow;
        $user_id = $current_user->ID;
		if (!get_user_meta($user_id, 'RegisterIgnoreNotice') && $pagenow == 'plugins.php') {
			echo '<div class="updated"><p>';
			printf(__('Most plugins rely on <a href="http://codex.wordpress.org/Function_Reference/wp_footer">wp_footer()</a> tag. Make sure, that your theme has one in footer.php | <a href="%1$s">Dismiss</a>'), '?ignore_admin_message=0');
			echo "</p></div>";
		}
	}
	
	/**
	 * Hide message about mandatory wp_footer() tag 
	 */
	static function RegisterIgnoreNotice() {
		global $current_user;
        $user_id = $current_user->ID;
        if (isset($_GET['ignore_admin_message']) && $_GET['ignore_admin_message'] == '0') {
             add_user_meta($user_id, 'RegisterIgnoreNotice', 'true', true);
		}
	}
	
	/**
	 * Returns the plugin basename of the plugin (using __FILE__)
	 */
	static function GetPluginName() {
		return plugin_basename(__FILE__);
	}
}

if(defined('ABSPATH') && defined('WPINC')) {
	add_action("init", array("SellfyBuyNowButtonLoader", "Init"), 1000, 0);
}

?>