<?php 
use Elementor\Icons_Manager;
?>
 <div class="techex--tn-icon">
        <?php Icons_Manager::render_icon($settings['quate'], ['aria-hidden' => 'true']) ?>
    </div>

    <div class="techex--tn-dis">
        <?php echo techex_get_meta( $content );?>
    </div>

    <div class="techex-tn-bottom">
        <div class="techex--tn-top">
            <?php if(has_post_thumbnail() ): ?>
                <div class="techex--t-thumb">
                    <?php the_post_thumbnail( 'full' ) ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="techex--tn-name-title">
            <h4 class="techex--tn-name">
                <?php the_title() ?>
            </h4>

            <?php if(function_exists('the_field') ):?>
                <span class="techex--tn-title">
                    <?php echo get_field('designation') ?>
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>