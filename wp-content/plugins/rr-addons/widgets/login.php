<?php
/**
 * Finisys form Widget.
 *
 *
 * @since 1.0.0
 */
namespace Finest_Addons\Widgets;

use  Elementor\Widget_Base;
use  Elementor\Controls_Manager;
use  Elementor\utils;
use  Elementor\Group_Control_Typography;
use  Elementor\Group_Control_Box_Shadow;
use  Elementor\Group_Control_Background;
use  Elementor\Group_Control_Border;
use  Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class  Fdaddons_LoginForm extends \Elementor\Widget_Base{

    public function get_name() {
        return 'fdaddons-login-form';
    }
    
    public function get_title() {
        return __( 'Login Form', 'rr-addons' );
    }

    public function get_icon() {
        return 'eicon-lock-user';
    }
    public function get_categories() {
        return [ 'rr-addons' ];
    }

    protected function register_controls() {

            $this->start_controls_section(
                'user_login_form_content',
                [
                    'label' => __( 'Login Form', 'rr-addons' ),
                ]
            );

            $this->add_control(
                'rr_addons_form_show_label',
                [
                    'label' => esc_html__( 'Label', 'rr-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'label_off' => esc_html__( 'Hide', 'rr-addons' ),
                    'label_on' => esc_html__( 'Show', 'rr-addons' ),
                ]
            );

            $this->add_control(
                'rr_addons_form_show_customlabel',
                [
                    'label' => esc_html__( 'Custom label', 'rr-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'no',
                    'label_off' => esc_html__( 'Hide', 'rr-addons' ),
                    'label_on' => esc_html__( 'Show', 'rr-addons' ),
                    'condition' =>[
                        'rr_addons_form_show_label' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'rr_addons_user_label',
                    [
                    'label'     => esc_html__( 'Username Label', 'rr-addons' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__( 'Username or Email', 'rr-addons' ),
                    'condition' => [
                        'rr_addons_form_show_label'   => 'yes',
                        'rr_addons_form_show_customlabel' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'rr_addons_user_placeholder',
                [
                    'label'     => esc_html__( 'Username Placeholder', 'rr-addons' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__( 'Username or Email', 'rr-addons' ),
                    'condition' => [
                        'rr_addons_form_show_label'   => 'yes',
                        'rr_addons_form_show_customlabel' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'rr_addons_password_label',
                [
                    'label'     => esc_html__( 'Password Label', 'rr-addons' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__( 'Password', 'rr-addons' ),
                    'condition' => [
                        'rr_addons_form_show_label'   => 'yes',
                        'rr_addons_form_show_customlabel' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'rr_addons_password_placeholder',
                [
                    'label'     => __( 'Password Placeholder', 'rr-addons' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => __( 'Password', 'rr-addons' ),
                    'condition' => [
                        'rr_addons_form_show_label'   => 'yes',
                        'rr_addons_form_show_customlabel' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'redirect_page',
                [
                    'label' => __( 'Redirect page after Login', 'rr-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'no',
                    'label_off' => __( 'No', 'rr-addons' ),
                    'label_on' => __( 'Yes', 'rr-addons' ),
                ]
            );

            $this->add_control(
                'redirect_page_url',
                [
                    'type'          => Controls_Manager::URL,
                    'show_label'    => false,
                    'show_external' => false,
                    'separator'     => false,
                    'placeholder'   => 'http://your-link.com/',
                    'condition'     => [
                        'redirect_page' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'lost_password',
                [
                    'label'     => esc_html__( 'Lost your password?', 'rr-addons' ),
                    'type'      => Controls_Manager::SWITCHER,
                    'default'   => 'yes',
                    'label_off' => esc_html__( 'Hide', 'rr-addons' ),
                    'label_on'  => esc_html__( 'Show', 'rr-addons' ),
                ]
            );

            $this->add_control(
                'remember_me',
                [
                    'label'     => esc_html__( 'Remember Me', 'rr-addons' ),
                    'type'      => Controls_Manager::SWITCHER,
                    'default'   => 'yes',
                    'label_off' => esc_html__( 'Hide', 'rr-addons' ),
                    'label_on'  => esc_html__( 'Show', 'rr-addons' ),
                ]
            );
            $this->add_control(
                'custom_placeholder_option',
                [
                    'label'     => esc_html__( 'Custom Placeholder', 'rr-addons' ),
                    'type'      => Controls_Manager::SWITCHER,
                    'default'   => 'yes',
                    'label_off' => esc_html__( 'Hide', 'rr-addons' ),
                    'label_on'  => esc_html__( 'Show', 'rr-addons' ),
                    
                ]
            );

            if ( get_option( 'users_can_register' ) ) {
                $this->add_control(
                    'register_link',
                    [
                        'label'     => esc_html__( 'Register', 'rr-addons' ),
                        'type'      => Controls_Manager::SWITCHER,
                        'default'   => 'no',
                        'label_off' => esc_html__( 'Hide', 'rr-addons' ),
                        'label_on'  => esc_html__( 'Show', 'rr-addons' ),
                    ]
                );

                $this->add_control(
                    'register_link_text',
                    [
                        'label' => __( 'Register Link Text', 'rr-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Create a free account', 'rr-addons' ),
                        'label_block' => true,
                        'condition'     => [
                            'register_link' => 'yes',
                        ],
                    ]
                );
            }

            $this->add_control('rr_addons_reg_button_existing_link',
                [
                    'label'         => __('Select Register Page ', 'rr_addons'),
                    'type'          => Controls_Manager::SELECT2,
                    'options'       => rr_addons_get_all_pages(),
                    'condition'     => [
                        'register_link'     => 'yes',
                    ],
                    'multiple'      => false,
                    'label_block'   => true,
                ]
            );

            $this->add_control('rr_addons_forget_button_existing_link',
                [
                    'label'         => __('Select Reset Password Page ', 'rr_addons'),
                    'type'          => Controls_Manager::SELECT2,
                    'options'       => rr_addons_get_all_pages(),
                    'condition'     => [
                        'lost_password'     => 'yes',
                    ],
                    'multiple'      => false,
                    'label_block'   => true,
                ]
            );



            $this->end_controls_section();

            
            // Placeholder Text
            $this->start_controls_section(
                'custom_placeholder_section',
                [
                    'label' => __( 'Custom Placeholder', 'rr-addons' ),
                    'tab' => Controls_Manager::TAB_CONTENT,
                    'condition'     => [
                        'custom_placeholder_option'     => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'login_user_text',
                [
                    'label' => __( 'User Name', 'rr-addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'User Name', 'rr-addons' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'login_password_text',
                [
                    'label' => __( 'Password', 'rr-addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Password', 'rr-addons' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'login_button_text',
                [
                    'label' => __( 'Button', 'rr-addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Login', 'rr-addons' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'remember_text',
                [
                    'label' => __( 'Remember Login', 'rr-addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Remember Login', 'rr-addons' ),
                    'label_block' => true,
                    'condition'     => [
                        'remember_me'     => 'yes',
                    ],
                ]
                  
            );

            
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'login_form_style_input',
            [
                'label' => __( 'Input', 'rr-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
       
        $this->start_controls_tabs( 'tabs_field_style' );

		$this->start_controls_tab(
			'tab_field_normal',
			[
				'label' 		=> __( 'Normal', 'rr-addons' ),
			]
		);

        $this->add_control(
            'login_form_input_text_color',
            [
                'label'     => __( 'Text Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input'   => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'login_form_input_placeholder_color',
            [
                'label'     => __( 'Placeholder Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input[type*="text"]::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input[type*="text"]::-moz-placeholder'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input[type*="text"]:-ms-input-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .rr-addons-login-form-wrapperinput[type*="password"]::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input[type*="password"]::-moz-placeholder'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input[type*="password"]:-ms-input-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .rr-addons-login-form-wrapperinput[type*="email"]::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input[type*="email"]::-moz-placeholder'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input[type*="email"]:-ms-input-placeholder'  => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'login_form_input_typography',
                'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper input',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'login_form_input_background',
                'label' => __( 'Background', 'rr-addons' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper input',
            ]
        );

        $this->add_control(
            'login_form_input_height',
            [
                'label' => __( 'Height', 'rr-addons' ),
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
                'default' => [
                    'unit' => 'px',
                    'size' => 56,
                ],
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="text"],{{WRAPPER}} .rr-addons-login-form-wrapper input[type="password"]' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'login_form_input_border',
                'label' => __( 'Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper input',
            ]
        );

        $this->add_responsive_control(
            'login_form_input_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rr-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'login_form_input_margin',
            [
                'label' => __( 'Margin', 'rr-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper input' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'login_form_input_padding',
            [
                'label' => __( 'Padding', 'rr-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-login-form-wrapper input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper input' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_field_focus',
            [
                'label' 		=> __( 'Focus', 'rr-addons' ),
            ]
        );

        $this->add_control(
			'field_focus_background',
			[
				'label' 		=> __( 'Background Color', 'rr-addons' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .rr-addons-login-form-wrapper input:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'field_focus_color',
			[
				'label' 		=> __( 'Color', 'rr-addons' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .rr-addons-login-form-wrapper input:focus' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'login_form_input_border_focus',
                'label' => __( 'Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper input:focus',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

         // Label Style Start
         $this->start_controls_section(
            'login_form_style_label',
            [
                'label' => __( 'Label', 'rr-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_responsive_control(
                'login_form_label_align',
                [
                    'label' => __( 'Alignment', 'rr-addons' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'rr-addons' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'rr-addons' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'rr-addons' ),
                            'icon' => 'fa fa-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'rr-addons' ),
                            'icon' => 'fa fa-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper label' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'left',
                ]
            );

            $this->add_control(
                'login_form_label_text_color',
                [
                    'label'     => __( 'Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper label'   => 'color: {{VALUE}};',
                        '{{WRAPPER}} .rr-addons-login-form-wrapper .login_register_text'   => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'login_form_label_typography',
                    'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper label,{{WRAPPER}} .rr-addons-login-form-wrapper .login_register_text',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'login_form_label_background',
                    'label' => __( 'Background', 'rr-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper label',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'login_form_label_border',
                    'label' => __( 'Border', 'rr-addons' ),
                    'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper label',
                ]
            );

            $this->add_responsive_control(
                'login_form_label_margin',
                [
                    'label' => __( 'Margin', 'rr-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper label' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'login_form_label_padding',
                [
                    'label' => __( 'Padding', 'rr-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper label' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'login_form_label_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'rr-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper label' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper label' => 'border-radius: {{TOP}}px {{LEFT}}px {{BOTTOM}}px {{RIGHT}}px;',
                    ],
                ]
        );
        $this->end_controls_section();

        // Rememberme section start
        $this->start_controls_section(
            'login_form_style_rememberme',
            [
                'label' => __( 'Remember Me Checkbox', 'rr-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'login_form_input_rememberme_typography',
                    'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper form .log-remember label',
                ]
            );

            
            $this->add_control(
                'input_rememberme_color',
                [
                    'label'     => __( 'Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper label'   => 'color: {{VALUE}};',
                        '{{WRAPPER}} .rr-addons-login-form-wrapper .login_register_text'   => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'login_form_input_rememberme_margin',
                [
                    'label' => __( 'Margin', 'rr-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper form .log-remember label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper form .log-remember label' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}} !important;',
                    ],
                ]
            );
            $this->end_controls_section(); // Checkbox section end

            // foget password text
            $this->start_controls_section(
                'forget_forget_content',
                [
                    'label' => __( 'Forget', 'rr-addons' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_responsive_control(
                'forgot_position',
                [
                    'label'     => __( 'Position', 'rr-addons' ),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 'default',
                    'options'   => [
                        ''         => __( 'Default', 'rr-addons' ),
                        'absolute' => __( 'Absolute', 'rr-addons' ),
                        'static'   => __( 'Static', 'rr-addons' ),
                        'relative' => __( 'Relative', 'rr-addons' ),
                    ],
                    'separator' => 'after',
    
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper .forgetpassword' => 'position: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'forgot_position_x_end',
                [
                    'label'      => __( 'Offset X', 'rr-addons' ),
                    'type'       => Controls_Manager::SLIDER,
                    'range'      => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                        ],
                        '%'  => [
                            'min' => -200,
                            'max' => 200,
                        ],
                    ],
                    'default'    => [
                        'size' => '0',
                    ],
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper .forgetpassword' => 'right: {{SIZE}}{{UNIT}};',
                    ],

                ]
            );
            $this->add_responsive_control(
                'forgot_position_y',
                [
                    'label'      => __( 'Offset Y', 'rr-addons' ),
                    'type'       => Controls_Manager::SLIDER,
                    'range'      => [
                        'px' => [
                            'min'  => -1000,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                        '%'  => [
                            'min' => -200,
                            'max' => 200,
                        ],
                    ],
                    'size_units' => ['px', '%'],
                    'default'    => [
                        'size' => '0',
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper .forgetpassword' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'forget_typo',
                    'selector' => '{{WRAPPER}} .forgetpassword',
                ]
            );
            $this->add_control(
                'forgetpass_color',
                [
                    'label'     => __( 'Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .forgetpassword'   => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'forgetpass_margin',
                [
                    'label' => __( 'Margin', 'rr-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .forgetpassword' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .forgetpassword' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                ]
            );

            
            $this->end_controls_section(); 

            // Registar Page text
            $this->start_controls_section(
                'forget_reg_content',
                [
                    'label' => __( 'Register', 'rr-addons' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'reg_typo',
                    'selector' => '{{WRAPPER}} .finists-reg-linl, {{WRAPPER}} .finists-reg-linl a',
                ]
            );

            $this->add_control(
                'regtext_color',
                [
                    'label'     => __( 'Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .finists-reg-linl'   => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'regtext_a_color',
                [
                    'label'     => __( 'Link Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .finists-reg-linl a'   => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'regtext_margin',
                [
                    'label' => __( 'Margin', 'rr-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .finists-reg-linl' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .finists-reg-linl' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section(); 

            // Submit Button
            $this->start_controls_section(
                'login_form_style_submit_button',
                [
                    'label' => __( 'Submit Button', 'rr-addons' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            // Button Tabs Start
            $this->start_controls_tabs('login_form_style_submit_tabs');

                    // Start Normal Submit button tab
                    $this->start_controls_tab(
                        'login_form_style_submit_normal_tab',
                        [
                            'label' => __( 'Normal', 'rr-addons' ),
                        ]
                    );
                    
                    $this->add_control(
                        'login_form_submitbutton_text_color',
                        [
                            'label'     => __( 'Color', 'rr-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]'   => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'login_form_submitbutton_typography',
                            'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]',
                        ]
                    );

                    $this->add_control(
                        'login_form_submitbutton_background',
                        [
                            'label'     => __( 'Background Color', 'rr-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]'   => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'login_form_button_shadow',
                            'label' => __( 'Box Shadow', 'rr-addons' ),
                            'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'login_form_submitbutton_border',
                            'label' => __( 'Border', 'rr-addons' ),
                            'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]',
                        ]
                    );
                    
                    $this->add_control(
                        'login_form_submitbutton_height',
                        [
                            'label' => __( 'Height', 'rr-addons' ),
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
                            'default' => [
                                'unit' => 'px',
                                'size' => 50,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
        
                    $this->add_control(
                        'login_form_submitbutton_width',
                        [
                            'label' => __( 'Height', 'rr-addons' ),
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
                                '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
        
                    $this->add_responsive_control(
                        'login_form_submitbutton_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'rr-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]' => 'border-radius: {{TOP}}px {{LEFT}}px {{BOTTOM}}px {{RIGHT}}px;',
                            ],
                        ]
                    );
                    
                    $this->add_responsive_control(
                        'login_form_submitbutton_margin',
                        [
                            'label' => __( 'Margin', 'rr-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                            ],
                        ]
                    );
        
                    $this->add_responsive_control(
                        'login_form_submitbutton_padding',
                        [
                            'label' => __( 'Padding', 'rr-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                            ],
                        ]
                    );
                   
                $this->end_controls_tab(); // Normal submit Button tab end

                // Start Hover Submit button tab
                $this->start_controls_tab(
                    'login_form_style_submit_hover_tab',
                    [
                        'label' => __( 'Hover', 'rr-addons' ),
                    ]
                );
                    
                    $this->add_control(
                        'login_form_submitbutton_hover_text_color',
                        [
                            'label'     => __( 'Color', 'rr-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]:hover'   => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'login_form_submitbutton_hover_background',
                            'label' => __( 'Background', 'rr-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]:hover',
                        ]
                    );

                    $this->add_control(
                        'login_form_submitbutton_hover_background',
                        [
                            'label'     => __( 'Background Color', 'rr-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]:hover'   => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'login_form_button_shadow_hover',
                            'label' => __( 'Box Shadow Hover', 'rr-addons' ),
                            'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'login_form_submitbutton_hover_border',
                            'label' => __( 'Border', 'rr-addons' ),
                            'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper input[type="submit"]:hover',
                            'separator' =>'after',
                        ]
                    );
                    $this->add_control(
                        'hrtwo',
                        [
                            'type' => Controls_Manager::DIVIDER,
                        ]
                    );
                $this->end_controls_tab(); // Hover Submit Button tab End
            $this->end_controls_tabs(); // Button Tabs End

            

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'rr_addons_login_form_style_section',
            [
                'label' => __( 'Box', 'rr-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_responsive_control(
                'login_form_style_align',
                [
                    'label' => __( 'Alignment', 'rr-addons' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'rr-addons' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'rr-addons' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'rr-addons' ),
                            'icon' => 'fa fa-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'rr-addons' ),
                            'icon' => 'fa fa-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'left',
                    'separator' =>'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'login_form_section_background',
                    'label' => __( 'Background', 'rr-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'login_form_section_box_shadow',
                    'label' => __( 'Box Shadow', 'rr-addons' ),
                    'selector' => '{{WRAPPER}} .rr-addons-login-form-wrapper',
                ]
            );

        
            $this->add_responsive_control(
                'login_form_section_margin',
                [
                    'label' => __( 'Margin', 'rr-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'login_form_section_padding',
                [
                    'label' => __( 'Padding', 'rr-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-login-form-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .rr-addons-login-form-wrapper' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $pages_link = get_permalink( $settings['rr_addons_reg_button_existing_link'] );
        $resetpage_link = get_permalink( $settings['rr_addons_forget_button_existing_link'] );

       //registar page
        $wp_default_link = wp_registration_url();
        if(!empty($pages_link)) {
            $button_link = $pages_link;
        }else{
            $button_link = $wp_default_link;
        };

        // reset page
        $wp_resetpage_link   = wp_lostpassword_url(); 
        if(!empty($resetpage_link)) {
            $reset_link = $resetpage_link;
        }else{
            $reset_link =  $wp_resetpage_link;
        };

        $current_url = remove_query_arg( 'fake_arg' );


        $id = $this->get_id();
        $home_url = \home_url();

        if ( $settings['redirect_page'] == 'yes' && ! empty( $settings['redirect_page_url']['url'] ) ) {
            $redirect_url = $settings['redirect_page_url']['url'];
        } else {
            $redirect_url = $home_url;
        }

        $this->add_render_attribute( 'loginform_area_attr', 'class', 'rr-addons-login-form-wrapper' );

        // Label Value
        $user_label = isset( $settings['rr_addons_user_label'] ) ? $settings['rr_addons_user_label'] : __('Username','rr-addons'); 
        $user_placeholder = isset( $settings['rr_addons_user_placeholder'] ) ? $settings['rr_addons_user_placeholder'] : $settings['login_user_text'];
        $pass_label = isset( $settings['rr_addons_password_label'] ) ? $settings['rr_addons_password_label'] : __('Password','rr-addons');
        $pass_placeholder = isset( $settings['rr_addons_password_placeholder'] ) ? $settings['rr_addons_password_placeholder'] : $settings['login_password_text'];
        
       
        ?>
            <div <?php echo $this->get_render_attribute_string( 'loginform_area_attr' ); ?> >

                <div id="rr_addons_message_<?php echo esc_attr( $id ); ?>" class="rr_addons_message">&nbsp;</div>

                <?php
                if ( is_user_logged_in() && !Plugin::instance()->editor->is_edit_mode() ) {
                    $current_user = wp_get_current_user();
                    echo '<div class="rr-addons-user-login">' .
                        sprintf( __( 'You are Logged in as %1$s (<a href="%2$s">Logout</a>)', 'rr-addons' ), $current_user->display_name, wp_logout_url( $current_url ) ) .
                        '</div>';
                    return;
                }
                ?>
                <form id="rr_addons_login_form_<?php echo esc_attr( $id ); ?>" action="formloginaction" method="post">
                    <div id="rr-addons-form-fs">
                        <div class="form-field">
                            <?php
                                if( $settings['rr_addons_form_show_label'] == 'yes'){
                                    echo sprintf('<label for="%1$s">%1$s</label>', $user_label );
                                }
                            ?>
                            <input 
                                type="text"  
                                id="login_username<?php echo esc_attr( $id ); ?>" 
                                name="login_username" 
                                placeholder="<?php echo esc_attr__( $user_placeholder,'rr-addons' );?>">
                        </div>

                        <div class="form-field password-field">
                            <?php
                                if( $settings['rr_addons_form_show_label'] == 'yes'){
                                    echo sprintf('<label for="%1$s">%1$s</label>', $pass_label );
                                }
                            ?>
                            <input 
                                type="password" 
                                id="login_password<?php echo esc_attr( $id ); ?>" 
                                name="login_password" 
                                placeholder="<?php echo esc_attr__( $pass_placeholder,'rr-addons' );?>">
                            
                                <?php if( $settings['lost_password'] == 'yes' ): ?>
                                    <a href="<?php echo esc_url($reset_link); ?>" class="fright forgetpassword"><?php esc_html_e('Forgot Password?','rr-addons'); ?></a>
                                <?php endif;?>
                        </div>

                        
                        <div class="log-remember">
                            <?php if( $settings['remember_me'] == 'yes' ): ?>
                                <label class="lable-content" id="rememberme">
                                    <span class="checkmark"></span>
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever">
                                    <?php if( !empty( $settings['remember_text'] ) ){ 
                                        echo esc_attr__( $settings['remember_text'],
                                            'rr-addons'); 
                                        }else { 
                                            esc_html_e('Remember me','rr-addons'); 
                                        
                                        } ?>
                                </label>
                            <?php endif; ?>
                        </div>
                                
                        <div class="form-field" id="form-footer">
                            <input 
                                type="submit" 
                                id="login_form_submit_<?php echo esc_attr__( $id, 'rr-addons'); ?>" 
                                name="login_form_submit<?php echo $id; ?>" 
                                value="<?php if( !empty( $settings['login_button_text'] ) ){ echo esc_attr__( $settings['login_button_text'], 'rr-addons'); } else { esc_html_e( 'Login', 'rr-addons' ); } ?>">
                           
                            <?php if( get_option( 'users_can_register' ) && $settings['register_link'] == 'yes' ): ?> 
                                <div class="finists-reg-linl">
                                    <span class="freg-text"><?php _e('Already have an account?', 'rr-addons')?></span>
                                    <a href="<?php echo esc_url($button_link); ?>" class="login_register_text">
                                        <?php if( !empty( $settings['register_link_text'] ) ){ echo esc_attr__( $settings['register_link_text'],
                                            'rr-addons'); } else { esc_html_e( 'Create a free account', 'rr-addons' ); } ?>
                                    </a>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                </form>
            </div>
        <?php
        $this->rr_addons_login_check( $settings['redirect_page'], $redirect_url, $id );
    }
    public function rr_addons_login_check( $reddirectstatus, $redirect_url, $id ) {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                "use strict";
                var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
                var loadingmessage = '<?php echo esc_html__('Please wait...','rr-addons'); ?>';
                var login_form_id = 'form#rr_addons_login_form_<?php echo esc_attr( $id ); ?>';
                var login_button_id = '#login_form_submit_<?php echo esc_attr( $id ); ?>';
                var redirect = '<?php echo $reddirectstatus; ?>';

                $( login_button_id ).on('click', function(){

                    $('#rr_addons_message_<?php echo esc_attr( $id ); ?>').html('<span class="rr_addons_lodding_msg">'+ loadingmessage +'</span>').fadeIn();

                    $.ajax({  
                        type: 'POST',
                        dataType: 'json',  
                        url:  ajaxurl,  
                        data: { 
                            'action': 'rr_addons_ajax_login',
                            'username': $( login_form_id + ' #login_username<?php echo esc_attr( $id ); ?>').val(), 
                            'password': $( login_form_id + ' #login_password<?php echo esc_attr( $id ); ?>').val(), 
                            'security': $( login_form_id + ' #security').val()
                        },
                        success: function(msg){
                            if ( msg.loggeauth == true ){
                                $('#rr_addons_message_<?php echo esc_attr( $id ); ?>').html('<div class="rr_addons_success_msg alert alert-success">'+ msg.message +'</div>').fadeIn();
                                if( redirect === 'yes' ){
                                    document.location.href = '<?php echo esc_url( $redirect_url ); ?>';
                                    console.log('ok');
                                }else{
                                    document.location.href = '<?php echo esc_url( $redirect_url ); ?>';
                                }
                            }else{
                                $('#rr_addons_message_<?php echo esc_attr( $id ); ?>').html('<div class="rr_addons_invalid_msg alert alert-danger">'+ msg.message +'</div>').fadeIn();
                            }
                        }  
                    });
                    return false;
                });
            });
        </script>
        <?php
    }

}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Fdaddons_LoginForm() );