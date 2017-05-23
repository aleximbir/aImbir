<?php
define('WP_USE_THEMES', true);
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

$post_type = new Post_Type();
$post_type->delete_post_type( $_POST['del_id'] );

echo "Successfully Deleted";
?>
