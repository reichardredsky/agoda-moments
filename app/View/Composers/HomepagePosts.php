<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class HomepagePosts extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.popular-posts'
    ];
    

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'posts' => $this->posts(),
        ];
    }

    protected function posts()
    {
       $args = [
            'post_type' => 'travel-tips',
            'posts_per_page' => 10,
            'status' => 'publish',
       ];

        $query = new WP_Query($args);

        if ( $query->have_posts() ) {
            $posts = array_map( function ( $post ) {
                $influencer = wp_get_post_terms( $post->ID, 'influencer' )[0];
                $current_language = apply_filters('wpml_current_language', null);
                $date = $current_language === 'th' ? $this->getBuddhistDate( date_create($post->post_date) ) : get_the_date('F j, Y', $post->ID);

                return (object) [
                    'title' => $post->post_title,
                    'link' => get_permalink($post),
                    'excerpt' => $post->post_excerpt,
                    'image' => get_the_post_thumbnail_url($post, 'full'),
                    'influencer_name' => $influencer->name,
                    'influencer_link' => get_term_link($influencer),
                    'influencer_avatar' => get_field('profile_picture', $influencer),
                    'date' => $date,
                ];

            }, $query->posts);

            wp_reset_postdata();

            return $posts;
        }

        return [];
    }

    private function getBuddhistDate( \DateTime $date)
    {
        $year = (int) $date->format('Y') + 543;
        $month = $date->format('F');
        $day = (int) $date->format('j');
        $month = __( $month, 'moments');

        return "{$day} {$month} {$year}";
    }
    
}
