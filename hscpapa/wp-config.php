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
define('AUTH_KEY',         'S][=-gnbQlD!bY]82coIJT&U5kUhC@H E^`~b;-K>D[X=6EABfI^/*@VsF2zyNw5');
define('SECURE_AUTH_KEY',  'mN,Ia=67<nWga!yw^;:0wGxRE#N|(4c+y7Jy^rl9$5*tN<$3SzB:?h_MV6,/JJoO');
define('LOGGED_IN_KEY',    'B 5??-3ZBL* WN2_v^~L42p^Q.#qZ9FU3IDQ+]}JJ_8ki=:btlqn5;m{rt;QM?G ');
define('NONCE_KEY',        'S*anVMF.f]nIM7uag/6;G$4aY|%4p|;m0|sbX@!UK}3~$OL@-,_~31/W|vsIw3R7');
define('AUTH_SALT',        'aKdmz^qi S|aXV En5f]G5#0okRIS ,:nMp%jTt?ni/XS7r3#uA-GcZaS7/OY{hq');
define('SECURE_AUTH_SALT', '6ZY|f`9zhpq$E?zmfa:5aQ/J.G<.zD*.*XqnS+:Vsh,}E|mgjYn7!(?1GQ*[_&;I');
define('LOGGED_IN_SALT',   '?$1QUZ:Z(p5zZwffwxrNu:`kKQ5Sxxbt;e@`.UFfH9cQ@dA.%FMu$3c2sIg^1lH7');
define('NONCE_SALT',       '.m`fdnX&W0XmFrD*!XL~N&zY*/cTJ!f&W;,X~B_oWwK?v14}6+F;yzvX^%a89d=+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
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


define('WP_HOME','http://ericadreisbach.com/hscpapa/');
define('WP_SITEURL','http://ericadreisbach.com/hscpapa/');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
