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
                            <!--  -->
                            <span class="event-summary__month"><?php
                                $eventDate = new DateTime(get_field('event_date'));
                                echo $eventDate->format('M');
                            ?></span>
                            <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>  
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

<hr class='section-break'>
<p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events') ?>">Check out our past events archive</a>.</p>

</div>

<?php

    // this function outputs content of footer.php
    get_footer();

?>