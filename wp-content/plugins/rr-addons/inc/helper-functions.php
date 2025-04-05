<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

function rr_addons_cpt_taxonomy_slug_and_name( $taxonomy_name, $option_tag = false ) {
    $taxonomyies = get_terms( $taxonomy_name );
    if ( true == $option_tag ) {
        $cpt_terms = '';
        foreach ( $taxonomyies as $category ) {
            if ( isset( $category->slug ) && isset( $category->name ) ) {
                $cpt_terms .= '<option value="' . esc_attr( $category->slug ) . '">' . $category->name . '</option>';
            }
        }
        return $cpt_terms;
    }
    $cpt_terms = [];
    foreach ( $taxonomyies as $category ) {
        if ( isset( $category->slug ) && isset( $category->name ) ) {
            $cpt_terms[$category->slug] = $category->name;
        }
    }
    return $cpt_terms;
}

function rr_addons_cpt_taxonomy_id_and_name( $taxonomy_name ) {
    $taxonomyies = get_terms( $taxonomy_name );
    $cpt_terms   = [];
    foreach ( $taxonomyies as $category ) {
        $cpt_terms[$category->term_id] = $category->name;
    }
    return $cpt_terms;
}

function rr_addons_cpt_author_slug_and_id( $post_type ) {
    $the_query = new WP_Query( array(
        'posts_per_page' => -1,
        'post_type'      => $post_type,
    ) );
    $author_meta = [];
    while ( $the_query->have_posts() ): $the_query->the_post();
        $author_meta[get_the_author_meta( 'ID' )] = get_the_author_meta( 'display_name' );
    endwhile;
    wp_reset_postdata();
    return array_unique( $author_meta );
}
function rr_addons_cpt_slug_and_id( $post_type ) {
    $the_query = new WP_Query( array(
        'posts_per_page' => -1,
        'post_type'      => $post_type,
    ) );
    $cpt_posts = [];
    while ( $the_query->have_posts() ): $the_query->the_post();
        $cpt_posts[get_the_ID()] = get_the_title();
    endwhile;
    wp_reset_postdata();
    return $cpt_posts;
}

function rr_addons_get_meta_field_keys( $post_type, $field_name, $fild_type = "choices" ) {
    $the_query = new WP_Query( array(
        'posts_per_page' => 1,
        'post_type'      => $post_type,
    ) );
    $field_object = [];
    while ( $the_query->have_posts() ): $the_query->the_post();
        $field_object = get_field_object( $field_name )[$fild_type];
    endwhile;
    return $field_object;
    wp_reset_postdata();
}

function rr_addons_loadmore_callback() {
    // maybe it isn't the best way to declare global $post variable, but it is simple and works perfectly!
    $nonce = ( isset( $_POST['nonce'] ) ) ? $_POST['nonce'] : '';
    if ( check_ajax_referer( 'rr_addons_loadmore_callback', 'folio_nonce' ) ) {
        $settings = ( isset( $_POST['portfolio_settings'] ) ) ? $_POST['portfolio_settings']['settings'] : [];
        $paged    = ( isset( $_POST['paged'] ) ) ? $_POST['paged'] : '';
        include __DIR__ . '/../widgets/portfolio/queries/portfolio-query.php';
        include __DIR__ . '/../widgets/portfolio/contents/portfolio-content.php';
        wp_reset_postdata();
        wp_die( ' ' );
    } else {
        echo "something wrong";
        wp_die( ' ' );
    }
}
add_action( 'wp_ajax_rr_addons_loadmore_callback', 'rr_addons_loadmore_callback' ); // wp_ajax_{action}
add_action( 'wp_ajax_nopriv_rr_addons_loadmore_callback', 'rr_addons_loadmore_callback' ); // wp_ajax_nopriv_{action}

function rr_addons_start_modify_html() {
    ob_start();
}
function rr_addons_end_modify_html() {
    $html = ob_get_clean();
    $html = str_replace( 'font-display:swap;', '', $html );
    echo $html;
}
add_action( 'wp_head', 'rr_addons_start_modify_html' );
add_action( 'wp_footer', 'rr_addons_end_modify_html' );

//sakib

/**
 * Checking post type enablee or disabled
 */
function rr_addons_check_cpt( $opt_id ) {
    $rr_addons = get_option( 'rr-addons' );
    if ( isset( $rr_addons[$opt_id] ) ) {
        if ( true == $rr_addons[$opt_id] ) {
            return true;
        } else {
            return false;
        }
    } else {
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
if ( !function_exists( 'rr_addons_get_meta' ) ) {
    function rr_addons_get_meta( $data ) {
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
if ( !function_exists( 'rr_addons_is_cf7_activated' ) ) {
    function rr_addons_is_cf7_activated() {
        return class_exists( 'WPCF7' );
    }
}

/**
 * Get a list of all CF7 forms
 *
 * @return array
 */
if ( !function_exists( 'rr_addons_get_cf7_forms' ) ) {
    function rr_addons_get_cf7_forms() {
        $forms = get_posts( [
            'post_type'      => 'wpcf7_contact_form',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ] );

        if ( !empty( $forms ) ) {
            return wp_list_pluck( $forms, 'post_title', 'ID' );
        }
        return [];
    }
}

if ( !function_exists( 'rr_addons_do_shortcode' ) ) {
    function rr_addons_do_shortcode( $tag, array $atts = array(), $content = null ) {
        global $shortcode_tags;
        if ( !isset( $shortcode_tags[$tag] ) ) {
            return false;
        }
        return call_user_func( $shortcode_tags[$tag], $atts, $content, $tag );
    }
}

/**
 *
 * Implementing Feature in menu item
 *
 */
function rr_addons_implement_menu_meta( $classes, $item ) {
    $class = get_field( 'hide_this_menu', $item ) ? 'hide-label' : '';
    $class .= get_field( 'is_it_title', $item ) ? 'megamenu-heading' : '';
    $class .= get_field( 'select_megamenu', $item ) ? 'menu-item-has-children rr-addons-megamenu-builder-parent' : '';
    $classes[] = $class;
    return $classes;
}
add_filter( 'nav_menu_css_class', 'rr_addons_implement_menu_meta', 10, 2 );

/**
 *  Menu items - Add "Custom sub-menu" in menu item render output
 *  if menu item has class "menu-item-target"
 */
function rr_addons_megamenu_builder_integrations( $item_output, $item, $depth, $args ) {

    $selected_megamenu = get_field( 'select_megamenu', $item, true );
    if ( !empty( $selected_megamenu ) ) {
        if ( !array_key_exists( 'elementor-preview', $_GET ) ) {
            $custom_sub_menu_html = "   <ul class='rr-addons-megamenu-builder-content-wrap sub-menu'>
            <li>" . rr_addons_layout_content( $selected_megamenu ) . "</li>
        </ul>";

            // Append after <a> element of the menu item targeted
            $item_output .= $custom_sub_menu_html;
        }
    }

    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'rr_addons_megamenu_builder_integrations', 10, 4 );

function rr_addons_layout_content( $post_id ) {

    return Elementor\Plugin::instance()->frontend->get_builder_content( $post_id, true );
}

if ( !function_exists( 'rr_addons_comment_count' ) ):
/**
 * Comment count
 */
    function rr_addons_comment_count($clabel = 'Comment', $icon = '') {
        if ( post_password_required() || !( comments_open() || get_comments_number() ) ) {
            return;
        }
        ob_start();
        ?>
	    <span class="rr-addons-comment">
            <a href="<?php comments_link();?>">
                <span><?php echo $icon ?> <?php comments_number( '0', '1', '%'  );?> <?php echo $clabel?></span>
            </a>
	    </span>
	    <?php
        return ob_get_clean();
    }
endif;

if ( !function_exists( 'rr_addons_posted_by' ) ):
    /**
     * Prints HTML with meta information for the current author.
     */
    function rr_addons_posted_by($label = 'by' ) {


        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x( '%s', 'post author', 'rr-addons' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> ' . $label . esc_html( get_the_author() ) . '</a></span>'
        );
        return '<span class="byline"> '  . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;

if ( !function_exists( 'rr_addons_posted_date' ) ):
    /**
     * Prints HTML with meta information for the current date.
     */
    function rr_addons_posted_date( $icon ='' ) {
        $date_html = sprintf('<span class="post-date"> %s %s</span>', $icon, get_the_date(  ));
        return $date_html;
    }
endif;

if ( !function_exists( 'rr_addons_posted_category' ) ):
    /**
     * Prints HTML with meta information for the current date.
     */
    function rr_addons_posted_category( $icon ='' ) {

        $post_cat = get_the_terms(get_the_ID(), 'category');
        $post_cat = join(', ', wp_list_pluck($post_cat, 'name'));
        $post_category = sprintf('<span class="category-list"> %s %s</span>', $icon, $post_cat);

        return $post_category;

    }
endif;

if ( !function_exists( 'rr_addons_comment_count_vtwo' ) ):
/**
 * Comment count
 */
    function rr_addons_comment_count_vtwo() {
        if ( post_password_required() || !( comments_open() || get_comments_number() ) ) {
            return;
        }
        ?>
	    <span class="rr-addons-comment">
	        <ul class="list-inline">

	            <a href="<?php comments_link();?>">
	                <span><?php comments_number( '0', '1', '%' );?></span>
	            </a>
	        </ul>
	    </span>
	    <?php
    }
endif;

if ( !function_exists( 'rr_addons_posted_by_vtwo' ) ):
    /**
     * Prints HTML with meta information for the current author.
     */
    function rr_addons_posted_by_vtwo() {

        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x( '%s', 'post author', 'rr-addons' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );
        echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;


/**
 * Get Posts
 *
 * @since 1.0
 *
 * @return array
 */
if ( !function_exists( 'rr_addons_get_all_pages' ) ) {
    function rr_addons_get_all_pages( $posttype = 'page' ) {
        $args = array(
            'post_type'      => $posttype,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
        );

        $page_list = array();
        if ( $data = get_posts( $args ) ) {
            foreach ( $data as $key ) {
                $page_list[$key->ID] = $key->post_title;
            }
        }
        return $page_list;
    }
}

/*
 * Check user Login and call this function
 */
global $user;
if ( empty( $user->ID ) ) {
    add_action( 'elementor/init', 'rr_addons_ajax_login_init' );
    add_action( 'elementor/init', 'rr_addons_ajax_register_init' );
}

/*
 * wp_ajax_nopriv Function
 */
function rr_addons_ajax_login_init() {
    add_action( 'wp_ajax_rr_addons_ajax_login', 'rr_addons_ajax_login' );
    add_action( 'wp_ajax_nopriv_rr_addons_ajax_login', 'rr_addons_ajax_login' );
}

/*
 * ajax login
 */
function rr_addons_ajax_login() {

    check_ajax_referer( 'ajax-login-nonce', 'security' );
    $user_data                     = array();
    $user_data['user_login']       = !empty( $_POST['username'] ) ? $_POST['username'] : "";
    $user_data['user_password']    = !empty( $_POST['password'] ) ? $_POST['password'] : "";
    $user_data['cf_user_password'] = !empty( $_POST['cf_password'] ) ? $_POST['cf_password'] : "";

    $user_data['remember'] = true;
    $user_signon           = wp_signon( $user_data, true );

    if ( is_wp_error( $user_signon ) ) {
        echo json_encode( ['loggeauth' => false, 'message' => esc_html__( 'Invalid username or password!', 'rr-addons' )] );
    } else {
        echo json_encode( ['loggeauth' => true, 'message' => esc_html__( 'Login Successfully', 'rr-addons' )] );
    }
    wp_die();
}

/*
 * wp_ajax_nopriv Register Function
 */
function rr_addons_ajax_register_init() {
    add_action( 'wp_ajax_nopriv_rr_addons_ajax_register', 'rr_addons_ajax_register' );
}

/*
 * Ajax Register Call back
 */
function rr_addons_ajax_register() {

    $user_data = array(
        'user_login'     => !empty( $_POST['reg_name'] ) ? $_POST['reg_name'] : "",
        'user_pass'      => !empty( $_POST['reg_password'] ) ? $_POST['reg_password'] : "",
        'cf_user_pass'   => !empty( $_POST['cf_reg_password'] ) ? $_POST['cf_reg_password'] : "",
        'reg_checkbox'   => isset( $_POST['reg_checkbox'] )  && $_POST['reg_checkbox'] == 'true' ? true  : false ,
        'user_email'     => !empty( $_POST['reg_email'] ) ? $_POST['reg_email'] : "",
        'conform_reg_email'  => !empty( $_POST['conform_reg_email'] ) ? $_POST['conform_reg_email'] : "",
        'user_url'       => !empty( $_POST['reg_website'] ) ? $_POST['reg_website'] : "",
        'first_name'     => !empty( $_POST['reg_fname'] ) ? $_POST['reg_fname'] : "",
        'last_name'      => !empty( $_POST['reg_lname'] ) ? $_POST['reg_lname'] : "",
        'nickname'       => !empty( $_POST['reg_nickname'] ) ? $_POST['reg_nickname'] : "",
        'description'    => !empty( $_POST['reg_bio'] ) ? $_POST['reg_bio'] : "",
    );

    if ( rr_addons_validation_data( $user_data ) !== true ) {
        echo rr_addons_validation_data( $user_data );
    } else {
        $register_user = wp_insert_user( $user_data );
        if ( is_wp_error( $register_user ) ) {
            echo json_encode( ['registerauth' => false, 'message' => esc_html__( 'Something is wrong please check again!', 'rr-addons' )] );
        } else {
            echo json_encode( ['registerauth' => true, 'message' => esc_html__( 'Successfully Register', 'rr-addons' )] );
        }
    }
    wp_die();
}

// Register Data Validation
function rr_addons_validation_data( $user_data ) {

    $data = '';

    if ( empty( $user_data['user_login'] ) || empty( $_POST['reg_email'] ) || empty( $_POST['conform_reg_email'] ) || empty( $_POST['reg_password'] ) || empty( $_POST['cf_reg_password'] ) ) {
        return json_encode( ['registerauth' => false, 'message' => esc_html__( 'Username, Password and E-Mail are required', 'rr-addons' )] );
    }

    if ( !empty( $user_data['user_login'] ) ) {

        if ( 4 > strlen( $user_data['user_login'] ) ) {
            return json_encode( ['registerauth' => false, 'message' => esc_html__( 'Username too short. At least 4 characters is required', 'rr-addons' )] );
        }

        if ( username_exists( $user_data['user_login'] ) ) {
            return json_encode( ['registerauth' => false, 'message' => esc_html__( 'Sorry, that username already exists!', 'rr-addons' )] );
        }

        if ( !validate_username( $user_data['user_login'] ) ) {
            return json_encode( ['registerauth' => false, 'message' => esc_html__( 'Sorry, the username you entered is not valid', 'rr-addons' )] );
        }

    }

    if ( !empty( $user_data['user_pass'] ) && !empty( $user_data['cf_user_pass'] ) ) {
        if ( isset( $user_data['user_pass'] ) && $user_data['user_pass'] != $user_data['cf_user_pass'] ) {
            return json_encode( ['registerauth' => false, 'message' => esc_html__( 'The passwords do not match.', 'rr-addons' )] );
        }
    }



    if ( !$user_data['reg_checkbox'] ) {
        return json_encode( ['registerauth' => false, 'message' => esc_html__( 'You must accept our privacy policy and terms.', 'rr-addons' )] );
    }

    if ( !empty( $user_data['user_pass'] ) ) {
        if ( 5 > strlen( $user_data['user_pass'] ) ) {
            return json_encode( ['registerauth' => false, 'message' => esc_html__( 'Password length must be greater than 5', 'rr-addons' )] );
        }
    }

    if ( !empty( $user_data['user_email'] ) ) {
        if ( !is_email( $user_data['user_email'] ) ) {
            return json_encode( ['registerauth' => false, 'message' => esc_html__( 'Email is not valid', 'rr-addons' )] );
        }
        if ( email_exists( $user_data['user_email'] ) ) {
            return json_encode( ['registerauth' => false, 'message' => esc_html__( 'Email Already in Use', 'rr-addons' )] );
        }
    }

    if ( !empty( $user_data['user_email'] ) && !empty( $user_data['conform_reg_email'] ) ) {
        if ( isset( $user_data['user_email'] ) && $user_data['user_email'] != $user_data['conform_reg_email'] ) {
            return json_encode( ['registerauth' => false, 'message' => esc_html__( 'The Email do not match.', 'rr-addons' )] );
        }
    }

    if ( !empty( $user_data['user_url'] ) ) {
        if ( !filter_var( $user_data['user_url'], FILTER_VALIDATE_URL ) ) {
            return json_encode( ['registerauth' => false, 'message' => esc_html__( 'Website is not a valid URL', 'rr-addons' )] );
        }
    }
    return true;

};

// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function techex_kses($raw){

   $allowed_tags = array(
      'a'                         => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'                      => array(
         'title' => array(),
      ),
      'b'                         => array(),
      'blockquote'                => array(
         'cite' => array(),
      ),
      'cite'                      => array(
         'title' => array(),
      ),
      'code'                      => array(),
      'del'                    => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'                     => array(),
      'div'                    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'                     => array(),
      'dt'                     => array(),
      'em'                     => array(),
      'h1'                     => array(),
      'h2'                     => array(),
      'h3'                     => array(),
      'h4'                     => array(),
      'h5'                     => array(),
      'h6'                     => array(),
      'i'                         => array(
         'class' => array(),
      ),
      'img'                    => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'                     => array(
         'class' => array(),
      ),
      'ol'                     => array(
         'class' => array(),
      ),
      'p'                         => array(
         'class' => array(),
      ),
      'q'                         => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'                      => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'                 => array(
         'width'         => array(),
         'height'     => array(),
         'scrolling'     => array(),
         'frameborder'   => array(),
         'allow'         => array(),
         'src'        => array(),
      ),
      'strike'                 => array(),
      'br'                     => array(),
      'strong'                 => array(),
      'data-wow-duration'            => array(),
      'data-wow-delay'            => array(),
      'data-wallpaper-options'       => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'                     => array(
         'class' => array(),
      ),
   );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}
