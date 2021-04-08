<form class="section__content form" id="application" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" enctype="multipart/form-data">
    
    <input type="hidden" name="Type_of_Enquiry" value="Bewerbung">
    
    <div class="form__half">
        <label for="application_fname" class="form__label">
            Vorname<span class="form__required">*</span>
        </label>
        <input id="application_fname" class="form__input" name="First_Name" type="text" required>
    </div>
    <div class="form__half">
        <label for="application_lname" class="form__label">
            Nachname<span class="form__required">*</span>
        </label>
        <input id="application_lname" class="form__input" name="Last_Name" type="text" required>
    </div>
    <div class="form__full">
        <label for="application_email" class="form__label">
            E-Mail<span class="form__required">*</span>
        </label>
        <input id="application_email" type="email" class="form__input" name="Email" required>
    </div>

    <div class="form__full">
        <label for="application_message" class="form__label">
            Was treibt Dich an?  Was ist Dir wichtig?  Was kannst Du besonders gut?<span class="form__required">*</span>
        </label>
        <textarea id="application_message" class="form__textarea" name="Message"></textarea>
    </div>

    <div class="form__full">
        <label class="form__label" for="application_cv">Lebenslauf (nur .pdf)<span class="form__required">*</span></label>
        <input id="application_cv" type="file" class="form__input--file" accept="application/pdf" name="file" required>
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
        data-action='submit' class="g-recaptcha form__button button button--white" type="submit" id="submit">Bewerbung abschicken</button>
   

</form>
<script id="grecaptcha" src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_TOKEN; ?>" data-token="<?php echo RECAPTCHA_TOKEN; ?>" async defer></script>

<?php get_template_part( 'template-parts/form', 'loadingscreen' ); ?>