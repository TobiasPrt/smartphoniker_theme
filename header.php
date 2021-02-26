<?php
/**
 * Template-Part: Header
 * 
 * This is the standard header template used everywhere except on the landing page.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<!-- Document Head -->
<!DOCTYPE html>
<html lang="de-DE">

<head>
    <meta charset="<?php echo bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <?php wp_head(); ?>
</head>

<body>

    <!-- Header -->
    <?php
    $page_id = get_the_ID();
    $header_color = carbon_get_theme_option( $page_id . '-color' );
    $header_class = 'header--' . $header_color;
    ?>
    <header id="header" class="header <?php echo $header_class; ?> header--bannerIsHidden">
      
      
        <nav class="header__nav nav">
            <div class="nav__wrapper">

      
                <!-- Logo -->
                <?php 
                switch ($header_color) {
                    case 'blue':
                        $logo = 'orangewhite';
                        break;
                    case 'grey':
                        $logo = 'blackorange';
                        break;
                    case 'orange':
                    case 'green':
                    default:
                        $logo = 'blackwhite';
                        break;
                }
                ?>

                <a class="nav__item logo"
                    href="<?php echo get_home_url() ?>">
                        <img class="logo__img"
                            src="<?php echo get_template_directory_uri() ?>/assets/images/logo/logo_<?php echo $logo; ?>.svg"
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
                <?php
                switch ($header_color) {
                    case 'green':
                        $phone_icon = 'whitegreen';
                        break;
                    case 'grey':
                        $phone_icon = 'orangewhite';
                        break;
                    case 'orange':
                    case 'blue':
                    default:
                        $phone_icon = 'whiteorange';
                        break;
                }
                ?>
                <a class="nav__phone"
                    href="tel:+<?php echo carbon_get_theme_option('phone_number') ?>">
                    <img class="nav__img"
                        src="<?php echo get_template_directory_uri() ?>/assets/images/icons/phone_<?php echo $phone_icon; ?>.svg"
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