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
class techex_case_study_loop extends \Elementor\Widget_Base
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
        return 'techex-case-study';
    }

    public function get_script_depends()
    {
        return ['isotope', 'techex-addon'];
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
        return __('Case Study', 'techex-hp');
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
                'label' => __('Layout', 'techex-hp'),
            ]
        );

        $this->add_control(
            'enable_filtering',
            [
                'label' => __('Enable Filtering??', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'all_text',
            [
                'label' => __('Filter first item text', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('All', 'techex-hp'),
                'condition' => [
                    'enable_filtering' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'case_style',
            [
                'label'             => __('Case Study Style', 'techex-hp'),
                'type'              => \Elementor\Controls_Manager::SELECT,
                'default'           => 'style-one',
                'options'           => [
                    'style-one'   =>   __('Style 01',    'techex-hp'),
                    'style-two'   =>   __('Style 02',    'techex-hp'),
                    'style-three' =>   __('Style 03',    'techex-hp'),
                ],
                'separator' => 'after',
            ]
        );


        $this->add_control(
            'layout_type',
            [
                'label' => __('Layout type', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'masonry' => 'Masonry',
                    'normal' => 'Normal',
                    'slider' => 'slider'
                ),
                'default' => 'masonry',
            ]
        );

        $this->add_control(
            'meta_postition',
            [
                'label' => __('Category Position', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'normal' => 'Normal',
                    'category-top' => 'Top',
                ),
                'default' => 'normal',
            ]
        );


        $this->add_control(
            'enable_Pagination',
            [
                'label' => __('Enable Pagination?', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'section_width_nd_height',
            [
                'label' => __('Width & Height', 'techex-hp'),
            ]
        );

        $this->add_control(
            'use_meta_grid',
            [
                'label' => __('Use grid from meta?', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'post_grid',
            [
                'label' => __('Post Column', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'devices' => ['desktop', 'tablet', 'mobile'],
                'options' => array(
                    'col-md-12' => '1 Column',
                    'col-md-6' => '2 Column',
                    'col-md-4' => '3 Column',
                    'col-md-3' => '4 Column',
                ),
                'default' => 'col-md-4',
                'condition' => [
                    'use_meta_grid!' => 'yes'
                ],
            ]
        );
        $this->add_responsive_control(
            'column_verti_gap',
            [
                'label' => __('Column Vertical Gap', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'devices' => ['desktop', 'tablet', 'mobile'],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'desktop_default' => [
                    'size' => 15,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}}  .techex-case-study-item-wrap' => 'padding: 0 {{SIZE}}{{UNIT}} 0;',
                ]
            ]
        );
        $this->add_responsive_control(
            'column_hori_gap',
            [
                'label' => __('Column Horizontal Gap', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'devices' => ['desktop', 'tablet', 'mobile'],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'desktop_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}}  .techex-case-study-item-wrap' => 'padding-bottom: {{SIZE}}{{UNIT}} ;',
                ]
            ]
        );
        $this->add_control(
            'use_custom_height',
            [
                'label' => __('Use custom height?', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_responsive_control(
            'normal_image_height',
            [
                'label' => __('Normal Image Height', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'devices' => ['desktop', 'tablet', 'mobile'],
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .techex-case-study-item-wrap.height-normal .techex-case-study-item img' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'use_custom_height' => 'yes'
                ],
            ]
        );
        $this->add_responsive_control(
            'big_image_height',
            [
                'label' => __('Big Image Height', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'devices' => ['desktop', 'tablet', 'mobile'],
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .techex-case-study-item-wrap.height-big .techex-case-study-item img' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'use_custom_height' => 'yes'
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_query',
            [
                'label' => __('Query', 'techex-hp'),
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts per page', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5,
            ]
        );
        $this->add_control(
            'source',
            [
                'label'         => __('Source', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => [
                    'case-study' => 'Case Study',
                    'manual_selection' => 'Manual Selection',
                    'related' => 'Related',
                    'meta' => 'Meta',
                ],
                'default' =>    'case-study',
            ]
        );

        $this->add_control(
            'manual_selection',
            [
                'label'         => __('Manual Selection', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'description'   => __('Get specific template posts', 'techex-hp'),
                'label_block'   => true,
                'multiple'      => true,
                'options'       => techex_cpt_slug_and_id('case-study'),
                'default' =>    [],
                'condition' => [
                    'source' => 'manual_selection'
                ],
            ]
        );
        $this->start_controls_tabs(
            'include_exclude_tabs'
        );
        $this->start_controls_tab(
            'include_tabs',
            [
                'label' => __('Include', 'techex-hp'),
                'condition' => [
                    'source!' => 'manual_selection'
                ],
            ]
        );
        $this->add_control(
            'include_by',
            [
                'label'         => __('Include by', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => [
                    'tags'  => 'Tags',
                    'category'  => 'Category',
                    'author' => 'Author',
                ],
                'default' =>    [],
                'condition' => [
                    'source!' => 'manual_selection'
                ],
            ]
        );
        $this->add_control(
            'include_categories',
            [
                'label'         => __('Include categories', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'description'   => __('Get templates for specific category(s)', 'techex-hp'),
                'label_block'   => true,
                'multiple'      => true,
                'options'       => techex_cpt_taxonomy_slug_and_name('case-study-category'),
                'default' =>    [],
                'condition' => [
                    'include_by' => 'category',
                    'source!' => 'related'
                ],
            ]
        );
        $this->add_control(
            'include_tags',
            [
                'label'         => __('Include Tags', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'description'   => __('Get templates for specific tag(s)', 'techex-hp'),
                'label_block'   => true,
                'multiple'      => true,
                'options'       => techex_cpt_taxonomy_slug_and_name('case-study-tag'),
                'default' =>    [],
                'condition' => [
                    'include_by' => 'tags',
                    'source!' => 'related'
                ],
            ]
        );
        $this->add_control(
            'include_authors',
            [
                'label'         => __('Include authors', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'description'   => __('Get templates for specific tag(s)', 'techex-hp'),
                'label_block'   => true,
                'multiple'      => true,
                'options'       => techex_cpt_author_slug_and_id('case-study'),
                'default' =>    [],
                'condition' => [
                    'include_by' => 'author',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'exclude_tabs',
            [
                'label' => __('Exclude', 'techex-hp'),
                'condition' => [
                    'source!' => 'manual_selection'
                ],
            ]
        );
        $this->add_control(
            'exclude_by',
            [
                'label'         => __('Exclude by', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => [
                    'tags'  => 'tags',
                    'category'  => 'Category',
                    'author' => 'Author',
                    'current_post' => 'Current Post',
                ],
                'default' =>    [],
                'condition' => [
                    'source!' => 'manual_selection'
                ],
            ]
        );
        $this->add_control(
            'exclude_categories',
            [
                'label'         => __('Exclude categories', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'description'   => __('Get templates for specific category(s)', 'techex-hp'),
                'label_block'   => true,
                'multiple'      => true,
                'options'       => techex_cpt_taxonomy_slug_and_name('case-study-category'),
                'default' =>    [],
                'condition' => [
                    'exclude_by' => 'category',
                    'source!' => 'related'
                ],
            ]
        );
        $this->add_control(
            'exclude_tags',
            [
                'label'         => __('Exclude Tags', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'description'   => __('Get templates for specific tag(s)', 'techex-hp'),
                'label_block'   => true,
                'multiple'      => true,
                'options'       => techex_cpt_taxonomy_slug_and_name('case-study-tag'),
                'default' =>    [],
                'condition' => [
                    'exclude_by' => 'tags',
                    'source!' => 'related'
                ],
            ]
        );
        $this->add_control(
            'exclude_authors',
            [
                'label'         => __('Exclude authors', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'description'   => __('Get templates for specific tag(s)', 'techex-hp'),
                'label_block'   => true,
                'multiple'      => true,
                'options'       => techex_cpt_author_slug_and_id('case-study'),
                'default' =>    [],
                'condition' => [
                    'exclude_by' => 'author',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'orderby',
            [
                'label'         => __('Order By', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => [
                    'date'   => 'Date',
                    'title'    => 'title',
                    'menu_order'    => 'Menu Order',
                    'rand'    => 'Random',
                ],
                'default' =>    'date',
            ]
        );
        $this->add_control(
            'order',
            [
                'label'         => __('Order', 'techex-hp'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => [
                    'ASC'   => 'ASC',
                    'DESC'    => 'DESC',
                ],
                'default' =>    'DESC',
            ]
        );
        $this->end_controls_section();

        // Slider Option
        $this->start_controls_section('slider_settings',
            [
                'label' => __('Slider Settings', 'techex-hp'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'slider',
                ], 

            ]
        );

        $this->add_responsive_control(
            'per_coulmn',
            [
                'label' => __( 'Slider Items', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default'            => 4,
                'tablet_default'     => 2,
                'mobile_default'     => 1,
                'options'            => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ],
                'frontend_available' => true,
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




        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'show_title',
            [
                'label' => __('Show Title?', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_category',
            [
                'label' => __('Show category?', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'show_readmore',
            [
                'label' => __('Show Readmore?', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_subheading',
            [
                'label' => __('Show Sub Heading?', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_date',
            [
                'label' => __('Show Date?', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_excerpt',
            [
                'label' => __('Show Excerpt', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'techex-hp'),
                'label_off' => __('No', 'techex-hp'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_btn',
            [
                'label' => __('Readmore', 'techex-hp'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'show_readmore' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'readmore_text',
            [
                'label'    => __('Readmore text', 'techex-hp'),
                'type'     => \Elementor\Controls_Manager::TEXT,
                'default'  => __('Read More', 'techex-hp'),
                'conditon' => [
                    'show_readmore' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'icon',
            [
                'label'    => __('Icon', 'techex-hp'),
                'type'     => \Elementor\Controls_Manager::ICONS,
                'conditon' => [
                    'show_readmore' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'icon_position',
            [
                'label'    => __('Icon Position', 'techex-hp'),
                'type'     => \Elementor\Controls_Manager::SELECT,
                'default'  => 'after',
                'options'  => [
                    'before' => __('Before', 'techex-hp'),
                    'after'  => __('After', 'techex-hp'),
                ],
                'conditon' => [
                    'show_readmore' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_align',
            [
                'label'        => __('Align', 'techex-hp'),
                'type'         => \Elementor\Controls_Manager::CHOOSE,
                'options'      => [
                    'left'   => [
                        'title' => __('Left', 'techex-hp'),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('top', 'techex-hp'),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __('Right', 'techex-hp'),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'devices'      => ['desktop', 'tablet', 'mobile'],
                'prefix_class' => 'content-align%s-',
                'toggle'       => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_image',
            [
                'label' => __('Image', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'image_hover_tabs'
        );

        $this->start_controls_tab(
            'image_normal_tab',
            [
                'label' => __('Normal', 'techex-hp'),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_shadow',
                'label' => __('Button Shadow', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-case-study-image img',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => __('Border', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-case-study-image img',
            ]
        );

        $this->add_responsive_control(
            'width',
            [
                'label'          => __('Width', 'techex-hp'),
                'type'           => \Elementor\Controls_Manager::SLIDER,
                'size_units'     => ['%', 'px','vw'],
                'range'          => [
                    '%'  => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .techex-case-study-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'space',
            [
                'label'          => __('Max Width', 'techex-hp'),
                'type'           => \Elementor\Controls_Manager::SLIDER,
                'size_units'     => ['px', '%', 'vw'],
                'range'          => [
                    '%'  => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .techex-case-study-image img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'height',
            [
                'label'          => __('Height', 'techex-hp'),
                'type'           => \Elementor\Controls_Manager::SLIDER,
                'size_units'     => ['px', 'vh'],
                'range'          => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .techex-case-study-image img' => 'height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'object-fit',
            [
                'label'     => __('Object Fit', 'techex-hp'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'condition' => [
                    'height[size]!' => '',
                ],
                'options'   => [
                    ''        => __('Default', 'techex-hp'),
                    'fill'    => __('Fill', 'techex-hp'),
                    'cover'   => __('Cover', 'techex-hp'),
                    'contain' => __('Contain', 'techex-hp'),
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-image img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'image_box_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-case-study-image .case-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-case-study-image .case-image img' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_box_padding',
            [
                'label'      => __('Padding', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-case-study-image .case-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-case-study-image .case-image img' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_radius',
            [
                'label' => __('Image Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    ' {{WRAPPER}} a.case-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        // Hover Start
        $this->start_controls_tab(
            'image_hover_tab',
            [
                'label' => __('Hover', 'techex-hp'),
            ]
        );

        $this->add_control(
            'case_hover_style',
            [
                'label'             => __('Image Hover Style', 'techex-hp'),
                'type'              => \Elementor\Controls_Manager::SELECT,
                'default'           => 'hover-default',
                'options'           => [
                    'hover-default' =>   __('Default',    'techex-hp'),
                    'hover-one'     =>   __('Style 01',    'techex-hp'),
                ],
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_hover_shadow',
                'label' => __('Button Shadow', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-case-study-image:hover img',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_hover_border',
                'label' => __('Border', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-case-study-image:hover a.case-image img',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'image_hover_g',
                'label' => __('Hover Overlay', 'techex-hp'),
                'types' => ['classic', 'gradient',],
                'selector' => '{{WRAPPER}} .techex-case-study-image::before',
            ]
        );
        $this->add_responsive_control(
            'image_hover_radius',
            [
                'label' => __('Box Image Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    ' {{WRAPPER}} .techex-case-study-image a.case-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_filter_style',
            [
                'label' => __('Filter', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_filtering' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'filter_align',
            [
                'label' => __('Filter Align', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __('Left', 'techex-hp'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('top', 'techex-hp'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'end' => [
                        'title' => __('Right', 'techex-hp'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'end',
                'selectors' => [
                    '{{WRAPPER}} .case-isotope-nav' => 'justify-content: {{VALUE}};',
                ],
                'toggle' => true,
                'condition' => [
                    'enable_filtering' => 'yes'
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => __('Filter Typography', 'techex-hp'),
                'name' => 'filter_typo',
                'selector' => '{{WRAPPER}} .case-isotope-nav li',
            ]
        );
        $this->add_control(
            'filter_color',
            [
                'label' => __('Filter Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-isotope-nav li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'filter_hover_color',
            [
                'label' => __('Filter Hover Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-isotope-nav li.active' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'filter_hover_bg_color',
            [
                'label' => __('Filter Hover BG Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .case-isotope-nav li.active' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'filtar_margin',
            [
                'label' => __('Margin Filtar Button', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .case-isotope-nav li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}}  .case-isotope-nav li' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'filtar_margin_box',
            [
                'label' => __('Margin Filter Box', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} ul.case-isotope-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}}  ul.case-isotope-nav' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'filtar_padding',
            [
                'label' => __('Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .case-isotope-nav li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}}  .case-isotope-nav li' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'filtar_radius',
            [
                'label' => __('Filter Border Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .case-isotope-nav li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}}  .case-isotope-nav li' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'filter_border',
				'label' => __( 'Border', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .case-isotope-nav li.active',
			]
		);
        $this->end_controls_section();


        $this->start_controls_section(
            'section_category_style',
            [
                'label' => __('Category', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_category' => 'yes',
                ]
            ]
        );
        $this->start_controls_tabs(
            'category_style_tabs'
        );
        $this->start_controls_tab(
            'category_style_normal_tab',
            [
                'label' => __('Normal', 'techex-hp'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => __('Category Typography', 'techex-hp'),
                'name' => 'category_typo',
                'selector' => '{{WRAPPER}} .techex-case-study-content .techex-cs-category',
            ]
        );
        $this->add_control(
            'cat_position_toggle',
            [
                'label' => __('Position', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', 'techex-hp'),
                'label_on' => __('Custom', 'techex-hp'),
                'return_value' => 'yes',
            ]
        );
        $this->start_popover();

        $this->add_control(
			'category_position',
			[
				'label' => __( 'Position', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'absolute'  => __( 'Absolute', 'techex-hp' ),
					'initial' => __( 'Initial', 'techex-hp' ),
					'fixed' => __( 'Fixed', 'techex-hp' ),
					'relative' => __( 'Relative', 'techex-hp' ),
					'default' => __( 'Default', 'techex-hp' ),
				],
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content .techex-cs-category' => 'position: {{VALUE}}',
                ]
			]
		);
        $this->add_responsive_control(
            'cat_position_right',
            [
                'label' => __( 'Horizontal', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -2000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content .techex-cs-category' => 'left: {{SIZE}}{{UNIT}} !important; right: auto !important;',
                ],
                'condition' => [
                    'category_position' => 'absolute',
                ],

            ]
        );
        $this->add_responsive_control(
            'cat_position_top',
            [
                'label' => __( 'Vertical', 'techex-hp' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -2000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content .techex-cs-category' => 'top: {{SIZE}}{{UNIT}} !important; button: auto !important;',
                ],
                'condition' => [
                    'category_position' => 'absolute',
                ],

            ]
        );

        $this->end_popover();

        $this->add_control(
            'category_color',
            [
                'label' => __('Category Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content .techex-cs-category' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cat_bg_color',
            [
                'label' => __('Background Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content .techex-cs-category' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'cat_border',
                'label' => __('Border', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-case-study-content .techex-cs-category',
            ]
        );
        $this->add_responsive_control(
            'cat_radius',
            [
                'label' => __('Image Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    ' {{WRAPPER}} .techex-case-study-content .techex-cs-category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'cat_padding',
			[
				'label' => __( 'Padding', 'techex-hp' ),
				'type' =>  \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .techex-case-study-content .techex-cs-category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'category_gap',
            [
                'label' => __('Category Gap', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 400,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content .techex-cs-category' => 'margin-bottom:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'category_style_hover_tab',
            [
                'label' => __('Hover', 'techex-hp'),
            ]
        );
        $this->add_control(
            'category_color_hover',
            [
                'label' => __('Category Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-cs-category:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
			'icon_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 400,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content .techex-cs-category .cat_icon svg' => ' width :{{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'cat_icon_margin',
			[
				'label' => __( 'Margin', 'techex-hp' ),
				'type' =>  \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .techex-case-study-content .techex-cs-category .cat_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __('Title Heading', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => __('Title Typography', 'techex-hp'),
                'name' => 'title_typo',
                'selector' => '{{WRAPPER}} .techex-case-study-title h2 a',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-title h2 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'title_color_hover',
            [
                'label' => __('Title Hover Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-title h2 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-case-study-title h2 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-case-study-title h2' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_sub_heading_style',
            [
                'label' => __('Sub Heading', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_subheading' => 'yes',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => __('SubHeading Typography', 'techex-hp'),
                'name' => 'subheading_typo',
                'selector' => '{{WRAPPER}} .techex-subheading',
            ]
        );
        $this->add_control(
            'subheading_color',
            [
                'label' => __('SubHeading Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-subheading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'title_subheading_color_hover',
            [
                'label' => __('SubHeading Hover Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-subheading:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'subheading_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-subheading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-subheading' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // date control

        $this->start_controls_section(
            'section_date_style',
            [
                'label' => __('Date', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_date' => 'yes',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => __('Date Typography', 'techex-hp'),
                'name' => 'date_typo',
                'selector' => '{{WRAPPER}} .advice-date',
            ]
        );
        $this->add_control(
            'date_color',
            [
                'label' => __('Date Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advice-date' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'title_date_color_hover',
            [
                'label' => __('Date Hover Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advice-date:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'date_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .advice-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .advice-date' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_excerpt_style',
            [
                'label' => __('Excerpt', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_excerpt' => 'yes',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => __('Excerpt Typography', 'techex-hp'),
                'name' => 'excerpt_typo',
                'selector' => '{{WRAPPER}} .studies_content',
            ]
        );
        $this->add_control(
            'excerpt_color',
            [
                'label' => __('Excerpt Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .studies_content' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'excerpt_color_hover',
            [
                'label' => __('Excerpt Hover Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .studies_content:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'excerpt_margin',
            [
                'label'      => __('Margin', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .studies_content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .studies_content' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'excerpt_padding',
            [
                'label'      => __('Padding', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .studies_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .studies_content' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'link_icon_popup_icon',
            [
                'label' => __('Link/ Popup Icon', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'lp_style_tabs'
        );
        $this->start_controls_tab(
            'lp_style_normal_tab',
            [
                'label' => __('Normal', 'techex-hp'),
            ]
        );
        $this->add_control(
            'lp_icon_line_color',
            [
                'label' => __('Icon Line Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .links-icons svg path' => 'stroke: {{VALUE}}',
                    '{{WRAPPER}} .links-icons i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'lp_icon_fill_color',
            [
                'label' => __('SVG Fill Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .links-icons svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'lp_bg_color',
            [
                'label' => __('Background Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .links-icons a' => 'background-color: {{VALUE}}',
                ],
            ]
        );



        $this->add_responsive_control(
            'lp_icon_size',
            [
                'label' => __('icon Size', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .links-icons  svg' => 'width: {{SIZE}}{{UNIT}} ;',
                    '{{WRAPPER}} .links-icons  i' => 'font-size: {{SIZE}}{{UNIT}} ;',
                ],
            ]
        );

        $this->add_responsive_control(
            'lp_icon_margin',
            [
                'label' => __('icon Size', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .links-icons  svg' => 'margin: {{SIZE}}{{UNIT}} ;',
                    '{{WRAPPER}} .links-icons  i' => 'margin: {{SIZE}}{{UNIT}} ;',
                ],
            ]
        );

        $this->add_responsive_control(
            'lp_icon_box_size',
            [
                'label' => __('icon Hieght Widget', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .links-icons  a' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'lp_radius',
            [
                'label'      => __('Border Radius', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .links-icons'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .links-icons' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'lp_style_hover_tab',
            [
                'label' => __('Hover', 'techex-hp'),
            ]
        );

        $this->add_control(
            'lp_icon_line_color_hover',
            [
                'label' => __('Icon Line Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .links-icons:hover svg path' => 'stroke: {{VALUE}}',
                    '{{WRAPPER}} .links-icons:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'lp_icon_fill_color_hover',
            [
                'label' => __('SVG Fill Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .links-icons:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'lp_bg_color_hover',
            [
                'label' => __('Background Color', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .links-icons a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();



        $this->start_controls_section(
            'section_content_style',
            [
                'label' => __('Box', 'techex-hp'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_align',
            [
                'label' => __('Align', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'techex-hp'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'techex-hp'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'techex-hp'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'content_bg_color',
                'label' => __('Content Background Color', 'techex-hp'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .techex-case-study-content',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __('Box Shadow', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-case-study-item',
            ]
        );

        $this->add_control(
            'content_gap',
            [
                'label' => __('Content gap', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 400,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .techex-case-study-content.content-postion-on-image' => 'left:{{SIZE}}{{UNIT}};right:{{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'content_position' => 'on-image',
                ]
            ]

        );
        $this->add_control(
            'content_y_position',
            [
                'label' => __('Content Y Position', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .techex-case-study-content.content-postion-on-image' => 'bottom:{{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'content_position' => 'on-image',
                ]
            ]
        );
        $this->add_responsive_control(
            'content_top_padding',
            [
                'label' => __('Content Top Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content.style-two .case-content-top' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-case-study-content.style-two .case-content-top' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
                'condition' => [
                    'case_style' => 'style-two'
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-case-study-content' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
                'condition' => [
                    'case_style!' => 'style-two'
                ],
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __('Content Margin', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-case-study-content' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_radius',
            [
                'label' => __('Content Box Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-case-study-content' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',

                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __('Border', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-case-study-content',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label' => __('Box Radius', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    ' {{WRAPPER}} .techex-case-study-item ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'button_style',
            [
                'label' => __('Button', 'techex-hp'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE, 'condition' => [
                    'show_readmore' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typography',
                'label'    => __('Button Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .case-study-btn',
            ]
        );
        $this->start_controls_tabs(
            'button_style_tabs'
        );
        $this->start_controls_tab(
            'button_style_normal_tab',
            [
                'label' => __('Normal', 'techex-hp'),
            ]
        );
        $this->add_control(
            'btn_icon_color',
            [
                'label'     => __('Icon Color', 'techex-hp'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-study-btn .btn-icon'      => 'color: {{VALUE}}',
                    '{{WRAPPER}} .case-study-btn .btn-icon path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_fill_color',
            [
                'label'     => __('Icon Fill Color', 'techex-hp'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-study-btn .btn-icon path' => 'fill: {{VALUE}}',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'icon[library]',
                            'operator' => '==',
                            'value' => 'svg',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'boxed_btn_color',
            [
                'label'     => __('Button Color', 'techex-hp'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-study-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'boxed_btn_background',
            [
                'label'     => __('Background Color', 'techex-hp'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-study-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_shadow',
                'label'    => __('Button Shadow', 'techex-hp'),
                'selector' => '{{WRAPPER}} .case-study-btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => __('Border', 'techex-hp'),
                'selector' => '{{WRAPPER}} .case-study-btn',
            ]
        );
        $this->add_control(
            'btn_icon_size',
            [
                'label'      => __('Icon Size', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .case-study-btn .btn-icon'     => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .case-study-btn .btn-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );




        $this->add_responsive_control(
            'button_sizesdf',
            [
                'label'          => __('Button size', 'techex-hp'),
                'type'           => \Elementor\Controls_Manager::SLIDER,
                'size_units'     => ['px', '%'],
                'range'          => [
                    'px' => [
                        'min' => 0,
                        'max' => 400,
                    ],
                    '%'  => [
                        'min' => 1,
                        'max' => 100,
                    ]
                ],
                'selectors'      => [
                    '{{WRAPPER}} .case-study-btn' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'btn_icon_vertical_gap',
            [
                'label'      => __('Icon gap Vertical', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .case-study-btn .btn-icon i'  => 'margin-top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .case-study-btn .btn-icon svg' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'btn_icon_gap',
            [
                'label'      => __('Icon gap', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .case-study-btn .icon-before, body.rtl {{WRAPPER}} .case-study-btn .icon-after '  => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .case-study-btn .icon-after , body.rtl  {{WRAPPER}} .case-study-btn .icon-before' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_radius',
            [
                'label'      => __('Border Radius', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .case-study-btn'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .case-study-btn' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'buton_style_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => __('Button Padding', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .case-study-btn'          => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .case-study-btn' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => __('Button Margin', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .case-study-btn'          => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .case-study-btn' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_style_hover_tab',
            [
                'label' => __('Hover', 'techex-hp'),
            ]
        );
        $this->add_control(
            'btn_icon_hover_color',
            [
                'label'     => __('Icon Color', 'techex-hp'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-widget-item:hover .case-study-btn .btn-icon'      => 'color: {{VALUE}}',
                    '{{WRAPPER}} .techex-case-study-widget-item:hover .case-study-btn .btn-icon path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_icon_fill_color_hover',
            [
                'label'     => __('Icon Fill Color', 'techex-hp'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-case-study-widget-item:hover .case-study-btn .btn-icon path' => 'fill: {{VALUE}}',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'icon[library]',
                            'operator' => '==',
                            'value' => 'svg',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'button_hover_padding',
            [
                'label'      => __('Button Padding', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-case-study-item-wrap:hover .case-study-btn'          => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-case-study-item-wrap:hover .case-study-btn' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_hover_margin',
            [
                'label'      => __('Button Margin', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .techex-case-study-item-wrap:hover .case-study-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-case-study-item-wrap:hover .case-study-btn' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label'     => __('Button Color', 'techex-hp'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-study-btn:hover .case-readmore-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_background',
            [
                'label'     => __('Background Color', 'techex-hp'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-study-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_hover_border',
                'label'    => __('Border', 'techex-hp'),
                'selector' => '{{WRAPPER}} .case-study-btn:hover',
            ]
        );
        $this->add_control(
            'btn_hover_animation',
            [
                'label' => __('Hover Animation', 'techex-hp'),
                'type'  => \Elementor\Controls_Manager::HOVER_ANIMATION,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_hover_shadow',
                'label'    => __('Button Shadow', 'techex-hp'),
                'selector' => '{{WRAPPER}} .case-study-btn:hover',
            ]
        );
        $this->add_responsive_control(
            'button_hover_radius',
            [
                'label'      => __('Border Radius', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .case-study-btn:hover'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .case-study-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_gap',
            [
                'label'      => __('Icon gap', 'techex-hp'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .case-study-btn:hover .icon-before'          => 'transform: translatex( -{{SIZE}}{{UNIT}} );',
                    '{{WRAPPER}} .case-study-btn:hover .icon-after '          => 'transform: translatex( {{SIZE}}{{UNIT}} );',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
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
        $settings = $this->get_settings();
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $case_study_data = [];
        $case_study_data['settings'] = $this->get_settings();
        $case_study_data = json_encode($case_study_data);
        $case_hover_style = $settings['case_hover_style'];

        $active_slider = $settings['layout_type'];


        $slider_extraSetting = array(
            'loop' => (!empty($settings['loop']) && 'yes' === $settings['loop']) ? true : false,
            'dots' => (!empty($settings['dots']) && 'yes' === $settings['dots']) ? true : false,
            'autoplay' => (!empty($settings['autoplay']) && 'yes' === $settings['autoplay']) ? true : false,
            'nav' => (!empty($settings['arrows']) && 'yes' === $settings['arrows']) ? true : false,
            'mousedrag' => (!empty($settings['mousedrag']) && 'yes' === $settings['mousedrag']) ? true : false,
            'autoplaytimeout' => !empty($settings['autoplaytimeout']) ? $settings['autoplaytimeout'] : '5000',

            //this a responsive layout
            'per_coulmn' => (!empty($settings['per_coulmn'])) ? $settings['per_coulmn'] : 3,
            'per_coulmn_tablet' => (!empty($settings['per_coulmn_tablet'])) ? $settings['per_coulmn_tablet'] : 2,
            'per_coulmn_mobile' => (!empty($settings['per_coulmn_mobile'])) ? $settings['per_coulmn_mobile'] : 1
        );

        $jasondecode = wp_json_encode($slider_extraSetting);


        if($active_slider == 'slider'){
            $this->add_render_attribute('case_study_attr', 'class', array('casestudy-slider-active','techex-case-study-wrap', 'owl-carousel'));
            $this->add_render_attribute('case_study_attr', 'data-settings', $jasondecode);

        }else{
            $this->add_render_attribute('case_study_attr', 'class', array('row techex-case-study-wrap justify-content-center', $case_hover_style));
            $this->add_render_attribute('case_study_attr', 'class', array('layout-mode-' . esc_attr($settings['layout_type'])));
        }
       

       


        // Including the query
        include('queries/case-study-query.php'); ?>

        <?php if ($the_query->have_posts()) : ?>
           <?php  if ($settings['enable_filtering']) : ?>
                <ul class="case-isotope-nav">
                    <li data-filter="<?php echo esc_attr('*') ?>" class="active"><?php echo esc_html($settings['all_text']) ?></li>
                    <?php
                    if (0 != count($settings['include_categories'])) :
                        foreach ($settings['include_categories'] as $cat) :
                            $case_term = get_term_by('slug', $cat, 'case-study-category');
                                ?>
                            <li data-filter=".<?php echo esc_attr($case_term->slug) ?>"><?php echo esc_html($case_term->name) ?></li>
                            <?php
                        endforeach;
                    else :
                        $case_terms = get_terms('case-study-category');
                        if (!empty($case_terms)) :
                            foreach ($case_terms as $case_term) : ?>
                                <li data-filter=".<?php echo esc_attr($case_term->slug) ?>"><?php echo esc_html($case_term->name) ?></li>
                            <?php
                            endforeach;
                        endif;
                    endif;
                    ?>
                </ul>
            <?php endif; ?>



            <div <?php echo $this->get_render_attribute_string('case_study_attr'); ?>>
                <?php
                // Including the Content
                include('contents/case-study-content.php');
                ?>
            </div>

            <div class="techex-navigation">
                <?php
                    if ( 'yes' == $settings['enable_Pagination'] ) {
                        $total_pages = $the_query->max_num_pages;

                        if ($total_pages > 1){

                            $current_page = max(1, get_query_var('paged'));

                            echo paginate_links(array(
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => '/page/%#%',
                                'current' => $current_page,
                                'total' => $total_pages,
                                'prev_text'    => __('« prev'),
                                'next_text'    => __('next »'),
                            ));

                        }

                    }
                ?>
            </div>
        <?php  endif; wp_reset_postdata();
    }
}

$widgets_manager->register_widget_type(new \techex_case_study_loop());
