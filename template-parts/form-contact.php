<form class="section__content form" id="contact" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">
    <input type="hidden" name="Type_of_Enquiry" value="Kontaktanfrage">
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
        <span class="form__required">*</span> = muss ausgefüllt werden 
    </div>

    <button class="form__button button button--orange" type="submit">Ab geht die Post</button>

</form>