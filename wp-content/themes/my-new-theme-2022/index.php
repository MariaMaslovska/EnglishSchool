<?php 
    get_header();
?>
    <div class="headings front">
        <p class = "page-header">Welcome to our Blog!</p>
        <p class = "page-subtitle">Latest news, interesting articles and so on not so far ...<p>
    </div>
</header>
<div class="main-blogs">
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
</div>
<?php
    get_footer();
?>

<!-- header, footer є частинними шаблонами -->
<!-- 
    варто створювати повторювані шаблони і два класичні з них це header i footer, які поміщаємо в окремі файли і підтягуємо, де це необхідно,
    за допомогою функцій get_header, get_footer
-->

<!-- Перезавантажувати через ctrl + shift + R -->