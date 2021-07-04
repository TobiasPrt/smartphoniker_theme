<?php
/**
 * Form: Send in Device
 * 
 * Template Part: Customers choose their current device and send them in.
 *
 * @package Smartphoniker
 * @since 1.1.5
 */


$devices = new WP_Query( array(
    'posts_per_page'   => -1,
    'post_type' => 'device',
    'orderby' => array(
        'title' => 'ASC'
    ),
) );

$manufacturers = get_categories( array(
    'taxonomy' => 'manufacturer',
    'orderby' => 'name',
    'order' => 'ASC'
) );
?>

<form class="section__content form multistepform" id="sendin" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" enctype="multipart/form-data">
    
    <input type="hidden" name="type_of_inquiry" value="SendinDevice">
    <input type="hidden" name="action" value="sendin">
    
    <!-- Progressbar -->
    <div class="progressbar visible">
        <div class="progressbar__part progressbar__part--active">
            <p class="progressbar__text">1. Gerät</p>
            <div class="progressbar__bar"></div>
        </div>
        <div class="progressbar__part">
            <p class="progressbar__text">2. Kontaktdaten</p>
            <div class="progressbar__bar"></div>
        </div>
        <div class="progressbar__part">
            <p class="progressbar__text">3. Versandlabel</p>
            <div class="progressbar__bar"></div>
        </div>
    </div>

    <!-- GROUP 1: -->
    <div class="multistepform__group visible">
        <!-- Manufacturer -->
        <div class="form__half">
            <label for="sendin_manufacturer" class="form__label">
                Hersteller<span class="form__required">*</span>
            </label>
            <select class="form__select" name="manufacturer" id="select-manufacturer">
                <?php foreach ( (array) $manufacturers as $manufacturer ):  ?>
                    <option value="<?php echo $manufacturer->name; ?>"><?php echo $manufacturer->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Device -->
        <div class="form__half">
            <label for="sendin_manufacturer" class="form__label">
                Modell<span class="form__required">*</span>
            </label>
            <?php foreach ( (array) $manufacturers as $manufacturer ):  ?>
                <?php if ($devices->have_posts() ) : ?>
                    <select class="form__select hidden" name="modell" id="<?php echo $manufacturer->name; ?>">
                        <?php while ( $devices->have_posts() ) : $devices->the_post(); ?>
                            <?php if ( get_the_terms(get_the_ID(), 'manufacturer')[0]->name === $manufacturer->name ): ?>
                                <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </select>
                <?php endif; ?>                    
            <?php endforeach; ?>
        </div>
        
        <!-- Code -->
        <div class="form__full">
            <label for="sendin_code" class="form__label">
                Entsperrcode / Passwort
            </label>
            <input id="sendin_code" type="password" class="form__input" name="code" placeholder="Wird zur Analyse und zum Testen benötigt">
        </div>

        <!-- Message -->
        <div class="form__full">
            <label for="sendin_message" class="form__label">
                Beschreibe den Zustand Deines Gerätes<span class="form__required">*</span>
            </label>
            <textarea id="sendin_message" class="form__textarea" name="message" placeholder="Beschädigungen (Displaybruch, Rückseite gebrochen) oder enthaltenes Zubehör (Ladekabel, OVP)"></textarea>
        </div>

        <!-- Privacy -->
        <div class="form__info">
            Diese Seite ist durch reCAPTCHA geschützt. Es gelten die 
            <a class="form__required" href="https://policies.google.com/privacy">Datenschutzerklärung</a> und
            <a class="form__required" href="https://policies.google.com/terms">Geschäftsbedingungen</a> von Google.
        </div>

        <!-- Buttons -->
        <button class="form__button button button--white" type="button" data-value="1" data-role="navigation">
            Nächster Schritt
        </button>
    </div>


    <!-- GROUP 2: -->
    <div class="multistepform__group">
        <p class="form__error">An error ocurred: </p>
        <!-- First Name -->
        <div class="form__half">
            <label for="sendin_fname" class="form__label">
                Vorname<span class="form__required">*</span>
            </label>
            <input id="sendin_fname" class="form__input" name="first_name" type="text" required>
        </div>

        <!-- Last Name -->
        <div class="form__half">
            <label for="sendin_lname" class="form__label">
                Nachname<span class="form__required">*</span>
            </label>
            <input id="sendin_lname" class="form__input" name="last_name" type="text" required>
        </div>

        <!-- E-Mail -->
        <div class="form__full">
            <label for="sendin_email" class="form__label">
                E-Mail<span class="form__required">*</span>
            </label>
            <input id="sendin_email" type="email" class="form__input" name="email" required>
        </div>

        <!-- Street + Number -->
        <div class="form__full">
            <label for="sendin_email" class="form__label">
                Straße & Nr<span class="form__required">*</span>
            </label>
            <input id="sendin_email" type="text" class="form__input" name="street" required>
        </div>

        <!-- Zip Code -->
        <div class="form__half">
            <label for="sendin_zipcode" class="form__label">
                PLZ<span class="form__required">*</span>
            </label>
            <input id="sendin_zipcode" class="form__input" type="text" name="zipcode" required>
        </div>

        <!-- City -->
        <div class="form__half">
            <label for="sendin_city" class="form__label">
                Ort<span class="form__required">*</span>
            </label>
            <input id="sendin_city" class="form__input" type="text" name="city" required>
        </div>

        <!-- Privacy -->
        <div class="form__info">
            Diese Seite ist durch reCAPTCHA geschützt. Es gelten die 
            <a class="form__required" href="https://policies.google.com/privacy">Datenschutzerklärung</a> und
            <a class="form__required" href="https://policies.google.com/terms">Geschäftsbedingungen</a> von Google.
        </div>

        <!-- Buttons -->
        <button class="form__button button button--grey multistepform__button" type="button" data-value="-1" data-role="navigation">zurück</button>
        <button
            data-sitekey="reCAPTCHA_site_key" 
            data-callback='onSubmit' 
            data-action='submit' class="g-recaptcha form__button button button--white multistepform__button" type="submit" data-role="submit"
        >Anfrage abschicken</button>
    </div>

    
    <!-- GROUP 3: -->
    <div class="multistepform__group multistepform__group--summary">

        <!-- Success Message + Shipping Label -->
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/checkmark.svg" alt="Bestellung erfolgreich">
        <h3>Vielen Dank für deine Anfrage! Drucke jetzt dein kostenloses Versandlabel aus.</h3>
        <a class="form__button button button--white multistepform__button" target="_blank" href="https://www.dhl.de/retoure/gw/rpcustomerweb/OrderEntry.action?hash=29f11f793023b5282276faee4f4f71cb40d5c63388f200fc9e77ea8ffc5439f2" data-value="1" data-role="navigation">
            Versandlabel drucken
        </a>

        <!-- Inquiry Summary -->
        <h3>Zusammenfassung deiner Anfrage:</h3>
        <div class="ordersummary">
            <div class="ordersummary__block">
                <p class="ordersummary__heading">Kontaktdaten:</p>
                <p class="ordersummary__text">
                    
                </p>
            </div>
            <div class="ordersummary__block">
                <p class="ordersummary__heading">Anfrage:</p>
                <p class="ordersummary__text">
                    
                </p>
            </div>
        </div>
    </div>

    <!-- reCaptcha Token -->
    <input type="hidden" id="g-recaptcha-response" name="token">
    <?php wp_nonce_field( 'csrf-protection' ); ?>

</form>
<script id="grecaptcha" src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_TOKEN; ?>" data-token="<?php echo RECAPTCHA_TOKEN; ?>" async defer></script>

<!-- LoadingScreen -->
<?php get_template_part( 'template-parts/form', 'loadingscreen' ); ?>