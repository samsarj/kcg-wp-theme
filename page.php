<?php
get_header(); ?>

<section class="page-container">
    <div class="full-width-header">
        <?php
        $image_url = get_field('full_width_image');
        $overlay_colour = get_field('overlay_colour');
        if ($image_url): ?>
            <div class="image-wrapper">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
            </div>
        <?php endif; ?>

        <?php if ($overlay_colour): ?>
            <div class="overlay" style="background-color: <?php echo esc_attr($overlay_colour); ?>"></div>
        <?php endif; ?>

        <div class="header-container">
            <div class="header-content">
                <h1><?php the_title(); ?></h1>
                <?php
                $page_desc = get_field('page_desc');
                if ($page_desc): ?>
                    <div class="page-description">
                        <?php echo $page_desc; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="page-content">
        <?php
        while (have_posts()):
            the_post();
            the_content();
        endwhile;
        ?>
    </div>
</section>

<?php get_footer(); ?>