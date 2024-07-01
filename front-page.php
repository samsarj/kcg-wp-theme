<?php
// Include the header
get_header();
?>

<?php
$hero_bg_video = get_theme_mod('hero_background_video');
$hero_title = get_theme_mod('hero_title', __('Default Title', 'kcg'));
$hero_subtitle = get_theme_mod('hero_subtitle', __('Default Subtitle', 'kcg'));
?>

<section class="hero">
  <video autoplay muted loop playsinline class="hero-video">
    <source src="<?php echo get_field('hero_background_video'); ?>" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1><?php echo get_field('hero_title') ?></h1>
    <?php echo get_field('hero_tagline'); ?>
    <?php echo get_field('hero_subtitle'); ?>
    <div>
      <?php
      if (has_nav_menu('hero-buttons')) {
        wp_nav_menu(
          array(
            'theme_location' => 'hero-buttons',
            'container' => false,
            'menu_class' => 'hero-button-row',
            'link_before' => '<span class="wp-block-button__link">',
            'link_after' => '</span>',
            'fallback_cb' => false,
          )
        );
      }
      ?>
    </div>
  </div>
</section>

<svg class="divider" viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
  <polygon class="divider-light" points="100,90 0,40 0,100 100,100" fill="red" />
  <polygon class="divider-primary" points="0,75 100,25 100,100 0,100" fill="green" />
  <polygon class="divider-secondary" points="0,95 100,45 100,100 0,100" fill="blue" />
</svg>

<section>
  <div class="home-description-container">
    <div class="home-description">
      <?php echo get_field('home_description'); ?>
    </div>
  </div>
</section>

<section>
  <div class="grid-container">
    <?php for ($i = 1; $i <= 6; $i++):
      $image = get_field('grid_item_' . $i . '_image');
      $title = get_field('grid_item_' . $i . '_title');
      $description = get_field('grid_item_' . $i . '_description');
      $link = get_field('grid_item_' . $i . '_link');
      ?>
      <a href="<?php echo esc_url($link); ?>" class="grid-item">
        <?php if (!empty($image)): ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php endif; ?>
        <div class="overlay"></div>
        <div class="content">
          <div class="title">
            <h2><?php echo esc_html($title); ?></h2>
          </div>
          <div class="description"><?php echo esc_html($description); ?></div>
        </div>
      </a>
    <?php endfor; ?>
  </div>
</section>

<section>
  <h2><?php echo get_field('coming_up_title') ?></h2>
  <?php echo get_field('coming_up_code') ?>
</section>

<section id="main-content" class="main-content">
  <div class="container">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
        the_content();
      }
    }
    ?>
  </div>
</section>

<?php
// Include the footer
get_footer();
?>