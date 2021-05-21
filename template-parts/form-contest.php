<?php
/**
 * Template-Part: Form for Contest registration.
 * 
 * @package Smartphoniker
 * @since 1.0.5
 */
?>

<form class="section__content form form--block" id="contest" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">

    <!-- WordPress Action Hook -->
    <input type="hidden" name="wp_action" value="newsletter">
    <input type="hidden" name="target" value="contest">

    <p class="form__error">Akzeptiere unsere Teilnahmebedingungen bevor du fortfährst.</p>

    <!-- First Name -->
    <div class="form__half">
        <label for="contest_fname" class="form__label">
            Vorname<span class="form__required">*</span>
        </label>
        <input id="contest_fname" class="form__input" name="First_Name" type="text" required>
    </div>

    <!-- Last Name -->
    <div class="form__half">
        <label for="contest_lname" class="form__label">
            Nachname<span class="form__required">*</span>
        </label>
        <input id="contest_lname" class="form__input" name="Last_Name" type="text" required>
    </div>

    <!-- E-Mail -->
    <div class="form__full">
        <label for="contest_email" class="form__label">
            E-Mail<span class="form__required">*</span>
        </label>
        <input id="contest_email" type="email" class="form__input" name="Email" required>
    </div>

    <!-- Opt-In Conditions of Participation -->
    <div class="form__full form__full--inline">
        
        <input id="contest_conditions" type="checkbox" class="form__checkbox" name="conditions">
        <label for="contest_conditions" class="form__label form__label">
            Du hast unsere <a class="form__required" href="https://smartphoniker.de/gewinnspiel_teilnahmebedingungen">Teilnahmebedingungen</a> gelesen und akzeptiert.
        </label>
    </div>

    <!-- Opt-In Newsletter -->
    <div class="form__full form__full--inline">
        <input id="contest_newsletter" type="checkbox" class="form__checkbox" name="newsletter">
        <label for="contest_newsletter" class="form__label form__label">
            Abonniere unseren Newsletter und sichere dir 5€ Newsletter-Rabatt! Wir füttern dich regelmäßig mit den neuesten Infos über Gewinnspiele, Neuigkeiten und die mobile Kommunikation der Zukunft.
        </label>
    </div>
    
    <!-- Submit -->
    <button
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit' class="g-recaptcha form__button button button--orange" type="submit" id="submit">Jetzt teilnehmen</button>

    <!-- Information -->
    <div class="form__info">
        Wir passen auf Deine Daten auf. Erfahre mehr in unserer <a class="form__required" href="https://smartphoniker.de/datenschutz">Datenschutzerklärung</a>. <br>
        Diese Seite ist durch reCAPTCHA geschützt. Es gelten die 
        <a class="form__required" href="https://policies.google.com/privacy">Datenschutzerklärung</a> und
        <a class="form__required" href="https://policies.google.com/terms">Geschäftsbedingungen</a> von Google.
    </div>

    <input type="hidden" id="g-recaptcha-response" name="token">
    <?php wp_nonce_field( 'csrf-protection' ); ?>
    
   

</form>
<script id="grecaptcha" src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_TOKEN; ?>" data-token="<?php echo RECAPTCHA_TOKEN; ?>" async defer></script>

<?php get_template_part( 'template-parts/form', 'loadingscreen' ); ?>