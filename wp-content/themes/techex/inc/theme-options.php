<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( !class_exists( 'Redux' ) ) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "techex";

$theme_dir = get_template_directory_uri();

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

/*
 *
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 *
 */

$sampleHTML = '';

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'dev_mode'             => false,
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__( 'Techex Options', 'techex' ),
    'page_title'           => esc_html__( 'Techex Options', 'techex' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => 'AIzaSyAs5fBAvB5HKK05nz5zhb1eWFziECHEz6o',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => 2,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

// Panel Intro text -> before the form
if ( !isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
    if ( !empty( $args['global_variable'] ) ) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $args['opt_name'] );
    }
    $args['intro_text'] = sprintf( '<p>%s <strong>%s</strong></p>', esc_html( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable:', 'techex' ), $v );
} else {
    $args['intro_text'] = sprintf( '<p>%s</p>', esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'techex' ) );
}

// Add content after the form.
$args['footer_text'] = sprintf( '<p>%s</p>', esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'techex' ) );

Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

$tabs = array(
    array(
        'id'      => 'redux-help-tab-1',
        'title'   => esc_html__( 'Theme Information 1', 'techex' ),
        'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'techex' ) . '</p>',
    ),
    array(
        'id'      => 'redux-help-tab-2',
        'title'   => esc_html__( 'Theme Information 2', 'techex' ),
        'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'techex' ) . '</p>',
    ),
);
Redux::set_help_tab( $opt_name, $tabs );

// Set the help sidebar
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'techex' ) . '</p>';
Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

// theme activation check
if ( true == get_option( 'techex_theme_activation' ) ) {
    $theme_activation = array(
        'id'    => 'info_success',
        'type'  => 'info',
        'title' => __( 'Theme activated succeessfully!!', 'techex' ),
        'style' => 'success',
    );
} else {
    $theme_activation = array(
        'id'    => 'info_error',
        'type'  => 'info',
        'title' => __( 'Theme are not activated', 'techex' ),
        'style' => 'critical',
    );
}

/*
 *
 * ---> START SECTIONS
 *
 */

/*
As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 */

Redux::set_section( $opt_name, array(
    'icon'             => 'el  el-adjust-alt',
    'title'            => esc_html__( 'General Settings', 'techex' ),
    'id'               => 'general_settings',
    'class'            => 'option-page-layout',
    'customizer_width' => '450px',
    'fields'           => array(
        array(
            'id'      => 'enable_preloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Enable Preloader?', 'techex' ),
            'desc'    => esc_html__( 'Wish to use preloader?', 'techex' ),
            'default' => true,
        ),
        array(
            'id'      => 'enable_backtotop',
            'type'    => 'switch',
            'title'   => esc_html__( 'Enable Back to Top?', 'techex' ),
            'desc'    => esc_html__( 'Wish to use back to top?', 'techex' ),
            'default' => true,
        ),

        array(
            'id'       => 'body_bg_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Body Background Color', 'techex' ),
            'subtitle' => esc_html__( 'Pick a color for the body.', 'techex' ),
            'validate' => 'color',
            'default'  => '#ffffff',
        ),

        array(
            'id'       => 'custom_accent_color',
            'type'     => 'color',
            'title'    => esc_html__('Primary Color', 'techex'),
            'subtitle' => esc_html__('Pick a color for the theme.', 'techex'),
            'validate' => 'color',
            'default' => '#086ad7',
        ),

        array(
            'id'       => 'custom_accent_color_2',
            'type'     => 'color',
            'title'    => esc_html__( 'Secondary Color', 'techex' ),
            'subtitle' => esc_html__( 'Pick a color for the theme.', 'techex' ),
            'default'  => '#febc35',

        ),
        array(
            'id'       => 'heading_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Heading Color', 'techex' ),
            'subtitle' => esc_html__( 'Pick a color for headings.', 'techex' ),
            'default'  => '#211e3b',

        ),
        array(
            'id'       => 'text_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Text Color', 'techex' ),
            'subtitle' => esc_html__( 'Pick a color for texts.', 'techex' ),
            'default'  => '#696969',

        ),
    ),
)
);

Redux::set_section( $opt_name, array(
    'icon'             => 'el   el-foursquare',
    'title'            => esc_html__( 'Logo', 'techex' ),
    'id'               => 'logo_settings',
    'customizer_width' => '450px',
    'fields'           => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Logo', 'techex' ),
            'subtitle' => esc_html__( 'Choose the site logo', 'techex' ),
            'default'  => array(
                'url' => 'https://rrdevs.net/demos/wp/techex/wp-content/uploads/2022/01/logo-black.svg',
            ),
        ),

        array(
            'id'       => 'white_logo',
            'type'     => 'media',
            'title'    => esc_html__( 'White Logo', 'techex' ),
            'subtitle' => esc_html__( 'Choose the site Dark logo', 'techex' ),
            'default'  => array(
                'url' => 'https://rrdevs.net/demos/wp/techex/wp-content/uploads/2022/01/logo-white.svg',
            ),
        ),

        array(
            'id'       => 'logo_max_width_desktop',
            'type'     => 'slider',
            'title'    => esc_html__( 'Logo Max Width (Desktop)', 'techex' ),
            'subtitle' => esc_html__( 'Set the logo maximum width size for desktop in px unit', 'techex' ),
            "default"  => 125,
            "min"      => 0,
            "step"     => 5,
            "max"      => 300,
        ),
        array(
            'id'       => 'logo_max_width_mobile',
            'type'     => 'slider',
            'title'    => esc_html__( 'Logo Max Width (Mobile)', 'techex' ),
            'subtitle' => esc_html__( 'Set the logo maximum width size for mobile in px unit', 'techex' ),
            "default"  => 125,
            "min"      => 0,
            "step"     => 5,
            "max"      => 300,
        ),

    ),
) );

Redux::set_section( $opt_name, array(
    'icon'             => 'el el-text-height',
    'title'            => esc_html__( 'Typography', 'techex' ),
    'id'               => 'body_typography',
    'customizer_width' => '450px',
    'fields'           => array(
        array(
            'id'             => 'body_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'Body Typography', 'techex' ),
            'google'         => false,
            'font-backup'    => true,
            'default'        => array(
                'font-family' => 'Circular Std',
                'font-weight' => '400',
                'google'      => true,
            ),
            "fonts" => array(
                "Circular Std" => "Circular Std",
                "Poppins" => "Poppins",
                "Roboto" => "Roboto"
            ),
            'line-height'    => true,
            'letter-spacing' => true,
            'output'         => array( 'body' ),
            'units'          => 'px',
            'subtitle'       => esc_html__( 'Set typography for body', 'techex' ),
        ),
        array(
            'id'             => 'heading_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'Heading Typography', 'techex' ),
            'default'        => array(
                'font-family' => 'Circular Std',
                'font-weight' => '700',
                'google'      => false,
            ),
            "fonts" => array(
                "Circular Std" => "Circular Std",
                "Poppins" => "Poppins",
                "Roboto" => "Roboto"
            ),
            'google'         => true,
            'font-backup'    => true,
            'line-height'    => true,
            'letter-spacing' => true,
            'output'         => array( 'h1, h2, h3, h4, h5, h6' ),
            'units'          => 'px',
            'subtitle'       => esc_html__( 'Set typography for heading', 'techex' ),
        ),

    ),
) );

Redux::set_section( $opt_name, array(
    'icon'             => 'el el-th',
    'title'            => esc_html__( 'Blog Page', 'techex' ),
    'id'               => 'blog_settings',
    'customizer_width' => '450px',
    'subsection'       => false,
    'fields'           => array(
        array(
            'id'       => 'bp_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Page Title', 'techex' ),
            'subtitle' => esc_html__( 'Give any breadcrumb page title for the blog page.', 'techex' ),
            'default'  => esc_html__( 'Our blog', 'techex' ),
        ),
        array(
            'id'       => 'blog_hero_caption',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Page Hero Caption', 'techex' ),
            'subtitle' => esc_html__( 'Give any breadcrumb page title for the blog page.', 'techex' ),
            'default'  => esc_html__( 'Read our latest blog posts.', 'techex' ),
        ),
        array(
            'id'       => 'blog_bredcrumb_img',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Uplode Blog Bredcrumb Image', 'techex'),
        ), 
        array(
            'id'       => 'blog_layout',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Blog Layout', 'techex' ),
            'subtitle' => esc_html__( 'Choose the layout you want in blog pages', 'techex' ),
            'options'  => array(
                'fullpage'      => get_theme_file_uri( '/assets/img/layouts/fullpage.png"' ),
                'left-sidebar'  => get_theme_file_uri( '/assets/img/layouts/left-sidebar.jpg"' ),
                'right-sidebar' => get_theme_file_uri( '/assets/img/layouts/right-sidebar.jpg"' ),
            ),
            'default'  => 'right-sidebar',
        ),
        
        array(
            'id'       => 'blog_grid',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Blog Grid', 'techex' ),
            'subtitle' => esc_html__( 'Choose the number of column you want in blog pages', 'techex' ),
            'options'  => array(
                'one-column'   => get_theme_file_uri( '/assets/img/layouts/1-col.png"' ),
                'two-column'   => get_theme_file_uri( '/assets/img/layouts/2-col.png"' ),
                'three-column' => get_theme_file_uri( '/assets/img/layouts/3-col.png"' ),
            ),
            'default'  => 'one-column',
        ),
        array(
            'id'       => 'continue_reading_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Continue Reading Button Title', 'techex' ),
            'subtitle' => esc_html__( 'Enter the button text for continue reading button.', 'techex' ),
            'default'  => esc_html__( 'Read More', 'techex' ),
        ),
        array(
            'id'      => 'show_excerpt',
            'type'    => 'switch',
            'title'   => __( 'Show Excerpt?', 'techex' ),
            'default' => true,
        ),
    ),
) );

Redux::set_section( $opt_name, array(
    'title'            => esc_html__( 'Single Page', 'techex' ),
    'id'               => 'single_page_settings',
    'customizer_width' => '450px',
    'subsection'       => true,
    'fields'           => array(
        array(
            'id'       => 'sp_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Single Page Title', 'techex' ),
            'subtitle' => esc_html__( 'Give any breadcrumb page title for the single article page.', 'techex' ),
            'default'  => 'Blog Details',
        ),
        array(
            'id'       => 'blog_bredcrumb_single_img',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Uplode Blog Single Bredcrumb Image', 'techex'),
        ), 
        array(
            'id'       => 'single_page_layout',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Single Page Layout', 'techex' ),
            'subtitle' => esc_html__( 'Choose the layout you want in single pages', 'techex' ),
            'options'  => array(
                'fullpage'      => get_theme_file_uri( '/assets/img/layouts/fullpage.png"' ),
                'left-sidebar'  => get_theme_file_uri( '/assets/img/layouts/left-sidebar.jpg"' ),
                'right-sidebar' => get_theme_file_uri( '/assets/img/layouts/right-sidebar.jpg"' ),
            ),
            'default'  => 'right-sidebar',
        ),
    ),
) );
if ( class_exists( 'woocommerce' ) ) {
    Redux::set_section( $opt_name, array(
        'icon'             => 'el el-shopping-cart',
        'title'            => esc_html__( 'Shop Page', 'techex' ),
        'id'               => 'shop_page',
        'customizer_width' => '450px',
        'subsection'       => false,
        'fields'           => array(
            array(
                'id'       => 'shop_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Shop Page Title', 'techex' ),
                'subtitle' => esc_html__( 'Give any breadcrumb page title for the shop page.', 'techex' ),
                'default'  => esc_html__( 'Our Shop', 'techex' ),
            ),
            array(
                'id'       => 'shop_bread_caption',
                'type'     => 'text',
                'title'    => esc_html__( 'Shop Page Breadcrumb Caption', 'techex' ),
                'subtitle' => esc_html__( 'Give any breadcrumb page caption for the Shop page.', 'techex' ),
                'default'  => esc_html__( 'By accessing and placing an order with UXTheme, you confirm that you are in agreement with and bound by the terms and conditions.', 'techex' ),
            ),
        ),
    ) );
}

Redux::set_section( $opt_name, array(
    'icon'             => 'el el-briefcase',
    'title'            => esc_html__( 'Integrations', 'techex' ),
    'id'               => 'techex_integrations',
    'customizer_width' => '450px',
    'subsection'       => false,
    'fields'           => array(
        array(
            'id'       => 'gmap_api',
            'type'     => 'text',
            'title'    => esc_html__( 'Google Maps Api', 'techex' ),
            'subtitle' => esc_html__( 'Set the google map api.', 'techex' ),
            'default'  => esc_html__( '1', 'techex' ),
        ),
    ),
) );

Redux::set_section( $opt_name, array(
    'icon'             => 'el  el-edit',
    'title'            => esc_html__( 'Advanced', 'techex' ),
    'id'               => 'advanced',
    'desc'             => esc_html__( 'Show/Hide Options! ( K.A Custom Post )', 'techex' ),
    'customizer_width' => '400px',
    'fields'           => array(

        array(
            'id'      => 'portfolio',
            'type'    => 'switch',
            'title'   => __( 'Portfolio', 'techex' ),
            'default' => true,
        ),
        array(
            'id'      => 'service',
            'type'    => 'switch',
            'title'   => __( 'Service', 'techex' ),
            'default' => true,
        ),
        array(
            'id'      => 'team',
            'type'    => 'switch',
            'title'   => __( 'Team', 'techex' ),
            'default' => true,
        ),
        array(
            'id'      => 'testimonial',
            'type'    => 'switch',
            'title'   => __( 'Testimonial', 'techex' ),
            'default' => true,
        ),

    ),
) );

Redux::set_section( $opt_name, array(
    'icon'             => 'el el-css',
    'title'            => esc_html__( 'Custom Css', 'techex' ),
    'id'               => 'custom_css_section',
    'customizer_width' => '400px',
    'fields'           => array(

        array(
            'id'       => 'scustom_css',
            'type'     => 'ace_editor',
            'title'    => __( 'CSS Code', 'techex' ),
            'subtitle' => __( 'Paste your CSS code here.', 'techex' ),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
            'default'  => " /** #header{\n   margin: 0 auto;\n }**/",
        ),

    ),
) );

Redux::set_section( $opt_name, array(
    'icon'             => 'el el-photo',
    'title'            => esc_html__( 'Footer', 'techex' ),
    'id'               => 'footer',
    'desc'             => esc_html__( 'Techex footer settings!', 'techex' ),
    'customizer_width' => '400px',
    'fields'           => array(


        array(
            'id'       => 'footer_copyright',
            'type'     => 'text',
            'title'    => esc_html__( 'Copyright', 'techex' ),
            'subtitle' => esc_html__( 'Give the copyright text', 'techex' ),
            'default'  => 'Copyright 2022, All Rights Reserved',
        ),


    ),
) );

/*
 * <--- END SECTIONS
 */
