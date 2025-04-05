<?php
/**
 * techex Image Carousel.
 *
 *
 * @since 1.0.0
 */
use  Elementor\Widget_Base;
use  Elementor\Controls_Manager;
use  Elementor\utils;
use  Elementor\Group_Control_Typography;
use  Elementor\Group_Control_Box_Shadow;
use  Elementor\Group_Control_Background;
use  Elementor\Group_Control_Border;
use  Elementor\Embed;
use  Elementor\Icons_Manager;
use  Elementor\Repeater;
if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Techex_Hero_Two extends \Elementor\Widget_Base
{
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
    public function get_name()
    {
        return 'techex-hero-two';
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
    public function get_title()
    {
        return __('Hero Section Two', 'techex-hp');
    }

    public function get_keywords(){
        return ['iamge ', 'carousel','hero one', 'slider' ];
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
    public function get_icon()
    {
        return 'eicon-image-rollover';
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
    public function get_categories()
    {
        return ['techex-addons'];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */


    protected function register_controls()
    {
        /**
         * ====================================Content tab========================================
         */
        $this->start_controls_section(
            'h2_content_section',
            [
                'label' => __('Content', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

       $this->add_control(
            'static_text',
            [
                'label'       => __( 'Static Text', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('TECH HEX', 'techex-hp'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'h_bg_image',
            [
                'label'       => __( 'Background Image', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'top_title_arrows',
            [
                'label' => __( 'Top Title Show?', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $repeater->add_control(
            'top_title',
            [
                'label'       => __( 'Top Title', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('we are creative it service agency', 'techex-hp'),
                'condition' => [
                    'top_title_arrows' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'h_title',
            [
                'label'       => __( 'Title', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('IT Business', 'techex-hp'),
            ]
        );

        $repeater->add_control(
            'h_sub_title',
            [
                'label'       => __( 'Sub Title', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('Solutions For', 'techex-hp'),
            ]
        );

        $repeater->add_control(
            'h_discription',
            [
                'label'       => __( 'Short Discription', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => __('We Have 25 Years Of Experience In IT Solutions', 'techex-hp'),
            ]
        );

        $repeater->add_control(
			'h2_btn_one',
			[
				'label' => __( 'Button One', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);
        $repeater->add_control(
            'h2_btn_one_text',
            [
                'label'       => __( 'Button Text', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('Service we provide ', 'techex-hp'),
            ]
        );
        $repeater->add_control(
            'button_one_icon',
            [
                'label' => __( 'Btn Icon', 'techex' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::ICONS,

                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
           );
        $repeater->add_control(
            'h2_btn_one_url',
            [
                'label'       => __( 'Button Url', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'label_block' => true,
            ]
        );


        $repeater->add_control(
			'h2_btn_two',
			[
				'label' => __( 'Button Two', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

        $repeater->add_control(
            'h2_btn_two_text',
            [
                'label'       => __( 'Button Text', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('learn more', 'techex-hp'),
            ]
        );
        $repeater->add_control(
            'button_two_icon',
            [
                'label' => __( 'Btn Icon', 'techex' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
           );
        $repeater->add_control(
            'h2_btn_two_url',
            [
                'label'       => __( 'Button Url', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'label_block' => true,
            ]
        );

        // End Repeater Control field
        $this->add_control(
            'h2_contents',
            [
                'label' => __( 'Repeater List', 'omega-hp' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(h_title.slice(0,1).toUpperCase() + h_title.slice(1)) #>',
            ]
        );

        $this->end_controls_section();
		
		$this->start_controls_section('content_style_background',
            [
            'label' => __('Container', 'techex-hp'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'box_align',
            [
                'label' => __( 'Alignment', 'techex-hp' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'techex-hp' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'techex-hp' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'techex-hp' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .hero-contents' => 'text-align: {{VALUE}};',
                ],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'background_gradient_color',
				'types'     => [ 'classic', 'gradient' ],
				'fields_options'  => [
					'background'  => [
						'default' => 'classic'
					],
				],
				'selector'  => '{{WRAPPER}} .hero-2 .single-slide::before, .hero-2 .single-slide::after',
			]
		);
		$this->end_controls_section();
		
		
        // ===============================Content Style tab =====================================

        $this->start_controls_section('content_style',
            [
            'label' => __('Contents', 'techex-hp'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
         // ============================Static Text ==============================================
         $this->add_control(
			'hero text_typo',
			[
				'label' => __( 'Static Text', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'hero-text_typography',
                'label'    => __( 'Typography', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .hero-text',
            ]
        );
        $this->add_responsive_control(
			'hero_text_top_position',
			[
				'label' => __( 'Static Text X position', 'techex-hp' ),
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
					'{{WRAPPER}} .hero-text' => 'top: {{SIZE}}{{UNIT}};',
                ],


			]
        );
        $this->add_responsive_control(
			'hero_text_left_position',
			[
				'label' => __( 'Static Text Y position', 'techex-hp' ),
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
					'{{WRAPPER}} .hero-text' => 'left: {{SIZE}}{{UNIT}};',
                ],


			]
        );
        // =================================== Top Title ==========================================
        $this->add_control(
			'top_title_h2',
			[
				'label' => __( 'Top Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);
        $this->add_control(
            'h2_top_title_color',
            [
                'label'     => __('Color', 'techex-hp'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h2_top_bg_title_color',
            [
                'label'     => __('Background Color', 'techex-hp'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents h3' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'h2_top_title_typo',
                'label'    => __('Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .hero-2 .single-slide .hero-contents h3',
            ]
        );
        $this->add_responsive_control(
            'h2_title_top_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .hero-2 .single-slide .hero-contents h3' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'h2_title_top_padding',
            [
                'label'      => __('Padding', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .hero-2 .single-slide .hero-contents h3' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'h2_title_top_border_radisu',
            [
                'label'      => __('Border Radius', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .hero-2 .single-slide .hero-contents h3' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        // =================================== Title ==========================================
        $this->add_control(
			'title_h2',
			[
				'label' => __( 'Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);
        $this->add_control(
            'h2_title_color',
            [
                'label'     => __('Color', 'techex-hp'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents h1' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'h2_title_typo',
                'label'    => __('Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .hero-2 .single-slide .hero-contents h1',
            ]
        );
        $this->add_responsive_control(
            'h2_title_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .hero-2 .single-slide .hero-contents h1' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        // =============================== Sub Title  ==========================================
        $this->add_control(
			'h2_sub_title',
			[
				'label' => __( 'Sub Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);
        $this->add_control(
            'h2_sub_title_color',
            [
                'label'     => __('Color', 'techex-hp'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'h2_sub_title_typo',
                'label'    => __('Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .hero-2 .single-slide .hero-contents h2',
            ]
        );
        $this->add_responsive_control(
            'h2_sub_title_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .hero-2 .single-slide .hero-contents h2' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        //=================================== Discription ==================================
        $this->add_control(
			'h2_dis_title',
			[
				'label' => __( 'Discription', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);
        $this->add_control(
            'h2_dis_title_color',
            [
                'label'     => __('Color', 'techex-hp'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'dis_title_typo',
                'label'    => __('Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .hero-2 .single-slide .hero-contents p',
            ]
        );
        $this->add_responsive_control(
            'h2_dis_title_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','%'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-2 .single-slide .hero-contents p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .hero-2 .single-slide .hero-contents p' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //=========================  Button Style One =========================================
        $this->start_controls_section(
            'h2_button_style',
            [
                'label' => __( 'Button One', 'techex-hp' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'h2_button_style_tabs'
        );

        $this->start_controls_tab(
            'h2_button_style_normal_tab',
            [
                'label' => __( 'Normal', 'techex-hp' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'h2_btn_typography',
                'label'    => __( 'Typography', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .single-slide .theme-btn.techex-btn',
            ]
        );
        $this->add_control(
            'h2_boxed_btn_color',
            [
                'label'     => __( 'Button Color', 'techex-hp' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-slide .theme-btn.techex-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h2_boxed_btn_background',
            [
                'label'     => __( 'Background Color', 'techex-hp' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .theme-btn.techex-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_one_icon_gap',
            [
                'label' => __('Icon gap', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
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
                'selectors' => [
                    '{{WRAPPER}} .hero-contents .techex-btn i, .hero-contents .techex-btn svg' => 'margin-left: {{SIZE}}{{UNIT}};'
                    ,
                ],
            ]
        );

        $this->add_control(
            'btn_one_icon_gap_top',
            [
                'label' => __('Icon gap Top', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
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
                'selectors' => [
                    '{{WRAPPER}} .hero-contents .techex-btn i, .hero-contents .techex-btn svg' => 'margin-top: {{SIZE}}{{UNIT}};'
                    ,
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'h2_button_border',
                'label'    => __( 'Border', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .single-slide .theme-btn.techex-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'h2_button_shadow',
                'label'    => __( 'Button Shadow', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .techex-btn',
            ]
        );
        $this->add_responsive_control(
            'h2_button_radius',
            [
                'label'      => __( 'Border Radius', 'techex-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-btn'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-btn' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}}
                    ;',
                ],
            ]
        );
        $this->add_responsive_control(
            'h2_button_margin',
            [
                'label'      => __( 'Button Margin', 'techex-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-btn'          => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-btn' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'h2_button_padding',
            [
                'label'      => __( 'Button Padding', 'techex-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-btn'          => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-btn' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

          //===================== Button One Hover ===============================================

        $this->start_controls_tab(
            'h2_button_style_hover_tab',
            [
                'label' => __( 'Hover', 'techex-hp' ),
            ]
        );
        $this->add_control(
            'h2_btn_hover_color',
            [
                'label'     => __( 'Button Color', 'techex-hp' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .theme-btn.techex-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h2_btn_hover_bg_color',
            [
                'label'     => __( 'Background Color', 'techex-hp' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .theme-btn.techex-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'h2_button_hover_border',
                'label'    => __( 'Border', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .single-slide .theme-btn.techex-btn:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'h2_button_hover_shadow',
                'label'    => __( 'Button Shadow', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .single-slide .theme-btn.techex-btn:hover',
            ]
        );
        $this->add_responsive_control(
            'h2_button_hover_radius',
            [
                'label'      => __( 'Border Radius', 'techex-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-slide .theme-btn.techex-btn:hover'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .single-slide .theme-btn.techex-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}}
                    ;',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // =================================  Button Two Style =================================
        $this->start_controls_section(
            'h2_button_style_two',
            [
                'label' => __( 'Button Two', 'techex-hp' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'h2_button_style_tabs_two'
        );

        $this->start_controls_tab(
            'h2_button_style_normal_tab_two',
            [
                'label' => __( 'Normal', 'techex-hp' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'h2_btn_typography_two',
                'label'    => __( 'Typography', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .single-slide .theme-btn.minimal-btn',
            ]
        );
        $this->add_control(
            'h2_boxed_btn_color_two',
            [
                'label'     => __( 'Button Color', 'techex-hp' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-slide .theme-btn.minimal-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h2_boxed_btn_background_two',
            [
                'label'     => __( 'Background Color', 'techex-hp' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .theme-btn.minimal-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_two_icon_gap',
            [
                'label' => __('Icon gap', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
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
                'selectors' => [
                    '{{WRAPPER}} .hero-contents .minimal-btn i, .hero-contents .minimal-btn svg' => 'margin-left: {{SIZE}}{{UNIT}};'
                    ,
                ],
            ]
        );

        $this->add_control(
            'btn_two_icon_gap_top',
            [
                'label' => __('Icon gap Top', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
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
                'selectors' => [
                    '{{WRAPPER}} .hero-contents .minimal-btn i, .hero-contents .minimal-btn svg' => 'margin-top: {{SIZE}}{{UNIT}};'
                    ,
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'h2_button_border_two',
                'label'    => __( 'Border', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .single-slide .theme-btn.minimal-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'h2_button_shadow_two',
                'label'    => __( 'Button Shadow', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .single-slide .theme-btn.minimal-btn',
            ]
        );
        $this->add_responsive_control(
            'h2_button_radius_two',
            [
                'label'      => __( 'Border Radius', 'techex-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-slide .theme-btn.minimal-btn'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .single-slide .theme-btn.minimal-btn' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}}
                    ;',
                ],
            ]
        );
        $this->add_responsive_control(
            'h2_button_margin_two',
            [
                'label'      => __( 'Button Margin', 'techex-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-slide .theme-btn.minimal-btn'          => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .single-slide .theme-btn.minimal-btn' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h2_button_padding_two',
            [
                'label'      => __( 'Button Padding', 'techex-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-slide .theme-btn.minimal-btn'          => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .single-slide .theme-btn.minimal-btn' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
           // ======================== Button Two Hover ========================================
        $this->start_controls_tab(
            'h2_button_style_hover_tab_two',
            [
                'label' => __( 'Hover', 'techex-hp' ),
            ]
        );
        $this->add_control(
            'h2_btn_hover_color_two',
            [
                'label'     => __( 'Button Color', 'techex-hp' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .theme-btn.minimal-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h2_btn_hover_bg_color_two',
            [
                'label'     => __( 'Background Color', 'techex-hp' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .theme-btn.minimal-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'h2_button_hover_border_two',
                'label'    => __( 'Border', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .single-slide .theme-btn.minimal-btn:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'h2_button_hover_shadow_two',
                'label'    => __( 'Button Shadow', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .single-slide .theme-btn.minimal-btn:hover',
            ]
        );
        $this->add_responsive_control(
            'h2_button_hover_radius_two',
            [
                'label'      => __( 'Border Radius', 'techex-hp' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-slide .theme-btn.minimal-btn:hover'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .single-slide .theme-btn.minimal-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}}
                    ;',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        /*
        * ============================= Dots Style ==============================================
        */
        $this->start_controls_section(
            'dots_navigation',
            [
                'label' => __('Navigation - Dots', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('_tabs_dots');

        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __('Normal', 'techex-hp'),
            ]
        );

        $this->add_control(
            'dots_color',
            [
                'label' => __('Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button.owl-dot span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_align',
            [
                'label' => __( 'Alignment', 'techex-hp' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'techex-hp' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'techex-hp' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'techex-hp' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 .owl-dots' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_box_width',
            [
                'label' => __('Width', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button.owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_box_height',
            [
                'label' => __('Height', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button.owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_margin',
            [
                'label'          => __('Gap Right', 'techex-hp'),
                'type'           => Controls_Manager::SLIDER,
                'default'        => [
                    'unit' => 'px',
                ],
                'range'          => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .hero-slider-2 button.owl-dot span ' => 'margin-right: {{SIZE}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .hero-slider-2 button.owl-dot span ' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_min_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} section.hero-slide-wrapper.hero-2 .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    'body.rtl {{WRAPPER}} section.hero-slide-wrapper.hero-2 .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_border_radius',
            [
                'label'      => __('Border Radius', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-slider-2 button.owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .hero-slider-2 button.owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

            // ======================= Dots Active Style =======================================

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __('Active', 'techex-hp'),
            ]
        );
        $this->add_control(
            'dots_color_active',
            [
                'label' => __('Active Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button.owl-dot.active span' => 'background-color: {{VALUE}}  !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_dots_box_active_width',
            [
                'label' => __('Width', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button.owl-dot.active span' => 'width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_dots_box_active_height',
            [
                'label' => __('Height', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button.owl-dot.active span' => 'height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
                /*
        *
           ================================== Arrow style =======================
        */
        $this->start_controls_section(
            'arrows_navigation',
            [
                'label' => __('Navigation - Arrow', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('_tabs_arrow');

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __('Normal', 'techex-hp'),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __('Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button i' => 'color: {{VALUE}}; border-color: {{VALUE}};',
                    '{{WRAPPER}} .hero-slider-2 button i svg path' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __('Background Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button i' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'arrow_shadow',
                'label' => __('Shadow', 'techex-hp'),
                'selector' => '{{WRAPPER}} .hero-slider-2 button i ',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'label' => esc_html__( 'Border', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .hero-slider-2 button i',
            ]
        );

        $this->add_responsive_control(
            'arrow_icon_size',
            [
                'label' => __('Icon Size', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .hero-slider-2 button i' => 'font-size: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}}  .hero-slider-2 button svg' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_size_box',
            [
                'label' => __('Size', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button i' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
                ],
            ]

        );

        $this->add_responsive_control(
            'arrow_size_line_height',
            [
                'label' => __('Line Height', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button i' => 'line-height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]

        );

        $this->add_responsive_control(
            'arrows_border_radius',
            [
                'label'      => __('Border Radius', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-slider-2 button i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .hero-slider-2 button i ' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

            //==============================Arrow Hover Style =============================

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __('Hover', 'techex-hp'),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __('Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button i:hover ' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .hero-slider-2 button i:hover svg path ' => 'stroke: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_hover_color',
            [
                'label' => __('Background Color Hover', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-slider-2 button i:hover ' => 'background-color: {{VALUE}}  !important;',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border_hover',
                'label' => esc_html__( 'Border', 'techex-hp' ),
                'selector' => '{{WRAPPER}} .hero-slider-2 button i:hover',
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // Slider Option
        $this->start_controls_section('slider_settings',
            [
            'label' => __('Slider Settings', 'techex-hp'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'arrows',
            [
                'label' => __( 'Show arrows?', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label' => __( 'Show Dots?', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'mousedrag',
            [
                'label' => __( 'MouseDrag?', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Auto Play?', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => __( 'Infinite Loop', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'autoplaytimeout',
            [
                'label' => __( 'Autoplay Timeout', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '5000',
                'options' => [
                    '1000'  => __( '1 Second', 'techex-hp' ),
                    '2000'  => __( '2 Second', 'techex-hp' ),
                    '3000'  => __( '3 Second', 'techex-hp' ),
                    '4000'  => __( '4 Second', 'techex-hp' ),
                    '5000'  => __( '5 Second', 'techex-hp' ),
                    '6000'  => __( '6 Second', 'techex-hp' ),
                    '7000'  => __( '7 Second', 'techex-hp' ),
                    '8000'  => __( '8 Second', 'techex-hp' ),
                    '9000'  => __( '9 Second', 'techex-hp' ),
                    '10000' => __( '10 Second', 'techex-hp' ),
                    '11000' => __( '11 Second', 'techex-hp' ),
                    '12000' => __( '12 Second', 'techex-hp' ),
                    '13000' => __( '13 Second', 'techex-hp' ),
                    '14000' => __( '14 Second', 'techex-hp' ),
                    '15000' => __( '15 Second', 'techex-hp' ),
                ],
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();



        // Slider Option
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $contents =  $settings['h2_contents'];
        $static_text = $settings['static_text'];

         // Slider Option
         $slider_extraSetting = array(
	        'loop' => (!empty($settings['loop']) && 'yes' === $settings['loop']) ? true : false,
	        'autoplay' => (!empty($settings['autoplay']) && 'yes' === $settings['autoplay']) ? true : false,
        	'nav' => (!empty($settings['arrows']) && 'yes' === $settings['arrows']) ? true : false,
        	'dots' => (!empty($settings['dots']) && 'yes' === $settings['dots']) ? true : false,
        	'mousedrag' => (!empty($settings['mousedrag']) && 'yes' === $settings['mousedrag']) ? true : false,
        	'autoplaytimeout' => !empty($settings['autoplaytimeout']) ? $settings['autoplaytimeout'] : '5000',
        );

        $jasondecode = wp_json_encode($slider_extraSetting);


        $this->add_render_attribute('slider_active', 'class', array('hero-slider-2','owl-carousel'));
        $this->add_render_attribute('slider_active', 'data-settings', $jasondecode);



       ?>
       <section class="hero-slide-wrapper hero-2">

			<div class="hero-text"><?php echo esc_html($static_text);?></div>

				<div <?php echo $this->get_render_attribute_string('slider_active'); ?>>
                <?php foreach($contents as $content):

                    $target =   $content['h2_btn_one_url']['is_external'] ? ' target="_blank" ' : '';
                    $nofollow = $content['h2_btn_one_url']['nofollow'] ? ' rel="nofollow" ' : '';
                    $target_two =   $content['h2_btn_two_url']['is_external'] ? ' target="_blank" ' : '';
                    $nofollow_two = $content['h2_btn_two_url']['nofollow'] ? ' rel="nofollow" ' : '';
                    ?>

					<div class="single-slide bg-cover" style="background-image: url(<?php echo esc_url($content['h_bg_image']['url']);?>)">
                  
						<div class="container">
							<div class="row">
								<div class="col-12 col-lg-12 col-xl-12">
									<div class="hero-contents">
										

										<?php if($content['top_title'] ): ?>
                                       		<h3 class="top-title d-inline-block techex-animate-1 "><?php echo esc_html($content['top_title'] );  ?></h1>
										<?php endif; ?>

										<?php if($content['h_title'] ): ?>
                                       		<h1 class="fs-lg techex-animate-1"><?php echo esc_html($content['h_title'] );  ?></h1>
										<?php endif; ?>
										
										<?php if($content['h_sub_title'] ): ?>
                                      		 <h2 class="techex-animate-1"><?php echo esc_html($content['h_sub_title']);  ?></h2>
										<?php endif; ?>
										
										<?php if($content['h_discription'] ): ?>
                                       		<p class="techex-animate-2"><?php echo esc_html($content['h_discription']); ?></p>
										<?php endif; ?>
										
										<?php if($content['h2_btn_one_text'] ): ?>
										   <a  class="theme-btn techex-btn techex-animate-3" <?php printf('href="%s" %s %s', $content['h2_btn_one_url']['url'], $target, $nofollow); ?>>
												<?php echo esc_html($content['h2_btn_one_text'] )  ?>
												<?php \Elementor\Icons_Manager::render_icon( $content['button_one_icon'] ); ?>
											</a>
										<?php endif; ?>
										
										<?php if($content['h2_btn_two_text'] ): ?>
											<a class="theme-btn minimal-btn techex-animate-3" <?php printf('href="%s" %s %s', $content['h2_btn_two_url']['url'], $target_two, $nofollow_two); ?>>
											<?php echo esc_html($content['h2_btn_two_text'] )  ?>
											<?php \Elementor\Icons_Manager::render_icon( $content['button_two_icon'] ); ?>
											</a>
										<?php endif; ?>

									</div>
								</div>
							</div>
						</div>
					</div>

                    <?php endforeach; ?>

				</div>
		</section>
    <?php
    }
}
$widgets_manager->register_widget_type(new \Techex_Hero_Two());