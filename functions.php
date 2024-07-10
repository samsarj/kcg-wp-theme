<?php
function kcg_enqueue_scripts()
{
    $theme_data = wp_get_theme();
    wp_enqueue_style('theme-style', get_stylesheet_uri(), $theme_data['version']);

    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/script.js', array('jquery'), null, true);

    // wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css');
    // wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap', false);

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

add_theme_support('block-template-parts');
add_theme_support( 'align-wide' );
add_theme_support( 'title-tag' );

function theme_prefix_filter_document_title_separator() {
    return '|';
}
add_filter( 'document_title_separator', 'theme_prefix_filter_document_title_separator' );


function kcg_menus()
{
    register_nav_menus(
        array(
            'left-menu' => __('Left Menu', 'kcg'),
            'right-menu' => __('Right Menu', 'kcg'),
            'footer_menu' => __('Footer Menu', 'theme'),
        )
    );
}

add_action('init', 'kcg_menus');

function load_post_type_patterns( $editor_settings, $post ) {
    // Define an initial pattern for the 'page' post type
    if ( 'page' === $post->post_type ) {
        $editor_settings['__experimentalFeatures']['unfilteredTemplates']['page_template'] = array(
            array(
                'title' => 'Custom Page Title Area',
                'content' => '<!-- wp:pattern {"slug":"kcg/page-title-area"} /-->',
            ),
        );
        $editor_settings['template'] = 'page_template';
    }

    return $editor_settings;
}

add_filter( 'block_editor_settings_all', 'load_post_type_patterns', 10, 2 );


function custom_year_shortcode () {
    return date_i18n('Y');
   }
   add_shortcode ('year', 'custom_year_shortcode');


   // Add Poster Image to Cover block
// currently not added by Gutenberg.
// (@see https://github.com/WordPress/gutenberg/issues/18962#issuecomment-1719468483)
// (@see https://github.com/WordPress/gutenberg/issues/18962#issuecomment-960567888)
// (@see https://erik.joling.me/2021/11/04/wordpress-how-to-add-a-poster-image-to-the-video-in-a-cover-block/)
function add_poster_image_to_cover_video($output, $block)
{
    if (
        // Only `cover` blocks
        $block['blockName'] == 'core/cover'
        and
        // Only `<video>`'s
        isset($block['attrs']['backgroundType']) and $block['attrs']['backgroundType'] === 'video'
    ) {
        // Only `<video>`'s without a `poster` attribute
        $tags = new WP_HTML_Tag_Processor($output);
        if ($tags->next_tag('video') and $tags->get_attribute('poster') === null) {
            // Get the featured image of the video attachment
            $poster_image = get_the_post_thumbnail_url($block['attrs']['id']);
            if ($poster_image) {
                // Set the featured image as `poster` attribute
                $tags->set_attribute('poster', $poster_image);

                // Return the modified HTML
                return $tags->__toString();
            }
        }
    }
    // Otherwise return the original HTML, unmodified
    return $output;
}
add_filter('render_block', 'add_poster_image_to_cover_video', 10, 2);


?>