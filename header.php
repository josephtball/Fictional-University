<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!-- this function adds the "lang" attribute to the html tag -->
    <head>
        <!-- this function displays info about the site. In this case the charset -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- this function fires wp_head action. Which adds necessary info the the head -->
        <?php wp_head(); ?>
    </head>
    <!-- this function lets WP add classes to the body tag -->
    <body <?php body_class(); ?>>
        <header class="site-header">
            <div class="container">
                <!-- 'echo site_url()' outputs the root site url -->
                <h1 class="school-logo-text float-left"><a href="<?php echo site_url() ?>"><strong>Fictional</strong> University</a></h1>
                <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
                <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
                <div class="site-header__menu group">
                    <nav class="main-navigation">
                        <!-- <?php
                            // this function creates a menu that can be customized in the WP dashboard
                            // "theme_location" is the name for the menu in this location
                            wp_nav_menu(array(
                                'theme_location' => 'headerMenuLocation'
                            ));
                        ?> -->

                        <ul>
                            <!-- if statement checks if the current page is the 'about-us' page or if the post's parent post has an id of 20. If true gives class attribute to <li> -->
                            <!-- 'echo site_url()' outputs the root site url -->
                            <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 20) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
                            <li><a href="#">Programs</a></li>
                            <li <?php if (get_post_type() == 'event') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
                            <li><a href="#">Campuses</a></li>
                            <!-- if statement checks if the current page has a post type of "post". If true gives class attribute to <li> -->
                            <!-- 'echo site_url()' outputs the root site url -->
                            <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
                        </ul>
                    </nav>
                    <div class="site-header__util">
                        <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                        <a href="#" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
                        <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </header>