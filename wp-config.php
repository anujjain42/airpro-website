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
define( 'DB_NAME', 'airpro' );

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
define( 'AUTH_KEY',         'T_S0>s-AI}GE3Wg>Me<[rc3q?V$#.3a^$&}.9Swmcfd%Qy]iB3zBJ@B&-x2M0{e:' );
define( 'SECURE_AUTH_KEY',  'c{O~Ug<Qc0WW#k~dJ/&f+;41y>!.]o{p?!F_5%.hg[9:wW@cLZEb^C#qPq+%E2|F' );
define( 'LOGGED_IN_KEY',    '*&P8$&c&{$3WQ)$W@FF+]uKy)^cf4`xsoE8_{fl40%f|hpI(v-<*hae.^^.aAUrg' );
define( 'NONCE_KEY',        'a-%II#}H.K.[L7w$Jr>{,G$H%0O5RhbLyV_L=de_)/B2JGG0!.1cJ?F2-3rwB}aP' );
define( 'AUTH_SALT',        ';CzvhGx@!!Co9^sDv&lh2es9`t0wt.9u>h,2ya:A>h7W1TPL4ubU.yJU+Ipt}_`H' );
define( 'SECURE_AUTH_SALT', '@c%x~4<}+BbsM0GZP{zC*i<+ :kXA #/IJW659ii]*6>HZ#)-FNFgtLmRA,=&u//' );
define( 'LOGGED_IN_SALT',   '9Q}`]@_5?.GMjQHo0mTe^z;.*i9%TOS6^FNV>6KIp[d-S3UIvM.JIhq12#r&>VSc' );
define( 'NONCE_SALT',       ']4oM7S8&!4I/.BBw7H~C_tVy#Jm!^&ZCTcg8V*03`Ig&Y1Es`,HUkm))$.;Y_1f^' );

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
