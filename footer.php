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
                <a href="<?php echo esc_url(get_theme_mod('church_logo_link')); ?>">
                <img src="<?php echo esc_url(get_theme_mod('church_logo')); ?>" alt="Church Logo">
            </a>
            <?php endif; ?>
            <?php if (get_theme_mod('affiliation_logo')): ?>
                <a href="<?php echo esc_url(get_theme_mod('affiliation_logo_link')); ?>">
                <img src="<?php echo esc_url(get_theme_mod('affiliation_logo')); ?>" alt="Affiliation Logo">
            </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="copyright">
        &copy; <?php echo date('Y'); ?>. All rights reserved.<br>
        King's Church Guildford is a Charitable Incorporated Organisation (CIO) registered in England & Wales - Number 1158254
    </div>
    <?php wp_footer(); ?>
</footer>
</body>

</html>