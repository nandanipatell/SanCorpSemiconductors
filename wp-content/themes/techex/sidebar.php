<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package techex
 */

if ( ! is_active_sidebar( 'techex_blog_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'techex_blog_sidebar'); 
		
	?>

</aside><!-- #secondary -->
