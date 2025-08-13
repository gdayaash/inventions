<?php
/*
Plugin Name: WP Ajax Search Filter by User Meta
Author: Your Name
Description: Example plugin to filter search results via Ajax requests based on a user meta field (e.g., language preference).
Version: 1.0
*/

if (!defined('ABSPATH')) exit;

/**
 * Modify the main query for Ajax search requests to filter posts
 * based on the current user's language preference.
 */
function custom_userlang_ajax_filter() {
    // Example: Adjust to match your Ajax action name
    $is_custom_ajax_request = defined('DOING_AJAX') 
        && DOING_AJAX 
        && isset($_REQUEST['action']) 
        && $_REQUEST['action'] === 'custom_ajax_search';

    if (!$is_custom_ajax_request) {
        return;
    }

    $user_id = get_current_user_id();
    $userLang = $user_id ? get_user_meta($user_id, 'user_pre_lang', true) : '';

    // Map language names to tag IDs 
    //Feel free too according to your Tag Id's
    $tag_map = [
        'Hindi'   => 705, 
        'English' => 706
    ];

    if (!$userLang || !isset($tag_map[$userLang])) {
        return;
    }

    add_action('pre_get_posts', function($query) use ($tag_map, $userLang) {
        if ($query->is_main_query()) {
            $query->set('post_type', ['post']);
            $query->set('tax_query', [
                [
                    'taxonomy' => 'post_tag',
                    'field'    => 'term_id',
                    'terms'    => [$tag_map[$userLang]],
                    'operator' => 'IN',
                ]
            ]);
        }
    }, 1);
}
add_action('wp_ajax_custom_ajax_search', 'custom_userlang_ajax_filter');
add_action('wp_ajax_nopriv_custom_ajax_search', 'custom_userlang_ajax_filter');
