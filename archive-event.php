<!-- "archive-(post type).php" is used to display archived posts based on named post type -->
<?php

    // this function outputs content of header.php
    get_header();

?>

<div class="page-banner">
    <!-- 'get_theme_file_uri()' oupouts the location of the theme folder -->
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">All Events</h1>
    <div class="page-banner__intro">
        <p>See what is going on in our world.</p>
    </div>
    </div>  
</div>

<div class="container container--narrow page-section">

<?php
    // loops through posts
    while (have_posts()) {
        // 'the_post()' is used to iterate the post index in the loop
        the_post(); ?>

        <div class="event-summary">
            <!-- 'the_permalink()' outputs a link. In this case to the post -->
            <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                <!-- 'the_time()' outputs the date and time in different formats of a post -->
                <span class="event-summary__month"><?php the_time('M'); ?></span>
                <span class="event-summary__day"><?php the_time('d'); ?></span>  
            </a>
            <div class="event-summary__content">
                <!-- 'the_permalink()' outputs a link. In this case to the post -->
                <!-- 'the_title()' outputs the title of a post -->
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <!-- 'wp_trim_words()' shortens selected content to a designated amount of words -->
                <!-- 'the_permalink()' outputs a link. In this case to the post -->
                <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
            </div>
        </div>

    <?php
    }

    // this function retrieves paginated links for archived posts
    echo paginate_links();
?>

</div>

<?php

    // this function outputs content of footer.php
    get_footer();

?>