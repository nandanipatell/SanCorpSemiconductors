<?php
namespace Finest_Addons\Widgets;

if ( !defined( 'ABSPATH' ) ) {
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
class Portfolio_Gallery extends \Elementor\Widget_Base {
    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rr-addons-portfolio-gallery';
    }

    public function get_script_depends() {
        return ['isotope', 'rr-addons-addon'];
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
    public function get_title() {
        return __( 'Portfolio Gallery', 'rr-addons' );
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
    public function get_icon() {
        return 'eicon-gallery-grid';
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
    public function get_categories() {
        return ['rr-addons'];
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
    protected function register_controls() {
        $this->start_controls_section(
            'section_gallery',
            [
                'label' => __( 'Gallery', 'rr-addons' ),
            ]
        );

        $this->add_control(
            'enable_lightbox',
            [
                'label'        => __( 'Enable Popup?', 'rr-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'rr-addons' ),
                'label_off'    => __( 'No', 'rr-addons' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $this->add_control(
            'layout_type',
            [
                'label'   => __( 'Layout type', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'masonry' => 'Masonry',
                    'normal'  => 'Normal',
                ),
                'default' => 'masonry',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label'   => __( 'Choose Image', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'image_size',
            [
                'label'       => __( 'Image Dimension', 'rr-addons' ),
                'type'        => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
                'description' => __( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'rr-addons' ),
                'default'     => [
                    'width'  => '',
                    'height' => '',
                ],
            ]
        );

        $repeater->add_control(
            'image_title',
            [
                'label'       => __( 'Title', 'plugin-domain' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Type your title here', 'plugin-domain' ),
            ]
        );

        $this->add_control(
            'gallery_list',
            [
                'label'       => __( 'Repeater List', 'rr-addons' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ image_title }}}',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_width_nd_height',
            [
                'label' => __( 'Width & Height', 'rr-addons' ),
            ]
        );

        $this->add_responsive_control(
            'post_grid',
            [
                'label'   => __( 'Post grid', 'rr-addons' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    '12' => '1 Column',
                    '6'  => '2 Column',
                    '4'  => '3 Column',
                    '3'  => '4 Column',
                ),
                'default' => 3,
            ]
        );

        $this->add_responsive_control(
            'column_verti_gap',
            [
                'label'           => __( 'Column Vertical Gap', 'rr-addons' ),
                'type'            => \Elementor\Controls_Manager::SLIDER,
                'devices'         => ['desktop', 'tablet', 'mobile'],
                'size_units'      => ['px', '%'],
                'range'           => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'desktop_default' => [
                    'size' => 15,
                    'unit' => 'px',
                ],
                'selectors'       => [
                    '{{WRAPPER}}  .rr-addons-portfolio-item-wrap' => 'padding: 0 {{SIZE}}{{UNIT}} 0;',
                ],
            ]
        );
        $this->add_responsive_control(
            'column_hori_gap',
            [
                'label'           => __( 'Column Horizontal Gap', 'rr-addons' ),
                'type'            => \Elementor\Controls_Manager::SLIDER,
                'devices'         => ['desktop', 'tablet', 'mobile'],
                'size_units'      => ['px', '%'],
                'range'           => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'desktop_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'selectors'       => [
                    '{{WRAPPER}}  .rr-addons-portfolio-item-wrap' => 'padding-bottom: {{SIZE}}{{UNIT}} ;',
                ],
            ]
        );
        $this->add_control(
            'use_custom_height',
            [
                'label'        => __( 'Use custom height?', 'rr-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'rr-addons' ),
                'label_off'    => __( 'No', 'rr-addons' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_responsive_control(
            'normal_image_height',
            [
                'label'      => __( 'Normal Image Height', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'devices'    => ['desktop', 'tablet', 'mobile'],
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}}  .rr-addons-portfolio-item-wrap .rr-addons-portfolio-item img' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition'  => [
                    'use_custom_height' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_image',
            [
                'label' => __( 'Imatge', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'image_hover_tabs'
        );
        $this->start_controls_tab(
            'image_normal_tab',
            [
                'label' => __( 'Normal', 'rr-addons' ),
            ]
        );
        $this->add_responsive_control(
            'image_radius',
            [
                'label'      => __( 'Image Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    ' {{WRAPPER}} .rr-addons-portfolio-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'image_shadow',
                'label'    => __( 'Button Shadow', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-portfolio-item img',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => __( 'Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-portfolio-item img',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'image_hover_tab',
            [
                'label' => __( 'Hover', 'rr-addons' ),
            ]
        );
        $this->add_responsive_control(
            'image_hover_radius',
            [
                'label'      => __( 'Box Image Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    ' {{WRAPPER}} .rr-addons-portfolio-item:hover img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'image_hover_shadow',
                'label'    => __( 'Button Shadow', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-portfolio-item:hover img',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_hover_border',
                'label'    => __( 'Border', 'rr-addons' ),
                'selector' => '{{WRAPPER}} .rr-addons-portfolio-item:hover img',
            ]
        );
        $this->add_control(
            'enable_hover_rotate',
            [
                'label'        => __( 'Rotate animation on hover?', 'rr-addons' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'rr-addons' ),
                'label_off'    => __( 'No', 'rr-addons' ),
                'return_value' => 'rr-addons-hover-rotate',
                'default'      => 'no',
            ]
        );

        $this->add_control(
            'image_hover_animation',
            [
                'label'     => __( 'Hover Animation', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::HOVER_ANIMATION,
                // 'prefix_class' => 'elementor-animation-',
                'condition' => [
                    'enable_hover_rotate!' => 'rr-addons-hover-rotate',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Title', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'title_style_tabs'
        );
        $this->start_controls_tab(
            'title_style_normal_tab',
            [
                'label' => __( 'Normal', 'rr-addons' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label'    => __( 'Title Typography', 'rr-addons' ),
                'name'     => 'title_typo',
                'selector' => '{{WRAPPER}} .rr-addons-portfolio-title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-portfolio-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_align',
            [
                'label'     => __( 'Align', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'     => [
                        'flex-start' => __( 'Left', 'rr-addons' ),
                        'icon'       => 'fa fa-align-left',
                    ],
                    'center'   => [
                        'title' => __( 'top', 'rr-addons' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-portfolio-content h3' => 'justify-content: {{VALUE}};',
                ],
                'toggle'    => true,
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'title_style_hover_tab',
            [
                'label' => __( 'Hover', 'rr-addons' ),
            ]
        );
        $this->add_control(
            'title_color_hover',
            [
                'label'     => __( 'Title Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-portfolio-title:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_content_style',
            [
                'label' => __( 'Content Box', 'rr-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_bg_color',
            [
                'label'     => __( 'Content Background Color', 'rr-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-portfolio-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_gap',
            [
                'label'      => __( 'Content gap', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 400,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}}  .rr-addons-portfolio-content.content-postion-on-image' => 'left:{{SIZE}}{{UNIT}};right:{{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'content_y_position',
            [
                'label'      => __( 'Content Y Position', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}}  .rr-addons-portfolio-content.content-postion-on-image' => 'bottom:{{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label'      => __( 'Content Padding', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-portfolio-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_radius',
            [
                'label'      => __( 'Content Box Radius', 'rr-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-portfolio-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        $portfolio_data = [];
        $portfolio_data['settings'] = $this->get_settings();
        $portfolio_data = json_encode( $portfolio_data );
        $post_grid_desktop = $settings['post_grid'];
        $post_grid_tablet = $settings['post_grid_tablet'];
        $post_grid_mobile = $settings['post_grid_mobile'];
        $grid = sprintf( 'col-lg-%s col-md-%s col-%s', esc_attr( $post_grid_desktop ), esc_attr( $post_grid_tablet ), esc_attr( $post_grid_mobile ) );

        ?>
            <div class="container-fluid">
                <div class="row justify-content-center rr-addons-pf-gallery-wrap layout-mode-<?php echo esc_attr( $settings['layout_type'] . ' ' . $settings['enable_hover_rotate'] ) ?>">
                  <?php
$i = 0;
        foreach ( $settings['gallery_list'] as $item ):
            $i++;
            $unique_id = rand( 100, 10000 );
            $image_size = ( $item['image_size']['width'] || $item['image_size']['height'] ) ? [$item['image_size']['width'], $item['image_size']['height']] : 'full';
            $this->add_render_attribute( 'rr-addons-gallery-lightbox-' . $i, [
                'data-elementor-open-lightbox'      => $settings['enable_lightbox'] == 'yes' ? 'yes' : 'no',
                'data-elementor-lightbox-slideshow' => $unique_id,
            ] );
            ?>
		                    <div class="rr-addons-portfolio-item-wrap <?php echo esc_attr( $grid ) ?>"  >

		                        <div class="rr-addons-portfolio-item" <?php echo $this->get_render_attribute_string( 'rr-addons-gallery-lightbox-' . $i ); ?>>
		                            <a href="<?php echo wp_get_attachment_image_url( $item['image']['id'], 'full' ) ?>" class="rr-addons-portfolio-image d-block <?php echo esc_attr( 'elementor-animation-' . $settings['image_hover_animation'] ) ?>">
		                                <?php echo wp_get_attachment_image( $item['image']['id'], $image_size ); ?>
		                            </a>
		                            <?php if ( !empty( $item['image_title'] ) ): ?>
		                            <a href="<?php echo wp_get_attachment_image_url( $item['image']['id'], 'full' ) ?>" class="rr-addons-portfolio-content content-postion-on-image">
		                                <h3 class="rr-addons-portfolio-title">
		                                    <?php echo esc_html( $item['image_title'] ) ?>
		                                </h3>
		                            </a>
		                            <?php endif;?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>

  <?php
}
}

$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Portfolio_Gallery() );