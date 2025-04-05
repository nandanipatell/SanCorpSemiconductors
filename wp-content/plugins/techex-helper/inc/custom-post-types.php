<?php
// File Security Check
if (!defined('ABSPATH')) {
	exit;
}
class TechexCustomPosts
{
	function __construct()
	{
		add_action( 'admin_menu', array($this, 'techex_header_footer_menu') );
		// Header
		add_action('init', array($this, 'techex_header'));
		add_action('init', array($this, 'techex_footer'));

		// team
        if (techex_check_cpt('team')) {
            add_action('init', array($this, 'techex_team'));
        }

		// services
        if (techex_check_cpt('service')) {
            add_action('init', array($this, 'techex_service'));
            add_action('init', array($this, 'techex_service_category'));
            add_action('init', array($this, 'techex_service_tags'));
        }

		// Portfolios
        if (techex_check_cpt('portfolio')) {
            add_action('init', array($this, 'techex_portfolio'));
            add_action('init', array($this, 'techex_portfolio_category'));
            add_action('init', array($this, 'techex_portfolio_tags'));
        }

		// Testimonial
        if (techex_check_cpt('testimonial')) {
            add_action('init', array($this, 'techex_testimonial'));
            add_action('init', array($this, 'techex_testimonial_category'));
        }

		// Case Study
        if (techex_check_cpt('case-study')) {
            add_action('init', array($this, 'techex_case_study'));
            add_action('init', array($this, 'techex_case_study_category'));
            add_action('init', array($this, 'techex_case_study_tags'));
        }

	}

	public function techex_header_footer_menu() {
		add_menu_page(
			'Header & Footer',
			'Header & Footer',
			'read',
			'header-footer',
			'',
			'dashicons-archive',
			40
		);
	 }
	 /**
	 *
	 * Techex Header Footer Post Type
	 *
	 */
	public function techex_header()
	{
		$labels = array(
			'name'               => _x('Header', 'post type general name', 'techex-hp'),
			'singular_name'      => _x('Header', 'post type singular name', 'techex-hp'),
			'menu_name'          => _x('Header', 'admin menu', 'techex-hp'),
			'name_admin_bar'     => _x('Header', 'add new on admin bar', 'techex-hp'),
			'add_new'            => __('Add New Header', 'techex-hp'),
			'add_new_item'       => __('Add New Header', 'techex-hp'),
			'new_item'           => __('New Header', 'techex-hp'),
			'edit_item'          => __('Edit Header', 'techex-hp'),
			'view_item'          => __('View Header', 'techex-hp'),
			'all_items'          => __('All Headers', 'techex-hp'),
			'search_items'       => __('Search Headers', 'techex-hp'),
			'parent_item_colon'  => __('Parent :', 'techex-hp'),
			'not_found'          => __('No Headers found.', 'techex-hp'),
			'not_found_in_trash' => __('No Headers found in Trash.', 'techex-hp')
		);
		$args = array(
			'labels'             => $labels,
			'description'        => __('Description.', 'techex-hp'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => 'dashicons-id',
			'show_in_menu' 		 => 'header-footer',
			'rewrite'            => array('slug' => 'header'),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array('title','elementor', 'editor', 'thumbnail',  'page-attributes')
		);
		register_post_type('techex_header', $args);
	}

	public function techex_footer()
	{
		$labels = array(
			'name'               => _x('Footer', 'post type general name', 'techex-hp'),
			'singular_name'      => _x('Footer', 'post type singular name', 'techex-hp'),
			'menu_name'          => _x('Footer', 'admin menu', 'techex-hp'),
			'name_admin_bar'     => _x('Footer', 'add new on admin bar', 'techex-hp'),
			'add_new'            => __('Add New Footer', 'techex-hp'),
			'add_new_item'       => __('Add New Footer', 'techex-hp'),
			'new_item'           => __('New Footer', 'techex-hp'),
			'edit_item'          => __('Edit Footer', 'techex-hp'),
			'view_item'          => __('View Footer', 'techex-hp'),
			'all_items'          => __('All Footers', 'techex-hp'),
			'search_items'       => __('Search Footers', 'techex-hp'),
			'parent_item_colon'  => __('Parent :', 'techex-hp'),
			'not_found'          => __('No Footers found.', 'techex-hp'),
			'not_found_in_trash' => __('No Footers found in Trash.', 'techex-hp')
		);
		$args = array(
			'labels'             => $labels,
			'description'        => __('Description.', 'techex-hp'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => 'dashicons-id',
			'rewrite'            => array('slug' => 'footer'),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => null,
			'show_in_menu' 		 => 'header-footer',
			'supports'           => array('title','elementor', 'editor', 'thumbnail',  'page-attributes')
		);
		register_post_type('techex_footer', $args);
	}

	/**
	 *
	 * techex Service Custom Post Type
	 *
	 */
	public function techex_service()
	{
		$labels = array(
			'name'               => _x('Service', 'post type general name', 'techex-hp'),
			'singular_name'      => _x('Service', 'post type singular name', 'techex-hp'),
			'menu_name'          => _x('Service', 'admin menu', 'techex-hp'),
			'name_admin_bar'     => _x('Service', 'add new on admin bar', 'techex-hp'),
			'add_new'            => __('Add New Service', 'techex-hp'),
			'add_new_item'       => __('Add New Service', 'techex-hp'),
			'new_item'           => __('New Service', 'techex-hp'),
			'edit_item'          => __('Edit Service', 'techex-hp'),
			'view_item'          => __('View Service', 'techex-hp'),
			'all_items'          => __('All Services', 'techex-hp'),
			'search_items'       => __('Search Services', 'techex-hp'),
			'parent_item_colon'  => __('Parent :', 'techex-hp'),
			'not_found'          => __('No Services found.', 'techex-hp'),
			'not_found_in_trash' => __('No Services found in Trash.', 'techex-hp')
		);
		$args = array(
			'labels'             => $labels,
			'description'        => __('Description.', 'techex-hp'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => 'dashicons-megaphone',
			'rewrite'            => array('slug' => 'service', 'with_front' => true, 'pages' => true, 'feeds' => true),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array('elementor', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
		);
		register_post_type('service', $args);
	}
	public function techex_service_category()
	{
		$labels = array(
			'name'              => _x('Categories', 'taxonomy general name', 'techex-hp'),
			'singular_name'     => _x('Category', 'taxonomy singular name', 'techex-hp'),
			'search_items'      => __('Search Categories', 'techex-hp'),
			'all_items'         => __('All Categories', 'techex-hp'),
			'parent_item'       => __('Parent Category', 'techex-hp'),
			'parent_item_colon' => __('Parent Category:', 'techex-hp'),
			'edit_item'         => __('Edit Category', 'techex-hp'),
			'update_item'       => __('Update Category', 'techex-hp'),
			'add_new_item'      => __('Add New Category', 'techex-hp'),
			'new_item_name'     => __('New Category Name', 'techex-hp'),
			'menu_name'         => __('Category', 'techex-hp'),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'service-category'),
		);
		register_taxonomy('service-category', array('service'), $args);
	}
	public function techex_service_tags()
	{
		$labels = array(
			'name'              => _x('Tags', 'taxonomy general name', 'techex-hp'),
			'singular_name'     => _x('Tag', 'taxonomy singular name', 'techex-hp'),
			'search_items'      => __('Search Tags', 'techex-hp'),
			'all_items'         => __('All Tags', 'techex-hp'),
			'parent_item'       => __('Parent Tag', 'techex-hp'),
			'parent_item_colon' => __('Parent Tag:', 'techex-hp'),
			'edit_item'         => __('Edit Tag', 'techex-hp'),
			'update_item'       => __('Update Tag', 'techex-hp'),
			'add_new_item'      => __('Add New Tag', 'techex-hp'),
			'new_item_name'     => __('New Tag Name', 'techex-hp'),
			'menu_name'         => __('Tag', 'techex-hp'),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'pf-tag'),
		);
		register_taxonomy('service-tag', array('service'), $args);
	}
	/**
	 *
	 * Techex Team Post Type
	 *
	 */
	public function techex_team()
	{
		$labels = array(
			'name'               => _x('Team Member', 'post type general name', 'techex-hp'),
			'singular_name'      => _x('Team Member', 'post type singular name', 'techex-hp'),
			'menu_name'          => _x('Team Member', 'admin menu', 'techex-hp'),
			'name_admin_bar'     => _x('Team Member', 'add new on admin bar', 'techex-hp'),
			'add_new'            => __('Add New Member', 'techex-hp'),
			'add_new_item'       => __('Add New Member', 'techex-hp'),
			'new_item'           => __('New Member', 'techex-hp'),
			'edit_item'          => __('Edit Member', 'techex-hp'),
			'view_item'          => __('View Member', 'techex-hp'),
			'all_items'          => __('All Team Members', 'techex-hp'),
			'search_items'       => __('Search Team Members', 'techex-hp'),
			'parent_item_colon'  => __('Parent :', 'techex-hp'),
			'not_found'          => __('No Team Members found.', 'techex-hp'),
			'not_found_in_trash' => __('No Team Members found in Trash.', 'techex-hp')
		);
		$args = array(
			'labels'             => $labels,
			'description'        => __('Description.', 'techex-hp'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => 'dashicons-id',
			'rewrite'            => array('slug' => 'team', 'with_front' => true, 'pages' => true, 'feeds' => true),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array('title', 'editor', 'thumbnail', 'elementor',  'page-attributes')
		);
		register_post_type('team', $args);
	}

	/**
	 *
	 * Techex Portfolio Post Type
	 *
	 */
	public function techex_portfolio()
	{
		$labels = array(
			'name'               => _x('Portfolio', 'post type general name', 'techex-hp'),
			'singular_name'      => _x('Portfolio', 'post type singular name', 'techex-hp'),
			'menu_name'          => _x('Portfolio', 'admin menu', 'techex-hp'),
			'name_admin_bar'     => _x('Portfolio', 'add new on admin bar', 'techex-hp'),
			'add_new'            => __('Add New Portfolio', 'techex-hp'),
			'add_new_item'       => __('Add New Portfolio', 'techex-hp'),
			'new_item'           => __('New Portfolio', 'techex-hp'),
			'edit_item'          => __('Edit Portfolio', 'techex-hp'),
			'view_item'          => __('View Portfolio', 'techex-hp'),
			'all_items'          => __('All Portfolios', 'techex-hp'),
			'search_items'       => __('Search Portfolios', 'techex-hp'),
			'parent_item_colon'  => __('Parent :', 'techex-hp'),
			'not_found'          => __('No Portfolios found.', 'techex-hp'),
			'not_found_in_trash' => __('No Portfolios found in Trash.', 'techex-hp')
		);
		$args = array(
			'labels'             => $labels,
			'description'        => __('Description.', 'techex-hp'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => 'dashicons-id',
			'rewrite'            => array('slug' => 'portfolio', 'with_front' => true, 'pages' => true, 'feeds' => true),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array('title', 'elementor', 'editor', 'thumbnail',  'page-attributes')
		);
		register_post_type('portfolio', $args);
	}
	public function techex_portfolio_category()
	{
		$labels = array(
			'name'              => _x('Categories', 'taxonomy general name', 'techex-hp'),
			'singular_name'     => _x('Category', 'taxonomy singular name', 'techex-hp'),
			'search_items'      => __('Search Categories', 'techex-hp'),
			'all_items'         => __('All Categories', 'techex-hp'),
			'parent_item'       => __('Parent Category', 'techex-hp'),
			'parent_item_colon' => __('Parent Category:', 'techex-hp'),
			'edit_item'         => __('Edit Category', 'techex-hp'),
			'update_item'       => __('Update Category', 'techex-hp'),
			'add_new_item'      => __('Add New Category', 'techex-hp'),
			'new_item_name'     => __('New Category Name', 'techex-hp'),
			'menu_name'         => __('Category', 'techex-hp'),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'portfolio-category'),
		);
		register_taxonomy('portfolio-category', array('portfolio'), $args);
	}
	public function techex_portfolio_tags()
	{
		$labels = array(
			'name'              => _x('Tags', 'taxonomy general name', 'techex-hp'),
			'singular_name'     => _x('Tag', 'taxonomy singular name', 'techex-hp'),
			'search_items'      => __('Search Tags', 'techex-hp'),
			'all_items'         => __('All Tags', 'techex-hp'),
			'parent_item'       => __('Parent Tag', 'techex-hp'),
			'parent_item_colon' => __('Parent Tag:', 'techex-hp'),
			'edit_item'         => __('Edit Tag', 'techex-hp'),
			'update_item'       => __('Update Tag', 'techex-hp'),
			'add_new_item'      => __('Add New Tag', 'techex-hp'),
			'new_item_name'     => __('New Tag Name', 'techex-hp'),
			'menu_name'         => __('Tag', 'techex-hp'),
		);
		$args = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'portfolio-tag'),
		);
		register_taxonomy('portfolio-tag', array('portfolio'), $args);
	}



	//Testimonial
	public function techex_testimonial()
	{
		$labels = array(
			'name'               => _x('Testimonial', 'post type general name', 'techex-hp'),
			'singular_name'      => _x('Testimonial', 'post type singular name', 'techex-hp'),
			'menu_name'          => _x('Testimonial', 'admin menu', 'techex-hp'),
			'name_admin_bar'     => _x('Testimonial', 'add new on admin bar', 'techex-hp'),
			'add_new'            => __('Add New Testimonial', 'techex-hp'),
			'add_new_item'       => __('Add New Testimonial', 'techex-hp'),
			'new_item'           => __('New Testimonial', 'techex-hp'),
			'edit_item'          => __('Edit Testimonial', 'techex-hp'),
			'view_item'          => __('View Testimonial', 'techex-hp'),
			'all_items'          => __('All Testimonial', 'techex-hp'),
			'search_items'       => __('Search Testimonial', 'techex-hp'),
			'parent_item_colon'  => __('Parent :', 'techex-hp'),
			'not_found'          => __('No Testimonial found.', 'techex-hp'),
			'not_found_in_trash' => __('No Testimonial found in Trash.', 'techex-hp')
		);
		$args = array(
			'labels'             => $labels,
			'description'        => __('Description.', 'techex-hp'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => 'dashicons-testimonial',
			'rewrite'            => array('slug' => 'techex_testimonial', 'with_front' => true, 'pages' => true, 'feeds' => true),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array('title', 'editor', 'thumbnail',  'page-attributes')
		);
		register_post_type('techex_testimonial', $args);
	}
	public function techex_testimonial_category()
		{
			$labels = array(
				'name'              => _x('Categories', 'taxonomy general name', 'techex-hp'),
				'singular_name'     => _x('Category', 'taxonomy singular name', 'techex-hp'),
				'search_items'      => __('Search Categories', 'techex-hp'),
				'all_items'         => __('All Categories', 'techex-hp'),
				'parent_item'       => __('Parent Category', 'techex-hp'),
				'parent_item_colon' => __('Parent Category:', 'techex-hp'),
				'edit_item'         => __('Edit Category', 'techex-hp'),
				'update_item'       => __('Update Category', 'techex-hp'),
				'add_new_item'      => __('Add New Category', 'techex-hp'),
				'new_item_name'     => __('New Category Name', 'techex-hp'),
				'menu_name'         => __('Category', 'techex-hp'),
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array('slug' => 'portfolio-category'),
			);
			register_taxonomy('testimonial_category', array('techex_testimonial'), $args);
		}




	//Case Study
	public function techex_case_study()
	{
		$labels = array(
			'name'               => _x('Case Study', 'post type general name', 'techex-hp'),
			'singular_name'      => _x('Case Study', 'post type singular name', 'techex-hp'),
			'menu_name'          => _x('Case Study', 'admin menu', 'techex-hp'),
			'name_admin_bar'     => _x('Case Study', 'add new on admin bar', 'techex-hp'),
			'add_new'            => __('Add New Studies', 'techex-hp'),
			'add_new_item'       => __('Add New Studies', 'techex-hp'),
			'new_item'           => __('New Studies', 'techex-hp'),
			'edit_item'          => __('Edit Studies', 'techex-hp'),
			'view_item'          => __('View Studies', 'techex-hp'),
			'all_items'          => __('All Studies', 'techex-hp'),
			'search_items'       => __('Search Studies', 'techex-hp'),
			'parent_item_colon'  => __('Parent :', 'techex-hp'),
			'not_found'          => __('No Studies found.', 'techex-hp'),
			'not_found_in_trash' => __('No Studies found in Trash.', 'techex-hp')
		);
		$args = array(
			'labels'             => $labels,
			'description'        => __('Description.', 'techex-hp'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => 'dashicons-media-spreadsheet',
			'rewrite'            => array('slug' => 'case-studies', 'with_front' => true, 'pages' => true, 'feeds' => true),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array('title', 'elementor', 'editor', 'excerpt', 'thumbnail',  'page-attributes')
		);
		register_post_type('case-study', $args);
	}

	public function techex_case_study_category()
		{
			$labels = array(
				'name'              => _x('Categories', 'taxonomy general name', 'techex-hp'),
				'singular_name'     => _x('Category', 'taxonomy singular name', 'techex-hp'),
				'search_items'      => __('Search Categories', 'techex-hp'),
				'all_items'         => __('All Categories', 'techex-hp'),
				'parent_item'       => __('Parent Category', 'techex-hp'),
				'parent_item_colon' => __('Parent Category:', 'techex-hp'),
				'edit_item'         => __('Edit Category', 'techex-hp'),
				'update_item'       => __('Update Category', 'techex-hp'),
				'add_new_item'      => __('Add New Category', 'techex-hp'),
				'new_item_name'     => __('New Category Name', 'techex-hp'),
				'menu_name'         => __('Category', 'techex-hp'),
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array('slug' => 'studies_category'),
			);
			register_taxonomy('case-study-category', array('case-study'), $args);
		}

		public function techex_case_study_tags()
		{
			$labels = array(
				'name'              => _x('Tags', 'taxonomy general name', 'techex-hp'),
				'singular_name'     => _x('Tag', 'taxonomy singular name', 'techex-hp'),
				'search_items'      => __('Search Tags', 'techex-hp'),
				'all_items'         => __('All Tags', 'techex-hp'),
				'parent_item'       => __('Parent Tag', 'techex-hp'),
				'parent_item_colon' => __('Parent Tag:', 'techex-hp'),
				'edit_item'         => __('Edit Tag', 'techex-hp'),
				'update_item'       => __('Update Tag', 'techex-hp'),
				'add_new_item'      => __('Add New Tag', 'techex-hp'),
				'new_item_name'     => __('New Tag Name', 'techex-hp'),
				'menu_name'         => __('Tag', 'techex-hp'),
			);
			$args = array(
				'hierarchical'      => false,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array('slug' => 'studies-tag'),
			);
			register_taxonomy('studies-tag', array('case-study'), $args);
		}


}
$techexCcases_stydyInstance = new TechexCustomPosts;
