<?php
/**
 * Header Template
 *
 * @package Smartphoniker
 */
?>

<!-- Document Head -->
<!DOCTYPE html>
<html <?= language_attributes(); ?>>

<head>
    <meta charset="<?= bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <?php wp_head(); ?>
</head>

<body>

<!-- Header -->
<?php if (carbon_get_theme_option('banner_is_enabled')): ?>
    <header id="header" class="header header--bannerIsHidden">
<?php else: ?>
    <header id="header" class="header">
<?php endif; ?>


        <nav class="header__nav nav">


            <!-- Banner -->
            <?php
            if (carbon_get_theme_option('banner_is_enabled') == true) {
                get_template_part(
                    "template-parts/component",
                    "banner",
                    array(
                        'type' => carbon_get_theme_option('banner_type'),
                        'color' => carbon_get_theme_option('banner_color') ?? null,
                        'content' => carbon_get_theme_option('banner_text') ?? null
                    )
                );
            }
            ?>


            <!-- Logo -->
            <div class="nav__wrapper">
                <a class="nav__item logo"
                    href="<?= get_home_url(); ?>">
                    <img class="logo__img"
                        src="<?= get_template_directory_uri(); ?>/assets/images/logo/logo_blackorange.svg"
                        alt="Smartphoniker Logo" />
                </a>




                <!-- Navigation -->
                <?php
                $banner_is_hidden_class = carbon_get_theme_option('banner_is_enabled') ? 'nav__list--bannerIsHidden'  : '';
                wp_nav_menu(
                    array(
                        "menu" => "primary",
                        "container" => "",
                        "theme_location" => "primary",
                        "items_wrap" => '<ul id="nav" class="nav__list '.$banner_is_hidden_class.'">%3$s</ul>',
                    )
                );
                ?>


                <!-- Telefon-Icon -->
                <a class="nav__phone"
                    href="tel:+<?= carbon_get_theme_option('phone_number') ?>">
                    <img class="nav__img"
                        src="<?= get_template_directory_uri(); ?>/assets/images/icons/phone_orangewhite.svg"
                        alt="Smartphoniker anrufen" />
                </a>


                <!-- Hamburger Menu Icon -->
                <button class="nav__menuicon menuicon" id="menuicon">
                    <span class="menuicon__line menuicon__line--1"></span>
                    <span class="menuicon__line menuicon__line--2"></span>
                    <span class="menuicon__line menuicon__line--3"></span>
                </button>
            </div>
        </nav>
    </header>
    <main class="content">