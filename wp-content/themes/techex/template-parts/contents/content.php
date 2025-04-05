<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package techex
 */

global $techexObj;
$techex        = get_option('techex');
$show_excerpt = isset($techex['show_excerpt']) ? $techex['show_excerpt'] : false;
$grid         = (isset($techex['blog_grid'])) ? $techex['blog_grid'] : 'one-column';
switch ($grid) {

	case 'one-column':
		$limit = 30;
		$title = get_the_title();
		break;

	case 'two-column':
		$limit = 17;
		$title = wp_trim_words(get_the_title(), 11, '...');
		break;

	default:
		$limit = 17;
		$title = wp_trim_words(get_the_title(), 11, '...');
		break;
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-post-item <?php echo esc_attr($grid)  ?>">
		<div class="post-thumbnail-wrapper">
			<?php
			if (is_sticky()) {
				echo '<span class="sticky-text" >' . esc_html__('Sticky', 'techex') . '</span>';
			}
			?>
			<?php techex_post_thumbnail(); ?>

		</div>
		<div class="post-content">
			<?php
			echo '<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">';
			echo esc_html($title);
			echo '</a></h2>';
			?>
			<div class="post-meta top">
				<div class="comment-meta">
					<?php comments_popup_link('No Comment ', '1 Comment ', '% Comments '); ?>
				</div>
				<div class="post-date">
					<?php techex_posted_on() ?>
				</div>

			</div>

			<?php if ($show_excerpt) {
				echo '<p>' . esc_html($techexObj->postExcerpt($limit, get_the_excerpt())) . '</p>';
			} ?>

			<div class="post-single-item-bottom-area">
				<div class="blog-author-meta">
					<div class="author-thumbnail">
						<?php
						$user = wp_get_current_user();

						if ($user) :
						?>
							<img src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" />
						<?php endif; ?>
					</div>
					<div class="blog-author-name">
						<h5>by <?php echo get_the_author(); ?></h5>

					</div>
				</div>
				<div class="post-read-more">
				<a href="<?php echo esc_url(get_permalink()); ?>">
					<?php echo (isset($techex['continue_reading_title'])) ? $techex['continue_reading_title'] : esc_html__('Read More', 'techex') ?>

				</a>
			</div>
			</div>


		</div>
	</div>

</div><!-- #post-<?php the_ID(); ?> -->