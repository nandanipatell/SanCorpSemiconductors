<?php
namespace RRdevs_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager;
use \Elementor\Control_Media;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Widget_Base;

class project_slider extends Widget_Base {

	public function get_name() {
		return 'techex-hp-project-slider';
	}

	public function get_title() {
		return esc_html__( 'RR Project Slider', 'techex-hp' );
	}

	public function get_icon() {
		return 'eicon-document-file';
	}

	public function get_categories() {
		return [ 'techex-hp' ];
	}

	public function get_keywords() {
		return [ 'rrdevs', 'Project Slider', 'Project' ];
	}

	protected function register_controls() {
	
		$this->start_controls_section(
			'project_section',
			[
				'label' => __( 'Project Slider', 'techex-hp' ),
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
			'project_slider_image',
			[
				'label' => __( 'Project Slider Image', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'placeholder' => __( 'Slider Image here', 'techex-hp' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$repeater->add_control(
			'project_slider_icon',
			[
				'label' => __( 'Project Icon', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'solid',
				]
			]
		);

		$repeater->add_control(
			'project_link',
			[
				'label' => __( 'Project Icon Link', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'Link Here', 'techex-hp' ),
			]
		);

		$repeater->add_control(
			'heading',
			[
				'label' => __( 'Project Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Title Here', 'techex-hp' ),
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => __( 'Project Description', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description Text', 'techex-hp' ),
			]
		);

		$this->add_control(
			'project-slider',
			[
				'label' => __( 'Project Slider', 'techex-hp' ),
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
				'label' => esc_html__( 'Slider Image Size', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 445,
				],
				'selectors' => [
					'{{WRAPPER}} .project__items .project__image' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'techex-hp' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box i' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
            'border_color',
            [
                'label'     => __( 'Icon Border Color', 'techex-hp' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box a' => 'border-color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => esc_html__( 'Heading Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Description Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => esc_html__( 'Description Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->add_control(
			'project_item_color',
			[
				'label' => esc_html__( 'Project Box BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .project__items .project__image .box' => 'background: {{VALUE}}',
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
            $this->add_render_attribute('slider_active', 'class', array('project-carousel-card-active', 'owl-carousel' ));
            $this->add_render_attribute('slider_active', 'data-settings', $jasondecode);
        }
		
		if( $settings['project-slider'] ){
			?>
		
			<div <?php echo $this->get_render_attribute_string('slider_active'); ?>>
				<?php
					$count =1;
						foreach (  $settings['project-slider'] as $item ) {
					?>
				
					<div class="project__items">
						<div class="project__image bg-cover bg-center" style="background-image: url(<?php echo $item['project_slider_image']['url'] ?>);">
							<div class="box">
								<a <?php printf('href="%s" %s %s', $item['project_link']['url'], $nofollow, $target); ?>><?php \Elementor\Icons_Manager::render_icon($item["project_slider_icon"]);  ?></a>
							</div>
						</div>
						<div class="project__content">
							<?php if($item['heading']){?>
								<h4><?php echo esc_html($item['heading']); ?></h4>
							<?php }?>
							<?php if($item['description']){?>
								<p><?php echo esc_html($item['description']); ?></p>
							<?php }?>
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

$widgets_manager->register_widget_type( new \RRdevs_Addons\Widgets\project_slider() );


