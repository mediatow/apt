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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'apt_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


define('WP_SITEURL', 'http://dev.aptitudehealth.net/');
define('WP_HOME', 'http://dev.aptitudehealth.net/');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '7-0EzbEZ_KLG9<|FNd+k+?^L{_v01=HPi><(-M/;FQQOv]o[ibM8ItfV:-rR>A9g');
define('SECURE_AUTH_KEY',  'gDOm-H/!OA=M`osn=A{r1uGI=mr]-3s7Ip~qtiDl$*&R?Wpz(0[]|>!%g-@EUle|');
define('LOGGED_IN_KEY',    'shs7sS3NK9SC>frduT<~Peunh)8R,`)OGXN%(1M-*/m{=3C!]Qy{#F-NadZ}JhYa');
define('NONCE_KEY',        '>SOwB1T`u.zbgM6<d4-]c{/j88>vs2_m=!EkE0C@s[}s>cB@l9h+ry8+iA%(:fZQ');
define('AUTH_SALT',        'm^t|VOOK]?@AY5dTSdFbO,3Y;?s(l-Oo]/Ipv@%vo`zYN|oRJ}*d6oVt;|<ELsk0');
define('SECURE_AUTH_SALT', '5#|L%zLq`J||it6LU!|:^qyl>pR4rC9|cU+K*@ugJ1aAL@VA`lgFvY`S]&Rk{Z} ');
define('LOGGED_IN_SALT',   'E6S`f%2zH0udKq)^dOpaLs&cY~|0Nvl .=Y&SHVQt%~cH!?q]Of@&N+@#amBsq1(');
define('NONCE_SALT',       'XX/AI5Hd`W1sy9b@ i|f[*o O{^bnbmDWZS|owrnwK+ 2u&vW|M4IK! rm-$B4V{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
