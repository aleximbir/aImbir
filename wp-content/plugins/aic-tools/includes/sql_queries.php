<?php
function aic_sql_create_tables(){
  global $wpdb;
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

  global $charset_collate;
  $charset_collate = $wpdb->get_charset_collate();

  echo $sql = "
  CREATE TABLE IF NOT EXISTS {$wpdb->prefix}aic_post_types (
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(500) NOT NULL,
    singular_name varchar(500) NOT NULL,
    slug varchar(500) NOT NULL,
    date_made int(11) NOT NULL,
    PRIMARY KEY  (id)
  ) $charset_collate;
  CREATE TABLE IF NOT EXISTS {$wpdb->prefix}aic_taxonomies (
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(500) NOT NULL,
    singular_name varchar(500) NOT NULL,
    slug varchar(500) NOT NULL,
    date_made int(11) NOT NULL,
    post_type_id int(11) NOT NULL,
    PRIMARY KEY  (id)
  ) $charset_collate;
  CREATE TABLE IF NOT EXISTS {$wpdb->prefix}aic_widgets (
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(500) NOT NULL,
    slug varchar(500) NOT NULL,
    description varchar(500) NOT NULL,
    date_made int(11) NOT NULL,
    PRIMARY KEY  (id)
  ) $charset_collate;
  ";

  dbDelta( $sql );
}
