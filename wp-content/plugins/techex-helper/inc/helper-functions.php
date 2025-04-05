<?php
if (!defined('ABSPATH')) {
    exit;
}


/**
 * Meta Output
 *
 * @since 1.0
 *
 * @return array
 */
if ( ! function_exists( 'techex_get_meta' ) ) {
    function techex_get_meta( $data ) {
        global $wp_embed;
        $content = $wp_embed->autoembed( $data );
        $content = $wp_embed->run_shortcode( $content );
        $content = do_shortcode( $content );
        $content = wpautop( $content );
        return $content;
    }
}

function techex_cpt_taxonomy_slug_and_name($taxonomy_name, $option_tag = false)
{
    $taxonomyies = get_terms($taxonomy_name);
    if(true == $option_tag){
        $cpt_terms = '';
        foreach ($taxonomyies as $category) {
            if( isset( $category->slug ) && isset( $category->name ) ){
               $cpt_terms .= '<option value="'. esc_attr( $category->slug) .'">'.  $category->name .'</option>';
            }
        }
        return $cpt_terms;
    }
    $cpt_terms = [];
    foreach ($taxonomyies as $category) {
        if( isset( $category->slug ) && isset( $category->name ) ){
            $cpt_terms[$category->slug] = $category->name;
        }
    }
    return $cpt_terms;
}




function techex_cpt_taxonomy_id_and_name($taxonomy_name)
{
    $taxonomyies = get_terms($taxonomy_name);
    $cpt_terms = [];
    foreach ($taxonomyies as $category) {
        $cpt_terms[$category->term_id] = $category->name;
    }
    return $cpt_terms;
}



function techex_cpt_author_slug_and_id($post_type)
{
    $the_query = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => $post_type,
    ));
    $author_meta = [];
    while ($the_query->have_posts()) : $the_query->the_post();
        $author_meta[get_the_author_meta('ID')] = get_the_author_meta('display_name');
    endwhile;
    wp_reset_postdata();
    return array_unique($author_meta);
}
function techex_cpt_slug_and_id($post_type)
{
    $the_query = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => $post_type,
    ));
    $cpt_posts = [];
    while ($the_query->have_posts()) : $the_query->the_post();
        $cpt_posts[get_the_ID()] = get_the_title();
    endwhile;
    wp_reset_postdata();
    return $cpt_posts;
}




function techex_loadmore_callback()
{
    // maybe it isn't the best way to declare global $post variable, but it is simple and works perfectly!
    $nonce = (isset($_POST['nonce'])) ? $_POST['nonce'] : '';
    if(check_ajax_referer( 'techex_loadmore_callback', 'folio_nonce' )){
        $settings = (isset($_POST['portfolio_settings'])) ? $_POST['portfolio_settings']['settings'] : [];
        $paged = (isset($_POST['paged'])) ? $_POST['paged'] : '';
        include(__DIR__ . '/../widgets/portfolio/queries/portfolio-query.php');
        include(__DIR__ . '/../widgets/portfolio/contents/portfolio-content.php');
        wp_reset_postdata();
        wp_die( ' ' );
    }else{
        echo "something wrong";
        wp_die( ' ' );
    }
}
add_action('wp_ajax_techex_loadmore_callback', 'techex_loadmore_callback'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_techex_loadmore_callback', 'techex_loadmore_callback'); // wp_ajax_nopriv_{action}



function techex_start_modify_html() {
    ob_start();
 }
 function techex_end_modify_html() {
    $html = ob_get_clean();
    $html = str_replace( 'font-display:swap;', '', $html );
    echo $html;
 }
 add_action( 'wp_head', 'techex_start_modify_html' );
 add_action( 'wp_footer', 'techex_end_modify_html' );

//sakib

/**
 * Checking post type enablee or disabled
 */
function techex_check_cpt( $opt_id ){
    $techex = get_option( 'techex' );
    if( isset( $techex[$opt_id] ) ){
        if( true == $techex[$opt_id] ) {
            return true;
        }else{
            return false;
        }
    }else{
        return true;
    }
}


 /**
 * Meta shortcode content Output
 *
 * @since 1.0
 *
 * @return array
 */
if ( ! function_exists( 'techex_get_meta' ) ) {
    function techex_get_meta( $data ) {
        global $wp_embed;
        $content = $wp_embed->autoembed( $data );
        $content = $wp_embed->run_shortcode( $content );
        $content = do_shortcode( $content );
        $content = wpautop( $content );
        return $content;
    }
}

 /**
 * Check if contact form 7 is activated
 *
 * @return bool
 */
if ( ! function_exists( 'techex_is_cf7_activated' ) ) {
    function techex_is_cf7_activated() {
        return class_exists( 'WPCF7' );
    }
}


/**
 *
 * Implementing Feature in menu item
 *
 */
function techex_implement_menu_meta( $classes, $item ) {
    $class = get_field('hide_this_menu', $item) ? 'hide-label' : '';
    $class .= get_field('is_it_title', $item) ? 'megamenu-heading' : '';
    $class .= get_field('select_megamenu', $item) ? 'menu-item-has-children techex-megamenu-builder-parent techex-mega-menu' : '';
    $classes[] = $class;
    return $classes;
}
add_filter('nav_menu_css_class', 'techex_implement_menu_meta', 10, 2);


/**
 *  Menu items - Add "Custom sub-menu" in menu item render output
 *  if menu item has class "menu-item-target"
 */
function techex_megamenu_builder_integrations( $item_output, $item, $depth, $args ) {

    $selected_megamenu = get_field('select_megamenu', $item, true);
    if(!empty( $selected_megamenu ) ){
        if( ! array_key_exists('elementor-preview', $_GET)){
            $custom_sub_menu_html = "   <ul class='techex-megamenu-builder-content-wrap sub-menu'>
            <li>".techex_layout_content($selected_megamenu)."</li>
        </ul>";

            // Append after <a> element of the menu item targeted
            $item_output .= $custom_sub_menu_html;
        }
    }



    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'techex_megamenu_builder_integrations', 10, 4 );


function techex_layout_content($post_id){

	return Elementor\Plugin::instance()->frontend->get_builder_content($post_id, true);
}

/**
 * Post orderby list
 */
function techex_get_post_orderby_options()
{
    $orderby = array(
        'ID' => 'Post ID',
        'author' => 'Post Author',
        'title' => 'Title',
        'date' => 'Date',
        'modified' => 'Last Modified Date',
        'parent' => 'Parent Id',
        'rand' => 'Random',
        'comment_count' => 'Comment Count',
        'menu_order' => 'Menu Order',
    );
    $orderby = apply_filters('techex_post_orderby', $orderby);
    return $orderby;
}


/**
 * Get Posts
 *
 * @since 1.0
 *
 * @return array
 */
if ( ! function_exists( 'techex_get_all_posts' ) ) {
    function techex_get_all_posts($posttype)
    {
        $args = array(
            'post_type' => $posttype,
            'post_status' => 'publish',
            'posts_per_page' => -1
        );

        $post_list = array();
        if( $data = get_posts($args)){
            foreach($data as $key){
                $post_list[$key->ID] = $key->post_title;
            }
        }
        return  $post_list;
    }
}


/**
 * Get Author list
 *
 * @since 1.0
 *
 * @return array
 */
if ( ! function_exists( 'techex_get_authors' ) )
{
    function techex_get_authors()
    {
        $user_query = new \WP_User_Query(
            [
                'who' => 'authors',
                'has_published_posts' => true,
                'fields' => [
                    'ID',
                    'display_name',
                ],
            ]
        );
        $authors = [];
        foreach ($user_query->get_results() as $result) {
            $authors[$result->ID] = $result->display_name;
        }
        return $authors;
    }
}


if ( ! function_exists( 'techex_post_excerpt' ) ) :
/**
 * Display post post excerpt or content
 * *
 * @since 1.0
 */
function techex_post_excerpt($post_id, $length = 20) {

    $post_object = get_post( $post_id );

    $excerpt = $post_object->post_excerpt;
    $content = $post_object->post_content;

    if ( !empty($excerpt)  && strlen(trim($excerpt)) != 0) {
        echo '<p>' . wp_trim_words( $excerpt, (int)$length, '' ) . '</p>';
    } else {
        echo '<p>' . wp_trim_words( $content, (int)$length, '' ) . '</p>';
    }

}
endif;



/**
 * Get taxonomy list
 *
 * @since 1.0
 *
 * @param string $taxonomy
 *
 * @return array
 */
if (!function_exists('techex_taxomony_list')) {
    function techex_taxomony_list($taxonomy)
    {

        $taxonomy_exist = taxonomy_exists($taxonomy);
        if (!$taxonomy_exist) {
            return;
        }
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => 1
        ));

        $get_terms = array();

        if (!empty($terms)) {
            foreach ($terms as $term) :
                $get_terms[$term->slug] = $term->name;
            endforeach;
        }

        return $get_terms;
    }
}


























