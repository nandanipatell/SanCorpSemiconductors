<?php
/*
Template name: Page builder

*/
get_header();
?>

    <div class="techex-page-builder-wrapper">

            <?php
                if( have_posts() ) :
                    while( have_posts() ) :

                        the_post();

                        the_content();

                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>
    </div>


<?php
get_footer();
?>
