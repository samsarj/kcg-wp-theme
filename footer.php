<footer class="footer">
    <div class="container">
        <div class="footer-menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer_menu',
                    'container' => false,
                    'menu_class' => 'footer-menu-items',
                )
            );
            ?>
        </div>
        <div class="logos">
            <?php if (get_theme_mod('church_logo')): ?>
                <img src="<?php echo esc_url(get_theme_mod('church_logo')); ?>" alt="Church Logo">
            <?php endif; ?>
            <?php if (get_theme_mod('affiliation_logo')): ?>
                <img src="<?php echo esc_url(get_theme_mod('affiliation_logo')); ?>" alt="Affiliation Logo">
            <?php endif; ?>
        </div>
    </div>
    <div class="copyright">
        <p>&copy; <?php echo date('Y'); ?> King's Church Guildford. All rights reserved.</p>
    </div>
    <?php wp_footer(); ?>
</footer>
</body>

</html>