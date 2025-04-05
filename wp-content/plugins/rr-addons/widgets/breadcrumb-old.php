<?php
namespace Finest_Addons\Widgets;


if (!defined('ABSPATH')) {
    exit;
}
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Breadcrumb extends Widget_Base
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
        return 'rr-addons-breadcrumb';
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
        return __('Breadcrumb', 'rr-addons');
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
        return 'eicon-yoast';
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
        return ['rr-addons'];
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
                'label' => __('Content', 'rr-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'separator',
            [
                'label' => __('Separator', 'rr-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __(' . ', 'rr-addons'),
                'label_block' => false,
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'rr-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'rr-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'rr-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'rr-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'rr-addons'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tiem_style',
            [
                'label' => __('Time', 'rr-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'breadcroumb_style_tabs'
        );
        $this->start_controls_tab(
            'breadcroumb_style_normal_tab',
            [
                'label' => __('Normal', 'rr-addons'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'breadcroumb_typography',
                'label' => __('Typography', 'rr-addons'),
                'selector' => '{{WRAPPER}} .rr-addons-breadcrumbs',
            ]
        );
        $this->add_control(
            'breadcroumb_color',
            [
                'label' => __('Color', 'rr-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-breadcrumbs span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'breadcroumb_link_color',
            [
                'label' => __('Link Color', 'rr-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-breadcrumbs a span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'breadcroumb_style_hover_tab',
            [
                'label' => __('Hover', 'rr-addons'),
            ]
        );
        $this->add_control(
            'breadcroumb_color_hover',
            [
                'label' => __('Color', 'rr-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-breadcrumbs span:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'breadcroumb_link_color_hover',
            [
                'label' => __('Link Color', 'rr-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rr-addons-breadcrumbs a:hover span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
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
        echo  $this->rr_addons_breadcrumbs($settings['separator']); ?>
<?php
    }
    
    public function generate_breadCrumb_title()
    {
        $rr_addons = get_option('rr-addons');
        $title = '';
        if (is_home() || is_front_page()) {
            $title = isset($rr_addons['bp_title']) ? esc_html($rr_addons['bp_title']) : esc_html__('Our Blog', 'rr-addons');
        } elseif ('case-study' == rr_addons_get_archive_post_type()) {
            $title = isset($rr_addons['cs_title']) ? esc_html($rr_addons['cs_title']) : esc_html__('Case Study', 'rr-addons');
        } elseif ('job' == rr_addons_get_archive_post_type()) {
            $title = isset($rr_addons['job_title']) ? esc_html($rr_addons['job_title']) : esc_html__(' Current job openings', 'rr-addons');
        } elseif (is_page()) {
            $title = get_the_title();
        } elseif (is_single()) {
            $title = get_the_title();
        } elseif (function_exists('is_shop') && is_shop()) {
            $title = isset($rr_addons['shop_title']) ? esc_html($rr_addons['shop_title']) : esc_html__('Our Products', 'rr-addons');
        } elseif (is_archive()) {
            $title = get_the_archive_title();
        } elseif (is_search()) {
            $title = esc_html__('Search results for: ', 'rr-addons') . get_search_query();
        }
        return $title;
    }

    public static function rr_addons_breadcrumbs($seperator = ' . ')
    {
        $sepOpt = $seperator;
        /* === OPTIONS === */
        $text['home'] = esc_html__('Home', 'rr-addons'); // text for the 'Home' link
        $text['category'] = esc_html__('Archive by Category "%s"', 'rr-addons'); // text for a category page
        $text['search'] = esc_html__('Search Results for "%s" Query', 'rr-addons'); // text for a search results page
        $text['tag'] = esc_html__('Posts Tagged "%s"', 'rr-addons'); // text for a tag page
        $text['author'] = esc_html__('Articles Posted by %s', 'rr-addons'); // text for an author page
        $text['404'] = esc_html__('Error 404', 'rr-addons'); // text for the 404 page
        $text['page'] = esc_html__('Page %s', 'rr-addons'); // text 'Page N'
        $text['cpage'] = esc_html__('Comment Page %s', 'rr-addons'); // text 'Comment Page N'
        $wrap_before = '<div class="rr-addons-breadcrumbs">'; // the opening wrapper tag
        $wrap_after = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
        $sep = $sepOpt; // separator between crumbs
        $sep_before = '<span class="sep">'; // tag before separator
        $sep_after = '</span>'; // tag after separator
        $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
        $show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $show_current = 1; // 1 - show current page title, 0 - don't show
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
        $output = '';
        /* === END OF OPTIONS === */
        global $post;
        $home_url = esc_url(home_url('/'));
        $link_before = '<span >';
        $link_after = '</span>';
        $link_attr = '';
        $link_in_before = '<span>';
        $link_in_after = '</span>';
        $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
        $frontpage_id = get_option('page_on_front');
        if (is_page()) {
            $parent_id = $post->post_parent;
        }
        $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
        $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;
        if (is_home() || is_front_page()) {
            if ($show_on_home) {
                $output .= $wrap_before . $home_link . $wrap_after;
            }
        } else {
            $output .= $wrap_before;
            if ($show_home_link) {
                $output .= $home_link;
            }
            if (is_category()) {
                $cat = get_category(get_query_var('cat'), false);
                if ($cat->parent != 0) {
                    $cats = get_category_parents($cat->parent, true, $sep);
                    $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                    $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                    if ($show_home_link) {
                        $output .= $sep;
                    }
                    $output .= $cats;
                }
                if (get_query_var('paged')) {
                    $cat = $cat->cat_ID;
                    $output .= $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
                } else {
                    if ($show_current) {
                        $output .= $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
                    }
                }
            } elseif (is_search()) {
                if (have_posts()) {
                    if ($show_home_link && $show_current) {
                        $output .= $sep;
                    }
                    if ($show_current) {
                        $output .= $before . sprintf($text['search'], get_search_query()) . $after;
                    }
                } else {
                    if ($show_home_link) {
                        $output .= $sep;
                    }
                    $output .= $before . sprintf($text['search'], get_search_query()) . $after;
                }
            } elseif (is_day()) {
                if ($show_home_link) {
                    $output .= $sep;
                }
                $output .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
                $output .= sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
                if ($show_current) {
                    $output .= $sep . $before . get_the_time('d') . $after;
                }
            } elseif (is_month()) {
                if ($show_home_link) {
                    $output .= $sep;
                }
                $output .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
                if ($show_current) {
                    $output .= $sep . $before . get_the_time('F') . $after;
                }
            } elseif (is_year()) {
                if ($show_home_link && $show_current) {
                    $output .= $sep;
                }
                if ($show_current) {
                    $output .= $before . get_the_time('Y') . $after;
                }
            } elseif (is_single() && !is_attachment()) {
                if ($show_home_link) {
                    $output .= $sep;
                }
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    if ($show_current) {
                        $output .= $before . get_the_title() . $after;
                    }
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    $cats = get_category_parents($cat, true, $sep);
                    if (!$show_current || get_query_var('cpage')) {
                        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                    }
                    $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                    $output .= $cats;
                    if (get_query_var('cpage')) {
                        $output .= $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                    } else {
                        if ($show_current) {
                            $output .= $before . get_the_title() . $after;
                        }
                    }
                }
                // custom post type
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                if (get_query_var('paged')) {
                    $output .= $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
                } else {
                    if ($show_current) {
                        $output .= $sep . $before . $post_type->label . $after;
                    }
                }
            } elseif (is_attachment()) {
                if ($show_home_link) {
                    $output .= $sep;
                }
                $parent = get_post($parent_id);
                $cat = get_the_category($parent->ID);
                $cat = $cat[0];
                if ($cat) {
                    $cats = get_category_parents($cat, true, $sep);
                    $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                    $output .= $cats;
                }
                printf($link, get_permalink($parent), $parent->post_title);
                if ($show_current) {
                    $output .= $sep . $before . get_the_title() . $after;
                }
            } elseif (is_page() && !$parent_id) {
                if ($show_current) {
                    $output .= $sep . $before . get_the_title() . $after;
                }
            } elseif (is_page() && $parent_id) {
                if ($show_home_link) {
                    $output .= $sep;
                }
                if ($parent_id != $frontpage_id) {
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        if ($parent_id != $frontpage_id) {
                            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                        }
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        $output .= $breadcrumbs[$i];
                        if ($i != count($breadcrumbs) - 1) {
                            $output .= $sep;
                        }
                    }
                }
                if ($show_current) {
                    $output .= $sep . $before . get_the_title() . $after;
                }
            } elseif (is_tag()) {
                if (get_query_var('paged')) {
                    $tag_id = get_queried_object_id();
                    $tag = get_tag($tag_id);
                    $output .= $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
                } else {
                    if ($show_current) {
                        $output .= $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
                    }
                }
            } elseif (is_author()) {
                global $author;
                $author = get_userdata($author);
                if (get_query_var('paged')) {
                    if ($show_home_link) {
                        $output .= $sep;
                    }
                    $output .= sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
                } else {
                    if ($show_home_link && $show_current) {
                        $output .= $sep;
                    }
                    if ($show_current) {
                        $output .= $before . sprintf($text['author'], $author->display_name) . $after;
                    }
                }
            } elseif (is_404()) {
                if ($show_home_link && $show_current) {
                    $output .= $sep;
                }
                if ($show_current) {
                    $output .= $before . $text['404'] . $after;
                }
            } elseif (has_post_format() && !is_singular()) {
                if ($show_home_link) {
                    $output .= $sep;
                }
                $output .= get_post_format_string(get_post_format());
            }
            $output .= $wrap_after;
            return $output;
        }
    }
}



$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Breadcrumb() );