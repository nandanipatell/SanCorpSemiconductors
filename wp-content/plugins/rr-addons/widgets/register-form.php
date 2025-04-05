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

class Reg_Form extends \Elementor\Widget_Base{

    public function get_name() {
        return 'fastland_registration_form';
    }
    
    public function get_title() {
        return __( 'Registration Form', 'rr_addons' );
    }

    public function get_icon() {
        return 'eicon-lock-user';
    }

    public function get_keywords() {
		return [ 'log in', 'registration', 'sing up', 'sing in' ];
	}

    public function get_categories() {
        return [ 'rr-addons'];
    }

    protected function register_controls() {

            $this->start_controls_section(
                'user_register_form_content',
                [
                    'label' => __( 'Register Form', 'rr_addons' ),
                ]
            );

            $this->add_control(
                'show_label',
                [
                    'label' => __( 'Show label', 'rr_addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'rr_addons' ),
                    'label_off' => __( 'Hide', 'rr_addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'show_custom_label',
                [
                    'label' => __( 'Custom label', 'rr_addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'rr_addons' ),
                    'label_off' => __( 'Hide', 'rr_addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'separator' => 'before',
                    'condition'=>[
                        'show_label'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'cf_remember_me',
                [
                    'label'     => esc_html__( 'Privacy policy', 'rr-addons' ),
                    'type'      => Controls_Manager::SWITCHER,
                    'default'   => 'yes',
                    'label_off' => esc_html__( 'Hide', 'rr-addons' ),
                    'label_on'  => esc_html__( 'Show', 'rr-addons' ),
                ]
            );

            $this->add_control(
                'username_label',
                [
                    'label' => __( 'Username Label', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Username', 'rr_addons' ),
                    'placeholder' => __( 'Username', 'rr_addons' ),
                    'condition'=>[
                        'show_label'=>'yes',
                        'show_custom_label'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'password_label',
                [
                    'label' => __( 'Password Label', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Password', 'rr_addons' ),
                    'placeholder' => __( 'Password', 'rr_addons' ),
                    'condition'=>[
                        'show_label'=>'yes',
                        'show_custom_label'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'cf_password_label',
                [
                    'label' => __( 'Confirm Password Label', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Password', 'rr_addons' ),
                    'placeholder' => __( 'Password', 'rr_addons' ),
                    'condition'=>[
                        'show_label'=>'yes',
                        'show_custom_label'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'email_label',
                [
                    'label' => __( 'Mail Label', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Mail', 'rr_addons' ),
                    'placeholder' => __( 'Mail', 'rr_addons' ),
                    'condition'=>[
                        'show_label'=>'yes',
                        'show_custom_label'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'confrom_email_label',
                [
                    'label' => __( 'Conform Mail Label', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Mail', 'rr_addons' ),
                    'placeholder' => __( 'Mail', 'rr_addons' ),
                    'condition'=>[
                        'show_label'=>'yes',
                        'show_custom_label'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'show_custom_placeholder',
                [
                    'label' => __( 'Custom Placeholder', 'rr_addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'rr_addons' ),
                    'label_off' => __( 'Hide', 'rr_addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'username_placeholder_label',
                [
                    'label' => __( 'Username Placeholder', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT, 
                    'default' => __( 'Username', 'rr_addons' ),
                    'placeholder' => __( 'Username', 'rr_addons' ),
                    'label_block' => true,
                    'condition'=>[
                        'show_custom_placeholder'=>'yes',
                    ],
                ]
            );

            $this->add_control(
                'password_placeholder_label',
                [
                    'label' => __( 'Password Placeholder', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Password', 'rr_addons' ),
                    'placeholder' => __( 'Password', 'rr_addons' ),
                    'label_block' => true,
                    'condition'=>[
                        'show_custom_placeholder'=>'yes',
                    ],
                ]
            );

            $this->add_control(
                'cf_password_placeholder_label',
                [
                    'label' => __( 'Confirm Password', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Confirm Password', 'rr_addons' ),
                    'placeholder' => __( 'Password', 'rr_addons' ),
                    'label_block' => true,
                    'condition'=>[
                        'show_custom_placeholder'=>'yes',
                    ],
                ]
            );

            $this->add_control(
                'email_placeholder_label',
                [
                    'label' => __( 'Mail Placeholder', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Mail', 'rr_addons' ),
                    'placeholder' => __( 'Mail', 'rr_addons' ),
                    'label_block' => true,
                    'condition'=>[
                        'show_custom_placeholder'=>'yes',
                    ],
                ]
            );

            $this->add_control(
                'submit_button_label',
                [
                    'label' => __( 'Submit Button label', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'REGISTER', 'rr_addons' ),
                    'placeholder' => __( 'REGISTER', 'rr_addons' ),
                    'label_block' => true,
                    'separator' =>'before',
                ]
            );

            $this->add_control(
                'submit_checkbox_label',
                [
                    'label' => __( 'Checkbox Box label', 'rr_addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'I agree to all the statements included in', 'rr_addons' ),
                    'label_block' => true,
                    'separator' =>'before',
                ]
            );

            $this->add_control(
                'redirect_page',
                [
                    'label' => __( 'Redirect page after register', 'rr_addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'no',
                    'label_off' => __( 'No', 'rr_addons' ),
                    'label_on' => __( 'Yes', 'rr_addons' ),
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
                'pp_page',
                [
                    'label' => __( 'Privacy policy page', 'rr_addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'no',
                    'label_off' => __( 'No', 'rr_addons' ),
                    'label_on' => __( 'Yes', 'rr_addons' ),
                ]
            );
            $this->add_control('pp_existing_link',
                [
                    'label'         => __('Select Privacy policy page Link', 'rr_addons'),
                    'type'          => Controls_Manager::SELECT2,
                    'options'       => rr_addons_get_all_pages(),
                    'condition'     => [
                        'pp_page'     => 'yes',
                    ],
                    'multiple'      => false,
                    'separator'     => 'after',
                    'label_block'   => true,
                ]
            );


            $this->add_control(
                'login_page',
                [
                    'label' => __( 'Sign in Page Custom Link', 'rr_addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'no',
                    'label_off' => __( 'No', 'rr_addons' ),
                    'label_on' => __( 'Yes', 'rr_addons' ),
                ]
            );

            $this->add_control('rr_addons_button_existing_link',
            [
                'label'         => __('Select Sign in Page', 'rr_addons'),
                'type'          => Controls_Manager::SELECT2,
                'options'       => rr_addons_get_all_pages(),
                'condition'     => [
                    'login_page'     => 'yes',
                ],
                'multiple'      => false,
                'separator'     => 'after',
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();


        // Style tab section
        $this->start_controls_section(
            'register_form_style_input',
            [
                'label' => __( 'Input', 'rr_addons' ),
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
                'register_form_input_text_color',
                [
                    'label'     => __( 'Text Color', 'rr_addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper input'   => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'register_form_input_placeholder_color',
                [
                    'label'     => __( 'Placeholder Color', 'rr_addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper input[type*="text"]::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .rr-addons-register-wrapper input[type*="text"]::-moz-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .rr-addons-register-wrapper input[type*="text"]:-ms-input-placeholder'  => 'color: {{VALUE}};',
                         '{{WRAPPER}} .rr-addons-register-wrapper input[type*="password"]::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .rr-addons-register-wrapper input[type*="password"]::-moz-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .rr-addons-register-wrapper input[type*="password"]:-ms-input-placeholder'  => 'color: {{VALUE}};',
                         '{{WRAPPER}} .rr-addons-register-wrapper input[type*="email"]::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .rr-addons-register-wrapper input[type*="email"]::-moz-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .rr-addons-register-wrapper input[type*="email"]:-ms-input-placeholder'  => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'register_form_input_typography',
                    'selector' => '{{WRAPPER}} .rr-addons-register-wrapper input',
                ]
            );

            $this->add_control(
                'register_input_background',
                [
                    'label'     => __( 'Background Color', 'rr_addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper input'   => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'register_input_height',
                [
                    'label' => __( 'Height', 'rr_addons' ),
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
                        'size' => 73,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper input' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'register_input_border',
                    'label' => __( 'Border', 'rr_addons' ),
                    'selector' => '{{WRAPPER}} .rr-addons-register-wrapper input',
                ]
            );

            $this->add_responsive_control(
                'register_input_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'rr_addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper input' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        'body.rtl {{WRAPPER}} .rr-addons-register-wrapper input' => 'border-radius: {{TOP}}px {{LEFT}}px {{BOTTOM}}px {{RIGHT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'register_input_margin',
                [
                    'label' => __( 'Margin', 'rr_addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .rr-addons-register-wrapper input' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'register_input_padding',
                [
                    'label' => __( 'Padding', 'rr_addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .rr-addons-register-wrapper input' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
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
                        '{{WRAPPER}} .rr-addons-register-wrapper input:focus' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
    
            $this->add_control(
                'field_focus_color',
                [
                    'label' 		=> __( 'Color', 'rr-addons' ),
                    'type' 			=> Controls_Manager::COLOR,
                    'selectors' 	=> [
                        '{{WRAPPER}} .rr-addons-register-wrapper input:focus' => 'color: {{VALUE}};',
                    ],
                ]
            );
    
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'login_form_input_border_focus',
                    'label' => __( 'Border', 'rr-addons' ),
                    'selector' => '{{WRAPPER}} .rr-addons-register-wrapper input:focus',
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();



            $this->start_controls_section(
                'reg_form_style_rememberme',
                [
                    'label' => __( 'Privacy policy', 'rr-addons' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            
            $this->add_control(
                'privicy_section',
                [
                    'label' => __( 'Privacy policy', 'rr-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'reg_form_input_rememberme_typography',
                    'selector' => '{{WRAPPER}} .rr-addons-register-wrapper form .reg-remember label',
                ]
            );

            $this->add_control(
                'pp_text_color',
                [
                    'label'     => __( 'Text Color', 'rr_addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper form .reg-remember label'   => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'pp_link_color',
                [
                    'label'     => __( 'Link Color', 'rr_addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper form .reg-remember label a'   => 'color: {{VALUE}};',
                    ],
                ]
            );

            

            $this->add_responsive_control(
                'reg_form_input_rememberme_margin',
                [
                    'label' => __( 'Margin', 'rr-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper form .reg-remember label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        'body.rtl {{WRAPPER}} .rr-addons-register-wrapper form .reg-remember label' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}} !important;',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'sing_in_style_rememberme',
                [
                    'label' => __( 'Sign in', 'rr-addons' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'sing_ing_typo',
                    'selector' => '{{WRAPPER}} .rr-addons-register-wrapper .login',
                ]
            );

            $this->add_control(
                'sing_text_color',
                [
                    'label'     => __( 'Text Color', 'rr_addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper .login'   => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'sing_link_color',
                [
                    'label'     => __( 'Link Color', 'rr_addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper .login a'   => 'color: {{VALUE}};',
                    ],
                ]
            );

            

            $this->add_responsive_control(
                'sing_form_input_rememberme_margin',
                [
                    'label' => __( 'Margin', 'rr-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper .login' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        'body.rtl {{WRAPPER}} .rr-addons-register-wrapper .login' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}} !important;',
                    ],
                ]
            );
        $this->end_controls_section(); // Checkbox section end

        // Submit Button
        $this->start_controls_section(
            'register_form_style_submit_button',
            [
                'label' => __( 'Submit Button', 'rr_addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            // Button Tabs Start
            $this->start_controls_tabs('register_form_style_submit_tabs');

                // Start Normal Submit button tab
                $this->start_controls_tab(
                    'register_form_style_submit_normal_tab',
                    [
                        'label' => __( 'Normal', 'rr_addons' ),
                    ]
                );
                    
                    $this->add_control(
                        'register_form_submitbutton_text_color',
                        [
                            'label'     => __( 'Color', 'rr_addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]'   => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'register_form_submitbutton_typography',
                            'selector' => '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]',
                        ]
                    );
                    
                    $this->add_control(
                        'register_form_submitbutton_background',
                        [ 
                            'label'     => __( 'Background Color', 'rr_addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]'   => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'reg_form_button_shadow',
                            'label' => __( 'Box Shadow', 'rr-addons' ),
                            'selector' => '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'register_form_submitbutton_border',
                            'label' => __( 'Border', 'rr_addons' ),
                            'selector' => '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]',
                        ]
                    );

                    $this->add_control(
                        'register_form_submitbutton_height',
                        [
                            'label' => __( 'Height', 'rr_addons' ),
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
                                '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
        
                    $this->add_control(
                        'register_form_submitbutton_width',
                        [
                            'label' => __( 'Width', 'rr_addons' ),
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
                                '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'register_form_submitbutton_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'rr_addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                'body.rtl {{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]' => 'border-radius: {{TOP}}px {{LEFT}}px {{BOTTOM}}px {{RIGHT}}px;',
                            ],
                        ]
                    );
        
                    $this->add_responsive_control(
                        'register_form_submitbutton_margin',
                        [
                            'label' => __( 'Margin', 'rr_addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                'body.rtl {{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                            ],
                        ]
                    );
        
                    $this->add_responsive_control(
                        'register_form_submitbutton_padding',
                        [
                            'label' => __( 'Padding', 'rr_addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                'body.rtl {{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab(); // Normal submit Button tab end

                // Start Hover Submit button tab
                $this->start_controls_tab(
                    'register_form_style_submit_hover_tab',
                    [
                        'label' => __( 'Hover', 'rr_addons' ),
                    ]
                );
                    
                    $this->add_control(
                        'register_form_submitbutton_hover_text_color',
                        [
                            'label'     => __( 'Color', 'rr_addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]:hover'   => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'register_form_submitbutton_hover_background',
                        [
                            'label'     => __( 'Background Color', 'rr_addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]:hover'   => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'reg_form_button_shadow_hover',
                            'label' => __( 'Box Shadow', 'rr-addons' ),
                            'selector' => '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'register_form_submitbutton_hover_border',
                            'label' => __( 'Border', 'rr_addons' ),
                            'selector' => '{{WRAPPER}} .rr-addons-register-wrapper input[type="submit"]:hover',
                        ]
                    );

                $this->end_controls_tab(); // Hover Submit Button tab End
            $this->end_controls_tabs(); // Button Tabs End

            
            
        $this->end_controls_section();

        // Label Style Start
        $this->start_controls_section(
            'register_form_style_label',
            [
                'label' => __( 'Label', 'rr_addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'show_label'=>'yes',
                ]
            ]
        );

            $this->add_control(
                'register_form_label_text_color',
                [
                    'label'     => __( 'Color', 'rr_addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper label'   => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'register_form_label_typography',
                    'selector' => '{{WRAPPER}} .rr-addons-register-wrapper label',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'register_form_label_background',
                    'label' => __( 'Background', 'rr_addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .rr-addons-register-wrapper label',
                ]
            );

            $this->add_responsive_control(
                'register_form_label_margin',
                [
                    'label' => __( 'Margin', 'rr_addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .rr-addons-register-wrapper label' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'register_form_label_padding',
                [
                    'label' => __( 'Padding', 'rr_addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .rr-addons-register-wrapper label' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'register_form_label_border',
                    'label' => __( 'Border', 'rr_addons' ),
                    'selector' => '{{WRAPPER}} .rr-addons-register-wrapper label',
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'register_form_label_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'rr_addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper label' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        'body.rtl {{WRAPPER}} .rr-addons-register-wrapper label' => 'border-radius: {{TOP}}px {{LEFT}}px {{BOTTOM}}px {{RIGHT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'register_form_label_align',
                [
                    'label' => __( 'Alignment', 'rr_addons' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'rr_addons' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'rr_addons' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'rr_addons' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper label' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'left',
                    'separator' =>'before',
                ]
            );
        $this->end_controls_section();

        //box start
        $this->start_controls_section(
            'register_form_style_section',
            [
                'label' => __( 'Box', 'rr_addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_responsive_control(
                'register_form_style_align',
                [
                    'label' => __( 'Alignment', 'rr_addons' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'rr_addons' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'rr_addons' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'rr_addons' ),
                            'icon' => 'fa fa-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'rr_addons' ),
                            'icon' => 'fa fa-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'center',
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'register_form_section_margin',
                [
                    'label' => __( 'Margin', 'rr_addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .rr-addons-register-wrapper' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'register_form_section_padding',
                [
                    'label' => __( 'Padding', 'rr_addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-register-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        'body.rtl {{WRAPPER}} .rr-addons-register-wrapper' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {
        
        $settings   = $this->get_settings_for_display();
        
        $pages_link = get_permalink( $settings['rr_addons_button_existing_link'] );
        $p_pages_link = get_permalink( $settings['pp_existing_link'] );

        $wp_default_link = wp_login_url();
        $login_page = $settings['login_page'];

        if(!empty($pages_link)) {
            $button_link = $pages_link;
        }else{
            $button_link = $wp_default_link;
        };


       
        $current_url = remove_query_arg( 'fake_arg' );
        $id = $this->get_id();

        if ( $settings['redirect_page'] == 'yes' && ! empty( $settings['redirect_page_url']['url'] ) ) {
            $redirect_url = $settings['redirect_page_url']['url'];
        } else {
            $redirect_url = $current_url;
        }

        $this->add_render_attribute( 'register_area_attr', 'class', 'rr-addons-register-wrapper' );

       
        ?>
            <?php
                if ( is_user_logged_in() && ! Plugin::instance()->editor->is_edit_mode() ) {
                    $current_user = wp_get_current_user();
                    echo '<div class="rr-addons-user-login">' .
                        sprintf( __( 'You are Logged in as %1$s (<a href="%2$s">Logout</a>)', 'rr_addons' ), $current_user->display_name, wp_logout_url( $current_url ) ) .
                        '</div>';
                    return;
                }
            ?>

            <?php

                $this->add_render_attribute(
                    'username_input_attr', [
                        'name'  => 'reg_name',
                        'id'    => 'reg_name'.$id,
                        'type'  => 'text',
                        'value' => isset( $_REQUEST['reg_name'] ) ? $_REQUEST['reg_name'] : null,
                        'placeholder' => isset( $settings['username_placeholder_label'] ) ? $settings['username_placeholder_label'] : 'Username',
                    ]
                );

                $this->add_render_attribute(
                    'email_input_attr', [
                        'name'  => 'reg_email',
                        'id'    => 'reg_email'.$id,
                        'type'  => 'email',
                        'value' => isset( $_REQUEST['reg_email'] ) ? $_REQUEST['reg_email'] : null,
                        'placeholder' => isset( $settings['email_placeholder_label'] ) ? $settings['email_placeholder_label'] : 'Email',
                    ]
                );

                $this->add_render_attribute(
                    'conform_email_input_attr', [
                        'name'  => 'conform_reg_email',
                        'id'    => 'conform_reg_email'.$id,
                        'type'  => 'email',
                        'value' => isset( $_REQUEST['conform_reg_email'] ) ? $_REQUEST['conform_reg_email'] : null,
                        'placeholder' => isset( $settings['conform_email_placeholder_label'] ) ? $settings['conform_email_placeholder_label'] : 'Confrom Email',
                    ]
                );


                $this->add_render_attribute(
                    'password_input_attr', [
                        'name'  => 'reg_password',
                        'id'    => 'reg_password'.$id,
                        'type'  => 'password',
                        'value' => isset( $_REQUEST['reg_password'] ) ? $_REQUEST['reg_password'] : null,
                        'placeholder' => isset( $settings['password_placeholder_label'] ) ? $settings['password_placeholder_label'] : 'Password',
                    ]
                );

                $this->add_render_attribute(
                    'cf_password_input_attr', [
                        'name'  => 'cf_reg_password',
                        'id'    => 'cf_reg_password'.$id,
                        'type'  => 'password',
                        'value' => isset( $_REQUEST['cf_reg_password'] ) ? $_REQUEST['cf_reg_password'] : null,
                        'placeholder' => isset( $settings['cf_password_placeholder_label'] ) ? $settings['cf_password_placeholder_label'] : 'Confirm Password',
                    ]
                );

                $this->add_render_attribute(
                    'lname_input_attr', [
                        'name'  => 'reg_lname',
                        'id'    => 'reg_lname'.$id,
                        'type'  => 'text',
                        'value' => isset( $_REQUEST['reg_lname'] ) ? $_REQUEST['reg_lname'] : null,
                        'placeholder' => isset( $settings['lastname_placeholder_label'] ) ? $settings['lastname_placeholder_label'] : 'Last Name',
                    ]
                );

                $this->add_render_attribute(
                    'nickname_input_attr', [
                        'name'  => 'reg_nickname',
                        'id'    => 'reg_nickname'.$id,
                        'type'  => 'text',
                        'value' => isset( $_REQUEST['reg_nickname'] ) ? $_REQUEST['reg_nickname'] : null,
                        'placeholder' => isset( $settings['nickname_placeholder_label'] ) ? $settings['nickname_placeholder_label'] : 'Nick Name',
                    ]
                );

                $this->add_render_attribute(
                    'website_input_attr', [
                        'name'  => 'reg_website',
                        'id'    => 'reg_website'.$id,
                        'type'  => 'text',
                        'value' => isset( $_REQUEST['reg_website'] ) ? $_REQUEST['reg_website'] : null,
                        'placeholder' => isset( $settings['website_placeholder_label'] ) ? $settings['website_placeholder_label'] : 'Website',
                    ]
                );

                $this->add_render_attribute(
                    'submit_input_attr', [
                        'name'  => 'reg_submit'.$id,
                        'id'    => 'reg_submit'.$id,
                        'type'  => 'submit',
                        'value' => isset( $settings['submit_button_label'] ) ? $settings['submit_button_label'] : 'REGISTER',
                    ]
                );

                $this->add_render_attribute(
                    'checkbox_input_attr', [
                        'name'  => 'reg_checkboxes',
                        'id'    => 'reg_checkbox'.$id,
                        'type'  => 'checkbox',
                        'class' => 'reg_remembar'
                    ]
                );

            ?>

            <div id="rr_addons_message_<?php echo esc_attr( $id ); ?>" class="rr_addons_message">&nbsp;</div>
            <div <?php echo $this->get_render_attribute_string( 'register_area_attr' ); ?>>
                <div class="rr-addons-register-form">
                    <form id="rr_addons_register_form_<?php echo esc_attr( $id ); ?>" method="post" action="rr-addonsregisteraction">
                        <div id="rr-addons-form-fs">

                            <div class="form-field">
                                <div class="input_box">
                                    <?php
                                        if( $settings['show_label'] == 'yes' ){
                                            echo sprintf('<label>%1$s</label>',isset( $settings['username_label'] ) ? $settings['username_label'] : 'Username' );
                                        }
                                        echo '<input '.$this->get_render_attribute_string( 'username_input_attr' ).' />';
                                    ?>
                                </div>
                            </div>
                           
                            <div class="form-field">
                                <div class="input_box">
                                    <?php
                                        if( $settings['show_label'] == 'yes' ){ 
                                            echo sprintf('<label>%1$s</label>',isset( $settings['email_label'] ) ? $settings['email_label'] : 'Email' );
                                        }
                                        
                                        echo '<input '.$this->get_render_attribute_string( 'email_input_attr' ).' />';
                                    ?>
                                </div>
                            </div>


                            <div class="form-field">
                                <div class="input_box">
                                    <?php
                                        if( $settings['show_label'] == 'yes' ){ 
                                            echo sprintf('<label>%1$s</label>',isset( $settings['confrom_email_label'] ) ? $settings['confrom_email_label'] : 'Email' );
                                        }
                                        echo '<input '.$this->get_render_attribute_string( 'conform_email_input_attr' ).' />';
                                    ?>
                                </div>
                            </div>

                            <div class="form-field">
                                <div class="input_box">
                                    <?php
                                        if( $settings['show_label'] == 'yes' ){ 
                                            echo sprintf('<label>%1$s</label>',isset( $settings['password_label'] ) ? $settings['password_label'] : 'Password' );
                                        }
                                        echo '<input '.$this->get_render_attribute_string( 'password_input_attr' ).' />';
                                    ?>
                                </div>
                            </div>

                            <div class="form-field">
                                <div class="input_box">
                                    <?php
                                        if( $settings['show_label'] == 'yes' ){ 
                                            echo sprintf('<label>%1$s</label>',isset( $settings['cf_password_label'] ) ? $settings['cf_password_label'] : 'Confirm Password' );
                                        }
                                        echo '<input '.$this->get_render_attribute_string( 'cf_password_input_attr' ).' />';
                                    ?>
                                </div>
                            </div>
                           
                            <?php if('yes' == $settings['pp_page'] ): ?>
                                <div class="reg-remember">
                                    <?php if( $settings['cf_remember_me'] == 'yes' ): ?>

                                        <label class="lable-content" id="cf_rememberme">
                                            <!-- <span class="checkmark"></span> -->
                                            <?php 
                                                echo '<input '.$this->get_render_attribute_string( 'checkbox_input_attr' ).' />';
                                            ?>
                                            <?php esc_html_e('I agree with the terms & conditions','rr-addons'); ?>
                                              <a href="<?php echo esc_url($p_pages_link ) ?>"><?php _e(' privacy policy', 'rr-addons') ?></a>
                                        </label>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-field password-field">
                                <input <?php echo $this->get_render_attribute_string( 'submit_input_attr' ); ?> />
                            </div>

                            <?php if( $login_page === 'yes'): ?>
                                <div class="form-field">
                                    <div class="login">
                                        <span><?php _e('Already have an account?', 'rr_addons') ?></span>
                                        <a href="<?php echo esc_url( $button_link ) ?>">
                                        <?php echo esc_html__( 'Sign in now','rr_addons' );?></a>
                                    </div>
                                </div>
                           <?php endif; ?>           
                        </div>
                    </form>
                </div>
            </div>

        <?php
        $this->rr_addons_register_request( $id, $settings['redirect_page'], $redirect_url );

    }

    public function rr_addons_register_request( $id, $reddirectstatus ,$redirect_url ){
        ?>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    "use strict";

                    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
                    var loadingmessage = '<?php echo esc_html__('Please Wait...','rr_addons'); ?>';
                    var form_id = 'form#rr_addons_register_form_<?php echo esc_attr( $id ); ?>';
                    var button_id = '#reg_submit<?php echo esc_attr( $id ); ?>';
                    var nonce = '<?php wp_create_nonce( 'rr_addons_register_nonce' ) ?>';
                    var redirect = '<?php echo $reddirectstatus; ?>';

                    $( button_id ).on('click', function(){

                        $('#rr_addons_message_<?php echo esc_attr( $id ); ?>').html('<span class="rr_addons_lodding_msg">'+ loadingmessage +'</span>').fadeIn();

                        var is_reg_checkbox =  $( form_id + ' #reg_checkbox<?php echo esc_attr( $id ); ?>').is(":checked");

                        var data = {
                            action:          "rr_addons_ajax_register",
                            nonce:           nonce,
                            reg_name:        $( form_id + ' #reg_name<?php echo esc_attr( $id ); ?>').val(),
                            reg_password:    $( form_id + ' #reg_password<?php echo esc_attr( $id ); ?>').val(),
                            cf_reg_password: $( form_id + ' #cf_reg_password<?php echo esc_attr( $id ); ?>').val(),
                            reg_email:       $( form_id + ' #reg_email<?php echo esc_attr( $id ); ?>').val(),
                            conform_reg_email: $( form_id + ' #conform_reg_email<?php echo esc_attr( $id ); ?>').val(),
                            reg_website:     $( form_id + ' #reg_website<?php echo esc_attr( $id ); ?>').val(),
                            reg_checkbox:    is_reg_checkbox,
                        };

                        $.ajax({  
                            type: 'POST',
                            dataType: 'json',  
                            url:  ajaxurl,
                            data: data,
                            success: function( msg ){

                                console.log(msg);
                                if ( msg.registerauth == true ){

                                    $('#rr_addons_message_<?php echo esc_attr( $id ); ?>').html('<div class="rr_addons_success_msg alert alert-success">'+ msg.message +'</div>').fadeIn();
                                    if( redirect === 'yes' ){
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
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Reg_Form() );