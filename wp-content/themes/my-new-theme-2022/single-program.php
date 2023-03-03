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
            <a class="parent-link" href="<?php echo site_url('/programs'); ?>">
                <i class="fa fa-home"></i>
                All Programs
            </a> 
            <span class="current-page-title">
                <?php the_title(); ?>
            </span>
        </p>
    </div>

    <article class="post-item">   
        <div class="post-content">
            <?php 
                the_content(); 
                $relatedTeachers = get_field('related_teachers');
            ?>
        </div>
        <section>
        <h3 class="post-section-heading">Teachers Related To The Program</h3>
        <div class="gallery-cards"> 
            <?php 
                foreach ($relatedTeachers as $teacher) {
                      
            ?>
            <div class="teacher-card">
                <a href="<?php echo get_the_permalink($teacher); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url($teacher, 'teacher-card'); ?>"
                        alt="<?php echo get_the_title($teacher); ?>">
                    <span class="teacher-name">
                        <?php echo get_the_title($teacher); ?>   
                    </span>
                </a>
            </div> 
            <?php } ?>
                                                        
        </div>
    </section>  
    </article>
</div>
<?php 
} get_footer();
?>