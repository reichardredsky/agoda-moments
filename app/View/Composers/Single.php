<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Single extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'single',
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
        ];
    }

    public function socialShare()
    {
        return do_shortcode('[Sassy_Social_Share]');
        // return null;
    } 
}
