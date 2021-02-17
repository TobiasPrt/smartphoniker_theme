</main>

<footer class="footer">
  <div class="footer__wrapper">
    <ul class="footer__payments columns-9">
      <li class="columns-9__element">
        <img
          src="<?= get_template_directory_uri() ?>/assets/images/payment_method_icons/barzahlung.svg"
          alt="barzahlung"
        />
      </li>
      <li class="columns-9__element">
        <img src="<?= get_template_directory_uri() ?>/assets/images/payment_method_icons/girocard.svg" alt="girocard" />
      </li>
      <li class="columns-9__element">
        <img src="<?= get_template_directory_uri() ?>/assets/images/payment_method_icons/visa.svg" alt="visa" />
      </li>
      <li class="columns-9__element">
        <img
          src="<?= get_template_directory_uri() ?>/assets/images/payment_method_icons/mastercard.svg"
          alt="mastercard"
        />
      </li>
      <li class="columns-9__element">
        <img src="<?= get_template_directory_uri() ?>/assets/images/payment_method_icons/amex.svg" alt="amex" />
      </li>
      <li class="columns-9__element">
        <img src="<?= get_template_directory_uri() ?>/assets/images/payment_method_icons/paypal.svg" alt="paypal" />
      </li>
      <li class="columns-9__element">
        <img
          src="<?= get_template_directory_uri() ?>/assets/images/payment_method_icons/rechnung.svg"
          alt="auf Rechnung"
        />
      </li>
      <li class="columns-9__element">
        <img
          src="<?= get_template_directory_uri() ?>/assets/images/payment_method_icons/google_pay.svg"
          alt="google_pay"
        />
      </li>
      <li class="columns-9__element">
        <img src="<?= get_template_directory_uri() ?>/assets/images/payment_method_icons/apple_pay.svg" alt="apple_pay" />
      </li>
    </ul>

    <img
      class="footer__logo"
      src="<?= get_template_directory_uri() ?>/assets/images/logo/logo_orangewhite.svg"
      alt="Smartphoniker"
    />

    <div class="footer__content">
      <div class="footer__block infoblock">
        <p class="infoblock__heading"><?= get_field('footer_heading1') ?></p>
        <p class="infoblock__text">
          <?= get_field('footer_text1') ?>
        </p>
      </div>
      <div class="footer__block infoblock">
        <p class="infoblock__heading"><?= get_field('footer_heading2') ?></p>
        <a
          class="infoblock__text infoblock__text--link"
          href="tel:+<?= get_field('footer_phone_number') ?>"
          >
          <?= get_field('footer_phone_number_text') ?>
        </a
        >
        <a
          class="infoblock__text infoblock__text--link"
          href="mail:<?= get_field('footer_mail') ?>"
          >
          <?= get_field('footer_mail') ?>
        </a
        >
      </div>
      <div class="footer__block footer__block--small infoblock">
        <p class="infoblock__heading"><?= get_field('footer_heading3') ?></p>


        <?php
          wp_nav_menu( array(
              "menu" => "footer_links",
              "container" => "",
              "theme_location" => "footer_links",
            )
          );
        ?>
      </div>
      <div class="footer__block footer__block--small infoblock">
        <p class="infoblock__heading"><?= the_field('footer_heading4') ?></p>

        <?php
          wp_nav_menu( array(
              "menu" => "footer_legal",
              "container" => "",
              "theme_location" => "footer_legal",
            )
          );
        ?>
      </div>
    </div>


    <hr class="footer__line" />
    
    
    
    <div class="footer__end">
      <div class="footer__socialmedia">
        <a href="https://de-de.facebook.com/smartphoniker/" class="footer__socialicon">
          <img src="<?= get_template_directory_uri() ?>/assets/images/icons/facebook.svg" alt="facebook" />
        </a>
        <a href="https://www.instagram.com/smartphoniker/?hl=de" class="footer__socialicon">
          <img src="<?= get_template_directory_uri() ?>/assets/images/icons/instagram.svg" alt="instagram" />
        </a>
      </div>
      <div class="footer__credits">
        Made by&nbsp;<a href="https://tobiaspoertner.com">Tobias</a>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>