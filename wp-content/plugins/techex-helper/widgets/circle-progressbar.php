<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

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
class Techex_Circle_Progressbar extends Widget_Base
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
        return 'techex_circle_progressbar';
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
        return __('Circle Progressbar', 'techex-hp');
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
        return 'eicon-skill-bar';
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
            'progressbar_content_section',
            [
                'label' => esc_html__( 'Content', 'techex-hp' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'progressbar_percentage_number',
			[
				'label' => esc_html__( 'Percentage', 'techex-hp' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0.05,
				'max' => 1.0,
				'step' => 0.01,
				'default' => 0.70,
			]
		);

        $this->add_control(
			'progressbar_subheading',
			[
				'label' => esc_html__( 'Subheading', 'techex-hp' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '100%', 'techex-hp' ),
			]
		);

        $this->add_control(
            'progressbar_linecap',
            [
                'label'       => esc_html__( 'LineCap', 'techex-hp' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'butt',
                'label_block' => false,
                'options'     => [
                    'butt' => esc_html__( 'Butt', 'techex-hp' ),
                    'round' => esc_html__( 'Round', 'techex-hp' ),
                    'square' => esc_html__( 'Square', 'techex-hp' ),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'progressbar_style_section',
            [
                'label' => esc_html__( 'Content', 'techex-hp' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'bar_options',
			[
				'label' => esc_html__( 'Bar Options', 'techex-hp' ),
				'type' => Controls_Manager::HEADING,
			]
		);

        $this->add_control(
			'progressbar_round_color',
			[
				'label' => esc_html__( 'Color', 'techex-hp' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#2196F3',
			]
		);

        $this->add_control(
			'progressbar_round_bg',
			[
				'label' => esc_html__( 'Background', 'techex-hp' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ddd',
			]
		);

        $this->add_control(
			'progressbar_height',
			[
				'label' => esc_html__( 'Height', 'techex-hp' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 50,
				'step' => 1,
				'default' => 3,
			]
		);

        $this->add_control(
			'progressbar_subheading_options',
			[
				'label' => esc_html__( 'Subheading Options', 'techex-hp' ),
				'type' => Controls_Manager::HEADING,
			]
		);

        $this->add_control(
			'progressbar_subheading_color',
			[
				'label' => esc_html__( 'Color', 'techex-hp' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .osteo-progressbar-subheading' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      		=> 'progressbar_subheading_typography',
                'label'     		=> esc_html__( 'Typography', 'techex-hp' ),
                'selector'  		=> '{{WRAPPER}} .osteo-progressbar-subheading',
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
        $settings = $this->get_settings_for_display();
        $progressbar_percentage 	    = $this->get_settings('progressbar_percentage');
        $progressbar_border_radius_two 	    = $this->get_settings('progressbar_border_radius_two');
        $progressbar_height 	    = $this->get_settings('progressbar_height');
        $progressbar_linecap 	        = $this->get_settings('progressbar_linecap');
        $progressbar_color 	        = $this->get_settings('progressbar_color');
        $progressbar_round_color 	        = $this->get_settings('progressbar_round_color');
        $progressbar_round_bg 	        = $this->get_settings('progressbar_round_bg');
        $progressbar_percentage_number 	        = $this->get_settings('progressbar_percentage_number');

        ?>

            <div class="osteo-progressbar-style-4">
                <div class="circle" 
                    data-value="<?php echo esc_attr( $settings['progressbar_percentage_number'] ); ?>" 
                    data-thickness="<?php echo esc_attr( $settings['progressbar_height'] ); ?>" 
                    data-progressbar_linecap="<?php echo esc_attr( $settings['progressbar_linecap'] ); ?>"
                    data-progressbar_round_color="<?php echo esc_attr( $settings['progressbar_round_color'] ); ?>"
                    data-progressbar_round_bg="<?php echo esc_attr( $settings['progressbar_round_bg'] ); ?>">
                    <strong class="osteo-progressbar-subheading"><?php echo esc_html( $settings['progressbar_subheading'] ); ?></strong>
                </div>
            </div>
        
		<?php
    }
}
$widgets_manager->register_widget_type( new \Techex_Circle_Progressbar() );
