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
class Techex_blog_post extends \Elementor\Widget_Base
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
        return 'techex-blog-post';
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
        return __('Techex Blog Post', 'techex-hp');
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
        return 'eicon-post-list';
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

        $this->add_control(
            'number_per_page',
            [
                'label'       => __('Number Of Post', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default'     => '3',
                'description' => 'user emtry value show all posts',
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => __('Post Order By', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => techex_get_post_orderby_options(),
                'default' => 'date',
                'label_block' => true,

            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __('Post Order', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => [
                    'asc' => 'Ascending',
                    'desc' => 'Descending',
                ],
                'default' => 'desc',
                'label_block' => true,

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

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
                'label' => __( 'Image Border', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single-blog-card .blog-featured-thumb',
			]
		);

        $this->add_control(
			'image_radius',
			[
				'label' => esc_html__( 'Image Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .single-blog-card .blog-featured-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'htitle',
			[
				'label' => __( 'Title Style', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Title Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-blog-card .content h3 a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_hover_color',
			[
				'label' => esc_html__( 'Title Hover Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-blog-card .content h3 a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => esc_html__( 'Title Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single-blog-card .content h3 a',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => __('Title Margin', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .single-blog-card .content h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .excerpt p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Description Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .excerpt p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_responsive_control(
            'desc_padding',
            [
                'label'      => __('Description Margin', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .excerpt p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
			'button',
			[
				'label' => __( 'Button Style', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-blog-card .content .post-top-meta a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Button Hover Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-blog-card .content .post-top-meta a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__( 'Button Typography', 'techex-hp' ),
				'selector' => '{{WRAPPER}} .single-blog-card .content .post-top-meta a',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

        $this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Button BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-blog-card .content .post-top-meta a' => 'background: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'button_hover_bg_color',
			[
				'label' => esc_html__( 'Button Hover BG Color', 'techex-hp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-blog-card .content .post-top-meta a:hover' => 'background: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => __('Button Padding', 'techex-hp'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .single-blog-card .content .post-top-meta a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

            <div class="row">

            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
            );
            $cpt_query = new WP_Query($args);
            if ($cpt_query->have_posts()) :
            while ($cpt_query->have_posts()) : $cpt_query->the_post(); ?>

                <div class="col-lg-6 col-12" data-aos="fade-up">
                    <div class="single-blog-card single-blog-card_2">
                        <div class="blog-featured-thumb bg-cover" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
                        <div class="content">
                            <div class="post-top-meta d-flex flex-wrap align-items-center">
                                <div class="post-date">
                                    <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"><i class="fas fa-tag"></i>' . esc_html( $categories[0]->name ) . '</a>';
                                        }
                                     ?>
                                </div>
                                <div class="post-comment">
                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-calendar-alt"></i><?php the_time( 'F j, Y' );?></a>
                                </div>
                                <div class="post-comment">
                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-book-open"></i>2 min</a>
                                </div>
                            </div>

                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="excerpt">
                                <p><?php echo wp_trim_words( get_the_content(), 18, '...' ); ?></p>
                            </div>
                            <div class="author">
                               <div class="author_img">
                               <?php
                                $users = wp_get_current_user();
                                if ( $users ) : ?>
                                    <img src="<?php echo esc_url( get_avatar_url( $users->ID ) ); ?>" />
                                <?php endif; ?>
                               </div>
                               <h5><?php echo get_the_author(); ?></h5>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <?php 
            endwhile;
            endif; 
            wp_reset_postdata();
            ?>

            <?php
            $numabr_of_post = !empty($settings['number_per_page']) ? $settings['number_per_page'] : -1;
            $args = array(
                'post_type' => 'post',
                'orderby' => $settings['orderby'],
                'order'   => $settings['order'],
                'posts_per_page' => $numabr_of_post,
            );
            $cpt_query = new WP_Query($args);
            if ($cpt_query->have_posts()) : ?>
                <div class="col-lg-6">
               <?php while ($cpt_query->have_posts()) : $cpt_query->the_post(); ?>
                    <div class="single-blog-card single-blog-card_3 d-sm-flex d-block align-items-center">
                        <div class="blog_img">
                            <div class="blog-featured-thumb blog-featured-thumb_2 bg-cover " style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                                <div class="author_img">
                                    <?php
                                    $user = wp_get_current_user();
                                    if ( $user ) : ?>
                                        <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="post-top-meta d-flex flex-wrap align-items-center">
                                <div class="post-date">
                                    <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"><i class="fas fa-tag"></i>' . esc_html( $categories[0]->name ) . '</a>';
                                        }
                                     ?>
                                </div>
                                <div class="post-comment">
                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-calendar-alt"></i><?php the_time( 'F j, Y' );?></a>
                                </div>
                                <div class="post-comment">
                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-book-open"></i>2 min</a>
                                </div>
                            </div>
                            <h3 class=" mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div>
                    </div>
                

                <?php 
            endwhile;
            endif; 
            wp_reset_postdata();
            ?>
            </div>

            </div>
 
<?php  }

}
$widgets_manager->register_widget_type(new \Techex_blog_post());