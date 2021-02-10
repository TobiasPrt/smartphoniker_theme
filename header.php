<?php 
$header_logo = get_field('header_logo');
$header_is_large = get_field('header_is_large');
$header_color = get_field('header_color');
$header_title = get_field('header_title');
$header_link = get_field('header_link');

$banner_is_activated = get_field("banner");
$banner_settings = array(
  "color" => get_field("banner_color"),
  "variant" => get_field("banner_variant"),
  "text" => get_field("banner_text"),
);
?>


<!-- Document Head -->
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <?php wp_head(); ?>

    </style>
  </head>
  <body>




    <!-- Header -->
    <header id="header" class="header <?= !$banner_is_activated ? 'header--bannerIsHidden' : '' ?>">
      <nav class="header__nav nav">




      <!-- Banner -->
      <?php
      if($banner_is_activated):
        get_template_part( "template-parts/component", "banner", $banner_settings );
      endif;
      ?>
      

        
        <!-- Logo -->
        <div class="nav__wrapper">
          <a class="nav__item logo" href="#">
            <img
              class="logo__img"
              src="<?= $logo["sizes"]["thumbnail"] ?>"
              alt="Smartphoniker Logo"
            />
          </a>

          


          <!-- Navigation -->
            <?php 
              wp_nav_menu( array(
                  "menu" => "primary",
                  "container" => "",
                  "theme_location" => "primary",
                  "items_wrap" => '<ul id="nav" class="nav__list">%3$s</ul>',
                )
              );
            ?>


          <!-- Telefon-Icon -->
          <a class="nav__phone" href="tel:+4943190700390">
            <img
              class="nav__img"
              src="<?= get_template_directory_uri() ?>/assets/images/icons/phone_orangewhite.svg"
              alt="Jetzt anrufen"
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
    </header>