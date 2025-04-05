<?php
/**
 * rr-hp Testimonial Normal Widget.
 *
 *
 * @since 1.0.0
 */
use  Elementor\Widget_Base;
use  Elementor\Controls_Manager;
use  Elementor\utils;
use  Elementor\Group_Control_Typography;
use  Elementor\Group_Control_Box_Shadow;
use  Elementor\Group_Control_Background;
use  Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) {
    exit;
}
// If this file is called directly, abort.
class rr_Testimonail_three_Loop extends \Elementor\Widget_Base {
    public function get_name() {
        return 'rr-testimonial-three-loop';
    }

    public function get_title() {
        return __('rr Testimonial Three', 'rr-hp');
    }

    public function get_icon() {
        return ('eicon-slider-push');
    }

    public function get_categories() {
        return ['rr-addons'];
    }

    public function get_script_depends()
    {
        return ['rr-addon'];
    }

    public function get_style_depends()
    {
        return ['owl-carousel', 'rr-addons'];
    }

    public function get_keywords() {
        return ['team', 'card', 'testimonial', 'membar', 'reviw', 'rating'];
    }

    protected function register_controls() {



    // tp_section_title
    $this->start_controls_section(
        'tp_section_title',
        [
            'label' => esc_html__('Title & Content', 'rr-addons'),
        ]
    );

    $this->add_control(
        'tp_section_title_show',
        [
            'label' => esc_html__( 'Section Title & Content', 'rr-addons' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'rr-addons' ),
            'label_off' => esc_html__( 'Hide', 'rr-addons' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'tp_sub_title',
        [
            'label' => esc_html__('Sub Title', 'rr-addons'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('TP Sub Title', 'rr-addons'),
            'placeholder' => esc_html__('Type Sub Heading Text', 'rr-addons'),
            'label_block' => true,
        ]
    );
    $this->add_control(
        'tp_title',
        [
            'label' => esc_html__('Title', 'rr-addons'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('TP Title Here', 'rr-addons'),
            'placeholder' => esc_html__('Type Heading Text', 'rr-addons'),
            'label_block' => true,
        ]
    );      

    $this->add_control(
        'tp_desctiption',
        [
            'label' => esc_html__('Description', 'rr-addons'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('TP section description here', 'rr-addons'),
            'placeholder' => esc_html__('Type section description here', 'rr-addons'),
        ]
    );

    $this->add_control(
        'tp_title_tag',
        [
            'label' => esc_html__('Title HTML Tag', 'rr-addons'),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'h1' => [
                    'title' => esc_html__('H1', 'rr-addons'),
                    'icon' => 'eicon-editor-h1'
                ],
                'h2' => [
                    'title' => esc_html__('H2', 'rr-addons'),
                    'icon' => 'eicon-editor-h2'
                ],
                'h3' => [
                    'title' => esc_html__('H3', 'rr-addons'),
                    'icon' => 'eicon-editor-h3'
                ],
                'h4' => [
                    'title' => esc_html__('H4', 'rr-addons'),
                    'icon' => 'eicon-editor-h4'
                ],
                'h5' => [
                    'title' => esc_html__('H5', 'rr-addons'),
                    'icon' => 'eicon-editor-h5'
                ],
                'h6' => [
                    'title' => esc_html__('H6', 'rr-addons'),
                    'icon' => 'eicon-editor-h6'
                ]
            ],
            'default' => 'h2',
            'toggle' => false,
        ]
    );

    $this->add_responsive_control(
        'tp_align',
        [
            'label' => esc_html__('Alignment', 'rr-addons'),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'text-left' => [
                    'title' => esc_html__('Left', 'rr-addons'),
                    'icon' => 'eicon-text-align-left',
                ],
                'text-center' => [
                    'title' => esc_html__('Center', 'rr-addons'),
                    'icon' => 'eicon-text-align-center',
                ],
                'text-right' => [
                    'title' => esc_html__('Right', 'rr-addons'),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'left',
            'toggle' => false,
        ]
    );
    $this->end_controls_section();
        // _tp_image
        $this->start_controls_section(
        'rr_tp_image_1',
        [
            'label' => esc_html__('Thumbnail', 'rr-addons'),
        ]
        );
        $this->add_control(
        'tp_image_1',
        [
            'label' => esc_html__( 'Choose Image', 'rr-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
        );           

$this->end_controls_section();


    // _tp_image
    $this->start_controls_section(
        'rr_tp_image',
        [
            'label' => esc_html__('Thumbnail', 'rr-addons'),
            'condition' => [
                'tp_design_style' => 'layout-2'
            ],
        ]
    );
    $this->add_control(
        'tp_image',
        [
            'label' => esc_html__( 'Choose Image', 'rr-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $this->add_responsive_control(
        'tp_image_overlap_x',
        [
            'label' => esc_html__( 'Image overlap position', 'rr-addons' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .tp-overlap img' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => array(
                'tp_image_overlap' => 'yes',
            ),
        ]
    );
    $this->end_controls_section();

    // Review group
    $this->start_controls_section(
        'review_list',
        [
            'label' => esc_html__( 'Review List', 'rr-addons' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $repeater = new \Elementor\Repeater();


    $repeater->add_control(
        'reviewer_image',
        [
            'label' => esc_html__( 'Reviewer Image', 'rr-addons' ),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'dynamic' => [
                'active' => true,
            ]
        ]
    );
    $repeater->add_control(
        'reviewer_name', [
            'label' => esc_html__( 'Reviewer Name', 'rr-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Rasalina William' , 'rr-addons' ),
            'label_block' => true,
        ]
    );        

    $repeater->add_control(
        'reviewer_title', [
            'label' => esc_html__( 'Reviewer Title', 'rr-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( '- CEO at YES Germany' , 'rr-addons' ),
            'label_block' => true,
        ]
    );
    $repeater->add_control(
        'review_content',
        [
            'label' => esc_html__( 'Review Content', 'rr-addons' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'rows' => 10,
            'default' => 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.',
            'placeholder' => esc_html__( 'Type your review content here', 'rr-addons' ),
        ]
    );
    $repeater->add_control(
        'reviewer_image_two',
        [
            'label' => esc_html__( 'Reviewer Image two', 'rr-addons' ),

            
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'dynamic' => [
                'active' => true,
            ]
        ]
    );
    $this->add_control(
        'reviews_list',
        [
            'label' => esc_html__( 'Review List', 'rr-addons' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' =>  $repeater->get_controls(),
            'default' => [
                [
                    'reviewer_name' => esc_html__( 'Rasalina William', 'rr-addons' ),
                    'reviewer_title' => esc_html__( '- CEO at YES Germany', 'rr-addons' ),
                    'review_content' => esc_html__( 'Put your trust in us &share in our people with a passion.We are motivated by the satisfaction H.Spond Asset Management is made up of a team of expert, committed and experienced for of clients financial markets. Our goal is to achieve continuous.', 'rr-addons' ),
                ],
                [
                    'reviewer_name' => esc_html__( 'Rasalina William', 'rr-addons' ),
                    'reviewer_title' => esc_html__( '- CEO at YES Germany', 'rr-addons' ),
                    'review_content' => esc_html__( 'Put your trust in us &share in our people with a passion.We are motivated by the satisfaction H.Spond Asset Management is made up of a team of expert, committed and experienced for of clients financial markets. Our goal is to achieve continuous.', 'rr-addons' ),
                ],
                [
                    'reviewer_name' => esc_html__( 'Rasalina William', 'rr-addons' ),
                    'reviewer_title' => esc_html__( '- CEO at YES Germany', 'rr-addons' ),
                    'review_content' => esc_html__( 'Put your trust in us &share in our people with a passion.We are motivated by the satisfaction H.Spond Asset Management is made up of a team of expert, committed and experienced for of clients financial markets. Our goal is to achieve continuous.', 'rr-addons' ),
                ],

            ],
            'title_field' => '{{{ reviewer_name }}}',
        ]
    );
 

    $this->end_controls_section();
    // TAB_STYLE
    $this->start_controls_section(
		'style_section_sub-title',
		[
			'label' => esc_html__( 'Sub Title', 'rr-addons' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);
	//sub title color
	$this->add_control(
		'title_color_sub-title',
		[
			'label' => esc_html__( 'Sub Title Color', 'rr-addons' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => esc_html__( '#34383C', 'rr-addons' ),
			'selectors' => [
				'{{WRAPPER}} .sub-title h6' => 'color: {{VALUE}}',
			],
		]
	);
	//sub title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'content_typography_sub-title',
			'selector' => '{{WRAPPER}} .sub-title h6',
		
		]
	);
	

	
	$this->end_controls_section();
	$this->start_controls_section(
		'style_section',
		[
			'label' => esc_html__( 'Heading ', 'rr-addons' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);
	//heding color
	$this->add_control(
		'title_color',
		[
			'label' => esc_html__( 'Heading Color', 'rr-addons' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => esc_html__( '#34383C', 'rr-addons' ),
			'selectors' => [
				'{{WRAPPER}} .Testimonials-section-titile h2' => 'color: {{VALUE}}',
			],
		]
	);
	//heading typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'content_typography',
			'selector' => '{{WRAPPER}} .Testimonials-section-titile h2',
		
		]
	);
	

	
	$this->end_controls_section();
    $this->start_controls_section(
		'style_section_des',
		[
			'label' => esc_html__( 'Description', 'rr-addons' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);
	//heding color
	$this->add_control(
		'title_color_dsc',
		[
			'label' => esc_html__( 'Duscription Color', 'rr-addons' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => esc_html__( '#34383C', 'rr-addons' ),
			'selectors' => [
				'{{WRAPPER}} .Testimonials-section-titile p' => 'color: {{VALUE}}',
			],
		]
	);
	//heading typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'content_typography_dsc',
			'selector' => '{{WRAPPER}} .Testimonials-section-titile p',
		
		]
	);
	

	
	$this->end_controls_section();

    $this->start_controls_section(
		'style_section_item',
		[
			'label' => esc_html__( 'Author Item', 'rr-addons' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);
	//heding color
	$this->add_control(
		'title_color_item_name',
		[
			'label' => esc_html__( 'Author Name Color', 'rr-addons' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => esc_html__( '#34383C', 'rr-addons' ),
			'selectors' => [
				'{{WRAPPER}} .author-name h3' => 'color: {{VALUE}}',
			],
		]
	);
	//heading typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'content_typography_item_name',
			'selector' => '{{WRAPPER}} .author-name h3',
		
		]
	);
		// author heding color
        $this->add_control(
            'title_color_item_author_titile',
            [
                'label' => esc_html__( 'Author Title Color', 'rr-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => esc_html__( '#34383C', 'rr-addons' ),
                'selectors' => [
                    '{{WRAPPER}} .author-title p' => 'color: {{VALUE}}',
                ],
            ]
        );
        //heading typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography_item_author_title',
                'selector' => '{{WRAPPER}} .author-title p',
            
            ]
        );
        	// author heding color
            $this->add_control(
                'title_color_item_author_dsc',
                [
                    'label' => esc_html__( 'Author Description Color', 'rr-addons' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => esc_html__( '#34383C', 'rr-addons' ),
                    'selectors' => [
                        '{{WRAPPER}} .paragraf p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            //heading typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography_item_author_dsc',
                    'selector' => '{{WRAPPER}} .paragraf p',
                
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
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_args', 'class', 'sectionTitle__big');
        ?>
    
    <div class="Testimonials">
            <div class="Testimonials-one">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                             <img src="https://rrdevs.net/demos/wp/techex/wp-content/uploads/2022/11/Arrow-4.png" alt="" class="float-left mr-4">
                            <div class="Testimonials-section-titile">
                            <?php if ( !empty($settings['tp_sub_title']) ) : ?> 
                                <div class="sub-title">
                                     <h6><?php echo esc_html( $settings['tp_sub_title'] ); ?></h6>
                                </div>
                                <?php endif; ?>
                                <?php
                                if ( !empty($settings['tp_title' ]) ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['tp_title_tag'] ),
                                    $this->get_render_attribute_string( 'title_args' ),
                                    esc_html( $settings['tp_title' ] )
                                    );
                                endif;
                                ?>
                                
                                <?php if ( !empty($settings['tp_desctiption']) ) : ?>
                                <p class="desc"><?php echo esc_html( $settings['tp_desctiption'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="overme owl-carousel">
                        <?php foreach ($settings['reviews_list'] as $index => $item) : 
                                if ( !empty($item['reviewer_image']['url']) ) {
                                    $tp_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id']) : $item['reviewer_image']['url'];
                                    $tp_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                                };
                                if ( !empty($item['reviewer_image']['url']) ) {
                                    $reviewer_image_two = !empty($item['reviewer_image_two']['id']) ? wp_get_attachment_image_url( $item['reviewer_image_two']['id']) : $item['reviewer_image_two']['url'];
                                    $tp_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                                }
                                  if ( !empty($item['reviewer_image']['url']) ) {
                                    $reviewer_image_two = !empty($item['reviewer_image_two']['id']) ? wp_get_attachment_image_url( $item['reviewer_image_two']['id']) : $item['reviewer_image_two']['url'];
                                    $tp_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                                }
                            ?>
                     <div class="item">
                            <div class="Testimonials-img">
                                <div class="card border-0 rounded p-4">
                                    <div class="girl-img d-flex align-items-center">
                                     
                                        <?php if ( !empty($tp_reviewer_image) ) : ?>
                                        <div class="author-img bg-center bg-cover">   
                                            <img src="<?php echo esc_url($tp_reviewer_image); ?>" alt="<?php echo esc_url($tp_reviewer_image_alt); ?>">
                                        </div>
                                        <?php endif; ?>
                                  
                                        <div class="author-name ml-4">
                                        <?php if ( !empty($item['reviewer_name']) ) : ?>
                                        <h3><?php echo esc_html($item['reviewer_name']); ?></h3>
                                        <?php endif; ?>
                                        <?php if ( !empty($item['reviewer_title']) ) : ?>
                                            <div class="author-title">
                                                <p><?php echo esc_html($item['reviewer_title']); ?></p>
                                             </div>
                                        <?php endif; ?>
                                        </div>
                                        <div class="qurae-element">
                                            <img src="https://rrdevs.net/demos/wp/techex/wp-content/uploads/2022/11/Quote-5.png" alt="">
                                        </div>
                                    </div>
                            

                                    <?php if ( !empty($item['review_content']) ) : ?>
                                        <div class="paragraf">
                                             <p class="my-4" ><?php echo esc_html($item['review_content']); ?></p>
                                        </div>
                                       
                                     <?php endif; ?>
                                     <?php if ( !empty($tp_reviewer_image) ) : ?>
                                        <div class="logo">   
                                            <img src="<?php echo esc_url($reviewer_image_two); ?>" alt="<?php echo esc_url($reviewer_image_two); ?>">
                                        </div>
                                        <?php endif; ?>
                                
                                </div>
                            </div>
                        </div>
                           <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    

        <?php
    }
}

$widgets_manager->register_widget_type(new \rr_Testimonail_three_Loop());