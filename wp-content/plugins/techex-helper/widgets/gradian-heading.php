<?php


class Gradient_Heading extends \Elementor\Widget_Base {

    public function get_title() {
		return esc_html__( 'Gradient Text', 'techex-hp' );
	}

    public function get_icon() {
		return 'eicon-t-letter';
	}

    public function get_categories()
    {
        return ['techex-addons'];
    }
    public function get_name() {
		return 'gradient-heading';
	}

    protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'techex-hp' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'fast_title',
			[
				'label' => esc_html__( 'Before Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Tofan Developer', 'techex-hp' ),
				'default' => esc_html__( 'Fast', 'techex-hp' ),
                'label_block' => true,
			
			]
		);

        $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Middle Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Tofan Developer', 'techex-hp' ),
				'default' => esc_html__( 'Gradient', 'techex-hp' ),
                'label_block' => true,
			
			]
		);

        $this->add_control(
			'last_title',
			[
				'label' => esc_html__( 'After Title', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Tofan Developer', 'techex-hp' ),
				'default' => esc_html__( 'Text', 'techex-hp' ),
                'label_block' => true,
			
			]
		);

        $this->add_control(
			'alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'techex-hp' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'techex-hp' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'techex-hp' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'techex-hp' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .section__title_4' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
      
        // Style Tab Start

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'techex-hp' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'm_title',
			[
				'label' => __( 'After Before Title Style', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section__title_4 h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .section__title_4 h2',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_control(
			'gradients_title',
			[
				'label' => __( 'Gradient Title Style', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => ['gradient'],
				'default' => '#f00',
				'selector' => '{{WRAPPER}} .gradient-text',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .gradient-text',
			]
		);

		$this->end_controls_section();

	}

    protected function render() {
		$settings = $this->get_settings_for_display();
	
	?>

        <div class="section__title_4">
            <h2><?php echo esc_html($settings['fast_title']); ?><span class="gradient-text"><?php echo esc_html($settings['title']); ?></span><?php echo esc_html($settings['last_title']); ?></h2>
        </div>
        
	<?php
    
	}

	
}
$widgets_manager->register_widget_type(new \Gradient_Heading());