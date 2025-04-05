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
class Techex_Testimonial_image_Box extends \Elementor\Widget_Base
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
        return 'techex-testimonial-image-box';
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
        return __('Testimonial Image Box', 'techex-hp');
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
        return 'eicon-info-box';
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
			'icons',
			[
				'label' => esc_html__( 'Choose Icon Image', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'widget_title',
			[
				'label' => esc_html__( 'Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Figma', 'techex-hp' ),
                'label_block' => true,
			]
		);

		$this->add_control(
			'widget_title_small',
			[
				'label' => esc_html__( 'Small Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Design Tool', 'techex-hp' ),
                'label_block' => true,
			]
		);

        $this->add_control(
			'widget_desc',
			[
				'label' => esc_html__( 'Description', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'There are many variations of passages of Lorem Ipsum  available.', 'techex-hp' ),
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

        $this->add_control(
			'shape_bg_image',
			[
				'label' => esc_html__( 'Top Shape Image', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
			'heading_color',
			[
				'label' => esc_html__( 'Title Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0E1871',
				'selectors' => [
					'{{WRAPPER}} .single_tools .icons_info .content h6' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => esc_html__( 'Title Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single_tools .icons_info .content h6',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => __('Title Margin', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .single_tools .icons_info .content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
			'small_title',
			[
				'label' => __( 'Small Tilte', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'small_title_color',
			[
				'label' => esc_html__( 'Small Title Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#5F637A',
				'selectors' => [
					'{{WRAPPER}} .single_tools .icons_info .content small' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'small_title_typography',
				'label' => esc_html__( 'Small Title Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single_tools .icons_info .content small',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_responsive_control(
            'small_title_padding',
            [
                'label'      => __('Small Title Margin', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .single_tools .icons_info .content small' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Description Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#5F637A',
				'selectors' => [
					'{{WRAPPER}} .single_tools p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Description Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single_tools p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_responsive_control(
            'desc_padding',
            [
                'label'      => __('Description Margin', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .single_tools p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .single_tools a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Button Hover Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_tools a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__( 'Button Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single_tools a',
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
					'{{WRAPPER}} .single_tools a' => 'background: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'button_hover_bg_color',
			[
				'label' => esc_html__( 'Button Hover BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_tools a:hover' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_icon_color',
			[
				'label' => esc_html__( 'Button Icon Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_tools a i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_icon_typography',
				'label' => esc_html__( 'Button Icon Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single_tools a i',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
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
                    '{{WRAPPER}} .single_tools a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		<div class="single_tools">
			<div class="icons_info d-flex justify-content-between">
				<div class="icon">
					<img src="<?php echo $settings['icons']['url']; ?>" alt="">
				</div>
				<div class="content">
					<h6><?php echo esc_html($settings['widget_title']); ?></h6>
					<small><?php echo esc_html($settings['widget_title_small']); ?></small>
				</div>
			</div>
			<p><?php echo esc_html($settings['widget_desc']); ?></p>
			<a href="<?php echo $settings['website_link']['url'] ?>" class="theme-btn"><?php echo $settings['widget_link_text'] ?> <?php \Elementor\Icons_Manager::render_icon($settings["button_icon"]);  ?></a>
			<div class="shape_element">
				<img src="<?php echo $settings['shape_bg_image']['url'] ?>" alt="">
			</div>
		</div>

<?php  }

}
$widgets_manager->register_widget_type(new \Techex_Testimonial_image_Box());