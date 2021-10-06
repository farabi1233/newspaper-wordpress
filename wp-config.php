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
define( 'DB_NAME', 'news-wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'T Q.>#T*g>_Acd>Q.){wrmfAvQ9C3n(:/V.Er/9,LjlW1S2Yq>a`Pk-;djp2X26m' );
define( 'SECURE_AUTH_KEY',  '?sq(p}laIsp/Ti<b~@;Q7V5g;HvA]j;QWK5j$`-uLR5Q*@mP0|{o=KB+T.Gh`vmF' );
define( 'LOGGED_IN_KEY',    '~u)BYo161BwMoie{kea?<2!,3O#iz~_g/Y:k>OJ]f+kJE#q-(Y9DSz@6H1t9Lm|-' );
define( 'NONCE_KEY',        'q1ovK;jc23Uq3_1F@f>13DFML.:ye%C3d@b>|k|i@bkj`?[0-E1JB0f]kD/;?pxG' );
define( 'AUTH_SALT',        '7[Ybe_]_~,ptEdW}E0/+R1.J|V*<rF)~gf&J^$N!}(li--HQI]MDJ>r:GP?{K)9r' );
define( 'SECURE_AUTH_SALT', 'cdL?}8ER3pGS>gv3ppPEFyADfIjqRAIfHbv7|K*8.xpLH8jM{y>~Bp+^X2$V~5 S' );
define( 'LOGGED_IN_SALT',   '?PG0nIc/AfLE2w b8sRMX *}}7[D&whV `8j*#*RuQ1+UBGc[GtF}H:9S={b2ntV' );
define( 'NONCE_SALT',       'kntebFyOkw~.#GZmPKm-=+LYjF-hU2.9Yk:2a9#`1b{ --uny8wCjm(pXemHO{8#' );

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
