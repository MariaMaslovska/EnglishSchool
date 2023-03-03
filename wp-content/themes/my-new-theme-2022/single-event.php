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
            <a class="parent-link" href="<?php echo site_url('/events'); ?>">
                <i class="fa fa-home"></i>
                Events Home
            </a> 
            <span class="current-page-title">
                Event date
                <time datetime="<?php date('Y-d-m', strtotime(get_field('event_date'))); ?>">
                    <?php echo date('d/m/Y', strtotime(get_field('event_date'))); ?>
                </time>
            </span>
        </p>
    </div>
    <article class="post-item">
        
        <div class="post-content">
            <?php the_content(); ?>
        </div>
    </article>
</div>
<?php 
} get_footer();
?>