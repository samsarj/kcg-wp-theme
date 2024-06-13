<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav class="navbar navbar-expand-lg <?php echo is_front_page() ? 'navbar-transparent' : 'navbar-solid'; ?> fixed-top p-0">
            <div class="container-fluid w-100 m-0 p-0">
                <div class="row w-100 m-0 px-0 py-2 align-items-center justify-content-between">
                    <!-- Desktop Navbar -->
                    <div class="col-lg-5 d-none d-lg-flex justify-content-center align-items-center p-0">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'left-menu',
                                'container' => false,
                                'menu_class' => 'navbar-nav d-flex w-100 justify-content-center align-items-center',
                                'walker' => new WP_Bootstrap_Navwalker(),
                            )
                        );
                        ?>
                    </div>
                    <div class="col-lg-2 d-none d-lg-flex justify-content-center align-items-center p-0">
                        <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
                            <div class="logo" id="logo-desktop"></div>
                        </a>
                    </div>
                    <div class="col-lg-5 d-none d-lg-flex justify-content-between align-items-center p-0">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'right-menu',
                                'container' => false,
                                'menu_class' => 'navbar-nav d-flex w-100 justify-content-between align-items-center',
                                'walker' => new WP_Bootstrap_Navwalker(),
                            )
                        );
                        ?>
                        <!-- Dark mode toggle dropdown -->
                        <div class="dropdown">
                            <button id="dark-mode-toggle" class="btn btn-link" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i id="dark-mode-icon" class="bi"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dark-mode-toggle">
                                <a class="dropdown-item auto-mode-button" href="#" id="auto-mode">
                                    <i class="bi bi-circle-half"></i> Auto
                                </a>
                                <a class="dropdown-item light-mode-button" href="#" id="light-mode">
                                    <i class="bi bi-sun"></i> Light
                                </a>
                                <a class="dropdown-item dark-mode-button" href="#" id="dark-mode">
                                    <i class="bi bi-moon"></i> Dark
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Navbar -->
                    <div class="col-3 d-flex d-lg-none justify-content-center align-items-center p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-navbar"
                            aria-controls="mobile-navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
                        </button>
                    </div>
                    <div class="col-6 d-flex d-lg-none justify-content-center align-items-center p-0">
                        <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
                            <div class="logo" id="logo-mobile"></div>
                        </a>
                    </div>
                    <div class="col-3 d-flex d-lg-none justify-content-center align-items-center p-0">
                        <div class="dropdown">
                            <button id="dark-mode-toggle-mobile" class="btn btn-link" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="dark-mode-icon-mobile" class="bi"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dark-mode-toggle-mobile">
                                <a class="dropdown-item auto-mode-button" href="#" id="auto-mode">
                                    <i class="bi bi-circle-half"></i> Auto
                                </a>
                                <a class="dropdown-item light-mode-button" href="#" id="light-mode">
                                    <i class="bi bi-sun"></i> Light
                                </a>
                                <a class="dropdown-item dark-mode-button" href="#" id="dark-mode">
                                    <i class="bi bi-moon"></i> Dark
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex d-lg-none p-0">
                        <div class="collapse navbar-collapse" id="mobile-navbar">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'left-menu',
                                    'container' => false,
                                    'menu_class' => 'navbar-nav d-flex w-100 justify-content-between align-items-center',
                                    'walker' => new WP_Bootstrap_Navwalker(),
                                )
                            );
                            ?>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'right-menu',
                                    'container' => false,
                                    'menu_class' => 'navbar-nav d-flex w-100 justify-content-between align-items-center',
                                    'walker' => new WP_Bootstrap_Navwalker(),
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <?php wp_body_open(); ?>
</body>

</html>