<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package techex
 */
$idd = get_the_ID();
$service_cat = get_the_terms($idd, 'service-category');
if($service_cat){
    $service_cat = join(', ', wp_list_pluck($service_cat, 'name'));
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="techex-job-title text-center">
                    <?php the_title('<h1>', '</h1>'); ?>
                    <div class="techex-job-meta">
                        <?php if (!empty($service_cat)) : ?>
                            <span class="job-address"> <?php echo esc_html($service_cat); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="job-content entry-content">
                    <?php
                    // techex_post_thumbnail();
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
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'techex'),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
