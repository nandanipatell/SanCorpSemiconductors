<?php

/**
 * Plugin Name: Techex Helper
 * Description: This plugin is compatible with Techex WordPress Landing Page Theme
 * Plugin URI:
 * Version:     1.0.9
 * Author:      RR Devs
 * Author URI:
 * Text Domain: techex-hp
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Main techex-hp Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class techex_elementor
{

    /**
     * Plugin Version
     *
     * @since 1.0.0
     *
     * @var string The plugin version.
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     *
     * @since 1.0.0
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.0.0
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '5.6';

    /**
     * Instance
     *
     * @since 1.0.0
     *
     * @access private
     * @static
     *
     * @var techex_elementor The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     *
     * @access public
     * @static
     *
     * @return techex_elementor An instance of the class.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function __construct()
    {
        add_action('init', [$this, 'i18n']);
        add_action('plugins_loaded', [$this, 'init']);
    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * Fired by `init` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function i18n()
    {
        load_plugin_textdomain('techex-hp');
    }

    /**
     * Initialize the plugin
     *
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed load the files required to run the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init()
    {


		// $this->update_checker();

        // Require the main plugin file
        require(__DIR__ . '/inc/helper-functions.php');
        require_once(__DIR__ . '/inc/custom-post-types.php');
        require(__DIR__ . '/inc/elmentor-extender.php');
        require(__DIR__ . '/inc/recent-post-thumbnail.php');
        require(__DIR__ . '/inc/admin-column.php');

        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return;
        }

        // Add Plugin actions
        add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
        add_action('elementor/frontend/after_enqueue_styles', [$this, 'widget_styles']);
        add_action('elementor/frontend/after_register_scripts', [$this, 'widget_scripts']);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_missing_main_plugin()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'techex-hp'),
            '<strong>' . esc_html__('Techex Helper', 'techex-hp') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'techex-hp') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'techex-hp'),
            '<strong>' . esc_html__('Techex Helper', 'techex-hp') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'techex-hp') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_php_version()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'techex-hp'),
            '<strong>' . esc_html__('techex-hp', 'techex-hp') . '</strong>',
            '<strong>' . esc_html__('PHP', 'techex-hp') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init_widgets()
    {

        $widgets_manager = \Elementor\Plugin::instance()->widgets_manager;

        // Include Widget files
		if (techex_check_cpt('service')) {
            require_once __DIR__ . '/widgets/services.php';
        }


        if (techex_check_cpt('team')) {
            require_once __DIR__ . '/widgets/team.php';
        }

        if (techex_check_cpt('testimonial')) {
            require_once __DIR__ . '/widgets/testimonial.php';
        }

        // case study
        if (techex_check_cpt('case-study')) {
            require_once __DIR__ . '/widgets/case-study/case-study.php';
            require_once __DIR__ . '/widgets/case-study/single-case-study-meta.php';
            require_once __DIR__ . '/widgets/case-study/category.php';

        }



        /*Logo */
        require_once __DIR__ . '/widgets/logo.php';

        /* Nav Menu */
        require_once __DIR__ . '/widgets/main-menu.php';

        /* Vertical Menu */
        require_once __DIR__ . '/widgets/vertical-menu.php';

        /* Hero Section*/
        require_once __DIR__ . '/widgets/hero-one.php';
        
        /* Hero Section Two*/
        require_once __DIR__ . '/widgets/hero-two.php';
        
        /* Contact Card */
        require_once __DIR__ . '/widgets/contact-card.php';

          /* Featured Box  */
          require_once __DIR__ . '/widgets/featured-box.php';
       
          /* Heading New  */
        require_once __DIR__ . '/widgets/heading-new.php';

        /* Tesimonail slider  */
        require_once __DIR__ . '/widgets/testimonial-slider.php';

        /* Projects slider  */
        require_once __DIR__ . '/widgets/project-slider.php';

        /* Circle Progressbar  */
        require_once __DIR__ . '/widgets/circle-progressbar.php';

        /* Pricing Table 06  */
        require_once __DIR__ . '/widgets/pricing-table.php';

        /* Testimonial sliders 06  */
        require_once __DIR__ . '/widgets/testimonial-slider-06.php';

        /* Image Box Home 07  */
        require_once __DIR__ . '/widgets/image-btn-box.php';

        /* servics Image Box Home 07  */
        require_once __DIR__ . '/widgets/servics-img-box.php';

        /* team membor Home 07  */
        require_once __DIR__ . '/widgets/team-membor.php';

        /* FAQ Accordion Home 07  */
        require_once __DIR__ . '/widgets/faq-accordion.php';

        /* Testimonial image box Home 07  */
        require_once __DIR__ . '/widgets/testimonial-image-box.php';

        /* testimonial slider Home 07  */
        require_once __DIR__ . '/widgets/testimonial-slider-07.php';

        /* pricing table Home 07  */
        require_once __DIR__ . '/widgets/pricing-table-07.php';

        /* Techex Blog Post Home 07  */
        require_once __DIR__ . '/widgets/blog-post.php';

        /* Techex Blog Post Home 07  */
        require_once __DIR__ . '/widgets/gradian-heading.php';


    }

    public function widget_styles()
    {
        wp_dequeue_style('elementor-animations');
        wp_register_style('owl-carousel', plugins_url('/assets/css/owl.carousel.min.css', __FILE__), [], microtime());
        wp_enqueue_style('owl-carousel');
        wp_register_style('owl-theme-style', plugins_url('/assets/css/owl.theme.css', __FILE__), [], microtime());
        wp_enqueue_style('owl-theme-style');
        wp_enqueue_style('techex-elementor-animations', plugins_url('/assets/css/animate.css', __FILE__), [], microtime());

        wp_enqueue_style('magnific-popup', plugins_url('/assets/css/magnific-popup.css', __FILE__), [], microtime());
        wp_enqueue_style('circle-progress', plugins_url('/assets/css/circle-progress.css', __FILE__), [], microtime());
        wp_enqueue_style('techex-addons',  plugins_url('/assets/css/addons.css', __FILE__), [], microtime());
        wp_enqueue_style('techex-custom-ab',  plugins_url('/assets/css/techex.css', __FILE__), [] , microtime());
        wp_style_add_data('techex-addons', 'rtl', 'replace');
    }

    public function widget_scripts()
    {
        wp_register_script('bootstrap', plugins_url('/assets/js/bootstrap.min.js', __FILE__), ['jquery']);
        wp_enqueue_script('bootstrap');
        wp_register_script('owl-carousel', plugins_url('/assets/js/owl.carousel.min.js', __FILE__), ['jquery']);
        wp_enqueue_script('owl-carousel');

        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('isotope', plugins_url('/assets/js/isotope.pkgd.min.js', __FILE__), ['jquery']);
        wp_enqueue_script('packery', plugins_url('/assets/js/packery-mode.pkgd.min.js', __FILE__), ['jquery', 'isotope']);
        wp_enqueue_script('imagesloaded', plugins_url('/assets/js/imagesloaded.pkgd.min.js', __FILE__), ['jquery', 'isotope']);
        wp_enqueue_script('magnific-popup', plugins_url('/assets/js/jquery.magnific-popup.min.js', __FILE__), ['jquery'], microtime(), true);
        wp_enqueue_script('jquery-numerator', plugins_url('/assets/js/jquery-numerator.js', __FILE__), ['jquery'], microtime(), true);
        wp_enqueue_script('circle-progress', plugins_url('/assets/js/circle-progress.min.js', __FILE__), ['jquery'], microtime(), true);
        wp_enqueue_script('techex-addon', plugins_url('/assets/js/addon.js', __FILE__), ['jquery'], microtime(), true);
    }




}

techex_elementor::instance();

/**
 * adding new category
 */
function techex_add_elementor_widget_categories($elements_manager)
{
    $elements_manager->add_category(
        'techex-addons',
        [
            'title' => __('Techex addons', 'techex-hp'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'techex_add_elementor_widget_categories');

// Adding Circular Std Font
/**
 * Add Font Group
 */
add_filter( 'elementor/fonts/groups', function ( $font_groups ) {
    $font_groups['techex_fonts'] = __( 'Techex Fonts' );
    return $font_groups;
} );

add_filter( 'elementor/fonts/additional_fonts', function ( $additional_fonts ) {
    $additional_fonts['Circular Std'] = 'techex_fonts';
    return $additional_fonts;
} );