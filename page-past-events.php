<!-- "archive-(post type).php" is used to display archived posts based on named post type -->
<?php

    // this function outputs content of header.php
    get_header();

?>

<div class="page-banner">
    <!-- 'get_theme_file_uri()' oupouts the location of the theme folder -->
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">Past Events</h1>
    <div class="page-banner__intro">
        <p>A recap of our past events.</p>
    </div>
    </div>  
</div>

<div class="container container--narrow page-section">

<?php
    $today = date('Ymd');

    // this line of code is setting up a custom query using a WP class used for quering
    $pastEvents = new WP_Query(array(
        'paged' => get_query_var('paged', 1),
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',        
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => $today,
                'type' => 'numeric'
            )
        )
    ));

    // loops through posts
    while ($pastEvents->have_posts()) {
        // 'the_post()' is used to iterate the post index in the loop
        $pastEvents->the_post(); ?>

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
    echo paginate_links(array(
        'total' => $pastEvents->max_num_pages
    ));
?>

</div>

<?php

    // this function outputs content of footer.php
    get_footer();

?>