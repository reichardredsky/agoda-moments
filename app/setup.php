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
    wp_enqueue_script('agoda/messaging-client', '/messaging-client/messaging-client-full.js', [], null, true);
    wp_enqueue_script('agoda/messaging-client-worker', '/messaging-client/messaging-client-worker.js', [], null, true);
    wp_enqueue_script('agoda/common-js', '/messaging-client/agoda-common-script.js', [], null, true);

    $current_language = ICL_LANGUAGE_CODE;

	if( $current_language === 'en' ) {
		$current_language = 'en-us';
    }

    switch ( $_SERVER['SERVER_NAME'] ) {
        case 'wpmomentsdev.wp.agoda.com':
            $environment = 'development';
        break;
        case 'wpmomentsstg.wp.agoqa.com':
            $environment = 'staging';
        break;
        case 'wpmomentsprd.wp.agoda.com':;
            $environment = 'production-internal';
        default:
            $environment = 'production';
            break;
    }

    $lang = 'en-us';

    if ( ICL_LANGUAGE_CODE !== 'en' ) {
        $lang = ICL_LANGUAGE_CODE;
    }

    $search_lang = [
        'en-us' =>	'1',
        'fr-fr' =>	'2',
        'de-de' =>	'3',
        'it-it' =>	'4',
        'es-es' =>	'5',
        'ja-jp' =>	'6',
        'zh-hk' =>	'7',
        'zh-cn' =>	'8',
        'ko-kr' =>	'9',
        'el-gr' =>	'10',
        'ru-ru' =>	'11',
        'pt-pt' =>	'12',
        'nl-nl' =>	'13',
        'en-ca' =>	'14',
        'en-in' =>	'15',
        'en-gb' =>	'16',
        'en-za' =>	'17',
        'en-au' =>	'18',
        'en-sg' =>	'19',
        'zh-tw' =>	'20',
        'en-nz' =>	'21',
        'th-th' =>	'22',
        'ms-my' =>	'23',
        'vi-vn' =>	'24',
        'sv-se' =>	'25',
        'id-id' =>	'26',
        'pl-pl' =>	'27',
        'nb-no' =>	'28',
        'da-dk' =>	'29',
        'fi-fi' =>	'30',
        'cs-cz' =>	'31',
        'tr-tr' =>	'32',
        'ca-es' =>	'33',
        'hu-hu' =>	'34',
        'hi-in' =>	'35',
        'bg-bg' =>	'36',
        'ro-ro' =>	'37',
        'sl-si' =>	'38',
        'he-il' =>	'39',
        'ar-ae' =>	'40',
        'nl-be' =>	'41',
        'en-ie' =>	'42',
        'pt-br' =>	'43',
        'es-ar' =>	'44',
        'es-mx' =>	'45',
        'lt-lt' =>	'46',
        'lv-lv' =>	'47',
        'hr-hr' =>	'48',
        'et-ee' =>	'49',
        'uk-ua' =>	'50',
        'tl-ph' =>	'51',
    ];
    
    

    $jsvars = apply_filters('wp63_js_vars', [
        'device_id' => wp_is_mobile() ? 4 : 1,
        'page_type_id' => 6003, 
        'server' => $_SERVER['SERVER_NAME'],
        'http_method' => $_SERVER['REQUEST_METHOD'],
        'http_referer' => @$_SERVER['HTTP_REFERER'],
        'query_string' => $_SERVER['QUERY_STRING'],
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'site_url' => site_url(),
            'current_language' => $current_language,
            'messaging_worker' => '/messaging-client/messaging-client-worker.js' ,
            'messaging_polyfills' => '/messaging-client/messaging-client-polyfills.js' ,
            'config' => [
                'mode' => 'production',
                'blogCidApi' => '/api/blog/findcid'
        ],
        'environment' => $environment,
        'search_suggestion' => "/Search/Search/GetUnifiedSuggestResult/3/{$search_lang[$lang]}/1/0/{$lang}/",
        'l10n' => [
          'iso_date_format' => __('D MMM YYYY', 'agoda'),
          'Please enter the name of a country, city, airport, neighborhood, landmark, or property to proceed.' => __( 'Please enter the name of a country, city, airport, neighborhood, landmark, or property to proceed.', 'agoda' ),
          'Enter a destination or property' => __( 'Enter a destination or property', 'agoda' ),
          '%1$d adults, %2$d children' => __( '%1$d adults, %2$d children', 'agoda' ),
          '%d adults' => __( '%d adults', 'agoda' ),
          '%d children' => __( '%d children', 'agoda' ),
          '%d rooms' => __( '%d rooms', 'agoda' ),
        ]
    ]);
    
    wp_localize_script('app/1', 'wp63', $jsvars);
    
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

    add_image_size('card-thumbnails', 507, 338, true, ['center', 'center']);

    add_image_size('mobile-card-thumbnails', 369, 238, true);

    add_image_size('horizontal-card-thumbnails', 378, 262, true);

    add_image_size('you-may-also-like', 252, 197, true);

    add_image_size('you-may-also-like-cards', 369, 239, true);

    add_image_size('influencer-avatar', 70, 70, true, ['center', 'center']);

    add_image_size('popular-influencer-profile', 248.01, 248.01, true, ['center', 'center']);

    /**
     * Add management of taxonomy translations for editors.
     * */
    $role = get_role( 'editor' );
    $role->add_cap( 'wpml_manage_string_translation', true );
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

