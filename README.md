# inventions

On the rhythm Findings

# WP Ajax Search Filter by User Meta

A lightweight, example WordPress plugin that demonstrates how to filter search results in Ajax-powered queries based on a user's saved metadata (e.g., language preference).

# Note:

This plugin is not affiliated with or designed for any specific paid plugin.
It is an educational example intended for developers to understand and implement WordPress Ajax search filtering.

# Features

Filters Ajax search results dynamically based on user meta (e.g., user_pre_lang).

Supports logged-in and logged-out users (if meta data is set).

Easily adaptable to different meta fields and taxonomies.

# Example Use Case

Imagine you have a site with multi-language posts and you store each user’s preferred language in user meta.
This plugin will:
=> 1. Detect the current user’s saved language.
=> 2. Modify the Ajax search query to return only posts in that language.

# How It Works

Hooks into wp*ajax*_ and wp*ajax_nopriv*_ for your custom Ajax action.
Reads the user meta (user_pre_lang) for the logged-in user.
Uses pre_get_posts to filter the query by the matching taxonomy term.

# Installation

Download or clone this repository into your wp-content/plugins directory.

# Adjust:

=> Ajax action name (custom_ajax_search)

=> User meta key (user_pre_lang)

=> Tag IDs in $tag_map

=> Activate the plugin from the WordPress admin panel.
