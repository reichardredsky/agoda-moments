<?php

/**
 * Theme filters.
 */

namespace App;

use \WP_Query;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter('wp63_js_vars', function($vars){
    return array_merge( $vars, []);
});

/**
 * Gets the cities of the posts of an influencer.
 * 
 * @param \WP_Term $influencer
 * 
 * @return array
 */
add_filter('get_user_cities', function ( $influencer ) {
    $args = [
        'post_type' => 'travel-tips',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'influencer',
                'field' => 'term_id',
                'terms' => $influencer->term_id,
            ],
        ],
    ];
    
    $influencer_posts = new WP_Query( $args );

    $cities = array_map( function ( $post ) {
        $terms = wp_get_post_terms( $post->ID, 'country' );
        $terms = collect( $terms )->where('parent', '!=', 0)->toArray();
        
        return $terms;
    }, $influencer_posts->posts);

    $cities = collect($cities)->flatten()->toArray();

    $cities = array_map( function ( $city ) {
        return (object) [
            'name' => $city->name,
            'slug' => $city->slug,
        ];
    }, $cities);

    wp_reset_postdata();

    return collect($cities)->filter()->toArray();
});