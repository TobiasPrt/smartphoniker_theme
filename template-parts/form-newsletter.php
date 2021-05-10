<?php
/**
 * Template-Part: Form for Newsletter registration.
 * 
 * @package Smartphoniker
 * @since 1.0.5
 */
?>

<form class="section__content form" id="newsletter" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">

    <!-- WordPress Action Hook -->
    <input type="hidden" name="wp_action" value="newsletter">
    <input type="hidden" name="target" value="newsletter">

    <div class="form__full">
        <label for="newsletter_email" class="form__label">
            E-Mail<span class="form__required">*</span>
        </label>
        <input id="newsletter_email" type="email" class="form__input" name="Email" required>
    </div>

    <div class="form__info">
        Diese Seite ist durch reCAPTCHA geschützt. Es gelten die 
        <a class="form__required" href="https://policies.google.com/privacy">Datenschutzerklärung</a> und
        <a class="form__required" href="https://policies.google.com/terms">Geschäftsbedingungen</a> von Google.
        Wir passen auf Deine Daten auf. Erfahre mehr in unserer <a class="form__required" href="https://smartphoniker.de/datenschutz">Datenschutzerklärung</a>.
    </div>

    <input type="hidden" id="g-recaptcha-response" name="token">
    <?php wp_nonce_field( 'csrf-protection' ); ?>

    <button
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit' class="g-recaptcha form__button button button--white" type="submit" id="submit">Newsletter abbonieren</button>
   

</form>
<script id="grecaptcha" src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_TOKEN; ?>" data-token="<?php echo RECAPTCHA_TOKEN; ?>" async defer></script>

<?php get_template_part( 'template-parts/form', 'loadingscreen' ); ?>