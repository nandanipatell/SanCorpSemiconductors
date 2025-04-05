<?php
namespace Finest_Addons\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Widget_Base;
use \Elementor\Repeater;

class Pricing_Box extends Widget_Base {

	//use ElementsCommonFunctions;
	public function get_name() {
		return 'rr-addons-pricing-box';
	}

	public function get_title() {
		return esc_html__( 'Pricing Table Box', 'rr-addons' );
	}

	public function get_icon() {
		return 'eicon-price-list';
	}

	public function get_categories() {
		return [ 'rr-addons' ];
	}

	public function get_keywords() {
        return ['price', 'package', 'product', 'plan', 'finests addon' ];
    }

	protected function register_controls() {

		/**
  		 * Pricing Table Feature
  		 */
  		$this->start_controls_section(
  			'rr_addons_section_pricing_table_feature',
  			[
  				'label' => esc_html__( 'Features', 'rr-addons' )
  			]
		);

		$pricing_repeater = new Repeater();

		$pricing_repeater->add_control(
			'rr_addons_pricing_table_item',
			[
				'name'        => 'rr_addons_pricing_table_item',
				'label'       => esc_html__( 'List Item', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Pricing table list item', 'rr-addons' )
			]
		);

		$pricing_repeater->add_control(
			'rr_addons_pricing_table_list_icon',
			[
				'name'        => 'rr_addons_pricing_table_list_icon',
				'label'       => esc_html__( 'List Icon', 'rr-addons' ),
				'type'        => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-check',
					'library' => 'fa-solid'
				]
			]
		);

		$pricing_repeater->add_control(
			'rr_addons_pricing_table_icon_mood',
			[
				'name'         => 'rr_addons_pricing_table_icon_mood',
				'label'        => esc_html__( 'Item Active?', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes'
			]
        );

  		$this->add_control(
			'rr_addons_pricing_table_items',
			[
				'type'        => Controls_Manager::REPEATER,
				'fields'  => $pricing_repeater->get_controls(),
				'seperator'   => 'before',
				'default'     => [
					[ 'rr_addons_pricing_table_item' => esc_html__( 'Responsive Live', 'rr-addons' ) ],
					[ 'rr_addons_pricing_table_item' => esc_html__( 'Adaptive Bitrate', 'rr-addons' ) ],
					[ 'rr_addons_pricing_table_item' => esc_html__( 'Analytics', 'rr-addons' ) ],
					[
						'rr_addons_pricing_table_item'      => esc_html__( 'Creative Layouts', 'rr-addons' ),
						'rr_addons_pricing_table_icon_mood' => 'no'
					],
					[
						'rr_addons_pricing_table_item'      => esc_html__( 'Free Support', 'rr-addons' ),
						'rr_addons_pricing_table_icon_mood' => 'no'
					]
				],
				'title_field' => '{{rr_addons_pricing_table_item}}'
			]
		);

		$this->end_controls_section();

		/**
  		 * Pricing Table Promo label
  		 */
  		$this->start_controls_section(
			'rr_addons_section_pricing_table_promo_section',
			[
				'label' => esc_html__( 'Promo Label', 'rr-addons' )
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_promo_enable',
			[
				'label'        => esc_html__( 'Promo Label?', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no'
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_promo_title',
			[
				'label'       => esc_html__( 'Title', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( 'Recommended', 'rr-addons' ),
				'condition'   => [
					'rr_addons_pricing_table_promo_enable' => 'yes'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_promo_position',
			[
				'label'        => __( 'Position', 'rr-addons' ),
				'type'         => Controls_Manager::SELECT,
				'default'      => 'promo_top',
				'options'      => [
					'promo_top'    => __( 'Top', 'rr-addons' ),
					'promo_bottom' => __( 'Bottom', 'rr-addons' ),
				],
				'condition'    => [
					'rr_addons_pricing_table_promo_enable' => 'yes'
				]
			]
		);

		$this->end_controls_section();

  		/**
  		 * Pricing Table Settings
  		 */
  		$this->start_controls_section(
  			'rr_addons_section_pricing_table_settings',
  			[
  				'label' => esc_html__( 'Header', 'rr-addons' )
  			]
  		);

		  $this->add_control(
			'rr_addons_header_image_show',
			[
				'label'        => esc_html__( 'Show Image', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no'
			]
		);
		$this->add_control(
            'image',
            [
                'label'   => __( 'Choose Image', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
				'condition' => [
					'rr_addons_header_image_show' => 'yes'
				]
            ]
        );

  		$this->add_control(
			'rr_addons_pricing_table_title',
			[
				'label'       => esc_html__( 'Title', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( 'STANDARD', 'rr-addons' )
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_subtitle',
			[
				'label'       => esc_html__( 'Subtitle', 'rr-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_featured',
			[
				'label'        => esc_html__( 'Featured?', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no'
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_featured_type',
			[
				'label'     => esc_html__( 'Badge Type', 'rr-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'text-badge',
				'options'   => [
					'text-badge' => __( 'Text Badge', 'rr-addons' ),
					'icon-badge' => __( 'Icon Badge', 'rr-addons' )
				],
				'condition' => [
					'rr_addons_pricing_table_featured' => 'yes'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_featured_tag_text',
			[
				'label'       => esc_html__( 'Featured Text', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( 'FEATURED', 'rr-addons' ),
				'condition'   => [
					'rr_addons_pricing_table_featured'      => 'yes',
					'rr_addons_pricing_table_featured_type' => 'text-badge'
				]
			]
		);

  		$this->end_controls_section();

  		$this->start_controls_section(
  			'rr_addons_section_pricing_table_price',
  			[
  				'label' => esc_html__( 'Price', 'rr-addons' )
  			]
		);

		$this->add_control(
			'rr_addons_pricing_table_price',
			[
				'label'       => esc_html__( 'Price', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( '50', 'rr-addons' )
			]
		);

  		$this->add_control(
			'rr_addons_pricing_table_price_cur',
			[
				'label'       => esc_html__( 'Price Currency', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( '$', 'rr-addons' )
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_price_cur_position',
			[
				'label'       => esc_html__( 'Currency Position', 'rr-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'	  => false,
				'label_block' => false,
				'default'     => 'rr-addons-pricing-cur-left',
				'options'     => [
					'rr-addons-pricing-cur-left' => [
						'title' => __( 'Left', 'rr-addons' ),
						'icon'  => 'eicon-angle-left'
					],
					'rr-addons-pricing-cur-right' => [
						'title' => __( 'Right', 'rr-addons' ),
						'icon'  => 'eicon-angle-right'
					]
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_price_by',
			[
				'label'       => esc_html__( 'Price By', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( 'mo', 'rr-addons' )
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_period_separator',
			[
				'label'       => esc_html__( 'Separated By', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( '/', 'rr-addons' )
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_discount_price',
			[
				'label' => __( 'Show Discount Price', 'rr-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'rr-addons' ),
				'label_off' => __( 'Hide', 'rr-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_regular_price',
			[
				'label'       => esc_html__( 'Ragular Price', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( '50', 'rr-addons' ),
				'condition'   => [
					'rr_addons_pricing_table_discount_price' => 'yes'
				]
			]
		);

  		$this->add_control(
			'rr_addons_pricing_table_regular_price_cur',
			[
				'label'       => esc_html__( 'Regular Price Currency', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( '$', 'rr-addons' ),
				'condition'   => [
					'rr_addons_pricing_table_discount_price' => 'yes'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_price_subtitle',
			[
				'label'       => esc_html__( 'Price Subtitle', 'rr-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

  		$this->end_controls_section();



  		/**
  		 * Pricing Table Footer
  		 */
  		$this->start_controls_section(
  			'rr_addons_section_pricing_table_button',
  			[
  				'label' => esc_html__( 'Button', 'rr-addons' )
  			]
		);


		$this->add_control(
			'rr_addons_pricing_table_btn_position',
			[
				'label'   => esc_html__( 'Position', 'rr-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'bottom',
				'options' => [
					'middle' => __( 'Middle', 'rr-addons' ),
					'bottom' => __( 'Bottom', 'rr-addons' )
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_btn',
			[
				'label'       => esc_html__( 'Text', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Choose Plan', 'rr-addons' )
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_btn_link',
			[
				'label'       => esc_html__( 'Link', 'rr-addons' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'default'     => [
					'url'         => '#',
					'is_external' => ''
     			],
     			'show_external' => true
			]
		);

		$this->end_controls_section();

		  /**
  		 * Pricing Table Note
  		 */
  		$this->start_controls_section(
			'rr_addons_section_pricing_table_note',
			[
				'label' => esc_html__( 'Note', 'rr-addons' )
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_note_text',
			[
				'label' => __( 'Text', 'rr-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 5,
			]
		);

		$this->end_controls_section();



		/**
		 * -------------------------------------------
		 * Style (Promo label)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'rr_addons_section_pricing_table_promo_style',
			[
				'label'     => esc_html__( 'Promo Label', 'rr-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'rr_addons_pricing_table_promo_enable' => 'yes'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_promo_alignment',
			[
				'label'     => __( 'Alignment', 'rr-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'toggle'    => false,
				'options'   => [
					'left'      => [
						'title' => __( 'Left', 'rr-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'center'    => [
						'title' => __( 'Center', 'rr-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'right'     => [
						'title' => __( 'Right', 'rr-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-promo-label' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'rr_addons_pricing_table_promo_background',
				'types'     => [ 'classic', 'gradient' ],
				'fields_options'  => [
					'background'  => [
						'default' => 'classic'
					],
					'color'       => [
						'default' => '#ffffff'
					]
				],
				'selector'  => '{{WRAPPER}} .rr-addons-pricing-table-promo-label',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_promo_typography',
				'label'    => __( 'Typography', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-promo-label',
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_promo_text-color',
			[
				'label'     => esc_html__( 'Text Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-promo-label' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_promo_padding',
			[
				'label'      => __( 'Padding', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'      => '15',
					'right'    => '30',
					'bottom'   => '15',
					'left'     => '30',
					'unit'     => 'px',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-promo-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_promo_radius',
			[
				'label'      => __( 'Border radius', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => true
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-promo-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Style (Header)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'rr_addons_section_pricing_table_title_header_settings',
			[
				'label' => esc_html__( 'Header', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_header_type',
			[
				'label'   => esc_html__( 'Header Type', 'rr-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'simple',
				'options' => [
					'simple'        => __( 'Simple', 'rr-addons' ),
					'curved-header' => __( 'Curved Header', 'rr-addons' )
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'rr_addons_pricing_table_header_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .rr-addons-pricing-table-header',
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_header_padding',
			[
				'label'      => __( 'Padding', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_header_margin',
			[
				'label'      => __( 'Margin', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '20',
					'left'     => '0',
					'isLinked' => false
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		/*
        *Image
        */
        $this->start_controls_section('box_iamge',
            [
                'label' => __('Image', 'apptop-hp'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'      => 'image_border',
                'selector'  => '{{WRAPPER}} .pricing-image img',
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'image_box_shadow',
                'exclude'  => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .pricing-image img',
            ]
        );

        $this->add_responsive_control(
            'width',
            [
                'label'          => __('Width', 'apptop-hp'),
                'type'           => Controls_Manager::SLIDER,
                'size_units'     => ['%', 'px','vw'],
                'range'          => [
                    '%'  => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .pricing-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'space',
            [
                'label'          => __('Max Width', 'apptop-hp'),
                'type'           => Controls_Manager::SLIDER,
                'size_units'     => ['px', '%', 'vw'],
                'range'          => [
                    '%'  => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .pricing-image img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'height',
            [
                'label'          => __('Height', 'apptop-hp'),
                'type'           => Controls_Manager::SLIDER,
                'size_units'     => ['px', 'vh'],
                'range'          => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .pricing-image img' => 'height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'object-fit',
            [
                'label'     => __('Object Fit', 'apptop-hp'),
                'type'      => Controls_Manager::SELECT,
                'condition' => [
                    'height[size]!' => '',
                ],
                'options'   => [
                    ''        => __('Default', 'apptop-hp'),
                    'fill'    => __('Fill', 'apptop-hp'),
                    'cover'   => __('Cover', 'apptop-hp'),
                    'contain' => __('Contain', 'apptop-hp'),
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .pricing-image img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => __('Margin', 'apptop-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .pricing-image img' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_box_',
            [
                'label'      => __('Border Radius', 'apptop-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .pricing-image img' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Style (Title)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'rr_addons_section_pricing_table_title_style_settings',
			[
				'label' => esc_html__( 'Header Title', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'rr_addons_section_pricing_table_title_heading',
			[
				'label'     => esc_html__( 'Title', 'rr-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' =>  'before'
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_title_color',
			[
				'label'     => esc_html__( 'Text Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#8a8d91',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-title' => 'color: {{VALUE}};'
				]
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_title_typography',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-title',
				'fields_options'   => [
					'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 15
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '400'
		            ]
	            ]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '20',
					'left'     => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		/**
		 * -------------------------------------------
		 * Style (Sub Title)
		 * -------------------------------------------
		 */

		$this->add_control(
			'rr_addons_section_pricing_table_subtitletitle_heading',
			[
				'label'     => esc_html__( 'Sub Title', 'rr-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' =>  'before'
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_subtitle_color',
			[
				'label'     => esc_html__( 'Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-subtitle' => 'color: {{VALUE}};'
				]
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_subtitle_typography',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-subtitle'
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_subtitle_margin',
			[
				'label'   => esc_html__( 'Margin', 'rr-addons' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'default' => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '10',
					'left'     => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Style (Pricing)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'rr_addons_section_pricing_table_price_style_settings',
			[
				'label' => esc_html__( 'Pricing', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_price_box_separator',
			[
				'label'        => esc_html__( 'Enable Separator', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'rr-addons' ),
				'label_off'    => __( 'OFF', 'rr-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes'
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_price_box_separator_height',
			[
				'label'     => esc_html__( 'Separator Height', 'rr-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '1',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-price-bottom-separator' => 'height: {{VALUE}}px;'
				],
				'condition' => [
					'rr_addons_pricing_table_price_box_separator' => 'yes'
				]

			]
		);

		$this->add_control(
			'rr_addons_pricing_table_price_box_separator_color',
			[
				'label'     => esc_html__( 'Separator Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#e5e5e5',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-price-bottom-separator'  => 'background-color: {{VALUE}};'
				],
				'condition' => [
					'rr_addons_pricing_table_price_box_separator' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_price_box_separator_spacing',
			[
				'label'       => esc_html__( 'Separator Spacing', 'rr-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => [
					'size'    => 30
				],
				'range'       => [
					'px'      => [
						'max' => 50
					]
				],
				'selectors'   => [
					'{{WRAPPER}} .rr-addons-price-bottom-separator' => 'margin: {{SIZE}}px 0;'
				],
				'condition'   => [
					'rr_addons_pricing_table_price_box_separator' => 'yes'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_price_box',
			[
				'label'        => esc_html__( 'Price Box', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'rr-addons' ),
				'label_off'    => __( 'OFF', 'rr-addons' ),
				'separator'	   => 'before',
				'return_value' => 'yes',
				'default'      => 'no'
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_price_box_height',
			[
				'label'     => __( 'Box Height', 'rr-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '100',
				'selectors' => [
					'{{WRAPPER}} .price-box' => 'height: {{VALUE}}px'
				],
				'condition' => [
					'rr_addons_pricing_table_price_box' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_price_box_width',
			[
				'label'     => __( 'Box Width', 'rr-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '100',
				'selectors' => [
					'{{WRAPPER}} .price-box' => 'width: {{VALUE}}px'
				],
				'condition' => [
					'rr_addons_pricing_table_price_box' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'rr_addons_pricing_table_price_box_background',
				'types'     => [ 'classic', 'gradient'],
				'selector'  => '{{WRAPPER}} .price-box',
				'condition' => [
					'rr_addons_pricing_table_price_box' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'rr_addons_pricing_table_price_box_border',
				'selector'  => '{{WRAPPER}} .price-box',
				'condition' => [
					'rr_addons_pricing_table_price_box' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_price_box_radius',
			[
				'label'      => __( 'Box Radius', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '50',
					'right'  => '50',
					'bottom' => '50',
					'left'   => '50',
					'unit'   => '%'
				],
				'selectors'  => [
					'{{WRAPPER}} .price-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition'  => [
					'rr_addons_pricing_table_price_box' => 'yes'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_price_tag_heading',
			[
				'label'     => esc_html__( 'Original Price', 'rr-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' =>  'before'
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_pricing_color',
			[
				'label'     => esc_html__( 'Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#132c47',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-price p.rr-addons-pricing-table-new-price'  => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_price_tag_typography',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-price p.rr-addons-pricing-table-new-price',
				'fields_options'   => [
					'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 48
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '600'
		            ],
		              'letter_spacing' => [
		                'default'      => [
		                    'unit'     => 'px',
		                    'size'     => -3.2
		                ]
		            ]
	            ]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_regular_price_heading',
			[
				'label'     => esc_html__( 'Regular Price', 'rr-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' =>  'before',
				'condition' => [
					'rr_addons_pricing_table_discount_price' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_regular_price_typography',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-price.rr-addons-discount-price-yes p.rr-addons-pricing-table-regular-price',
				'condition' => [
					'rr_addons_pricing_table_discount_price' => 'yes'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_regular_price_color',
			[
				'label'     => esc_html__( 'Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#132c47',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-price.rr-addons-discount-price-yes p.rr-addons-pricing-table-regular-price' => 'color: {{VALUE}};'
				],
				'condition' => [
					'rr_addons_pricing_table_discount_price' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_regular_price_right_spacing',
			[
				'label'       => esc_html__( 'Regular Price Right Spacing', 'rr-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => [
					'size'    => 10
				],
				'range'       => [
					'px'      => [
						'max' => 100
					]
				],
				'selectors'   => [
					'{{WRAPPER}} .rr-addons-pricing-table-price.rr-addons-discount-price-yes p.rr-addons-pricing-table-regular-price' => 'margin-right: {{SIZE}}px;'
				],
				'condition' => [
					'rr_addons_pricing_table_discount_price' => 'yes'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_pricing_curency_heading',
			[
				'label'     => esc_html__( 'Pricing Curency', 'rr-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_pricing_curency_spacing',
			[
				'label' => __( 'Spacing', 'rr-addons' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __( 'Default', 'rr-addons' ),
				'label_on' => __( 'Custom', 'rr-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->start_popover();

			$this->add_responsive_control(
				'rr_addons_pricing_table_pricing_curency_bottom_spacing',
				[
					'label'      => esc_html__( 'Bottom Spacing', 'rr-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px'     => [
							'min'  => -100,
							'max'  => 100,
							'step' => 1
						],
					],
					'selectors'  => [
						'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-price span.rr-addons-pricing-table-currency' => 'top: {{SIZE}}{{UNIT}};'
					],
				]
			);

            $this->add_responsive_control(
				'rr_addons_pricing_table_pricing_curency_right_spacing',
				[
					'label'      => esc_html__( 'Right Spacing', 'rr-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px'     => [
							'min'  => 0,
							'max'  => 200,
							'step' => 1
						],
					],
					'selectors'  => [
						'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-price span.rr-addons-pricing-table-currency' => 'margin-right: {{SIZE}}{{UNIT}};'
					],
				]
			);

        $this->end_popover();

		$this->add_control(
			'rr_addons_pricing_table_pricing_curency_color',
			[
				'label'     => esc_html__( 'Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-price span.rr-addons-pricing-table-currency' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_price_curency_typography',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-price span.rr-addons-pricing-table-currency',
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_pricing_period_heading',
			[
				'label'     => esc_html__( 'Pricing By', 'rr-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_pricing_period_color',
			[
				'label'     => esc_html__( 'Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#132c47',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-price span.rr-addons-price-period' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_price_preiod_typography',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-price-period',
				'fields_options'   => [
					'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 20
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '600'
		            ],
		              'letter_spacing' => [
		                'default'      => [
		                    'unit'     => 'px',
		                    'size'     => 0
		                ]
		            ]
	            ]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_price_subtitle_heading',
			[
				'label'     => esc_html__( 'Price Subtitle', 'rr-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_price_subtitle_color',
			[
				'label'     => esc_html__( 'Text Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-price-subtitle' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_price_subtitle_typography',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-price-subtitle',
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_price_subtitle_margin',
			[
				'label'      => __( 'Margin', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
					'unit'   => 'px',
					'islinked' => true
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-price-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();


		/**
		 * -------------------------------------------
		 * Style (Feature List)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'rr_addons_section_pricing_table_style_featured_list_settings',
			[
				'label' => esc_html__( 'Feature List', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_list_item_typography',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-features li'
			]
		);


		$this->add_control(
			'rr_addons_pricing_table_list_item_icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-features li span.rr-addons-pricing-li-icon' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_list_item_color',
			[
				'label'     => esc_html__( 'Item Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#132c47',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-features li' => 'color: {{VALUE}};'
				]
			]
		);



		$this->add_control(
			'rr_addons_pricing_table_list_border_bottom',
			[
				'label'        => __( 'List Border Bottom', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'rr-addons' ),
				'label_off'    => __( 'Hide', 'rr-addons' ),
				'return_value' => 'yes',
				'default'      => 'no'
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_list_border_bottom_style',
			[
				'label'     => __( 'List Border Bottom Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'defailt'   => '#e5e5e5',
				'selectors' => [
					'{{WRAPPER}} .list-border-bottom li:not(:last-child)' => 'border-bottom:1px solid {{VALUE}};'
				],
				'condition' => [
					'rr_addons_pricing_table_list_border_bottom' => 'yes'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_list_disable_item_styling',
			[
				'label'     => esc_html__( 'Disable Items', 'rr-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_list_disable_item_icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#a6a9ad',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-features li.rr-addons-pricing-table-features-disable span.rr-addons-pricing-li-icon' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_list_disable_item_color',
			[
				'label'     => esc_html__( 'Item color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#a6a9ad',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-features li.rr-addons-pricing-table-features-disable' => 'color: {{VALUE}};'
				]
			]
		);

        $this->add_responsive_control(
			'rr_addons_pricing_table_featured_list_icon_size',
			[
				'label'       => esc_html__( 'Icon Size', 'rr-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => [
					'size'    => 12
				],
				'range'       => [
					'px'      => [
						'max' => 24
					]
				],
				'selectors'   => [
					'{{WRAPPER}} .rr-addons-pricing-li-icon' => 'font-size: {{SIZE}}px;'
				]
			]
		);

		$icon_gap = is_rtl() ? 'left' : 'right';

		$this->add_responsive_control(
			'rr_addons_pricing_table_featured_list_icon_space',
			[
				'label'       => esc_html__( 'Icon Space', 'rr-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => [
					'size'    => 7
				],
				'range'       => [
					'px'      => [
						'max' => 24
					]
				],
				'selectors'   => [
					'{{WRAPPER}} .rr-addons-pricing-table-features li .rr-addons-pricing-li-icon' => 'margin-'.$icon_gap.': {{SIZE}}px;'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_list_alignment',
			[
				'label'         => __( 'Alignment', 'rr-addons' ),
				'type'          => Controls_Manager::CHOOSE,
				'toggle'        => false,
				'default'		=> 'center',
				'options'       => [
					'flex-start'      => [
						'title' => __( 'Left', 'rr-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'center'    => [
						'title' => __( 'Center', 'rr-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'flex-end'     => [
						'title' => __( 'Right', 'rr-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-features li' => 'justify-content: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'rr_addons_pricing_table_list_margin',
			[
				'label'      => __( 'Margin All List', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-features' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_list_padding',
			[
				'label'      => __( 'Padding', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'      => '10',
					'right'    => '0',
					'bottom'   => '10',
					'left'     => '0',
					'isLinked' => false
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-features li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);
		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Pricing Table Featured Tag Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'rr_addons_section_pricing_table_featured_tag_settings',
			[
				'label'     => esc_html__( 'Featured Badge', 'rr-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'rr_addons_pricing_table_featured' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_featured_tag_font_size',
			[
				'label'       => esc_html__( 'Font Size', 'rr-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => [
					'size'    => 12
				],
				'range'       => [
					'px'      => [
						'max' => 40
					]
				],
				'selectors'   => [
					'{{WRAPPER}} .text-badge'   => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .icon-badge i' => 'font-size: {{SIZE}}px;'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_featured_tag_text_color',
			[
				'label'     => esc_html__( 'Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .text-badge'   => 'color: {{VALUE}};',
					'{{WRAPPER}} .icon-badge i' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'rr_addons_pricing_table_featured_text_badge_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .text-badge',
				'condition' => [
					'rr_addons_pricing_table_featured_type' => 'text-badge'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'rr_addons_pricing_table_featured_icon_badge_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .icon-badge',
				'condition' => [
					'rr_addons_pricing_table_featured_type' => 'icon-badge'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Button Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'rr_addons_section_pricing_table_btn_style_settings',
			[
				'label' => esc_html__( 'Button', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_btn_typography',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action'
			]
		);

		$this->start_controls_tabs( 'rr_addons_pricing_table_button_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'rr_addons_pricing_table_btn_normal', [ 'label' => esc_html__( 'Normal', 'rr-addons' ) ] );

			$this->add_control(
				'rr_addons_pricing_table_btn_normal_text_color',
				[
					'label'     => esc_html__( 'Text Color', 'rr-addons' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action' => 'color: {{VALUE}};'
					]
				]
			);

			$this->add_control(
				'rr_addons_pricing_table_btn_normal_bg_color',
				[
					'label'     => esc_html__( 'Background Color', 'rr-addons' ),
					'type'      => Controls_Manager::COLOR,
                    'default'   => '#F96331',
					'selectors' => [
						'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action' => 'background-color: {{VALUE}};'
					]
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name'            => 'rr_addons_pricing_table_btn_normal_border',
					'selector'        => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action'
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name'     => 'rr_addons_pricing_table_btn_box_shadow',
					'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action'
				]
			);

			$this->add_responsive_control(
				'price_btn_width',
				[
					'label' => __('Button Width', 'plugin-domain'),
					'type' => Controls_Manager::SLIDER,
					'size_units' => ['px', '%'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 600,

						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],

					'selectors' => [
						'{{WRAPPER}} .rr-addons-pricing-table-action' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'price_btn_height',
				[
					'label' => __('Button Height', 'plugin-domain'),
					'type' => Controls_Manager::SLIDER,
					'size_units' => ['px', '%'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 600,

						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],

					'selectors' => [
						'{{WRAPPER}} .rr-addons-pricing-table-action' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
				);


			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'rr_addons_pricing_table_btn_hover', [ 'label' => esc_html__( 'Hover', 'rr-addons' ) ] );

			$this->add_control(
				'rr_addons_pricing_table_btn_hover_text_color',
				[
					'label'     => esc_html__( 'Text Color', 'rr-addons' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action:hover' => 'color: {{VALUE}};'
					]
				]
			);

			$this->add_control(
				'rr_addons_pricing_table_btn_hover_bg_color',
				[
					'label'     => esc_html__( 'Background Color', 'rr-addons' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#F96331',
					'selectors' => [
						'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action:hover' => 'background-color: {{VALUE}};'
					]
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name'            => 'rr_addons_pricing_table_btn_hover_border',
					'selector'        => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action:hover'
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name'     => 'rr_addons_pricing_table_btn_box_shadow_hover',
					'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action:hover'
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

        $this->add_responsive_control(
			'rr_addons_pricing_table_button_border_radius',
			[
				'label'      => __( 'Border Radius', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '4',
					'right'  => '4',
					'bottom' => '4',
					'left'   => '4'
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_button_padding',
			[
				'label'      => __( 'Padding', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'      => '12',
					'right'    => '30',
					'bottom'   => '12',
					'left'     => '30',
					'isLinked' => false
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_button_margin',
			[
				'label'      => __( 'Margin', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'      => '30',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => false
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-action' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Note Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'rr_addons_section_pricing_table_note_style',
			[
				'label' => esc_html__( 'Note', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_note_alignment',
			[
				'label'         => __( 'Alignment', 'rr-addons' ),
				'type'          => Controls_Manager::CHOOSE,
				'toggle'        => false,
				'default'		=> 'center',
				'options'       => [
					'left'      => [
						'title' => __( 'Left', 'rr-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'center'    => [
						'title' => __( 'Center', 'rr-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'right'     => [
						'title' => __( 'Right', 'rr-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-note' => 'text-align: {{VALUE}};'
				]
			]
		);



		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'rr_addons_section_pricing_table_note_background',
				'label' => __( 'Background', 'rr-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-note',
			]
		);

		$this->add_control(
			'rr_addons_section_pricing_table_note_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-note' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_section_pricing_table_note_text_typography',
				'label'    => __( 'Typography', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-note',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'rr_addons_section_pricing_table_note_border',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-note'
			]
		);
		$this->add_responsive_control(
			'rr_addons_section_pricing_table_note_border_radius',
			[
				'label'      => __( 'Border Radius', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => false
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-note' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

        $this->add_responsive_control(
			'rr_addons_section_pricing_table_note_padding',
			[
				'label'      => __( 'Padding', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'isLinked' => false
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-note' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_section_pricing_table_note_margin',
			[
				'label'      => __( 'Margin', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'      => '',
					'right'    => '',
					'bottom'   => '',
					'left'     => '',
					'isLinked' => false
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-wrapper .rr-addons-pricing-table-note' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

        /**
		 * -------------------------------------------
		 * Tab Style (Pricing Table Style)
		 * -------------------------------------------
		 */

		$this->start_controls_section(
			'rr_addons_section_pricing_tables_styles_presets',
			[
				'label' => esc_html__( 'Box', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'rr_addons_pricing_table_bg_color_simple',
				'label' => __( 'Background', 'rr-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'fields_options'  => [
					'background'  => [
						'default' => 'classic'
					],
					'color'       => [
						'default' => '#ffffff'
					]
				],
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-badge-wrapper',
				'condition' => [
					'rr_addons_pricing_table_header_type' => 'simple'
				]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'rr-addons' ),
				'seperator' => 'before',
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-badge-wrapper' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .rr-addons-pricing-table-header .rr-addons-pricing-table-header-curved svg path' => 'fill: {{VALUE}};'
				],
				'condition' => [
					'rr_addons_pricing_table_header_type' => 'curved-header'
				]
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_content_border',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-badge-wrapper'
			]
		);


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_content_box_shadow',
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-badge-wrapper',
				'fields_options'         => [
		            'box_shadow_type'    => [
		                'default'        =>'yes'
		            ],
		            'box_shadow'         => [
		                'default'        => [
		                    'horizontal' => 0,
		                    'vertical'   => 13,
		                    'blur'       => 33,
		                    'spread'     => 0,
		                    'color'      => 'rgba(51,77,128,0.08)'
		                ]
		            ]
	            ]
			]
		);

		$content_align = is_rtl() ? 'right' : 'left';

		$this->add_control(
			'rr_addons_pricing_table_content_alignment',
			[
				'label'         => __( 'Alignment', 'rr-addons' ),
				'type'          => Controls_Manager::CHOOSE,
				'toggle'        => false,
				'separator'     => 'after',
				'default'       => $content_align,
				'options'       => [
					'left'      => [
						'title' => __( 'Left', 'rr-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'center'    => [
						'title' => __( 'Center', 'rr-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'right'     => [
						'title' => __( 'Right', 'rr-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'rr_addons_pricing_table_transition_shadow',
				'label'    => __( 'Hover Box Shadow', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .rr-addons-pricing-table-wrapper:hover .rr-addons-pricing-table-badge-wrapper',
				'fields_options'      => [
		            'box_shadow_type' => [
		                'default'     =>'yes'
		            ],
		            'box_shadow'  => [
		                'default' => [
		                    'horizontal' => 0,
		                    'vertical'   => 20,
		                    'blur'       => 40,
		                    'spread'     => 0,
		                    'color'      => 'rgba(51,77,128,0.2)'
		                ]
		            ]
	            ]
			]
		);

		$this->add_control(
			'rr_addons_pricing_table_transition_type',
			[
				'label'   => __( 'Hover Style', 'rr-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'none'              =>  __( 'None', 'rr-addons' ),
					'transition_top'    =>  __( 'Transition Top', 'rr-addons' ),
					'transition_bottom' => __( 'Transition Bottom', 'rr-addons' ),
					'transition_zoom'   => __( 'Transition Zoom', 'rr-addons' )
				],
				'default' => 'none'
			]
		);

        $this->add_responsive_control(
			'rr_addons_pricing_table_content_padding',
			[
				'label'      => __( 'Padding', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'      => '45',
					'right'    => '30',
					'bottom'   => '45',
					'left'     => '30',
					'isLinked' => false
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-pricing-table-badge-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_pricing_table_content_border_radius',
			[
				'label'      => __( 'Border Radius', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
                    'top'      => '10',
                    'right'    => '10',
                    'bottom'   => '10',
                    'left'     => '10',
                    'unit'     => 'px'
                ],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-pricing-table-badge-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .rr-addons-pricing-table-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} 0 0;',
					'{{WRAPPER}} .rr-addons-pricing-table-header .rr-addons-pricing-table-header-svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} 0 0;'
				]
			]
		);
		$this->end_controls_section();

	}

	private function pricing_table_currency( $currency ) {
		return $currency ? '<span '.$this->get_render_attribute_string( 'rr_addons_pricing_table_price_cur' ).'>'.esc_html( $currency ).'</span>' : '';
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$title         = $settings['rr_addons_pricing_table_title'];
		$sub_title     = $settings['rr_addons_pricing_table_subtitle'];
		$price         = $settings['rr_addons_pricing_table_price'];
		$separator     = $settings['rr_addons_pricing_table_period_separator'];
		$price_by      = $settings['rr_addons_pricing_table_price_by'];
		$featured_text = $settings['rr_addons_pricing_table_featured_tag_text'];

		$this->add_render_attribute(
			'rr_addons_pricing_table_wrapper',
			[
				'class' => [
					'rr-addons-pricing-table-wrapper',
					'rr-addons-pricing-table',
					esc_attr( $settings['rr_addons_pricing_table_content_alignment'] ),
					esc_attr( $settings['rr_addons_pricing_table_transition_type'] )
				]
			]
		);

		$this->add_render_attribute( 'rr_addons_pricing_table_featured_tag_text', 'class', 'rr-addons-pricing-featured-tag-text' );
		$this->add_inline_editing_attributes( 'rr_addons_pricing_table_featured_tag_text', 'none' );

		$this->add_render_attribute( 'rr_addons_pricing_table_promo_title', 'class', 'rr-addons-pricing-table-promo-label' );
		$this->add_inline_editing_attributes( 'rr_addons_pricing_table_promo_title', 'none' );

		$this->add_render_attribute( 'rr_addons_pricing_table_title', 'class', 'rr-addons-pricing-table-title' );
		$this->add_inline_editing_attributes( 'rr_addons_pricing_table_title', 'basic' );

		$this->add_render_attribute( 'rr_addons_pricing_table_subtitle', 'class', 'rr-addons-pricing-table-subtitle' );
		$this->add_inline_editing_attributes( 'rr_addons_pricing_table_subtitle', 'basic' );

		$this->add_render_attribute( 'rr_addons_pricing_table_box_value', 'class', [ 'rr-addons-pricing-table-price', 'rr-addons-discount-price-'.$settings['rr_addons_pricing_table_discount_price'] ] );

		if( 'yes' === $settings['rr_addons_pricing_table_price_box'] ){
			$this->add_render_attribute( 'rr_addons_pricing_table_box_value', 'class', 'price-box' );
		}

		$this->add_render_attribute( 'rr_addons_pricing_table_price_cur', 'class', 'rr-addons-pricing-table-currency' );
		$this->add_inline_editing_attributes( 'rr_addons_pricing_table_price_cur', 'none' );

		$this->add_render_attribute( 'rr_addons_pricing_table_period_separator', 'class', 'rr-addons-pricing-table-currency-separator' );
		$this->add_inline_editing_attributes( 'rr_addons_pricing_table_period_separator', 'none' );

		$this->add_render_attribute( 'rr_addons_pricing_table_price_by', 'class', 'rr-addons-pricing-table-price-by' );
		$this->add_inline_editing_attributes( 'rr_addons_pricing_table_price_by', 'none' );

		$this->add_render_attribute( 'rr_addons_pricing_table_price', 'class', 'rr-addons-pricing-table-price' );
		$this->add_inline_editing_attributes( 'rr_addons_pricing_table_price', 'none' );

		$this->add_render_attribute( 'rr_addons_pricing_table_features', 'class', 'rr-addons-pricing-table-features' );
		if( 'yes' === $settings['rr_addons_pricing_table_list_border_bottom'] ){
			$this->add_render_attribute( 'rr_addons_pricing_table_features', 'class', 'list-border-bottom' );
		}

        $this->add_render_attribute( 'rr_addons_pricing_table_btn_link', 'class', 'rr-addons-pricing-table-action' );
		if( $settings['rr_addons_pricing_table_btn_link']['url'] ) {
            $this->add_render_attribute( 'rr_addons_pricing_table_btn_link', 'href', esc_url( $settings['rr_addons_pricing_table_btn_link']['url'] ) );
	        if( $settings['rr_addons_pricing_table_btn_link']['is_external'] ) {
	            $this->add_render_attribute( 'rr_addons_pricing_table_btn_link', 'target', '_blank' );
	        }
	        if( $settings['rr_addons_pricing_table_btn_link']['nofollow'] ) {
	            $this->add_render_attribute( 'rr_addons_pricing_table_btn_link', 'rel', 'nofollow' );
	        }
        }


        $this->add_inline_editing_attributes( 'rr_addons_pricing_table_btn', 'none' );

		echo '<div '.$this->get_render_attribute_string( 'rr_addons_pricing_table_wrapper' ).'>';
			if( 'promo_top' === $settings['rr_addons_pricing_table_promo_position'] ) {
				if( 'yes' === $settings['rr_addons_pricing_table_promo_enable'] ) {
					echo '<span '.$this->get_render_attribute_string( 'rr_addons_pricing_table_promo_title' ).'>'.$settings['rr_addons_pricing_table_promo_title'].'</span>';
				}
			}
			echo '<div class="rr-addons-pricing-table-badge-wrapper">';

				if ( 'yes' === $settings['rr_addons_pricing_table_featured'] ) {
					echo '<span class="rr-addons-pricing-table-badge '.esc_attr( $settings['rr_addons_pricing_table_featured_type'] ).'">';
						if( 'text-badge' === $settings['rr_addons_pricing_table_featured_type'] && !empty( $featured_text ) ) {
							echo '<span '.$this->get_render_attribute_string( 'rr_addons_pricing_table_featured_tag_text' ).'>';
								echo esc_html( $featured_text );
							echo '</span>';
						}
						if( 'icon-badge' === $settings['rr_addons_pricing_table_featured_type'] ) {
							echo '<i class="demo-icon eicon-star"></i>';
						}
					echo '</span>';
				}

				echo '<div class="rr-addons-pricing-table-header">';
					do_action( 'rr_addons_pricing_table_header_wrapper_before' );

					$title ? printf( '<h4 '.$this->get_render_attribute_string( 'rr_addons_pricing_table_title' ).'>%s</h4>', wp_kses_post( $title ) ) : '';
					/* image */
					if($settings['rr_addons_header_image_show'] == 'yes'):
					echo '<div class="pricing-image">';
						echo '<img src="' . $settings['image']['url'] . '">';
					echo '</div>';
					endif;

					$sub_title ? printf( '<div '.$this->get_render_attribute_string( 'rr_addons_pricing_table_subtitle' ).'>%s</div>', wp_kses_post( $sub_title ) ) : '';

					echo '<div '.$this->get_render_attribute_string( 'rr_addons_pricing_table_box_value' ).'>';
						if( 'yes' === $settings['rr_addons_pricing_table_discount_price'] ){
							echo '<p class="rr-addons-pricing-table-regular-price">';
								echo '<span class="rr-addons-pricing-table-regular-price-cur">'.$settings['rr_addons_pricing_table_regular_price_cur'].'</span>';
								echo '<span class="rr-addons-pricing-table-regular-price-text">'.$settings['rr_addons_pricing_table_regular_price'].'</span>';
							echo '</p>';
						}
						echo '<p class="rr-addons-pricing-table-new-price">';
							if( 'rr-addons-pricing-cur-left' === $settings['rr_addons_pricing_table_price_cur_position'] ) :
								echo $this->pricing_table_currency( $settings['rr_addons_pricing_table_price_cur'] );
							endif;

							$price ? printf( '<span '.$this->get_render_attribute_string( 'rr_addons_pricing_table_price' ).'>%s</span>', esc_html( $price ) ) : '';

							if( 'rr-addons-pricing-cur-right' === $settings['rr_addons_pricing_table_price_cur_position'] ) :
								echo $this->pricing_table_currency( $settings['rr_addons_pricing_table_price_cur'] );
							endif;

							if( $separator || $price_by ) :
								echo '<span class="rr-addons-price-period">';
									$separator ? printf( '<span '.$this->get_render_attribute_string( 'rr_addons_pricing_table_period_separator' ).'>%s</span>', esc_html( $separator ) ) : '';
									$price_by ? printf( '<span '.$this->get_render_attribute_string( 'rr_addons_pricing_table_price_by' ).'>%s</span>', esc_html( $price_by ) ) : '';
								echo '</span>';
							endif;
						echo '</p>';
					echo '</div>';

					if( !empty( $settings['rr_addons_pricing_table_price_subtitle'] ) ){
						echo '<span class="rr-addons-pricing-table-price-subtitle">'. $settings['rr_addons_pricing_table_price_subtitle'] .'</span>';
					}

					if ( 'yes' === $settings['rr_addons_pricing_table_price_box_separator'] ) :
						echo '<div class="rr-addons-price-bottom-separator"></div>';
					endif;

					if( 'curved-header' === $settings['rr_addons_pricing_table_header_type'] ) {
						echo '<div class="rr-addons-pricing-table-header-curved">';
							echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 370 20">';
								echo '<path class="st0" d="M0 20h185C70 20 0 0 0 0v20zM185 20h185V0s-70 20-185 20z" />';
							echo '</svg>';
						echo '</div>';
					}

					do_action( 'rr_addons_pricing_table_header_wrapper_after' );
				echo '</div>';


				if( 'middle' === $settings['rr_addons_pricing_table_btn_position'] && !empty( $settings['rr_addons_pricing_table_btn'] ) ) {
					$this->pricing_table_btn();
				}

				do_action( 'rr_addons_pricing_table_content_wrapper_before' );

				if ( is_array( $settings['rr_addons_pricing_table_items'] ) ) :
					echo '<ul '.$this->get_render_attribute_string( 'rr_addons_pricing_table_features' ).'>';
						foreach( $settings['rr_addons_pricing_table_items'] as $index => $item ) :

							$each_pricing_item = 'link_' . $index;
							$icon_mod = 'yes' !== $item['rr_addons_pricing_table_icon_mood'] ? 'rr-addons-pricing-table-features-disable' : 'rr-addons-pricing-table-features-enable';
							$this->add_render_attribute( $each_pricing_item, 'class', [
								esc_attr( $icon_mod ),
								'elementor-repeater-item-'.esc_attr( $item['_id'] )
							] );

							$pricing_item = $this->get_repeater_setting_key( 'rr_addons_pricing_table_item', 'rr_addons_pricing_table_items', $index );
							$this->add_render_attribute( $pricing_item, 'class', 'rr-addons-pricing-item' );
							$this->add_inline_editing_attributes( $pricing_item, 'none' );
							$price = $item['rr_addons_pricing_table_item'];

							echo '<li '.$this->get_render_attribute_string( $each_pricing_item ).'>';
								if ( !empty( $item['rr_addons_pricing_table_list_icon']['value'] ) ) {
									echo '<span class="rr-addons-pricing-li-icon">';
										Icons_Manager::render_icon( $item['rr_addons_pricing_table_list_icon'] );
									echo '</span>									';
								}
								$price ? printf( '<span '.$this->get_render_attribute_string( $pricing_item ).'>%s</span>', esc_html( $price ) ) : '';
							echo '</li>';

						endforeach;
					echo '</ul>';
				endif;

				do_action( 'rr_addons_pricing_table_content_wrapper_after' );

				if( 'bottom' === $settings['rr_addons_pricing_table_btn_position'] && !empty( $settings['rr_addons_pricing_table_btn'] ) ) {
					$this->pricing_table_btn();
				}
				if( !empty( $settings['rr_addons_pricing_table_note_text'] ) ){
					echo '<div class="rr-addons-pricing-table-note">'.$settings['rr_addons_pricing_table_note_text'].'</div>';
				}
			echo '</div>';
			if( 'promo_bottom' === $settings['rr_addons_pricing_table_promo_position'] ) {
				if( 'yes' === $settings['rr_addons_pricing_table_promo_enable'] ) {
					echo '<span '.$this->get_render_attribute_string( 'rr_addons_pricing_table_promo_title' ).'>'.$settings['rr_addons_pricing_table_promo_title'].'</span>';
				}
			}
		echo '</div>';
	}

    private function pricing_table_btn() {
		echo '<a '.$this->get_render_attribute_string( 'rr_addons_pricing_table_btn_link' ).'>';
			echo '<span '.$this->get_render_attribute_string( 'rr_addons_pricing_table_btn' ).'>';
				echo esc_html( $this->get_settings_for_display( 'rr_addons_pricing_table_btn' ) );
			echo '</span>';
		echo '</a>';
	}
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Elementor\Pricing_Box() );