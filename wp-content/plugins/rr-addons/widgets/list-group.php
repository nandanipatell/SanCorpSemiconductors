<?php
namespace RRdevs_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Widget_Base;

class RRdevs_List_group extends Widget_Base {

	public function get_name() {
		return 'rr-addons-list-group';
	}

	public function get_title() {
		return esc_html__( 'RR List Group', 'rr-addons' );
	}

	public function get_icon() {
		return 'eicon-editor-list-ol';
	}

	public function get_categories() {
		return [ 'rr-addons' ];
	}

	public function get_keywords() {
		return [ 'rrdevs', 'information', 'group', 'list', 'icon', 'socail' ];
	}

	protected function register_controls() {

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'rr_addons_section_list_content',
			[
				'label' => esc_html__( 'Content', 'rr-addons' )
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
            'rr_addons_list_icon_type',
            [
                'label' => __( 'Media Type', 'rr-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'icon',
				'options' => [
					'icon' => [
						'title' => __( 'Icon', 'rr-addons' ),
						'icon' => 'eicon-star',
					],
					'number' => [
						'title' => __( 'Number', 'rr-addons' ),
						'icon' => 'eicon-number-field',
					],
					'image' => [
						'title' => __( 'Image', 'rr-addons' ),
						'icon' => 'eicon-image',
					],
				],
				'toggle' => false,
                'style_transfer' => true,
            ]
        );

		$repeater->add_control(
			'rr_addons_list_icon',
			[
				'label'       => __( 'Icon', 'rr-addons' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'separator'   =>'after',
				'default'     => [
					'value'   => 'far fa-check-circle',
					'library' => 'fa-regular'
				],
				'condition' =>[
					'rr_addons_list_icon_type' => 'icon'
				]
			]
		);

		$repeater->add_control(
			'rr_addons_list_icon_number',
			[
				'label'   => esc_html__( 'Number', 'rr-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( '1', 'rr-addons' ),
				'separator'   =>'after',
				'condition' =>[
					'rr_addons_list_icon_type' => 'number'
				]
			]
		);

		$repeater->add_control(
			'rr_addons_list_icon_number_image',
			[
				'label' => __( 'Choose Image', 'rr-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator'   =>'after',
				'dynamic' => [
					'active' => true,
				],
				'condition' =>[
					'rr_addons_list_icon_type' => 'image'
				]
			]
		);

        $repeater->add_control(
			'rr_addons_list_text',
			[
				'label'   => esc_html__( 'Text', 'rr-addons' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'List Text', 'rr-addons' ),
				'dynamic' => [ 'active' => true ]
			]
		);

		$repeater->add_control(
			'rr_addons_list_link',
			[
				'label' => __( 'List URL', 'rr-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'rr-addons' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'rr_addons_list_group',
			[
				'label' => __( 'List Items', 'elementor' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' => [
					[
						'rr_addons_list_text' => __( 'List Item #1', 'elementor' ),
						'rr_addons_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'rr_addons_list_text' => __( 'List Item #2', 'elementor' ),
						'rr_addons_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'rr_addons_list_text' => __( 'List Item #3', 'elementor' ),
						'rr_addons_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ elementor.helpers.renderIcon( this, rr_addons_list_icon, {}, "i", "panel" ) }}}{{{ rr_addons_list_text }}}'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'rr_addons_section_list_style',
			[
				'label' => esc_html__( 'Container', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'rr_addons_section_list_layout',
			[
				'label' => __( 'Layout', 'rr-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout_1',
				'options' => [
					'layout_1' => __( 'Layout 1', 'rr-addons' ),
					'layout_2' => __( 'Layout 2', 'rr-addons' ),
					'layout_3' => __( 'Layout 3', 'rr-addons' ),
				],
			]
		);

		$this->add_responsive_control(
			'rr_addons_section_list_alignment',
			[
				'label'       => esc_html__( 'Alignment', 'rr-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'rr-addons-list-group-left'   => [
						'title' => esc_html__( 'Left', 'rr-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'rr-addons-list-group-center' => [
						'title' => esc_html__( 'Center', 'rr-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'rr-addons-list-group-right'  => [
						'title' => esc_html__( 'Right', 'rr-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'selectors_dictionary' => [
					'rr-addons-list-group-left' => 'justify-content: flex-start; text-align: left;',
					'rr-addons-list-group-center' => 'justify-content: center; text-align: center;',
					'rr-addons-list-group-right' => 'justify-content: flex-end; text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper' => '{{VALUE}};',
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item' => '{{VALUE}};',
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item a' => '{{VALUE}};',
				],
				'default'     => 'rr-addons-list-group-left',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'rr_addons_section_list_group_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .rr-addons-list-group',
			]
		);

		$this->add_responsive_control(
			'rr_addons_section_list_group_padding',
			[
				'label'      => __( 'Padding', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '0',
                    'left'     => '0',
                    'unit'     => 'px',
                    'isLinked' => true
                ],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-list-group' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'rr_addons_section_list_group_border',
				'selector'  => '{{WRAPPER}} .rr-addons-list-group'
			]
		);

		$this->add_responsive_control(
			'rr_addons_section_list_group_radius',
			[
				'label'        => __( 'Border Radius', 'rr-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .rr-addons-list-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'rr_addons_section_list_group_shadow',
				'selector' => '{{WRAPPER}} .rr-addons-list-group'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'rr_addons_section_list_item_style',
			[
				'label' => esc_html__( 'List Item', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'rr_addons_section_list_item_padding',
			[
				'label'        => __( 'Item Padding', 'rr-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'rr_addons_section_list_item_separator',
            [
				'label'        => __( 'Item Separator', 'rr-addons' ),
				'type'         =>  Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'rr-addons' ),
				'label_off'    => __( 'Hide', 'rr-addons' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'rr_addons_section_list_layout!' => 'layout_3'
				]
			]
        );

		$this->add_responsive_control(
			'rr_addons_section_list_item_separator_width',
			[
				'label' => __( 'Separator Width', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_2 .rr-addons-list-group-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rr_addons_section_list_item_separator' => 'yes',
					'rr_addons_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_section_list_item_separator_height',
			[
				'label' => __( 'Separator Height', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_2 .rr-addons-list-group-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rr_addons_section_list_item_separator' => 'yes',
					'rr_addons_section_list_layout!' => 'layout_3'
				]
			]
		);
        

		$this->add_control(
			'rr_addons_section_list_item_separator_color',
			[
				'label' => __( 'Separator Color', 'rr-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#e5e5e5',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_1 .rr-addons-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_2 .rr-addons-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
				],
				'condition' => [
					'rr_addons_section_list_item_separator' => 'yes',
					'rr_addons_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_list_item_spacing',
			[
				'label' => __( 'Item Spacing', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_3 .rr-addons-list-group-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rr_addons_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'rr_addons_list_item_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_3 .rr-addons-list-group-item',
				'condition' => [
					'rr_addons_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'rr_addons_list_item_border',
				'selector'  => '{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_3 .rr-addons-list-group-item',
				'fields_options'  => [
                    'border' 	  => [
                        'default' => 'solid'
                    ],
                    'width'  	  => [
                        'default' 	 => [
                            'top'    => '1',
                            'right'  => '1',
                            'bottom' => '1',
                            'left'   => '1'
                        ]
                    ],
                    'color' 	  => [
                        'default' => '#e5e5e5',
                    ]
                ],
				'condition' => [
					'rr_addons_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_list_item_radius',
			[
				'label'        => __( 'Border Radius', 'rr-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_3 .rr-addons-list-group-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'rr_addons_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'rr_addons_list_item_shadow',
				'selector' => '{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_3 .rr-addons-list-group-item',
				'condition' => [
					'rr_addons_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Icon Style
		*/
		$this->start_controls_section(
			'rr_addons_section_list_icon_style',
			[
				'label' => esc_html__( 'Icon', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'rr_addons_list_icon_position',
			[
				'label'       => esc_html__( 'Icon Position', 'rr-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'rr-addons-icon-left'   => [
						'title' => esc_html__( 'Left', 'rr-addons' ),
						'icon'  => 'eicon-h-align-left'
					],
					'rr-addons-icon-center' => [
						'title' => esc_html__( 'Center', 'rr-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'rr-addons-icon-right'  => [
						'title' => esc_html__( 'Right', 'rr-addons' ),
						'icon'  => 'eicon-h-align-right'
					]
				],
				'default'     => 'rr-addons-icon-left'
			]
		);

		$this->add_responsive_control(
			'rr_addons_list_icon_alignment',
			[
				'label'       => esc_html__( 'Icon Vertical Alignment', 'rr-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'rr-addons-icon-align-left'   => [
						'title' => esc_html__( 'Top', 'rr-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'rr-addons-icon-align-center' => [
						'title' => esc_html__( 'Center', 'rr-addons' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'rr-addons-icon-align-right'  => [
						'title' => esc_html__( 'Bottom', 'rr-addons' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'rr-addons-icon-align-left',
				'selectors_dictionary' => [
					'rr-addons-icon-align-left' => 'align-items: flex-start;',
					'rr-addons-icon-align-center' => 'align-items: center;',
					'rr-addons-icon-align-right' => 'align-items: flex-end;',
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item' => '{{VALUE}};',
				],
				'condition' => [
					'rr_addons_list_icon_position!' => 'rr-addons-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_list_icon_top_alignment',
			[
				'label'       => esc_html__( 'Icon Alignment', 'rr-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'rr-addons-icon-top-align-left'   => [
						'title' => esc_html__( 'Left', 'rr-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'rr-addons-icon-top-align-center' => [
						'title' => esc_html__( 'Center', 'rr-addons' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'rr-addons-icon-top-align-right'  => [
						'title' => esc_html__( 'Right', 'rr-addons' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'rr-addons-icon-left',
				'selectors_dictionary' => [
					'rr-addons-icon-top-align-left' => 'text-align: left; margin-right: auto;',
					'rr-addons-icon-top-align-center' => 'text-align: center; margin-left: auto; margin-right: auto;',
					'rr-addons-icon-top-align-right' => 'text-align: right; margin-left: auto;',
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon' => '{{VALUE}};',
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon .rr-addons-list-group-icon-image' => '{{VALUE}};',
				],
				'condition' => [
					'rr_addons_list_icon_position' => 'rr-addons-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_section_list_item_icon_spacing',
			[
				'label' => __( 'Icon Right Spacing', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-text' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rr_addons_list_icon_position' => 'rr-addons-icon-left'
				]
			]
		);
		$this->add_responsive_control(
			'rr_addons_section_list_item_icon_left_spacing',
			[
				'label' => __( 'Icon Left Spacing', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rr_addons_list_icon_position' => 'rr-addons-icon-right'
				]
			]
		);
		$this->add_responsive_control(
			'rr_addons_section_list_item_icon_bottom_spacing',
			[
				'label' => __( 'Icon Bottom Spacing', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rr_addons_list_icon_position' => 'rr-addons-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_section_list_item_icon_size',
			[
				'label' => __( 'Icon Size', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon svg' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon .rr-addons-list-group-icon-image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'rr_addons_section_list_item_icon_color',
			[
				'label' => __( 'Icon Color', 'rr-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'rr_addons_section_list_item_image_radius',
			[
				'label'        => __( 'Image Radius', 'rr-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon .rr-addons-list-group-icon-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'rr_addons_list_item_icon_box_enable',
			[
				'label' => __( 'Enable Icon Box', 'rr-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'rr-addons' ),
				'label_off' => __( 'Hide', 'rr-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'rr_addons_list_item_icon_box_width',
			[
				'label' => __( 'Icon Box Width', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon.yes' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_1 .rr-addons-list-group-item .rr-addons-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_2 .rr-addons-list-group-item .rr-addons-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper.layout_3 .rr-addons-list-group-item .rr-addons-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
				],
				'condition' => [
					'rr_addons_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_list_item_icon_box_height',
			[
				'label' => __( 'Icon Box Height', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon.yes' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rr_addons_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'rr_addons_list_item_icon_box_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon.yes',
				'condition' => [
					'rr_addons_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'rr_addons_list_item_icon_box_border',
				'selector'  => '{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon.yes',
				'condition' => [
					'rr_addons_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'rr_addons_list_item_icon_box_radius',
			[
				'label'        => __( 'Border Radius', 'rr-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon.yes' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'rr_addons_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'rr_addons_list_item_icon_box_shadow',
				'selector' => '{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-icon.yes',
				'condition' => [
					'rr_addons_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Text
		*/
		$this->start_controls_section(
			'rr_addons_section_list_text_style',
			[
				'label' => esc_html__( 'Text', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'rr_addons_section_list_text_alignment',
			[
				'label'       => esc_html__( 'Text Alignment', 'rr-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'rr-addons-text-align-left'   => [
						'title' => esc_html__( 'Left', 'rr-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'rr-addons-text-align-center' => [
						'title' => esc_html__( 'Center', 'rr-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'rr-addons-text-align-right'  => [
						'title' => esc_html__( 'Right', 'rr-addons' ),
						'icon'  => 'eicon-text-align-left'
					]
				],
				'default'     => 'rr-addons-text-align-left',
				'selectors_dictionary' => [
					'rr-addons-text-align-left' => 'text-align: left;',
					'rr-addons-text-align-center' => 'text-align: center;',
					'rr-addons-text-align-right' => 'text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-text' => '{{VALUE}};',
				],
				'condition' => [
					'rr_addons_list_icon_position' => 'rr-addons-icon-center'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'rr_addons_section_list_text_typography',
				'label' => __( 'Typography', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-text',
			]
		);

		$this->add_control(
			'rr_addons_section_list_text_color',
			[
				'label' => __( 'Title Color', 'rr-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-list-group .rr-addons-list-group-wrapper .rr-addons-list-group-item .rr-addons-list-group-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="rr-addons-list-group">
			<ul class="rr-addons-list-group-wrapper <?php echo $settings['rr_addons_section_list_layout']; ?>">
				<?php foreach( $settings['rr_addons_list_group'] as $list ) : ?>
				<?php
					$target = $list['rr_addons_list_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $list['rr_addons_list_link']['nofollow'] ? ' rel="nofollow"' : '';
				?>
					<li class="rr-addons-list-group-item <?php echo $settings['rr_addons_list_icon_position']?>">
						<?php if ( !empty( $list['rr_addons_list_link']['url'] ) ) { ?>
						<a href="<?php echo $list['rr_addons_list_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?> >
						<?php } ?>
							<span class="rr-addons-list-group-icon <?php echo $settings['rr_addons_list_item_icon_box_enable']; ?>">
								<?php if ( $list['rr_addons_list_icon_type'] === 'icon' && !empty($list['rr_addons_list_icon']) ){ ?>
									<?php Icons_Manager::render_icon( $list['rr_addons_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
								<?php } ?>
								<?php if ( $list['rr_addons_list_icon_type'] === 'number' && !empty($list['rr_addons_list_icon_type']) ){ ?>
									<div class="rr-addons-list-group-icon-number">
										<?php echo $list['rr_addons_list_icon_number']; ?>
									</div>
								<?php } ?>
								<?php if ( $list['rr_addons_list_icon_type'] === 'image' && !empty($list['rr_addons_list_icon_type']) ){ ?>
									<div class="rr-addons-list-group-icon-image">
										<img src="<?php echo $list['rr_addons_list_icon_number_image']['url'] ?>" alt="<?php echo $list['rr_addons_list_text']; ?>">
									</div>
								<?php } ?>
							</span>
							<?php if ( !empty( $list['rr_addons_list_text'] ) ) { ?>
								<span class="rr-addons-list-group-text">
									<?php echo $list['rr_addons_list_text']; ?>
								</span>
							<?php } ?>
						<?php if ( !empty( $list['rr_addons_list_link']['url'] ) ) { ?>
						</a>
						<?php } ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}
$widgets_manager->register_widget_type( new \RRdevs_Addons\Widgets\RRdevs_List_group() );