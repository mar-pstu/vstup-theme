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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'uh397748_kvpm' );

/** MySQL database username */
define( 'DB_USER', 'uh397748_kvpm' );

/** MySQL database password */
define( 'DB_PASSWORD', 'sLUCsm2U' );

/** MySQL hostname */
define( 'DB_HOST', '10.0.0.2' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '}FtFK5jk7|;AOevVs-w@#n50/;m.mo*?<|1%Gyn7i&`c/[yPRK A@a+$iH=)}Wd[' );
define( 'SECURE_AUTH_KEY',  'Y%eBq^KQzKw<j>3@0Vx-?x SJ_9I%7xp]?%-52~ieEx>.btAg,sE<G1k=uXz5lQO' );
define( 'LOGGED_IN_KEY',    '8-?r0?xc,b +c<N?oIO;iGYEdj}vypo7X|*?{jQ}2)>ZC*&.nXTqOXAq(m@h)9!c' );
define( 'NONCE_KEY',        'RBAXAh_N^q.,b06FDh0#$K,i]RUS*(`l6}*b~=Uo[V7CkdGLZ|:x_:/i-C.3dl4.' );
define( 'AUTH_SALT',        '6|r.gY lIjSNYU4x,8to9y,j/JMOW[|iW|5crE96sd*3l<b+_@Ziw`(%;E-7DdOo' );
define( 'SECURE_AUTH_SALT', '1Rt#JI4R;fD<An=^K?>l3[#!x*g[x[9/Fym:9Z?)[</z<7X$mvK]lTNJ#1O6SuMz' );
define( 'LOGGED_IN_SALT',   'WIT9yMv*0f/n_GvLiHRJkvLBFhNKyOdk-a +9:GkwX+T<>^j/q!$kOe`;X# bx(!' );
define( 'NONCE_SALT',       '#gUk/Zr0w;dIF57A@0L-Id%M6ig2zIIH!HTCN1MzJNWkb5*J|9y@*) #C=_aezz<' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'appm_';

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

define( 'WP_DEBUG', true );     // включение дебаг режима
define( 'WP_DEBUG_LOG', true ); // true - логирование ошибок в файл /wp-content/debug.log
define( 'WP_DEBUG_DISPLAY', false ); // false - отключает показ ошибок на экране

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
