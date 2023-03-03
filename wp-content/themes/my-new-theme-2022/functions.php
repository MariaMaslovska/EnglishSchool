<?php
    function my_theme_files() {
        wp_enqueue_style('my-theme-styles', get_stylesheet_uri());
        wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/89e8d497c2.js');
    } 

    add_action('wp_enqueue_scripts', 'my_theme_files');

    function my_theme_features() {
        add_theme_support('title-tag');
        add_theme_support( 'post-thumbnails');
        add_image_size('teacher-card', 400, 260, true);
        add_image_size('teacher-portrait', 400, 660, true);
    }
    add_action('after_setup_theme','my_theme_features');

    function edit_query($query) {
        $today = date('Ymd');
        if (!is_admin() && $query->is_main_query() && is_post_type_archive('event')) {
            $query -> set('posts_per_page', 2);
            $query -> set('meta_key', 'event_date');
            $query -> set('order', 'ASC');
            $query -> set('orderby', 'meta_value_num');
            $query -> set('meta_query', array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            ));
        }
    }

    add_action('pre_get_posts', 'edit_query');

?>