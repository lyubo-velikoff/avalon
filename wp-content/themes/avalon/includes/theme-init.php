<?php

/* Event */
// function post_type_event()
// {
//     register_post_type(
//         'event',
//         array(
//             'label' => __('Events'),
//             'public' => true,
//             'show_ui' => true,
//             'show_in_nav_menus' => false,
//             'menu_position' => 5,
//             'supports' => array(
//                 'title',
//                 'thumbnail',
//                 'page-attributes',
//                 'editor',
//                 'excerpt'
//             ),
//             'labels' => array(
//                 'add_new' => 'Add Event',
//                 'edit_item' => 'Edit Event',
//                 'view_item' => 'View Event',
//                 'add_new_item' => 'Add a Event',
//             )
//         )
//     );
// }
// add_action('init', 'post_type_event');

/* General */

function avalon_setup()
{
    update_option('image_default_link_type', '');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

}

add_action('after_setup_theme', 'avalon_setup');

/* Required Plugins manager */
require_once('class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'avalon_register_required_plugins' );

function avalon_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
         array(
                'name'               => '', // The plugin name.
                'slug'               => '', // The plugin slug (typically the folder name).
                'source'             => ', // The plugin source.
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url'       => '', // If set, overrides default API URL and points to an external URL.
                'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
            ),
     */
    $plugins = array(
        // doesnt exist anymore
        // array(
        //     'name' => 'Contact Form DB',
        //     'slug' => 'contact-form-7-to-database-extension',
        //     'source' => 'https://downloads.wordpress.org/plugin/contact-form-7-to-database-extension.2.10.9.zip',
        //     'required' => true,
        //     'force_activation' => true,
        // ),
        array(
            'name' => 'Email Subscribers',
            'slug' => 'email-subscribers',
            'source' => 'https://downloads.wordpress.org/plugin/email-subscribers.3.2.6.zip',
            'required' => true,
            'force_activation' => true,
        ),
        array(
            'name' => 'Advanced Custom Fields',
            'slug' => 'advanced-custom-fields',
            'source' => 'https://downloads.wordpress.org/plugin/advanced-custom-fields.4.4.11.zip',
            'required' => true,
            'force_activation' => true,
        ),
        // array(
        //     'name' => 'Advanced Custom Fields Repeater & Flexible Content Fields Collapser',
        //     'slug' => 'advanced-custom-field-repeater-collapser',
        //     'source' => 'https://downloads.wordpress.org/plugin/advanced-custom-field-repeater-collapser.1.4.3.zip',
        //     'required' => true,
        //     'force_activation' => true,
        // ),
    );

    tgmpa( $plugins );
}
