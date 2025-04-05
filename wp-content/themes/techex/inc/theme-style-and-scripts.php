<?php

/**
 * Enqueue scripts and styles.
 */
function techex_scripts() {
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', get_theme_file_uri( '/assets/css/bootstrap-rtl.min.css' ), array(), '4.0' );
    }else{
        wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), array(), '4.0' );
    }
    wp_enqueue_style( 'techex-custom-fonts', get_theme_file_uri( '/assets/css/custom-fonts.css' ), array(), TECHEX_THEME_VERSION );
    wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/css/all.min.css' ), array(), '4.7.0' );
	wp_enqueue_style( 'select2', get_theme_file_uri( '/assets/css/select2.min.css'), array(), null);
    
    wp_enqueue_style( 'nice-select', get_theme_file_uri( '/assets/css/nice-select.min.css' ), array(), 'null' );
    wp_enqueue_style( 'techex-core', get_theme_file_uri( '/assets/css/core.css' ), array(), TECHEX_THEME_VERSION );
    wp_enqueue_style( 'techex-custom', get_theme_file_uri( '/assets/css/theme-style.css' ), array(), TECHEX_THEME_VERSION );
    wp_enqueue_style( 'techex-style', get_stylesheet_uri(), array(), TECHEX_THEME_VERSION );
    wp_enqueue_style( 'techex-responsive', get_theme_file_uri( '/assets/css/theme-responsive.css' ), array(), TECHEX_THEME_VERSION );

    wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script('select2', get_theme_file_uri( '/assets/js/select2.min.js'), array('jquery'), null, true);
    wp_enqueue_script( 'nice-select', get_theme_file_uri( '/assets/js/jquery.nice-select.min.js' ), array( 'jquery' ), null, true );
    wp_enqueue_script( 'waypoints', get_theme_file_uri( '/assets/js/waypoints.min.js' ), array( 'jquery' ), null, true );
    wp_enqueue_script( 'techex-main', get_theme_file_uri( '/assets/js/techex-main.js' ), array( 'jquery' ), TECHEX_THEME_VERSION, true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'techex_scripts' );

/**
 * Registers an editor stylesheet for the theme.
 */
function techex_theme_add_editor_styles() {
    add_editor_style( get_theme_file_uri( '/assets/css/editor-style.css' ) );
}
add_action( 'admin_init', 'techex_theme_add_editor_styles' );
