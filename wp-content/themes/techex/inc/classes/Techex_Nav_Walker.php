<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if(!class_exists('Techex_Nav_Walker')){

	class Techex_Nav_Walker extends Walker_Nav_Menu {
		function start_lvl(&$output, $depth = 0, $args = NULL) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"sub-menu dropdown-submenu\">\n";
		  }
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . ' nav-item"';

			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';

			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

			$item_output = $args->before;
			if( in_array('menu-item-has-children', $item->classes ) ) {
				$item_output .= '<a'. $attributes .' class="dropdown-item">';
			} else {
				$item_output .= '<a'. $attributes .' class="nav-link">';
			}
			$item_output .= $args->link_before . do_shortcode(  apply_filters( 'the_title', $item->title, $item->ID )) . $args->link_after;
			$item_output .= '<span class="sub">' . do_shortcode( $item->description ) . '</span>';
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}




	}
}
