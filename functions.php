<?php
function kcg_enqueue_scripts()
{
    $theme_data = wp_get_theme();
    wp_enqueue_style('theme-style', get_stylesheet_uri(), $theme_data['version']);

    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/script.js', array('jquery'), null, true);

    // Enqueue GSAP & Lottie
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js', array(), '3.11.0', true);
    wp_enqueue_script('lottie', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js', array(), null, true);

    // Enqueue Customised Tagling JS
    wp_enqueue_script('custom-tagline-js', get_template_directory_uri() . '/assets/js/hero-tagline.js', array(), null, true);

    // Enqueue Customised Elvanto CSS & JS
    wp_enqueue_style('custom-elvanto-css', get_template_directory_uri() . '/assets/css/elvanto-swiper.css', array(), null);
    wp_enqueue_script('custom-elvanto-js', get_template_directory_uri() . '/assets/js/elvanto-swiper.js', array(), null, true);

    // Localize script with PHP variables
    $theme_vars = array(
        'themeDirectory' => get_template_directory_uri(),
    );
    wp_localize_script('custom-js', 'themeVars', $theme_vars);
}
add_action('wp_enqueue_scripts', 'kcg_enqueue_scripts');

add_theme_support('block-template-parts');
add_theme_support('align-wide');
add_theme_support('title-tag');

function theme_prefix_filter_document_title_separator()
{
    return '|';
}
add_filter('document_title_separator', 'theme_prefix_filter_document_title_separator');

// function load_post_type_patterns($editor_settings, $post)
// {
//     // Define an initial pattern for the 'page' post type
//     if ('page' === $post->post_type) {
//         $editor_settings['__experimentalFeatures']['unfilteredTemplates']['page_template'] = array(
//             array(
//                 'title' => 'Custom Page Title Area',
//                 'content' => '<!-- wp:pattern {"slug":"kcg/page-title-area"} /-->',
//             ),
//         );
//         $editor_settings['template'] = 'page_template';
//     }

//     return $editor_settings;
// }

// add_filter('block_editor_settings_all', 'load_post_type_patterns', 10, 2);


function custom_year_shortcode()
{
    return date_i18n('Y');
}
add_shortcode('year', 'custom_year_shortcode');
