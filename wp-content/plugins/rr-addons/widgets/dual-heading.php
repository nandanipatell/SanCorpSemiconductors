<?php
namespace Finest_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Widget_Base;

class Fd_Addons_Dual_Heading extends Widget_Base {
	
	public function get_name() {
		return 'fdaddons-dual-headding';
	}

	public function get_title() {
		return esc_html__( 'Dual Heading', 'rr-addons' );
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}

	public function get_categories() {
		return [ 'rr-addons' ];
	}

    public function get_keywords() {
        return [ 'rr-addons', 'multi', 'double' ];
    }

    protected function register_controls() {

		/**
		* Dual Heading Content Section
		*/
		$this->start_controls_section(
			'rr_addons_dual_heading_content',
			[
				'label' => esc_html__( 'Content', 'rr-addons' )
			]
        );
        
        $this->add_control(
            'rr_addons_dual_first_heading',
            [
                'label'       => esc_html__( 'Before Heading', 'rr-addons' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Before', 'rr-addons' )
            ]
        );

        $this->add_control(
            'rr_addons_dual_second_heading',
            [
                'label'       => esc_html__( 'Middle Heading', 'rr-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Middle', 'rr-addons' )
            ]
        );


        
        $this->add_control(
            'rr_addons_after_headding_show',
            [
                'label'        => esc_html__( 'Enable After Heading', 'rr-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'rr_addons_dual_thard_heading',
            [
                'label'       => esc_html__( 'After Heading', 'rr-addons' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'After', 'rr-addons' ),
                'condition' => [
                    'rr_addons_after_headding_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'rr_addons_dual_heading_title_link',
            [
                'label'       => __( 'Heading URL', 'rr-addons' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'rr-addons' ),
                'label_block' => true
            ]
        );
        $this->add_control(
            'rr_addons_sub_headding_show',
            [
                'label'        => esc_html__( 'Enable Sub Heading', 'rr-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'rr_addons_dual_heading_description',
            [
                'label'       => __( 'Sub Heading', 'rr-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'dynamic'     => [ 'active' => true ],
                'condition' => [
                    'rr_addons_sub_headding_show' => 'yes',
                ],
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'rr-addons' )
            ]
        );

        $this->add_control(
            'rr_addons_dual_heading_icon_show',
            [
                'label'        => esc_html__( 'Enable Icon', 'rr-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'rr_addons_dual_heading_icon',
            [
                'label'   => __( 'Icon', 'rr-addons' ),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fab fa-wordpress-simple',
                    'library' => 'fa-brands'
                ],
                'condition' => [
                    'rr_addons_dual_heading_icon_show' => 'yes'
                ]
            ]
        );

        
        $this->end_controls_section();
            
        /*
        * Dual Heading Styling Section
        */
        $this->start_controls_section(
            'rr_addons_dual_heading_styles_general',
            [
                'label' => esc_html__( 'General Styles', 'rr-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_heading_alignment',
            [
                'label'       => esc_html__( 'Alignment', 'rr-addons' ),
                'type'        => Controls_Manager::CHOOSE,
                'toggle'      => false,
                'label_block' => true,
                'options'     => [
                    'left'      => [
                        'title' => esc_html__( 'Left', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-left'
                    ],
                    'center'    => [
                        'title' => esc_html__( 'Center', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-center'
                    ],
                    'right'     => [
                        'title' => esc_html__( 'Right', 'rr-addons' ),
                        'icon'  => 'eicon-text-align-right'
                    ]
                ],
                'default'       => 'center',
                'label_block'   => true,
                'selectors'     => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'rr_addons_dual_heading_icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#132C47',
                'condition' => [
                    'rr_addons_dual_heading_icon_show'    => 'yes',
                    'rr_addons_dual_heading_icon[value]!' => ''
                ],
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-icon i' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_heading_icon_size',
            [
                'label'        => __( 'Icon Size', 'rr-addons' ),
                'type'         => Controls_Manager::SLIDER,
                'range'        => [
                    'px'       => [
                        'min'  => 10,
                        'max'  => 150,
                        'step' => 2
                    ]
                ],
                'default'      => [
                    'unit'     => 'px',
                    'size'     => 36
                ],
                'selectors'    => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-icon i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
                'condition'    => [
                    'rr_addons_dual_heading_icon_show'    => 'yes',
                    'rr_addons_dual_heading_icon[value]!' => ''
                ]
            ]
        );        

        $this->add_responsive_control(
            'rr_addons_dual_heading_icon_margin',
            [
                'label'      => __('Icon Margin', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default'    => [
                    'top'    => '0',
                    'right'  => '0',
                    'bottom' => '15',
                    'left'   => '0'
                ],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition' => [
                    'rr_addons_dual_heading_icon_show'    => 'yes',
                    'rr_addons_dual_heading_icon[value]!' => ''
                ]
            ]
        );

        $this->end_controls_section();

        /*
            * Dual Heading First Part Styling Section
            */
        $this->start_controls_section(
            'rr_addons_dual_first_heading_styles',
            [
                'label' => esc_html__( 'Before Heading', 'rr-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'rr_addons_dual_heading_first_text_color',
            [
                'label'     => esc_html__( 'Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FF6C4B',
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .first-heading, {{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title a .first-heading' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'            => 'rr_addons_dual_heading_first_bg_color',
                'types'           => [ 'classic', 'gradient' ],
                'default'         => '#222222',
                'selector'        => '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .first-heading, {{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title a .first-heading',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'name'     => 'rr_addons_dual_first_heading_typography',
                'selector' => '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .first-heading'
			]
        );

        $this->add_responsive_control(
            'rr_addons_dual_first_heading_margin',
            [
                'label'      => __('Margin', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .first-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_first_heading_padding',
            [
                'label'      => __('Padding', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .first-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_first_heading_radius',
            [
                'label'      => __('Border radius', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .first-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'rr_addons_dual_first_heading_border',
                'selector' => '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .first-heading'
            ]
        );

        $this->end_controls_section();


        /*
		* Dual Heading Thard Part Styling Section
		*/
        $this->start_controls_section(
                'rr_addons_dual_second_heading_styles',
                [
                    'label' => esc_html__( 'Middle Heading', 'rr-addons' ),
                    'tab'   => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'rr_addons_dual_heading_second_text_color',
                [
                    'label'     => esc_html__( 'Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#132C47',
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .second-heading,  {{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .second-heading a ' => 'color: {{VALUE}};'
                    ]
                ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'rr_addons_dual_heading_second_bg_color',
                'types'    => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .second-heading,  {{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .second-heading a '
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'rr_addons_dual_second_heading_typography',
                'selector' => '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .second-heading '
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_second_heading_margin',
            [
                'label'      => __('Margin', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .second-heading ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_second_heading_padding',
            [
                'label'      => __('Padding', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .second-heading ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_second_heading_radius',
            [
                'label'      => __('Border radius', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .second-heading ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'rr_addons_dual_second_heading_border',
                'selector' => '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .second-heading '
            ]
        );

        $this->end_controls_section();


        /*
		* Dual Heading Thard Part Styling Section
		*/
        $this->start_controls_section(
            'rr_addons_dual_thard_heading_styles',
            [
                'label' => esc_html__( 'After Heading', 'rr-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'rr_addons_after_headding_show' => 'yes',
                ],
            ]
         );

        $this->add_control(
                'rr_addons_dual_heading_thard_text_color',
                [
                    'label'     => esc_html__( 'Color', 'rr-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#132C47',
                    'selectors' => [
                        '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .thard-heading,  {{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .thard-heading a ' => 'color: {{VALUE}};'
                    ]
                ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'rr_addons_dual_heading_thard_bg_color',
                'types'    => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .thard-heading,  {{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .thard-heading a '
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'rr_addons_dual_thard_heading_typography',
                'selector' => '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .thard-heading '
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_thard_heading_margin',
            [
                'label'      => __('Margin', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .thard-heading ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_thard_heading_padding',
            [
                'label'      => __('Padding', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .thard-heading ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_thard_heading_radius',
            [
                'label'      => __('Border radius', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .thard-heading ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'rr_addons_dual_thard_heading_border',
                'selector' => '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper .rr-addons-dual-heading-title .thard-heading '
            ]
        );

        $this->end_controls_section();

        /*
            * Dual Heading description Styling Section
        */
        $this->start_controls_section(
            'rr_addons_dual_heading_description_styles',
            [
                'label' => esc_html__( 'Sub Heading', 'rr-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );


        $this->add_control(
            'rr_addons_dual_heading_description_text_color',
            [
                'label'     => esc_html__( 'Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#989B9E',
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper p.rr-addons-dual-heading-description' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'            => 'rr_addons_dual_heading_description_typography',
                'fields_options'  => [
                    'font_weight' => [
                        'default' => '400'
                    ]
                ],
                'selector'        => '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper p.rr-addons-dual-heading-description'
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_heading_description_margin',
            [
                'label'      => __('Margin', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper p.rr-addons-dual-heading-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'rr_addons_dual_heading_description_padding',
            [
                'label'      => __('Padding', 'rr-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-dual-heading .rr-addons-dual-heading-wrapper p.rr-addons-dual-heading-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
  
    protected function render() {
        $settings          = $this->get_settings_for_display();

        $this->add_render_attribute( 'rr_addons_dual_first_heading', 'class', 'first-heading' );
        $this->add_inline_editing_attributes( 'rr_addons_dual_first_heading', 'none' );

        $this->add_render_attribute( 'rr_addons_dual_second_heading', 'class', 'second-heading' );
        $this->add_inline_editing_attributes( 'rr_addons_dual_second_heading', 'none' );

        $this->add_render_attribute( 'rr_addons_dual_thard_heading', 'class', 'thard-heading' );
        $this->add_inline_editing_attributes( 'rr_addons_dual_thard_heading', 'none' );

        $this->add_render_attribute( 'rr_addons_dual_heading_description', 'class', 'rr-addons-dual-heading-description' );
        $this->add_inline_editing_attributes( 'rr_addons_dual_heading_description' );

        if( $settings['rr_addons_dual_heading_title_link']['url'] ) {
            $this->add_render_attribute( 'rr_addons_dual_heading_title_link', 'href', esc_url( $settings['rr_addons_dual_heading_title_link']['url'] ) );
            if( $settings['rr_addons_dual_heading_title_link']['is_external'] ) {
                $this->add_render_attribute( 'rr_addons_dual_heading_title_link', 'target', '_blank' );
            }
            if( $settings['rr_addons_dual_heading_title_link']['nofollow'] ) {
                $this->add_render_attribute( 'rr_addons_dual_heading_title_link', 'rel', 'nofollow' );
            }
        }

        echo '<div class="rr-addons-dual-heading">';
            echo '<div class="rr-addons-dual-heading-wrapper">';

                if ( 'yes' === $settings['rr_addons_dual_heading_icon_show'] && !empty( $settings['rr_addons_dual_heading_icon']['value'] ) ) :
                    echo '<span class="rr-addons-dual-heading-icon">';
                        Icons_Manager::render_icon( $settings['rr_addons_dual_heading_icon'] );
                    echo '</span>';
                endif;

                echo '<h1 class="rr-addons-dual-heading-title">';
                    if( !empty( $settings['rr_addons_dual_heading_title_link']['url'] ) ) :
                        echo '<a '.$this->get_render_attribute_string( 'rr_addons_dual_heading_title_link' ).'>';
                    endif;
                    echo '<span '.$this->get_render_attribute_string( 'rr_addons_dual_first_heading' ).'>'.$settings['rr_addons_dual_first_heading'].'</span>';
                    echo '<span '.$this->get_render_attribute_string( 'rr_addons_dual_second_heading' ).'>'.$settings['rr_addons_dual_second_heading'].'</span>';
                    echo '<span '.$this->get_render_attribute_string( 'rr_addons_dual_thard_heading' ).'>'.$settings['rr_addons_dual_thard_heading'].'</span>';
                    if( !empty( $settings['rr_addons_dual_heading_title_link']['url'] ) ) {
                        echo '</a>';
                    }
                echo '</h1>';

                if ( !empty($settings['rr_addons_dual_heading_description'] ) ) :
                    echo '<p '.$this->get_render_attribute_string( 'rr_addons_dual_heading_description' ).'>'.wp_kses_post( $settings['rr_addons_dual_heading_description'] ).'</p>';
                endif;  

            echo '</div>';
        echo '</div>';
    }
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Fd_Addons_Dual_Heading() );