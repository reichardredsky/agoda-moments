<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add custom image sizes.
     */
    add_image_size('featured', 1990, 700, true);

    /**
     * Add management of taxonomy translations for editors.
     * */
    $role = get_role( 'editor' );
    $role->add_cap( 'wpml_manage_string_translation', true );

    /**
     * Search Function
     */

    function search()
    {
        $string = $_POST['search'];

        $results = [
            'posts' => [],
            'influencers' => [],
            'countries' => []
        ];

        $posts_query = new \WP_Query([
            'post_type' => 'traveltips',
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

        $results['posts'] = $posts;

        $influencers_query = new \WP_Term_Query([
            'taxonomy' => 'influencer',
            'name__like' => $string,
        ]);

        $influencers = array_map( function ( $influencer ) {
            return (object) [
                'name' => $influencer->name,
                'link' => get_term_link($influencer),
                'description' => $influencer->description,
                'profile_picture' => get_field('profile_picture', $influencer),
            ];
        }, $influencers_query->terms);

        $results['influencers'] = $influencers;

        $countries_query = new \WP_Term_Query([
            'taxonomy' => 'country',
            'name__like' => $string,
        ]);

        $countries = array_map( function ( $country ) {
            return (object) [
                'name' => $country->name,
                'link' => get_term_link($country),
                'description' => $country->description,
                'thumbnail' => get_field('country_image', $country)['sizes']['thumbnail'] ?? '',
            ];
        }, $countries_query->terms);

        $results['countries'] = $countries;

        wp_reset_postdata();

        echo json_encode($results);

        die();
    }

    add_action('wp_ajax_nopriv_search', 'search');
    add_action('wp_ajax_search', 'search');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});


add_action( 'init', function() {
	register_post_type( 'travel-tips', array(
        'labels' => array(
            'name' => 'Travel Tips',
            'singular_name' => 'Travel Tip',
            'menu_name' => 'Travel Tips',
            'all_items' => 'All Travel Tips',
            'edit_item' => 'Edit Travel Tip',
            'view_item' => 'View Travel Tip',
            'view_items' => 'View Travel Tips',
            'add_new_item' => 'Add New Travel Tip',
            'add_new' => 'Add New Travel Tip',
            'new_item' => 'New Travel Tip',
            'parent_item_colon' => 'Parent Travel Tip:',
            'search_items' => 'Search Travel Tips',
            'not_found' => 'No travel tips found',
            'not_found_in_trash' => 'No travel tips found in Trash',
            'archives' => 'Travel Tip Archives',
            'attributes' => 'Travel Tip Attributes',
            'insert_into_item' => 'Insert into travel tip',
            'uploaded_to_this_item' => 'Uploaded to this travel tip',
            'filter_items_list' => 'Filter travel tips list',
            'filter_by_date' => 'Filter travel tips by date',
            'items_list_navigation' => 'Travel Tips list navigation',
            'items_list' => 'Travel Tips list',
            'item_published' => 'Travel Tip published.',
            'item_published_privately' => 'Travel Tip published privately.',
            'item_reverted_to_draft' => 'Travel Tip reverted to draft.',
            'item_scheduled' => 'Travel Tip scheduled.',
            'item_updated' => 'Travel Tip updated.',
            'item_link' => 'Travel Tip Link',
            'item_link_description' => 'A link to a travel tip.',
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array(
            0 => 'title',
            1 => 'editor',
            2 => 'excerpt',
            3 => 'thumbnail',
        ),
        'taxonomies' => array(
            0 => 'influencer',
            1 => 'country',
        ),
        'has_archive' => 'travel-tips',
        'rewrite' => array(
            'feeds' => false,
            'slug' => '%influencer%',
        ),
        'delete_with_user' => false,
    ) );

    add_rewrite_tag('%influencer%', '([^&]+)');

    add_rewrite_rule('^([^/]*)/([^/]*)/?', 'index.php?post_type=travel-tips&influencer=$matches[1]&name=$matches[2]', 'top');

} );

add_filter('post_type_link', function ($post_link, $post) {
    if ('travel-tips' === $post->post_type && $terms = wp_get_object_terms($post->ID, 'influencer')) {
        return str_replace('%influencer%', $terms[0]->slug, $post_link);
    }

    return $post_link;
}, 10, 2);

