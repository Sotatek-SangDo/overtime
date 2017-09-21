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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'giaoduc');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1');

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
define('AUTH_KEY',         '=2yM];e/G5U).~eGnFbh:CdD* )Ex[pvWrg~~H$o~Tb}0DzR5;~,Vt:SC<<m^rQr');
define('SECURE_AUTH_KEY',  '0|nmY`}nip}%7pZAQie0%Ih333N<0SA2h/<F9P`RI+=n`i^&f@szU/=$;8j~s<B&');
define('LOGGED_IN_KEY',    't`/ywjh0YEu;meg6Nq{gZj{XU(U&qYC{K$1l0&g8~}gujW!/T( .=y5n.BfsM[uo');
define('NONCE_KEY',        ';2.wzQ0s{lEKauUL,66uIUEe~:K^vA_bK9b50|We=+^V.B4|u4)aq/;M_X|?B4Xt');
define('AUTH_SALT',        '!p_.Rg6eZ*5s4ly&q?mfZJ36 m?h&cPi^1+}FRn.x=>)g~5ELApHUYqUAY_]A%m_');
define('SECURE_AUTH_SALT', ':=IZ$$/Xv&!4LflEsCHNKwamX@&R#hw1h${*YCk{863r`ucohTFL``R2M=pKr_R8');
define('LOGGED_IN_SALT',   ',T[02xjbOXoBAgJEey;m^iPNSE|;m&yzD8kmsH3__CmL3+Mp;@<|x7pE5+oe ?0J');
define('NONCE_SALT',       'VSIEA+t12GNXU_ofzNawle{hBFKd)jF~4)W[%JG5xON P&V.*po]SI7*XF~xXJfq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'edu_';

define('FS_METHOD', 'direct'); // install plugin
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
