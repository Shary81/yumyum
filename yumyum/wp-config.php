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
define('DB_NAME', 'yumyum');

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
define('AUTH_KEY',         'pJy-X^2S!.SEirb~Zqf7rt/XV}t/f=9qralpiYeOYv3yH7(PeD_a}JIKt/E[`$_R');
define('SECURE_AUTH_KEY',  '?l0Q&UCxc{1+qDTR[FndrY43vj{-n~P@vN]_f]E2+*B/=Z!b!AtG]N7&vq6o}T}Z');
define('LOGGED_IN_KEY',    'qJlkl2]0b%&|qg/z#s1{seOLW6{XNP;Mh)+WYuX&VV~C7I%0j@Fa~d>H:e%an00^');
define('NONCE_KEY',        '`Kr~6ZP}]myt23TB5kr>wpv@B/.!,g-YuQIw]7<k;%cU.DeT/BpK,fZ_#&rIm4N2');
define('AUTH_SALT',        'dft$DJq>cFF!S*|HsM[MHXlw#(~a$C-[bj YVf,^G/]YdO5xi! : 2ODAAQ3{1tt');
define('SECURE_AUTH_SALT', 'zrxA+OY*TUJPyC9/B$;>bP%~KYT{-^)_$e+#t@/d/{23,c6xWZ#qNg+}^i,HY.*m');
define('LOGGED_IN_SALT',   'cbfI!@m6l_B8Q}k5vA^k!>|t%VMm[6ZiGxmSC),liTU[,>a`XlnX/{I}}|$ixas(');
define('NONCE_SALT',       '[Xlf0@`{guB!RK#ccb1)IIlLV>BN~C]<W]ei28t!kalEy]8v]5-_-_L7*!cpGjDV');

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
