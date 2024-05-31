<?php

function kcg_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'kcg_theme_support');

function kcg_menus()
{

    $locations = array(
        'primary' => 'Header Left',
        'secondary' => 'Header Right',
        'hero-buttons' => 'Hero Buttons',
    );

    register_nav_menus($locations);

}

add_action('init', 'kcg_menus');


function kcg_theme_scripts()
{
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&family=Alata&family=Quicksand:wght@300..700&family=Sen:wght@400..800&display=swap', array(), null);

    // Enqueue main stylesheet
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // Enqueue GSAP
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js', array(), '3.11.0', true);

    // Enqueue custom script
    wp_enqueue_script('main-script', get_template_directory_uri() . '/script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'kcg_theme_scripts');






function kcg_customize_register($wp_customize)
{
    // Include the custom controls if needed
    // require_once get_template_directory() . '/custom-controls.php';

    // Add section for hero content
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'kcg'),
        'priority' => 30,
    )
    );

    // Add setting and control for hero background image
    $wp_customize->add_setting('hero_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    )
    );

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label' => __('Hero Background Image', 'kcg'),
        'section' => 'hero_section',
        'settings' => 'hero_background_image',
    )
    ));

    // Add setting and control for hero title
    $wp_customize->add_setting('hero_title', array(
        'default' => __('Default Title', 'kcg'),
        'sanitize_callback' => 'sanitize_text_field',
    )
    );

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'kcg'),
        'section' => 'hero_section',
        'type' => 'text',
    )
    );

    // Add setting and control for hero subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => __('Default Subtitle', 'kcg'),
        'sanitize_callback' => 'sanitize_text_field',
    )
    );

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'kcg'),
        'section' => 'hero_section',
        'type' => 'text',
    )
    );

    // Add setting and control for text array (JSON)
    $wp_customize->add_setting('hero_text_array', array(
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

    $wp_customize->add_control('hero_text_array', array(
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