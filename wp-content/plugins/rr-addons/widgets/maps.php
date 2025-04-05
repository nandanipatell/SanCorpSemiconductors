<?php
namespace Elementor;


if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Class Maps
 */
class Maps extends Widget_Base {
    public function get_name() {
        return 'rr-addons-maps';
    }

    // public function is_reload_preview_required() {
    //     return true;
    // }

    public function get_title() {
        return __( 'Google Map', 'rr-addons' );
    }

    public function get_icon() {
        return 'eicon-google-maps';
    }

    public function get_categories() {
        return ['rr-addons'];
    }

    public function get_style_depends() {
        return [
            'rr-addons',
        ];
    }

    public function get_script_depends() {
        return [
            // 'google-maps-cluster',
            'rr-addons-maps-api-js',
            'rr-addons-maps-js',
        ];
    }

    public function get_keywords() {
        return ['google', 'marker', 'pin'];
    }

    // public function get_custom_help_url() {
    //     return 'https://uxtheme.net/support/';
    // }

    /**
     * Register Google Maps controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'rr_addons_map_settings',
            [
                'label' => __( 'Center Location', 'rr-addons' ),
            ]
        );

        $settings = get_option( 'rr-addons' );

        if ( empty( $settings['gmap_api'] ) || '1' == $settings['gmap_api'] ) {
            $this->add_control(
                'maps_api_url',
                [
                    'raw'             => 'Finest Maps widget requires an API key. Get your API key from <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">here</a> and add it to Finest options page. Go to Dashboard -> Finest Options -> Integrations tab',
                    'type'            => Controls_Manager::RAW_HTML,
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                ]
            );
        }

        /*   $this->add_control('map_ip_location',
        [
        'label'         => __( 'Get User Location', 'rr-addons' ),
        'description'   => __('Get center location from visitor\'s location','rr-addons'),
        'type'          => Controls_Manager::SWITCHER,
        'return_value'  => 'true'
        ]
        );

        $this->add_control('map_location_finder',
        [
        'label'         => __( 'Latitude & Longitude Finder', 'rr-addons' ),
        'type'          => Controls_Manager::SWITCHER,
        'condition'     => [
        'map_ip_location!'  => 'true'
        ]
        ]
        );

        $this->add_control('map_notice',
        [
        'label' => __( 'Find Latitude & Longitude', 'elementor' ),
        'type'  => Controls_Manager::RAW_HTML,
        'raw'   => '<form onsubmit="getAddress(this);" action="javascript:void(0);"><input type="text" id="rr-addons-map-get-address" class="rr-addons-map-get-address" style="margin-top:10px; margin-bottom:10px;"><input type="submit" value="Search" class="elementor-button elementor-button-default" onclick="getAddress(this)"></form><div class="rr-addons-address-result" style="margin-top:10px; line-height: 1.3; font-size: 12px;"></div>',
        'label_block' => true,
        'condition'     => [
        'map_location_finder'   => 'yes',
        'map_ip_location!'  => 'true'
        ]
        ]
        );
         */

        $this->add_control(
            'maps_center_lat',
            [
                'label'       => __( 'Center Latitude', 'rr-addons' ),
                'type'        => Controls_Manager::TEXT,
                'dynamic'     => ['active' => true],
                'description' => __( 'Center latitude and longitude are required to identify your location', 'rr-addons' ),
                'default'     => '18.591212',
                'label_block' => true,
                /*          'condition'     => [
            'map_ip_location!'  => 'true'
            ] */
            ]
        );

        $this->add_control(
            'maps_center_long',
            [
                'label'       => __( 'Center Longitude', 'rr-addons' ),
                'type'        => Controls_Manager::TEXT,
                'dynamic'     => ['active' => true],
                'description' => __( 'Center latitude and longitude are required to identify your location', 'rr-addons' ),
                'default'     => '73.741261',
                'label_block' => true,
                /*        'condition'     => [
            'map_ip_location!'  => 'true'
            ]*/
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'rr_addons_map_pins_settings',
            [
                'label' => __( 'Locations', 'rr-addons' ),
            ]
        );

        $this->add_control(
            'maps_markers_width',
            [
                'label' => __( 'Max Width', 'rr-addons' ),
                'type'  => Controls_Manager::NUMBER,
                'title' => __( 'Set the Maximum width for markers description box', 'rr-addons' ),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'pin_icon',
            [
                'label' => __( 'Custom Icon', 'rr-addons' ),
                'type'  => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'pin_icon_size',
            [
                'label'      => __( 'Size', 'rr-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range'      => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                ],
            ]
        );

        /* $repeater->add_control('map_pin_location_finder',
        [
        'label'         => __( 'Latitude & Longitude Finder', 'rr-addons' ),
        'type'          => Controls_Manager::SWITCHER,
        ]
        );

        $repeater->add_control('map_pin_notice',
        [
        'label' => __( 'Find Latitude & Longitude', 'elementor' ),
        'type'  => Controls_Manager::RAW_HTML,
        'raw'   => '<form onsubmit="getPinAddress(this);" action="javascript:void(0);"><input type="text" id="rr-addons-map-get-address" class="rr-addons-map-get-address" style="margin-top:10px; margin-bottom:10px;"><input type="submit" value="Search" class="elementor-button elementor-button-default" onclick="getPinAddress(this)"></form><div class="rr-addons-address-result" style="margin-top:10px; line-height: 1.3; font-size: 12px;"></div>',
        'label_block' => true,
        'condition' => [
        'map_pin_location_finder'   => 'yes'
        ]
        ]
        );
         */
        $repeater->add_control(
            'map_latitude',
            [
                'label'       => __( 'Latitude', 'rr-addons' ),
                'type'        => Controls_Manager::TEXT,
                'dynamic'     => ['active' => true],
                'description' => 'Click <a href="https://www.latlong.net/" target="_blank">here</a> to get your location coordinates',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'map_longitude',
            [
                'name'        => 'map_longitude',
                'label'       => __( 'Longitude', 'rr-addons' ),
                'type'        => Controls_Manager::TEXT,
                'dynamic'     => ['active' => true],
                'description' => 'Click <a href="https://www.latlong.net/" target="_blank">here</a> to get your location coordinates',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'pin_title',
            [
                'label'       => __( 'Title', 'rr-addons' ),
                'type'        => Controls_Manager::TEXT,
                'dynamic'     => ['active' => true],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'pin_desc',
            [
                'label'       => __( 'Description', 'rr-addons' ),
                'type'        => Controls_Manager::WYSIWYG,
                'dynamic'     => ['active' => true],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'custom_id',
            [
                'label'       => __( 'Custom ID', 'rr-addons' ),
                'type'        => Controls_Manager::TEXT,
                // 'description'   => __('Use this with Finest Carousel widget ','rr-addons') .  '<a href="https://uxtheme.net/docs/how-to-use-elementor-widgets-to-navigate-through-carousel-widget-slides/" target="_blank">Custom Navigation option</a>',
                'dynamic'     => ['active' => true],
                'separator'   => 'before',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'rr_addons_map_pins',
            [
                'label'       => __( 'All Locations', 'rr-addons' ),
                'type'        => Controls_Manager::REPEATER,
                'default'     => [
                    'map_latitude'  => '18.591212',
                    'map_longitude' => '73.741261',
                    'pin_title'     => __( 'Finest Google Maps', 'rr-addons' ),
                    'pin_desc'      => __( 'Add an optional description to your map pin', 'rr-addons' ),
                ],
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ pin_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'maps_controls_section',
            [
                'label' => __( 'Controls', 'rr-addons' ),
            ]
        );

        $this->add_control(
            'rr_addons_map_type',
            [
                'label'   => __( 'Map Type', 'rr-addons' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'roadmap'   => __( 'Road Map', 'rr-addons' ),
                    'satellite' => __( 'Satellite', 'rr-addons' ),
                    'terrain'   => __( 'Terrain', 'rr-addons' ),
                    'hybrid'    => __( 'Hybrid', 'rr-addons' ),
                ],
                'default' => 'roadmap',
            ]
        );

        $this->add_responsive_control(
            'rr_addons_map_height',
            [
                'label'     => __( 'Height', 'rr-addons' ),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 500,
                ],
                'range'     => [
                    'px' => [
                        'min' => 80,
                        'max' => 1400,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rr_addons_map_height' => 'height: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'rr_addons_map_zoom',
            [
                'label'   => __( 'Zoom', 'rr-addons' ),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 12,
                ],
                'range'   => [
                    'px' => [
                        'min' => 0,
                        'max' => 22,
                    ],
                ],
            ]
        );

        $this->add_control(
            'disable_drag',
            [
                'label' => __( 'Disable Map Drag', 'rr-addons' ),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'rr_addons_map_option_map_type_control',
            [
                'label' => __( 'Map Type Controls', 'rr-addons' ),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'rr_addons_map_option_zoom_controls',
            [
                'label' => __( 'Zoom Controls', 'rr-addons' ),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'rr_addons_map_option_streeview',
            [
                'label' => __( 'Street View Control', 'rr-addons' ),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'rr_addons_map_option_fullscreen_control',
            [
                'label' => __( 'Fullscreen Control', 'rr-addons' ),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'rr_addons_map_option_mapscroll',
            [
                'label' => __( 'Scroll Wheel Zoom', 'rr-addons' ),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'maps_marker_open',
            [
                'label' => __( 'Info Container Always Opened', 'rr-addons' ),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'maps_marker_hover_open',
            [
                'label' => __( 'Info Container Opened when Hovered', 'rr-addons' ),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'maps_marker_mouse_out',
            [
                'label'     => __( 'Info Container Closed when Mouse Out', 'rr-addons' ),
                'type'      => Controls_Manager::SWITCHER,
                'condition' => [
                    'maps_marker_hover_open' => 'yes',
                ],
            ]
        );

        // if( $settings['rr-addons-map-cluster'] ) {
        //     $this->add_control('rr_addons_map_option_cluster',
        //         [
        //             'label'         => __( 'Marker Clustering', 'rr-addons' ),
        //             'type'          => Controls_Manager::SWITCHER,
        //         ]
        //     );
        // }

        $this->end_controls_section();

        $this->start_controls_section(
            'maps_custom_styling_section',
            [
                'label' => __( 'Map Style', 'rr-addons' ),
            ]
        );

        $this->add_control(
            'maps_custom_styling',
            [
                'label'       => __( 'JSON Code', 'rr-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'description' => 'Get your custom styling from <a href="https://snazzymaps.com/" target="_blank">here</a>',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
        /*
        $this->start_controls_section('section_pa_docs',
        [
        'label'         => __('Helpful Documentations', 'rr-addons'),
        ]
        );

        $doc1_url = "Helper_Functions::get_campaign_link( 'https://uxtheme.net/docs/google-maps-widget-tutorial', 'editor-page', 'wp-editor', 'get-support' )";

        $this->add_control('doc_1',
        [
        'type'            => Controls_Manager::RAW_HTML,
        'raw'             => sprintf(  '<a href="%s" target="_blank">%s</a>', $doc1_url ,__( 'Getting started »', 'rr-addons' ) ),
        'content_classes' => 'editor-pa-doc',
        ]
        );

        $doc2_url = "Helper_Functions::get_campaign_link( 'https://uxtheme.net/docs/getting-your-api-key-for-google-reviews', 'editor-page', 'wp-editor', 'get-support' )";

        $this->add_control('doc_2',
        [
        'type'            => Controls_Manager::RAW_HTML,
        'raw'             => sprintf(  '<a href="%s" target="_blank">%s</a>', $doc2_url ,__( 'Getting your API key »', 'rr-addons' ) ),
        'content_classes' => 'editor-pa-doc',
        ]
        );

        $this->end_controls_section(); */

        $this->start_controls_section(
            'maps_pin_title_style',
            [
                'label' => __( 'Title', 'rr-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'maps_pin_title_color',
            [
                'label'     => __( 'Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-maps-info-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'pin_title_typography',
                'selector' => '{{WRAPPER}} .rr-addons-maps-info-title',
            ]
        );

        $this->add_responsive_control(
            'maps_pin_title_margin',
            [
                'label'      => __( 'Margin', 'rr-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-maps-info-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        /*Pin Title Padding*/
        $this->add_responsive_control(
            'maps_pin_title_padding',
            [
                'label'      => __( 'Padding', 'rr-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-maps-info-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        /*Pin Title ALign*/
        $this->add_responsive_control(
            'maps_pin_title_align',
            [
                'label'     => __( 'Alignment', 'rr-addons' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'rr-addons' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'rr-addons' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-maps-info-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        /*End Title Style Section*/
        $this->end_controls_section();

        /*Start Pin Style Section*/
        $this->start_controls_section(
            'maps_pin_text_style',
            [
                'label' => __( 'Description', 'rr-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'maps_pin_text_color',
            [
                'label'     => __( 'Color', 'rr-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-maps-info-desc' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'pin_text_typo',
                'selector' => '{{WRAPPER}} .rr-addons-maps-info-desc',
            ]
        );

        $this->add_responsive_control(
            'maps_pin_text_margin',
            [
                'label'      => __( 'Margin', 'rr-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-maps-info-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'maps_pin_text_padding',
            [
                'label'      => __( 'Padding', 'rr-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-maps-info-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'maps_pin_description_align',
            [
                'label'     => __( 'Alignment', 'rr-addons' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'rr-addons' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'rr-addons' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-maps-info-desc' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'info_box_style',
            [
                'label' => __( 'Info Box', 'rr-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        /*    $this->add_control(
        'map_info_box_bg_color',
        [
        'label'         => __('Background', 'rr-addons'),
        'type'          => Controls_Manager::COLOR,
        'selectors'     => [
        '{{WRAPPER}} .gm-style-iw.gm-style-iw-c , {{WRAPPER}} .gm-style .gm-style-iw-t::after'   => 'background-color: {{VALUE}};',
        ]
        ]
        );

        $this->add_control(
        'map_info_width',
        [
        'label'         => __('Width', 'rr-addons'),
        'type'          => Controls_Manager::SLIDER,
        'size_units'    => ['px', '%', 'em'],
        'range' => [
        'px' => [
        'min' => 0,
        'max' => 1000,
        ],
        'em' => [
        'min' => 0,
        'max' => 100,
        ],
        '%' => [
        'min' => 0,
        'max' => 100,
        ]
        ],
        'selectors'     => [
        '{{WRAPPER}} .gm-style-iw.gm-style-iw-c' => 'width: {{SIZE}}{{UNIT}};'
        ]
        ]
        );

         */

        $this->add_responsive_control(
            'map_info_box_margin',
            [
                'label'      => __( 'Margin', 'rr-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .gm-style-iw.gm-style-iw-c' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'map_info_box_padding',
            [
                'label'      => __( 'Padding', 'rr-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .gm-style-iw.gm-style-iw-c' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'map_info_box_align',
            [
                'label'     => __( 'Alignment', 'rr-addons' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'rr-addons' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'rr-addons' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'rr-addons' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .gm-style-iw.gm-style-iw-c' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'maps_box_style',
            [
                'label' => __( 'Map', 'rr-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'map_border',
                'selector' => '{{WRAPPER}} .rr-addons-maps-container',
            ]
        );

        $this->add_control(
            'maps_box_radius',
            [
                'label'      => __( 'Border Radius', 'rr-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-maps-container,{{WRAPPER}} .rr_addons_map_height' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'label'    => __( 'Shadow', 'rr-addons' ),
                'name'     => 'maps_box_shadow',
                'selector' => '{{WRAPPER}} .rr-addons-maps-container',
            ]
        );

        $this->add_responsive_control(
            'maps_box_margin',
            [
                'label'      => __( 'Margin', 'rr-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-maps-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'maps_box_padding',
            [
                'label'      => __( 'Padding', 'rr-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .rr-addons-maps-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Google Maps widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $map_pins = $settings['rr_addons_map_pins'];
        $street_view = 'yes' == $settings['rr_addons_map_option_streeview'] ? 'true' : 'false';
        $scroll_wheel = 'yes' == $settings['rr_addons_map_option_mapscroll'] ? 'true' : 'false';
        $enable_full_screen = 'yes' == $settings['rr_addons_map_option_fullscreen_control'] ? 'true' : 'false';
        $enable_zoom_control = 'yes' == $settings['rr_addons_map_option_zoom_controls'] ? 'true' : 'false';
        $map_type_control = 'yes' == $settings['rr_addons_map_option_map_type_control'] ? 'true' : 'false';
        $automatic_open = 'yes' == $settings['maps_marker_open'] ? 'true' : 'false';
        $hover_open = 'yes' == $settings['maps_marker_hover_open'] ? 'true' : 'false';
        $hover_close = 'yes' == $settings['maps_marker_mouse_out'] ? 'true' : 'false';
        $marker_cluster = false;

        // $is_cluster_enabled = Admin_Helper::get_integrations_settings()['rr-addons-map-cluster'];

        // if( $is_cluster_enabled ) {
        //     $marker_cluster = 'yes' == $settings['rr_addons_map_option_cluster'] ? 'true' : 'false';
        // }

        $centerlat = !empty( $settings['maps_center_lat'] ) ? $settings['maps_center_lat'] : 18.591212;
        $centerlong = !empty( $settings['maps_center_long'] ) ? $settings['maps_center_long'] : 73.741261;
        $marker_width = !empty( $settings['maps_markers_width'] ) ? $settings['maps_markers_width'] : 1000;
        /*         $get_ip_location = $settings['map_ip_location'];

        if( 'true' == $get_ip_location ) {

        if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        $http_x_headers = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
        $_SERVER['REMOTE_ADDR'] = $http_x_headers[0];
        }
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $env = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ipAddress"));
        $centerlat = isset( $env['geoplugin_latitude'] ) ? $env['geoplugin_latitude'] : $centerlat;
        $centerlong = isset( $env['geoplugin_longitude'] ) ? $env['geoplugin_longitude'] : $centerlong;

        } */

        $map_settings = [
            'zoom'              => $settings['rr_addons_map_zoom']['size'],
            'maptype'           => $settings['rr_addons_map_type'],
            'streetViewControl' => $street_view,
            'centerlat'         => $centerlat,
            'centerlong'        => $centerlong,
            'scrollwheel'       => $scroll_wheel,
            'fullScreen'        => $enable_full_screen,
            'zoomControl'       => $enable_zoom_control,
            'typeControl'       => $map_type_control,
            'automaticOpen'     => $automatic_open,
            'hoverOpen'         => $hover_open,
            'hoverClose'        => $hover_close,
            'cluster'           => $marker_cluster,
            'drag'              => $settings['disable_drag'],
        ];

        $this->add_render_attribute( 'style_wrapper', 'data-style', $settings['maps_custom_styling'] );?>

    <div class="rr-addons-maps-container" id="rr-addons-maps-container">
        <?php if ( count( $map_pins ) ) {?>
	        <div class="rr_addons_map_height" data-settings='<?php echo wp_json_encode( $map_settings ); ?>' <?php echo $this->get_render_attribute_string( 'style_wrapper' ); ?>>
			<?php
foreach ( $map_pins as $index => $pin ) {
            $key = 'map_marker_' . $index;

            $this->add_render_attribute( $key, [
                'class'          => 'rr-addons-pin',
                'data-lng'       => $pin['map_longitude'],
                'data-lat'       => $pin['map_latitude'],
                'data-icon'      => $pin['pin_icon']['url'],
                'data-icon-size' => $pin['pin_icon_size']['size'],
                'data-max-width' => $marker_width,
            ] );

            if ( !empty( $pin['custom_id'] ) ) {
                $this->add_render_attribute( $key, 'data-id', esc_attr( $pin['custom_id'] ) );
            }?>
                <div <?php echo $this->get_render_attribute_string( $key ); ?>>
                    <?php if ( !empty( $pin['pin_title'] ) || !empty( $pin['pin_desc'] ) ): ?>
                        <div class='rr-addons-maps-info-container'><p class='rr-addons-maps-info-title'><?php echo $pin['pin_title']; ?></p><div class='rr-addons-maps-info-desc'><?php echo $pin['pin_desc']; ?></div></div>
                    <?php endif;?>
                </div>
                <?php
}
            ?>
            </div>
			<?php
}?>
    </div>
    <?php
}
}

$widgets_manager->register_widget_type( new \Elementor\Maps() );