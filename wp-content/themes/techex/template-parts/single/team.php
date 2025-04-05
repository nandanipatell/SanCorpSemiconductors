<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package techex
 */
global $cs_styles;
$cs_styles = '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="techex-team-wrap">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="team-thumnbnail-wrap">
                            <?php techex_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="team-content">
                        <div class="techex-team-title">
                            <?php the_title('<h1>', '</h1>'); ?>
                            <?php if (!empty(get_field('position'))) : ?>
                                <span class="team-position"><?php the_field('position') ?></span>
                            <?php endif; ?>
                        </div>

                        <?php
                        the_content(
                            sprintf(
                                wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'techex'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                esc_html(get_the_title())
                            )
                        );
                        ?>
                        <?php
                        if (have_rows('social_links')) : ?>
                            <div class="team-social-links">
                                <?php while (have_rows('social_links')) : the_row(); ?>
                                    <a href="<?php echo get_sub_field('url') ?>" class="social-item"><?php echo get_sub_field('icon') ?></a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->