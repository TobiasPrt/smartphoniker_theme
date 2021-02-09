<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Roboto+Condensed:wght@700&display=swap"
      rel="stylesheet"
    />

    <?php
    wp_head()
    ?>

    <style>
      * {
        /* outline: 1px dashed red !important; */
      }
    </style>
  </head>
  <body>
    <!-- Header -->
    <header id="header" class="header">
      <nav class="header__nav nav">
        <div class="banner" id="banner">
          <div class="banner__wrapper">
            <p class="banner__text">
              Wir reparieren weiter! Schreib uns per &nbsp;

              <a class="banner__link" href="https://wa.me/491628282353">
                <img
                  class="banner__image"
                  src="images/icons/whatsapp_button_orange.svg"
                  alt="WhatsApp"
                />
              </a>
              &nbsp; unter 0162-8282353.
            </p>
            <button id="closeBanner" class="banner__button">
              <img src="images/icons/banner_cross.svg" alt="Close Banner" />
            </button>
          </div>
        </div>
        <div class="nav__wrapper">
          <a class="nav__item logo" href="#">
            <img
              class="logo__img"
              src="images/logo/logo_blackorange.svg"
              alt="Smartphoniker Logo"
            />
          </a>

          <ul id="nav" class="nav__list">
            <li class="nav__listitem"><a href="#">Shop</a></li>
            <li class="nav__listitem"><a href="#">Services</a></li>
            <li class="nav__listitem"><a href="#">Standort</a></li>
            <li class="nav__listitem"><a href="#">Nachhaltigkeit</a></li>
            <li class="nav__listitem"><a href="#">Über Uns</a></li>
          </ul>

          <a class="nav__phone" href="tel:+4943190700390">
            <img
              class="nav__img"
              src="images/icons/phone_orangewhite.svg"
              alt="Jetzt anrufen"
            />
          </a>
          <button class="nav__menuicon menuicon" id="menuicon">
            <span class="menuicon__line menuicon__line--1"></span>
            <span class="menuicon__line menuicon__line--2"></span>
            <span class="menuicon__line menuicon__line--3"></span>
          </button>
        </div>
      </nav>
    </header>