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

class Heading_New extends Widget_Base {
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
        return 'heading_new';
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
        return __( 'Heading New', 'techex' );
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
        return ['heading new', 'techex', 'revinw'];
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
      $this->add_control(
            'heading_title',
            [
                'label'       => __( 'Title one', 'techex-hp' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('POPULAR IT SERVICES', 'techex-hp'),
            ]
        );
        $this->add_control(
            'heading_subtitle',
            [
                'label'       => __( 'Title Two', 'techex-hp' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('Solutions For IT Business', 'techex-hp'),
                
            ]
        );
        $this->add_control(
            'heading_bg_text',
            [
                'label'       => __( 'Title BG Text', 'techex-hp' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('PROCESS', 'techex-hp'),
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label'     => __( 'Alignment', 'rr-addons' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'    => [
                        'title' => __( 'Left', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'  => [
                        'title' => __( 'Center', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'   => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-justify',
                    ],
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}}  .section-title.heading-new p' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .section-title.heading-new h1' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    //======================= Content Normal Style Start ======================
		$this->start_controls_section(
            'heading_style_section',
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
                'heading_title_color',
                [
                    'label' => __('Title One Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title.heading-new p ' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'heading_subtitle_color',
                [
                    'label' => __('Title Two Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title.heading-new h1 ' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'heading_bg_color',
                [
                    'label' => __('Heading Bg Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title.heading-new span ' => 'color: {{VALUE}}',
                    ],
                ]
            );  
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'heading_title_typography',
                    'label' => __('Title One Typography','techex-hp'),
                    'selector' => '{{WRAPPER}} .section-title.heading-new p ',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'heading_subtitle_typography',
                    'label' => __('Title Two Typography', 'techex-hp'),
                    'selector' => '{{WRAPPER}} .section-title.heading-new h1 ',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'heading_bg_typography',
                    'label' => __('Title BG Typography', 'techex-hp'),
                    'selector' => '{{WRAPPER}} .section-title.heading-new span ',
                ]
            );

            $this->add_responsive_control(
                'heading_title_margin',
                [
                    'label' => __('Title One Margin', 'techex-hp'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .section-title.heading-new p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'heading_subtitle_margin',
                [
                    'label' => __('Title Two Margin', 'techex-hp'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .section-title.heading-new h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'heading_bg_x_position',
                [
                    'label' => __( 'BG Text  X position', 'techex-hp' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .section-title.heading-new span' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                    
    
                ]
            );
            $this->add_responsive_control(
                'heading_bg_y_position',
                [
                    'label' => __( 'BG Text  Y position', 'techex-hp' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .section-title.heading-new span' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                    
    
                ]
            );
            $this->end_controls_tab();
    
            //==================== Heading New Hover Style ===================================
            $this->start_controls_tab(
                'heading_content_hover_tab',
                [
                    'label' => __('Hover', 'techex-hp'),
                ]
            );
            $this->add_control(
                'heading_title_hover_color',
                [
                    'label' => __('Title one Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}:hover .section-title.heading-new p ' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'heading_subtitle_hover_color',
                [
                    'label' => __('Title Two Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}:hover .section-title.heading-new h1' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'heading_bg_hover_color',
                [
                    'label' => __('BG Text Hover Color', 'techex-hp'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}:hover .section-title.heading-new span ' => 'color: {{VALUE}}',
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
        $title_one = $settings['heading_title'];
        $title_two = $settings['heading_subtitle'];
        $title_bg = $settings['heading_bg_text'];

        
    ?>
        <div class="row">
            <div class="col-12 col-lg-12 text-center">
                <div class="section-title heading-new style-3 mb-40">
                    <span><?php echo esc_html($title_bg);?></span>
                    <p><?php echo esc_html($title_one);?></p>
                    <h1><?php echo esc_html($title_two);?></h1>
                </div>
            </div>
        </div>    
    <?php
}
}

$widgets_manager->register_widget_type(new \Heading_New());

   

