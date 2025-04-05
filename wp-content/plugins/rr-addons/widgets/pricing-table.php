<?php
namespace Finest_Addons\Widgets;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Price_Table extends \Elementor\Widget_Base {

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
        return 'rr-addons-price-table';
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
        return __( 'Pricing Table', 'rr-addons' );
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
        return 'eicon-price-table';
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
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function search_keyword() {
        return ['Price', 'pricing table', 'pricing'];
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
            'price_tabs',
            [
                'label' => __( 'Price Tabs', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'first_tab_title',
            [
                'label'   => __( 'First tab title', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html( 'Monthly ' ),
            ]
        );

        $this->add_control(
            'second_tab_title',
            [
                'label'   => __( 'Second tab title', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html( 'Yearly ' ),
            ]
        );

        $this->add_control(
            'price_offer',
            [
                'label'   => __( 'Offer text', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html( 'Save 20% ' ),
            ]
        );
        $this->add_control(
            'switcher_style',
            [
                'label'   => __( 'Switcher Style', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'style-1' => __( 'Style 1', 'rr-addons' ),
                    'style-2' => __( 'Style 2', 'rr-addons' ),
                ],
            ]
        );
        $this->add_responsive_control(
            'tab_align',
            [
                'label'     => __( 'Align', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start' => [
                        'title' => __( 'Left', 'rr-addons' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'     => [
                        'title' => __( 'top', 'rr-addons' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'flex-end'   => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-tabs' => 'justify-content:{{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'price_tables',
            [
                'label' => __( 'Price tables', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control('per_line', [
            'label'              => __('Columns', 'omega-hp'),
            'type'               => \Elementor\Controls_Manager::SELECT,
            'default'            => '4',
            'tablet_default'     => '6',
            'mobile_default'     => '12',
            'options'            => [
                '12' => '1 Column',
                '6'  => '2 Column',
                '4'  => '3 Column',
                '3'  => '4 Column',
            ],
            'frontend_available' => true,
        ]);

        $this->add_responsive_control(
            'column_gap',
            [
                'label'      => __( 'Column Gap', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box-wrap>div' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .pricing-box-wrap'     => 'margion-left: -{{SIZE}}{{UNIT}}; margion-right: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'focused',
            [
                'label'        => __( 'Make it focsed', 'rr-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Not Focused', 'rr-addons' ),
                'label_off'    => __( 'Focused', 'rr-addons' ),
                'return_value' => 'focused',

            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'   => __( 'Price title', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Personal',
            ]
        );

        $repeater->add_control(
            'price_badge',
            [
                'label' => __( 'Price Badge', 'rr-addons' ),
                'type'  => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'price_currency',
            [
                'label'   => __( 'Price Currency', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '$', 'rr-addons' ),
            ]
        );

        $repeater->add_control(
            'price_monthly',
            [
                'label'   => __( 'Montly Price', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '99', 'rr-addons' ),
            ]
        );

        $repeater->add_control(
            'price_duration_monthly',
            [
                'label'   => __( 'Montly Price Duration text', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'per month', 'rr-addons' ),
            ]
        );

        $repeater->add_control(
            'price_subtitle_monthly',
            [
                'label'   => __( 'Montly Price Subtitle', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'billed monthly', 'rr-addons' ),
            ]
        );

        $repeater->add_control(
            'price_yearly',
            [
                'label'   => __( 'Yearly  Price', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '180', 'rr-addons' ),
            ]
        );

        $repeater->add_control(
            'price_duration_yearly',
            [
                'label'   => __( 'Yearly Price Duration text', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'per year', 'rr-addons' ),
            ]
        );

        $repeater->add_control(
            'price_subtitle_yearly',
            [
                'label'   => __( 'Yearly Price Subtitle', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'billed Yearly', 'rr-addons' ),
            ]
        );

        $repeater->add_control(
            'features',
            [
                'label' => __( 'Features', 'rr-addons' ),
                'type'  => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $repeater->add_control(
            'show_btn',
            [
                'label'        => __( 'Show Button', 'rr-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'rr-addons' ),
                'label_off'    => __( 'Hide', 'rr-addons' ),
                'default'      => 'true',
                'return_value' => 'true',
            ]
        );

        $repeater->add_control(
            'btn_icon',
            [
                'label'     => __( 'Button Icon', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::ICONS,
                'default'   => [
                    'value'   => '',
                    'library' => '',
                ],
                'condition' => [
                    'show_btn' => 'true',
                ],
            ]
        );

        $repeater->add_control(
            'button_label',
            [
                'label'     => __( 'Button text', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'default'   => 'Learn More',
                'condition' => [
                    'show_btn' => 'true',
                ],
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label'     => __( 'Button URL', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'show_btn' => 'true',
                ],
            ]

        );

        $repeater->add_control(
            'button_yearly_url',
            [
                'label'     => __( 'Button Yearly URL', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'show_btn' => 'true',
                ],
            ]

        );

        $repeater->add_control(
            'bottom_info',
            [
                'label'   => __( 'Bottom Info', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'No credit card required',
            ]
        );

        $this->add_control(
            'pricing_list',
            [
                'label'       => __( 'Repeater List', 'rr-addons' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->add_responsive_control(
            'content_align',
            [
                'label'     => __( 'Align', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start' => [
                        'title' => __( 'Left', 'rr-addons' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'     => [
                        'title' => __( 'top', 'rr-addons' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'flex-end'   => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align:{{VALUE}}',
                ],
            ]
        );


        $this->add_responsive_control(
            'box_align',
            [
                'label'     => __( 'Vertical Align', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start' => [
                        'title' => __( 'Top', 'rr-addons' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'     => [
                        'title' => __( 'Cnter', 'rr-addons' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'flex-end'   => [
                        'title' => __( 'Bottom', 'rr-addons' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} #rr-addons-dynamic-deck' => 'align-items:{{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style tab
         */
        $this->start_controls_section(
            'pricing_tabs_tyle',
            [
                'label' => __( 'Pricing Tabs', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'tabs_title_typo',
                'label'    => __( 'Title typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .first-tabs-title,{{WRAPPER}} .second-tabs-title',
            ]
        );

        $this->add_control(
            'tabs_title_color',
            [
                'label'     => __( 'Title Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .first-tabs-title, {{WRAPPER}} .second-tabs-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tabs_title_active_color',
            [
                'label'     => __( 'Title Active Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .first-tabs-title.active, {{WRAPPER}} .second-tabs-title.active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tabs_title_active_bg_color',
            [
                'label'     => __( 'Title Active Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .first-tabs-title.active, {{WRAPPER}} .second-tabs-title.active' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'switcher_style' => 'style-2',
                ],
            ]
        );

        $this->add_control(
            'switcher_divide',
            [
                'type'      => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'switcher_style' => 'style-1',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'      => 'switcher_bg_color',
				'types'     => ['classic', 'gradient' ],
				'fields_options'  => [
					'background'  => [
						'default' => 'gradient'
					],
				],
				'selector'  => '{{WRAPPER}} #pricing-dynamic-deck--head .btn-toggle',
			]
		);

        $this->add_control(
            'switcher_bg_active_color',
            [
                'label'     => __( 'Switcher Active Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #pricing-dynamic-deck--head .btn-toggle.active' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'switcher_style' => 'style-1',
                ],
            ]
        );


        $this->add_control(
            'switcher_circle_color',
            [
                'label'     => __( 'Switcher Circle Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #pricing-dynamic-deck--head .btn-toggle span' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'switcher_style' => 'style-1',
                ],
            ]
        );




        $this->add_responsive_control(
            'tab_title_padding',
            [
                'label' => __('Title Padding', 'upmedix'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-tabs.style-2 .rr-addons-pricing-tab a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );




        $this->add_responsive_control(
            'first_title_active_border_radius',
            [
                'label'      => __( 'First active title Border Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default'    => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '0',
                    'left'     => '0',
                    'isLinked' => false
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-tabs.style-2 a.tabs-title.first-tabs-title.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition' => [
                    'switcher_style' => 'style-2',
                ],
            ]
        );


        $this->add_responsive_control(
            'second_title_active_border_radius',
            [
                'label'      => __( 'Second active title Border Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default'    => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '0',
                    'left'     => '0',
                    'isLinked' => false
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-tabs.style-2 a.tabs-title.second-tabs-title.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition' => [
                    'switcher_style' => 'style-2',
                ],
            ]
        );






        $this->add_control(
            'switcher_wrap_bg_active_color',
            [
                'label'     => __( 'Switcher Wraper Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-tabs.style-2 .rr-addons-pricing-tab' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'switcher_style' => 'style-2',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'wraper_box_active_border',
                'label'    => __( 'wraper_box_border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-tabs.style-2 .rr-addons-pricing-tab',
                'condition' => [
                    'switcher_style' => 'style-2',
                ],
            ]
        );


        $this->add_responsive_control(
            'wraper_border_radius',
            [
                'label'      => __( 'Switcher Wraper Border Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default'    => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '0',
                    'left'     => '0',
                    'isLinked' => false
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-tabs.style-2 .rr-addons-pricing-tab' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition' => [
                    'switcher_style' => 'style-2',
                ],
            ]
        );


        $this->add_responsive_control(
            'tile_tab_width',
            [
                'label' => __('Switcher Width', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 600,

                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-tabs.style-2 .rr-addons-pricing-tab' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'switcher_style' => 'style-2',
                ],
            ]
        );


        $this->add_responsive_control(
            'tile_tab_height',
            [
                'label' => __('Switcher Height', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 600,

                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-tabs.style-2 .rr-addons-pricing-tab' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'switcher_style' => 'style-2',
                ],
            ]
        );


        $this->add_control(
            'shitcher_position',
            [
                'label' => __( 'Switcher Position', 'omega-ts' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'absolute'  => __( 'Absolute', 'omega-hp' ),
                    'initial' => __( 'Initial', 'omega-hp' ),
                    'fixed' => __( 'Fixed', 'omega-hp' ),
                    'relative' => __( 'Relative', 'omega-hp' ),
                    'default' => __( 'Default', 'omega-hp' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-tab' => 'position: {{VALUE}}',
                ]
            ]
        );



        $this->add_responsive_control(
            'switcher_position_left',
            [
                'label' => __( 'Left', 'omega-hp' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
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
                    '{{WRAPPER}} .rr-addons-pricing-tab' => 'left: {{SIZE}}{{UNIT}} !important; right: auto !important;',
                ],
                'condition' => [
                    'shitcher_position' => 'absolute',
                ],
            ]
        );
        $this->add_responsive_control(
            'switcher_position_right',
            [
                'label' => __( 'Right', 'omega-hp' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
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
                    '{{WRAPPER}} .rr-addons-pricing-tab' => 'right: {{SIZE}}{{UNIT}} !important; left: auto !important;',
                ],
                'condition' => [
                    'shitcher_position' => 'absolute',
                ],
            ]
        );
        $this->add_responsive_control(
            'switcher_position_top',
            [
                'label' => __( 'Top', 'omega-hp' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
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
                    '{{WRAPPER}} .rr-addons-pricing-tab' => 'top: {{SIZE}}{{UNIT}} !important; button: auto !important;',
                ],
                'condition' => [
                    'shitcher_position' => 'absolute',
                ],
            ]
        );


        $this->add_responsive_control(
            'switcher_position_bottom',
            [
                'label' => __( 'Bottom', 'omega-hp' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
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
                    '{{WRAPPER}} .rr-addons-pricing-tab' => 'bottom: {{SIZE}}{{UNIT}} !important; top: auto !important;',
                ],
                'condition' => [
                    'shitcher_position' => 'absolute',
                ],
            ]
        );



        $this->add_control(
            'offer_divide',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'offer_typo',
                'label'    => __( 'Offer typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-price-offer',
            ]
        );

        $this->add_control(
            'offer_color',
            [
                'label'     => __( 'Offer Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-price-offer' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'offer_bg_color',
            [
                'label'     => __( 'Offer Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-price-offer' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'offer_padding',
            [
                'label'      => __( 'Offer Text Padding', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-price-offer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'offer_radius',
            [
                'label'      => __( 'Offer Text Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-price-offer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


         //Price Badge

        $this->start_controls_section(
            'Price_Badge',
            [
                'label' => __( 'Price Badge', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'price_badge_style_tabs'
        );

        $this->start_controls_tab(
            'price_badge_normal_tab',
            [
                'label' => __( 'Normal', 'rr-addons' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'badge_typo',
                'label'    => __( 'Badge Typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-badge',
            ]
        );

        $this->add_control(
            'badge_color',
            [
                'label'     => __( 'Badge Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-badge' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'badge_bg_color',
            [
                'label'     => __( 'Badge Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-badge' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_radius',
            [
                'label'      => __( 'Badge Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default'    => [
                    'top'    => '8',
                    'right'  => '8',
                    'bottom' => '8',
                    'left'   => '8',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_padding',
            [
                'label'      => __( 'Badge Padding', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_x_postion',
            [
                'label'      => __( 'Badge X Position', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-badge' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_y_postion',
            [
                'label'      => __( 'Badge Y Position', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-badge' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'price_badge_active_tab',
            [
                'label' => __( 'Active', 'rr-addons' ),
            ]
        );

        $this->add_control(
            'badge_color_active',
            [
                'label'     => __( 'Badge Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-pricing-badge' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'badge_bg_color_active',
            [
                'label'     => __( 'Badge Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-pricing-badge' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'Title_style',
            [
                'label' => __( 'Title', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'price_title_style_tabs'
        );

        $this->start_controls_tab(
            'price_title_normal_tab',
            [
                'label' => __( 'Normal', 'rr-addons' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typo',
                'label'    => __( 'Title typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'price_title_active_tab',
            [
                'label' => __( 'Active', 'rr-addons' ),
            ]
        );
        $this->add_control(
            'title_color_active',
            [
                'label'     => __( 'Title Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-pricing-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'price_style',
            [
                'label' => __( 'Price', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'price_style_tabs'
        );

        $this->start_controls_tab(
            'price_normal_tab',
            [
                'label' => __( 'Normal', 'rr-addons' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'price_typo',
                'label'    => __( 'Price typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-area .rr-addons-pricing-item .rr-addons-price h2',
            ]
        );
        $this->add_control(
            'price_color',
            [
                'label'     => __( 'Price Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-area .rr-addons-pricing-item .rr-addons-price h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'price_currency_typo',
                'label'    => __( 'Price Currency Typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-area .rr-addons-pricing-item .rr-addons-price .price-currency',
            ]
        );
        $this->add_control(
            'price_currency_color',
            [
                'label'     => __( 'Currency Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-area .rr-addons-pricing-item .rr-addons-price .price-currency' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'dura_style_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'price_dur_typo',
                'label'    => __( 'Price Duration typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-price span.rr-addons-pricing-duration',
            ]
        );

        $this->add_control(
            'duration_color',
            [
                'label'     => __( 'Duration Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-duration' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'subtitle_style_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'price_subtitle_typo',
                'label'    => __( 'Price Subtitle typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-price span.price-subtitle',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'     => __( 'Subtitle Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'pricing_subtitle_border',
                'label'    => __( 'Price Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .price-subtitle',
            ]
        );

        $this->add_control(
            'price_wrap_bg_color',
            [
                'label'     => __( 'Price Wrap Backgrounr', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-price-wrap' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'pricing_wrap_border',
                'label'    => __( 'Price Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-price-wrap',
            ]
        );

        $this->add_control(
            'price_toggle',
            [
                'label'        => __( 'Price Advanced Options', 'rr-addons' ),
                'type'         => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off'    => __( 'Default', 'rr-addons' ),
                'label_on'     => __( 'Custom', 'rr-addons' ),
                'return_value' => 'yes',
            ]
        );
        $this->start_popover();

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'        => 'pricing_border',
                'label'       => __( 'Price Border', 'rr-addons' ),
                'label_block' => true,
                'selector'    => '{{WRAPPER}} .rr-addons-price',
            ]
        );

        $this->add_responsive_control(
            'price_subtitle_padding',
            [
                'label'      => __( 'Price Subtitle Margin', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .price-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'price_subtitle_gap',
            [
                'label'      => __( 'Price Subtitle Margin', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .price-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_padding',
            [
                'label'      => __( 'Price Padding', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'price_wrap_padding',
            [
                'label'      => __( 'Price Wrap Padding', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-price-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'price_wrap_gap',
            [
                'label'      => __( 'Price Gap', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-price-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();
        $this->end_controls_tab();
        $this->start_controls_tab(
            'price_active_tab',
            [
                'label' => __( 'Active', 'rr-addons' ),
            ]
        );
        $this->add_control(
            'price_color_active',
            [
                'label'     => __( 'Price Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-price h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'price_currency_color_active',
            [
                'label'     => __( 'Currency Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused  .rr-addons-price .price-currency' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'duration_color_active',
            [
                'label'     => __( 'Duration Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-pricing-duration' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color_active',
            [
                'label'     => __( 'Subtitle Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused .price-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'price_wrap_bg_color_active',
            [
                'label'     => __( 'Price Wrap Backgrounr', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused  .rr-addons-price-wrap' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'pricing_wrap_border_active',
                'label'    => __( 'Price Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-item.focused  .rr-addons-price-wrap',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
        $this->start_controls_section(
            'feature_style',
            [
                'label' => __( 'Feature', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'price_features_style_tabs'
        );

        $this->start_controls_tab(
            'price_features_normal_tab',
            [
                'label' => __( 'Normal', 'rr-addons' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'features_typo',
                'label'    => __( 'Features typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-features',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'features_strong_typo',
                'label'    => __( 'Features Strong typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-features strong',
            ]
        );

        $this->add_control(
            'features_color',
            [
                'label'     => __( 'Features Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-features' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'features_strong_color',
            [
                'label'     => __( 'Features Strong Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-features strong' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'features_icon_color',
            [
                'label'     => __( 'Features Icon Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-features i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'feature_border',
                'label'    => __( 'Feature Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-features p',
            ]
        );

        $this->add_responsive_control(
            'features_align',
            [
                'label'     => __( 'Align', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
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
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-features' => 'text-align:{{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'feature_icon_gap',
            [
                'label'      => __( 'Icon Gap', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-features i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'feature_item_gap',
            [
                'label'      => __( 'Item gap', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-features p:not(:last-child),{{WRAPPER}} .rr-addons-pricing-features ul li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'feature_item_padding',
            [
                'label'      => __( 'Iteam Padding', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-features p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'feature_padding',
            [
                'label'      => __( 'Padding', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-features' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'feature_gap',
            [
                'label'      => __( 'Margin', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-features' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'price_features_active_tab',
            [
                'label' => __( 'Active', 'rr-addons' ),
            ]
        );
        $this->add_control(
            'features_color_active',
            [
                'label'     => __( 'Features Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-pricing-features' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'features_strong_color_active',
            [
                'label'     => __( 'Features Strong Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-pricing-features strong' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'features_icon_color_active',
            [
                'label'     => __( 'Features Icon Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-pricing-features i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
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

        $this->add_control(
            'boxed_btn_color',
            [
                'label'     => __( 'Button Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn-wrapper .rr-addons-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'bottom_typography',
                'label'    => __( 'typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-btn-wrapper .rr-addons-btn',
            ]
        );

        $this->add_control(
            'boxed_btn_background',
            [
                'label'     => __( 'Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn-wrapper .rr-addons-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => __( 'Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-btn-wrapper .rr-addons-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_shadow',
                'label'    => __( 'Button Shadow', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-btn-wrapper .rr-addons-btn',
            ]
        );

        $this->add_responsive_control(
            'button_radius',
            [
                'label'      => __( 'Border Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-btn-wrapper .rr-addons-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'price_btn_width',
            [
                'label' => __('Button Width', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 600,

                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn-wrapper .rr-addons-btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'price_btn_height',
            [
                'label' => __('Button Height', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 600,

                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .rr-addons-btn-wrapper .rr-addons-btn' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .rr-addons-btn-wrapper .rr-addons-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => __( 'Button Margin', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-item .rr-addons-btn-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_style_active_tab',
            [
                'label' => __( 'Active', 'rr-addons' ),
            ]
        );

        $this->add_control(
            'btn_active_color',
            [
                'label'     => __( 'Button Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused.rr-addons-pricing-item.focused  .rr-addons-btn-wrapper .rr-addons-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'      => 'btn_active_background',
				'types'     => ['classic','gradient' ],
				'fields_options'  => [
					'background'  => [
						'default' => 'gradient'
					],
				],
				'selector'  => '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-btn-wrapper .rr-addons-btn',
			]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_active_border',
                'label'    => __( 'Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-btn-wrapper .rr-addons-btn',
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
                'name'     => 'button_active_shadow',
                'label'    => __( 'Button Shadow', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-btn-wrapper .rr-addons-btn',
            ]
        );

        $this->add_responsive_control(
            'button_active_radius',
            [
                'label'      => __( 'Border Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused .rr-addons-btn-wrapper .rr-addons-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'bottom_text',
            [
                'label' => __( 'Bottom Info', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'bottom_typo',
                'label'    => __( 'typography', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .pricing-bottom-info',
            ]
        );

        $this->add_control(
            'bottom_info_olor',
            [
                'label'     => __( 'Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-bottom-info' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'bottom_info_gap',
            [
                'label'      => __( 'Gap', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}  .pricing-bottom-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Box',
            [
                'label' => __( 'Box', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'box_normal_tab',
            [
                'label' => __( 'Normal', 'rr-addons' ),
            ]
        );

        $this->add_control(
            'box_bg_color',
            [
                'label'     => __( 'Box Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => __( 'Foucsed Box Shadow', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-item',

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => __( 'box_border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-item',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label'      => __( 'Box Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'box_padding',
            [
                'label'      => __( 'Box Padding', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'box_active_tab',
            [
                'label' => __( 'Active', 'rr-addons' ),
            ]
        );
        $this->add_control(
            'box_active_bg_color',
            [
                'label'     => __( 'Box Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_active_shadow',
                'label'    => __( 'Foucsed Box Shadow', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-item.focused',

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_active_border',
                'label'    => __( 'box_border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-pricing-item.focused',
            ]
        );

        $this->add_responsive_control(
            'box_active_radius',
            [
                'label'      => __( 'Box Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-pricing-item.focused' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $popular_post_key       = array();
        $popular_meta_value_num = array();
        $settings               = $this->get_settings_for_display();

        /* Gride Class */
        $grid_classes = [];
        $grid_classes[] = 'col-xl-' . $settings['per_line'];
        $grid_classes[] = 'col-md-' . $settings['per_line_tablet'];
        $grid_classes[] = 'col-sm-' . $settings['per_line_mobile'];
        $grid_classes = implode(' ', $grid_classes);
        $this->add_render_attribute('pricing_gride_classes', 'class', [$grid_classes, 'col-lg-6 rr-addons-pricing-item-wrap']);

        ?>

		<?php if ( $settings['pricing_list'] ): ?>
			<div class="rr-addons-pricing-area pricing-style-classic">

					<div class="row">
						<div class="col-12 text-center">
							<div class="rr-addons-pricing-tabs <?php echo esc_attr( $settings['switcher_style'] ) ?>">
								<?php if ( 'style-2' == $settings['switcher_style'] ): ?>
									<div class="rr-addons-pricing-tab">
										<a href="javascript:" class="tabs-title first-tabs-title active" data-pricing-tab-trigger data-target="#rr-addons-dynamic-deck">
											<?php echo esc_html( $settings['first_tab_title'] ); ?>
										</a>
										<a href="javascript:" class="tabs-title second-tabs-title" data-pricing-tab-trigger data-target="#rr-addons-dynamic-deck">
											<?php echo esc_html( $settings['second_tab_title'] ); ?>
										</a>
									</div>
								<?php else: ?>
									<span class="first-tabs-title"><?php echo $settings['first_tab_title'] ?></span>
									<div class="rr-addons-price-tabs-switcher">
										<div id="pricing-dynamic-deck--head">
											<a href="javascript:" class="btn-toggle active mx-3" data-pricing-trigger data-target="#rr-addons-dynamic-deck"><span class="round"></span></a>
										</div>
									</div>
									<span class="second-tabs-title"><?php echo $settings['second_tab_title'] ?></span>
								<?php endif;?>
								<?php if ( !empty( $settings['price_offer'] ) ): ?>
								<span class="rr-addons-price-offer"><?php echo $settings['price_offer'] ?></span>
								<?php endif;?>
							</div>
						</div>
					</div>
					<div class="row pricing-box-wrap justify-content-center" id="rr-addons-dynamic-deck" data-pricing-dynamic data-value-active="monthly">
						<?php foreach ( $settings['pricing_list'] as $pricing ): ?>
							<div <?php echo $this->get_render_attribute_string('pricing_gride_classes'); ?>>
								<div class="rr-addons-pricing-item <?php echo $pricing['focused'] ?>">
									<!-- classic pricing -->

										<div class="rr-addons-price-wrap">
											<span class="rr-addons-pricing-title"><?php echo $pricing['title'] ?></span>
											<?php if ( $pricing['price_badge'] ): ?>
												<span class="rr-addons-pricing-badge"><?php echo $pricing['price_badge'] ?></span>
											<?phP endif;?>
											<div class="rr-addons-price rr-addons-price-monthly d-flex align-items-center justify-content-center">
												<h2 class="dynamic-value" data-active="<?php echo $pricing['price_monthly'] ?>" data-monthly="<?php echo $pricing['price_monthly'] ?>" data-yearly="<?php echo $pricing['price_yearly'] ?>"><span class="price-currency"><?php echo esc_html( $pricing['price_currency'] ) ?></span></h2>
												<span class="rr-addons-pricing-duration dynamic-value" data-active="<?php echo $pricing['price_duration_monthly'] ?>" data-monthly="<?php echo $pricing['price_duration_monthly'] ?>" data-yearly="<?php echo $pricing['price_duration_yearly'] ?>"></span>
											</div>
											<?php if ( $pricing['price_subtitle_monthly'] || $pricing['price_subtitle_yearly'] ): ?>
											<span class="price-subtitle dynamic-value" data-active="<?php echo esc_attr( $pricing['price_subtitle_monthly'] ) ?>" data-monthly="<?php echo esc_attr( $pricing['price_subtitle_monthly'] ) ?>" data-yearly="<?php echo esc_attr( $pricing['price_subtitle_yearly'] ) ?>"></span>
											<?php endif;?>
										</div><!--  end of rr-addons-price-wrap  -->

										<div class="rr-addons-pricing-head-filler"></div>

									<div class="rr-addons-pricing-features">
										<?php echo $pricing['features'] ?>
									</div>
									<!-- minimal pricing -->
									<?php
                                    if ( 'true' == $pricing['show_btn'] ):
                                        $m_target = $pricing['button_url']['is_external'] ? ' target="_blank"' : '';
                                        $m_nofollow = $pricing['button_url']['nofollow'] ? ' rel="nofollow"' : '';

                                        $y_target = $pricing['button_yearly_url']['is_external'] ? ' target="_blank"' : '';
                                        $y_nofollow = $pricing['button_yearly_url']['nofollow'] ? ' rel="nofollow"' : '';
                                    ?>
										<div class="rr-addons-btn-wrapper">
											<a class="rr-addons-btn monthly-btn  <?php printf( '%s', esc_attr( 'elementor-animation-' . $settings['btn_hover_animation'] ) )?>" href="<?php echo $pricing['button_url']['url'] ?>" <?php echo $m_nofollow. $m_target ?> ><?php echo $pricing['button_label'] ?> <?php \Elementor\Icons_Manager::render_icon( $pricing['btn_icon'], ['aria-hidden' => 'true'] );?></a>

											<a class="rr-addons-btn yearly-btn  <?php printf( '%s', esc_attr( 'elementor-animation-' . $settings['btn_hover_animation'] ) )?>" href="<?php echo $pricing['button_yearly_url']['url'] ?>" <?php echo $y_target. $y_nofollow ?> ><?php echo $pricing['button_label'] ?> <?php \Elementor\Icons_Manager::render_icon( $pricing['btn_icon'], ['aria-hidden' => 'true'] );?></a>
										</div>
									<?php endif;?>
									<?php if ( '' != $pricing['bottom_info'] ) {
                                        printf( '<span class="pricing-bottom-info">%s</span>', $pricing['bottom_info'] );
                                    }?>
								</div>
							</div>
						<?php endforeach;?>
					</div>
			</div>
		<?php endif;?>
<?php
}
}

$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Price_Table() );