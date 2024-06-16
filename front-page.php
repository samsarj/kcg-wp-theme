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
        <source src="<?php echo esc_url($hero_bg_video); ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1><?php echo esc_html($hero_title); ?></h1>
        <div class="tagline">
            <h2 id="line1" class="text-line" style="color: var(--sec-col);">Building</h2>
            <h2 id="line2" class="text-line" style="color: var(--pri-col);">God's</h2>
            <h2 id="line3" class="text-line" style="color: var(--sec-col);">church</h2>
        </div>
        <script>
            const texts = [["Building", "God's", "church"], ["with", "God's", "word"], ["for", "God's", "glory"]];

            let currentSet = 0;
            const line1 = document.getElementById('line1');
            const line2 = document.getElementById('line2');
            const line3 = document.getElementById('line3');

            function animateText(line, newText) {
                gsap.to(line, {
                    opacity: 0,
                    scale: 0.5,
                    rotationX: 180,
                    duration: 0.5,
                    onComplete: () => {
                        line.textContent = newText;
                        gsap.to(line, {
                            opacity: 1,
                            scale: 1,
                            rotationX: 0,
                            duration: 0.5
                        });
                    }
                });
            }

            function updateText() {
                const nextSet = (currentSet + 1) % texts.length;

                if (texts[currentSet][0] !== texts[nextSet][0]) {
                    animateText(line1, texts[nextSet][0]);
                }
                if (texts[currentSet][1] !== texts[nextSet][1]) {
                    animateText(line2, texts[nextSet][1]);
                }
                if (texts[currentSet][2] !== texts[nextSet][2]) {
                    animateText(line3, texts[nextSet][2]);
                }

                currentSet = nextSet;
            }

            setInterval(updateText, 3000);
        </script>
        <h3><?php echo esc_html($hero_subtitle); ?></h3>
        <div>
            <?php
            if (has_nav_menu('hero-buttons')) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'hero-buttons',
                        'container' => false,
                        'menu_class' => 'hero-button-row',
                        'link_before' => '<button>',
                        'link_after' => '</button>',
                        'fallback_cb' => false,
                    )
                );
            }
            ?>
        </div>
    </div>
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
