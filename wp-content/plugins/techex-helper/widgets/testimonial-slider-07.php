<?php
namespace RRdevs_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager;
use \Elementor\Control_Media;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Widget_Base;

class testimonial_sliders_seven extends Widget_Base {

	public function get_name() {
		return 'techex-testimonial-slider-three';
	}

	public function get_title() {
		return esc_html__( 'Testimonial Slider Three', 'techex-hp' );
	}

	public function get_icon() {
		return 'eicon-image-rollover';
	}

	public function get_categories() {
		return [ 'techex-hp' ];
	}

	public function get_keywords() {
		return [ 'rrdevs', 'Testimonial Slider Three', 'Testimonial Slider' ];
	}

	protected function register_controls() {
	
		$this->start_controls_section(
			'testimonial_section',
			[
				'label' => __( 'Testimonial Slider', 'techex-hp' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'show_slider_settings',
            [
                'label' => __('Slider Active', 'techex-hp'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'user_re_title',
			[
				'label' => __( 'User Review Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'I m totally blown away', 'techex-hp' ),
			]
		);

		$repeater->add_control(
			'user_review',
			[
				'label' => __( 'User Review', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 'techex-hp' ),
			]
		);

		$repeater->add_control(
			'user_image',
			[
				'label' => __( 'User Image', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'placeholder' => __( 'User Image', 'techex-hp' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$repeater->add_control(
			'user_name',
			[
				'label' => __( 'User Name', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Tanvir Hossain', 'techex-hp' ),
			]
		);

		$repeater->add_control(
			'user_degination',
			[
				'label' => __( 'User Degination', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Company - CEO', 'techex-hp' ),
			]
		);

		$repeater->add_control(
			'star_icon',
			[
				'label' => __( 'Star Icon', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-star',
					'library' => 'solid',
				]
			]
		);

		$repeater->add_control(
			'shape_image',
			[
				'label' => __( 'Shape Image', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'placeholder' => __( 'Shape Image', 'techex-hp' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'testimonial-slider',
			[
				'label' => __( 'Testimonial Slider', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

		// style tabs area

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'User Image', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'user_image',
				'selector' => '{{WRAPPER}} .testimonial_widget .testimonial_items .author_img img',
			]
		);

		$this->add_control(
			'user_image_B',
			[
				'label' => esc_html__( 'Border Radius', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial_widget .testimonial_items .author_img img' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'text_style',
			[
				'label' => esc_html__( 'Text Style', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'user_name',
				'label' => esc_html__( 'User Name', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .testimonial_widget .testimonial_items h5',
			]
		);

		$this->add_control(
            'user_name_color',
            [
                'label'     => __( 'User Name Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_widget .testimonial_items h5' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'user_degination',
				'label' => esc_html__( 'User Degination', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .testimonial_widget .testimonial_items small',
			]
		);

		$this->add_control(
            'user_degination_color',
            [
                'label'     => __( 'User Degination Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_widget .testimonial_items small' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'user_review',
				'label' => esc_html__( 'User Review', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .testimonial_widget .testimonial_items p',
			]
		);

		$this->add_control(
            'user_review_color',
            [
                'label'     => __( 'User Review Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_widget .testimonial_items p' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'user_review_title',
				'label' => esc_html__( 'User Review Title', 'rr-addons' ),
				'selector' => '{{WRAPPER}} .testimonial_widget .testimonial_items h4',
			]
		);

		$this->add_control(
            'user_review_title',
            [
                'label'     => __( 'User Review Title', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_widget .testimonial_items h4' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'testimonial_box',
			[
				'label' => esc_html__( 'Testimonial Box', 'rr-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'testimonial_box_color',
			[
				'label' => esc_html__( 'Testimonial Box BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .testimonial_widget .testimonial_items' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'testimonial_box_border',
				'selector' => '{{WRAPPER}} .testimonial_widget .testimonial_items',
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Testimonial Box Padding', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial_widget .testimonial_items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();

		// Slider Option
        $this->start_controls_section('slider_settings',
        [
        'label' => __('Slider Settings', 'techex-hp'),
        'tab'   => Controls_Manager::TAB_CONTENT,
        'condition' => [
            'show_slider_settings' => 'yes',
        ]
        ]
    );

        $this->add_control(
            'arrows',
            [
                'label' => __( 'Show arrows?', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label' => __( 'Show Dots?', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'mousedrag',
            [
                'label' => __( 'MouseDrag?', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Auto Play?', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => __( 'Infinite Loop', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'techex-hp' ),
                'label_off' => __( 'Hide', 'techex-hp' ),
                'return_value' => 'yes',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'autoplaytimeout',
            [
                'label' => __( 'Autoplay Timeout', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '5000',
                'options' => [
                    '1000'  => __( '1 Second', 'techex-hp' ),
                    '2000'  => __( '2 Second', 'techex-hp' ),
                    '3000'  => __( '3 Second', 'techex-hp' ),
                    '4000'  => __( '4 Second', 'techex-hp' ),
                    '5000'  => __( '5 Second', 'techex-hp' ),
                    '6000'  => __( '6 Second', 'techex-hp' ),
                    '7000'  => __( '7 Second', 'techex-hp' ),
                    '8000'  => __( '8 Second', 'techex-hp' ),
                    '9000'  => __( '9 Second', 'techex-hp' ),
                    '10000' => __( '10 Second', 'techex-hp' ),
                    '11000' => __( '11 Second', 'techex-hp' ),
                    '12000' => __( '12 Second', 'techex-hp' ),
                    '13000' => __( '13 Second', 'techex-hp' ),
                    '14000' => __( '14 Second', 'techex-hp' ),
                    '15000' => __( '15 Second', 'techex-hp' ),
                ],
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();



        // Slider Option
		
	}


	
	protected function render() {
		$settings = $this->get_settings_for_display();

		// Slider Option
		$slider_extraSetting = array(
	        'loop' => (!empty($settings['loop']) && 'yes' === $settings['loop']) ? true : false,
	        'autoplay' => (!empty($settings['autoplay']) && 'yes' === $settings['autoplay']) ? true : false,
        	'nav' => (!empty($settings['arrows']) && 'yes' === $settings['arrows']) ? true : false,
        	'dots' => (!empty($settings['dots']) && 'yes' === $settings['dots']) ? true : false,
        	'mousedrag' => (!empty($settings['mousedrag']) && 'yes' === $settings['mousedrag']) ? true : false,
        	'autoplaytimeout' => !empty($settings['autoplaytimeout']) ? $settings['autoplaytimeout'] : '5000',
        );

        $jasondecode = wp_json_encode($slider_extraSetting);


        if ( ( 'yes' == $settings['show_slider_settings'] ) ) {
            $this->add_render_attribute('slider_active', 'class', array('testimonial_widget', 'owl-carousel' ));
            $this->add_render_attribute('slider_active', 'data-settings', $jasondecode);
        }
		
		if( $settings['testimonial-slider'] ){
			?>
			
			<div <?php echo $this->get_render_attribute_string('slider_active'); ?>>
				<?php
					$count =1;
						foreach (  $settings['testimonial-slider'] as $item ) {
					?>
						<div class="testimonial_items">
							<h4><?php echo esc_html($item['user_re_title']); ?></h4>
							<p><?php echo esc_html($item['user_review']); ?></p>
							<div class=" d-flex justify-content-between align-items-center">
								<div class="author">
									<div class="author_img">
										<img src="<?php echo $item['user_image']['url']; ?>" alt="">
									</div>
									<div class="author_content">
										<h5><?php echo esc_html($item['user_name']); ?></h5>
										<small><?php echo esc_html($item['user_degination']); ?></small>
									</div>
								</div>
								<div class="review">
									<?php \Elementor\Icons_Manager::render_icon($item["star_icon"]);  ?>
								</div>
							</div>
							<div class="shape_element">
								<img src="<?php echo $item['shape_image']['url']; ?>" alt="">
							</div>
						</div>

					<?php $count++; }?>
			</div>
	<?php }
			// end Repeater check 
		}

	// public function content_template() {

	// }


}

$widgets_manager->register_widget_type( new \RRdevs_Addons\Widgets\testimonial_sliders_seven() );


