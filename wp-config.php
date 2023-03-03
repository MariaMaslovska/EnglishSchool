<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'preinternship_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Njvz`=lq4(nuqIm$;__bz{b6NA])y|W$%=m}#GKK0jP`jGkBp)xIxMLv(NM<9G<(' );
define( 'SECURE_AUTH_KEY',  'mz]/|0u9_E@]&,T2K3{,?v+./0:e 3WBM6;_dH5<sR-on?o#_aj#qo>{W0CO2tg ' );
define( 'LOGGED_IN_KEY',    'gF7-V1.X]3_NmP *cS}?oJ=eJilB}NlKk!y[PoBzV0&t@i#i<,ai!DW5+$_rP#9m' );
define( 'NONCE_KEY',        'm5D6?VGCv=7wiBQY[H#X2,WepbU;Gt.:!,`/XvbCW3Z2;K$N&Hp,c(~ _QS V_l0' );
define( 'AUTH_SALT',        'r8=]t{wCuT}c.~GO2u}DC;)~S!8Pu_OiP$ HWl%nVLr|S._v&mRBgo8apjANt4sK' );
define( 'SECURE_AUTH_SALT', '$faj(Z3x|HK-{Ghg30o!OhNW@av9t> JTW~1!<;y|k:d:!C[h$+~OG1<p8kjNSkH' );
define( 'LOGGED_IN_SALT',   'Ky1p1DTfxNsAnFD9OoQl&:?oE(kMG$ycse>3*A`/%IxI}kqa@uW`|s*!!qwWB=a9' );
define( 'NONCE_SALT',       'o{/fZi0&(K<&-q?M$F865J>X+ckE%r9W0A-7_@FG!WBkU!=F=#S?}<?[cY;$Q%~F' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
