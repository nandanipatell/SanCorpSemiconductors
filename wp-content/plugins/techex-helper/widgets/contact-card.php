<?php
if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class Contact_Card extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'contact_card';
    }
    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Contact Card', 'techex-hp');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-image';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['techex-addons'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'contact_content_section',
            [
                'label' => __('Content Top', 'techex-hp'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        //================= card content section =========================
        $this->add_control(
            'contact_card_icon',
            [
                'label'    => __('Icon', 'techex-hp'),
                'type'     => Controls_Manager::ICONS,
				'default'	=> [
					'value' => 'fa fa-mug-hot',
					'library' => 'fa-solid',
				],
            ]
        );
        $this->add_control(
            'contact_card_title',
            [
                'label'       => __( 'Title', 'techex' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
				'default'	=> __('Email Adress','techex-hp'),
            ]
        );
        $this->add_control(
            'contact_card_subtitle',
            [
                'label'       => __( 'Sub Title', 'techex' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
				'default'	=> __('send me email now','techex-hp'),
            ]
        );
		$this->end_controls_section();

 		//================= card content section =========================
		$this->start_controls_section(
            'contact_bottom_section',
            [
                'label' => __('Content Bottom', 'techex-hp'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'contact_card_bottom_info_one',
            [
                'label'       => __( 'Bottom Info One', 'techex' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
				'default'	=> __('mdshohan440@gmail.com','techex-hp'),
            ]
        );
        $this->add_control(
            'contact_card_bottom_info_two',
            [
                'label'       => __( 'Bottom Info Two', 'techex' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
				'default'	=> __('shohan440@gmail.com','techex-hp'),
            ]
        );
        $this->add_control(
            'contact_card_bottom_icon',
            [
                'label'    => __('Bottom Icon', 'techex-hp'),
                'type'     => Controls_Manager::ICONS,
				'default'	=> [
					'value' => 'fa fa-mug-hot',
					'library' => 'fa-solid',
				],
            ]
        );
        $this->end_controls_section();

		 //=======================Top Icon Main Style ===================
        $this->start_controls_section(
            'conact_card_icon_style',
            [
                'label' => __( 'Top Icon', 'techex-hp' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'card_icon_hover_tabs'
		);
		$this->start_controls_tab(
			'card_icon_normal_tab',
			[
				'label' => __('Normal', 'techex-hp'),
			]
		);
        $this->add_control(
			'card_top_icon_color',
			[
				'label' => __('Top Icon Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .top-part .icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .single-contact-card .top-part .icon svg' => 'color: {{VALUE}}',
					'{{WRAPPER}} .single-contact-card .top-part .icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .single-contact-card .top-part .icon .icon-type-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'card_top_icon_background',
			[
				'label' => __('Top Icon Background', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .top-part .icon' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
            'card_icon_enable_gradient',
            [
                'label' => __('Enable Gradient for Top ', 'rr-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'rr-addons'),
                'label_off' => __('No', 'rr-addons'),
                'return_value' => 'yes',
                'default' => 'no',
				'condition' => ['enable_icon_box' => 'yes']
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'      => 'card_icon_background_gradient',
				'types'     => [ 'classic', 'gradient' ],
				'fields_options'  => [
					'background'  => [
						'default' => 'classic'
					],
					'color'       => [
						'default' => '#ffffff'
					]
				],
				'condition' => ['enable_gradient' => 'yes'],
				'selector'  => '{{WRAPPER}} .single-contact-card .top-part .icon',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'card_top_icon_shadow',
				'label' => __('Top Icon Shadow', 'rr-addons'),
				'selector' => '{{WRAPPER}} .single-contact-card .top-part .icon',
			]
		);
		$this->add_control(
			'icon_br',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

        $this->add_responsive_control(
			'card_top_icon_size',
			[
				'label' => __('Top Icon Size', 'rr-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => ['desktop', 'tablet', 'mobile'],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}}  .single-contact-card .top-part .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}  .single-contact-card .top-part .icon svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .single-contact-card .top-part .icon .icon-type-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'card_top_box_size',
			[
				'label' => __('Top Icon Box Size', 'rr-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => ['desktop', 'tablet', 'mobile'],
				'desktop_default' => [
					'size' => 70,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .top-part .icon' => 'line-height: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'card_top_border_radius',
			[
				'label' => __('Top Icon Border Radius', 'rr-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'default'	=>	[
					'top' => '100',
					'right' => '100',
					'bottom' => '100',
					'left' => '100'
				],
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .top-part .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'body.rtl {{WRAPPER}} .single-contact-card .top-part .icon' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'space_between_top_icon',
			[
				'label' => __('Icon Gap', 'rr-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],

				'selectors' => [
					'{{WRAPPER}} .single-contact-card .top-part .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'body.rtl {{WRAPPER}} .single-contact-card .top-part .icon
					.' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'icon_top_border',
                'label' => __('Icon Border', 'rr-addons'),
                'selector' => '{{WRAPPER}}  .rr-addons-feature-icon',
            ]
		);
        $this->end_controls_tab();
		$this->end_controls_tab();

		//======================  Top Icon Hover style =======================================
		$this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => __('Hover', 'rr-addons'),
            ]
        );
		$this->add_control(
			'card_top_hover_color',
			[
				'label' => __('Top Icon Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .single-contact-card .top-part .icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}}:hover .single-contact-card .top-part .icon svg' => 'color: {{VALUE}}',
					'{{WRAPPER}}:hover .single-contact-card .top-part .icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'card_top_hover_background',
			[
				'label' => __('Top Icon Background', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .single-contact-card:hover .icon' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'card_top_hover_shadow',
				'label' => __('Icon Shadow', 'rr-addons'),
				'selector' => '{{WRAPPER}}:hover .single-contact-card .top-part .icon',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		//=======================Top Icon Style End =================================

		//=======================Top Content  Style Start ======================
		$this->start_controls_section(
		'contact_top_style_section',
		[
			'label' => __('Top Content', 'techex-hp'),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		]
		);
		$this->start_controls_tabs(
			'top_content_style_tabs'
		);
		$this->start_controls_tab(
			'top_style_normal_tab',
			[
				'label' => __('Normal', 'techex-hp'),
			]
		);
		$this->add_responsive_control(
			'card_top_title_gap',
			[
				'label' => __('Top Title Gap', 'rr-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .single-contact-card .top-part .title h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'card_top_title_color',
			[
				'label' => __('Title Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-card h4 ' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'card__subtitle_color',
			[
				'label' => __('Sub Title Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .top-part .title span ' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'card_title_typography',
				'label' => __('Title Typography','rr-addons'),
				'selector' => '{{WRAPPER}} .single-contact-card h4 ',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'card_subtitle_typography',
				'label' => __('Sub Title Typography', 'rr-addons'),
				'selector' => '{{WRAPPER}} .single-contact-card .top-part .title span',
			]
		);
        $this->add_responsive_control(
            'card_title_padding',
            [
                'label' => __('Title Padding', 'upmedix'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'card_top_subtitle_padding',
            [
                'label' => __('Sub Title Padding', 'upmedix'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card .top-part .title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'card_top_content_align',
            [
                'label'     => __( 'Content Alignment', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start'    => [
                        'title' => __( 'Start', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'  => [
                        'title' => __( 'Center', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'flex-end'   => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                    'baseline' => [
                        'title' => __( 'Baseline', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-justify',
                    ],
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card .bottom-part .info'  => 'align-items: {{VALUE}};',
                ],
            ]
        );
		$this->end_controls_tab();

		//====================Top Content Hover Style ===================================
		$this->start_controls_tab(
			'top_style_hover_tab',
			[
				'label' => __('Hover', 'techex-hp'),
			]
		);
		$this->add_control(
			'card_top_title_hover_color',
			[
				'label' => __('Title Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-card:hover h4 ' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'top_subtitle_hover_color',
			[
				'label' => __('Sub Title Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-card:hover .top-part span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		//==========bottom Icon Section ==================
		$this->start_controls_section(
            'conact_card_bottom_icon_style',
            [
                'label' => __( 'Bottom Icon', 'techex-hp' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'card_bottom_icon_tabs'
		);
		$this->start_controls_tab(
			'bottom_icon_normal_tab',
			[
				'label' => __('Normal', 'techex-hp'),
			]
		);
        $this->add_control(
			'card_bottom_icon_color',
			[
				'label' => __('Bottom Icon Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .bottom-part .icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .single-contact-card .bottom-part .icon svg' => 'color: {{VALUE}}',
					'{{WRAPPER}} .single-contact-card .bottom-part .icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .single-contact-card .bottom-part .icon .icon-type-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'card_bottom_icon_background',
			[
				'label' => __('Bottom Icon Background', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .bottom-part .icon' => 'background-color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'card_bottom_icon_shadow',
				'label' => __('Bottom Icon Shadow', 'rr-addons'),
				'selector' => '{{WRAPPER}} .single-contact-card .bottom-part .icon',
			]
		);

        $this->add_responsive_control(
			'card_bottom_icon_size',
			[
				'label' => __('Bottom Icon Size', 'rr-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => ['desktop', 'tablet', 'mobile'],
				'desktop_default' => [
					'size' => '',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .bottom-part .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .single-contact-card .bottom-part .icon svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .single-contact-card .bottom-part .icon .icon-type-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'card_bottom_icon_box_size',
			[
				'label' => __('Bottom Icon Box Size', 'rr-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => ['desktop', 'tablet', 'mobile'],
				'desktop_default' => [
					'size' => 70,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .bottom-part .icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
				//'condition' => ['enable_icon_box' => 'yes']
			]
		);
        $this->add_responsive_control(
			'card_bottom_border_radius',
			[
				'label' => __('Bottom Icon Border Radius', 'rr-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'default'	=>	[
					'top' => '100',
					'right' => '100',
					'bottom' => '100',
					'left' => '100'
				],
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .bottom-part .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'body.rtl {{WRAPPER}} .single-contact-card .bottom-part .icon' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
				],
				//'condition' => ['enable_icon_box' => 'yes']
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'icon_bottom_border',
                'label' => __('Icon Border', 'rr-addons'),
                'selector' => '{{WRAPPER}}  .single-contact-card .bottom-part .icon',
            ]
		);
        $this->end_controls_tab();

        //======================================Icon Hover Style===========================
        $this->start_controls_tab(
            'bottom_icon_hover_tab',
            [
                'label' => __('Hover', 'rr-addons'),
            ]
        );
        $this->add_control(
			'card_bottom_hover_color',
			[
				'label' => __('Bottom Icon Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .single-contact-card .bottom-part .icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}}:hover .single-contact-card .bottom-part .icon svg' => 'color: {{VALUE}}',
					'{{WRAPPER}}:hover .single-contact-card .bottom-part .icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}}:hover .single-contact-card .bottom-part .icon .icon-type-text' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'card_bottom_hover_background',
			[
				'label' => __('Bottom Icon Background', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .single-contact-card:hover .bottom-part .icon' => 'background-color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'card_bottom_hover_shadow',
				'label' => __('Icon Shadow', 'rr-addons'),
				'selector' => '{{WRAPPER}}.single-contact-card:hover .bottom-part .icon',
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
		$this->end_controls_section();

      //======================== Bottom content Start =====================
       $this->start_controls_section(
            'bottom_content_sec',
            [
                'label' => __( 'Bottom Content', 'techex' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'card_content_bottom_tabs'
		);
		$this->start_controls_tab(
			'card_content_normal_tab',
			[
				'label' => __('Normal', 'techex-hp'),
			]
		);
        //=========== Bottom Content style Start ========
        $this->add_responsive_control(
			'card_bottom_title_gap',
			[
				'label' => __('Bottom Title Gap', 'rr-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .single-contact-card .bottom-part .info p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'info_one_color',
			[
				'label' => __('Info one Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .bottom-part p' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'info_two_color',
			[
				'label' => __('Info Two Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-card .bottom-part .info span' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'info_one_typography',
				'label' => __('Info One Typography', 'rr-addons'),
				'selector' => '{{WRAPPER}} .single-contact-card .bottom-part p',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'info_two_typography',
				'label' => __('Info Two Typography', 'rr-addons'),
				'selector' => '{{WRAPPER}} .single-contact-card .bottom-part .info span',
			]
		);
        $this->add_responsive_control(
            'card_info_one_padding',
            [
                'label' => __('Info One Padding', 'upmedix'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card .bottom-part p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'card_info_two_padding',
            [
                'label' => __('Info Two Padding', 'upmedix'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card .bottom-part .info span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'bottom_content_align',
            [
                'label'     => __( 'Content Alignment', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start'    => [
                        'title' => __( 'Start', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'  => [
                        'title' => __( 'Center', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'flex-end'   => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                    'baseline' => [
                        'title' => __( 'Baseline', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-justify',
                    ],
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card .bottom-part .info' => 'align-items: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        //====================Bottom Content Hover=============================
        $this->start_controls_tab(
			'card_content_hover_tab',
			[
				'label' => __('Hover', 'techex-hp'),
			]
		);
        $this->add_control(
			'info_one_hover_color',
			[
				'label' => __('Info one Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-card:hover .bottom-part .info p' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'info_two_hover_color',
			[
				'label' => __('Info Two Color', 'rr-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-card:hover .bottom-part .info span' => 'color: {{VALUE}}',
				],
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

	   //======================   box section start   ===========================================
       $this->start_controls_section(
        'contact_box_sec',
        [
            'label' => __( 'Box', 'techex' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
       );
       $this->start_controls_tabs(
        'card_box_tabs'
        );
       $this->start_controls_tab(
        'card_box_normal_tab',
        [
            'label' => __('Normal', 'techex-hp'),
        ]
        );
        $this->add_control(
            'card_box_bg_color',
            [
                'label'     => __( 'Box Backgroound Color', 'fastland-hp' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'card_box_shadow',
                'label'    => __( 'Box Hover Shadow', 'fastland-hp' ),
                'selector' => '{{WRAPPER}} .single-contact-card',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'card_box_border',
                'label'    => __( 'Box Border', '' ),
                'selector' => '{{WRAPPER}} .single-contact-card',
            ]
        );
        $this->add_responsive_control(
			'card_box_width',
			[
				'label' => __( 'Width', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'selectors' => [
					'{{WRAPPER}}.single-contact-card' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'card_box_height',
			[
				'label' => __( 'Height', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .single-contact-card' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'card_box_radius',
            [
                'label'      => __( 'Box Radius', 'fastland-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-contact-card'=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'card_box_padding',
            [
                'label'      => __( 'Box Padding', 'fastland-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-contact-card ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
       $this->end_controls_tab();
	 //======================  Box Hover ==============================================
       $this->start_controls_tab(
        'card_box_hover_tab',
        [
            'label' => __('Hover', 'techex-hp'),
        ]
        );
        $this->add_control(
            'card_box_bg_hover_color',
            [
                'label'     => __( 'Box Backgroound Color', 'fastland-hp' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'card_box_hover_shadow',
                'label'    => __( 'Box Hover Shadow', 'fastland-hp' ),
                'selector' => '{{WRAPPER}} .single-contact-card:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'card_box_hover_border',
                'label'    => __( 'Box Border', '' ),
                'selector' => '{{WRAPPER}} .single-contact-card:hover',
            ]
        );
        $this->add_responsive_control(
            'card_box_hover_radius',
            [
                'label'      => __( 'Box Radius', 'fastland-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-contact-card:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
       $this->end_controls_tab();
       $this->end_controls_tabs();
       $this->end_controls_section();
    }


    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $contact_icon = $settings['contact_card_icon'];
        $contact_title = $settings['contact_card_title'];
        $contact_sub_title = $settings['contact_card_subtitle'];
        $contact_info_one = $settings['contact_card_bottom_info_one'];
        $contact_info_two = $settings['contact_card_bottom_info_two'];
        $contact_bottom_icon = $settings['contact_card_bottom_icon'];


        ?>
		<div class="single-contact-card card1">
			<div class="top-part">
				<div class="icon">
					<?php \Elementor\Icons_Manager::render_icon($contact_icon, ['aria-hidden' => 'true'] ); ?>
				</div>
				<div class="title">
					<h4><?php echo esc_html($contact_title);?></h4>
					<span><?php echo esc_html($contact_sub_title);?></span>
				</div>
			</div>

			<div class="bottom-part">

				<div class="info">
					<p><?php echo esc_html($contact_info_one);?></p>
					<span><?php echo esc_html($contact_info_two);?></span>
				</div>

			</div>
		</div>
		<?php

    }
}

$widgets_manager->register_widget_type(new \Contact_Card());