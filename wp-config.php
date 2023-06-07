<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wow_bd');

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
define('AUTH_KEY',         '(w-L8>)l2Esaep4DA|W#;4AO?`#V58JxS7QfVn=^3f:f=7XD-J~j<RC/i<O[m<7/');
define('SECURE_AUTH_KEY',  'Mw.MI&FMW|-oID_rMKa;wR3S23Q-,R`T=B){GuP<5B2SFg&cx}c}3tzP9X)G89uI');
define('LOGGED_IN_KEY',    '6M]-Ez@JGeGE0rZ4<J:IG.dEol!0e`PlE,LWTjV$c/,{DEHsd=/=&u?2yPTsDK{I');
define('NONCE_KEY',        'Z2o4d[4f4hOlmRTlq%u5NvJk0Ub(0wj81G:^wjsPqe1Q+ B$gO(I@EM],w+<>D=y');
define('AUTH_SALT',        '!yFoGBrV=M *CDe`gg(D:<IM=]y~;LW{<~Aaw[tm4&c7Vsq8WcGXE]<zzag3q^~ ');
define('SECURE_AUTH_SALT', 'Y7Le*flh3AFApA%c:|E{1nL.$[zp;}_h*C@ nz4nTgd*D9YSS-6_A>](QfO[mQ>b');
define('LOGGED_IN_SALT',   '{4M.irOE5*y4PN22eGHD|^*c1.6vx<5W#J3nmqDUzRIQgVE~DF2I+B829)nxBf]J');
define('NONCE_SALT',       '&GYaS}De~A. /JP+(lBX]Uk1D(JE& 91c|ly5rM@qMJ%QEd>sT`_Dq_{1)(%L-s!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cu_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
