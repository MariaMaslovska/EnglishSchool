<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <header id="main-header" style="background-image: url(<?php
        if (is_front_page()) {
            echo get_theme_file_uri('/images/banner.jpg');
        } else {
            echo get_theme_file_uri('/images/page_banner.jpg');
        }
    ?>);">
        <div id="main-header-top">
            <h1>
                <a href="<?php echo get_site_url(); ?>">Potter Speaks <strong>English School</strong></a>
            </h1>
            <i class="fa fa-bars"></i>
            <nav id="main-navigation">
                <a <?php
                    if (is_page('about-us') || wp_get_post_parent_ID(0) == 2) {
                        echo "class='current-menu-item'";
                    }?>
                href="<?php echo site_url('/about-us'); ?>">About Us</a>
                <a <?php
                    if (get_post_type() == 'program' || is_page('programs')) {
                        echo "class='current-menu-item'";
                    }?>
                href="<?php echo site_url('/programs'); ?>">Programs</a>
                <a <?php
                    if (get_post_type() == 'event' || is_page('past-events')) {
                        echo "class='current-menu-item'";
                    }?>
                href="<?php echo site_url('/events'); ?>">Events</a>
                <a <?php
                    if (get_post_type() == 'post') {
                        echo "class='current-menu-item'";
                    }?>
                href="<?php echo site_url('/blog'); ?>">Blog</a>             
            </nav>
        </div>
        <!-- <div class="headings front">
        <p class = "page-header">Welcome!</p>
        <p class = "page-subtitle">Learning with patient is always awarded.<p>
    </div>
</header> -->