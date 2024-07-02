<?php
if( function_exists('acf_add_local_field_group') ):

// Hero Section Group
acf_add_local_field_group(array(
    'key' => 'group_hero_section',
    'title' => 'Hero Section',
    'fields' => array(
        array(
            'key' => 'field_hero_title',
            'label' => 'Hero Title',
            'name' => 'hero_title',
            'type' => 'text',
            'instructions' => 'Enter the title for the hero section.',
            'required' => 0,
            'default_value' => 'Default Hero Title',
        ),
        array(
            'key' => 'field_hero_tagline',
            'label' => 'Hero Tagline',
            'name' => 'hero_tagline',
            'type' => 'wysiwyg',
            'instructions' => 'Enter the tagline for the hero section.',
            'required' => 0,
        ),
        array(
            'key' => 'field_hero_subtitle',
            'label' => 'Hero Subtitle',
            'name' => 'hero_subtitle',
            'type' => 'wysiwyg',
            'instructions' => 'Enter the subtitle for the hero section.',
            'required' => 0,
        ),
        array(
            'key' => 'field_hero_background_video',
            'label' => 'Hero Background Video',
            'name' => 'hero_background_video',
            'type' => 'file',
            'instructions' => 'Upload the background video for the hero section.',
            'required' => 0,
            'return_format' => 'array',
            'library' => 'all',
            'mime_types' => 'mp4,webm,mov',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page',
                'operator' => '==',
                'value' => get_option('page_on_front'),
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'description' => '',
));

// Home Description Group
acf_add_local_field_group(array(
    'key' => 'group_home_description',
    'title' => 'Home Description',
    'fields' => array(
        array(
            'key' => 'field_home_description',
            'label' => 'Home Description',
            'name' => 'home_description',
            'type' => 'wysiwyg',
            'instructions' => 'Enter the home description.',
            'required' => 0,
            'default_value' => 'Default Home Description',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page',
                'operator' => '==',
                'value' => get_option('page_on_front'),
            ),
        ),
    ),
    'menu_order' => 1,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'description' => '',
));

// Grid Items Group
$grid_items_fields = array();
for ($i = 1; $i <= 6; $i++) {
    $grid_items_fields[] = array(
        'key' => 'field_grid_item_' . $i,
        'label' => 'Grid Item ' . $i,
        'name' => 'grid_item_' . $i,
        'type' => 'group',
        'sub_fields' => array(
            array(
                'key' => 'field_grid_item_' . $i . '_image',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'instructions' => 'Upload the image for grid item ' . $i . '.',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_grid_item_' . $i . '_title',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'instructions' => 'Enter the title for grid item ' . $i . '.',
                'required' => 0,
            ),
            array(
                'key' => 'field_grid_item_' . $i . '_description',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'text',
                'instructions' => 'Enter the description for grid item ' . $i . '.',
                'required' => 0,
            ),
            array(
                'key' => 'field_grid_item_' . $i . '_link',
                'label' => 'Link',
                'name' => 'link',
                'type' => 'page_link',
                'instructions' => 'Enter the link for grid item ' . $i . '.',
                'required' => 0,
            ),
        ),
    );
}

acf_add_local_field_group(array(
    'key' => 'group_grid_items',
    'title' => 'Grid Items',
    'fields' => $grid_items_fields,
    'location' => array(
        array(
            array(
                'param' => 'page',
                'operator' => '==',
                'value' => get_option('page_on_front'),
            ),
        ),
    ),
    'menu_order' => 2,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'description' => '',
));

// Coming Up Group
acf_add_local_field_group(array(
    'key' => 'group_coming_up',
    'title' => 'Coming Up',
    'fields' => array(
        array(
            'key' => 'field_coming_up_title',
            'label' => 'Coming Up Title',
            'name' => 'coming_up_title',
            'type' => 'text',
            'instructions' => 'Enter the title for the coming up section.',
            'required' => 0,
            'default_value' => 'Default Coming Up Title',
        ),
        array(
            'key' => 'field_coming_up_code',
            'label' => 'Coming Up Code',
            'name' => 'coming_up_code',
            'type' => 'wysiwyg',
            'instructions' => 'Enter the code for the coming up section.',
            'required' => 0,
            'default_value' => 'Default Coming Up Code',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page',
                'operator' => '==',
                'value' => get_option('page_on_front'),
            ),
        ),
    ),
    'menu_order' => 3,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'description' => '',
));


// PAGE FIELDS

acf_add_local_field_group(array(
    'key' => 'group_page_full_width',
    'title' => 'Page Full Width Header',
    'fields' => array(
        array(
            'key' => 'field_full_width_image',
            'label' => 'Full Width Image',
            'name' => 'full_width_image',
            'type' => 'image',
            'instructions' => 'Upload or select an image for the full-width header.',
            'required' => 0,
            'return' => 'array',
            'conditional_logic' => 0,
        ),
        array(
            'key' => 'field_overlay_colour',
            'label' => 'Overlay Colour',
            'name' => 'overlay_colour',
            'type' => 'color_picker',
            'instructions' => 'Select an overlay color for the full-width header.',
            'default_value' => '#0a3e6a',
            'required' => 0,
            'conditional_logic' => 0,
        ),
        array(
            'key' => 'field_page_desc',
            'label' => 'Page Description',
            'name' => 'page_desc',
            'type' => 'textarea',
            'instructions' => 'Enter a description for the page header.',
            'required' => 0,
            'conditional_logic' => 0,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
            array(
                'param' => 'page',
                'operator' => '!=',
                'value' => get_option('page_on_front'),
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
));

endif;
?>
