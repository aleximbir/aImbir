<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'Test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/vw4g4=qMv8a%e44:x{NB~*G5{KL/)s0I<PU>sdh4#9v-a^a{0kQ:%%VcDO/&_Y?');
define('SECURE_AUTH_KEY',  'r4}?;w~q{Buwx%GfC a:BbMjy1,k7-dYei6P:,1b}b o@5H0^%I^A].$D0f_eW2~');
define('LOGGED_IN_KEY',    'QI$(,VbTQh5!&(1,9(n(1J5DuA0g9w4]Ua!Yw#t3FyDl^kt_hOpIzkWL[Z-Qo%jT');
define('NONCE_KEY',        'GBQ<jGmO[Q IsqHs:.][ 7*M[_/r^uJWr{k86ujXQoCiyy;<&2!8E`@tK#UJC)kk');
define('AUTH_SALT',        '-c%DM6o%4xTi#nL%dS`;NDh3$I2`=?iQ_X33o}[62Af0XOZjng|h4kxbyYDweJl*');
define('SECURE_AUTH_SALT', '_-+$TgEhjdLIc6JiqEhH*0auNWC;Xn-I adEvvvvk)S3d^K~Njz2~Lmdht#%vjhB');
define('LOGGED_IN_SALT',   'ip]!gp_?G<AvA/rf%^bKe-X_/ekz,I uv<zo!>d}B8Oghw(Zcbk$S0#3}fZV7m1m');
define('NONCE_SALT',       '-lbpv[w?BkIu?V?K[q2yQ&(FJ9?]F]mKqn}Z-3rMbIM,~+$>PdZJ0<S0e]{zy;eJ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
