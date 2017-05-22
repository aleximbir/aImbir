<?php

/* PRINT_R */
if (!function_exists('pre_print_r')) {
  function pre_print_r($val){
    $string = "<pre>";
    $string .= print_r($val);
    $string .= "</pre>";

    return $string;
  }
}

/* Get post type */
function get_aic_post_type($val, $criteria){
  global $wpdb;
  $query = 'SELECT * FROM '.$wpdb->prefix.'aic_post_types WHERE '.$criteria.' = '.$val;
  $get_query = $wpdb->get_results( $query );
  return $get_query[0]->slug;
}

/* Includes */
include(get_aic_plugin_directory().'templates/tpl_tools_settings.php');
include(get_aic_plugin_directory().'templates/tpl_post_type.php');
include(get_aic_plugin_directory().'templates/tpl_taxonomy.php');
include(get_aic_plugin_directory().'templates/tpl_widget.php');
include(get_aic_plugin_directory().'classes/post_type.php');
include(get_aic_plugin_directory().'classes/taxonomies.php');
include(get_aic_plugin_directory().'classes/widgets.php');

/* Init classes */
$post_type = new Post_Type();
$taxonomies = new Taxonomies();
$widgets = new Widgets();

?>
