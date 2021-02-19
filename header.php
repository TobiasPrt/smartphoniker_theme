<?php
/**
 * Header Template
 * 
 * @package Smartphoniker_Theme
 */

$header_logo = get_field('header_logo');
$header_is_large = get_field('header_is_large');
$header_color = get_field('header_color');
$header_title = get_field('header_title');
$header_link = get_field('header_link');
$header_phone_number = get_field('header_phone_number');
$header_phone_icon = get_field('header_phone_icon');

$banner_is_activated = get_field("banner");
$banner_settings = array(
  "color" => get_field("banner_color"),
  "variant" => get_field("banner_variant"),
  "text" => get_field("banner_text"),
);
?>


<!-- Document Head -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ) ?>" />
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
        <?= 'header--'.$header_color ?> 
        <?= !$banner_is_activated ? 'header--bannerIsHidden' : ''; ?>
      ">
      <nav class="header__nav nav">




      <!-- Banner -->
      <?php
      if($banner_is_activated):
        get_template_part( "template-parts/component", "banner", $banner_settings );
      endif;
      ?>


        
        <!-- Logo -->
        <div class="nav__wrapper">
          <a class="nav__item logo" href="<?= get_home_url() ?>">
            <img
              class="logo__img"
              src="<?= $header_logo["sizes"]["thumbnail"] ?>"
              alt="Smartphoniker Logo"
            />
          </a>

          


          <!-- Navigation -->
            <?php
              $banner_is_hidden_class = $header_is_large ? 'nav__list--bannerIsHidden'  : '';
              wp_nav_menu( array(
                  "menu" => "primary",
                  "container" => "",
                  "theme_location" => "primary",
                  "items_wrap" => '<ul id="nav" class="nav__list '.$banner_is_hidden_class.'">%3$s</ul>',
                )
              );
            ?>


          <!-- Telefon-Icon -->
          <a class="nav__phone" href="tel:+<?= $header_phone_number ?>">
            <img
              class="nav__img"
              src="<?= $header_phone_icon['sizes']['thumbnail'] ?>"
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
        <h1 class="header__heading"><?= $header_title ?></h1>
          <a 
            class="header__button button" 
            href="<?= $header_link['url'] ?>" 
            target="<?= $header_link['target']?>"
          >
            <?= $header_link['title']?>
          </a>
      <?php endif; ?>


    </header>

    <main class="content">