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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'user42' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '/ykb$v_:>.5F3,U) Hz?4BbTA=f|qoyhs!?CH+1+;N4JyOfF.IC*p:|6b5j*!9+5');
define('SECURE_AUTH_KEY',  'G${AoN7Q]nU[m2jEW9?vY{7F;jm%l;x.kJ-KvDSK#Kt.Qni,88}`*(]lTffn?uI.');
define('LOGGED_IN_KEY',    'Wzn;>:LLc;qGa^FKtS&<BL~/G+Q?ilqjna$d~s%:p^Oo|z612:q)/[|&UE>@|Ec@');
define('NONCE_KEY',        '^^,5eKxFr0%iP|I~&kTf9?O7SxC5I.W(~lCGysE@9|[#tuBR8_B{m/*TS2#p8:8@');
define('AUTH_SALT',        ' 8UJ#yOdgh5zb4FY|A+>B$Gg2>;;T,T)56OKs]l=-s/-*4}lgJ#AjjYK-/{|haR;');
define('SECURE_AUTH_SALT', '<dgJzuoHbo~mDy;@MQDWg>929{B`WcSbm(~9D)tvo-@ZeS[amZg&hPDBr.pzYJR2');
define('LOGGED_IN_SALT',   '|uJT.Hnk+m?@JqX/Qx6a!t~aeS~s4Zo$k{,s!,0|BzEIgNnJo70.rkk-03D?EY+1');
define('NONCE_SALT',       '-c6s+w~Kki>]f7Tjc.6|h+XR73Iu,Nyg&+{-79iXf5sKw?vg+}>OBk}UBg+QRzYJ');

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