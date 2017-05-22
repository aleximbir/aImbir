<?php
define('WP_USE_THEMES', true);
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

$post_type = new Post_Type();
$post_type->add_new_post_type($_POST['aic_post_type_name'], $_POST['aic_post_type_singular_name']);

echo "Successfully Added";
?>
