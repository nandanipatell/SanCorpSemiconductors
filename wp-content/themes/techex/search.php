<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package techex
 */

get_header();

global $techexObj;

echo esc_html($techexObj->techex_breadcrumb_bridge());

$techex = get_option('techex');
$grid = (isset($techex['blog_grid'])) ? $techex['blog_grid'] : 'one-column';

?>

<div class="content-block sp-80">
	<div class="container">
		<div class="row blog-content-row justify-content-center">

			<?php
			// If Redux Framework Active
			if (have_posts()) :

				if (class_exists('ReduxFrameworkPlugin')) :
					// var_dump($techex['blog_layout']);
					$techexObj->postMarkupGenerator($techex['blog_layout'], $grid);

				else : // If Redux Framework Is Not Active

					$techexObj->postMarkupGenerator(null, $grid);

				endif;
			else :

				get_template_part('template-parts/contents/content-none');
			endif;
			?>
		</div>
	</div>
</div>


<?php
get_footer();
