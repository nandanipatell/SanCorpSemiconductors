<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package techex
 */

get_header();
global $techexObj;
$techex = get_option('techex');
$use_custom_layout = get_post_meta(get_the_ID(), 'use_custom_page_layout', true);
$custom_page_layout = get_post_meta(get_the_ID(), 'select_custom_layout', true);
$prev_icon = '<svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.3724 0.367357C10.2563 0.250948 10.1184 0.158591 9.96653 0.0955751C9.81467 0.032559 9.65186 0.00012207 9.48744 0.00012207C9.32303 0.00012207 9.16022 0.032559 9.00836 0.0955751C8.8565 0.158591 8.71856 0.250948 8.60244 0.367357L0.292444 8.67736C0.199741 8.76987 0.126193 8.87976 0.0760117 9.00073C0.0258302 9.12171 0 9.25139 0 9.38236C0 9.51332 0.0258302 9.64301 0.0760117 9.76398C0.126193 9.88495 0.199741 9.99484 0.292444 10.0874L8.60244 18.3974C9.09244 18.8874 9.88245 18.8874 10.3724 18.3974C10.8624 17.9074 10.8624 17.1174 10.3724 16.6274L3.13244 9.37736L10.3824 2.12736C10.8624 1.64736 10.8624 0.847357 10.3724 0.367357Z" fill="black"/>
</svg>';
$next_icon = '<svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.36876 18.3976C0.85876 18.8876 1.64876 18.8876 2.13876 18.3976L10.4488 10.0876C10.5415 9.99511 10.615 9.88522 10.6652 9.76425C10.7154 9.64327 10.7412 9.51359 10.7412 9.38262C10.7412 9.25165 10.7154 9.12197 10.6652 9.001C10.615 8.88002 10.5415 8.77014 10.4488 8.67762L2.13876 0.367622C1.64876 -0.122378 0.85876 -0.122378 0.36876 0.367622C-0.12124 0.857622 -0.12124 1.64762 0.36876 2.13762L7.60876 9.38762L0.35876 16.6376C-0.12124 17.1176 -0.12124 17.9176 0.36876 18.3976Z" fill="black"/>
</svg>
';
$layout = '';
if (!empty($custom_page_layout && $use_custom_layout)) {
	$layout = $custom_page_layout;
} elseif (isset($techex['single_page_layout'])) {
	$layout = $techex['single_page_layout'];
} else {
	$layout = 'right-sidebar';
}


while (have_posts()) : the_post();
?>
	<?php echo esc_html($techexObj->techex_breadcrumb_bridge()); ?>
	<div class="content-block post-details-page">
		<div class="container">
			<div class="row justify-content-center">

				<?php if ('left-sidebar' == $layout &&  is_active_sidebar('techex_blog_sidebar')) : ?>
					<div class="col-xl-4 col-lg-5 col-md-10 left-sidebar"><?php get_sidebar('techex_blog_sidebar'); ?></div>

				<?php endif; ?>
				<div class="col-xl-8 col-lg-7 col-md-12">
					<main id="primary" class="site-main">

						<?php
						get_template_part('template-parts/single/post');

						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous post:', 'techex') . '</span> <span class="nav-title">' . $prev_icon . ' %title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__('Next post:', 'techex') . '</span> <span class="nav-title">%title ' . $next_icon . '</span>',
							)
						);

						?>

						<div class="comment-form-main-wrapper">
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<?php
										// If comments are open or we have at least one comment, load up the comment template.
										if (comments_open() || get_comments_number()) :
											comments_template();
										endif;
										?>
									</div>
								</div>
							</div>
						</div>

					</main><!-- #main -->

				</div>
				<?php if ('right-sidebar' == $layout && is_active_sidebar('techex_blog_sidebar')) : ?>
					<div class="col-xl-4 col-lg-5 col-md-10 blog-details-sidebar right-sidebar order-lg-1 order-0"><?php get_sidebar(); ?></div>
				<?php endif; ?>
			</div>

		</div>
	</div>



<?php
endwhile; // End of the loop.

get_footer();
