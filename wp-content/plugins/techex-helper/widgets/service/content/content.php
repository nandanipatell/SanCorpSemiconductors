<div <?php echo $grid_cls; ?> >
<div class="techex-service-widget-item <?php echo $image_hover_style; ?> <?php printf('service-style-%s', esc_attr( $settings['service_style'] )) ?>">


<?php if (has_post_thumbnail() && '1' != $settings['service_style']) : ?>
        <div class="service-thumbnail-wrapper">
            <a href="<?php echo esc_url(  get_the_permalink(  )  )?>" class="service-thumbnail d-block">
              <?php the_post_thumbnail( 'full' ); ?>
            </a>
        </div>
    <?php else: ?>
        <?php if (!empty( get_post_meta( $idd, 'svg_icon', true ) ) ) : ?>
            <div class="service-thumbnail-wrapper">
                <div class="service-thumbnail">
                    <?php if ('yes' == $settings['show_shape']): ?>
                    <span class="image-shape"></span>
                    <?php endif; ?>
                    <?php
                        $thumb_icon_id = get_post_meta($idd, 'svg_icon', true );
                        $thumb_icon_url = wp_get_attachment_image_url( $thumb_icon_id, 'full' );
                    ?>
                    <img src="<?php echo esc_url( $thumb_icon_url) ?>" alt="">

                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

        <div class="service-content-wrap">
            <div class="service-content">
                <?php
                    printf('<a href="%s" class="service-title-link d-block"><h3 class="service-title">%s</h3></a>', get_the_permalink(), $title);
                    echo 'yes' == $settings['show_excerpt'] ? sprintf('<p> %s </p>', esc_html($excerpt)) : '';
                ?>
                <?php if ('yes' == $settings['show_readmore']): ?>
                    <div class="service-btn-wrap">
                        <a class="service-btn <?php echo esc_attr('elementor-animation-' . $settings['btn_hover_animation']) ?>" href="<?php the_permalink() ?>">
                            <?php if ('before' == $settings['icon_position'] && !empty($settings['icon']['value'])) : ?>
                                <span class="icon-before btn-icon"><?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']) ?></span>
                            <?php endif; ?>
                            <?php echo esc_html($settings['readmore_text']); ?>
                            <?php if ('after' == $settings['icon_position'] && !empty($settings['icon']['value'])) : ?>
                                <span class="icon-after btn-icon"><?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']) ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>