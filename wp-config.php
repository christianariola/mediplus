<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mediplus' );

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
define( 'AUTH_KEY',         '<!x]7dh(RrGFXtDazLnZ77x:L%Yb1Yr$)[xZk^|]V&>!~TE*ri},;NesJG4e8-U6' );
define( 'SECURE_AUTH_KEY',  '2w0!.<MAis|@$mEB3FVN)s}]<N#Gjn<Wy;LTHMhXS,LtGgGff29(?oD,1#q;4e@G' );
define( 'LOGGED_IN_KEY',    '4 {Bxu<eeqP6F(EI?L<<G+8iw}OS5d^BZf,M<0;uO?7@QY:g$-#w-Dud,(6.;%[H' );
define( 'NONCE_KEY',        'Gr>isUtrO$dr!v1|/k;g[!rb|b#&K+w;`0awhA~mjK3xW.!d@HyF45U`t+p/{<h{' );
define( 'AUTH_SALT',        'ZnUv)_/v$GSpTG[q[_>kxg1kupLXI{m{fBa2uVLrz4V> OCnoUzwWG(!{_|%i8`)' );
define( 'SECURE_AUTH_SALT', 'Yx>>YL6`o=YkbQR]-@]=s!m*B%A@VlSN+} R609Jm/h%V`(10EsLPB,E7S6:553)' );
define( 'LOGGED_IN_SALT',   'D~./2=re#<NoY9 buO:(LMzt42/[irVi*BHYR;Pddj{?xI}72;BhN5Qi2G%Pbha2' );
define( 'NONCE_SALT',       'tQ-@SxyhH{P9~1QN0BgCTP6q^6xGVVwZ7/q:h!~9Z*KTFgu5 S``-(FWU)d=~(@%' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
