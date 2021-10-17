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

            <!-- Whatsapp Banner (orange) -->
            <?php if ( 'whatsapp-orange' === $args['type'] ): ?>
                Wir reparieren weiter! Schreib uns per &nbsp;
                <a href="<?php echo carbon_get_theme_option( 'whatsapp_link' ); ?>" target="_blank">
                <img width="5" height="1" class="banner__image" src="<?php echo get_template_directory_uri() ?>/assets/images/icons/whatsapp_button_orange.svg" alt="WhatsApp" /> 
                </a>
                &nbsp; unter <?php echo carbon_get_theme_option( 'whatsapp_number' ); ?>.
            
            <!-- Whatsapp Banner (orange) inkl. eTermin Link -->
            <?php elseif ( 'whatsapp-etermin' === $args['type'] ): ?>
                Wir reparieren weiter! Schreib uns per &nbsp;
                <a href="<?php echo carbon_get_theme_option( 'whatsapp_link' ); ?>" target="_blank">
                <img width="5" height="1" class="banner__image" src="<?php echo get_template_directory_uri() ?>/assets/images/icons/whatsapp_button_orange.svg" alt="WhatsApp" />
                </a>
                &nbsp; oder <a class="banner__link" href="https://www.etermin.net/Smartphoniker" target="_blank">buche einen Termin</a>.
            
            <!-- Custom Banner -->
            <?php else: ?>
                <?php echo $args['content']; ?>
            <?php endif; ?>
        
        </p>

        <!-- Banner close button -->
        <button id="closeBanner" class="banner__button">
            <img width="1" height="1" src="<?php echo get_template_directory_uri() ?>/assets/images/icons/banner_cross.svg" alt="Close Banner" />
        </button>

    </div>
</div>