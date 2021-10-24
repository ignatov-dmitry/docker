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
define( 'DB_NAME', 'test_db' );

/** MySQL database username */
define( 'DB_USER', 'dimon1392' );

/** MySQL database password */
define( 'DB_PASSWORD', 'rammstein' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',         ';x]>r5s:$IB0A>|l{*%eCMVt<l&M*jSN2K@9xUSM!z8q])pq/vZ45DyZ_z]s9P{4' );
define( 'SECURE_AUTH_KEY',  '<3J1aN!!gj}dN_,P^r+1io[l~X|/$^O)L[~vtjY=@xk0R>K*A({,8atQLb@!~1pf' );
define( 'LOGGED_IN_KEY',    ')Z[gC~#q$g+FH~ }9(giJn?R.wn.tQOrT$=Neix^;qEewvq*25R}}Z[{GO3SB7}H' );
define( 'NONCE_KEY',        'QRBY7&HP{yukie>R+OP&kA2TdNL5Y.v03e7x}0,gzXLvRs|SgUC/prSQ,DC*#!WP' );
define( 'AUTH_SALT',        'dOfd233;vUMk ?pso8Yo&/U;lo#}^:Y&cuJAkjLFwInEH13eQY9Od;Ff]LHh*&gM' );
define( 'SECURE_AUTH_SALT', 'git#zQhnjR `a;>nAE/FRI.]35n M-rGxV]-g!lE),*1 #]I|hSSX,vtBuS#]n`<' );
define( 'LOGGED_IN_SALT',   '@#/RZXk6l==;x$/]!R(q?paaC6<b9?wmX-D*EDzV(3ZXio d@{DiENt+</Py<,na' );
define( 'NONCE_SALT',       '_bx8H2AW<Le%%L6;E[/ZAg6UM0E0)8fSWB$)lZLNVi09;3H&5,(S-PKQ2kEGeuiQ' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
