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
        $influencer->profile_picture = get_field('profile_picture', $influencer);
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