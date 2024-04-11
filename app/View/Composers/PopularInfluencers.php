<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class PopularInfluencers extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.popular-influencers'
    ];
    

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'influencers' => $this->influencers(),
            'perPage' => $this->perPage(),
        ];
    }

    protected function influencers()
    {
        $tax_args = [
            'taxonomy' => 'influencer',
            'hide_empty' => false,
            'offset' => 0,
            'number' => 12,
        ];

        $social_links = [
            'facebook',
            'instagram',
            'x_twitter',
            'youtube',
            'tiktok',
        ];

        $influencers = get_terms($tax_args);

        $influencers = array_map( function ( $influencer ) use ( $social_links ) {
            $influencer->profile_picture = get_field('profile_picture', $influencer);
            $influencer->link = get_term_link($influencer);
            $influencer->name = $influencer->name;
            $influencer->description = $influencer->description;
            // $influencer->views = get_field('views', $influencer);

            return $influencer;
        }, $influencers);
        
        return $influencers;
    }

    protected function perPage()
    {
        return 12;
    }
    
}
