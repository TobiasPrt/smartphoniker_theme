<?php
/**
 * Form: General contact form.
 *
 * @package Smartphoniker
 * @since 1.0.0
 * @since 1.0.5 added wp_action field
 */
?>

<form class="section__content form" id="contact" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">
    
    <input type="hidden" name="Type_of_Enquiry" value="Kontaktanfrage">
    <input type="hidden" name="wp_action" value="newsletter">
    
    <div class="form__half">
        <label for="contact_fname" class="form__label">
            Vorname<span class="form__required">*</span>
        </label>
        <input id="contact_fname" class="form__input" name="First_Name" type="text" required>
    </div>
    <div class="form__half">
        <label for="contact_lname" class="form__label">
            Nachname<span class="form__required">*</span>
        </label>
        <input id="contact_lname" class="form__input" name="Last_Name" type="text" required>
    </div>
    <div class="form__full">
        <label for="contact_email" class="form__label">
            E-Mail<span class="form__required">*</span>
        </label>
        <input id="contact_email" type="email" class="form__input" name="Email" required>
    </div>

    <div class="form__full">
        <label for="contact_message" class="form__label">
            Nachricht<span class="form__required">*</span>
        </label>
        <textarea id="contact_message" class="form__textarea" name="Message"></textarea>
    </div>

    <div class="form__info">
        Diese Seite ist durch reCAPTCHA geschützt. Es gelten die 
        <a class="form__required" href="https://policies.google.com/privacy">Datenschutzerklärung</a> und
        <a class="form__required" href="https://policies.google.com/terms">Geschäftsbedingungen</a> von Google.
    </div>

    <input type="hidden" id="g-recaptcha-response" name="token">
    <?php wp_nonce_field( 'csrf-protection' ); ?>

    <button
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit' class="g-recaptcha form__button button button--white" type="submit" id="submit">Ab geht die Post</button>
   

</form>
<script id="grecaptcha" src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_TOKEN; ?>" data-token="<?php echo RECAPTCHA_TOKEN; ?>" async defer></script>

<?php get_template_part( 'template-parts/form', 'loadingscreen' ); ?>