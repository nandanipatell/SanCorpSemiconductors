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
define( 'DB_NAME', 'sancorpsemiconductors' );

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
define( 'AUTH_KEY',         'K:DcdF&|k+=!OHvv.d1gw&>7VL50N[!Shb@7T=)7aF#VKa4%O8EvlnJfb(z3>Qzj' );
define( 'SECURE_AUTH_KEY',  'P*n}+>,dj@4?My[@fur{3-ibX2}cGwi}VxfP%wdRo|RiB}rjzE9[qi{xQ{`t~/tB' );
define( 'LOGGED_IN_KEY',    'x #g:Z]KN3@03,yKu5DZ|I^7K7E]a3!On 9rUTjAt<|f1Md]3^15~I/ ,dj=3CG%' );
define( 'NONCE_KEY',        '(rb_UU~X6+CY!m(+lc`$N<[muv4XojlN@y3ds6wJOnil#1l!Efep^5 UT>m6dkR}' );
define( 'AUTH_SALT',        'KJJ_ZA:y^1s3b2_ (&Dego(@dT+k?Y{JgcS~dA&fjG;2:nLX}/w]3}acoVpTKK]3' );
define( 'SECURE_AUTH_SALT', 'p/=@pkgc47`%|!>q/9*oqAMkCc!]eo[o.E:@GHB ODQ/@<B=^M^&>yD,*kJyu.U]' );
define( 'LOGGED_IN_SALT',   'DEHZ2@`BYb.%kL|ZN}D7U`//AdOq w&[~Azw `+khTB+;sdB;`WjIW-4nlVRk8u)' );
define( 'NONCE_SALT',       'UjsvV}=T<gh#fSg76~d^AO(w8sm<X1(k^67]vMCaoXTcfpP!B9@?R8INvs8$_zd!' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
