<?php
namespace RRdevs_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager;
use \Elementor\Control_Media;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Widget_Base;

class pricing_table_06 extends Widget_Base {

	public function get_name() {
		return 'rr-addons-pricing_table_06';
	}

	public function get_title() {
		return esc_html__( 'RR Pricing Table 06', 'rr-addons' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'rr-addons' ];
	}

	public function get_keywords() {
		return [ 'rrdevs', 'Pricing Table 06', 'Pricing Table' ];
	}

	protected function register_controls() {
	
		
		$this->start_controls_section(
			'price_head',
			[
				'label' => esc_html__( 'Pricing Head', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'price_sign',
			[
				'label' => __( 'Price Sign', 'rr-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Price Sign', 'rr-addons' ),
			]
		);

		$this->add_control(
			'price_taka',
			[
				'label' => __( 'Price', 'rr-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Price', 'rr-addons' ),
			]
		);

		$this->add_control(
			'price_type',
			[
				'label' => __( 'Price Type', 'rr-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Price Type', 'rr-addons' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'cetagory_element',
			[
				'label' => esc_html__( 'Category Elements', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'cetagory_name',
			[
				'label' => __( 'Category Name', 'rr-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Category Name', 'rr-addons' ),
			]
		);

		$this->add_control(
			'cetagory_des',
			[
				'label' => __( 'Category Des', 'rr-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Category Des', 'rr-addons' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_button',
			[
				'label' => esc_html__( 'Pricing Button', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'pricin_button_text',
			[
				'label' => __( 'Pricing Button Text', 'rr-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Get Started', 'rr-addons' ),
			]
		);

		$this->add_control(
			'pricin_button_url',
			[
				'label' => __( 'Pricing Button Url', 'rr-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'plan_features',
			[
				'label' => esc_html__( 'Plan Feature', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'rr-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'rr-addons' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'rr-addons' ),
						'label_block' => true,
					],
					[
						'name' => 'class_name',
						'label' => esc_html__( 'List Disable Class', 'rr-addons' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'active', 'rr-addons' ),
					],
				],
				
			]
		);


		$this->end_controls_section();
		

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Pricing Head', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_sign',
				'label' => esc_html__( 'Pricing Sign', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .price__head .price__range span',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_prics',
				'label' => esc_html__( 'Prics', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .price__head .price__range h3',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_type',
				'label' => esc_html__( 'Prics Type', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .price__head .price__range p',
			]
		);

		$this->add_control(
            'pricing_head_color',
            [
                'label'     => __( 'Pricing Text Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price__head .price__range span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .price__head .price__range h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .price__head .price__range p' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
            'pricing_head_bg',
            [
                'label'     => __( 'Pricing Head BG Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price__wrapper .price__element .price__head' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'cetagory_style',
			[
				'label' => esc_html__( 'Cetagory Element', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cetagory_typography',
				'label' => esc_html__( 'Cetagory Name', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .cetagory__element h4',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cetagory_typograph',
				'label' => esc_html__( 'Cetagory Description', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .cetagory__element p',
			]
		);

		$this->add_control(
            'cetagory_text_color',
            [
                'label'     => __( 'Cetagory Text Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cetagory__element h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cetagory__element p' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
            'cetagory_bg_color',
            [
                'label'     => __( 'Cetagory BG Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price__wrapper .price__element::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'preice_btn_style',
			[
				'label' => esc_html__( 'Price Button', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__( 'Button Typography', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .preice__body a',
			]
		);

		$this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Text Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .preice__body a' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
            'button_bg_color',
            [
                'label'     => __( 'Button BG Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .preice__body a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
            'button_hover_color',
            [
                'label'     => __( 'BG Hover Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .preice__body a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'button_margin',
			[
				'label' => esc_html__( 'Button Padding', 'rr-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .preice__body a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'preice_body_style',
			[
				'label' => esc_html__( 'Plan Features', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'list_typography',
				'label' => esc_html__( 'Plan List Typography', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .preice__body ul li',
			]
		);

		$this->add_control(
            'plan_list_color',
            [
                'label'     => __( 'Plan List Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .preice__body ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
            'plan_icon_color',
            [
                'label'     => __( 'Plan Icon Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .preice__body ul li::before' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();
		
	}


	
	protected function render() {
		$settings = $this->get_settings_for_display();
			?>
				<div class="price__wrapper">
					<div class="price__element">
                        <div class="price__head">
                            <div class="price__range">
                                <span><?php echo esc_html($settings['price_sign']); ?></span>
                                <h3><?php echo esc_html($settings['price_taka']); ?></h3>
                                <p><?php echo esc_html($settings['price_type']); ?></p>
                            </div>
                        </div>
                        <div class="preice__body">
                            <div class="cetagory__element">
                                <h4><?php echo esc_html($settings['cetagory_name']); ?></h4>
                                <p><?php echo esc_html($settings['cetagory_des']); ?></p>
                            </div>
                            <a href="<?php echo esc_html($settings['pricin_button_url']['url']); ?>" class="theme-btn mb-5"><?php echo esc_html($settings['pricin_button_text']); ?></a>
							<?php if ( $settings['list'] ) { ?>
								<ul class="plan-features">
									<?php foreach (  $settings['list'] as $item ) { 
										echo '<li class="' . esc_attr( $item['class_name'] ) . '">' . $item['list_title'] . '</li>';
									 }
									?>
								</ul>
							<?php } ?>
                        </div>
                    </div>
				</div>
		<?php
	}
	

}

$widgets_manager->register_widget_type( new \RRdevs_Addons\Widgets\pricing_table_06() );


