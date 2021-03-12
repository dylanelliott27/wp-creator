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
define( 'DB_NAME', 'testdb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3308' );

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
define( 'AUTH_KEY',         '*`l}EcNES-DDa?dP#L7!g*(4.bbG}/h{* P7VO7 Y9w9CtC/zQIQbzw)KN%rR^x.' );
define( 'SECURE_AUTH_KEY',  '}y}):JO:}pHqyQ0?mYYn@f_]LY4l]@0ILWZtUN)wVB]Nd~F_Ly)G,Y8[WaW+<~H?' );
define( 'LOGGED_IN_KEY',    '_}J ,iqm0N 5%V{e&H_9k/~+f*SybuDB-E.^x}8/V*ONW/AxM:9MVbgda Od?{C;' );
define( 'NONCE_KEY',        'Ne($NNWDV~;b.,?EnLP6EGH41#/9+=ltVYdc38EkHqfGMg!)MFJptOk9T39pJSeW' );
define( 'AUTH_SALT',        '{<J{YRX<[XH7C.UVZADvN;3*]S:(9RRa^^%c 7!3EMNeTP),_Fn,V4p`gM=,n1}B' );
define( 'SECURE_AUTH_SALT', '=D:hp?qt~k[*P2dLZ&4 50,~46iZ8+|9%8qJkb[PuMLgdY.)}Ez}aPM9I<VEFyH4' );
define( 'LOGGED_IN_SALT',   'PH2MI,gnbM71!nz5~%[v9VCVi_r?KSxk16PGm>zYm)q<4Wj(!/|}&wgyYqp5hVYk' );
define( 'NONCE_SALT',       '_n;XAi4`w )#D!IWV$IL(!ySc8(,n2;I(QK/snT-56k8;6T:[82pa5y7|pq2[&Fg' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
