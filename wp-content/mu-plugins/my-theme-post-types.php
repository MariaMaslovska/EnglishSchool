<?php
    function my_post_types() {
        register_post_type(
            'event', array(
                'show_in_rest' => true,
                'supports' => array('title', 'excerpt', 'editor'),
                'has_archive' => true,
                'public' => true,
                'menu_icon' => 'dashicons-calendar',
                'rewrite' => array('slug' => 'events'),
                'labels' => array(
                    'name' => 'Events',
                    'add_new_item' => 'Add Event',
                    'edit_item' => 'Edit Event',
                    'singular_name' => 'Event',
                    'all_items' => 'All Events'
                )
            )
        );

        register_post_type(
            'teacher', array(
                'show_in_rest' => true,
                'supports' => array('title', 'thumbnail', 'editor'),
                'public' => true,
                'menu_icon' => 'dashicons-welcome-learn-more',
                'rewrite' => array('slug' => 'teachers'),
                'labels' => array(
                    'name' => 'Teachers',
                    'add_new_item' => 'Add Teacher',
                    'edit_item' => 'Edit Teacher',
                    'singular_name' => 'Teacher',
                    'all_items' => 'All Teachers'
                )
            )
        );

        register_post_type(
            'program', array(
                'show_in_rest' => true,
                'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes'),
                'has_archive' => true,
                'public' => true,
                'menu_icon' => 'dashicons-media-document',
                'rewrite' => array('slug' => 'programs'),
                'labels' => array(
                    'name' => 'Programs',
                    'add_new_item' => 'Add Program',
                    'edit_item' => 'Edit Program',
                    'singular_name' => 'Program',
                    'all_items' => 'All Programs'
                )
            )
        );

        register_post_type(
            'message', array(
                'show_in_rest' => true,
                'supports' => array('title', 'editor'),

                'public' => true,
                'publicly_queryable' => false,

                'menu_icon' => 'dashicons-email-alt',
                'rewrite' => array('slug' => 'messages'),
                'labels' => array(
                    'name' => 'Messages',
                    'add_new_item' => 'Add Message',
                    'edit_item' => 'Edit Message',
                    'singular_name' => 'Message',
                    'all_items' => 'All Messages'
                )
            )
        );
    }

    add_action('init', 'my_post_types');
?>