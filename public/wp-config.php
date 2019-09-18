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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'J2vd5JRuiUyFbYSMclUNGTviL96hevyYcs2zDWmgMkdFvPgn7CLE2E0KhacLFJXCnYs8HUbbSXv10517gFUenA==');
define('SECURE_AUTH_KEY',  'KuyZWghKH8JSjufu0Lw3GLSbJFXqoCrH1Bg3ipeHlnd0Vg+V1tlKA+JJAEHcWop1aN8pp0sAWthTO6ViIRNp8Q==');
define('LOGGED_IN_KEY',    '/O4u458HeO6CxnvFe7xGajLpR7VnmTyZRR03V3m77b8EkmX3gGXP6bEtCZoc0e32R8WOTd0FFPmUCSkqGirvtQ==');
define('NONCE_KEY',        'YFxgMl0VDN3XPR0ylukt6y7NHxz/kVwanOmX5zXoOCbE6MVAh6efI+JJh9G+bUpklfzVFPOiMhhx7De+POIC5g==');
define('AUTH_SALT',        'I3aM0JYWyO3EsYXTig6AXbcKvgg7ytPAUe+ZVUB1OUnld4YGI1fSkU/mRxwUmsGap6c7j93WYI5XsREGKY8gnA==');
define('SECURE_AUTH_SALT', 'pKX7FLuTPBDASSm038sRB2P5eMWUNj6KNwpq7vyUQDyiYJqfvd1HbaA9I9CgG2KcZUksJxc67R7vsSSot1oW/w==');
define('LOGGED_IN_SALT',   'RYA5e5QM6Y1BRjYTRJ/5RJ/l/PJirYVzIUpBdrVeGTxJiNL049DN8l4pooU19/pCMXTcJYMzDh5/0V3Nvj8ZDg==');
define('NONCE_SALT',       'VkhoKXH5nqEVul8G6/vmbRzXc1d0wWTIZSn2MsChNWiGrp36ec1rXbdaDsGExU9yO0hYlBA0vuPrHIYw+FkWKg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
