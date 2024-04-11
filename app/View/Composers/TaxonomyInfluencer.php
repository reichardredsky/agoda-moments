<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class TaxonomyInfluencer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.influencer-page-header',
        'taxonomy-influencer',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'influencer_profile' => $this->influencerProfile(),
            'socials' => $this->socials(),
            'posts' => $this->influencerPosts(),
        ];
    }

    public function override()
    {
        return [
            'top_10_travel_tips' => $this->getTopTenTravelTips(),
            'title' => $this->title(),
        ];
    }

    public function influencerProfile () {
        $influencer = get_queried_object();
        $influencer->avatar = get_field('profile_picture', $influencer);
        $influencer->cover_photo = get_field('profile_background_image', $influencer)['sizes']['featured'] ?? '';
        $influencer->link = get_term_link($influencer);
        $influencer->influencer_title = get_field('influencer_title', $influencer);
        return $influencer;
    }

    public function socials() {
        $influencer = get_queried_object();
        $social_list = [
            'facebook',
            'x_twitter',
            'instagram',
            'tiktok',
            'youtube',
        ];

        $socials = array_map( function ($social) use ($influencer) {
            $social_link = get_field($social . '_social_link', $influencer);
            if ($social_link) {
                return [
                    'name' => $social,
                    'link' => $social_link,
                ];
            }
        }, $social_list);

        return collect($socials)->filter()->toArray();
    }

    public function influencerPosts()
    {
        $influencer = get_queried_object();
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

        $query = new \WP_Query($args);

        $posts = array_map( function ($post) {
            $influencer = get_queried_object();
            $influencer_avatar = get_field('profile_picture', $influencer);
            $influencer_link = get_term_link($influencer);

            return (object) [
                'title' => $post->post_title,
                'link' => get_permalink($post),
                'date' => get_the_date('F j, Y', $post),
                'excerpt' => get_the_excerpt($post),
                'influencer_avatar' => $influencer_avatar,
                'influencer_link' => $influencer_link,
                'influencer_name' => $influencer->name,
                'image' => get_the_post_thumbnail_url($post, 'full'),
            ];
        }, $query->posts);

        wp_reset_postdata();

        return $posts;
    }

    public function getTopTenTravelTips()
    {
        $args = [
            'post_type' => 'travel-tips',
            'posts_per_page' => 10,
            'post_status' => 'publish',
            'tax_query' => [
                [
                    'taxonomy' => 'influencer',
                    'field' => 'term_id',
                    'terms' => get_queried_object()->term_id,
                ],
            ],
        ];

        $query = new \WP_Query($args);

        $posts = collect($query->posts)->map(function( $post ) {
            $influencer = wp_get_post_terms($post->ID, 'influencer')[0];
            $influencer->avatar = get_field('profile_picture', $influencer);
            $influencer->link = get_term_link($influencer);
            
            return [
                'title' => $post->post_title,
                'content' => $post->post_content,
                'image' => get_the_post_thumbnail_url($post->ID, 'full'),
                'link' => get_permalink($post->ID),
                'excerpt' => $post->post_excerpt,
                'influencer' => $influencer,
                'post_date' => get_the_date('F j, Y', $post->ID),
                'views' => get_field('views', $post->ID) !== null ? intval( get_field('views', $post->ID) ) : 0,
            ];
        });
    
        wp_reset_postdata();

        return $posts;
    }

    public function title()
    {
        $title_string = __('%s\'s Travel Tips');

        return sprintf($title_string, get_queried_object()->name);
    }
}
