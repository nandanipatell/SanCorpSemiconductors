<?php
namespace Finest_Addons\Widgets;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Widget_Base;

class RR_Addons_Progress_Bar extends Widget_Base {

	public function get_name() {
		return 'rr-addons-progress-bar';
	}

	public function get_title() {
		return esc_html__( 'Progress Bar', 'rr-addons' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'rr-addons' ];
	}

	public function get_script_depends() {
		return [ 'waypoints', 'exad-progress-bar' ];
	}

	public function get_keywords() {
		return [ 'rr-addons', 'skill', 'circle', 'bars' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'progress_bar_section_content',
			[
				'label' => __('Content', 'rr-addons')
			]
		);

		$this->add_control(
			'progress_bar_title',
			[
				'label'     => __('Title', 'rr-addons'),
				'type'      => Controls_Manager::TEXT,
				'default'   => __('Progress Bar', 'rr-addons'),
                'label_block' => true,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'progress_bar_value',
			[
				'label'   => __( 'Percentage Value', 'rr-addons' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'default' => 60
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_progress_bar_styles_preset',
			[
				'label' => __('General Styles', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'progress_bar_preset',
			[
				'label'   => __('Style Presets', 'rr-addons'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'line'        => __('Line', 'rr-addons'),
					'line-bubble' => __('Line Bubble', 'rr-addons'),
					'circle'      => __('Circle', 'rr-addons'),
					'fan'         => __('Half Circle', 'rr-addons')
				],
				'default' => 'line'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'progress_bar_title_styles',
			[
				'label' => __('Title', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'progress_bar_title_color',
			[
				'label'     => __( 'Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-progress-bar-title' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'progress_bar_title_typography',
					'fields_options'   => [
			            'font_size'    => [
			                'default'  => [
			                    'unit' => 'px',
			                    'size' => 16
			                ]
			            ],
			            'font_weight'  => [
			                'default'  => '600'
			            ]
		            ],
					'selector' => '{{WRAPPER}} .rr-addons-progress-bar-title'
				]
		);

		$this->add_responsive_control(
            'progress_bar_title_margin',
            [
                'label'        => __('Margin', 'rr-addons'),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => ['px', '%'],
                'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '10',
					'left'     => '0',
					'unit'     => 'px',
					'isLinked' => false
                ],
                'selectors'    => [
                    '{{WRAPPER}} .rr-addons-progress-bar-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'progress_bar_front_style',
			[
				'label' => __('Front Bar', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'progress_bar_stroke_color',
			[
				'label'   => __( 'Color', 'rr-addons' ),
				'type'    => Controls_Manager::COLOR,
                'default' => "#222"
			]
		);

		$this->add_control(
			'progress_bar_stroke_width',
			[
				'label'   => __( 'Width', 'rr-addons' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'default' => 15
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'progress_bar_back_style',
			[
				'label' => __('Back Bar', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'progress_bar_trail_color',
			[
				'label'   => __( 'Color', 'rr-addons' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#ddd'
			]
		);

		$this->add_control(
			'progress_bar_trail_width',
			[
				'label'   => __( 'Width', 'rr-addons' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'default' => 15
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'progress_bar_value_styles',
			[
				'label' => __('Percentage Value', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'progress_bar_value_position',
			[
				'label'      => __( 'Position', 'rr-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range'      => [
					'px'       => [
						'min'  => 0,
						'max'  => 50,
						'step' => 1
					]
				],
				'default'    => [
					'unit'   => '%',
					'size'   => 7
				],
				'selectors'  => [
					'{{WRAPPER}} [class*="rr-addons-progress-bar-"].fan .ldBar-label' => 'bottom: {{SIZE}}{{UNIT}};'
				],
				'condition'  => [
					'progress_bar_preset' => 'fan'
				]
			]
		);

		$this->add_control(
			'progress_bar_value_color',
			[
				'label'     => __( 'Text Color', 'rr-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .rr-addons-progress-bar .ldBar-label' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'progress_bar_value_value_typography',
					'selector' => '{{WRAPPER}} .rr-addons-progress-bar .ldBar-label'
				]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'progress_bar_background',
				'types'    => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .rr-addons-progress-bar .ldBar-label'
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'progress_bar_border',
				'selector' => '{{WRAPPER}} .rr-addons-progress-bar .ldBar-label'
			]
		);

		$this->add_responsive_control(
			'progress_bar_radius',
			[
				'label'      => __( 'Border Radius', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '50',
					'right'  => '50',
					'bottom' => '50',
					'left'   => '50',
					'unit'   => '%'
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-progress-bar .ldBar-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'progress_bar_padding_style',
			[
				'label'      => __( 'Padding', 'rr-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '10',
					'right'  => '10',
					'bottom' => '10',
					'left'   => '10'
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-progress-bar .ldBar-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'progress_bar_box_shadow',
				'selector' => '{{WRAPPER}} .rr-addons-progress-bar .ldBar-label'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'progress_bar_box',
			[
				'label' => __('Box', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
            'progress_bar_box_margin',
            [
                'label'        => __('margin', 'rr-addons'),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => ['px', '%'],
                'selectors'    => [
                    '{{WRAPPER}} [class*="rr-addons-progress-bar-"].line' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title    = $settings['progress_bar_title'];

		$this->add_render_attribute(
			'rr-addons-progress-bar',
			[
				'class' => [
					esc_attr( $settings['progress_bar_preset'] ),
					'rr-addons-progress-bar',
					'rr-addons-progress-bar-'.$this->get_id()
				],
				'data-id'                              => $this->get_id(),
				'data-type'                            => esc_attr( $settings['progress_bar_preset'] ),
				'data-progress-bar-value'              => esc_attr( $settings['progress_bar_value'] ),
				'data-stroke-color'                    => esc_attr( $settings['progress_bar_stroke_color'] ),
				'data-progress-bar-stroke-width'       => esc_attr( $settings['progress_bar_stroke_width'] ),
				'data-stroke-trail-color'              => esc_attr( $settings['progress_bar_trail_color'] ),
				'data-progress-bar-stroke-trail-width' => esc_attr( $settings['progress_bar_trail_width'] )
			]
		);

		$this->add_render_attribute( 'progress_bar_title', 'class', 'rr-addons-progress-bar-title' );
        $this->add_inline_editing_attributes( 'progress_bar_title', 'none' );

		if ( 'line' === $settings['progress_bar_preset'] || 'line-bubble' === $settings['progress_bar_preset'] ) {
			$this->add_render_attribute(
				'rr-addons-progress-bar',
				[
					'data-preset' => 'line',
					'style'       => 'width: 100%; height: 100px'
				]
			);
		}

		if ( 'circle' === $settings['progress_bar_preset'] ) {
			$this->add_render_attribute(
				'rr-addons-progress-bar',
				[
					'data-preset' => 'circle',
					'style'       => 'width: 100%; height: 100%'
				]
			);
		}

		if ( 'fan' === $settings['progress_bar_preset'] ) {
			$this->add_render_attribute(
				'rr-addons-progress-bar',
				[
					'data-preset' => 'fan',
					'style'       => 'width: 100%; height: 100%'
				]
			);
		}

		echo '<div '.$this->get_render_attribute_string('rr-addons-progress-bar').' data-progress-bar>';
			echo $title ? '<h6 '.$this->get_render_attribute_string( 'progress_bar_title' ).'>'.$title.'</h6>' : '';
		echo '</div>';
	}
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\RR_Addons_Progress_Bar() );