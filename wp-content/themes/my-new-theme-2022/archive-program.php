<?php 
    get_header();
?>
    <div class="headings">
        <p class = "page-header"><?php
        if (get_post_type() == 'program') {
            echo 'All Our Programs';
        } else {
            the_archive_title();
        } 
        ?></p>
        <p class = "page-subtitle">Choose a program appropriate for you!<p>
    </div>
</header>

<div class="main-blogs">
    <section class="programs-gallery">
        <div class="gallery-cards post">
        <?php
            while(have_posts()) {
            the_post();
        ?>
            <div class="program-card-post" 
                    style="background-image:url(<?php 
                        if (get_the_post_thumbnail()) {
                            echo get_the_post_thumbnail_url(0, 'medium_large');
                        } else {
                            echo get_theme_file_uri('/images/program_back_default.jpg');
                        }
                    ?>;">
                    <h3><?php the_title(); ?></h3>
                    <p>
                        <?php echo wp_trim_words(get_the_content(), 20)."..."; ?>
                    </p>
                    <div class="learn-more-btn">
                        <a href="<?php the_permalink(); ?>">Learn more</a>
                    </div>
                </div>
        <?php
            }
        ?>
        </div>
    </section>  
</div>



<?php
    get_footer();
?>