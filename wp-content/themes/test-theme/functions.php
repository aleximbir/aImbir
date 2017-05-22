<?php

/* Add theme post thumbnails */
add_theme_support( 'post-thumbnails' );

/* Add menu to pages */
function register_my_menu() { register_nav_menu('header-menu',__( 'Test Menu' )); }
add_action( 'init', 'register_my_menu' );

/* Register scripts and styles */
function test_theme_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css');
    wp_enqueue_style('linear-stylesheet', get_template_directory_uri().'/assets/fonts/linearFont/style.css');
    wp_enqueue_style('material-design-iconic', get_template_directory_uri().'/assets/css/material-design-iconic-font.min.css');

    wp_enqueue_style('main-stylesheet', get_template_directory_uri().'/assets/css/main.css');

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.3.6', true );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.11.3', true );

    wp_enqueue_script( 'main-javascript', get_template_directory_uri().'/assets/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'test_theme_scripts' );

/* Includes */
include 'includes/first_run.php';

/* PRINT_R */
if (!function_exists('pre_print_r')) {
  function pre_print_r($val){
    $string = "<pre>";
    $string .= print_r($val);
    $string .= "</pre>";

    return $string;
  }
}

?>
