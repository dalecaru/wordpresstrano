<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/** Database Settings */
require( dirname ( dirname( __FILE__ ) ) . '/config/database.php' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
require( dirname ( dirname( __FILE__ ) ) . '/config/secrets.php' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Disable Automatic Updates */
 define( 'AUTOMATIC_UPDATER_DISABLED', true );

/** Disable Core Updates */
define( 'WP_AUTO_UPDATE_CORE', false );

/** Disable File Updates */
define( 'DISALLOW_FILE_MODS', true );

/** Set HTTPS on if running behind reverse proxy with SSL */
if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
  $_SERVER['HTTPS']='on';

/** Define WP urls and content dir */
$scheme   = (isset($_SERVER['HTTPS']) AND $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$host     = rtrim($_SERVER['HTTP_HOST'], '/');
$root_url = $scheme . $host;
define('WP_HOME', $root_url);
define('WP_SITEURL', $root_url . '/wp');
define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
define('WP_CONTENT_URL', $root_url . '/content');

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/wp');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
