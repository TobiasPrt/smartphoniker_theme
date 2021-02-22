<?php
/**
 * Banner Component
 *
 * @package Smartponiker
 */

if (isset($args['color'])): ?>
    <div class="banner banner--<?= $args['color']; ?>" id="banner">
<?php endif; ?>


    <div class="banner__wrapper">
        <p class="banner__text">


                <?php if ($args["type"] == "whatsapp-orange"): ?>
                    Wir reparieren weiter! Schreib uns per &nbsp;
                    <a class="banner__link" href="https://wa.me/491628282353">
                    <img class="banner__image" src="<?= get_template_directory_uri() ?>/assets/images/icons/whatsapp_button_orange.svg" alt="WhatsApp" /> 
                    </a>
                    &nbsp; unter 0162-8282353.
                <?php else: ?>
                    <?= $args["content"]; ?>        
                <?php endif; ?>


        </p>
        <button id="closeBanner" class="banner__button">
            <img src="<?= get_template_directory_uri() ?>/assets/images/icons/banner_cross.svg" alt="Close Banner" />
        </button>
    </div>
</div>