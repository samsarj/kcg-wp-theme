<?php
// Include the header
get_header();
?>

<!-- Main Content -->

<?php
$hero_bg_image = get_theme_mod('hero_background_image');
$hero_title = get_theme_mod('hero_title', __('Default Title', 'kcg'));
$hero_subtitle = get_theme_mod('hero_subtitle', __('Default Subtitle', 'kcg'));
$hero_text_array = json_decode(
    get_theme_mod(
        'hero_text_array',
        json_encode(
            array(
                array("Building", "God's", "church"),
                array("with", "God's", "word"),
                array("for", "God's", "glory"),
            )
        )
    ), true);
?>

<section class="hero" style="background-image: url('<?php echo esc_url($hero_bg_image); ?>');">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1><?php echo esc_html($hero_title); ?></h1>
            <div class="tagline">
                <h3 id="line1" class="text-line" style="color: var(--sec-col);">Building</h3>
                <h3 id="line2" class="text-line" style="color: var(--pri-col);">God's</h3>
                <h3 id="line3" class="text-line" style="color: var(--sec-col);">church</h3>
            </div>
            <script>
                const texts = $hero_text_array;

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

                setInterval(updateText, 4000);
            </script>
            <h2><?php echo esc_html($hero_subtitle); ?></h2>
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
        <svg xmlns="http://www.w3.org/2000/svg" class="hero-down bi bi-chevron-compact-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67" />
        </svg>
    </div>
</section>

<section class="main-content">
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