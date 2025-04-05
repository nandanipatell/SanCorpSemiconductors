<?php
namespace Finest_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Control_Media;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Widget_Base;

class rr_addons_accordion extends Widget_Base {

	public function get_name() {
		return 'rr-addons-accordion';
	}

	public function get_title() {
		return esc_html__( 'Accordion', 'rr-addons' );
	}

	public function get_icon() {
		return 'eicon-accordion';
	}


	public function get_keywords() {
		return [ 'acc', 'faq', 'accordion', 'tab' ];
	}

   public function get_categories() {
		return [ 'rr-addons' ];
	}

	protected function register_controls() {
		
  		/**
  		 * Fd Addons Accordion Content Settings
  		 */
  		$this->start_controls_section(
  			'rr_addons_section_exclusive_accordion_content_settings',
  			[
  				'label' => esc_html__( 'Contents', 'rr-addons' )
  			]
  		);

  		$repeater = new Repeater();

        $repeater->start_controls_tabs('rr_addons_accordion_item_tabs');

        $repeater->start_controls_tab('rr_addons_accordion_item_content_tab', ['label' => __('Content', 'rr-addons')]);

        $repeater->add_control(
			'rr_addons_exclusive_accordion_default_active', [
				'label'        => esc_html__( 'Active as Default', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'return_value' => 'yes'
			]
		);

        $repeater->add_control(
			'rr_addons_exclusive_accordion_icon_show', [
				'label'        => esc_html__( 'Enable Title Icon', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'	   => __( 'On', 'rr-addons' ),
				'label_off'    => __( 'Off', 'rr-addons' ),
				'default'      => 'no',
				'return_value' => 'yes'
			]
		);
		
		$repeater->add_control(
			'rr_addons_exclusive_accordion_title_icon',
			[
				'label'       => __( 'Icon', 'rr-addons' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [
					'value'   => 'far fa-user',
					'library' => 'fa-regular'
				],
				'condition'   => [
					'rr_addons_exclusive_accordion_icon_show' => 'yes'
				]
			]
		);

        $repeater->add_control(
			'rr_addons_exclusive_accordion_title', [
				'label'   => esc_html__( 'Title', 'rr-addons' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Accordion Title', 'rr-addons' ),
				'dynamic' => [ 'active' => true ]
			]
		);
		
        $repeater->add_control(
			'rr_addons_exclusive_accordion_content', [
				'label'   => esc_html__( 'Content', 'rr-addons' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', 'rr-addons' )
			]
		);

        $repeater->add_control(
            'rr_addons_accordion_show_read_more_btn',
            [
                'label'        => esc_html__( 'Enable Button.', 'rr-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'	   => __( 'On', 'rr-addons' ),
				'label_off'    => __( 'Off', 'rr-addons' ),
                'default'      => 'no',
                'return_value' => 'yes',
                'separator'	   => 'before'
            ]
        );  

        $repeater->add_control(
            'rr_addons_accordion_read_more_btn_text',
            [   
				'label'       => esc_html__( 'Button Text', 'rr-addons' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__('See Details', 'rr-addons'),
				'default'     => esc_html__('See Details', 'rr-addons' ),
				'condition'   => [
                    '.rr_addons_accordion_show_read_more_btn' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'rr_addons_accordion_read_more_btn_url',
            [   
                'label'         => esc_html__( 'Button Link', 'rr-addons' ),
                'type'          => Controls_Manager::URL,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => ''
                ],
                'show_external'     => true,
                'placeholder'       => __( 'http://your-link.com', 'rr-addons' ),
                'condition'     => [
                    '.rr_addons_accordion_show_read_more_btn' => 'yes'
                ]
            ]
        );

        $repeater->end_controls_tab();

   		$repeater->start_controls_tab('rr_addons_accordion_item_image_tab', ['label' => __('Image', 'rr-addons')]);

        $repeater->add_control(
			'rr_addons_accordion_image', [
				'label' => esc_html__( 'Choose Image', 'rr-addons' ),
				'type'  => Controls_Manager::MEDIA
			]
		);

        $repeater->end_controls_tab();

   		$repeater->start_controls_tab('rr_addons_accordion_item_style_tab', ['label' => __('Style', 'rr-addons')]);

        $repeater->add_control(
            'rr_addons_accordion_each_item_container_style',
            [
				'label' => esc_html__( 'Container', 'rr-addons' ),
				'type'  => Controls_Manager::HEADING
            ]
        );

		$repeater->add_control(
		    'rr_addons_accordion_each_item_container_bg_color',
		    [
		        'label'     => __( 'Background Color', 'rr-addons' ),
		        'type'      => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} {{CURRENT_ITEM}}.rr-addons-accordion-single-item' => 'background-color: {{VALUE}};'
		        ]
		    ]
		);

		$repeater->add_control(
		    'rr_addons_accordion_number_color',
		    [
		        'label'     => __( 'Number Color', 'rr-addons' ),
		        'type'      => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} {{CURRENT_ITEM}}.rr-addons-accordion-single-item .rr-addons-accordion-number span' => 'color: {{VALUE}};'
		        ]
		    ]
		);

		$repeater->add_control(
		    'rr_addons_accordion_number_bg_color',
		    [
		        'label'     => __( 'Number Background Color', 'rr-addons' ),
		        'type'      => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} {{CURRENT_ITEM}}.rr-addons-accordion-single-item .rr-addons-accordion-number span' => 'background-color: {{VALUE}};'
		        ]
		    ]
		);

        $repeater->add_control(
            'rr_addons_accordion_each_item_title_style',
            [
				'label'     => esc_html__( 'Title', 'rr-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );

		$repeater->add_control(
		    'rr_addons_accordion_each_item_title_color',
		    [
		        'label'     => __( 'Text Color', 'rr-addons' ),
		        'type'      => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} {{CURRENT_ITEM}}.rr-addons-accordion-single-item .rr-addons-accordion-title h3' => 'color: {{VALUE}};'
		        ]
		    ]
		);

		$repeater->add_control(
		    'rr_addons_accordion_each_item_title_bg_color',
		    [
		        'label'     => __( 'Background Color', 'rr-addons' ),
		        'type'      => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} {{CURRENT_ITEM}}.rr-addons-accordion-single-item .rr-addons-accordion-title' => 'background-color: {{VALUE}};'
		        ]
		    ]
		);

		$repeater->add_control(
		    'rr_addons_accordion_each_item_title_hover_color',
		    [
		        'label'     => __( 'Hover Color', 'rr-addons' ),
		        'type'      => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} {{CURRENT_ITEM}}.rr-addons-accordion-single-item .rr-addons-accordion-title:hover h3' => 'color: {{VALUE}};'
		        ]
		    ]
		);

		$repeater->add_control(
		    'rr_addons_accordion_each_item_title_hover_bg_color',
		    [
		        'label'     => __( 'Hover Background Color', 'rr-addons' ),
		        'type'      => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} {{CURRENT_ITEM}}.rr-addons-accordion-single-item .rr-addons-accordion-title:hover' => 'background-color: {{VALUE}};'
		        ]
		    ]
		);

        $repeater->add_control(
            'rr_addons_accordion_each_item_content_style',
            [
				'label'     => esc_html__( 'Content', 'rr-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );

		$repeater->add_group_control(
		    Group_Control_Border::get_type(),
		    [
				'name'     => 'rr_addons_accordion_each_item_container_border',
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.rr-addons-accordion-single-item'
		    ]
		);

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();

  		$this->add_control(
			'rr_addons_exclusive_accordion_tab',
			[
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default'	=> [
					[ 
						'rr_addons_exclusive_accordion_title'          => esc_html__( 'Accordion Title 1', 'rr-addons' ),
						'rr_addons_exclusive_accordion_default_active' => 'yes'
					],
					[ 'rr_addons_exclusive_accordion_title' => esc_html__( 'Accordion Title 2', 'rr-addons' ) ],
					[ 'rr_addons_exclusive_accordion_title' => esc_html__( 'Accordion Title 3', 'rr-addons' ) ]
				],
				'title_field' => '{{rr_addons_exclusive_accordion_title}}'
			]
		);

        $this->add_control(
			'rr_addons_show_number',
			[
				'label'        => esc_html__( 'Show Number', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

        $this->add_control(
			'rr_addons_exclusive_accordion_tab_title_show_active_inactive_icon',
			[
				'label'        => esc_html__( 'Show Active/Inactive Icon?', 'rr-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
				'separator'	   => 'before' 
			]
		);

		$this->add_control(
			'rr_addons_exclusive_accordion_tab_title_active_icon',
			[
				'label'       => __( 'Active Icon', 'rr-addons' ),
				'type'        => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-angle-up',
					'library' => 'fa-solid'
				],
				'condition'   => [
					'rr_addons_exclusive_accordion_tab_title_show_active_inactive_icon' => 'yes'
				]
			]
		);

		$this->add_control(
			'rr_addons_exclusive_accordion_tab_title_inactive_icon',
			[
				'label'       => __( 'Inactive Icon', 'rr-addons' ),
				'type'        => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-angle-down',
					'library' => 'fa-solid'
				],
				'condition'   => [
					'rr_addons_exclusive_accordion_tab_title_show_active_inactive_icon' => 'yes'
				]
			]
		);

  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style Fd Addons Accordion Container Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'rr_addons_section_exclusive_accordions_container_style',
			[
				'label'	=> esc_html__( 'Container', 'rr-addons' ),
				'tab'	=> Controls_Manager::TAB_STYLE
			]
		);		
		$this->start_controls_tabs( 'rr_addons_accordion_active_inactive_container_tabs' );
		// normal state tab
		$this->start_controls_tab( 'rr_addons_accordion_container_style', [ 'label' => esc_html__( 'Normal', 'rr-addons' ) ] );

		$this->add_control(
			'rr_addons_accordion_container_background_color',
			[
				'label'		=> esc_html__( 'Background Color', 'rr-addons' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'rr_addons_accordion_container_box_shadow',
				'selector' => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item'
			]
		);
		$this->add_group_control(
        	Group_Control_Border::get_type(),
            [
				'name'     => 'rr_addons_exclusive_accordion_container_border',
				'selector' => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item'
            ]
		);

        $this->add_responsive_control(
            'rr_addons_exclusive_accordion_container_padding',
            [
				'label'      => __('Padding', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
                    '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_exclusive_accordion_container_margin',
            [
				'label'        => __('Margin', 'rr-addons'),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => ['px', '%'],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '20',
					'left'     => '0',
					'isLinked' => false
				],
                'selectors'    => [
                    '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->add_responsive_control(
            'rr_addons_exclusive_accordion_container_border_radius',
            [
				'label'      => __('Border Radius', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
		$this->end_controls_tab();
		
		// hover state tab
		$this->start_controls_tab( 'rr_addons_accordion_container_style_hover', [ 'label' => esc_html__( 'Active', 'rr-addons' ) ] );

		$this->add_control(
			'rr_addons_accordion_container_background_color_active',
			[
				'label'		=> esc_html__( 'Background Color', 'rr-addons' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item.wraper-active' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'rr_addons_accordion_container_box_shadow_active',
				'selector' => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item.wraper-active'
			]
		);
		$this->add_group_control(
        	Group_Control_Border::get_type(),
            [
				'name'     => 'rr_addons_exclusive_accordion_container_border_active',
				'selector' => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item.wraper-active'
            ]
		);
		$this->add_responsive_control(
            'rr_addons_exclusive_accordion_container_border_radius_active',
            [
				'label'      => __('Border Radius', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item.wraper-active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->add_responsive_control(
            'rr_addons_exclusive_accordion_container_margin_active',
            [
				'label'      => __('Margin', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item.wraper-active' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->add_responsive_control(
            'rr_addons_exclusive_accordion_container_padding_active',
            [
				'label'      => __('Padding', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item.wraper-active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'rr_addons_acc_number',
			[
				'label' => esc_html__( 'Nmber', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'            => 'rr_addons_number_typography',
				'selector'        => '{{WRAPPER}} .rr-addons-accordion-number span',
				'fields_options'  => [
					'font_weight' => [
						'default' => '600',
					]
				]
			]
		);
		$this->add_responsive_control(
			'rr_addons_number_size',
			[
				'label'        => __( 'Size', 'rr-addons' ),
				'type'         => Controls_Manager::SLIDER,
				'range'        => [
					'px'       => [
						'min'  => 0,
						'max'  => 150,
						'step' => 1
					]
				],
				'selectors'    => [
					'{{WRAPPER}} .rr-addons-accordion-number span' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};'
				]
			]
		);   
		$this->add_responsive_control(
			'rr_addons_number_border_radius',
			[
				'label'      => __('Border Radius', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-accordion-number span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);
		$this->add_responsive_control(
			'rr_addons_number_margin',
			[
				'label'      => __('Margin', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-accordion-number span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);
		$this->add_responsive_control(
			'rr_addons_number_padding',
			[
				'label'      => __('Padding', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-accordion-number span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'rr_addons_section_exclusive_accordions_tab_style',
			[
				'label' => esc_html__( 'Title', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);


		$this->start_controls_tabs( 'rr_addons_exclusive_accordion_header_tabs' );

			# Normal State Tab
			$this->start_controls_tab( 'rr_addons_exclusive_accordion_header_normal', [ 'label' => esc_html__( 'Normal', 'rr-addons' ) ] );
				
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'            => 'rr_addons_exclusive_accordion_title_typography',
					'selector'        => '{{WRAPPER}} .rr-addons-accordion-single-item h3',
					'fields_options'  => [
						'font_weight' => [
							'default' => '600'
						]
					]
				]
			);
	
			$this->add_control(
					'rr_addons_exclusive_accordion_tab_text_color',
					[
						'label'		=> esc_html__( 'Text Color', 'rr-addons' ),
						'type'		=> Controls_Manager::COLOR,
						'default'	=> '#000000',
						'selectors'	=> [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item h3' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'rr_addons_exclusive_accordion_tab_color',
					[
						'label'     => esc_html__( 'Background Color', 'rr-addons' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title' => 'background-color: {{VALUE}};'
						]
					]
				);
				
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'               => 'rr_addons_exclusive_accordion_title_border',
						'fields_options'     => [
							'border' 	     => [
								'default'    => 'solid'
							],
							'width'  	     => [
								'default' 	 => [
									'top'    => '1',
									'right'  => '1',
									'bottom' => '1',
									'left'   => '1'
								]
							],
							'color' 	     => [
								'default'    => '#000000'
							]
						],
						'selector'           => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title'
					]
				);
				
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name'     => 'rr_addons_accordion_title_box_shadow',
						'selector' => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title'
					]
				);
		
				$this->add_responsive_control(
					'rr_addons_exclusive_accordion_title_padding',
					[
						'label'      => __('Padding', 'rr-addons'),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', '%'],
						'default'    => [
							'top'    => '20',
							'right'  => '20',
							'bottom' => '20',
							'left'   => '20'
						],
						'selectors'  => [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						]
					]
				);
		
				$this->add_responsive_control(
					'rr_addons_exclusive_accordion_title_margin',
					[
						'label'      => __('Margin', 'rr-addons'),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', '%'],
						'default'    => [
							'top'    => '0',
							'right'  => '0',
							'bottom' => '0',
							'left'   => '0'
						],
						'selectors'  => [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						]
					]
				);
		
				$this->add_responsive_control(
					'rr_addons_accordion_title_border_radius',
					[
						'label'      => esc_html__( 'Border Radius', 'rr-addons' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px'],
						'selectors'  => [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title'=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						]
					]
				);
			$this->end_controls_tab();

			#Hover State Tab
			$this->start_controls_tab( 'rr_addons_exclusive_accordion_header_hover', [ 'label' => esc_html__( 'Hover', 'rr-addons' ) ] );
				$this->add_control(
					'rr_addons_exclusive_accordion_tab_text_color_hover',
					[
						'label'		=> esc_html__( 'Text Color', 'rr-addons' ),
						'type'		=> Controls_Manager::COLOR,
						'selectors'	=> [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title:hover h3' => 'color: {{VALUE}};',
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title.active:hover h3' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'rr_addons_exclusive_accordion_tab_color_bg_hover',
					[
						'label'		=> esc_html__( 'Background Color', 'rr-addons' ),
						'type'		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title:hover' => 'background-color: {{VALUE}};'
						]
					]
				);

			$this->end_controls_tab();

			#Active State Tab
			$this->start_controls_tab( 'rr_addons_exclusive_accordion_header_active', [ 'label' => esc_html__( 'Active', 'rr-addons' ) ] );
				$this->add_control(
					'rr_addons_exclusive_accordion_tab_text_color_active',
					[
						'label'		=> esc_html__( 'Text Color', 'rr-addons' ),
						'type'		=> Controls_Manager::COLOR,
						'selectors'	=> [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title.active h3' => 'color: {{VALUE}} !important;'
						]
					]
				);

				$this->add_control(
					'rr_addons_exclusive_accordion_tab_color_bg_active',
					[
						'label'		=> esc_html__( 'Background Color', 'rr-addons' ),
						'type'		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title.active' => 'background-color: {{VALUE}};'
						]
					]
				);

			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		
		/**
		 * -------------------------------------------
		 * Icon Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'rr_addons_accordion_tab_title_icon_style',
			[
				'label'	=> esc_html__( 'Title Icon', 'rr-addons' ),
				'tab'	=> Controls_Manager::TAB_STYLE
			]
		);

        $this->start_controls_tabs( 'rr_addons_accordion_title_icon_style_tabs' );

        	// normal state tab
        	$this->start_controls_tab( 'rr_addons_accordion_title_icon_general_style', [ 'label' => esc_html__( 'Normal', 'rr-addons' ) ] );

			$this->add_control(
				'rr_addons_accordion_tab_title_icon_color',
				[
					'label'		=> esc_html__( 'Color', 'rr-addons' ),
					'type'		=> Controls_Manager::COLOR,
					'selectors'	=> [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title span.rr-addons-tab-title-icon' => 'color: {{VALUE}};'
					]
				]
			);

			$this->add_control(
				'rr_addons_accordion_tab_title_icon_bg_color',
				[
					'label'		=> esc_html__( 'Background Color', 'rr-addons' ),
					'type'		=> Controls_Manager::COLOR,
					'selectors'	=> [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title span.rr-addons-tab-title-icon' => 'background-color: {{VALUE}};'
					]
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name'     => 'rr_addons_accordion_title_icon_border',
					'selector' => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title span.rr-addons-tab-title-icon'
				]
			);
	
			$this->add_responsive_control(
				'rr_addons_accordion_title_icon_size',
				[
					'label'        => __( 'Size', 'rr-addons' ),
					'type'         => Controls_Manager::SLIDER,
					'range'        => [
						'px'       => [
							'min'  => 10,
							'max'  => 150,
							'step' => 2
						]
					],
					'default'      => [
						'unit'     => 'px',
						'size'     => 20
					],
					'selectors'    => [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title span.rr-addons-tab-title-icon i' => 'font-size: {{SIZE}}{{UNIT}};'
					]
				]
			);   
	
			$this->add_responsive_control(
				  'rr_addons_accordion_title_icon_width',
				  [
					'label'    => esc_html__( 'Width', 'rr-addons' ),
					'type'     => Controls_Manager::SLIDER,
					'default'  => [
						  'size' => 70
					],
					'range'    => [
						  'px'   => [
							  'max' => 100
						  ]
					],
					'selectors' => [
						  '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title span.rr-addons-tab-title-icon' => 'width: {{SIZE}}px;'
					]
				  ]
			);
	
		
			$this->add_responsive_control(
				'rr_addons_accordion_title_icon_padding',
				[
					'label'      => __('Padding', 'rr-addons'),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%'],
					'selectors'  => [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title span.rr-addons-tab-title-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					]
				]
			);
	
			$this->add_responsive_control(
				'rr_addons_accordion_title_icon_margin',
				[
					'label'      => __('Margin', 'rr-addons'),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%'],
					'selectors'  => [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title span.rr-addons-tab-title-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					]
				]
			);

			$this->end_controls_tab();

			// active state tab
        	$this->start_controls_tab( 'rr_addons_accordion_title_icon_active_style', [ 'label' => esc_html__( 'Active', 'rr-addons' ) ] );

			$this->add_control(
				'rr_addons_accordion_title_icon_active_color',
				[
					'label'		=> esc_html__( 'Color', 'rr-addons' ),
					'type'		=> Controls_Manager::COLOR,
					'selectors'	=> [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title.active span.rr-addons-tab-title-icon i' => 'color: {{VALUE}};'
					]
				]
			);

			$this->add_control(
				'rr_addons_accordion_title_icon_active_bg_color',
				[
					'label'		=> esc_html__( 'Background Color', 'rr-addons' ),
					'type'		=> Controls_Manager::COLOR,
					'selectors'	=> [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title.active span.rr-addons-tab-title-icon' => 'background-color: {{VALUE}};'
					]
				]
			);

			$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->end_controls_section();

		$this->start_controls_section(
			'rr_addons_accordion_active_inactive_icon_style',
			[
				'label'     => esc_html__( 'Active/Inactive Icon', 'rr-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'rr_addons_exclusive_accordion_tab_title_show_active_inactive_icon' => 'yes'
				]
			]
		);

	    

        $this->start_controls_tabs( 'rr_addons_accordion_active_inactive_icon_style_tabs' );

        	// normal state tab
        	$this->start_controls_tab( 'rr_addons_accordion_general_style', [ 'label' => esc_html__( 'Normal', 'rr-addons' ) ] );

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'     => 'rr_addons_accordion_active_inactive_icon_border',
						'selector' => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title .rr-addons-active-inactive-icon'
					]
				);

				$this->add_control(
					'rr_addons_accordion_general_icon_color',
					[
						'label'		=> esc_html__( 'Color', 'rr-addons' ),
						'type'		=> Controls_Manager::COLOR,
						'default'	=> '#000000',
						'selectors'	=> [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title .rr-addons-active-inactive-icon i' => 'color: {{VALUE}};',
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title .rr-addons-active-inactive-icon svg' => 'color: {{VALUE}};',
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title .rr-addons-active-inactive-icon svg path' => 'fill: {{VALUE}};',
							
						]
					]
				);

				$this->add_control(
					'rr_addons_accordion_general_icon_bg_color',
					[
						'label'		=> esc_html__( 'Background Color', 'rr-addons' ),
						'type'		=> Controls_Manager::COLOR,
						'selectors'	=> [
							'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title .rr-addons-active-inactive-icon' => 'background-color: {{VALUE}};'
						]
					]
				);
				$this->add_responsive_control(
				'rr_addons_accordion_active_inactive_icon_size',
				[
					'label'        => esc_html__( 'Size', 'rr-addons' ),
					'type'         => Controls_Manager::SLIDER,
					'range'        => [
						'px'       => [
							'min'  => 10,
							'max'  => 150,
							'step' => 2
						]
					],
					'default'      => [
						'unit'     => 'px',
						'size'     => 20
					],
					'selectors'    => [
						'{{WRAPPER}}  .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title .rr-addons-active-inactive-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}}  .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title .rr-addons-active-inactive-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					]
				]
			);

			$this->add_responsive_control(
				'rr_addons_accordion_active_inactive_icon_width',
				[
					'label'       => esc_html__( 'Width', 'rr-addons' ),
					'type'        => Controls_Manager::SLIDER,
					'default'     => [
						'size'    => 70
					],
					'range'       => [
						'px'      => [
							'max' => 100
						]
					],
					'selectors'   => [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title .rr-addons-active-inactive-icon' => 'width: {{SIZE}}px;'
					]
				]
			);

       
			$this->end_controls_tab();

			// active state tab
        	$this->start_controls_tab( 'rr_addons_accordion_active_style', [ 'label' => esc_html__( 'Active', 'rr-addons' ) ] );

			$this->add_control(
				'rr_addons_accordion_active_icon_color',
				[
					'label'		=> esc_html__( 'Color', 'rr-addons' ),
					'type'		=> Controls_Manager::COLOR,
					'default'	=> '#000000',
					'selectors'	=> [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title.active .rr-addons-active-inactive-icon i' => 'color: {{VALUE}};',
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title.active .rr-addons-active-inactive-icon svg' => 'color: {{VALUE}};',
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title.active .rr-addons-active-inactive-icon svg path' => 'fill: {{VALUE}};'
					]
				]
			);

			$this->add_control(
				'rr_addons_accordion_active_icon_bg_color',
				[
					'label'		=> esc_html__( 'Background Color', 'rr-addons' ),
					'type'		=> Controls_Manager::COLOR,
					'selectors'	=> [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-title.active .rr-addons-active-inactive-icon' => 'background-color: {{VALUE}};'
					]
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		
  		/**
		 * -------------------------------------------
		 * Tab Style Fd Addons Accordion Content Style
		 * -------------------------------------------
		 */

		$this->start_controls_section(
			'rr_addons_section_accordion_tab_content_style_settings',
			[
				'label'	=> esc_html__( 'Content', 'rr-addons' ),
				'tab'	=> Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'rr_addons_exclusive_accordion_content_typography',
				'selector' => '{{WRAPPER}} .rr-addons-accordion-single-item .rr-addons-accordion-text'
			]
		);

		$this->add_control(
			'rr_addons_accordion_content_bg_color',
			[
				'label'		=> esc_html__( 'Background Color', 'rr-addons' ),
				'type'		=> Controls_Manager::COLOR,
				'default'	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-content .rr-addons-accordion-content-wrapper' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'rr_addons_accordion_content_text_color',
			[
				'label'		=> esc_html__( 'Text Color', 'rr-addons' ),
				'type'		=> Controls_Manager::COLOR,
				'default'	=> '#000000',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-accordion-single-item .rr-addons-accordion-text' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_group_control(
        	Group_Control_Border::get_type(),
            [
				'name'                 => 'rr_addons_exclusive_accordion_content_border',
				'fields_options'       => [
                    'border' 	       => [
                        'default'      => 'solid'
                    ],
                    'width'  		   => [
                        'default' 	   => [
							'top'      => '0',
							'right'    => '1',
							'bottom'   => '1',
							'left'     => '1',
							'isLinked' => false
                        ]
                    ],
                    'color' 		   => [
                        'default' 	   => '#000000'
                    ]
                ],
                'selector'             => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-content .rr-addons-accordion-content-wrapper'
            ]
		);
        $this->add_responsive_control(
            'rr_addons_accordion_content_padding',
            [
				'label'      => __('Padding', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'    => [
					'top'    => '20',
					'right'  => '20',
					'bottom' => '20',
					'left'   => '20'
				],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-content .rr-addons-accordion-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_accordion_content_margin',
            [
				'label'      => __('Margin', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-accordion-single-item .rr-addons-accordion-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
		
		$this->add_responsive_control(
            'rr_addons_accordion_content_border_radius',
            [
				'label'      => __('Border Radius', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-content .rr-addons-accordion-content-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

  		$this->end_controls_section();

		$this->start_controls_section(
			'rr_addons_section_accordion_tab_image_style',
			[
				'label'	=> esc_html__( 'Image', 'rr-addons' ),
				'tab'	=> Controls_Manager::TAB_STYLE

			]
		);

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
				'name'    => 'rr_addons_accordion_image_size',
				'label'   => esc_html__( 'Image Type', 'rr-addons' ),
				'default' => 'medium'
            ]
        );

        $this->add_control(
            'rr_addons_accordion_image_align',
            [
                'label'         => esc_html__( 'Image Position', 'rr-addons' ),
                'type'          => Controls_Manager::CHOOSE,
                'toggle'        => false,
                'options'       => [
                    'left'      => [
                        'title' => esc_html__( 'Left', 'rr-addons' ),
                        'icon'  => 'eicon-angle-left'
                    ],
                    'right'     => [
                        'title' => esc_html__( 'Right', 'rr-addons' ),
                        'icon'  => 'eicon-angle-right'
                    ]
                ],
                'default'       => 'right'
            ]
        );

        $this->add_responsive_control(
            'rr_addons_accordion_image_padding',
            [
				'label'      => __('Padding', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default'    => [
                    'top'    => '20',
                    'right'  => '20',
                    'bottom' => '20',
                    'left'   => '20'
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_accordion_image_margin',
            [
				'label'      => __('Margin', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
                    '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
		);

  		$this->end_controls_section();

		$this->start_controls_section(
            'rr_addons_accordion_details_btn_style_section',
            [
				'label' => esc_html__( 'Button', 'rr-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->start_controls_tabs( 'rr_addons_accordion_details_button_style_tabs' );

            // normal state tab
            $this->start_controls_tab( 'rr_addons_accordion_details_btn_normal', [ 'label' => esc_html__( 'Normal', 'rr-addons' ) ] );
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'rr_addons_accordion_details_btn_typography',
					'selector' => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a'
				]
			);

            $this->add_control(
                'rr_addons_accordion_details_btn_normal_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'rr_addons_accordion_details_btn_normal_bg_color',
                [
                    'label'     => esc_html__( 'Background Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#000000',
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a' => 'background-color: {{VALUE}};'
                    ]
                ]
            );
			$this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'      => 'rr_addons_accordion_details_button_shadow',
                    'selector'  => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a'
                ]
            );

            $this->add_group_control(
            	Group_Control_Border::get_type(),
                [
					'name'               => 'rr_addons_accordion_details_btn_border',
					'fields_options'     => [
	                    'border' 	     => [
	                        'default'    => 'solid'
	                    ],
	                    'width'  	     => [
	                        'default'    => [
	                            'top'    => '1',
	                            'right'  => '1',
	                            'bottom' => '1',
	                            'left'   => '1'
	                        ]
	                    ],
	                    'color' 	     => [
	                        'default'    => '#000000'
	                    ]
	                ],
                    'selector'           => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a'
                ]
            );
			
			$this->add_responsive_control(
				'rr_addons_accordion_details_btn_padding',
				[
					'label'      => esc_html__( 'Padding', 'rr-addons' ),
					'type'       => Controls_Manager::DIMENSIONS,           
					'size_units' => [ 'px', 'em', '%' ],
					'default'    => [
						'top'    => '15',
						'right'  => '40',
						'bottom' => '15',
						'left'   => '40'
					],
					'selectors'  => [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					]
				]
			);
	
			$this->add_responsive_control(
				'rr_addons_accordion_details_btn_margin',
				[
					'label'      => esc_html__( 'Margin', 'rr-addons' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],   
					'default'    => [
						'top'    => '30',
						'right'  => '0',
						'bottom' => '0',
						'left'   => '0'
					],              
					'selectors'  => [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					]
				]
			);
			$this->add_responsive_control(
				'rr_addons_accordion_details_button_border_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'rr-addons' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px'],
					'selectors'  => [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a'=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					]
				]
			);

            

            $this->end_controls_tab();

            // hover state tab
            $this->start_controls_tab( 'rr_addons_accordion_details_btn_hover', [ 'label' => esc_html__( 'Hover', 'rr-addons' ) ] );

            $this->add_control(
                'rr_addons_accordion_details_btn_hover_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#000000',
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a:hover' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'rr_addons_accordion_details_btn_hover_bg_color',
                [
                    'label'     => esc_html__( 'Background Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a:hover' => 'background-color: {{VALUE}};'
                    ]
                ]
            );

			$this->add_group_control(
            	Group_Control_Border::get_type(),
                [
					'name'     => 'rr_addons_accordion_details_btn_hover_border',
					'selector' => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a:hover'
                ]
            );

			$this->add_responsive_control(
				'rr_addons_accordion_details_button_border_radius_hover',
				[
					'label'      => esc_html__( 'Border Radius', 'rr-addons' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px'],
					'selectors'  => [
						'{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a:hover'=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					]
				]
			);

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'      => 'rr_addons_accordion_details_button_hover_shadow',
                    'selector'  => '{{WRAPPER}} .rr-addons-accordion-items .rr-addons-accordion-single-item .rr-addons-accordion-button a:hover'
                ]
            );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();  		

	}

    private function render_image( $accordion, $settings ) {
        $image_id   = $accordion['rr_addons_accordion_image']['id'];
        $image_size = $settings['rr_addons_accordion_image_size_size'];
        if ( 'custom' === $image_size ) {
            $image_src = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'rr_addons_accordion_image_size', $settings );
        } else {
            $image_src = wp_get_attachment_image_src( $image_id, $image_size );
            $image_src = $image_src[0];
        }

        return sprintf( '<img src="%s" alt="'.Control_Media::get_image_alt( $accordion['rr_addons_accordion_image'] ).'" />', esc_url($image_src) );
    }

	protected function render() {

        $settings   = $this->get_settings_for_display();
        
        $this->add_render_attribute( 'rr_addons_accordion_heading', 'class', 'rr-addons-accordion-heading' );
        $this->add_render_attribute( 'rr_addons_accordion_details', 'class', 'rr-addons-accordion-text' );
        $this->add_render_attribute( 'rr_addons_accordion_button', 'class', 'rr-addons-accordion-button' );

		$i = 1;
        echo '<div class="rr-addons-accordion-items">';
        	do_action('rr_addons_accordion_wrapper_before');
            foreach( $settings['rr_addons_exclusive_accordion_tab'] as $key => $accordion ) : 
			
            	do_action('rr_addons_accordion_each_item_wrapper_before');

			
                
                $accordion_item_setting_key = $this->get_repeater_setting_key('rr_addons_exclusive_accordion_title', 'rr_addons_exclusive_accordion_tab', $key);

                $accordion_class = ['rr-addons-accordion-title'];

                if ( $accordion['rr_addons_exclusive_accordion_default_active'] === 'yes' ) {
                    $accordion_class[] = 'active-default';
                }

                $this->add_render_attribute( $accordion_item_setting_key, 'class', $accordion_class );

				$has_image = !empty( $accordion['rr_addons_accordion_image']['url'] ) ? 'yes' : 'no';
				$link_key  = 'link_' . $key;

                echo '<div class="rr-addons-accordion-single-item '.$accordion['rr_addons_exclusive_accordion_default_active'].'  elementor-repeater-item-'. esc_attr($accordion['_id']).'">';
                    echo '<div '.$this->get_render_attribute_string($accordion_item_setting_key).'>';
						if($settings['rr_addons_show_number'] == 'yes' ):
						echo '<div class="rr-addons-accordion-number">';
							echo '<span>';
							echo $i++;
							echo '</span>';
						echo '</div>';
			            endif;

						if ( ! empty( $accordion['rr_addons_exclusive_accordion_title_icon']['value'] ) && 'yes' === $accordion['rr_addons_exclusive_accordion_icon_show'] ) :
							echo '<span class="rr-addons-tab-title-icon">';
								Icons_Manager::render_icon( $accordion['rr_addons_exclusive_accordion_title_icon'], [ 'aria-hidden' => 'true' ] );
							echo '</span>';
						endif; 

                        echo '<h3 '.$this->get_render_attribute_string( 'rr_addons_accordion_heading' ).'>'.$accordion['rr_addons_exclusive_accordion_title'].'</h3>';

                        if( 'yes' === $settings['rr_addons_exclusive_accordion_tab_title_show_active_inactive_icon']):
                            echo '<div class="rr-addons-active-inactive-icon">';
                                if(!empty($settings['rr_addons_exclusive_accordion_tab_title_active_icon']['value'])){
                                    echo '<span class="rr-addons-active-icon">';
                                        Icons_Manager::render_icon( $settings['rr_addons_exclusive_accordion_tab_title_active_icon'], [ 'aria-hidden' => 'true' ] );
                                    echo '</span>';                                 
                                }
                                if(!empty($settings['rr_addons_exclusive_accordion_tab_title_inactive_icon']['value'])){
                                    echo '<span class="rr-addons-inactive-icon">';
                                        Icons_Manager::render_icon( $settings['rr_addons_exclusive_accordion_tab_title_inactive_icon'], [ 'aria-hidden' => 'true' ] );
                                    echo '</span>';                                 
                                }
                            echo '</div>';
                        endif;
                    echo '</div>';

                    echo '<div class="rr-addons-accordion-content">';
                        echo '<div class="rr-addons-accordion-content-wrapper has-image-'.esc_attr($has_image).' image-position-'.esc_attr($settings['rr_addons_accordion_image_align']).'">';
                            echo '<div '.$this->get_render_attribute_string( 'rr_addons_accordion_details' ).'>';
                                echo '<div>'.wp_kses_post( $accordion['rr_addons_exclusive_accordion_content'] ).'</div>';
                                if( 'yes' === $accordion['rr_addons_accordion_show_read_more_btn']):
									if( $accordion['rr_addons_accordion_read_more_btn_url']['url'] ) {
									    $this->add_render_attribute( $link_key, 'href', esc_url( $accordion['rr_addons_accordion_read_more_btn_url']['url'] ) );
									    if( $accordion['rr_addons_accordion_read_more_btn_url']['is_external'] ) {
									        $this->add_render_attribute( $link_key, 'target', '_blank' );
									    }
									    if( $accordion['rr_addons_accordion_read_more_btn_url']['nofollow'] ) {
									        $this->add_render_attribute( $link_key, 'rel', 'nofollow' );
									    }
									}
                                    if ( ! empty( $accordion['rr_addons_accordion_read_more_btn_text'] ) ) :
                                        echo '<div '.$this->get_render_attribute_string( 'rr_addons_accordion_button' ).'>';
                                            echo '<a '.$this->get_render_attribute_string( $link_key ).'>';
                                            	echo esc_html( $accordion['rr_addons_accordion_read_more_btn_text'] );
                                            echo '</a>';
                                        echo '</div>'; 
                                    endif;
                                endif;
                            echo '</div>';

                            if ( ! empty( $accordion['rr_addons_accordion_image']['url'] ) ) {
                                echo '<div class="rr-addons-accordion-image">';
                                    echo $this->render_image( $accordion, $settings );
                                echo '</div>';                                   
                            }

                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                do_action('rr_addons_accordion_each_item_wrapper_after');
            endforeach;
            do_action('rr_addons_accordion_wrapper_after');
        echo '</div>';
    }
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\rr_addons_accordion() );