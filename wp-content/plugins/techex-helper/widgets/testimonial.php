<?php
/**
 * techex-hp Testimonial Normal Widget.
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
use Elementor\Repeater;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) {
    exit;
}
// If this file is called directly, abort.
class Techex_Testimonail_Loop extends \Elementor\Widget_Base {
    public function get_name() {
        return 'techex-testimonial-loop';
    }

    public function get_title() {
        return __('Techex Testimonial', 'techex-hp');
    }

    public function get_icon() {
        return ('eicon-testimonial');
    }

    public function get_categories() {
        return ['techex-addons'];
    }

    public function get_script_depends()
    {
        return ['techex-addon'];
    }

    public function get_style_depends()
    {
        return ['owl-carousel', 'techex-addons'];
    }

    public function get_keywords() {
        return ['team', 'card', 'testimonial', 'membar', 'reviw', 'rating'];
    }

    protected function register_controls() {
        $this->start_controls_section('ts_section',
            [
                'label' => __('General', 'techex-hp'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'testimonial_style',
            [
                'label'             => __( 'Testimonial Style', 'techex-hp' ),
                'type'              => Controls_Manager::SELECT,
                'default'           => 'style-one',
                'options'           => [
                    'style-one'    =>   __('Style 01',     'techex-hp'),
                    'style-two'    =>   __('Style 02',     'techex-hp'),
                    'style-three'  =>   __('Style 03',   'techex-hp'),
                    'style-four'   =>   __('Style 04',    'techex-hp'),
                    'style-five'   =>   __('Style 05',    'techex-hp'),
                    'style-six'    =>   __('Style 06',    'techex-hp'),
                    'style-seven'  =>   __('Style 07',    'techex-hp'),
                    'style-eight'  =>   __('Style 08',    'techex-hp'),
                    'style-nine'    =>   __('Style 09',    'techex-hp'),
                    'style-ten'    =>   __('Style 10',    'techex-hp'),
                ],
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'show_slider_settings',
            [
                'label' => __('Slider Active', 'techex-hp'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        $this->add_control(
            'show_quate',
            [
                'label' => __('Show Quate', 'techex-hp'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',

            ]
        );

        $this->add_control(
            'quate',
            [
                'label' => __('Quate Icon', 'techex-hp'),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
                'condition' => [
                    'show_quate' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'layout_gap',
            [
                'label' => __( 'Item Gap', 'techex' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'Default', 'techex' ),
                'label_on' => __( 'Custom', 'techex' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_responsive_control(
            'item_gap_right',
            [
                'label'          => __('Gap Right', 'techex'),
                'type'           => Controls_Manager::SLIDER,
                'size_units'     => ['px'],
                'range'          => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .techex--tn-single' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .techex--tn-wraper' => 'margin-right: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'item_gap_bottom',
            [
                'label'          => __('Gap Bottom', 'techex'),
                'type'           => Controls_Manager::SLIDER,
                'size_units'     => ['px'],
                'range'          => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .techex--tn-single' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .techex--tn-wraper' => 'margin-bottom: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        //Query
        $this->start_controls_section('query',
        [
            'label' => __('Query', 'techex-hp'),
            'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'item_per_page',
            [
                'label'       => __('Numbar Of Items', 'techex'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => '',
                'description' => 'user emty value show all posts',
            ]
        );
        $this->add_responsive_control('per_line', [
            'label'              => __('Columns per row', 'techex-hp'),
            'type'               => Controls_Manager::SELECT,
            'default'            => '4',
            'tablet_default'     => '6',
            'tablet_extra'     => '6',
            'mobile_default'     => '12',
            'options'            => [
                '12' => '1',
                '6'  => '2',
                '4'  => '3',
                '3'  => '4',
            ],
            'frontend_available' => true,
        ]);

        $this->add_control(
            'post_by',
            [
                'label' => __('Post By:', 'techex-hp'),
                'type' => Controls_Manager::SELECT,
                'default' => 'latest',
                'label_block' => true,
                'options' => array(
                    'latest'   =>   __('Latest Post', 'techex-hp'),
                    'selected' =>   __('Selected posts', 'techex-hp'),
                ),
            ]
        );
        $this->add_control(
            'post__in',
            [
                'label' => __('Post In', 'techex-hp'),
                'type' => Controls_Manager::SELECT2,
                'options' => techex_get_all_posts('techex_testimonial'),
                'multiple' => true,
                'label_block' => true,
                'condition'   => [
					'post_by' => 'selected',
				]
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'techex-hp'),
                'type' => Controls_Manager::SELECT,
                'options' => techex_get_post_orderby_options(),
                'default' => 'date',
                'label_block' => true,

            ]
        );
        $this->add_control(
            'order',
            [
                'label' => __('Order', 'techex-hp'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' => 'Ascending',
                    'desc' => 'Descending',
                ],
                'default' => 'desc',
                'label_block' => true,

            ]
        );
        $this->add_control(
            't_word_limit',
            [
                'label' => __('Testimonial Word Limit', 'techex-hp'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
            ]
        );
        $this->end_controls_section();


    //Slider Setting
    $this->start_controls_section('slider_settings',
        [
        'label' => __('Slider Settings', 'techex-hp'),
        'tab'   => Controls_Manager::TAB_CONTENT,
        'condition' => [
            'show_slider_settings' => 'yes',
        ]
        ]
    );

    $this->add_responsive_control(
        'per_coulmn',
        [
            'label' => __( 'Slider Items', 'techex-hp' ),
            'type' => Controls_Manager::SELECT,
            'default'            => 4,
            'tablet_default'     => 2,
            'mobile_default'     => 1,
            'options'            => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
            ],
            'frontend_available' => true,
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
            'label' => __( 'Show MouseDrag', 'techex-hp' ),
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

    $this->add_control(
        'arrow_prev_icon',
        [
            'label' => __( 'Previous Icon', 'techex' ),
            'label_block' => false,
            'type' => \Elementor\Controls_Manager::ICONS,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-chevron-left',
                'library' => 'fa-solid',
            ],
            'condition' => [
                'arrows' => 'yes',
            ],
        ]
    );

    $this->add_control(
        'arrow_next_icon',
        [
            'label' => __( 'Next Icon', 'techex' ),
            'label_block' => false,
            'type' => \Elementor\Controls_Manager::ICONS,
            'skin' => 'inline',
            'default' => [
                'value' => 'fas fa-chevron-right',
                'library' => 'fa-solid',
            ],
            'condition' => [
                'arrows' => 'yes',
            ],
        ]
    );
    $this->end_controls_section();

    //iamge
    $this->start_controls_section('iamge_style',
        [
            'label' => __('Image', 'techex-hp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
        'width',
        [
            'label'          => __('Width', 'techex-hp'),
            'type'           => Controls_Manager::SLIDER,
            'default'        => [
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'size_units'     => ['px', '%', 'vw'],
            'range'          => [
                '%'  => [
                    'min' => 1,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                ],
                'vw' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors'      => [
                '{{WRAPPER}} .techex--t-thumb img' => 'width: {{SIZE}}{{UNIT}} !important;',
            ],
        ]
    );

    $this->add_responsive_control(
        'space',
        [
            'label'          => __('Max Width', 'techex-hp'),
            'type'           => Controls_Manager::SLIDER,
            'default'        => [
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'size_units'     => ['px', '%', 'vw'],
            'range'          => [
                '%'  => [
                    'min' => 1,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                ],
                'vw' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors'      => [
                '{{WRAPPER}} .techex--t-thumb img' => 'max-width: {{SIZE}}{{UNIT}} !important;',
            ],
        ]
    );
    $this->add_responsive_control(
        'height',
        [
            'label'          => __('Height', 'techex-hp'),
            'type'           => Controls_Manager::SLIDER,
            'default'        => [
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'size_units'     => ['px', 'vh'],
            'range'          => [
                'px' => [
                    'min' => 1,
                    'max' => 500,
                ],
                'vh' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors'      => [
                '{{WRAPPER}} .techex--t-thumb img' => 'height: {{SIZE}}{{UNIT}} !important;',
            ],
        ]
    );

    $this->add_responsive_control(
        'object-fit',
        [
            'label'     => __('Object Fit', 'techex-hp'),
            'type'      => Controls_Manager::SELECT,
            'condition' => [
                'height[size]!' => '',
            ],
            'options'   => [
                ''        => __('Default', 'techex-hp'),
                'fill'    => __('Fill', 'techex-hp'),
                'cover'   => __('Cover', 'techex-hp'),
                'contain' => __('Contain', 'techex-hp'),
            ],
            'default'   => '',
            'selectors' => [
                '{{WRAPPER}} .techex--t-thumb img' => 'object-fit: {{VALUE}};',
            ],
        ]
    );
    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name'      => 'image_border',
            'selector'  => '{{WRAPPER}} .techex--t-thumb img',
            'separator' => 'before',
        ]
    );
    $this->add_responsive_control(
        'image_border_radius',
        [
            'label'      => __('Border Radius', 'techex-hp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors'  => [
                '{{WRAPPER}} .techex--t-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                'body.rtl {{WRAPPER}} .techex--t-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}} !important;;',
            ],
        ]
    );

    $this->add_responsive_control(
        'image_margin',
        [
            'label'      => __('Margin', 'techex-hp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors'  => [
                '{{WRAPPER}} .techex--t-thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                'body.rtl {{WRAPPER}} .techex--t-thumb' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name'     => 'image_box_shadow',
            'exclude'  => [
                'box_shadow_position',
            ],
            'selector' => '{{WRAPPER}} .techex--t-thumb img',
        ]
    );
    $this->end_controls_section();


    // Name
    $this->start_controls_section('tn_name',
        [
            'label' => __('Name', 'techex-hp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'name_color',
        [
            'label'     => __('Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .techex--tn-name' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'name_color_hover',
        [
            'label'     => __('Hover Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .techex--tn-single:hover .techex--tn-name' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'name_typo',
            'label'    => __('Typography', 'techex-hp'),
            'selector' => '{{WRAPPER}}  .techex--tn-name',
        ]
    );
    $this->add_responsive_control(
        'name_margin',
        [
            'label'      => __('Margin', 'techex-hp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors'  => [
                '{{WRAPPER}} .techex--tn-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                'body.rtl {{WRAPPER}} .techex--tn-name' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();

    // Title
    $this->start_controls_section('tn_title',
        [
            'label' => __('Designation', 'techex-hp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'title_color',
        [
            'label'     => __('Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .techex--tn-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'title_color_hover',
        [
            'label'     => __('Hover Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .techex--tn-single:hover .techex--tn-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'title_typo',
            'label'    => __('Typography', 'techex-hp'),
            'selector' => '{{WRAPPER}}  .techex--tn-title',
        ]
    );

    $this->add_responsive_control(
        'title_margin',
        [
            'label'      => __('Margin', 'techex-hp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors'  => [
                '{{WRAPPER}} .techex--tn-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                'body.rtl {{WRAPPER}} .techex--tn-title' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();

    // Discription
    $this->start_controls_section('discription',
        [
            'label' => __('Discription', 'techex-hp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'dis_color',
        [
            'label'     => __('Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .techex--tn-dis p' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'dis_color_hover',
        [
            'label'     => __('Hover Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .techex--tn-single:hover .techex--tn-dis p' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'dis_typo',
            'label'    => __('Typography', 'techex-hp'),
            'selector' => '{{WRAPPER}}  .techex--tn-dis p',
        ]
    );

    $this->add_responsive_control(
        'dis_margin',
        [
            'label'      => __('Margin', 'techex-hp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors'  => [
                '{{WRAPPER}} .techex--tn-dis p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                'body.rtl {{WRAPPER}} .techex--tn-dis p' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();

    //Quate
    $this->start_controls_section('quate_style',
        [
            'label' => __('Quote', 'techex-hp'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'show_quate' => 'yes',
            ]
        ]
     );

    $this->start_controls_tabs(
        'quate_style_tabs'
    );

    // normal
    $this->start_controls_tab(
        'tab_quate_normal_color',
        [
            'label' => __('Normal', 'techex'),
        ]
    );

    $this->add_control(
        'quate_color',
        [
            'label'     => __('Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .techex--tn-icon i' => 'color: {{VALUE}}',
                '{{WRAPPER}} .techex--tn-icon svg' => 'color: {{VALUE}}',
                '{{WRAPPER}} .techex--tn-icon svg path' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'line_quate_color',
        [
            'label'     => __('Line Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .techex--tn-icon i,
                 {{WRAPPER}} .techex--tn-icon svg' => 'color: {{VALUE}}',
                '{{WRAPPER}} .techex--tn-icon svg path' => 'stroke: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'quate_bg_color',
        [
            'label'     => __('Background Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}:hover .techex--tn-icon' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_tab();

    $this->start_controls_tab(
        'quate_hover_color',
        [
            'label' => __('Hover', 'techex'),
        ]
    );
    $this->add_control(
        'quate_color_hover',
        [
            'label'     => __('Hover Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .techex--tn-single:hover .techex--tn-icon i,
                {{WRAPPER}} .techex--tn-single:hover .techex--tn-icon svg' => 'color: {{VALUE}}',
                '{{WRAPPER}} .techex--tn-single:hover .techex--tn-icon svg path' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'quate_bg_color_hover',
        [
            'label'     => __('Background Hover Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}:hover .techex--tn-icon' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'quate_color_line_hover',
        [
            'label'     => __('Hover Line Color', 'techex-hp'),
            'type'      => Controls_Manager::COLOR,
            'separator' => 'before',
            'selectors' => [
                '{{WRAPPER}} .techex--tn-single:hover .techex--tn-icon i,
                {{WRAPPER}} .techex--tn-single:hover .techex--tn-icon svg' => 'color: {{VALUE}}',
                '{{WRAPPER}} .techex--tn-single:hover .techex--tn-icon svg path' => 'stroke: {{VALUE}}',
            ],
        ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();

    $this->add_control(
        'hr1',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );

    $this->add_responsive_control(
        'quate_size',
        [
            'label'          => __('Font Size', 'techex-hp'),
            'type'           => Controls_Manager::SLIDER,
            'default'        => [
                'unit' => 'px',
            ],
            'range'          => [
                'px' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors'      => [
                '{{WRAPPER}} .techex--tn-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .techex--tn-icon svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_responsive_control(
        'quate_box_size',
        [
            'label'          => __('Quate Box Size', 'techex-hp'),
            'type'           => Controls_Manager::SLIDER,
            'default'        => [
                'unit' => 'px',
            ],
            'range'          => [
                'px' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors'      => [
                '{{WRAPPER}} .techex--tn-icon' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name'      => 'quate_border',
            'selector'  => '{{WRAPPER}} .techex--tn-icon',
        ]
    );
    $this->add_responsive_control(
        'quate_border_radius',
        [
            'label'      => __('Border Radius', 'techex-hp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors'  => [
                '{{WRAPPER}} .techex--tn-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                'body.rtl {{WRAPPER}} .techex--tn-icon' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'quate_margin',
        [
            'label'      => __('Margin', 'techex-hp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors'  => [
                '{{WRAPPER}} .techex--tn-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                'body.rtl {{WRAPPER}} .techex--tn-icon' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();




   /*
   *
    Dots
   */
  $this->start_controls_section(
    'dots_navigation',
    [
        'label' => __('Navigation - Dots', 'techex-hp'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
            'dots' => 'yes'
        ],
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
            '{{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list li' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->add_responsive_control(
    'dots_align',
    [
        'label' => __( 'Alignment', 'techex-hp' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
            'flex-start' => [
                'title' => __( 'Left', 'techex-hp' ),
                'icon' => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => __( 'Center', 'techex-hp' ),
                'icon' => 'eicon-text-align-center',
            ],
            'flex-end' => [
                'title' => __( 'Right', 'techex-hp' ),
                'icon' => 'eicon-text-align-right',
            ],
        ],
        'default' => 'center',
        'selectors' => [
            '{{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list' => 'justify-content: {{VALUE}};',
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
            '{{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list li' => 'width: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list li' => 'height: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list li ' => 'margin-right: {{SIZE}}{{UNIT}};',
            'body.rtl {{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list li ' => 'margin-left: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .testimonial-slider-dot-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            'body.rtl {{WRAPPER}} .testimonial-slider-dot-list' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
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
            '{{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            'body.rtl {{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list li' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
        ],
    ]
);
$this->end_controls_tab();

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
            '{{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list li.slick-active' => 'background-color: {{VALUE}}  !important;',
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
            '{{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list li.slick-active' => 'width: {{SIZE}}{{UNIT}} !important;',
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
            '{{WRAPPER}} .testimonial-slider ul.testimonial-slider-dot-list li.slick-active' => 'height: {{SIZE}}{{UNIT}} !important;',
        ],
    ]
);
$this->end_controls_tab();
$this->end_controls_tabs();

$this->end_controls_section();

       /*
   *
    Arrows
   */
  $this->start_controls_section(
    'arrows_navigation',
    [
        'label' => __('Navigation - Arrow', 'techex-hp'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
            'arrows' => 'yes',
        ],
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
            '{{WRAPPER}} .testimonial-slider-arrow button' => 'color: {{VALUE}}; border-color: {{VALUE}};',
            '{{WRAPPER}} .testimonial-slider-arrow button svg path' => 'stroke: {{VALUE}};',
        ],
    ]
);

$this->add_control(
    'arrow_color_fill',
    [
        'label' => __('Line Color', 'techex-hp'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .testimonial-slider-arrow button' => 'color: {{VALUE}};',
            '{{WRAPPER}} .testimonial-slider-arrow button svg path' => 'fill: {{VALUE}};',
        ],
    ]
);

$this->add_control(
    'arrow_bg_color',
    [
        'label' => __('Background Color', 'techex-hp'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
             '{{WRAPPER}} .testimonial-slider-arrow button' => 'background-color: {{VALUE}} !important;',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'arrow_shadow',
        'label' => __('Shadow', 'fd-addons'),
        'selector' => '{{WRAPPER}} .testimonial-slider-arrow button ',
    ]
);

$this->add_control(
    'arrow_position_toggle',
    [
        'label' => __('Position', 'techex-hp'),
        'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
        'label_off' => __('None', 'techex-hp'),
        'label_on' => __('Custom', 'techex-hp'),
        'return_value' => 'yes',
    ]
);
$this->start_popover();

/*
Arrow Position
*/
     $start = is_rtl() ? __( 'Right', 'elementor' ) : __( 'Left', 'elementor' );
     $end = ! is_rtl() ? __( 'Right', 'elementor' ) : __( 'Left', 'elementor' );

     /* tobol */
     $this->add_control(
        'offset_orientation_v',
        [
            'label' => __( 'Vertical Orientation', 'elementor' ),
            'type' => Controls_Manager::CHOOSE,
            'toggle' => false,
            'default' => 'start',
            'options' => [
                'top' => [
                    'title' => __( 'Top', 'elementor' ),
                    'icon' => 'eicon-v-align-top',
                ],
                'bottom' => [
                    'title' => __( 'Bottom', 'elementor' ),
                    'icon' => 'eicon-v-align-bottom',
                ],
            ],
            'render_type' => 'ui',
            'selectors' => [
                '{{WRAPPER}} .testimonial-slider-arrow' => '{{VALUE}}: 0;',
            ],

        ]
    );

    $this->add_responsive_control(
    'arrow_position_top',
    [
        'label' => __('Vertical', 'techex-hp'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['%','px'],
        'condition' => [
            'arrow_position_toggle' => 'yes'
        ],
        'range' => [
            'px' => [
                'min' => -1000,
                'max' => 1000,
            ],
            '%' => [
                'min' => -100,
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .testimonial-slider-arrow' => 'top: {{SIZE}}{{UNIT}} !important; bottom:auto',
        ],
        'condition' => [
            'offset_orientation_v' => 'top',
        ],
    ]
);


$this->add_responsive_control(
'arrow_position_bottom',
[
    'label' => __('Vertical', 'techex-hp'),
    'type' => \Elementor\Controls_Manager::SLIDER,
    'size_units' => ['%','px'],
    'condition' => [
        'arrow_position_toggle' => 'yes'
    ],
    'range' => [
        'px' => [
            'min' => -1000,
            'max' => 1000,
        ],
        '%' => [
            'min' => -100,
            'max' => 100,
        ],
    ],
    'selectors' => [
        '{{WRAPPER}} .testimonial-slider-arrow' => 'bottom: {{SIZE}}{{UNIT}} !important; top:auto',
    ],
    'condition' => [
        'offset_orientation_v' => 'bottom',
    ],
]
);


$this->add_control(
    'arrow_horizontal_position',
    [
        'label'             => __( 'Horizontal Position', 'techex-hp' ),
        'type'              => Controls_Manager::SELECT,
        'default'           => 'default',
        'options'           => [
            'default'    =>   __('Default',    'techex-hp'),
            'space_between'    =>   __('Space Between',    'techex-hp'),
        ],
        'separator' => 'after',
    ]
);
$this->add_responsive_control(
    'arrow_position_x_prev',
    [
        'label' => __( 'Horizontal Prev', 'happy-elementor-addons' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => ['px', '%'],
        'condition' => [
            'arrow_position_toggle' => 'yes'
        ],
        'range' => [
            'px' => [
                'min' => -200,
                'max' => 2000,
            ],
            '%' => [
                'min' => -200,
                'max' => 200,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}}  .testimonial-slider-arrow .prev' => 'left: {{SIZE}}{{UNIT}}; right: auto !important;',
        ],
        'condition' => [
            'arrow_horizontal_position' => 'space_between',
        ],

    ]
);



// default == arrow gap
// space-between == left position, right position

$this->add_responsive_control(
    'arrow_position_right',
    [
        'label' => __( 'Horizontal Next', 'happy-elementor-addons' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => ['px', '%'],
        'range' => [
            'px' => [
                'min' => -2000,
                'max' => 1000,
            ],
            '%' => [
                'min' => -200,
                'max' => 200,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .testimonial-slider-arrow .next' => 'right: {{SIZE}}{{UNIT}} !important; left: auto !important;',
        ],
        'condition' => [
            'arrow_horizontal_position' => 'space_between',
        ],
    ]
);

$this->add_responsive_control(
    'arrow_gap_',
    [
        'label' => __( 'Arrow Gap', 'happy-elementor-addons' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => ['px', '%'],
        'range' => [
            'px' => [
                'max' => 1000,
            ],
            '%' => [
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .testimonial-slider-arrow .prev' => 'margin-right: {{SIZE}}{{UNIT}} !important; position: relative !important',
            '{{WRAPPER}} .testimonial-slider-arrow .next ' => 'margin-right: 0 !important; position: relative !important',
        ],
        'condition' => [
            'arrow_horizontal_position' => 'default',
        ],
    ]
);

$this->add_responsive_control(
    'align_arrow',
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
            '{{WRAPPER}} .testimonial-slider-arrow' => 'text-align: {{VALUE}};',
        ],
        'condition' => [
            'arrow_horizontal_position' => 'default',
        ],
    ]
);

$this->end_popover();

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
            '{{WRAPPER}}  .testimonial-slider-arrow button i' => 'font-size: {{SIZE}}{{UNIT}}',
            '{{WRAPPER}}  .testimonial-slider-arrow button svg' => 'width: {{SIZE}}{{UNIT}}',
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
            '{{WRAPPER}} .testimonial-slider-arrow button' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
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
            '{{WRAPPER}} .testimonial-slider-arrow button' => 'line-height: {{SIZE}}{{UNIT}} !important;',
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
            '{{WRAPPER}} .testimonial-slider-arrow button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            'body.rtl {{WRAPPER}} .testimonial-slider-arrow button ' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
        ],
    ]
);
$this->end_controls_tab();

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
             '{{WRAPPER}} .testimonial-slider-arrow button:hover ' => 'color: {{VALUE}} !important;',
             '{{WRAPPER}} .testimonial-slider-arrow button:hover svg path ' => 'stroke: {{VALUE}} !important;',
        ],
    ]
);

$this->add_control(
    'arrow_hover_fill_color',
    [
        'label' => __('Line Color', 'techex-hp'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
             '{{WRAPPER}} .testimonial-slider-arrow button:hover ' => 'color: {{VALUE}} !important;',
             '{{WRAPPER}} .testimonial-slider-arrow button:hover path' => 'fill: {{VALUE}} !important;',
        ],
    ]
);

$this->add_control(
    'arrow_bg_hover_color',
    [
        'label' => __('Background Color Hover', 'techex-hp'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
             '{{WRAPPER}} .testimonial-slider-arrow button:hover ' => 'background-color: {{VALUE}}  !important;',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    '_tab_arrow_active',
    [
        'label' => __('Active', 'techex-hp'),
    ]
);

$this->add_control(
    'arrow_active_color',
    [
        'label' => __('Color', 'techex-hp'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
             '{{WRAPPER}} .testimonial-slider-arrow .slick-active' => 'color: {{VALUE}} !important;;',
             '{{WRAPPER}} .testimonial-slider-arrow .slick-active svg path' => 'stroke: {{VALUE}} !important;;',
        ],
    ]
);

$this->add_control(
    'arrow_active_fill_color',
    [
        'label' => __('Line Color', 'techex-hp'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
             '{{WRAPPER}} .testimonial-slider-arrow .slick-active' => 'color: {{VALUE}} !important;;',
             '{{WRAPPER}} .testimonial-slider-arrow .slick-active path' => 'fill: {{VALUE}} !important;;',
        ],
    ]
);

$this->add_control(
    'arrow_bg_active_color',
    [
        'label' => __('Background Color Hover', 'techex-hp'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
             '{{WRAPPER}} .testimonial-slider-arrow .slick-active ' => 'background-color: {{VALUE}}  !important;',
        ],
    ]
);

$this->end_controls_tab();


$this->end_controls_tabs();

$this->end_controls_section();






/* end arrow */

    //Box Style
     $this->start_controls_section('ts_style',
        [
            'label' => __('Box', 'techex-hp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
     );

     $this->start_controls_tabs(
         'style_tabs'
     );
     // normal
     $this->start_controls_tab(
         'tn_bg_color',
         [
             'label' => __('Normal', 'techex-hp'),
         ]
     );

     $this->add_control(
         'bg',
         [
             'label'     => __('Backround Color', 'techex-hp'),
             'type'      => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .techex--tn-single' => 'background-color: {{VALUE}}',
             ],
         ]
     );
     $this->add_group_control(
         Group_Control_Border::get_type(),
         [
             'name'      => 'tn_border',
             'selector'  => '{{WRAPPER}} .techex--tn-single',
         ]
     );

     $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
         [
             'name'     => 'tn_shadow',
             'exclude'  => [
                 'box_shadow_position',
             ],
             'selector' => '{{WRAPPER}} .techex--tn-single',
         ]
     );
     $this->add_responsive_control(
        'align',
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
                '{{WRAPPER}} .techex--tn-single' => 'text-align: {{VALUE}} !important;',
            ],
        ]
    );

    $this->add_responsive_control(
        'margin_bottom',
        [
            'label'          => __('Bottom Gap', 'techex-hp'),
            'type'           => Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'default'        => [
                'unit' => 'px',
            ],
            'range'          => [
                'px' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors'      => [
                '{{WRAPPER}} .techex--tn-single' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );


    $this->add_responsive_control(
         'box_margin',
         [
             'label'      => __('Margin', 'techex-hp'),
             'type'       => Controls_Manager::DIMENSIONS,
             'size_units' => ['px', '%'],
             'selectors'  => [
                 '{{WRAPPER}} .techex--tn-single' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 '{{WRAPPER}} .slick-list' => 'margin: 0 -{{RIGHT}}{{UNIT}} 0 -{{LEFT}}{{UNIT}};',

             ],
         ]
     );

    $this->add_responsive_control(
         'box_padding',
         [
             'label'      => __('Padding', 'techex-hp'),
             'type'       => Controls_Manager::DIMENSIONS,
             'size_units' => ['px', '%'],
             'selectors'  => [
                 '{{WRAPPER}} .techex--tn-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 'body.rtl {{WRAPPER}} .techex--tn-single' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
             ],
         ]
     );

     $this->add_responsive_control(
         'border_radius',
         [
             'label'      => __('Border Radius', 'techex-hp'),
             'type'       => Controls_Manager::DIMENSIONS,
             'size_units' => ['px', '%'],
             'selectors'  => [
                 '{{WRAPPER}} .techex--tn-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 'body.rtl {{WRAPPER}} .techex--tn-single' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
             ],
         ]
     );

     $this->end_controls_tab();

     // hover
     $this->start_controls_tab(
         'bg_color_hover',
         [
             'label' => __('Hover', 'techex-hp'),
         ]
     );

     $this->add_control(
        'testimonial_hover_shape',
        [
            'label' => __('Hover Shape', 'techex-hp'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'techex-hp'),
            'label_off' => __('No', 'techex-hp'),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

     $this->add_control(
         'bg_hover',
         [
             'label'     => __('Backround Color', 'techex-hp'),
             'type'      => Controls_Manager::COLOR,
             'selectors' => [
                 '{{WRAPPER}} .techex--tn-single:hover' => 'background-color: {{VALUE}}',
             ],
         ]
     );
     $this->add_group_control(
         Group_Control_Border::get_type(),
         [
             'name'      => 'tn_border_hover',
             'selector'  => '{{WRAPPER}} .techex--tn-single:hover',
         ]
     );

     $this->add_group_control(
         Group_Control_Box_Shadow::get_type(),
         [
             'name'     => 'tn_shadow_hover',
             'exclude'  => [
                 'box_shadow_position',
             ],
             'selector' => '{{WRAPPER}} .techex--tn-single:hover',
         ]
     );

     $this->add_responsive_control(
         'border_radius_hover',
         [
             'label'      => __('Border Radius', 'techex-hp'),
             'type'       => Controls_Manager::DIMENSIONS,
             'size_units' => ['px', '%'],
             'selectors'  => [
                 '{{WRAPPER}} .techex--tn-single:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 'body.rtl {{WRAPPER}} .techex--tn-single:hover' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
             ],
         ]
     );
     $this->end_controls_tab();
     $this->end_controls_tabs();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $numabr_of_item = !empty($settings['item_per_page']) ? $settings['item_per_page'] : -1;
        $testimonial_style = $settings['testimonial_style'];
        $tsh = $settings['testimonial_hover_shape'];


         //this code slider option
		$slider_extraSetting = array(

	        'loop' => (!empty($settings['loop']) && 'yes' === $settings['loop']) ? true : false,
	        'dots' => (!empty($settings['dots']) && 'yes' === $settings['dots']) ? true : false,
	        'autoplay' => (!empty($settings['autoplay']) && 'yes' === $settings['autoplay']) ? true : false,
        	'autoplaytimeout' => !empty($settings['autoplaytimeout']) ? $settings['autoplaytimeout'] : '5000',

        	//this a responsive layout
            'per_coulmn' =>        (!empty($settings['per_coulmn'])) ? $settings['per_coulmn'] : 3,
            'per_coulmn_tablet' => (!empty($settings['per_coulmn_tablet'])) ? $settings['per_coulmn_tablet'] : 2,
            'per_coulmn_mobile' => (!empty($settings['per_coulmn_mobile'])) ? $settings['per_coulmn_mobile'] : 1
        );

        $jasondecode = wp_json_encode($slider_extraSetting);

        if ( ( 'yes' == $settings['show_slider_settings'] ) ) {
            $this->add_render_attribute('testimonail_version', 'class', array('testimonial-slider', 't-style' ));
            $this->add_render_attribute('testimonail_version', 'data-settings', $jasondecode);
        } else {
            $this->add_render_attribute('testimonail_version', 'class', array( $testimonial_style, 'row g-0 justify-content-center' ));
            //gride class
            $grid_classes = [];
            $grid_classes[] = 'col-xl-' . $settings['per_line'];
            $grid_classes[] = 'col-lg-' . $settings['per_line_tablet_extra'];
            $grid_classes[] = 'col-md-' . $settings['per_line_tablet'];
            $grid_classes[] = 'col-sm-' . $settings['per_line_mobile'];
            $grid_classes = implode(' ', $grid_classes);
            $this->add_render_attribute('tn_classes', 'class', [$grid_classes]);
        }

        $query_args = [
            'post_type'           => 'techex_testimonial',
            'orderby' => $settings['orderby'],
            'order'   => $settings['order'],
            'posts_per_page'      => $numabr_of_item,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
        ];

        // get_type
        if ( 'selected' === $settings['post_by'] ) {
            $query_args['post__in'] = (array)$settings['post__in'];
        }

        $t_loop = new \WP_Query($query_args);


        ?>

        <div class="techex--tn-wraper <?php echo esc_attr($settings['testimonial_style'] ); ?>">
            <div <?php echo $this->get_render_attribute_string('testimonail_version'); ?>>
               <?php while($t_loop->have_posts() ): $t_loop->the_post();
               $content = ($settings['t_word_limit']['size']) ? wp_trim_words(get_the_excerpt(), $settings['t_word_limit']['size'], '') : get_the_excerpt();
               ?>
                <div <?php echo $this->get_render_attribute_string('tn_classes'); ?>>
                <?php
                    ?>
                    <div class="techex--tn-single <?php echo esc_attr( $testimonial_style ); ?> <?php echo esc_attr( $tsh ); ?>">

                        <div class="techex--tn-icon">
                            <?php Icons_Manager::render_icon($settings['quate'], ['aria-hidden' => 'true']) ?>
                        </div>

                        <div class="techex--tn-dis">
                            <?php echo techex_get_meta( $content );?>
                        </div>

                        <div class="techex-tn-bottom">
                            <div class="techex--tn-top">
                                <?php if(has_post_thumbnail() ): ?>
                                    <div class="techex--t-thumb">
                                        <?php the_post_thumbnail( 'full' ) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="techex--tn-name-title">
                                <h4 class="techex--tn-name">
                                    <?php the_title() ?>
                                </h4>

                                <?php if(function_exists('the_field') ):?>
                                    <span class="techex--tn-title">
                                        <?php echo get_field('designation') ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endwhile; wp_reset_postdata();?>
        </div>

    </div>
<?php
}
}
$widgets_manager->register_widget_type(new \Techex_Testimonail_Loop());