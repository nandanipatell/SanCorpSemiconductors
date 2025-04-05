<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Repeater;

class TechexFeaturedBox extends Widget_Base {
    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techex-featured-box';
    }
    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Techex Featured Box', 'techex' );
    }
    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-icon-box';
    }
    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['techex-addons'];
    }

    public function get_keywords() {
        return ['featured box', 'techex', 'reviw'];
    }
    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {
        //==================== content Section ======================================
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'techex' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $repeater = new Repeater();
        $repeater->add_control(
            'featured_icon',
            [
                'label'    => __('Icon', 'techex-hp'),
                'type'     => Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'elementor' ),
					'stacked' => __( 'Stacked', 'elementor' ),
					'framed' => __( 'Framed', 'elementor' ),
				],
				'default' => 'default',
				'prefix_class' => 'elementor-view-',
			]
		);
        $repeater->add_control(
			'shape',
			[
				'label' => __( 'Shape', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'elementor' ),
					'square' => __( 'Square', 'elementor' ),
				],
				'default' => 'circle',
				'condition' => [
					'view!' => 'default',
				],
				'prefix_class' => 'elementor-shape-',
			]
		);

        $repeater->add_control(
            'featured_title',
            [
                'label'       => __( 'Title', 'techex-hp' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'featured_subtitle',
            [
                'label'       => __( 'Sub Title', 'techex-hp' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'featured_number',
            [
                'label'       => __( 'Number', 'techex-hp' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );  
        $this->add_control(
            'featured_lists',
            [
                'label' => __('Featured Items', 'techex-hp'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                        [
                            'featured_icon' =>[
                                'value' => 'fa fa-mug-hot',
                                'library' => 'fa-solid',
                            ],
                            'featured_title' => __( 'Have a Coffee', 'techex-hp' ),
                            'featured_subtitle' => __( 'Quis autem vel eum reprehe nderit voluptate velit', 'techex-hp' ),
                            'featured_number' => __( '01', 'techex-hp' ),
                        ],
                        [
                            'featured_icon' => [
                                'value' => 'fa fa-mug-hot',
                                'library' => 'fa-solid',
                            ],
                            'featured_title' => __( 'Meet With Us', 'techex-hp' ),
                            'featured_subtitle' => __( 'Quis autem vel eum reprehe nderit voluptate velit', 'techex-hp' ),
                            'featured_number' => __( '02', 'techex-hp' ),
                        ],
                        [
                            'featured_icon' => [
                                'value' => 'fa fa-mug-hot',
                                'library' => 'fa-solid',
                            ],
                            'featured_title' => __( 'Data Analysis', 'techex-hp' ),
                            'featured_subtitle' => __( 'Quis autem vel eum reprehe nderit voluptate velit', 'techex-hp' ),
                            'featured_number' => __( '03', 'techex-hp' ),
                        ],
                        [
                            'featured_icon' => [
                                'value' => 'fa fa-mug-hot',
                                'library' => 'fa-solid',
                            ],
                            'featured_title' => __( 'Award Winner', 'techex-hp' ),
                            'featured_subtitle' => __( 'Quis autem vel eum reprehe nderit voluptate velit', 'techex-hp' ),
                            'featured_number' => __( '04', 'techex-hp' ),
                        ],
                       
                    ],
                    'title_field' => '{{{ featured_title }}}',
            ]
        );
        $this->end_controls_section();

        //====================Style section start ===================================
        //==========================Icon Normal Style ========================================
        $this->start_controls_section(
            'featured_icon_style',
            [
                'label' => __( ' Icon', 'techex-hp' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'featured_icon_tabs'
		);
		$this->start_controls_tab(
			'featured_normal_tab',
			[
				'label' => __('Normal', 'techex-hp'),
			]
		);
        $this->add_control(
			'featured_icon_color',
			[
				'label' => __(' Icon Color', 'techex-hp'),
				'type' => Controls_Manager::COLOR,
                'default' => '#086ad7',
				'selectors' => [
					'{{WRAPPER}} .work-process-grid .single-work-process .icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work-process-grid .single-work-process .icon svg' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work-process-grid .single-work-process .icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .work-process-grid .single-work-process .icon .icon-type-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'featured_icon_background',
			[
				'label' => __(' Icon Background', 'techex-hp'),
				'type' => Controls_Manager::COLOR,
				'default' => '#e6f0fb',
				'selectors' => [
					'{{WRAPPER}} .work-process-grid .single-work-process .icon' => 'background-color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'featured_icon_shadow',
				'label' => __('Icon Shadow', 'techex-hp'),
				'selector' => '{{WRAPPER}} .work-process-grid .single-work-process .icon',
			]
		);
		$this->add_control(
			'icon_br',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

        $this->add_responsive_control(
			'featured_icon_size',
			[
				'label' => __('Top Icon Size', 'techex-hp'),
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
					'size' => '50',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}}  .work-process-grid .single-work-process .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}  .work-process-grid .single-work-process .icon svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .work-process-grid .single-work-process .icon .icon-type-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
				//'condition' => [
					//'icon_type' => 'icon',
				//]
			]
		);
        $this->add_responsive_control(
			'featured_icon_box_size',
			[
				'label' => __('Top Icon Box Size', 'techex-hp'),
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
					'size' => '90',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .work-process-grid .single-work-process .icon' => 'line-height: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
				],
				//'condition' => ['enable_icon_box' => 'yes']
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'featured_icon_border',
                'label' => __('Icon Border', 'techex-hp'),
                'selector' => '{{WRAPPER}} .work-process-grid .single-work-process .icon',
            ]
		);
        $this->add_responsive_control(
			'featured_icon_border_radius',
			[
				'label' => __('Icon Border Radius', 'techex-hp'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'default'	=>	[
					'top' => '100',
					'right' => '100',
					'bottom' => '100',
					'left' => '100'
				],
				'selectors' => [
					'{{WRAPPER}} .work-process-grid .single-work-process .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'body.rtl {{WRAPPER}} .work-process-grid .single-work-process .icon' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
				],
				//'condition' => ['enable_icon_box' => 'yes']
			]
		);
       
        $this->add_responsive_control(
			'featured_icon_gap',
			[
				'label' => __('Icon Gap', 'techex-hp'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				
				'selectors' => [
					'{{WRAPPER}} .work-process-grid .single-work-process .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'body.rtl {{WRAPPER}} .work-process-grid .single-work-process .icon
					.' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
		$this->end_controls_tab();
        //======================  Icon Hover style =======================================
		$this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => __('Hover', 'techex-hp'),
            ]
        );
		$this->add_control(
			'featured_icon_hover_color',
			[
				'label' => __('Icon Color', 'techex-hp'),
				'type' => Controls_Manager::COLOR,
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .work-process-grid .single-work-process .icon:hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work-process-grid .single-work-process .icon:hover svg' => 'color: {{VALUE}}',
					'{{WRAPPER}} .work-process-grid .single-work-process .icon:hover svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .work-process-grid .single-work-process .icon:hover .icon-type-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'featured_icon_hover_bg',
			[
				'label' => __('Icon Background', 'techex-hp'),
				'type' => Controls_Manager::COLOR,
				'default' => '#086ad7',
				'selectors' => [
					'{{WRAPPER}} .work-process-grid .single-work-process .icon:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'featured_hover_shadow',
				'label' => __('Icon Shadow', 'techex-hp'),
				'selector' => '{{WRAPPER}} .work-process-grid .single-work-process .icon:hover ',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	//====================== Icon Style End =================================

    //======================= Content Normal Style Start ======================
		$this->start_controls_section(
            'featured_style_section',
            [
                'label' => __('Content', 'techex-hp'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );
            $this->start_controls_tabs(
                'featured_content_style_tabs'
            );
            $this->start_controls_tab(
                'featured_content_normal_tab',
                [
                    'label' => __('Normal', 'techex-hp'),
                ]
            );
            $this->add_control(
                'featured_title_color',
                [
                    'label' => __('Title Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .work-process-grid .single-work-process .content h3 ' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'featured_subtitle_color',
                [
                    'label' => __('Sub Title Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .work-process-grid .single-work-process .content p ' => 'color: {{VALUE}}',
                    ],
                ]
            );

            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'featured_title_typography',
                    'label' => __('Title Typography','techex-hp'),
                    'selector' => '{{WRAPPER}} .work-process-grid .single-work-process .content h3 ',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'featured_subtitle_typography',
                    'label' => __('Sub Title Typography', 'techex-hp'),
                    'selector' => '{{WRAPPER}} .work-process-grid .single-work-process .content p ',
                ]
            );
            $this->add_responsive_control(
                'featured_title_padding',
                [
                    'label' => __('Title Padding', 'techex-hp'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .work-process-grid .single-work-process .content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'featured_subtitle_padding',
                [
                    'label' => __('Sub Title Padding', 'techex-hp'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .work-process-grid .single-work-process .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
    
            //====================Top Content Hover Style ===================================
            $this->start_controls_tab(
                'featured_content_hover_tab',
                [
                    'label' => __('Hover', 'techex-hp'),
                ]
            );
            $this->add_control(
                'featured_title_hover_color',
                [
                    'label' => __('Title Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}:hover .work-process-grid .single-work-process .content h3 ' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'featured_subtitle_hover_color',
                [
                    'label' => __('Sub Title Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}:hover .work-process-grid .single-work-process .content p ' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();     

        //===================== Number Section Started =========================
        $this->start_controls_section(
            'featured_number_section',
            [
                'label' => __('Number', 'techex-hp'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );
            $this->start_controls_tabs(
                'featured_number_style_tabs'
            );
            $this->start_controls_tab(
                'featured_number_normal_tab',
                [
                    'label' => __('Normal', 'techex-hp'),
                ]
            );
            $this->add_control(
                'featured_number_color',
                [
                    'label' => __('Number Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .work-process-grid .single-work-process .content span ' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'featured_number_bg_color',
                [
                    'label' => __('Number Background Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .work-process-grid .single-work-process .content span ' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
           
            $this->add_responsive_control(
                'featured_number_box_size',
                [
                    'label' => __('Number Box Size', 'techex-hp'),
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
                        '{{WRAPPER}} .work-process-grid .single-work-process .content span' => 'line-height: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                    ],
                    //'condition' => ['enable_icon_box' => 'yes']
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'featured_number_typography',
                    'label' => __('Number Typography', 'techex-hp'),
                    'selector' => '{{WRAPPER}} .work-process-grid .single-work-process .content span ',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'featured_number_border',
                    'label' => __('Number Border', 'techex-hp'),
                    'selector' => '{{WRAPPER}} .work-process-grid .single-work-process .content span ',
                ]
            );
            $this->add_responsive_control(
                'featured_number_border_radius',
                [
                    'label' => __('Number Border Radius', 'techex-hp'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'default'	=>	[
                        'top' => '100',
                        'right' => '100',
                        'bottom' => '100',
                        'left' => '100'
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .work-process-grid .single-work-process .content span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    //'condition' => ['enable_icon_box' => 'yes']
                ]
            );
           
            $this->add_responsive_control(
                'featured_Numbeer_gap',
                [
                    'label' => __('Number Gap', 'techex-hp'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    
                    'selectors' => [
                        '{{WRAPPER}} .work-process-grid .single-work-process .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            
        //===================== Number hover style =========================
            $this->start_controls_tab(
                'featured_number_hover_tab',
                [
                    'label' => __('Hover', 'techex-hp'),
                ]
            );
            $this->add_control(
                'featured_number_hover_color',
                [
                    'label' => __('Number Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .work-process-grid .single-work-process .content span:hover  ' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'featured_number_bg_hover_color',
                [
                    'label' => __('Number Background Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .work-process-grid .single-work-process .content span:hover ' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

    }
    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $featured_lists = $settings['featured_lists'];
        
    ?>
            <div class="work-process-grid">
                <?php foreach($featured_lists as $list): ?>
                    <div class="single-work-process">
                        <div class="icon">
                        <?php \Elementor\Icons_Manager::render_icon( $list['featured_icon'], ['aria-hidden' => 'true'] ); ?>
                        </div>
                        <div class="content">
                            <h3><?php echo esc_html( $list['featured_title'] )?></h3>
                            <p><?php echo esc_html( $list['featured_subtitle'] )?></p>
                            <span><?php echo esc_html( $list['featured_number'] )?></span>
                        </div>
                    </div>
                 <?php endforeach; ?>
            </div>
    <?php
}
}

$widgets_manager->register_widget_type(new \TechexFeaturedBox());