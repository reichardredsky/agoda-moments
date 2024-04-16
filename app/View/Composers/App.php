<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'siteBreadcrumbs' => $this->siteBreadcrumbs(),
            'copy_right_text' => $this->copyRightText(),
            'featured_image' => $this->featuredImage(),
            'menu_items' => $this->menuItems(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * Returns the site description.
     *
     * @return array
     */
    public function siteBreadcrumbs() {
        $breadcrumbs_arr = [
            ['name' => __('Home', 'moments'), 'url' => 'https://www.agoda.com/'],
            ['name' => __('Agoda Travel Tips', 'moments'), 'url' => home_url('/')]
        ];

        if (is_tax()) {
            $taxonomy = get_queried_object();
            $term = $taxonomy->name;
            $breadcrumbs_arr[] = ['name' => $term, 'url' => get_term_link($taxonomy)];
        }

        if (is_single()) {
            $post = get_queried_object();
            $influencer = count(get_the_terms($post->ID, "influencer")) ? get_the_terms($post->ID, "influencer")[0] : null;

            if ($influencer) {
                $breadcrumbs_arr[] = ['name' => $influencer->name, 'url' => get_term_link($influencer)];
            }

            $breadcrumbs_arr[] = ['name' => $post->post_title, 'url' => get_permalink($post)];
            
        }

        return $breadcrumbs_arr;
    }

    public function copyRightText() {
        $copy_right_text = get_field('copy_right_text', 'option');

        return $copy_right_text;
    }

    public function featuredImage() {
        $featured_image = get_field('hero_image', 'option');

        return $featured_image;
    }

    private function menuItems()
    {
        $menu = wp_get_nav_menu_items('main-menu');
        $menuItems = [];
        foreach ($menu as $item) {
            $menuItems[] = (object) [
                'title' => $item->title,
                'url' => $item->url,
                'target' => $item->target,
                'active' => $item->current,
            ];
        }
        return $menuItems;
    }
}
