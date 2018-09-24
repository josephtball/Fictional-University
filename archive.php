<!-- "archive.php" is used to display archived posts based oh author, category, date, etc. -->
<?php

    // this function outputs content of header.php
    get_header();

?>

<div class="page-banner">
    <!-- 'get_theme_file_uri()' oupouts the location of the theme folder -->
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php the_archive_title(); ?>
        <!-- <?php if (is_category()) {
                single_cat_title();
            }
            if (is_author()) {
                echo 'Posts by '; the_author();
            }
        ?> -->
    </h1>
    <div class="page-banner__intro">
        <p><?php the_archive_description(); ?></p>
    </div>
    </div>  
</div>

<div class="container container--narrow page-section">

<?php
    // loops through posts
    while (have_posts()) {
        // 'the_post()' is used to iterate the post index in the loop
        the_post(); ?>

        <div class="post-item">
            <!-- 'the_permalink()' outputs a link. In this case to the post -->
            <!-- 'the_title()' outputs the title of a post -->
            <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <div class="metabox">
                <!-- 'the_author_posts_link()' outputs a link to the authors page -->
                <!-- 'the_time()' outputs the date and time in different formats of a post -->
                <!-- 'get_category_list()' outputs the categories of a post. The seperater of categories is the perameter -->
                <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></p>
            </div>

            <div class="generic-content">
                <!-- 'the_excerpt()' outputs the excerpt for a post -->
                <?php the_excerpt(); ?>
                <!-- 'the_permalink()' outputs a link. In this case to the post -->
                <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
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