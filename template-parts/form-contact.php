<form class="section__content form" id="contact">

    <div class="form__half">
        <label for="contact_fname" class="form__label">
            Vorname<span class="form__required">*</span>
        </label>
        <input id="contact_fname" class="form__input" name="contact_fname" type="text" required>
    </div>
    <div class="form__half">
        <label for="contact_lname" class="form__label">
            Nachname<span class="form__required">*</span>
        </label>
        <input id="contact_lname" class="form__input" name="contact_lname" type="text" required>
    </div>
    <div class="form__full">
        <label for="contact_email" class="form__label">
            E-Mail<span class="form__required">*</span>
        </label>
        <input id="contact_email" type="email" class="form__input" name="contact_email" required>
    </div>

    <div class="form__full">
        <label for="contact_message" class="form__label">
            Nachricht<span class="form__required">*</span>
        </label>
        <textarea id="contact_message" class="form__textarea" name="contact_message"></textarea>
    </div>

    <div class="form__info">
        <span class="form__required">*</span> = muss ausgefüllt werden 
    </div>

    <button class="form__button button button--orange" type="submit">Ab geht die Post</button>
    
</form>