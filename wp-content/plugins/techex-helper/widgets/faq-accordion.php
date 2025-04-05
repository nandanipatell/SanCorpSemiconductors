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
class Techex_faq_accordion extends \Elementor\Widget_Base
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
        return 'techex-faq-accordion';
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
        return __('FAQ Accordion', 'techex-hp');
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
        return 'eicon-accordion';
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

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'card-header',
			[
				'label' => __( 'Card Header', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Card Header Text', 'techex-hp' ),
			]
		);

		$repeater->add_control(
			'card-body',
			[
				'label' => __( 'Card Body', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Card body Text', 'techex-hp' ),
			]
		);

		$this->add_control(
			'faq_accordion',
			[
				'label' => __( 'FAQ Accordion', 'techex-hp' ),
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
			'heading_color',
			[
				'label' => esc_html__( 'Title Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .accordion.accordion_2 .card-header a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_bg_color',
			[
				'label' => esc_html__( 'Title BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion.accordion_2 .card-header' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => esc_html__( 'Title Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .accordion.accordion_2 .card-header a',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => __('Title Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion.accordion_2 .card-header a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selectors' => [
					'{{WRAPPER}} .accordion .card-body' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'desc_bg_color',
			[
				'label' => esc_html__( 'Description BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion .card-body' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Description Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .accordion .card-body',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_responsive_control(
            'desc_padding',
            [
                'label'      => __('Description Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion .card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        <div class="faq-accordion">
            <div id="accordion" class="accordion accordion_2">
            <?php
                $count =1;
                    foreach (  $settings['faq_accordion'] as $item ) {
                ?>
                <div class="card">
                    <div class="card-header" id="faq<?php echo $count; ?>">
                        <p class="mb-0 text-capitalize">
                            <a class="collapsed" role="button" data-toggle="collapse" aria-expanded="<?php if($count == 1) {echo 'true';} ?>" href="#faq-<?php echo $count; ?>"><?php echo esc_html($item['card-header']); ?></a>
                        </p>
                    </div>
                    <div id="faq-<?php echo $count; ?>" class="collapse <?php if($count == 1) {echo 'show';} ?>" data-parent="#accordion">
                        <div class="card-body">
                            <?php echo esc_html($item['card-body']); ?>
                        </div>
                    </div>
                </div> <!-- /card -->
                <?php $count++; }?>
            </div>                        
        </div>

<?php  } 


}
$widgets_manager->register_widget_type(new \Techex_faq_accordion());