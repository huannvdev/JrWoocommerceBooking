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
define('DB_NAME', 'wp_dev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '<S$K%q;tY*2XHa(E-;K|T7DZz$js},N)uUy6xe2v~exu~w)xB<(08dC6Pp(f% GI');
define('SECURE_AUTH_KEY',  '~u@#p1c05a<`HtjZN }$;73}A%.BI)5t@gJvWS!5Z3[4()nXtRexT>GFnUx*mh!e');
define('LOGGED_IN_KEY',    'Xew#z0BO$`X>OBm6< sOJ/}CCX%VGBR8x8P2YdSm h,wBHLz;mcS1#b(4<v8*2jE');
define('NONCE_KEY',        'HkLJB_,$AxLUNb9tq18ub0Rl;&H06#;]v&q# JRk|MntV2?U3|M[5zGnv |+?)2G');
define('AUTH_SALT',        '@GQ1SV*)8IgCD*s5nqOK1j&]*XJuynA=;^eFA)&M{f*1%%jmtZ E]~LN7 ,S[gwa');
define('SECURE_AUTH_SALT', 'Z#j4wy1ZUqZ[GXk;7J!Mb@vfaL#8rbN@B7n+2UF?yyi+ikACmm1OdDoTl>ES|<0#');
define('LOGGED_IN_SALT',   's3~MCGn0,B%pc#*;Z]X%-cJ<%]~61]:<B5KPgc>u /~vA+Vh&@l3KG=V!IlbYxw6');
define('NONCE_SALT',       'A/H+[z~@W|-P] lLUS#7SVy;3Dv&W(})f_f_#sS`$[<2_=r=jjr!Z[hCAW^cOqtR');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
