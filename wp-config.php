<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'mxdb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         '$X[ptGOA!U>]%L:jl~5GK(9tj:)ZS5z9LCI$Re<%A!~zESJ5_Z:S}=(7iuG/.Dw@');
define('SECURE_AUTH_KEY',  '`O9aq=ertkS${dHYhlE#>6F?&+}v}C*B?X//WS60D~3pCe&6YPu+Ty)|TRxf,UEw');
define('LOGGED_IN_KEY',    '<_I%X9?KUg- 6&LU:<sA-U}iKG[uK&0,<v.JO%ISXs!Lzz2@w9v8S!=dw{=;W}b ');
define('NONCE_KEY',        'q7I5-N|4m2Z@ip/9=ZBD_OI?_w-1OgC+D+Ap;G~-B]1u)6]^$x~<5[,240N<3h~Q');
define('AUTH_SALT',        '|#:]|t5n~!F}cBJnk7QBv15!!uEDPe`!NG*(wH&aho|AD0tZ([1E1+#~cy=EsBDZ');
define('SECURE_AUTH_SALT', 'K-oisZg[S[Z]%!= s3z,G:8t)2$ywDU;7$2*X`GxLCtBf:ys3@vkC^mLL&j&0oz9');
define('LOGGED_IN_SALT',   'B*pukw24]i[@6^P*SBT]Y$zhqKjO&~StEgqMV|kd9G(ld1L9P0*@g_.vv$>5 @cm');
define('NONCE_SALT',       ',<Oq=~x#}R^0(BFk3=(KX[XnKFeld+B%ZZyA%K!^O&6GU70acz`Ib_y(1+Xsfq@N');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mx_';

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
 // Enable WP_DEBUG mode
define( 'WP_DEBUG', false );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings 
//define( 'WP_DEBUG_DISPLAY', false );
//@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', false );

define('FS_METHOD', 'direct');

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'macroexpert.local');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
