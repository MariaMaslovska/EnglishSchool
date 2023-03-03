<?php 
    get_header();
    ?>
    <div class="headings">
        <p class = "page-header"><?php
        the_archive_title();
        ?></p>
        <p class = "page-subtitle"><p>
    </div>
</header>
<main class="page-main">
    <div class="page-position">
        <p>
            <a class="parent-link" href="<?php echo get_site_url('/blog'); ?>">
                <i class="fa fa-home"></i>
                Back to Home Blog
            </a>
            <span class="current-page-title">
                <?php the_title(); ?>
            </span>
        </p>
    </div>
    
    <?php
        while(have_posts()) {
        the_post();
    ?>
    <article class="post-item">
        <header>
            <h2 class='post-title'><a href="<?php the_permalink(); ?>">
                <?php the_title(); ?></a>
            </h2>
            <div class='post-meta'>
                Posted by <?php the_author_posts_link(); ?> on 
                <time datetime="<?php the_time('Y-d-m'); ?>">
                    <?php the_time('d/m/Y'); ?>
                </time> in <?php echo get_the_category_list(', '); ?>
            </div>
        </header>
        <div class="post-content">
            <p><?php the_excerpt(); ?></p>
        </div>
        <footer class="post-footer">
            <a href="<?php the_permalink(); ?>">Continue reading</a>
        </footer>
    </article>

<?php
    } echo paginate_links();
?>
</main>

<?php
    get_footer();
?>