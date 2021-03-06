<?php

    function university_files() {
        // add script files to web pages
        wp_enqueue_script('main_university_js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
        // add css files to web pages
        wp_enqueue_style('custom_google_fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('university_main_styles', get_stylesheet_uri());
    }

    // 'add_action()' adds hooks that launch at specific points
    // in this case it launches 'university_files' function when scripts and styles enqueue
    add_action('wp_enqueue_scripts', 'university_files');

    function university_features() {
        // 'register_nav_menu()' adds a menu that users can edit in the dashboard. menus must be added to pages using 'wp_nav_menu()'
        // register_nav_menu('headerMenuLocation', 'Header Menu Location');
        // register_nav_menu('footerLocationOne', 'Footer Location One');
        // register_nav_menu('footerLocationTwo', 'Footer Location Two');
        // 'add_theme_support()' registers theme support for a given feature
        add_theme_support('title_tag');
    }

    // 'add_action()' adds hooks that launch at specific points
    // in this case it launches 'university_features' function after theme is loaded
    add_action('after_setup_theme', 'university_features');

    function university_adjust_queries($query) {
        if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {

            $today = date('Ymd');

            $query->set('meta_key', 'event_date');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'ASC');
            $query->set('meta_query', array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                )
            ));
        }
    }

    // 'add_action()' adds hooks that launch at specific points
    // in this case it launches 'university_adjust_queries' function before the posts data is gotten
    add_action('pre_get_posts', 'university_adjust_queries');



// add to university-post-types.php 

// Program Post Type
register_post_type('program', array(
    'supports' => array('title', 'editor'),
    'rewrite' => arrau('slug' => 'programs'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
        'name' => 'Programs',
        'add_new_item' => 'Add New Program',
        'edit_item' => 'Edit Program',
        'all_items' => 'All Programs',
        'singular_name' => 'Program'
    ),
    'menu_icon' => 'dashicons-awards'
));
?>