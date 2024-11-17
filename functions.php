<?php
add_theme_support( 'custom-logo');
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

 // registratsiya oblastey menu
 function glo_academy_menus(){
    //sobirayem neskolko zon (oblastey) menu
    $locations = array(
      'header' => __('Header Menu', 'glo_academy'),
      'footer'=> __('Footer', 'glo_academy'),
    );
    //registriruem oblast menu
    register_nav_menus( $locations );
  }
  // huk sobitiya,init bulganda band_digital_menus functiya
  add_action( 'init', 'glo_academy_menus' );

  //bootstrap menu
  class bootstrap_4_walker_nav_menu extends Walker_Nav_menu {

    function start_lvl( &$output, $depth = 0,$args = null ){ // ul
        $indent = str_repeat("\t",$depth); // indents the outputted HTML
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ // li a span

    $indent = ( $depth ) ? str_repeat("\t",$depth) : '';

    $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = 'dropdown-menu';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

        $attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';

        $item_output = $args->before;
        $item_output .= ( $depth > 0 ) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }}

?>