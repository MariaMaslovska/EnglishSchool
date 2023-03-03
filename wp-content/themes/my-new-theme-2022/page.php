<?php
    get_header();

    while (have_posts()) {
        the_post();

?>
    <div class="headings">
        <p class = "page-header"><?php the_title(); ?></p>
        <p class = "page-subtitle">Learning with patient is always awarded.<p>
    </div>
</header>

<main class="page-main">
    <?php
        $parentId = wp_get_post_parent_id(get_the_ID());
        $pageChildren = get_pages(array('child_of' => get_the_ID()));
        if ($parentId || $pageChildren) {
            the_page_nav($parentId);
        }
    ?>

    <div class="page-position">
        <p>
            <a class="parent-link" href="
                <?php 
                    if ($parentId) {
                        echo get_permalink($parentId);
                    } else {
                        echo get_site_url();
                    }
                ?>
            ">
                <i class="fa fa-home"></i>
                Back to 
                <?php 
                    if ($parentId) {
                        echo get_the_title($parentId);
                    } else {
                        echo "Home";
                    }
                ?>
            </a>
            <span class="current-page-title">
                <?php echo the_title(); ?>
            </span>
        </p>
    </div>
    
    <div class="generic-content">
        <?php the_content(); ?>
    </div>
    <?php
        if (is_page('our-team')) {
            $teachers = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'teacher'
            ));
    ?>
    <section>
        <h3 class="post-section-heading">Let Us Introduce Our Teachers</h3>
        <div class="gallery-cards">
            <?php while ($teachers -> have_posts()) { 
            $teachers -> the_post();?>
            <div class="teacher-card">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(0, 'teacher-card'); ?>"
                        alt="<?php the_title(); ?>">
                    <?php 
                        // the_post_thumbnail('teacher-card'); 

                    ?>
                    <span class="teacher-name">
                        <?php the_title(); ?>   
                    </span>
                </a>
            </div>
            <?php } wp_reset_postdata(); ?>                                              
        </div>
    </section>
    <?php
        }
    ?>

</main>

<?php 
    } 
    get_footer();

    function the_page_nav($parentId) {
?>

    <nav class="page-links">
        <h2 class="parent-title">
            <a href="<?php echo the_permalink($parentId); ?>">
                <?php echo get_the_title($parentId); ?>
            </a>
        </h2>
        <ul>
            <?php
                $childOf = $parentId ? $parentId : get_the_ID();
                wp_list_pages(array(
                    'child_of' => $childOf,
                    'sort_column' => 'menu_order',
                    'title_li' => NULL
                ));
            ?>
        </ul>
    </nav>
<?php
    }
?>