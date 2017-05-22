<?php
global $pagenow;

if ((is_admin() && 'themes.php' == $pagenow && isset($_GET['activated']))
    || (is_admin() && 'admin.php' == $pagenow && isset($_GET['dbupdate']))) {

    include 'first_run_sql.php';

    update_option( 'aic_first_run_update', 'done' );
    add_action( 'admin_notices', 'aic_database_updated_notice' );

}

function aic_database_updated_notice() {
    ?>
    <div class="updated notice is-dismissible">
        <p><?php _e('Database was successfully updated!', 'aimbir'); ?></p>
    </div>
    <?php
}
?>
