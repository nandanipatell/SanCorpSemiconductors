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

class Techex_Testimonial_Slider_default extends \Elementor\Widget_Base
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
        return 'techex-testimonial-2';
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
        return __('Techex Testimonial Two', 'techex-hp');
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

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'blockqoute_icon',
            [
                'label' => __( 'Blockqoute Icon', 'techex' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::ICONS,

                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
           );

        $repeater->add_control(
            'h_discription',
            [
                'label'       => __( 'Short Discription', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => __('Techex has been around for more than adecade. It’s a trusted social media tool for businesses of all shapes and sizes.', 'techex-hp'),
            ]
        );

		$repeater->add_control(
            'h_user_name',
            [
                'label'       => __( 'User Name', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('Symash Petel,', 'techex-hp'),
            ]
        );
        $repeater->add_control(
            'h_user_des',
            [
                'label'       => __( 'User Description', 'techex-hp' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __('CEO-Aliner', 'techex-hp'),
            ]
        );



        // End Repeater Control field
        $this->add_control(
            'h2_contents',
            [
                'label' => __( 'Repeater List', 'omega-hp' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(h_user_title.slice(0,1).toUpperCase() + h_user_title.slice(1)) #>',
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

        $this->add_responsive_control(
            'slider_content_align',
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
                    '{{WRAPPER}} .techex-single-testimonial-item2' => 'text-align: {{VALUE}};',
                ],
            ]
        );

         // =============================== Blockquote Style tab =====================================
        $this->add_control(
            'blockquote_icon',
            [
                'label' => __( 'Blockquote Icon', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'blockquote_icon_color',
            [
                'label' => __('Blockquote Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .techex-single-testimonial-item2 i' => 'color: {{VALUE}}; border-color: {{VALUE}};',
                    '{{WRAPPER}} .techex-single-testimonial-item2 svg path' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blockquote_icon_fill_color',
            [
                'label' => __('Blockquote fill Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .techex-single-testimonial-item2 svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'blockquote_icon_size',
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
                    '{{WRAPPER}}  .techex-single-testimonial-item2  i' => 'font-size: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}}  .techex-single-testimonial-item2 svg' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'blockquote_icon_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-single-testimonial-item2 i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .techex-single-testimonial-item2 svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );

        //=================================== End Blockquote Icon ==================================


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
                    '{{WRAPPER}} .techex-single-testimonial-item2 p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'dis_title_typo',
                'label'    => __('Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-single-testimonial-item2 p',
            ]
        );
        $this->add_responsive_control(
            'p_dis_title_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-single-testimonial-item2 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-single-testimonial-item2 p' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        //=================================== Testimonial User Name ==================================
        $this->add_control(
            'user_name',
            [
                'label' => __( 'User Name', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'user_name_color',
            [
                'label'     => __('Color', 'techex-hp'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-user-author h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'user_name_typo',
                'label'    => __('Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .testimonial-user-author h4',
            ]
        );
        $this->add_responsive_control(
            'user_name_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-user-author h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .testimonial-user-author h4' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

         //=================================== Testimonial User Des ==================================
        $this->add_control(
            'user_des',
            [
                'label' => __( 'User Description', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'user_des_color',
            [
                'label'     => __('Color', 'techex-hp'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-user-author p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'user_des_typo',
                'label'    => __('Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .testimonial-user-author p',
            ]
        );
        $this->add_responsive_control(
            'user_des_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-user-author p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .testimonial-user-author p' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );



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
                    '{{WRAPPER}} .techex-testimonial-2 button.owl-dot span' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .techex-testimonial-2 .owl-dots' => 'text-align: {{VALUE}};',
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
                    '{{WRAPPER}} .techex-testimonial-2 button.owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .techex-testimonial-2 button.owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .techex-testimonial-2 button.owl-dot span ' => 'margin-right: {{SIZE}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-testimonial-2 button.owl-dot span ' => 'margin-left: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .techex-testimonial-2 button.owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-testimonial-2 button.owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
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
                    '{{WRAPPER}} .techex-testimonial-2 button.owl-dot.active span' => 'background-color: {{VALUE}}  !important;',
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
                    '{{WRAPPER}} .techex-testimonial-2 button.owl-dot.active span' => 'width: {{SIZE}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .techex-testimonial-2 button.owl-dot.active span' => 'height: {{SIZE}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .techex-testimonial-2 button i' => 'color: {{VALUE}}; border-color: {{VALUE}};',
                    '{{WRAPPER}} .techex-testimonial-2 button i svg path' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __('Background Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-testimonial-2 button i' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_align',
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
                    '{{WRAPPER}} .techex-testimonial-2 .owl-nav' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'arrow_shadow',
                'label' => __('Shadow', 'fd-addons'),
                'selector' => '{{WRAPPER}} .techex-testimonial-2 button i ',
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
                    '{{WRAPPER}}  .techex-testimonial-2 button i' => 'font-size: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}}  .techex-testimonial-2 button svg' => 'width: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}} .techex-testimonial-2 button i' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}} .techex-testimonial-2 button i' => 'line-height: {{SIZE}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .techex-testimonial-2 button i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-testimonial-2 button i ' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
         $this->add_responsive_control(
            'arrows_border_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-testimonial-2 button i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-testimonial-2 button i' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
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
                    '{{WRAPPER}} .techex-testimonial-2 button i:hover ' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .techex-testimonial-2 button i:hover svg path ' => 'stroke: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_hover_color',
            [
                'label' => __('Background Color Hover', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-testimonial-2 button i:hover ' => 'background-color: {{VALUE}}  !important;',
                ],
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


        $this->add_render_attribute('slider_active', 'class', array('techex-testimonial-2','owl-carousel'));
        $this->add_render_attribute('slider_active', 'data-settings', $jasondecode);



       ?>

		<div <?php echo $this->get_render_attribute_string('slider_active'); ?>>
        <?php foreach($contents as $content):?>
          
			<div class="techex-single-testimonial-item2">
				
					<?php \Elementor\Icons_Manager::render_icon( $content['blockqoute_icon'] ); ?>

					<?php if($content['h_discription'] ): ?>
                   		<p><?php echo esc_html($content['h_discription']); ?></p>
					<?php endif; ?>

                    <div class="testimonial-user-author">
                        <?php if($content['h_user_name'] ): ?>
                            <h4><?php echo esc_html($content['h_user_name']);  ?></h4>
                        <?php endif; ?>
                        <?php if($content['h_user_des'] ): ?>
                            <p><?php echo esc_html($content['h_user_des']);  ?></p>
                        <?php endif; ?>
                    </div>
                    
				</div>

            <?php endforeach; ?>

		</div>
    <?php
    }
}
$widgets_manager->register_widget_type(new \Techex_Testimonial_Slider_default());