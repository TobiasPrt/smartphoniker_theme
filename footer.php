<?php
/**
 * Template-Part: Footer
 *
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

    </main>

    <footer class="footer">

        <div class="footer__wrapper">

            <!-- Zahlungsmethoden -->
            <ul class="footer__payments columns-9">
                <?php foreach ( carbon_get_theme_option( 'payment_methods' ) as $payment_method_attachment_id ): ?>
                    <li class="columns-9__element">
                        <?php echo wp_get_attachment_image( $payment_method_attachment_id ); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            
            <!-- Logo -->
            <img
                class="footer__logo"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo_orangewhite.svg"
                alt="Smartphoniker"
            />

            <!-- Footer content -->
            <div class="footer__content">
            
                <!-- Über Uns -->
                <div class="footer__block infoblock">
                    <p class="infoblock__heading">Über Uns</p>
                    <p class="infoblock__text"><?php echo carbon_get_theme_option( 'about' ); ?></p>
                </div>
           
                <!-- Kontaktiere Uns -->
                <div class="footer__block infoblock">
                    <p class="infoblock__heading">Kontaktiere Uns</p>
                    <a class="infoblock__text infoblock__text--link" href="tel:+<?php echo carbon_get_theme_option( 'phone_number' ); ?>">
                        <?php echo carbon_get_theme_option( 'phone_number_show' ); ?>
                    </a>
                    <a class="infoblock__text infoblock__text--link" href="mail:<?php echo carbon_get_theme_option( 'email' ); ?>">
                        <?php echo carbon_get_theme_option( 'email' ); ?>
                    </a>
                </div>
             
                <!-- Hilfreiche Links -->
                <div class="footer__block footer__block--small infoblock">
                <p class="infoblock__heading">Hilfreiche Links</p>
                    
                    <!-- Navigation Footer Links -->
                    <?php
                    wp_nav_menu( array(
                        'menu' => 'footer_links',
                        'container' => '',
                        'theme_location' => 'footer_links',
                    ) );
                    ?>

                </div>
                
                <!-- Informationen -->
                <div class="footer__block footer__block--small infoblock">
                    <p class="infoblock__heading">Informationen</p>
                    
                    <!-- Navigation Footer Legal -->
                    <?php
                    wp_nav_menu( array(
                        'menu' => 'footer_legal',
                        'container' => '',
                        'theme_location' => 'footer_legal',
                    ) );
                    ?>

                </div>

            </div>


            <hr class="footer__line" />

                
            <!-- Footer End -->
            <div class="footer__end">


                <!-- Footer social media -->
                <div class="footer__socialmedia">
                    <a href="<?php echo carbon_get_theme_option( 'facebook_link' ); ?>" class="footer__socialicon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/facebook.svg" alt="facebook" />
                    </a>
                    <a href="<?php echo carbon_get_theme_option( 'instagram_link' ); ?>" class="footer__socialicon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/instagram.svg" alt="instagram" />
                    </a>
                </div>


                <!-- Footer credits -->
                <div class="footer__credits">
                    Made by&nbsp;<a href="https://tobiaspoertner.com">Tobias</a>
                </div>

                
            </div>

        </div>

    </footer>

    <?php wp_footer(); ?>

</body>
</html>