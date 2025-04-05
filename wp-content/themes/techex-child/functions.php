<?php
	 add_action( 'wp_enqueue_scripts', 'techex_child_enqueue_styles' );
	 function techex_child_enqueue_styles() {
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 		  }
 ?>