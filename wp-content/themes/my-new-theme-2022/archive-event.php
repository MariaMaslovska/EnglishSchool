<?php 
    get_header();
?>
    <div class="headings">
        <p class = "page-header"><?php
        if (get_post_type() == 'event') {
            echo 'All Our Events';
        } else {
            the_archive_title();
        } 
        ?></p>
        <p class = "page-subtitle">Don't miss our interesting events!<p>
    </div>
</header>
<main class="page-main"> 
 
<?php
    while(have_posts()) {
    the_post();
?>

<div class="event-summary">
    <a class="event-summary-date" href="<?php the_permalink(); ?>">
        <span class="event-summary-month">
        <?php 
            echo date('M', strtotime(get_field('event_date'))); 
        ?>
        </span>
        <span class="event-summary-day">
        <?php 
            echo date('d', strtotime(get_field('event_date'))); 
        ?> 
        </span>
    </a>
    <div class="event-summary-content">
        <h5 class="event-summary-title">
            <a href="<?php the_permalink(); ?>">
               <?php the_title(); ?>
            </a>
        </h5>
        <p>
        <?php 
            if (has_excerpt()) {
                the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 20)."...";
            }
        ?>
            <a href="<?php the_permalink(); ?>" class="read-more-link">
                Read more
            </a>
        </p>
    </div>
</div>

<?php
    } echo paginate_links();
    ?>
    <hr>
    <p>Look on our <a href="<?php echo site_url('/past-events'); ?>">past events</a>.</p>
</main>

<?php
    get_footer();
?>