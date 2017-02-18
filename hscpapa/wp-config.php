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
define('DB_NAME', 'hscpapadb');

/** MySQL database username */
define('DB_USER', 'ericaricardo');

/** MySQL database password */
define('DB_PASSWORD', 'Yqn6#-x!5/L87');

/** MySQL hostname */
define('DB_HOST', 'hscpapadb.db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '$dm5g7))Y39@A:*x~DARu,kgb@kHG>m?2|GBFGBt~!?J)89-X9jVw+&c+pIi_^b;');
define('SECURE_AUTH_KEY',  '2fpe>3}7uap|S,z?<&RzYX.w}ijcuyBcT.H~Y,0<j-bx )_TcX||s,RxJ)q|7_H9');
define('LOGGED_IN_KEY',    'bsLa> c/yo_7HFWqc)kH_k%)1JHL-{f{-%lG#6 x,&NV%f;<+r/s___:g,|Znw<L');
define('NONCE_KEY',        'rH9t_-BeixUD`od41y@)Tdff!ZW.i{OjM2-%!OMelP>Eb,!SOGUIP!,lU{3tweAy');
define('AUTH_SALT',        'F/-L%=T:8$Asp7>s[fS1O3X&yNQ=_9gy6,+)cNrTz)0=+>zV<OUr XOU[(t:Ed^$');
define('SECURE_AUTH_SALT', '5>ycoC3{&msyBkMIn&|RiW{+hnhSI1tMwNei6@D6E_R12c[St>gadgp`]{Lk4i ?');
define('LOGGED_IN_SALT',   'e]1#dcvTl!ZJfoOr9D5Z6e/Z?7vQZOGAT^FiCj>ODW% u;t+39N4dat&z.VG`|Oi');
define('NONCE_SALT',       'E_%=Dq+5Cj]^Lupoa5~vfH$tkY|4?+.1(#Az*V*}}&V`KWuWa,zFo4awihbD bDY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
define('WP_CACHE', true);
$table_prefix  = 'hsc_';

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
