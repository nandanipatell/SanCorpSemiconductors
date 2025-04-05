<?php
namespace Finest_Addons\Widgets;

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

class Btn extends \Elementor\Widget_Base {

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
        return 'rr-addons-btn';
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
        return __( 'Button', 'rr-addons' );
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
        return 'eicon-button';
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
        return ['rr-addons'];
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

        /**
         * Content tab
         */
        $this->start_controls_section(
            'button',
            [
                'label' => __( 'Button', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_lightbox',
            [
                'label'        => __( 'Youtube Video Popup', 'rr-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'rr-addons' ),
                'label_off'    => __( 'No', 'rr-addons' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label'   => __( 'Button text', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Learn More',
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __( 'Button URL', 'rr-addons' ),
                'type'  => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __( 'Icon', 'rr-addons' ),
                'type'  => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label'   => __( 'Icon Position', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'after',
                'options' => [
                    'before' => __( 'Before', 'rr-addons' ),
                    'after'  => __( 'After', 'rr-addons' ),
                ],
            ]
        );

        $this->add_responsive_control(
            'button_align',
            [
                'label'        => __( 'Align', 'rr-addons' ),
                'type'         => \Elementor\Controls_Manager::CHOOSE,
                'options'      => [
                    'left'   => [
                        'title' => __( 'Left', 'rr-addons' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'top', 'rr-addons' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify'  => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} ' => 'text-align: {{VALUE}}',
                ],                'prefix_class' => 'content-align%s-',
                'toggle'       => true,
            ]
        );
        $this->end_controls_section();

        /**
         * Style tab
         */
        $this->start_controls_section(
            'icon_style',
            [
                'label' => __( 'Icon', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'icon_style_tabs'
        );

        $this->start_controls_tab(
            'icon_style_normal_tab',
            [
                'label' => __( 'Normal', 'rr-addons' ),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn .btn-icon'      => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rr-addons-btn .btn-icon path' => 'stroke: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_fill_color',
            [
                'label'     => __( 'Icon Fill Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn .btn-icon path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_bg_color',
            [
                'label'     => __( 'Icon Background', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn .btn-icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_gap',
            [
                'label'      => __( 'Icon gap', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn .icon-before'          => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .rr-addons-btn .icon-after '          => 'margin-left: {{SIZE}}{{UNIT}};',

                    'body.rtl {{WRAPPER}} .rr-addons-btn .icon-before' => 'margin-left: {{SIZE}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .rr-addons-btn .icon-after ' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_style_hover_tab',
            [
                'label' => __( 'Hover', 'rr-addons' ),
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label'     => __( 'Icon Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn:hover .btn-icon'      => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rr-addons-btn:hover .btn-icon path' => 'stroke: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_fill_color_hover',
            [
                'label'     => __( 'Icon Fill Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn:hover .btn-icon path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_bg_color_hover',
            [
                'label'     => __( 'Icon Background', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn:hover .btn-icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_gap_hover',
            [
                'label'      => __( 'Icon gap', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn:hover .icon-before'          => 'transform: translatex( -{{SIZE}}{{UNIT}} );',
                    '{{WRAPPER}} .rr-addons-btn:hover .icon-after '          => 'transform: translatex( {{SIZE}}{{UNIT}} );',

                    'body.rtl {{WRAPPER}} .rr-addons-btn:hover .icon-before' => 'transform: translatex( {{SIZE}}{{UNIT}} );',
                    'body.rtl {{WRAPPER}} .rr-addons-btn:hover .icon-after ' => 'transform: translatex( -{{SIZE}}{{UNIT}} );',
                ],
            ]
        );

        $this->add_control(
            'hover_icon_size',
            [
                'label'      => __( ' Hover Icon Size', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn:hover .btn-icon'     => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .rr-addons-btn:hover .btn-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'icon_size',
            [
                'label'      => __( 'Icon Size', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn .btn-icon'     => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .rr-addons-btn .btn-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_box_size',
            [
                'label'      => __( 'Icon Box Size', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn .btn-icon' => 'width: {{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}}; display:inline-flex; align-items:center;justify-content:center',
                ],
            ]
        );

       
        $this->add_responsive_control(
            'icon_box_radius',
            [
                'label'      => __( 'Border Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default'    => [
                    'top'    => '50',
                    'right'  => '50',
                    'bottom' => '50',
                    'left'   => '50',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn-wrapper .btn-icon'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_style',
            [
                'label' => __( 'Button', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

 
        $this->start_controls_tabs(
            'button_style_tabs'
        );

        $this->start_controls_tab(
            'button_style_normal_tab',
            [
                'label' => __( 'Normal', 'rr-addons' ),
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typography',
                'label'    => __( 'Typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-btn',
            ]
        );

        $this->add_control(
            'boxed_btn_color',
            [
                'label'     => __( 'Button Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'boxed_btn_background',
            [
                'label'     => __( 'Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .rr-addons-btn.style-three:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => __( 'Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_shadow',
                'label'    => __( 'Button Shadow', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-btn',
            ]
        );
        
        $this->add_responsive_control(
            'btn_width',
            [
                'label'      => __( 'Min Width', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn'          => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_height',
            [
                'label'      => __( 'Min Height', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn'          => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_radius',
            [
                'label'      => __( 'Border Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .rr-addons-btn' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}}
                    ;',
                ],
            ]
        );
      
        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => __( 'Button Padding', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn'          => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .rr-addons-btn' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'lightbox_content_animation',
            [
                'label'              => __( 'Popup Animation', 'elementor' ),
                'type'               => \Elementor\Controls_Manager::ANIMATION,
                'frontend_available' => true,
                'condition'          => [
                    'enable_lightbox' => 'yes',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_style_hover_tab',
            [
                'label' => __( 'Hover', 'rr-addons' ),
            ]
        );

        $this->add_control(
            'button_styles',
            [
                'label'   => __( 'Button Style', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'default-style',
                'options' => [
                    'default-style'     => __( 'Default', 'rr-addons' ),
                    'style-one' => __( 'Style One', 'rr-addons' ),
                    'style-two' => __( 'Style Two', 'rr-addons' ),
                    'style-three' => __( 'Style Three', 'rr-addons' ),
                    'style-four' => __( 'Style Four', 'rr-addons' ),
                ],
            ]
        );

        $this->add_control(
            'h_icon_right_gap',
            [
                'label'      => __( 'Icon Gap Hover', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn.style-one:before' => 'right: {{SIZE}}{{UNIT}} !important;',
                ],
                'condition' => [
                    'button_styles' => 'style-one',
                ]
            ]
        );

        $this->add_control(
            'h_icon_right_text_gap',
            [
                'label'      => __( 'Text Gap Hover', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'condition'     => [
                    'button_styles' => 'style-one',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn.style-one:hover  span.content ' => 'transform: translateX( -{{SIZE}}{{UNIT}} ) !important;',
                ],
            ]
        );

        $this->add_control(
            'btn_hover_color',
            [
                'label'     => __( 'Button Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'btn_hover_background',
            [
                'label'     => __( 'Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                   '{{WRAPPER}} .rr-addons-btn:hover, {{WRAPPER}} .all-side span.hover-animation' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_hover_effect!' => 'yes',
                ]
            ]
        );
        

        $this->add_control(
            'btn_hover_effect_background',
            [
                'label'     => __( 'Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                   '{{WRAPPER}} .rr-addons-btn-style1-top:before,
					{{WRAPPER}} .rr-addons-btn-style1-right:before,
					{{WRAPPER}} .rr-addons-btn-style1-bottom:before,
					{{WRAPPER}} .rr-addons-btn-style1-left:before,
					{{WRAPPER}} .rr-addons-btn-style2-shutouthor:before,
					{{WRAPPER}} .rr-addons-btn-style2-shutoutver:before,
					{{WRAPPER}} .rr-addons-btn-style2-shutinhor,
					{{WRAPPER}} .rr-addons-btn-style2-shutinver,
					{{WRAPPER}} .rr-addons-btn-style2-dshutinhor:before,
					{{WRAPPER}} .rr-addons-btn-style2-dshutinver:before,
					{{WRAPPER}} .rr-addons-btn-style2-scshutouthor:before,
					{{WRAPPER}} .rr-addons-btn-style2-scshutoutver:before,
					{{WRAPPER}} .rr-addons-btn-style3-radialin,
					{{WRAPPER}} .rr-addons-btn-style3-radialout:before,
					{{WRAPPER}} .rr-addons-btn-style3-rectin:before,
					{{WRAPPER}} .rr-addons-btn-style3-rectout:before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_hover_effect' => 'yes',
                ]
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_hover_border',
                'label'    => __( 'Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-btn:hover',
            ]
        );

        $this->add_control(
            'btn_hover_animation',
            [
                'label' => __( 'Hover Animation', 'rr-addons' ),
                'type'  => \Elementor\Controls_Manager::HOVER_ANIMATION,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_hover_shadow',
                'label'    => __( 'Button Shadow', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-btn:hover',
            ]
        );

        $this->add_responsive_control(
            'button_hover_radius',
            [
                'label'      => __( 'Border Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn:hover'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .rr-addons-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}}
                    ;',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_hover_padding',
            [
                'label' => __('Padding', 'upmedix'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'enable_hover_effect',
            [
                'label'        => __( 'Enabel Hover Effect', 'rr-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'rr-addons' ),
                'label_off'    => __( 'No', 'rr-addons' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        //Animation Hover
        $this->add_control('rr_addons_btn_hover_effect', 
            [
                'label'         => __('Hover Effect', 'industy'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'default'       => 'none',
                'options'       => [
                    'none'          => __('None', 'industy'),
                    'style1'        => __('Slide', 'industy'),
                    'style2'        => __('Shutter', 'industy'),
                    'all-side'        => __('All Side', 'industy'),
                ],
                'label_block'   => true,
                'condition' => [
                    'enable_hover_effect' => 'yes',
                ]
            ]
        );

		$this->add_control('rr_addons_btn_style1_dir', 
        [
            'label'         => __('Slide Direction', 'industy'),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'default'       => 'bottom',
            'options'       => [
                'bottom'       => __('Top to Bottom', 'industy'),
                'top'          => __('Bottom to Top', 'industy'),
                'left'         => __('Right to Left', 'industy'),
                'right'        => __('Left to Right', 'industy'),
            ],
            'condition'     => [
                'rr_addons_btn_hover_effect' => 'style1',
                'enable_hover_effect' => 'yes',
            ],
            'label_block'   => true,
            ]
        );
		$this->add_control('rr_addons_btn_style2_dir', 
        [
            'label'         => __('Shutter Direction', 'industy'),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'default'       => 'shutouthor',
            'options'       => [
                'shutoutver'    => __('Shutter out Horizontal', 'industy'),
                'shutouthor'    => __('Shutter out Vertical', 'industy'),
                'scshutoutver'  => __('Scaled Shutter Vertical', 'industy'),
                'scshutouthor'  => __('Scaled Shutter Horizontal', 'industy'),
                'dshutinver'   => __('Tilted Left'),
                'dshutinhor'   => __('Tilted Right'),
            ],
            'condition'     => [
                'rr_addons_btn_hover_effect' => 'style2',
                'enable_hover_effect' => 'yes',
            ],
            'label_block'   => true,
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
        $popular_post_key = array();
        $popular_meta_value_num = array();
        $settings = $this->get_settings_for_display();
        $target = $settings['button_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['button_url']['nofollow'] ? ' rel="nofollow"' : '';

        $lightbox_options = [
            'type'         => 'video',
            'videoType'    => 'youtube',
            'url'          => \Elementor\Embed::get_embed_url( $settings['button_url']['url'] ),
            'modalOptions' => [
                'id'                       => 'elementor-lightbox-' . $this->get_id(),
                'entranceAnimation'        => $settings['lightbox_content_animation'],
                'entranceAnimation_tablet' => $settings['lightbox_content_animation_tablet'],
                'entranceAnimation_mobile' => $settings['lightbox_content_animation_mobile'],
                'videoAspectRatio'         => '169',
            ],
        ];
        
        $this->add_render_attribute( 'rr-addons-btn-lightbox', [
            'data-elementor-open-lightbox' => 'yes',
            'data-elementor-lightbox'      => wp_json_encode( $lightbox_options ),
        ] );


        $button_styles = $settings['button_styles'];
        $button_hover = $settings['rr_addons_btn_hover_effect'];
        $bstyle = "";    
		//Button Hover Effect
		if ($button_hover == 'none') {
			$bstyle = 'rr-addons-btn-none';
		}elseif($button_hover == 'style1'){
			$bstyle = 'rr-addons-btn-style1-' . $settings['rr_addons_btn_style1_dir'];
		}elseif ($button_hover == 'style2') {
			$bstyle = 'rr-addons-btn-style2-' . $settings['rr_addons_btn_style2_dir'];
		}elseif ($button_hover == 'all-side') {
			$bstyle = $button_hover;
		}else{
            $bstyle = "";
        }

        ?>
        <div class="rr-addons-btn-wrapper enable-icon-box-<?php echo esc_attr( $settings['enable_lightbox'] ) ?>">
            <?php if ( 'yes' != $settings['enable_lightbox'] ): ?>
                <a class="rr-addons-btn <?php echo esc_attr($button_styles ); ?> <?php echo esc_attr($bstyle); ?>  d-inline-flex align-items-center <?php printf( '%s', esc_attr( 'elementor-animation-' . $settings['btn_hover_animation'] ))?>" <?php printf( 'href="%s" %s %s', $settings['button_url']['url'], $nofollow, $target )?>>
            <?php else: ?>
                <div class="rr-addons-btn <?php echo esc_attr($button_styles ); ?> <?php echo esc_attr($bstyle); ?> d-inline-flex align-items-center <?php printf( '%s', esc_attr( 'elementor-animation-' . $settings['btn_hover_animation'] ) )?>" <?php echo $this->get_render_attribute_string( 'rr-addons-btn-lightbox' ); ?>>
            <?php endif;?>

                    <?php if ( 'before' == $settings['icon_position'] && !empty( $settings['icon']['value'] ) ): ?>
                        <span class="icon-before  btn-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], ['aria-hidden' => 'true'] )?></span>
                    <?php endif;?>
                    <span class="hover-animation"></span>
                    <span class="content">
                        <?php echo $settings['button_label'] ?>
                    </span>

                    <?php if ( 'after' == $settings['icon_position'] && !empty( $settings['icon']['value'] ) ): ?>
                        <span class="icon-after btn-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], ['aria-hidden' => 'true'] )?></span>
                    <?php endif;?>
                    <?php if ( 'yes' != $settings['enable_lightbox'] ): ?>
                </a>
            <?php else: ?>
            </div>
            <?php endif;?>
    </div>
<?php
}
}

$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Btn() );