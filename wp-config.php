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
define( 'DB_NAME', 'learningWordPress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'donna35drh' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '2X^XJvwJgsU-s+I%cD K$L?;$NLPIAgpN5WbAnn E*!Eat7QDZca|T$Eu|SC1+gu' );
define( 'SECURE_AUTH_KEY',  '.S.Kxm<66}heefg/a)YRjFx%?)%T&W6AnrGhC6#EPxTRP2thgR4&C:|wQCyw2L~A' );
define( 'LOGGED_IN_KEY',    'x`LqdzeMxV^]r3SFj-a^0smpdyA5!BZZAb+P><J:Z=&<~;}CQ)=V-New,Eff@3y@' );
define( 'NONCE_KEY',        'nQ8rkT3e<s+E?;T: <{Rm3LIdI{IrOM!*^d6|TaMXw=ZL:sICTw%7pG/0Im&(:f5' );
define( 'AUTH_SALT',        'DoQ!z&~(Qu3KBV<4+`B38Lue^7QJ+cRZ=/58l+nZ#&81>kyCK(:OBPJX4:_:6tX_' );
define( 'SECURE_AUTH_SALT', ' H[^cgmGfeP?jvq?e*7m-9+Wn#JSns4%U@6dPE4UzIhl|W3Q>%y&,`W]AMjGN,3n' );
define( 'LOGGED_IN_SALT',   'FVx+!jepe7f[5oF?s:|X{<)T2Y>rFLHoeU3H%87R_$>:zA1|zF)B|/CxC^X}_IxL' );
define( 'NONCE_SALT',       '+v-/vtwo#kGBbc]d$ai3VD1B`CQD:^];=l;Wt|4`Qcw(-NR[1{]$DnHw:oFzQ,;x' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
/*define( 'WP_DEBUG', false ); */
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
