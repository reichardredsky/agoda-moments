<?php
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

try {
    \Roots\bootloader();
} catch (Throwable $e) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://docs.roots.io/acorn/2.x/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');

function __view($view, $data = []) {
    $view = new ViewHack($view, $data);

    return $view->render();
}

function load_more_influencers() {
    $per_page = $_POST['per_page'];
    $offset = ( $_POST['page'] ) * $per_page;
    $tax_args = [
        'taxonomy' => 'influencer',
        'hide_empty' => false,
        'offset' => $offset,
        'number' => $per_page,
    ];

    $influencers = get_terms($tax_args);

    $influencers = array_map( function ( $influencer ) {
        $influencer->profile_picture = get_field('profile_picture', $influencer)['sizes']['card-thumbnails'];
        $influencer->link = get_term_link($influencer);
        $influencer->name = $influencer->name;
        $influencer->description = $influencer->description;
        // $influencer->views = get_field('views', $influencer);

        return $influencer;
    }, $influencers);

    foreach ($influencers as $influencer) {
        echo view('components/influencer-profile', [
            'name' => $influencer->name,
            'description' => $influencer->description,
            'profile_url' => $influencer->profile_picture,
            'link' => $influencer->link,
        ]);
    }

    wp_die();

}

add_action('wp_ajax_nopriv_load_more_influencers', 'load_more_influencers');
add_action('wp_ajax_load_more_influencers', 'load_more_influencers');


/**
 * Search Function
 */

function search()
{
    $string = $_POST['search'];
    $is_header_search = $_POST['isHeaderSearch'];

    $results = [];

    $posts_query = new \WP_Query([
        'post_type' => 'travel-tips',
        'posts_per_page' => 10,
        's' => $string,
    ]);

    $posts = array_map( function ( $post ) {
        return (object) [
            'title' => $post->post_title,
            'link' => get_permalink($post),
            'excerpt' => $post->post_excerpt,
            'thumbnail' => get_the_post_thumbnail_url($post, 'thumbnail'),
        ];
    }, $posts_query->posts);

    array_push($results, $posts);

    $influencers_query = get_terms([
        'taxonomy' => 'influencer',
        'name__like' => $string
    ]);

    $influencers = array_map( function ( $influencer ) {
        return (object) [
            'title' => $influencer->name,
            'link' => get_term_link($influencer),
            'excerpt' => $influencer->description,
            'thumbnail' => get_field('profile_picture', $influencer),
        ];
    }, $influencers_query);

    array_push( $results, $influencers );

    $countries_query = get_terms([
        'taxonomy' => 'country',
        'name__like' => $string
    ]);

    $countries = array_map( function ( $country ) {
        return (object) [
            'title' => $country->name,
            'link' => get_term_link($country),
            'excerpt' => $country->description,
            'thumbnail' => get_field('country_image', $country)['sizes']['thumbnail'] ?? '',
        ];
    }, $countries_query);

    array_push($results, $countries);

    wp_reset_postdata();

    if ( $is_header_search ) {
        foreach( $results as $key => $resObject ) {
            if ( !empty($resObject) ) {
                foreach ( $resObject as $result ) {
                    echo view('components.search-result', [
                        'title' => $result->title,
                        'excerpt' => $result->excerpt,
                        'link' => $result->link,
                    ]);
                }
            }
        }
    } else {
        foreach ( $results as $key => $resObject ) {
            if ( !empty($resObject) ) {
                foreach ( $resObject as $result ) {
                    echo view('components.search-result', [
                        'title' => $result->title,
                        'link' => $result->link,
                        'excerpt' => $result->excerpt,
                        'thumbnail' => $result->thumbnail,
                    ]);
                }
            }
        }
    }

    wp_die();
}

add_action('wp_ajax_nopriv_search', 'search');
add_action('wp_ajax_search', 'search');

// $strings = [
//     'January',
//     'February',
//     'March',
//     'April',
//     'May',
//     'June',
//     'July',
//     'August',
//     'September',
//     'October',
//     'November',
//     'December'
// ];

// foreach ($strings as $string) {
//     do_action('wpml_register_single_string', 'moments', '', $string);
// }

// do_action('wpml_register_single_string', 'moments', '', 'Popular Agoda Travel Experts');