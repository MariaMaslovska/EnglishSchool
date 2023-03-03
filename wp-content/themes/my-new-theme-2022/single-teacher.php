<?php 
    get_header();
    while(have_posts()) {
        the_post();
?> 
    <div class="headings">
        <h2 class = "page-header"><?php the_title(); ?></h2>
        <p class = "page-subtitle">Learning through play makes the anxiety go away!</p>
    </div>
    
</header>

<div class="main-blogs">
    <div class="page-position">
        <p>
            <a class="parent-link" href="<?php echo site_url('/our-team'); ?>">
                <i class="fa fa-home"></i>
                Our Team
            </a> 
            <span class="current-page-title">
                <?php the_title(); ?>
            </span>
        </p>
    </div>

    <article class="post-item">   
        <div class="post-content teacher-profile">
            <picture>
                <source media="(max-width: 550px)" srcset="<?php 
                    echo get_the_post_thumbnail_url(0, 'teacher-card');
                ?>">
                <img src="<?php 
                    echo get_the_post_thumbnail_url(0, 'teacher-portrait');
                ?>" alt="<?php the_title(); ?>">
            </picture>
            <?php 
                the_content();
                //echo get_the_post_thumbnail(0, 'medium_large'); 
            ?>
        </div>
    </article>
    <?php } ?>
        <section class="programs-gallery">
            <h3 class="post-section-heading">Teacher's Programs</h3>
            <?php 
                $related_programs = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'program',
                    'meta_query' => array(
                        array(
                            'key' => 'related_teachers',
                            'compare' => 'LIKE',
                            'value' =>  '"'.get_the_ID().'"'
                        )
                    )
                ));

                while($related_programs -> have_posts()) {
                    $related_programs -> the_post();
            ?>
            <div class="gallery-cards post">
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
            </div>
            <?php } ?>
        </section> 

</div>
<?php 
get_footer();
?>