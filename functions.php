<?php

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


function kcg_enqueue_styles()
{
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap', false);
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}

function kcg_enqueue_scripts()
{
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    // wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    wp_enqueue_script('custom-js', get_template_directory_uri() . '/script.js', array('jquery'), null, true);

    // Enqueue GSAP & Lottie
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js', array(), '3.11.0', true);
    wp_enqueue_script('lottie', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'kcg_enqueue_styles');
add_action('wp_enqueue_scripts', 'kcg_enqueue_scripts');


function kcg_menus()
{
    register_nav_menus(
        array(
            'left-menu' => __('Left Menu', 'kcg'),
            'right-menu' => __('Right Menu', 'kcg'),
            'hero-buttons' => __('Hero Buttons Menu', 'kcg'),
        )
    );
}

add_action('init', 'kcg_menus');






function kcg_customize_register($wp_customize)
{
    // Include the custom controls if needed
    // require_once get_template_directory() . '/custom-controls.php';

    // Add section for hero content
    $wp_customize->add_section(
        'hero_section',
        array(
            'title' => __('Hero Section', 'kcg'),
            'priority' => 30,
        )
    );

    // Add setting and control for hero background image
    $wp_customize->add_setting(
        'hero_background_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'hero_background_image',
            array(
                'label' => __('Hero Background Image', 'kcg'),
                'section' => 'hero_section',
                'settings' => 'hero_background_image',
            )
        )
    );

    // Add setting and control for hero title
    $wp_customize->add_setting(
        'hero_title',
        array(
            'default' => __('Default Title', 'kcg'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hero_title',
        array(
            'label' => __('Hero Title', 'kcg'),
            'section' => 'hero_section',
            'type' => 'text',
        )
    );

    // Add setting and control for hero subtitle
    $wp_customize->add_setting(
        'hero_subtitle',
        array(
            'default' => __('Default Subtitle', 'kcg'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hero_subtitle',
        array(
            'label' => __('Hero Subtitle', 'kcg'),
            'section' => 'hero_section',
            'type' => 'text',
        )
    );

    // Add setting and control for text array (JSON)
    $wp_customize->add_setting(
        'hero_text_array',
        array(
            'default' => json_encode(
                array(
                    array("Building", "God's", "church"),
                    array("with", "God's", "word"),
                    array("for", "God's", "glory"),
                )
            ),
            'sanitize_callback' => 'kcg_sanitize_text_array',
        )
    );

    $wp_customize->add_control(
        'hero_text_array',
        array(
            'label' => __('Hero Text Array (JSON)', 'kcg'),
            'section' => 'hero_section',
            'type' => 'textarea',
        )
    );
}
add_action('customize_register', 'kcg_customize_register');

// Sanitize text array input
function kcg_sanitize_text_array($input)
{
    $input = json_decode($input, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        return json_encode($input);
    }
    return json_encode(array());
}



?>