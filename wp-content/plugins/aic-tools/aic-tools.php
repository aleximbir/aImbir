<?php
/*
	Plugin Name: AIC Tools
	Plugin URL: http://aleximbir.ro
	Description: Alex Imbir Tools System.
	Version: 1.0.0
	Author: Alex Imbir
	Author URI: http://aleximbir.ro
*/

/* INCLUDE STYLES AND SCRIPTS */
add_action('admin_enqueue_scripts', 'aic_tools_load_scripts');
add_action('wp_enqueue_scripts', 'aic_tools_load_scripts');
function aic_tools_load_scripts() {
	//Main
	wp_enqueue_script( 'main-scripts', plugins_url( 'assets/js/main.js', __FILE__ ), array() );
	wp_localize_script( 'main-scripts', 'main', array(
		'plugin_address' => get_aic_plugin_address(),
		'plugin_menu'    => get_aic_menu_url(),
		'ajax_url'       => admin_url('admin-ajax.php')
	));
	wp_enqueue_style( 'main-styles', plugins_url( 'assets/css/main.css', __FILE__ ), array() );

	// Bootstrap
	wp_enqueue_style('bootstrap', plugins_url( '/assets/css/bootstrap.min.css', __FILE__ ), array() );
	wp_enqueue_script( 'bootstrap', plugins_url( '/assets/js/bootstrap.min.js', __FILE__ ), array() );

	//Datadatbles
	wp_enqueue_style('datatables', plugins_url( '/assets/css/datatables.min.css', __FILE__ ), array() );
	wp_enqueue_script( 'datatables', plugins_url( '/assets/js/datatables.min.js', __FILE__ ), array() );
}

/* INCLUDES */
include( ABSPATH . 'wp-includes/pluggable.php' );
include( 'includes/functions.php' );
include( 'includes/sql_queries.php' );

/* GET PLUGIN SLUG */
function get_aic_plugin_slug() {
	return 'aic_tools';
}

/* GET MENU URL */
function get_aic_menu_url() {
	return menu_page_url( get_aic_plugin_slug(), false );
}

/* GET PLUGIN ADDRESS */
function get_aic_plugin_address(){
	return plugin_dir_url( __FILE__ );
}

/* GET PLUGIN DIRECTORY */
function get_aic_plugin_directory(){
	return plugin_dir_path( __FILE__ );
}

/* CREATE MENU */
function aic_register_menu_page() {
	$capability = 'manage_options';
	$menu_slug = 'aic_tools_menu';

	add_menu_page(__( 'AIC Tools' ), __( 'AIC Tools' ), $capability, $menu_slug, 'aic_tools_settings', '', 2);
}
add_action( 'admin_menu', 'aic_register_menu_page' );

/* PLUGIN ACTIVATION */
register_activation_hook( __FILE__, 'aic_sql_create_tables' );

?>
