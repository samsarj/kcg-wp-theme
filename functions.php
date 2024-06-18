<?php
function kcg_enqueue_scripts()
{
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    wp_enqueue_style(
        'kcg-button-styles',
        get_template_directory_uri() . '/assets/css/button-styles.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/button-styles.css')
    );

    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/script.js', array('jquery'), null, true);

    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap', false);

    // Enqueue GSAP & Lottie
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js', array(), '3.11.0', true);
    wp_enqueue_script('lottie', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js', array(), null, true);


}
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

    // Add section for hero content
    $wp_customize->add_section(
        'hero_section',
        array(
            'title' => __('Hero Section', 'kcg'),
            'priority' => 30,
        )
    );

    // Add setting and control for hero background video
    $wp_customize->add_setting(
        'hero_background_video',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'hero_background_video',
            array(
                'label' => __('Hero Background Video', 'kcg'),
                'section' => 'hero_section',
                'settings' => 'hero_background_video',
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
}
add_action('customize_register', 'kcg_customize_register');

function kcg_setup()
{
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('Primary', 'themeLangDomain'),
            'slug' => 'primary',
            'color' => '#0a3e6a',
        ),
        array(
            'name' => __('Secondary', 'themeLangDomain'),
            'slug' => 'secondary',
            'color' => '#1d70b7',
        ),
        array(
            'name' => __('Light', 'themeLangDomain'),
            'slug' => 'light',
            'color' => '#eeeeee',
        ),
        array(
            'name' => __('Dark', 'themeLangDomain'),
            'slug' => 'dark',
            'color' => '#333333',
        ),
    ));
}
add_action('after_setup_theme', 'kcg_setup');

function kcg_enqueue_block_editor_assets()
{
    // Enqueue the centralized button styles for the block editor
    wp_enqueue_style(
        'kcg-editor-styles',
        get_template_directory_uri() . '/assets/css/button-styles.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/button-styles.css')
    );

    // Register the custom button style in Gutenberg
    wp_enqueue_script(
        'kcg-editor-script',
        get_template_directory_uri() . '/assets/js/editor.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
        filemtime(get_template_directory() . '/assets/js/editor.js')
    );
}
add_action('enqueue_block_editor_assets', 'kcg_enqueue_block_editor_assets');


// function enqueue_swiper_scripts()
// {
//     wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
//     wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
//     wp_enqueue_script('custom-swiper-init', get_template_directory_uri() . '/assets/js/custom-swiper.js', array('swiper-js'), null, true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_swiper_scripts');

?>