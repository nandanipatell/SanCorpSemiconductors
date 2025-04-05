<?php
// File Security Check
if (!defined('ABSPATH')) {
	exit;
}

/* Theme demo data setup */
function techex_import_files()
{
    return array(
        array(
            'import_file_name' => 'Initial Setup',
            'categories' => array('Inner Pages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/initial-setup.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'techex',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/techex/inc/demo-contents/previews/initial-setup.jpg',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'techex'),
            'preview_url' => 'https://wp.rrdevs.net/techex/',
        ),

        array(
            'import_file_name' => 'Home',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-01.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'techex',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/techex/inc/demo-contents/previews/home-01.jpg',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'techex'),
            'preview_url' => 'https://wp.rrdevs.net/techex/',
        ),

        array(
            'import_file_name' => 'Home 02',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-02.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'techex',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/techex/inc/demo-contents/previews/home-02.jpg',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'techex'),
            'preview_url' => 'https://wp.rrdevs.net/techex//home-02',
        ),

        array(
            'import_file_name' => 'Home 03',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-03.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'techex',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/techex/inc/demo-contents/previews/home-03.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'techex'),
            'preview_url' => 'https://wp.rrdevs.net/techex//home-03',
        ),

        array(
            'import_file_name' => 'Home 04',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-04.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'techex',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/techex/inc/demo-contents/previews/home-04.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'techex'),
            'preview_url' => 'https://wp.rrdevs.net/techex//home-04',
        ),

        array(
            'import_file_name' => 'Home 05',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-05.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'techex',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/techex/inc/demo-contents/previews/home-05.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'techex'),
            'preview_url' => 'https://wp.rrdevs.net/techex//home-05',
        ),

        array(
            'import_file_name' => 'Home 06',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-06.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'techex',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/techex/inc/demo-contents/previews/home-06.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'techex'),
            'preview_url' => 'https://wp.rrdevs.net/techex//home-06',
        ),

        array(
            'import_file_name' => 'Home 07',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-07.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'techex',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/techex/inc/demo-contents/previews/home-07.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'techex'),
            'preview_url' => 'https://wp.rrdevs.net/techex//home-07',
        ),

        array(
            'import_file_name' => 'Home 08',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-08.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'techex',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/techex/inc/demo-contents/previews/home-08.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'techex'),
            'preview_url' => 'https://wp.rrdevs.net/techex//home-08',
        ),


    );
}
add_filter('pt-ocdi/import_files', 'techex_import_files');



function ocdi_after_import($selected_import)
{

    if ('Home' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home');
    } elseif ('Home 02' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home 02');
    }elseif ('Home 03' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home 03');
    }elseif ('Home 04' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home 04');
    }elseif ('Home 05' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home 05');
    }elseif ('Home 06' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home 06');
    } elseif ('Home 07' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home 07');
    } else{
        $front_page_id = get_page_by_title('Home');
    }


    $main_menu = get_term_by('name', 'Header Menu', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
        'main-menu' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
    ));

    $blog_page_id  = get_page_by_title('Blog');
    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);


    $elem_clear_cache = new\Elementor\Core\Files\Manager();
    $elem_clear_cache->clear_cache();

}
add_action('pt-ocdi/after_import', 'ocdi_after_import');
