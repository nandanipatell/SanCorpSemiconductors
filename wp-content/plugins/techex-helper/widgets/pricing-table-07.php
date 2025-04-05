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
class Techex_pricing_table_07 extends \Elementor\Widget_Base
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
        return 'techex-pricing-box';
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
        return __('Techex Pricing Box', 'techex-hp');
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
        return 'eicon-price-table';
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
            'section_layout',
            [
                'label' => __('Contents', 'techex-hp'),
            ]
        );

        $this->add_control(
			'table_box_image',
			[
				'label' => esc_html__( 'Choose Box BG Image', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'table_box_icon',
			[
				'label' => esc_html__( 'Icons Image', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'prics_plan',
			[
				'label' => esc_html__( 'Plan Name', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Basic Plan', 'techex-hp' ),
                'label_block' => true,
			]
		);

        $this->add_control(
			'plan_desc',
			[
				'label' => esc_html__( 'Plan Description', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( '<sup>$</sup><span>59 </span>/Monthly', 'techex-hp' ),
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

        $this->add_control(
			'widget_link_text',
			[
				'label' => esc_html__( 'Button Text', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Get Started', 'techex-hp' ),
                'label_block' => true,
			]
		);

        $this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Button URL', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'techex-hp' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_icon',
			[
				'label' => __( 'Button Icon', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-arrow-right',
					'library' => 'solid',
				]
			]
		);

        $this->end_controls_section();

        // style tabs area

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'techex-hp' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'price_head_color',
			[
				'label' => esc_html__( 'Table Head Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price__wrapper .price__widget .price__head' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price__wrapper .price__widget .price__head .icon' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'plans',
			[
				'label' => __( 'Plan Style', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'plan_color',
			[
				'label' => esc_html__( 'Plan Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price__wrapper .price__widget .price__head h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'plan_typography',
				'label' => esc_html__( 'Plan Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .price__wrapper .price__widget .price__head h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => __('Plan Margin', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .price__wrapper .price__widget .price__head h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
			'desc',
			[
				'label' => __( 'Plan List Style', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Plan List', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price__wrapper .price__widget .preice__body ul > li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Plan List Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .price__wrapper .price__widget .preice__body ul > li',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_responsive_control(
            'desc_padding',
            [
                'label'      => __('Plan List Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .price__wrapper .price__widget .preice__body ul > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
			'button',
			[
				'label' => __( 'Button Style', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price__wrapper .price__widget .theme-btn.style-1' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Button Hover Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price__wrapper .price__widget .theme-btn.style-1:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__( 'Button Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .price__wrapper .price__widget .theme-btn.style-1',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Button BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price__wrapper .price__widget .theme-btn.style-1' => 'background: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'button_hover_bg_color',
			[
				'label' => esc_html__( 'Button Hover BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price__wrapper .price__widget .theme-btn.style-1:hover' => 'background: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => __('Button Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .price__wrapper .price__widget .theme-btn.style-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_responsive_control(
            'button_margin',
            [
                'label'      => __('Button Margin', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .price__wrapper .price__widget .theme-btn.style-1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    protected function render() {
        $settings = $this->get_settings();

        ?>

		<div class="price__wrapper">
			<div class="price__widget">
				<div class="price__head bg-center bg-cover" style="background-image: url(<?php echo esc_html($settings['table_box_image']['url']); ?>);">
					<div class="icon">
						<img src="<?php echo esc_html($settings['table_box_icon']['url']); ?>" alt="">
					</div>
					<div class="price__range">
						<h4><?php echo esc_html($settings['prics_plan']); ?></h4>
						<p><sup>$</sup><?php echo ($settings['plan_desc']); ?></p>
					</div>
				</div>
				<div class="preice__body">
					<?php if ( $settings['list'] ) { ?>
						<ul class="plan-features">
							<?php foreach (  $settings['list'] as $item ) { 
								echo '<li class="' . esc_attr( $item['class_name'] ) . '">' . $item['list_title'] . '</li>';
								}
							?>
						</ul>
					<?php } ?>
					<a href="<?php echo esc_html($settings['website_link']['url']); ?>" class="theme-btn style-1 mt-30"><?php echo esc_html($settings['widget_link_text']); ?> <?php \Elementor\Icons_Manager::render_icon($settings["button_icon"]);  ?></a>
				</div>
			</div>
		</div>

<?php  }

}
$widgets_manager->register_widget_type(new \Techex_pricing_table_07());