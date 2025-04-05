<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package techex
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function techex_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'techex_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function techex_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'techex_pingback_header');



/**
 * Detect Homepage
 *
 * @return boolean value
 */
function techex_detect_homepage()
{
    // If front page is set to display a static page, get the URL of the posts page.
    $homepage_id = get_option('page_on_front');

    // current page id
    $current_page_id = (is_page(get_the_ID())) ? get_the_ID() : '';

    if ($homepage_id == $current_page_id) {
        return true;
    } else {
        return false;
    }
}

/**
 *   Get the site logo for Bufet
 *
 */
function techex_get_site_logo()
{
    $logo = '';
    $techex = get_option('techex');
    $logo_url = '';

    $custom_logo = get_post_meta(get_the_ID(), 'use_custom_logo', true);
    $page_logo = get_post_meta(get_the_ID(), 'select_logo', true);

    if (!empty($custom_logo)) {
        $img_url = wp_get_attachment_image_src($page_logo, 'full');
        $logo_url = esc_url($img_url[0]);
        $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__regular">';
    } else if (!empty($techex['logo']['url'])) {
        $logo_url = esc_url($techex['logo']['url']);
        $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__regular">';
    } else {
        if (has_custom_logo()) {
            $core_logo_id = get_theme_mod('custom_logo');
            $logo_url = wp_get_attachment_image_src($core_logo_id, 'full');
            $logo = '<img src="' . esc_url($logo_url[0]) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__regular">';
        } else {
            $logo = '<h1 class="navbar-brand__regular">' . get_bloginfo('name') . '</h1>';
        }
    }

    return $logo;
}

/**
 * Get the site logo for Bufet
 */
function techex_get_site_sticky_logo()
{

    $techex = get_option('techex');

    $logo = '';
    $logo_url = '';

    $custom_logo = get_post_meta(get_the_ID(), 'use_custom_logo', true);
    $page_sticky_logo = get_post_meta(get_the_ID(), 'select_sticky_logo', true);

    if (!empty($custom_logo) && $page_sticky_logo) {
        $img_url = wp_get_attachment_image_src($page_sticky_logo, 'full');
        $logo_url = esc_url($img_url[0]);
        $logo = '<img src="' . esc_url($logo_url) . ' ?>" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__sticky">';
    } else if (!empty($techex['sticky_logo']['url'])) {
        $logo_url = esc_url($techex['sticky_logo']['url']);
        $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__sticky">';
    }
    return $logo;
}

add_action('wp_ajax_cloadmore', 'techex_comments_loadmore_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_cloadmore', 'techex_comments_loadmore_handler'); // wp_ajax_nopriv_{action}

function techex_comments_loadmore_handler()
{

    // maybe it isn't the best way to declare global $post variable, but it is simple and works perfectly!
    global $post;
    $post = get_post($_POST['post_id']);
    setup_postdata($post);

    wp_list_comments(
        array(
            'page' => $_POST['cpage'], // current comment page
            'per_page' => get_option('comments_per_page'),
            'style' => 'ol',
            'short_ping' => true,
        )
    );
    die; // don't forget this thing if you don't want "0" to be displayed
}


/**
 * techex Is edit mode in elementor
 *
 */
function techex_is_edit_mode(  ) {

    return isset($_GET['elementor-preview']);
}
/**
 * techex header Settings
 *
 */
function techex_header_settings() {

    if (defined('ELEMENTOR_PRO_VERSION') && techex_is_edit_mode() ) {
        return;
    }else{
        $techex = get_option( 'techex' );

        $check_header_post = get_posts( ['post_type' => 'techex_header'] );

        if ( 0 != count( $check_header_post ) ) {
            echo '<header class="site-header techex-elementor-header">';
            techex_header_footer_template_query( 'techex_header' );
            echo '</header>';
        } else {
            get_template_part( 'template-parts/headers/header-style-1' );
        }
    }

}

/**
 * techex Footer Settings
 *
 */
function techex_footer_settings() {
    if (defined('ELEMENTOR_PRO_VERSION') && techex_is_edit_mode() ) {
        return;
    }else{
        $check_footer_post = get_posts( ['post_type' => 'techex_footer'] );

        if ( 0 != count( $check_footer_post ) ) {

            techex_header_footer_template_query( 'techex_footer' );
        } else {
            techex_raw_footer();
        }
    }
}

/**
 * techex Raw Footer
 *
 */
function techex_raw_footer()
{
    $techex = get_option('techex');

    if (isset($techex['footer_copyright'])) {
        echo '<div class="techex-copyright text-center">' . $techex['footer_copyright'] . '</div>';
    } else {
        echo '<div class="techex-copyright text-center">' . esc_html__('Copyright 2022, All Rights Reserved', 'techex') . '</div>';
    }
}

/**
 * techex Footer Query
 *
 */
function techex_header_footer_template_query($post_type,  $post_id = '')
{

    global $post;
    $current_page_id = isset( $post->ID ) ? $post->ID : false;

    // Query for blog posts
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => -1,
    );
    if(empty( $post_id )){
        $argc['p'] =  $post_id;
    }

    $footer_query = new WP_Query($args);

    if ($footer_query->have_posts()) :
        while ($footer_query->have_posts()) :
            $footer_query->the_post();

           ob_start();
           the_content();
           $content = ob_get_clean();
            $output = '';


            if( get_field('include_rules', get_the_ID() ) ) {

                while( the_repeater_field('include_rules', get_the_ID()) ) {
                    $specific_pages = get_sub_field( 'pages' ) ? get_sub_field( 'pages' ) : [];
                    $entire_website = get_sub_field( 'include_on' );
                    $archive        = 'archive' == $entire_website ? is_archive() || is_home() || is_search() : false;

                    if( 'all' == $entire_website ||  in_array($current_page_id, $specific_pages) || $archive || ('404' == $entire_website && is_404(  ))){
                        $output = $content;
                    }
                }
            }


            if( get_field('exclude_rules', get_the_ID() ) ) {
                while( the_repeater_field('exclude_rules', get_the_ID()) ) {
                    $specific_pages = get_sub_field( 'pages' ) ? get_sub_field( 'pages' ) : [];
                    $entire_website = get_sub_field( 'exclude_on' );
                    $archive        = 'archive' == $entire_website ? is_archive() || is_home() || is_search() : false;

                    if( 'all' == $entire_website || in_array($current_page_id, $specific_pages) || $archive || ('404' == $entire_website && is_404(  ))){
                        $output = '';
                    }
                }
            }

            if($output){
                printf('%s', $output) ;
            }

        endwhile;
    endif;
    wp_reset_query(  );
}


/**
 * techex get archive post type
 *
 */
function techex_get_archive_post_type()
{
    $postname = isset(get_queried_object()->name) ? get_queried_object()->name : '';
    return is_archive() ? $postname : '';
}

function techex_update_elementor_scheme($colors = array())
{
    global $techex;
    if (class_exists('ReduxFrameworkPlugin')) :
        $accent_color = $techex['custom_accent_color'];
        $heading_color = $techex['heading_color'];
        $text_color = $techex['text_color'];
        $colors = [
            "1" => "$heading_color",
            "2" => "$heading_color",
            "3" => "$text_color",
            "4" => "$accent_color"
        ];
        return $colors;
    endif;
    return false;
}
add_action('after_switch_theme', 'techex_update_elementor_scheme');

if (!function_exists('is_shop') && !class_exists('woocommerce')) {
    function is_shop()
    {
        return false;
    }
}

function techex_preloader()
{
    $techex = get_option('techex');

    $preloader = '
    <div class="techex-preloader-wrap">
        <div class="techex-preloader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    ';

    if (isset($techex['enable_preloader'])) {
        if (true == $techex['enable_preloader']) {
            printf('%s', $preloader);
        }
    } else {
        printf('%s', $preloader );
    }
}

function techex_backtotop()
{
    $techex = get_option('techex');

    $backtotop = '
        <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
    ';

    if (isset($techex['enable_backtotop'])) {
        if (true == $techex['enable_backtotop']) {
            printf('%s', $backtotop);
        }
    } else {
        printf('%s', $backtotop );
    }
}

//catgorys count class adding
function techex_wp_list_categories($catgorys_output){

	$catgorys_output = str_replace("(", "<span>(",$catgorys_output);
	$catgorys_output = str_replace(")", ")</span> ",$catgorys_output);
	return $catgorys_output;
}
add_filter('wp_list_categories','techex_wp_list_categories');