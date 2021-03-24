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

    <?php if ( 'store' === get_post_type() && ! is_404() ): ?>
        <style>
            .header::after {
                content: '';
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                opacity: 0.4;
                background: black url('<?php echo get_post_meta( get_the_ID(), '_header_image')[0]; ?>');
                background-position: center;
                background-size: cover;
            }
        </style>
    <?php endif; ?>
</head>

<body>
    <div class="wrapper">

    <!-- Header -->
    <?php
    $page_id = get_the_ID();
    $header_color = carbon_get_post_meta( get_the_ID(), 'header-color' );

    // Store
    if ( 'store' === get_post_type() ) {
        $header_color = 'black';
    }
    // 404
    if ( is_404() ) {
        $header_color = 'orange';
    }

    $header_class = 'header--' . $header_color;

    
    ?>
    <header id="header" class="header <?php echo $header_class; ?> header--bannerIsHidden">
      
      
        <nav class="header__nav nav">
            <div class="nav__wrapper">

      
                <!-- Logo -->
                <?php 
                switch ($header_color) {
                    case 'black':
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
                    case 'black':
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
                <button class="nav__menuicon menuicon" id="menuicon" aria-label="toggle_navigation">
                    <span class="menuicon__line menuicon__line--1"></span>
                    <span class="menuicon__line menuicon__line--2"></span>
                    <span class="menuicon__line menuicon__line--3"></span>
                </button>
            </div>
        </nav>

        <h1 class="header__heading"><?php echo is_404() ? carbon_get_theme_option('404-title') : the_title(); ?></h1>
        
        <?php if ( carbon_get_post_meta( get_the_ID(), 'header_button_is_enabled' ) ): ?>
            <a 
                class="header__button button"
                href="<?php echo get_permalink( carbon_get_post_meta( get_the_ID(), 'header_button_link' ) ); ?>" 
                target="<?php echo carbon_get_post_meta( get_the_ID(), 'header_button_target' ); ?>"
            >
                <?php echo carbon_get_post_meta( get_the_ID(), 'header_button_text' ); ?>
          </a>
        <?php endif; ?>

    </header>
    <main class="content">