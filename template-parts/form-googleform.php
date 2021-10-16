<?php
/**
 * Template-Part: Form for Newsletter registration.
 * 
 * @package Smartphoniker
 * @since 1.1.6
 */
?>

<form class="section__content form form--block" id="googleform" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">
<p class="form__error">An error ocurred: </p>

    <!-- WordPress Action Hook -->
    <input type="hidden" name="action" value="googleform">
    <input type="hidden" name="target" value="googleform">

    <!-- First Name -->
    <div class="form__half">
        <label for="newsletter_fname" class="form__label">
            Vorname<span class="form__required">*</span>
        </label>
        <input id="newsletter_fname" class="form__input" name="First_Name" type="text" required>
    </div>

    <!-- Last Name -->
    <div class="form__half">
        <label for="newsletter_lname" class="form__label">
            Nachname<span class="form__required">*</span>
        </label>
        <input id="newsletter_lname" class="form__input" name="Last_Name" type="text" required>
    </div>

    <!-- E-mail -->
    <div class="form__full">
        <label for="newsletter_email" class="form__label">
            E-Mail<span class="form__required">*</span>
        </label>
        <input id="newsletter_email" type="email" class="form__input" name="Email">
    </div>

    <!-- Opt-In Conditions of Participation -->
    <div class="form__full form__full--inline">
        
        <input id="contest_conditions" type="checkbox" class="form__checkbox" name="conditions" checkboxtype="required">
        <label for="contest_conditions" class="form__label form__label">
            Du erlaubst uns, dass wir deine Daten zu Werbezwecken verarbeiten und wir dich für Angebote kontaktieren dürfen.
        </label>
    </div>

    <!-- Information -->
    <div class="form__info">
        Wir passen auf Deine Daten auf. Erfahre mehr in unserer <a class="form__required" href="https://smartphoniker.de/datenschutz">Datenschutzerklärung</a>. <br>
        Diese Seite ist durch reCAPTCHA geschützt. Es gelten die 
        <a class="form__required" href="https://policies.google.com/privacy">Datenschutzerklärung</a> und
        <a class="form__required" href="https://policies.google.com/terms">Geschäftsbedingungen</a> von Google.
    </div>

    <input type="hidden" id="g-recaptcha-response" name="token">
    <?php wp_nonce_field( 'csrf-protection' ); ?>

    <button
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit' class="g-recaptcha form__button button button--orange" type="submit" id="submit">Jetzt Gutschein sichern</button>
   

</form>
<script id="grecaptcha" src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_TOKEN; ?>" data-token="<?php echo RECAPTCHA_TOKEN; ?>" async defer></script>

<?php get_template_part( 'template-parts/form', 'loadingscreen' ); ?>
