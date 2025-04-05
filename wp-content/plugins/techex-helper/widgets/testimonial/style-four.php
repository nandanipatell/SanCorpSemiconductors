<?php

use Elementor\Icons_Manager;
?>

<div class="techex--tn-single <?php echo esc_attr($testimonial_style); ?>">



    <div class="techex-tn-bottom-style-four">

        <div class="techex--tn-user-identity">
            <div class="techex--tn-top">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="techex--t-thumb">
                        <?php the_post_thumbnail('medium') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="techex--tn-name-title">
                <h4 class="techex--tn-name">
                    <?php the_title() ?>
                </h4>

                <?php if (function_exists('the_field')) : ?>
                    <span class="techex--tn-title">
                        <?php echo get_field('designation') ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>



        <div class="techex--tn--social-links">
            <?php if (function_exists('the_field')  && 'yes' == $settings['show_socail_links']) :
                $social_links = get_field('social_links');
            ?>
                <div class="social-icons">
                    <ul class="list-unstyled">
                        <?php foreach ($social_links as  $social_link) :  ?>
                            <li>
                                <a href="<?php echo esc_url($social_link['url']); ?>">
                                    <?php echo $social_link['icon'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            <?php endif; ?>
        </div>
    </div>

    <?php if (function_exists('the_field')) :
        $ratting = get_field('review_rating');
    ?>
        <div class="techex--tn-icon">
            <?php for ($i = 0; $i < $ratting; $i++) : ?>
                <?php Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']) ?>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

    <div class="techex--tn-dis">
        <?php echo techex_get_meta($content); ?>
    </div>
</div>