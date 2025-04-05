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
class Techex_servics_Image_Box extends \Elementor\Widget_Base
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
        return 'techex-servics-image-box';
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
        return __('Servics Image Box', 'techex-hp');
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
				'default' => esc_html__( 'SaaS Landing Page Analysis', 'techex-hp' ),
                'label_block' => true,
			]
		);

        $this->add_control(
			'widget_desc',
			[
				'label' => esc_html__( 'Description', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some', 'techex-hp' ),
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
			'weidth',
			[
				'label' => esc_html__( 'Icon Image Width', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .single_service_items .icon img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Title Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .single_service_items h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => esc_html__( 'Title Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single_service_items h4',
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
                    '{{WRAPPER}} .single_service_items h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .single_service_items p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Description Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single_service_items p',
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
                    '{{WRAPPER}} .single_service_items p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		<div class="single_service_items text-center">
			<div class="icon">
				<img src="<?php echo $settings['icons']['url']; ?>" alt="">
			</div>
			<h4><?php echo esc_html($settings['widget_title']); ?></h4>
			<p><?php echo esc_html($settings['widget_desc']); ?></p>
		</div>

<?php  }

}
$widgets_manager->register_widget_type(new \Techex_servics_Image_Box());