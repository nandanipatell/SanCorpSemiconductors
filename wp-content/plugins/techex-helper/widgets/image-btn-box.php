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
class Techex_Image_Box extends \Elementor\Widget_Base
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
        return 'techex-image-box';
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
        return __('Techex Image Box', 'techex-hp');
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
			'show_active',
			[
				'label' => esc_html__( 'Show Active', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'active', 'techex-hp' ),
				'label_off' => esc_html__( 'Hide', 'techex-hp' ),
				'return_value' => 'active',
				'default' => 'Hide',
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
				'default' => esc_html__( 'Marketing Analysis', 'techex-hp' ),
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

        $this->add_control(
			'widget_link_text',
			[
				'label' => esc_html__( 'Button Text', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact Us', 'techex-hp' ),
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
			'box_image',
			[
				'label' => esc_html__( 'Box BG Image', 'techex-hp' ),
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
					'{{WRAPPER}} .feature_single__items .content h3' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_hover_color',
			[
				'label' => esc_html__( 'Title Hover Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature_single__items:hover .content h3' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => esc_html__( 'Title Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .feature_single__items .content h3',
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
                    '{{WRAPPER}} .feature_single__items .content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .feature_single__items .content p' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'desc_hover_color',
			[
				'label' => esc_html__( 'Description Hover Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature_single__items:hover .content p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Description Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .feature_single__items .content p',
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
                    '{{WRAPPER}} .feature_single__items .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .feature_single__items .content .theme-btn' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Button Hover Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature_single__items .content .theme-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__( 'Button Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .feature_single__items .content .theme-btn',
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
					'{{WRAPPER}} .feature_single__items .content .theme-btn' => 'background: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'button_hover_bg_color',
			[
				'label' => esc_html__( 'Button Hover BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature_single__items .content .theme-btn:hover' => 'background: {{VALUE}}',
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
                    '{{WRAPPER}} .feature_single__items .content .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        if ( 'active' === $settings['show_active'] ) 
        ?>

        <div class="feature_single__items text-center <?php echo $settings['show_active']; ?>">
            <div class="icon">
                <img src="<?php echo $settings['icons']['url']; ?>" alt="">
            </div>
            <div class="content">
                <h3><?php echo esc_html($settings['widget_title']); ?></h3>
                <p><?php echo esc_html($settings['widget_desc']); ?></p>
                <a href="<?php echo $settings['website_link']['url'] ?>" class="theme-btn mt-30"><?php echo $settings['widget_link_text'] ?> <?php \Elementor\Icons_Manager::render_icon($settings["button_icon"]);  ?></a>
            </div>
            <div class="shape_element">
                <img src="<?php echo $settings['box_image']['url'] ?>" alt="">
            </div>
        </div>

<?php  }

}
$widgets_manager->register_widget_type(new \Techex_Image_Box());