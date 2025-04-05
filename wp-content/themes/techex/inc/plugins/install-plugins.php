<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Techex for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require TECHEX_INC_DIR . '/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'techex_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function techex_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		//This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Techex Helper',
			'slug'      => 'techex-helper',
			'source'	=> TECHEX_INC_DIR . '/plugins/plugin-files/techex-helper.zip',
			'version'	=> '1.0.7', // E.g. 1.0.0. If set, the active plugin must be this version
			'required'  => true,
		),

		array(
			'name'      => 'RR Addons',
			'slug'      => 'rr-addons',
			'source'	=> TECHEX_INC_DIR . '/plugins/plugin-files/rr-addons.zip',
			'version'	=> '1.0.7', // E.g. 1.0.0. If set, the active plugin must be this version
			'required'  => true,
		),

		array(
			'name'      => 'Techex Toolkit',
			'slug'      => 'techex-toolkit',
			'source'	=> TECHEX_INC_DIR . '/plugins/plugin-files/techex-toolkit.zip',
			'version'	=> '1.0.7', // E.g. 1.0.0. If set, the active plugin must be this version
			'required'  => true,
		),

		array(
			'name'      => 'Advanced Custom Fields PRO',
			'slug'      => 'advanced-custom-fields-pro',
			'source'	=> TECHEX_INC_DIR . '/plugins/plugin-files/advanced-custom-fields-pro.zip',
			'version'	=> '6.3.11', // E.g. 1.0.0. If set, the active plugin must be this version
			'required'  => true,
		),
		array(
			'name'      => 'Advanced Custom Fields: Font Awesome Field',
			'slug'      => 'advanced-custom-fields-font-awesome',
			'required'  => true,
		),
		array(
			'name'      => 'Redux Framework',
			'slug'      => 'redux-framework',
			'required'  => true,
		),
		array(
			'name'      => 'Elementor Page Builder',
			'slug'      => 'elementor',
			'required'  => true,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
		array(
			'name'      => 'One Click Demo Import',
			'slug'      => 'one-click-demo-import',
			'required'  => true,
		),

		array(
			'name'      => 'SVG Support',
			'slug'      => 'svg-support',
			'required'  => true,
		),
		array(
			'name'      => 'Classic Editor',
			'slug'      => 'classic-editor',
			'required'  => true,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'techex',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'techex-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
