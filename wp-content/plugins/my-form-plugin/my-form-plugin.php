<?php

/*
    Plugin Name: My Form Plugin
    Author: Mariia Maslovska
    Version: 1.0
*/

function my_form_settings_page() {
    add_options_page(
        'My Form Settings',
        'My Form',
        'manage_options',
        'my-form-settings',
        'my_form_settings_html'
    ); 
}

function my_form_settings_html() {
    ?>
        <h1>Enroll Form Settings</h1>
        <form method='post' action="options.php">
            <?php 
                settings_fields('my_form_group');
                do_settings_sections('my-form-settings');
                submit_button(); 
            ?>
        </form>
    <?php
}

add_action('admin_menu', 'my_form_settings_page');

function my_form_settings() {
    add_settings_section(
        'my_form_section',
        'Enroll form general settings',
        NULL,
        'my-form-settings'
    );
    register_setting(
        'my_form_group',
        'my_form_title',
        array(
            'default' => 'Use the following form to enroll in classes',
            'sanitize_callback' => 'sanitize_text_field'
        ),
    );
    add_settings_field(
        'my_form_title',
        'Enroll form title',
        'my_form_title_html',
        'my-form-settings',
        'my_form_section'
    );
    register_setting(
        'my_form_group',
        'my_form_select_program',
        array(
            'default' => '1',
            'sanitize_callback' => 'sanitize_text_field'
        ),
    );
    add_settings_field(
        'my_form_select_program',
        'Enroll form title select enable',
        'my_form_select_program_html',
        'my-form-settings',
        'my_form_section'
    );
}

function my_form_title_html() {
    ?> 
        <input 
            type="text" 
            value="<?php echo get_option('my_form_title'); ?>" 
            name='my_form_title'
        >
    <?php
}

function my_form_select_program_html() {
    ?>
        <input 
            type="checkbox" 
            name='my_form_select_program'
            value='1'
            <?php checked(get_option('my_form_select_program', '1')); ?>
        >
    <?php
}

add_action('admin_init', 'my_form_settings');

function enroll_form_html() {
    ?> 
    <section id="enroll-form">
        <h3 class="post-section-heading"><?php echo get_option('my_form_title'); ?></h3>
        <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
            <input type="hidden" name="action" value="enroll">

            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter your full name"><br>

            <label for="email">Email<abbr title="required field">*</abbr></label>
            <input type="email" required="" name="email" placeholder="Enter your email"><br>
            
            <?php if (get_option('my_form_select_program')) {

            
            
            ?>
            <label for="program">Course you are interested in:</label><br>
            <select name="program" id="program">
                <option value="Learn" selected>I don't know, just want to learn.</option>
                <?php 
                    $programs = new WP_Query(array(
                        'post_type' => 'program',
                        'posts_per_page' => -1
                    ));
                    while($programs -> have_posts()) {
                        $programs -> the_post();
                        ?> 
                            <option value="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </option>
                        <?php
                    }
                    wp_reset_postdata();
                ?>       
            </select><br>
            <?php } ?>


            <label for="comment">Comment</label><br>
            <textarea name="comment" id="comment" cols="50" maxlength="250" rows="5" placeholder="Enter your message here."></textarea><br>
            
            <input type="submit" name="enroll-submit" value="Send">
        </form>
    </section>
    <?php
}

function handle_enroll_form($name) {
    $valid = true;
    if (isset($_POST['enroll-submit'])) {
        $name = '';
        if (!empty($_POST['name'])) {
            $name = sanitize_text_field($_POST['name']);
        } else {
            $name = 'No name '.rand(0, 1000);
        }

        $email = '';
        if (!isset($_POST['email'])) {
            $valid = false;
        } else {
            $email = sanitize_email($_POST['email']);
            if (!$email) {
                $valid = false;
            }
        }

        $comment = '';
        if (!empty($_POST['comment'])) {
            $comment = sanitize_textarea_field($_POST['comment']);
        } else {
            $comment = 'No comments ...';
        }

        $program = '';
        if (!empty($_POST['program'])) {
            $program = sanitize_text_field($_POST['program']);
                $all_programs = new WP_Query(array(
                    'post_type' => 'program',
                    'posts_per_page' => -1
                ));

                $flag = false;
                while($all_programs -> have_posts()) {
                    $all_programs -> the_post();
                    if ($program === get_the_title()) {
                        $flag = true;
                        break;
                    }
                }

                if (!$flag) {
                    $program = "I don't know, just want to learn.";
                }
                wp_reset_postdata();
        } else {
            $program = "Not specified";
        }

        $form_content = '';
        if ($valid) {
            $form_content = 'Name: '.$name.'<br>';
            $form_content .= 'Email: '.$email.'<br>';
            $form_content .= 'Program: '.$program.'<br>';
            $form_content .= 'Comment: '.$comment.'<br>';

            wp_insert_post(array(
                'post_title' => $name.' - '.wp_date('d.m.Y h:i'),
                'post_type' => 'message',
                'post_content' => $form_content,
                'post_status' => 'publish',
                'meta_input' => array(
                    'email' => $email
                )
            ));
        
            wp_safe_redirect(site_url('thank-you'));  
            exit;
        } else {
            wp_safe_redirect(site_url('ooops'));
            exit;
        }

    }
}

add_action('admin_post_enroll', 'handle_enroll_form');
add_action('admin_post_nopriv_enroll', 'handle_enroll_form');

add_action('get_footer', 'enroll_form_html');