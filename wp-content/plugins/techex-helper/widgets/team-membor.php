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
class Techex_Team_membor extends \Elementor\Widget_Base
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
        return 'techex-team-membor';
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
        return __('Team Membor', 'techex-hp');
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
        return 'eicon-image-box';
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
			'team_img',
			[
				'label' => esc_html__( 'Choose Team Image', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'team_title',
			[
				'label' => esc_html__( 'Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Tanvir Hossain', 'techex-hp' ),
                'label_block' => true,
			]
		);

        $this->add_control(
			'team_desc',
			[
				'label' => esc_html__( 'Description', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Web Developer', 'techex-hp' ),
			]
		);

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'team_social_icon',
			[
				'label' => __( 'Icons', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'solid',
				]
			]
		);

		$repeater->add_control(
			'social_link',
			[
				'label' => esc_html__( 'Icon Link', 'techex-hp' ),
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
			'team_icons',
			[
				'label' => __( 'Team Icon List', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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
			'height',
			[
				'label' => esc_html__( 'Team Image Height', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 600,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 310,
				],
				'selectors' => [
					'{{WRAPPER}} .single_team_widget .team_img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Title Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0E1871',
				'selectors' => [
					'{{WRAPPER}} .single_team_widget .content h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => esc_html__( 'Title Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single_team_widget .content h4',
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
                    '{{WRAPPER}} .single_team_widget .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .single_team_widget .content p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Description Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single_team_widget .content p',
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
                    '{{WRAPPER}} .single_team_widget .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
			'Icons_style',
			[
				'label' => __( 'Icons Style', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icons Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .single_team_widget .team_img .icons ul li a i' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Font Size', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 17,
				],
				'selectors' => [
					'{{WRAPPER}} .single_team_widget .team_img .icons ul li a i' => 'font-size: {{SIZE}}{{UNIT}};',
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

        <div class="single_team_widget">
            <div class="team_img bg-center" style="background-image: url(<?php echo $settings['team_img']['url']; ?>);">
                <div class="icons">
                    <ul>
                        <?php
                            $count =1;
                                foreach (  $settings['team_icons'] as $item ) {
                            ?>
                            <li><a href="<?php echo $item['social_link']['url']; ?>">
                            <?php \Elementor\Icons_Manager::render_icon($item["team_social_icon"]);  ?>
                        </a></li>

                        <?php $count++; }?>
                    </ul>
                </div>
            </div>
            <div class="content text-center">
                <h4><?php echo esc_html($settings['team_title']); ?></h4>
                <p><?php echo esc_html($settings['team_desc']); ?></p>
            </div>
            
        </div>

<?php  }

}
$widgets_manager->register_widget_type(new \Techex_Team_membor());