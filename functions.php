<?php
// CSS va JavaScript fayllarni yuklash funksiyasi
function custom_theme_assets() {
    // WordPress jQuery-ni deregister qilish
    if (!is_admin()) {
        wp_deregister_script('jquery');
        // Yangi jQuery faylini yuklash
        wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null, true);
    }

    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.css', array(), null);

    // Icon Font CSS (flaticon)
    wp_enqueue_style('flaticon-css', get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.css', array(), null);

    // Font Awesome CSS
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/all.css', array(), null);

    // Icofont CSS
    wp_enqueue_style('icofont-css', get_template_directory_uri() . '/assets/css/icofont.css', array(), null);

    // Animate CSS
    wp_enqueue_style('animate-css', get_template_directory_uri() . '/assets/css/animate.min.css', array(), null);

    // Custom Theme Style
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css', array(), null);

    // Responsive CSS
    wp_enqueue_style('responsive-css', get_template_directory_uri() . '/assets/css/responsive.css', array(), null);

    // Popper.js (Bootstrap uchun kerak)
    wp_enqueue_script('popper-js', get_template_directory_uri() . '/assets/bootstrap/js/popper.min.js', array('jquery'), null, true);

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), null, true);

    // Contact form script
    wp_enqueue_script('contact-js', get_template_directory_uri() . '/assets/js/contact.js', array('jquery'), null, true);

    // Counter Up
    wp_enqueue_script('waypoints-js', get_template_directory_uri() . '/assets/js/jquery.waypoints.js', array('jquery'), null, true);
    wp_enqueue_script('counterup-js', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), null, true);

    // Easing
    wp_enqueue_script('easing-js', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array('jquery'), null, true);

    // WOW animation
    wp_enqueue_script('wow-js', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), null, true);

    // Custom JS
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), null, true);
}

// CSS va JavaScript fayllarni yuklash uchun WordPress hook qo'shish
add_action('wp_enqueue_scripts', 'custom_theme_assets');
?>