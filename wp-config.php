<?php

if ( $_ENV['WP_ENV'] === 'production') {
  require_once( 'config.production.php' );
} else {
  require_once( 'config.local.php' );
}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );

// WP_HOME defined in environment config
define( 'WP_SITEURL', WP_HOME . '/wp' );
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
define( 'AUTOMATIC_UPDATER_DISABLED', true );

// =======================
// Load WordPress Settings
// =======================
$table_prefix  = 'wp_';

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}

require_once( 'vendor/autoload.php' );
require_once( ABSPATH . 'wp-settings.php' );
