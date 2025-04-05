<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// theme version
if(! defined('TECHEX_THEME_VERSION') ){
    define('TECHEX_THEME_VERSION', wp_get_theme()->get('Version'));
} 

// Define the DHRUBOK Folder
if( ! defined( 'TECHEX_DIR' ) ) {
	define('TECHEX_DIR', get_template_directory() );
}

// Define the DHRUBOK Partials Folder
if( ! defined( 'TECHEX_PARTIALS_DIR' ) ) {
	define('TECHEX_PARTIALS_DIR', trailingslashit( TECHEX_DIR ) . 'partials' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'TECHEX_ASSETS_DIR' ) ) {
	define('TECHEX_ASSETS_DIR', trailingslashit( TECHEX_DIR ) . 'assets' );
}


// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'TECHEX_INC_DIR' ) ) {
	define('TECHEX_INC_DIR', trailingslashit( TECHEX_DIR ) . 'inc' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'TECHEX_FRAMEWORK_DIR' ) ) {
	define('TECHEX_FRAMEWORK_DIR', trailingslashit( TECHEX_INC_DIR ) . 'framework' );
}

// Define the Libs Folder of the DHRUBOK Directory
if( ! defined( 'TECHEX_LIBS_DIR' ) ) {
	define('TECHEX_LIBS_DIR', trailingslashit( TECHEX_DIR ) . 'libs' );
}

// Define the Shortcodes Folder of the DHRUBOK Directory
if( ! defined( 'TECHEX_SHORTCODES_DIR' ) ) {
	define('TECHEX_SHORTCODES_DIR', trailingslashit( TECHEX_INC_DIR ) . 'shortcodes' );
}

// Define the Classes Folder of the DHRUBOK Directory
if( ! defined( 'TECHEX_CLASSES_DIR' ) ) {
	define('TECHEX_CLASSES_DIR', trailingslashit( TECHEX_INC_DIR ) . 'classes' );
}

// Define the Widgets Folder of the DHRUBOK Directory
if( ! defined( 'TECHEX_WIDGETS_DIR' ) ) {
	define('TECHEX_WIDGETS_DIR', trailingslashit( TECHEX_INC_DIR ) . 'widgets' );
}


// Define the PLUGINS Folder of the DHRUBOK Directory
if( ! defined( 'TECHEX_INC_PLUGINS_DIR' ) ) {
	define('TECHEX_INC_PLUGINS_DIR', trailingslashit( TECHEX_INC_DIR ) . 'plugins' );
}
