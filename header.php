<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
        <nav class="navbar">
<?php
        wp_nav_menu(
            array(
                'menu' => 'primary',
                'containter' => '',
                'theme_location' => 'primary',
                'items_wrap' => '<ul id="" class="menu">%3$s</ul>'
            )
            );
?>
                <?php
                
                if(function_exists('the_custom_logo')){
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id);
                }
                
                ?>
                <a href="<?php echo home_url('/'); ?>"><img class="logo" src="<?php echo $logo[0] ?>" alt="Church Logo"></a>
            <?php
        wp_nav_menu(
            array(
                'menu' => 'secondary',
                'containter' => '',
                'theme_location' => 'secondary',
                'items_wrap' => '<ul id="" class="menu">%3$s</ul>'
            )
            );
?>
        </nav>
    </header>