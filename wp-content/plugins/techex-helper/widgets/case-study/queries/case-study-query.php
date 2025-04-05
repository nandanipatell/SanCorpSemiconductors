<?php
if (!defined('ABSPATH')) {
    exit;
}
$include_categories = array();
$exclude_tags = array();
$include_tags = array();
$include_authors = array();
$exclude_categories = array();
$exclude_authors = array();
$current_post_id = '';
$column_class = '';
$columns = $settings['post_grid'];

$is_include_cat    = in_array( 'category', $settings['include_by'] );
$is_include_tag    = in_array( 'tags', $settings['include_by'] );
$is_include_author = in_array( 'author', $settings['include_by'] );
$is_exclude_cat    = in_array( 'category', $settings['exclude_by'] );
$is_exclude_tag    = in_array( 'tags', $settings['exclude_by'] );
$is_exclude_author = in_array( 'author', $settings['exclude_by'] );

switch ($columns) {
    case 'col-md-4':
        $column_class = "col-xl-4 col-lg-6 col-md-6";
        break;
    case 'col-md-3':
        $column_class = "col-lg-3 col-md-6";
        break;
    case 'col-md-6':
        $column_class = "col-md-6";
        break;
    case 'col-md-12':
        $column_class = "col-md-12";
        break;
    default:
        $column_class = "col-md-4";
}

if ( 0 != count( $settings['include_categories'] ) ) {
    $include_categories['tax_query'] = [
        'taxonomy' => 'case-study-category',
        'field'    => 'slug',
        'terms'    => $settings['include_categories'],
    ];
}
if ( 0 != count( $settings['include_tags'] ) ) {
    $include_tags = implode( ',', $settings['include_tags'] );
}
if ( 0 != count( $settings['include_authors'] ) ) {
    $include_authors = implode( ',', $settings['include_authors'] );
}
if ( 0 != count( $settings['exclude_categories'] ) ) {
    $exclude_categories['tax_query'] = [
        'taxonomy' => 'case-study-category',
        'operator' => 'NOT IN',
        'field'    => 'slug',
        'terms'    => $settings['exclude_categories'],
    ];
}
if ( 0 != count( $settings['exclude_tags'] ) ) {
    $exclude_tags['tax_query'] = [
        'taxonomy' => 'case-study-tag',
        'operator' => 'NOT IN',
        'field'    => 'slug',
        'terms'    => $settings['exclude_tags'],
    ];
}
if ( 0 != count( $settings['exclude_authors'] ) ) {
    $exclude_authors = implode( ',', $settings['exclude_authors'] );
}
if ( in_array( 'current_post', $settings['exclude_by'] ) && is_single() && 'case-study' == get_post_type() ) {
    $current_post_id = get_the_ID();
}
// var_dump($settings['exclude_categories']);
if ( 'related' == $settings['source'] && is_single() && 'case-study' == get_post_type() ) {
    $related_categories = get_the_terms( get_the_ID(), 'case-study-category' );
    $related_cats       = [];
    if ( $related_categories ) {
        foreach ( $related_categories as $related_cat ) {
            $related_cats[] = $related_cat->slug;
        }
    }
    $the_query = new WP_Query( array(
        'posts_per_page' => $settings['posts_per_page'],
        'post_type'      => 'case-study',
        'orderby'        => $settings['orderby'],
        'order'          => $settings['order'],
        'post__not_in'   => array( $current_post_id ),
        'paged'          => $paged,
        'tax_query'      => array(
            array(
                'taxonomy' => 'case-study-category',
                'operator' => 'IN',
                'field'    => 'slug',
                'terms'    => $related_cats,
            ),
        ),
    ) );
} elseif ( 'manual_selection' == $settings['source'] ) {
    $the_query = new WP_Query( array(
        'posts_per_page' => $settings['posts_per_page'],
        'post_type'      => 'case-study',
        'orderby'        => $settings['orderby'],
        'order'          => $settings['order'],
        'paged'          => $paged,
        'post__in'       => ( 0 != count( $settings['manual_selection'] ) ) ? $settings['manual_selection'] : array(),
    ) );
} else {
    $the_query = new WP_Query( array(
        'posts_per_page' => $settings['posts_per_page'],
        'post_type'      => 'case-study',
        'orderby'        => $settings['orderby'],
        'order'          => $settings['order'],
        'paged'          => $paged,
        'case-study-tag'    => ( $is_include_tag && 0 != count( $settings['include_tags'] ) ) ? $include_tags : '',
        'post__not_in'   => array( $current_post_id ),
        'author'         => ( $is_include_author && 0 != count( $settings['include_authors'] ) ) ? $include_authors : '',
        'author__not_in' => ( $is_exclude_author && 0 != count( $settings['exclude_authors'] ) ) ? $exclude_authors : '',
        'tax_query'      => array(
            'relation' => 'AND',
            ( $is_exclude_tag && 0 != count( $settings['exclude_tags'] ) ) ? $exclude_tags : '',
            ( $is_exclude_cat && 0 != count( $settings['exclude_categories'] ) ) ? $exclude_categories : '',
            ( $is_include_cat && 0 != count( $settings['include_categories'] ) ) ? $include_categories : '',
        ),
    ) );
}