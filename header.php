<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav
            class="navbar navbar-expand-lg fixed-top <?php echo is_front_page() ? 'navbar-transparent' : 'navbar-solid'; ?>">
            <div class="container-fluid d-flex align-items-center justify-content-between p-0">
                <!-- Desktop Left Menu -->
                <div class="navbar-left d-none d-lg-flex flex-grow-1 justify-content-end align-items-center">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'left-menu',
                            'container' => false,
                            'menu_class' => 'navbar-nav d-flex justify-content-end align-items-center',
                            'walker' => new WP_Bootstrap_Navwalker(),
                        )
                    );
                    ?>
                </div>

                <!-- Desktop Logo -->
                <div class="navbar-logo d-none d-lg-flex align-items-center justify-content-center">
                    <a class="navbar-brand px-2 py-0 m-0" href="<?php echo home_url('/'); ?>">
                        <div class="logo" id="logo-desktop"></div>
                    </a>
                </div>

                <!-- Desktop Right Menu -->
                <div class="navbar-right d-none d-lg-flex flex-grow-1 justify-content-start align-items-center">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'right-menu',
                            'container' => false,
                            'menu_class' => 'navbar-nav d-flex justify-content-start align-items-center',
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
                <div class="container-fluid d-flex d-lg-none align-items-center justify-content-between p-0">
                    <div class="navbar-left d-flex d-lg-none w-100 flex-grow-1 justify-content-start align-items-center">
                        <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-navbar"
                            aria-controls="mobile-navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="navbar-toggler-icon bi bi-sun"></i>
                        </a>
                    </div>
                    <div class="navbar-logo d-flex d-lg-none justify-content-center align-items-center">
                        <a class="navbar-brand px-2 py-0 m-0" href="<?php echo home_url('/'); ?>">
                            <div class="logo" id="logo-mobile"></div>
                        </a>
                    </div>
                    <div class="navbar-right d-flex d-lg-none w-100 flex-grow-1 justify-content-end align-items-center">
                        <div class="dropdown">
                            <a id="dark-mode-toggle-mobile" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i id="dark-mode-icon-mobile" class="bi"></i>
                            </a>
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
        </nav>
    </header>
    <?php wp_body_open(); ?>