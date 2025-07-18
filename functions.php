<?php
function kcg_scripts()
{
    wp_enqueue_style('kcg-style', get_stylesheet_uri());

    wp_enqueue_script('lottie', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.0/lottie.min.js', [], null, true);
    wp_enqueue_script('kcg-header-scroll', get_template_directory_uri() . '/assets/js/header-scroll.js', [], null, true);
    wp_enqueue_style('kcg-header-style', get_template_directory_uri() . '/assets/css/header.css');
    
    
    wp_enqueue_style('kcg-divider-style', get_template_directory_uri() . '/assets/css/divider.css');
    
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', [], null, true);
    wp_enqueue_script('kcg-tagline', get_template_directory_uri() . '/assets/js/hero-tagline.js', ['gsap'], null, true);
    wp_enqueue_style('kcg-hero-style', get_template_directory_uri() . '/assets/css/hero.css');


    
    wp_enqueue_style('kcg-menu-style', get_template_directory_uri() . '/assets/css/menu.css');
}
add_action('wp_enqueue_scripts', 'kcg_scripts');

function kcg_body_classes($classes)
{
    // if (is_front_page()) {
        $classes[] = 'is-home';
    // } else {
        // $classes[] = 'not-home';
    // }
    return $classes;
}
add_filter('body_class', 'kcg_body_classes');
