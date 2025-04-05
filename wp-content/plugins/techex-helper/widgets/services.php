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
class Techex_Services extends \Elementor\Widget_Base
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
        return 'techex-service';
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
        return __('Techex Services', 'techex-hp');
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
        return 'eicon-settings';
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
            'section_general',
            [
                'label' => __('General', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		$this->add_control(
			'service_style',
			[
				'label' => __( 'Service Style', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'techex-hp' ),
					'2' => __( 'Style 2', 'techex-hp' ),
					'3' => __( 'Style 3', 'techex-hp' ),
				],
			]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Post to show', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
            ]
        );
        $this->add_responsive_control('per_line', [
            'label'              => __('Columns per row', 'techex-hp'),
            'type'               => \Elementor\Controls_Manager::SELECT,
            'default'            => '3',
            'tablet_default'     => '6',
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
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'latest',
                'label_block' => true,
                'options' => array(
                    'latest'   =>   __('Latest Post', 'techex-hp'),
                    'selected' =>   __('Selected posts', 'techex-hp'),
                    'author'   =>   __('Post by author', 'techex-hp'),
                    'category' =>   __('Post by Category', 'techex-hp'),
                ),
            ]
        );
        $this->add_control(
            'category',
            [
                'label' => __('Category', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => techex_taxomony_list('service-category'),
                'label_block' => true,
                'condition'   => [
					'post_by' => 'category',
				]
            ]
        );
        $this->add_control(
            'post__in',
            [
                'label' => __('Post In', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => techex_get_all_posts('service'),
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
                'label'         => __('Order By', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => [
                    'date'   => 'Date',
                    'title'    => 'title',
                    'menu_order'    => 'Menu Order',
                    'rand'    => 'Random',
                ],
                'default' =>    'date',
            ]
        );
        $this->add_control(
            'order',
            [
                'label'         => __('Order', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => [
                    'ASC'   => 'ASC',
                    'DESC'    => 'DESC',
                ],
                'default' =>    'DESC',
            ]
        );
        $this->add_responsive_control(
            'column_gap',
            [
                'label' => __('Column Gap', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-wrap' => 'padding: 0 {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'row_gap',
            [
                'label' => __('Row Gap', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-wrap' => 'margin: 0 0 {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_image',
            [
                'label' => __('Image', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_control(
            'show_shape',
            [
                'label' => __('Show Shape', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'techex-hp'),
                'label_off' => __('Hide', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Title', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title_icon',
            [
                'label' => __('Choose Icon', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $this->add_control(
            'title_limit',
            [
                'label' => __('Title Word Limit', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'show_excerpt',
            [
                'label' => __('Show Excerpt', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'techex-hp'),
                'label_off' => __('Hide', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'excerpt_limit',
            [
                'label' => __('Excerpt Word Limit', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'conditon' => [
                    'show_excerpt' => 'yes',
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_btn',
            [
                'label' => __('Readmore', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'show_readmore',
            [
                'label' => __('Readmore button', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'techex-hp'),
                'label_off' => __('Hide', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'readmore_text',
            [
                'label' => __('Readmore text', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('READ MORE', 'techex-hp'),
                'conditon' => [
                    'show_readmore' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => __('Icon', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'conditon' => [
                    'show_readmore' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'icon_position',
            [
                'label' => __('Icon Position', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'after',
                'options' => [
                    'before' => __('Before', 'techex-hp'),
                    'after' => __('After', 'techex-hp'),
                ],
                'conditon' => [
                    'show_readmore' => 'yes',
                ]
            ]
        );
        $this->add_responsive_control(
            'button_align',
            [
                'label' => __('Align', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'techex-hp'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('top', 'techex-hp'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'techex-hp'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .service-btn-wrap' => 'text-align:{{UNIT}};'
                ],
                'toggle' => true,
            ]
        );
        $this->end_controls_section();



        /**image style*/
        $this->start_controls_section(
            'section_image_style',
            [
                'label' => __('Image', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'image_style_tabs'
        );
        $this->start_controls_tab(
            'image_style_normal_tab',
            [
                'label' => __('Normal', 'techex-hp'),
            ]
        );
        $this->add_responsive_control(
            'img_align',
            [
                'label' => __('Align', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'techex-hp'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('top', 'techex-hp'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'techex-hp'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item' => 'text-align:{{UNIT}};'
                ],
                'toggle' => true,
            ]
        );
        $this->add_control(
            'svg_line_color',
            [
                'label' => __('SVG Line Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail svg path' => 'stroke: {{VALUE}}',
                ],
                'description' => __( 'Note: This color only work with svg. If your featured image is svg thent it will work.', 'techex-hp' ),
                'condition' => [
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_control(
            'svg_fill_color',
            [
                'label' => __('SVG Fill Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail svg path' => 'fill: {{VALUE}}',
                ],
                'description' => __( 'Note: This color only work with svg. If your featured image is svg thent it will work.', 'techex-hp' ),
                'condition' => [
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_control(
            'icon_bg_color',
            [
                'label' => __('Background Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item.service-style-1 .service-thumbnail' => 'background-color: {{VALUE}}!important',
                ],
                'condition' => [
                    'show_shape' => 'yes',
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_control(
            'shape_bg_color',
            [
                'label' => __('Shape Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail .image-shape' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'show_shape' => 'yes',
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_responsive_control(
            'shape_radius',
            [
                'label' => __('Shape Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail .image-shape' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .service-thumbnail .image-shape' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_shape' => 'yes',
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_responsive_control(
            'image_radius',
            [
                'label' => __('Image Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .service-thumbnail-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .service-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'image_style_hover_tab',
            [
                'label' => __('Hover', 'techex-hp'),
            ]
        );
        $this->add_control(
            'image_hover_style',
            [
                'label'             => __('Hover Style', 'fd-addons'),
                'type'              => \Elementor\Controls_Manager::SELECT,
                'default'           => 'hover-default',
                'options'           => [
                    'hover-default' =>   __('Default',    'fd-addons'),
                    'hover-one'     =>   __('Style 01',    'fd-addons'),
                ],
            ]
        );

        $this->add_control(
            'svg_hover_line_color',
            [
                'label' => __('SVG Line Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-thumbnail svg path' => 'stroke: {{VALUE}}',
                ],
                'description' => __( 'Note: This color only work with svg. If your featured image is svg thent it will work.', 'techex-hp' ),
                'condition' => [
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_control(
            'svg_hover_fill_color',
            [
                'label' => __('SVG Fill Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-thumbnail svg path' => 'fill: {{VALUE}}',
                ],
                'description' => __( 'Note: This color only work with svg. If your featured image is svg thent it will work.', 'techex-hp' ),
                'condition' => [
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_control(
            'shape_hover_color',
            [
                'label' => __('Shape Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover  .service-thumbnail .image-shape' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'show_shape' => 'yes',
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_responsive_control(
            'shape_hover_radius',
            [
                'label' => __('Shape Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-thumbnail .image-shape' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item:hover .service-thumbnail .image-shape' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_shape' => 'yes',
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_responsive_control(
            'image_radius_hover',
            [
                'label' => __('Image Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item:hover .service-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'image_style_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_responsive_control(
            'image_size',
            [
                'label' => __('Image Width', 'techex-hp'),
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
                    '{{WRAPPER}} .service-thumbnail svg, {{WRAPPER}} .service-thumbnail img'  => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'image_height',
            [
                'label' => __('Image Height', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
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
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail svg, {{WRAPPER}} .service-thumbnail img'  => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'shape_size',
            [
                'label' => __('Shape Size', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
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
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail .image-shape'  => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_shape' => 'yes',
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_responsive_control(
            'shape_x_position',
            [
                'label' => __('Shape Y Position', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -1000,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail .image-shape'  => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_shape' => 'yes',
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_responsive_control(
            'shape_y_position',
            [
                'label' => __('Shape X Position', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail .image-shape'  => 'left: {{SIZE}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .service-thumbnail .image-shape'  => 'right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_shape' => 'yes',
                    'service_style' => '1',
                ]
            ]
        );
        $this->add_responsive_control(
			'image_object_fit',
			[
				'label' => __( 'Object-fit', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
                    'none' => __( 'None', 'plugin-domain' ),
					'fill' => __( 'Fill', 'plugin-domain' ),
					'contain' => __( 'Contain', 'plugin-domain' ),
					'cover' => __( 'Cover', 'plugin-domain' ),
				],
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail img' => 'object-fit: {{options}};',

                ],
			]
		);
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => __('Image Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-thumbnail ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .service-thumbnail ' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'content_style',
            [
                'label' => __('Content', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_align',
            [
                'label' => __('Align', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'techex-hp'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'techex-hp'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'techex-hp'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .service-content-wrap .service-content' => 'text-align:{{UNIT}};'
                ],
                'toggle' => true,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => __('Title Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-service-widget-item .service-title',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'excerpt_typ',
                'label' => __('Excerpt Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-service-widget-item p',
            ]
        );
        $this->start_controls_tabs(
            'content_style_tabs'
        );
        $this->start_controls_tab(
            'content_style_normal_tab',
            [
                'label' => __('Normal', 'techex-hp'),
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item .service-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_icon_line_color',
            [
                'label' => __('Title Icon Line Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-icon svg path' => 'stroke: {{VALUE}}',
                ],
                'condition' => [
                    'title_icon!' => '',
                ]
            ]
        );
        $this->add_control(
            'title_icon_fill_color',
            [
                'label' => __('SVG Fill Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-icon svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'title_icon!' => '',
                ]
            ]
        );
        $this->add_control(
            'excerpt_color',
            [
                'label' => __('Excerpt Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_icon_size',
            [
                'label' => __('Icon size', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item .service-title svg' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .techex-service-widget-item .service-title i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_icon_rotate',
            [
                'label' => __('Rotate icon', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item .service-title svg, {{WRAPPER}} .techex-service-widget-item .service-title i' => 'transform: rotate( {{SIZE}}deg );',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_gap',
            [
                'label' => __('Title Gap', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item .service-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __('Title Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item .service-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item .service-title' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Discription Margin', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item .service-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item .service-content p' => 'margin:
                    {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'content_box_padding',
            [
                'label' => __('Content Box Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item .service-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item .service-content' => 'padding:
                    {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ]
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'content_style_hover_tab',
            [
                'label' => __('Hover', 'techex-hp'),
            ]
        );
        $this->add_control(
            'title_hover_color',
            [
                'label' => __('Title Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_icon_line_color_hover',
            [
                'label' => __('Title Icon Line Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .title-icon svg path' => 'stroke: {{VALUE}}',
                ],
                'condition' => [
                    'title_icon!' => '',
                ]
            ]
        );
        $this->add_control(
            'title_icon_fill_color_hover',
            [
                'label' => __('SVG Fill Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .title-icon svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'title_icon!' => '',
                ]
            ]
        );
        $this->add_control(
            'excerpt_hover_color',
            [
                'label' => __('Excerpt Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_icon_hover_size',
            [
                'label' => __('Icon size', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-title svg' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-title i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_icon_hover_rotate',
            [
                'label' => __('Rotate icon', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-title svg, {{WRAPPER}} .techex-service-widget-item .service-title i' => 'transform: rotate( {{SIZE}}deg );',
                ],
            ]
        );
        $this->add_responsive_control(
            'hover_title_gap',
            [
                'label' => __('Title Gap', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'hover_title_padding',
            [
                'label' => __('Title Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item:hover .service-title' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'hover_content_padding',
            [
                'label' => __('Content Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item:hover .service-content p' => 'padding:
                    {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'hover_content_box_padding',
            [
                'label' => __('Content Box Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item .service-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item .service-content' => 'padding:
                    {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ]
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'button_style',
            [
                'label' => __('Button', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_readmore' => 'yes',
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'label' => __('Button Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .service-btn',
            ]
        );
        $this->start_controls_tabs(
            'button_style_tabs'
        );
        $this->start_controls_tab(
            'button_style_normal_tab',
            [
                'label' => __('Normal', 'techex-hp'),
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-btn .btn-icon' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service-btn .btn-icon path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_fill_color',
            [
                'label' => __('Icon Fill Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-btn .btn-icon path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'boxed_btn_color',
            [
                'label' => __('Button Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'boxed_btn_background',
            [
                'label' => __('Background Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __('Border', 'techex-hp'),
                'selector' => '{{WRAPPER}} .service-btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_shadow',
                'label' => __('Button Shadow', 'techex-hp'),
                'selector' => '{{WRAPPER}} .service-btn',
            ]
        );
        $this->add_responsive_control(
            'button_radius',
            [
                'label' => __('Border Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .service-btn' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_gap',
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
                    '{{WRAPPER}} .service-btn .icon-before, body.rtl {{WRAPPER}} .service-btn .icon-after ' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .service-btn .icon-after , body.rtl  {{WRAPPER}} .service-btn .icon-before' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item .service-btn .btn-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .techex-service-widget-item .service-btn .btn-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Button Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .service-btn' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'button_style_hover_tab',
            [
                'label' => __('Hover', 'techex-hp'),
            ]
        );
        $this->add_control(
            'icon_hover_color',
            [
                'label' => __('Icon Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-btn .btn-icon' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-btn .btn-icon path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_fill_color_hover',
            [
                'label' => __('Icon Fill Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-btn .btn-icon path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label' => __('Button Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_background',
            [
                'label' => __('Background Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_hover_border',
                'label' => __('Border', 'techex-hp'),
                'selector' => '{{WRAPPER}} .service-btn:hover',
            ]
        );
        $this->add_control(
            'btn_hover_animation',
            [
                'label' => __('Hover Animation', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_hover_shadow',
                'label' => __('Button Shadow', 'techex-hp'),
                'selector' => '{{WRAPPER}} .service-btn:hover',
            ]
        );
        $this->add_responsive_control(
            'button_hover_radius',
            [
                'label' => __('Border Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .service-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_gap',
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
                    '{{WRAPPER}} .service-btn:hover .icon-before' => 'transform: translatex( -{{SIZE}}{{UNIT}} );',
                    '{{WRAPPER}} .service-btn:hover .icon-after ' => 'transform: translatex( {{SIZE}}{{UNIT}} );',
                    'body.rtl {{WRAPPER}} .service-btn:hover .icon-before' => 'transform: translatex( {{SIZE}}{{UNIT}} );',
                    'body.rtl {{WRAPPER}} .service-btn:hover .icon-after ' => 'transform: translatex( -{{SIZE}}{{UNIT}} );',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_hover_icon_size',
            [
                'label' => __('Hover Icon size', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-btn .btn-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .fd-addons-button:hover svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_hover_padding',
            [
                'label' => __('Button Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover .service-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item:hover .service-btn' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();


        $this->start_controls_section(
            'section_content_box_style',
            [
                'label' => __('Box', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'box_style_tabs'
        );
        $this->start_controls_tab(
            'box_style_normal_tab',
            [
                'label' => __('Normal', 'techex-hp'),
            ]
        );
        $this->add_control(
            'box_bg_color',
            [
                'label' => __('Box Backgroound Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_height',
            [
                'label' => __('Minimum Height', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
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
                    '{{WRAPPER}} .techex-service-widget-item' => 'min-height: {{SIZE}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label' => __('Box Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label' => __('Box Hover Shadow', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-service-widget-item',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __('Box Border', ''),
                'selector' => '{{WRAPPER}} .techex-service-widget-item',
            ]
        );
        $this->add_control(
            'hide_last_item_border',
            [
                'label' => __('Hide Last Item Border?', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'techex-hp'),
                'label_off' => __('Hide', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'no',
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-wrap:last-child .techex-service-widget-item' => 'border-right: none',
                    'body.rtl {{WRAPPER}} .techex-service-widget-wrap:last-child .techex-service-widget-item' => 'border-left: none',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_style_hover_tab',
            [
                'label' => __('Hover', 'techex-hp'),
            ]
        );
        $this->add_control(
            'box_hover_bg_color',
            [
                'label' => __('Box Backgroound Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'defautl' => '#233aff',
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_hover_radius',
            [
                'label' => __('Box Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_hover_shadow',
                'label' => __('Box Hover Shadow', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-service-widget-item:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_hover_border',
                'label' => __('Box Border', ''),
                'selector' => '{{WRAPPER}} .techex-service-widget-item:hover ',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
            'box_padding',
            [
                'label' => __('Box Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item ' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => __('Box Margin', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-service-widget-item ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-service-widget-item ' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
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
        $settings = $this->get_settings();
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $portfolio_data = [];
        $portfolio_data['settings'] = $this->get_settings();
        $portfolio_data = json_encode($portfolio_data);

        // query
        include('service/query/service-query.php');
        //grid class
        $grid_classes = [];
        $grid_classes[] = 'col-xl-' . $settings['per_line'];
        $grid_classes[] = 'col-md-' . $settings['per_line_tablet'];
        $grid_classes[] = 'col-sm-' . $settings['per_line_mobile'];
        $grid_classes = implode(' ', $grid_classes);

        $this->add_render_attribute('service_grid_classes', 'class', [$grid_classes, 'col-lg-6 techex-service-widget-wrap']);
        $grid_cls =  $this->get_render_attribute_string('service_grid_classes');

        $image_hover_style = $settings['image_hover_style'];
        ?>
        <?php if ($the_query->have_posts()) : ?>
            <div class="container-fluid">
                <div class="row justify-content-center service_append">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                            $idd = get_the_ID();
                            $excerpt = ($settings['excerpt_limit']['size']) ? wp_trim_words(get_the_excerpt(), $settings['excerpt_limit']['size'], '') : get_the_excerpt();
                            $title = ($settings['title_limit']['size']) ? wp_trim_words(get_the_title(), $settings['title_limit']['size'], '') : get_the_title();
                            ob_start();
                            Elementor\Icons_Manager::render_icon($settings['title_icon'], ['aria-hidden' => 'true']);
                            $title_icon = ob_get_clean();
                         ?>
                        <!-- /.content -->
                        <?php  include('service/content/content.php'); ?>
                    <?php
                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <?php

        endif;

        wp_reset_postdata();
    }
}
$widgets_manager->register_widget_type( new \Techex_Services() );
