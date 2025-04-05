<?php
namespace Finest_Addons\Widgets;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
/**
 * Elementor icon widget.
 *
 * Elementor widget that displays an icon from over 600+ icons.
 *
 * @since 1.0.0
 */
class Back_To_Top extends Widget_Base {
	/**
	 * Get widget name.
	 *
	 * Retrieve icon widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'rr-addons-back-to-top';
	}
	/**
	 * Get widget title.
	 *
	 * Retrieve icon widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Back To Top', 'rr-addons' );
	}
	/**
	 * Get widget icon.
	 *
	 * Retrieve icon widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-arrow-up';
	}
	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the icon widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'rr-addons' ];
	}
	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'scroll to top', 'back to top', 'top' ];
	}
	/**
	 * Register icon widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Icon', 'rr-addons' ),
			]
		);
		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'rr-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_control(
			'shape',
			[
				'label' => __( 'Shape', 'rr-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'rr-addons' ),
					'square' => __( 'Square', 'rr-addons' ),
				],
				'default' => 'circle',
				'condition' => [
					'view!' => 'default',
				],
				'prefix_class' => 'elementor-shape-',
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'rr-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'rr-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'rr-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'rr-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'rr-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'icon_colors' );
		$this->start_controls_tab(
			'icon_colors_normal',
			[
				'label' => __( 'Normal', 'rr-addons' ),
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'rr-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'icon_line_color',
			[
				'label' => __( 'SVG Line Color', 'rr-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon svg path' => 'stroke: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'rr-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'icon_colors_hover',
			[
				'label' => __( 'Hover', 'rr-addons' ),
			]
		);
		$this->add_control(
			'icon_color_hover',
			[
				'label' => __( 'Icon Color', 'rr-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon:hover svg' => 'fill: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'icon_line_color_hover',
			[
				'label' => __( 'SVG Line Color', 'rr-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon:hover svg path' => 'stroke: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'background_color_hover',
			[
				'label' => __( 'Background Color', 'rr-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'rr-addons' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'size',
			[
				'label' => __( 'Size', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'icon_box_width',
			[
				'label' => __( 'Icon Box Width', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
			]
		);
		$this->add_control(
			'icon_box_height',
			[
				'label' => __( 'Icon Box Height', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
			]
		);
        $this->add_responsive_control(
            'icon_x_position',
            [
                'label' => __('Icon Y Position', 'rr-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
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
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon'  => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_y_position',
            [
                'label' => __('Icon X Position', 'rr-addons'),
                'type' => Controls_Manager::SLIDER,
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
                    'body:not(.rtl) {{WRAPPER}} .elementor-icon'  => 'right: {{SIZE}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .elementor-icon'  => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
			'rotate',
			[
				'label' => __( 'Rotate', 'rr-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'tablet_default' => [
					'unit' => 'deg',
				],
				'mobile_default' => [
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon i, {{WRAPPER}} .elementor-icon svg' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);
		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'rr-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view' => 'framed',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => __( 'Border', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .elementor-icon',
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'rr-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Render icon widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'wrapper','class', 'elementor-icon-wrapper rr-addons-back-to-top-wraper');
		$this->add_render_attribute( 'icon-wrapper', 'class', 'elementor-icon rr-addons-icon' );
		if ( ! empty( $settings['hover_animation'] ) ) {
			$this->add_render_attribute( 'icon-wrapper', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}
		$icon_tag = 'div';
		if ( empty( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
			// add old default
			$settings['icon'] = 'fa fa-star';
		}
		if ( ! empty( $settings['icon'] ) ) {
			$this->add_render_attribute( 'icon', 'class', $settings['icon'] );
			$this->add_render_attribute( 'icon', 'aria-hidden', 'true' );
		}
		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();
		?>
		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<<?php echo $icon_tag . ' ' . $this->get_render_attribute_string( 'icon-wrapper' ); ?>>
			<?php if ( $is_new || $migrated ) :
				Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
			else : ?>
				<i <?php echo $this->get_render_attribute_string( 'icon' ); ?>></i>
			<?php endif; ?>
			</<?php echo $icon_tag; ?>>
		</div>
		<?php
	}
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Back_To_Top() );