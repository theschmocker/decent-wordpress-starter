<?php
// ini_set( 'display_errors', 0 );
ini_set( 'display_errors', E_ALL );

require_once(__DIR__ . '/vendor/autoload.php');

// ===================================================
// Load database info and local development parameters
// ===================================================

define( 'DB_NAME', 'wordpress' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', '127.0.0.1' );

define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG', true );

define('AUTH_KEY',         ',7jxG`)ZYM/m1OB6G/&z)gL=oW={,B1-&xcGuySKE.vQh_-fI)j$y^222Hs8cR&W');
define('SECURE_AUTH_KEY',  '=3/+qt|eD2>(|nx@-p|vp&8T*n6;ZKZ1[91m`a^-PbV+wzbiK ,gyNe&iTpHI(+1');
define('LOGGED_IN_KEY',    'Wu5@R=lv&j!.~IMD_D;%gzG>NSYfNG-K B@6wd]cp2|jYCgHV;>dSe[. u|f@2V]');
define('NONCE_KEY',        '=d#!`FCws;6W-z%j%:Jh8@-~U|k[PoA8Lb+.r4yf_fi*1bJXMQm2bu{j@ObTNlSe');
define('AUTH_SALT',        '|~mjb|}FFR~b=jcF--;6.`KEO|wP>f&|+2s-#4]6QzY7o4#^y2&9mabHT..DR<O-');
define('SECURE_AUTH_SALT', '+YmVlzrBIw!kMkq(j3p&5+IU17>+ea[E9ZNdH-*k)(cCc74N^7CVd|ol(*^i]do!');
define('LOGGED_IN_SALT',   'rG9_QAj+~/q2UA*5Fk(Q](/NY&IG}[Z8&uf+Q{;YB/uA0Q.iFU:UW *OCN;|FUi1');
define('NONCE_SALT',       'uBW!%ut#F]]5Etl3MwAi|;9 82#qY9(x:])4BU*y{4BrSHk^hT&E6>m<`)zwsaIs');

// if ( file_exists( dirname( __FILE__ ) . '/../production-config.php' ) ) {
//     define( 'WP_LOCAL_DEV', false );
//     include( dirname( __FILE__ ) . '/../production-config.php' );
// } else {
//     define( 'WP_LOCAL_DEV', true );
//     include( dirname( __FILE__ ) . '/../local-config.php' );
// }

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_HOME', 'http://wordpress-starter.test' );
define( 'WP_SITEURL', 'http://wordpress-starter.test/wp' );
define( 'WP_CONTENT_URL', WP_HOME . '/wp-content' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );


// =========================
// Disable automatic updates
// =========================
define( 'AUTOMATIC_UPDATER_DISABLED', false );

// =======================
// Load WordPress Settings
// =======================
$table_prefix  = 'wp_';

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}
require_once( ABSPATH . 'wp-settings.php' );
