<?php 

 $query_args = [
    'posts_per_page' => $settings['posts_per_page'],
    'post_type' => 'service',
    'orderby' => $settings['orderby'],
    'order' => $settings['order'],
];
// get_type
if ( 'selected' === $settings['post_by'] ) {
    $query_args['post__in'] = (array)$settings['post__in'];
}
if ( 'category' === $settings['post_by'] ) {
    foreach( (array)$settings['category'] as $cat ){
        $query_args['tax_query'][] = array(
            array(
                'taxonomy' => 'service-category',
                'field'    => 'slug',
                'terms'    => $cat,
            )
        );
    }
}
$the_query = new WP_Query($query_args);
?>