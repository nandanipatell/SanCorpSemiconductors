<?php

use Elementor\Group_Control_Text_Shadow;
use Elementor\Icons_Manager;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\POPOVER_TOGGLE;

defined('ABSPATH') || die();

class RR_Fun_Factor extends Widget_Base {

	public function get_name() {
		return 'rr-addons-counter';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __('Fun Factor', 'rr-addons');
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-counter';
	}

	public function get_keywords() {
		return ['fun', 'factor', 'animation', 'info', 'box', 'number', 'animated', 'counter'];
	}



	protected function register_controls() {

		$this->start_controls_section(
			'_section_contents',
			[
				'label' => __('Contents', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'media_type',
			[
				'label'          => __('Media Type', 'rr-addons'),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'options'        => [
					'icon'  => [
						'title' => __('Icon', 'rr-addons'),
						'icon'  => 'fa fa-smile-o',
					],
					'image' => [
						'title' => __('Image', 'rr-addons'),
						'icon'  => 'fa fa-image',
					],
				],
				'default'        => 'icon',
				'toggle'         => false,
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'image',
			[
				'label'     => __('Image', 'rr-addons'),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'media_type' => 'image'
				],
				'dynamic'   => [
					'active' => true,
				]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'default'   => 'medium_large',
				'separator' => 'none',
				'exclude'   => [
					'full',
					'custom',
					'large',
					'shop_catalog',
					'shop_single',
					'shop_thumbnail'
				],
				'condition' => [
					'media_type' => 'image'
				]
			]
		);

		$this->add_control(
			'icons',
			[
				'label'      => __('Icons', 'rr-addons'),
				'type'       => Controls_Manager::ICONS,
				'show_label' => true,
				'default'    => [
					'value'   => 'far fa-grin-wink',
					'library' => 'solid',
				],
				'condition'  => [
					'media_type' => 'icon',
				],

			]
		);

		$this->add_control(
			'image_icon_position',
			[
				'label'          => __('Position', 'rr-addons'),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'options'        => [
					'rr-addons-fun-factor-left'  => [
						'title' => __('Left', 'rr-addons'),
						'icon'  => 'eicon-h-align-left',
					],
					'rr-addons-fun-factor-top'   => [
						'title' => __('Top', 'rr-addons'),
						'icon'  => 'eicon-v-align-top',
					],
					'rr-addons-fun-factor-right' => [
						'title' => __('Right', 'rr-addons'),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'toggle'         => true,
				'default'        => 'rr-addons-fun-factor-top',
			]
		);

		/*
		 * number section
		 */

		$this->add_control(
			'fun_factor_number',
			[
				'label'     => __('Number', 'rr-addons'),
				'type'      => Controls_Manager::TEXT,
				'default'   => '507',
				'dynamic'   => [
					'active' => true,
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'fun_factor_number_prefix',
			[
				'label'     => __('Number Prefix', 'rr-addons'),
				'type'      => Controls_Manager::TEXT,
				'placeholder'   => '1',
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'fun_factor_number_suffix',
			[
				'label'     => __('Number Suffix', 'rr-addons'),
				'type'      => Controls_Manager::TEXT,
				'placeholder'   => '+',
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'fun_factor_title',
			[
				'label'   => __('Title', 'rr-addons'),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __('Project Completed', 'rr-addons'),
			]
		);

		$this->add_control(
			'fun_factor_sub_title',
			[
				'label'   => __('Sub Title', 'rr-addons'),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __('Happy Customar', 'rr-addons'),
			]
		);

		$this->add_control(
			'animate_number',
			[
				'label'        => __('Animate', 'rr-addons'),
				'description'  => __('Only number is animatable'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __('Yes', 'rr-addons'),
				'label_off'    => __('No', 'rr-addons'),
				'return_value' => 'yes',
				'separator'    => 'before',
				'default'      => 'yes'
			]
		);

		$this->add_control(
			'animate_duration',
			[
				'label'     => __('Duration', 'rr-addons'),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 100,
				'max'       => 10000,
				'step'      => 10,
				'default'   => 500,
				'condition' => [
					'animate_number!' => ''
				],
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$this->end_controls_section();



		// options section in contents tab

		$this->start_controls_section(
			'_section_options',
			[
				'label' => __('Options', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'divider_show_hide',
			[
				'label'        => __('Show Divider', 'rr-addons'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __('Show', 'rr-addons'),
				'label_off'    => __('Hide', 'rr-addons'),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label'       => __('Text Alignment', 'rr-addons'),
				'type'        => Controls_Manager::CHOOSE,
				'options'     => [
					'left'   => [
						'title' => __('Left', 'rr-addons'),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'rr-addons'),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __('Right', 'rr-addons'),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors'   => [
					'{{WRAPPER}} .rr-addons-fun-factor-wrap' => 'text-align: {{VALUE}};',
				],
				'default'     => 'center',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'_section_style_icon_image',
			[
				'label' => __('Icon / Image', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label'      => __('Width', 'rr-addons'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => 150,
						'max' => 500,
					],
					'%'  => [
						'min' => 30,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}}.rr-addons-fun-factor-icon--top .rr-addons-fun-factor-media--image' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}:not(.rr-addons-fun-factor-icon--top) .rr-addons-fun-factor-media--image' => 'flex: 0 0 {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'media_type' => 'image',
				]
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'label'      => __('Height', 'rr-addons'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => 150,
						'max' => 1024,
					],
					'%'  => [
						'min' => 30,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-media--image' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'media_type' => 'image',
				]
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label'           => __('Size', 'rr-addons'),
				'type'            => Controls_Manager::SLIDER,
				'size_units'      => ['px'],
				'range'           => [
					'px' => [
						'min'  => 6,
						'max'  => 300,
					],
				],
				'selectors'       => [
					'{{WRAPPER}} .rr-addons-fun-factor-media--icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rr-addons-fun-factor-media--icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'       => [
					'media_type' => 'icon',
				],
				'render_type'     => 'template',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => __('Icon Color', 'rr-addons'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-fun-factor-media--icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rr-addons-fun-factor-media--icon svg' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rr-addons-fun-factor-media--icon svg path' => 'fill: {{VALUE}}',
				],
				'condition' => [
					'media_type' => 'icon',
				],
			]
		);

		$this->add_responsive_control(
			'media_padding',
			[
				'label'      => __('Padding', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-media--image img, {{WRAPPER}} .rr-addons-fun-factor-media--icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'media_border',
				'selector'  => '{{WRAPPER}} .rr-addons-fun-factor-media--image img, {{WRAPPER}} .rr-addons-fun-factor-media--icon',
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'media_border_radius',
			[
				'label'      => __('Border Radius', 'rr-addons'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-media--image img, {{WRAPPER}} .rr-addons-fun-factor-media--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'media_box_shadow',
				'selector' => '{{WRAPPER}} .rr-addons-fun-factor-media--image img, {{WRAPPER}} .rr-addons-fun-factor-media--icon',
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label'     => __('Background Color', 'rr-addons'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-fun-factor-media--icon, {{WRAPPER}} .rr-addons-fun-factor-media--image' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'media_type' => 'icon'
				]
			]
		);
		$this->add_responsive_control(
			'icon_image_bottom_spacing',
			[
				'label'     => __('Bottom Spacing', 'rr-addons'),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-fun-factor-media--icon, {{WRAPPER}} .rr-addons-fun-factor-media--image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'number_suffix',
			[
				'label' => __('Number suffix', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'number_suffix_color',
			[
				'label'     => __('Color', 'rr-addons'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-fun-factor-content-number-suffix' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'number_suffix_typography',
				'label'    => __('Typography', 'rr-addons'),
				'selector' => '{{WRAPPER}} .rr-addons-fun-factor-content-number-suffix',
			]
		);

		$this->add_responsive_control(
			'number_suffix_top',
			[
				'label'      => __('Spacing Top/Bottom', 'rr-addons'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'range'      => [
					'%' => [
						'min' => 0,
						'max' => 100
					],
				]
				,'range'      => [
					'px' => [
						'min' => -200,
						'max' => 200
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-content-number-suffix' => 'top: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'number_suffix_right',
			[
				'label'      => __('Spacing Left/Right', 'rr-addons'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'range'      => [
					'%' => [
						'min' => 0,
						'max' => 100
					],
				]
				,'range'      => [
					'px' => [
						'min' => -200,
						'max' => 200
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-content-number-suffix' => 'right: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_style_number_title',
			[
				'label' => __('Number & Title', 'rr-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label'     => __('Padding', 'rr-addons'),
				'type'      => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-fun-factor-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'fun_factor_number_heading',
			[
				'label' => __('Number', 'rr-addons'),
				'type'  => Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'fun_factor_number_color',
			[
				'label'     => __('Color', 'rr-addons'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-fun-factor-content-number-prefix' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .rr-addons-fun-factor-content-number' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'number_typography',
				'label'    => __('Typography', 'rr-addons'),
				'selector' => '{{WRAPPER}} .rr-addons-fun-factor-content-number-prefix, {{WRAPPER}} .rr-addons-fun-factor-content-number',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'fun_factor_number_shadow',
				'label'    => __('Text Shadow', 'rr-addons'),
				'selector' => '{{WRAPPER}} .rr-addons-fun-factor-content-number-prefix, {{WRAPPER}} .rr-addons-fun-factor-content-number',
			]
		);

		$this->add_control(
			'fun_factor_number_bottom_spacing',
			[
				'label'      => __('Bottom Spacing', 'rr-addons'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-content-number-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				]
			]
		);

		/*
		 * Title section
		 */

		$this->add_control(
			'content_title_heading_style',
			[
				'label'     => __('Title', 'rr-addons'),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'fun_factor_content_color',
			[
				'label'     => __('Color', 'rr-addons'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-fun-factor-content-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => __('Typography', 'rr-addons'),
				'selector' => '{{WRAPPER}} .rr-addons-fun-factor-content-text',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'fun_factor_content_shadow',
				'label'    => __('Text Shadow', 'rr-addons'),
				'selector' => '{{WRAPPER}} .rr-addons-fun-factor-content-text',
			]
		);

		$this->add_control(
			'fun_factor_content_bottom_spacing',
			[
				'label'      => __('Bottom Spacing', 'rr-addons'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-content-text' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				]
			]
		);

		/*
		 * Sub Title section
		 */

		$this->add_control(
			'content_title_sub_heading_style',
			[
				'label'     => __('Sub Title', 'rr-addons'),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);



		$this->add_control(
			'fun_factor_sub_color',
			[
				'label'     => __('Color', 'rr-addons'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-fun-factor-subtitle-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'sub_typography',
				'label'    => __('Typography', 'rr-addons'),
				'selector' => '{{WRAPPER}} .rr-addons-fun-factor-subtitle-text',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'fun_factor_sub_shadow',
				'label'    => __('Text Shadow', 'rr-addons'),
				'selector' => '{{WRAPPER}} .rr-addons-fun-factor-subtitle-text',
			]
		);

		$this->add_control(
			'fun_factor_sub_bottom_spacing',
			[
				'label'      => __('Bottom Spacing', 'rr-addons'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-subtitle-text' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_divider',
			[
				'label'     => __('Divider', 'rr-addons'),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'divider_show_hide' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'divider_width',
			[
				'label'      => __('Width', 'rr-addons'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range'      => [
					'%' => [
						'min' => 10,
						'max' => 100
					],
				],
				'default'    => [
					'unit' => '%'
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-divider' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'divider_height',
			[
				'label'      => __('Height', 'rr-addons'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'default'    => [
					'px' => 1
				],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-divider' => 'height: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'divider_border_radius',
			[
				'label'     => __('Border Radius', 'rr-addons'),
				'type'      => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-fun-factor-divider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label'     => __('Color', 'rr-addons'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rr-addons-fun-factor-divider' => 'background-color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'divider_bottom_spacing',
			[
				'label'      => __('Bottom Spacing', 'rr-addons'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .rr-addons-fun-factor-divider' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute('fun_factor_number', 'class', 'rr-addons-fun-factor-content-number');
		$number           = $settings['fun_factor_number'];
		$fun_factor_title = $settings['fun_factor_title'];
		$fun_factor_sub_title = $settings['fun_factor_sub_title'];
		$image_icon_position = $settings['image_icon_position'];

		if ($settings['animate_number']) {
			$data = [
				'toValue'  => intval($settings['fun_factor_number']),
				'duration' => intval($settings['animate_duration']),
			];
			$this->add_render_attribute('fun_factor_number', 'data-animation', wp_json_encode($data));
			$number = 0;
		}
		?>

		<div class="rr-addons-fun-factor-wrap <?php echo esc_attr( $image_icon_position ) ?>">
            <?php if (!empty($settings['icons']['value'])) : ?>
                <div class="rr-addons-fun-factor-media rr-addons-fun-factor-media--icon">
                    <?php Icons_Manager::render_icon( $settings['icons'], ['aria-hidden' => 'true'] ); ?>
                </div>
            <?php elseif ( $settings['image']['url'] || $settings['image']['id'] ) : ?>
                <div class="rr-addons-fun-factor-media rr-addons-fun-factor-media--image">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                </div>
            <?php endif; ?>

            <div class="rr-addons-fun-factor-content">
				<div class="rr-addons-fun-factor-content-number-wrap">
					<?php if ( $settings['fun_factor_number_prefix'] ) : ?>
						<span class="rr-addons-fun-factor-content-number-prefix"><?php esc_html_e( $settings['fun_factor_number_prefix'] ); ?></span>
					<?php endif; ?>
	                <span <?php $this->print_render_attribute_string( 'fun_factor_number' ); ?> ><?php echo esc_html( $number ); ?></span>
					<?php if ( $settings['fun_factor_number_suffix'] ) : ?>
						<span class="rr-addons-fun-factor-content-number-suffix"><?php esc_html_e( $settings['fun_factor_number_suffix'] ); ?></span>
					<?php endif; ?>
				</div>
                <?php if ( 'yes' === $settings['divider_show_hide'] ) : ?>
                    <span class="rr-addons-fun-factor-divider rr-addons-fun-factor-divider-align-<?php echo esc_attr( $settings['text_align'] ); ?>"></span>
                <?php endif; ?>
				<h1 class="rr-addons-fun-factor-content-text"><?php echo esc_html($fun_factor_title) ?></h1>
				<h5 class="rr-addons-fun-factor-subtitle-text"><?php echo esc_html($fun_factor_sub_title) ?></h5>
            </div>
        </div>
		<?php
	}
}
$widgets_manager->register_widget_type( new \RR_Fun_Factor() );