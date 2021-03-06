<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('includes/theme-init.php');
require_once('includes/Info.class.php');

function path()
{
    echo bloginfo('template_url');
}

function url($link)
{
    echo bloginfo('url') . $link;
}

function placeholderImage()
{
    return bloginfo('template_url') . '/assets/images/placeholder.png';
}

function isStaging()
{
    return strpos(get_permalink(), 'staging') !== false ? true : false;
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function theme_name_wp_title($title, $sep)
{
    if (is_feed()) {
        return $title;
    }

    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo('name', 'display');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if (($paged >= 2 || $page >= 2) && !is_404()) {
        $title .= " $sep " . sprintf(__('Page %s', '_s'), max($paged, $page));
    }

    return $title;
}
add_filter('wp_title', 'theme_name_wp_title', 10, 2);
