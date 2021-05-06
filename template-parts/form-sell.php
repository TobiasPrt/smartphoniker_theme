<?php
/**
 * Form: Sell Device
 * 
 * Template Part: Customers choose their current device and get a price.
 *
 * @package Smartphoniker
 * @since 1.0.0
 * @since 1.0.5 added wp_action field
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

<form class="section__content form" id="sell" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" enctype="multipart/form-data">
    
    <input type="hidden" name="Type_of_Enquiry" value="Ankaufanfrage">
    <input type="hidden" name="wp_action" value="newsletter">
    
    <div class="form__half">
        <label for="sell_fname" class="form__label">
            Vorname<span class="form__required">*</span>
        </label>
        <input id="sell_fname" class="form__input" name="First_Name" type="text" required>
    </div>
    <div class="form__half">
        <label for="sell_lname" class="form__label">
            Nachname<span class="form__required">*</span>
        </label>
        <input id="sell_lname" class="form__input" name="Last_Name" type="text" required>
    </div>
    <div class="form__full">
        <label for="sell_email" class="form__label">
            E-Mail<span class="form__required">*</span>
        </label>
        <input id="sell_email" type="email" class="form__input" name="Email" required>
    </div>

    <div class="form__half">
        <label for="sell_manufacturer" class="form__label">
            Hersteller<span class="form__required">*</span>
        </label>
        <select class="form__select" name="manufacturer" id="select-manufacturer">
            <?php foreach ( (array) $manufacturers as $manufacturer ):  ?>
                <option value="<?php echo $manufacturer->name; ?>"><?php echo $manufacturer->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form__half">
        <label for="sell_manufacturer" class="form__label">
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


    <div class="form__full">
        <label for="sell_message" class="form__label">
            Beschreibe den Zustand Deines Gerätes<span class="form__required">*</span>
        </label>
        <textarea id="sell_message" class="form__textarea" name="Message" placeholder="Beschädigungen (Displaybruch, Rückseite gebrochen) oder enthaltenes Zubehör (Ladekabel, OVP)"></textarea>
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
        data-action='submit' class="g-recaptcha form__button button button--white" type="submit" id="submit">Anfrage abschicken</button>
   

</form>
<script id="grecaptcha" src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_TOKEN; ?>" data-token="<?php echo RECAPTCHA_TOKEN; ?>" async defer></script>


<?php get_template_part( 'template-parts/form', 'loadingscreen' ); ?>