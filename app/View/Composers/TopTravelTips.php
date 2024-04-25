<?php

namespace App\View\Composers;

use \IntlDateFormatter;
use Roots\Acorn\View\Composer;
use WP_Query;

class TopTravelTips extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*'
    ];
    

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'top_10_travel_tips' => $this->getTopTenTravelTips(),
        ];
    }

    protected function getTopTenTravelTips()
    {
        $args = [
            'post_type' => 'travel-tips',
            'posts_per_page' => 10,
            'post_status' => 'publish'
        ];

        $query = new WP_Query($args);
        $topTravelTips = $query->get_posts();
        $_topTravelTips = collect($topTravelTips)
            ->map(function($items) {
                $influencer = wp_get_post_terms($items->ID, 'influencer')[0];
                $influencer->avatar = get_field('profile_picture', $influencer);
                $influencer->link = get_term_link($influencer);

                $current_language = apply_filters('wpml_current_language', null);
                $date = $current_language === 'th' ? $this->getBuddhistDate( date_create($items->post_date) ) : get_the_date('F j, Y', $items->ID);

                return [
                    'title' => $items->post_title,
                    'content' => $items->post_content,
                    'image' => get_the_post_thumbnail_url($items->ID, 'full'),
                    'link' => get_permalink($items->ID),
                    'excerpt' => $items->post_excerpt,
                    'influencer' => $influencer,
                    'post_date' => $date,
                    'views' => get_field('views', $items->ID) !== null ? intval( get_field('views', $items->ID) ) : 0,
                ];
            });
        
        wp_reset_postdata();
        
        return $_topTravelTips->sortBy('views', SORT_NUMERIC)->reverse()->toArray();
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
