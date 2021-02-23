<?php
/**
 * Header Template
 *
 * @package Smartphoniker
 */

?>

<!-- Document Head -->
<!DOCTYPE html>
<html <?php echo language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <?php wp_head(); ?>
</head>
<body>

<!-- Header -->
<header 
    id="header" 
    class="
    header
    <?php echo 'header--'.$header_color ?> 
    <?php echo !$banner_is_activated ? 'header--bannerIsHidden' : ''; ?>
    ">
    <nav class="header__nav nav">




    <!-- Banner -->
    <?php
    if ($banner_is_activated):
    get_template_part("template-parts/component", "banner", $banner_settings);
    endif;
    ?>


    
    <!-- Logo -->
    <div class="nav__wrapper">
        <a class="nav__item logo" href="<?php echo get_home_url() ?>">
        <img
            class="logo__img"
            src="<?php echo $header_logo["sizes"]["thumbnail"] ?>"
            alt="Smartphoniker Logo"
        />
        </a>

        


        <!-- Navigation -->
        <?php
            $banner_is_hidden_class = $header_is_large ? 'nav__list--bannerIsHidden'  : '';
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
        <a class="nav__phone" href="tel:+<?php echo $header_phone_number ?>">
        <img
            class="nav__img"
            src="<?php echo $header_phone_icon['sizes']['thumbnail'] ?>"
            alt="Smartphoniker anrufen"
        />
        </a>


        <!-- Hamburger Menu Icon -->
        <button class="nav__menuicon menuicon" id="menuicon">
        <span class="menuicon__line menuicon__line--1"></span>
        <span class="menuicon__line menuicon__line--2"></span>
        <span class="menuicon__line menuicon__line--3"></span>
        </button>



    </div>
    </nav>



    <!-- Heading and Call-to-Action -->
    <?php if ($header_is_large): ?>
    <h1 class="header__heading"><?php echo $header_title ?></h1>
        <a 
        class="header__button button" 
        href="<?php echo $header_link['url'] ?>" 
        target="<?php echo $header_link['target']?>"
        >
        <?php echo $header_link['title']?>
        </a>
    <?php endif; ?>


</header>

<main class="content">