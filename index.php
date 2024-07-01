<?php
get_header(); ?>

<section class="page-container">
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