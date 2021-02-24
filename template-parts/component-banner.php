<?php
/**
 * Template-Part: Banner
 *
 * @package Smartponiker
 * @since 1.0.0
 */
?>


<div class="banner banner--<?php echo $args['color']; ?>" id="banner">
    <div class="banner__wrapper">

        <!-- Banner Content -->
        <p class="banner__text">

            <?php if ( 'whatsapp-orange' === $args['type'] ): ?>
                Wir reparieren weiter! Schreib uns per &nbsp;
                <a class="banner__link" href="https://wa.me/491628282353">
                <img class="banner__image" src="<?php echo get_template_directory_uri() ?>/assets/images/icons/whatsapp_button_orange.svg" alt="WhatsApp" /> 
                </a>
                &nbsp; unter 0162-8282353.
            <?php else: ?>
                <?php echo $args['content']; ?>
            <?php endif; ?>
        
        </p>

        <!-- Banner close button -->
        <button id="closeBanner" class="banner__button">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/banner_cross.svg" alt="Close Banner" />
        </button>

    </div>
</div>