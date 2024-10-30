<?php
/*
Plugin Name: Contact Form 24
Plugin URI: http://olestudio.net
Description: Bookmark on the contact form.
Author: olestudio.net
Version: 1.0
Author URI: http://olestudio.net
*/

/*  Copyright 2013  olestudio.net (email: olenstudio@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
	function cf_24_get_def_settings()
	
    {
	$cf_24_settings = array(
	'your_email' => 'your@mail.com',
	'tab_top_inset' => '80',
	'form_top_inset' => '140',
	'form_left_inset' => '30',
	'color_tab' => 'F5F5F5',
	'color_tex_tab' => '000000',
	'color_form' => 'F5F5F5',
	'color_input_from' => 'EEEEEE',
	'color_input_to' => 'FFFFFF',
	'color_tex_form' => '000000',
	'color_tex_submit' => 'FF0000');
	return $cf_24_settings;
    }
	
	
define('CF_PLUGIN_DIR', dirname(__FILE__));
define('CF_PLUGIN_URL', WP_PLUGIN_URL . '/' . basename(CF_PLUGIN_DIR));

class ContactFormAjax
{
	function __construct()
	{
		$this->add_actions();
		$this->add_scripts();
	}
	
	function add_actions()
	{
	        $this->def_settings = cf_24_get_def_settings();
			register_activation_hook(__FILE__, array($this, 'activate'));
		    register_deactivation_hook(__FILE__, array($this, 'deactivate'));
			add_action('admin_menu', array($this, 'add_menus'));	
	        add_action('init', array($this, 'handle_admin_request'));
			add_action('wp_enqueue_script', array($this, 'add_scripts'));
			add_action('wp_head', array($this, 'cf_head'));
			add_action('wp_footer', array($this, 'hook')); 
			

	}
	
	function add_scripts()
	{ 
            global $pagenow, $typenow;
		    $plugin_page = $_GET['page'];
		
	    if (!is_admin()):

            wp_enqueue_script( 'jquery' );
		    wp_enqueue_script('cf_js_1', CF_PLUGIN_URL . '/js/jquery.validationEngine-en.js');
		    wp_enqueue_script('cf_js_2', CF_PLUGIN_URL . '/js/jquery.validationEngine.js');	
		    wp_enqueue_style('cf_css_1', CF_PLUGIN_URL . '/css/validationEngine.jquery.css');
		
	    endif;
        if( is_admin() && ($plugin_page == 'contact_form_24')):
	    	
		    wp_enqueue_script('rotator_setting_js', CF_PLUGIN_URL . '/js/jscolor/jscolor.js');
		
		endif;			
	}
	
	function add_menus()
	{
		    add_menu_page(__('Contact Form 24'), __('Contact Form 24'), 8, 'contact_form_24', 
		                    create_function('', 'require_once CF_PLUGIN_DIR . "/html/settings.php";'));

	}
	
	function hook()
	{
	    require_once CF_PLUGIN_DIR . '/html/form.php';
	}

	function cf_head() // CF_PLUGIN_URL for JS
	{
		print '<script type="text/javascript">
			var cf_url = "'.CF_PLUGIN_URL.'";
			</script>';
			
	}

	function activate()
	{	
		$this->def_settings = cf_24_get_def_settings();
		//store default settings
		add_option('cf_24_settings', $this->def_settings);

	}
	function deactivate()
	{
		global $wpdb;

		delete_option('cf_24_settings');
		
	}
	
	function save_cf_24_settings()
	{
		$ops = array();
		foreach($_POST['settings'] as $key => $value)
		{
			$ops[$key] = trim($value);
		}
		update_option('cf_24_settings', $ops);
    }
	
	function handle_admin_request()
	{
		$task = isset($_REQUEST['task']) ? $_REQUEST['task'] : null;
		if($task == null) return false;
		if( method_exists($this, $task) )
			$this->$task();		
	}		
	

	
}

$grtr = new ContactFormAjax();


?>