<?php
function kcg_enqueue_scripts()
{
    $theme_data = wp_get_theme();
    wp_enqueue_style('theme-style', get_stylesheet_uri(), $theme_data['version']);

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

    // Enqueue Customised Tagling JS
    wp_enqueue_script('custom-tagline-js', get_template_directory_uri() . '/assets/js/hero-tagline.js', array(), null, true);

    // Enqueue Customised Elvanto CSS & JS
    wp_enqueue_style('custom-elvanto-css', get_template_directory_uri() . '/assets/css/elvanto-swiper.css', array(), null);
    wp_enqueue_script('custom-elvanto-js', get_template_directory_uri() . '/assets/js/elvanto-swiper.js', array(), null, true);

    // wp_enqueue_script('customizer-drag-drop', get_template_directory_uri() . '/assets/js/customizer-drag-drop.js', array('jquery', 'jquery-ui-sortable'), '', true);

    // Localize script with PHP variables
    $theme_vars = array(
        'themeDirectory' => get_template_directory_uri(),
    );
    wp_localize_script('custom-js', 'themeVars', $theme_vars);

}
add_action('wp_enqueue_scripts', 'kcg_enqueue_scripts');


function kcg_menus()
{
    register_nav_menus(
        array(
            'left-menu' => __('Left Menu', 'kcg'),
            'right-menu' => __('Right Menu', 'kcg'),
            'mobile-socials' => __('Mobile Social Icons', 'kcg'),
            'hero-buttons' => __('Hero Buttons Menu', 'kcg'),
            'footer_menu' => __('Footer Menu', 'theme'),
        )
    );
}

add_action('init', 'kcg_menus');

function kcg_customize_register($wp_customize)
{
    // Add section for footer
    $wp_customize->add_section('footer', array(
        'title' => __('Footer', 'kcg'),
        'priority' => 30,
    )
    );

    // Church logo setting
    $wp_customize->add_setting('church_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'church_logo', array(
        'label' => __('Church Logo', 'kcg'),
        'section' => 'footer',
        'settings' => 'church_logo',
    )
    ));

    // Setting for church logo link
    $wp_customize->add_setting(
        'church_logo_link',
        array(
            'default' => __('/', 'link'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        )
    );

    // Control for church logo link
    $wp_customize->add_control(
        'church_logo_link',
        array(
            'type' => 'text',
            'priority' => 10,
            'section' => 'footer',
            'label' => 'Church Logo Link',
        )
    );

    // Affiliation logo setting
    $wp_customize->add_setting('affiliation_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'affiliation_logo', array(
        'label' => __('Affiliation Logo', 'kcg'),
        'section' => 'footer',
        'settings' => 'affiliation_logo',
    )
    ));

    // Setting for church logo link
    $wp_customize->add_setting(
        'affiliation_logo_link',
        array(
            'default' => __('www.google.com', 'link'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        )
    );

    // Control for church logo link
    $wp_customize->add_control(
        'affiliation_logo_link',
        array(
            'type' => 'text',
            'priority' => 10,
            'section' => 'footer',
            'label' => 'Affiliation Logo Link',
        )
    );
}
add_action('customize_register', 'kcg_customize_register');


function kcg_setup()
{
    add_theme_support(
        'editor-color-palette',
        array(
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
        )
    );
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



// Include ACF field groups
require_once get_template_directory() . '/acf-field-groups.php';


?>