<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Single extends Composer
{

    function __construct() {
        $post_id = get_queried_object_id();
        $views = get_field('views', $post_id);
        update_field('views', $views + 1, $post_id);
    }
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'social_share' => $this->socialShare(),
            'influencer_author' => $this->influencerAuthor(),
            'you_may_also_likes' => $this->youMayAlsoLike(),
        ];
    }

    public function socialShare()
    {
        return do_shortcode('[Sassy_Social_Share]');
    }

    public function influencerAuthor()
    {
        $post = get_queried_object();
        $influencer = wp_get_post_terms($post->ID, 'influencer')[0];
        $influencer->avatar = get_field('profile_picture', $influencer);
        $influencer->link = get_term_link($influencer);
        $influencer->date = get_the_date('F j, Y', $post->ID);

        return $influencer;
    }

    public function youMayAlsoLike()
    {
        $current_influencer = wp_get_post_terms(get_queried_object_id(), 'influencer')[0];

        $args = [
            'post_type' => 'travel-tips',
            'posts_per_page' => 10,
            'post_status' => 'publish',
            'post__not_in' => [get_queried_object_id()],
            'tax_query' => [
                [
                    'taxonomy' => 'influencer',
                    'field' => 'term_id',
                    'terms' => $current_influencer->term_id,
                ]
            ]
        ];

        $query = new \WP_Query($args);

        $you_may_also_like = array_map( function ( $post ) {

            return (object) [
                'title' => $post->post_title,
                'link' => get_permalink($post),
                'image' => get_the_post_thumbnail_url($post, 'full'),
                'excerpt' => get_the_excerpt($post),
            ];

        }, $query->posts);

        wp_reset_postdata();

        return $you_may_also_like;
    }

}
