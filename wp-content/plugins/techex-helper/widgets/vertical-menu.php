<?php
namespace Elementor;
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techex_Vertical_Menu extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'techex-vertical-menu';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Vertical Menu', 'techex-hp');
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-nav-menu';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['techex-addons'];
    }

    /**
     * Retrieve the list of available menus.
     *
     * Used to get the list of available menus.
     *
     * @since 1.3.0
     * @access private
     *
     * @return array get WordPress menus list.
     */
    private function get_available_menus()
    {

        $menus = wp_get_nav_menus();

        $options = [];

        foreach ($menus as $menu) {
            $options[$menu->slug] = $menu->name;
        }

        return $options;
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        /**
         * Style tab
         */

        $this->start_controls_section(
            'general',
            [
                'label' => __('Content', 'techex-hp'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
			'selected_menu',
			[
				'label' => __( 'Select Menu', 'techex-hp' ),
				'type' => Controls_Manager::SELECT,
				'options' => $this->get_available_menus(),
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_menu_style',
            [
                'label' => __('Menu Style', 'techex-hp'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->start_controls_tabs(
			'menu_items_tabs'
        );

		$this->start_controls_tab(
			'menu_normal_tab',
			[
				'label' => __( 'Normal', 'techex-hp' ),
			]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'label' => __('Menu Typography', 'techex-hp'),
                'selector' => '{{WRAPPER}} .techex-vertical-menu a',
            ]
        );

        $this->add_control(
            'menu_color',
            [
                'label' => __('Item Color', 'techex-hp'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-vertical-menu a' => 'color: {{VALUE}}',

                ],
            ]
        );

        $this->add_control(
            'menu_bg_color',
            [
                'label' => __('Item Background Color', 'techex-hp'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-vertical-menu a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Item Border', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .techex-vertical-menu li',
			]
		);

        $this->add_responsive_control(
            'item_gap',
            [
                'label' => __('Menu Gap', 'techex-hp'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .techex-vertical-menu li:not(:last-child) a' => 'margin-bottom: {{SIZE}}{{UNIT}};',

                ],

            ]
        );

        $this->add_responsive_control(
            'item_padding',
            [
                'label' => __('Item Padding', 'techex-hp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    'body:not(.rtl) {{WRAPPER}} .techex-vertical-menu a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                    'body.rtl {{WRAPPER}}  .techex-vertical-menu a' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'item_readius',
            [
                'label' => __('Item Radius', 'techex-hp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    'body:not(.rtl) {{WRAPPER}} .techex-vertical-menu a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-vertical-menu a' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],

            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'menu_hover_tab',
			[
				'label' => __( 'Hover', 'techex-hp' ),
			]
		);

        $this->add_control(
            'menu_hover_color',
            [
                'label' => __('Menu Hover Color', 'techex-hp'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-vertical-menu a:hover,
                     {{WRAPPER}} .techex-vertical-menu li.current-menu-item>a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'menu_bg_hover_color',
            [
                'label' => __('Item Background Color', 'techex-hp'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .techex-vertical-menu a:hover,
                     {{WRAPPER}} .techex-vertical-menu li.current-menu-item>a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box-single-border',
				'label' => __( 'Border', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .techex-vertical-menu li',
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();




        $this->end_controls_section();


        $this->start_controls_section(
            'section_box_style',
            [
                'label' => __('Box Style', 'techex-hp'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'techex-hp' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .techex-vertical-menu-wrap',
			]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box-border',
				'label' => __( 'Box Border', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .techex-vertical-menu-wrap',
			]
		);
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .techex-vertical-menu-wrap',
			]
		);

        $this->add_responsive_control(
            'box_padding',
            [
                'label' => __('Padding', 'techex-hp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    'body:not(.rtl) {{WRAPPER}} .techex-vertical-menu-wrap ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-vertical-menu-wrap ul' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'box_readius',
            [
                'label' => __('Box Radius', 'techex-hp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    'body:not(.rtl) {{WRAPPER}} .techex-vertical-menu-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .techex-vertical-menu-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],

            ]
        );




        $this->end_controls_section();


    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $popular_post_key = array();
        $popular_meta_value_num = array();
        $settings = $this->get_settings_for_display();

        $args = [
            'menu'                  => $settings['selected_menu'],
            'menu_class'            => 'techex-vertical-menu',
            'menu_id'               => 'techex-vertical-menu',
            'container_class'       => 'techex-vertical-menu-container',
        ];


?>
        <div class="techex-vertical-menu-wrap ">
            <?php wp_nav_menu($args); ?>
        </div>
<?php
    }
}

$widgets_manager->register_widget_type(new \Elementor\Techex_Vertical_Menu());
