<?php

// namespace MasterAddons\Modules;

use \Elementor\Controls_Manager;

/**
 * Author Name: Finestdevs
 * Author URL: https://rr-addons.com/
 * Date:3/17/21
 */

if (!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly.

class RR_Addons_Container_Extras
{

	/*
		 * Instance of this class
		 */
	private static $instance = null;


	public function __construct()
	{

		// Add new controls to advanced tab globally
		add_action("elementor/element/after_section_end", array($this, 'rr_addons_section_add_extra_controls'), 19, 3);
	}


	public function rr_addons_section_add_extra_controls($widget, $section_id, $args)
	{

		// Anchor element sections
		$target_sections = array('section_custom_css');

		if (!defined('ELEMENTOR_PRO_VERSION')) {
			$target_sections[] = 'section_custom_css_pro';
		}

		if (!in_array($section_id, $target_sections)) {
			return;
		}

		// Adds extra options
		// ---------------------------------------------------------------------
		$widget->start_controls_section(
			'rr_addons_section_advanced_container_extra',
			array(
				'label'     => RR_ADDONS_BADGE . __('Element Control','finestdev'),
				'tab'       => Controls_Manager::TAB_ADVANCED
			)
		);

		$widget->add_responsive_control(
			'rr_addons_max_width',
			array(
				'label'      => __('Max Width','finestdev'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array('px', 'em', '%', 'vw'),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 1
					),
					'%' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					),
					'em' => array(
						'min'  => 0,
						'step' => 1
					),
					'vw' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					)
				),
				'selectors' => array(
					'{{WRAPPER}}' => 'max-width:{{SIZE}}{{UNIT}};'
				)
			)
		);

		$widget->add_responsive_control(
			'rr_addons_max_height',
			array(
				'label'      => __('Max Height','finestdev'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array('px', 'em', '%', 'vh'),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 1
					),
					'%' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					),
					'em' => array(
						'min'  => 0,
						'step' => 1
					),
					'vh' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					)
				),
				'selectors' => array(
					'{{WRAPPER}}' => 'max-height:{{SIZE}}{{UNIT}};'
				),
				'separator'       => 'after'
			)
		);

		$widget->add_responsive_control(
			'rr_addons_min_width',
			array(
				'label'      => __('Min Width','finestdev'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array('px', 'em', '%', 'vw'),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 1
					),
					'%' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					),
					'em' => array(
						'min'  => 0,
						'step' => 1
					),
					'vw' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					)
				),
				'selectors' => array(
					'{{WRAPPER}}' => 'min-width:{{SIZE}}{{UNIT}};'
				)
			)
		);

		$widget->add_responsive_control(
			'rr_addons_min_height',
			array(
				'label'      => __('Min Height','finestdev'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array('px', 'em', '%', 'vh'),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 1
					),
					'%' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					),
					'em' => array(
						'min'  => 0,
						'step' => 1
					),
					'vh' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					)
				),
				'selectors' => array(
					'{{WRAPPER}}' => 'min-height:{{SIZE}}{{UNIT}};'
				)
			)
		);

		$widget->end_controls_section();
	}


	public static function get_instance()
	{
		if (!self::$instance) {
			self::$instance = new self;
		}
		return self::$instance;
	}
}

RR_Addons_Container_Extras::get_instance();
