<?php
/**
 * Template: Area
 *
 * @package Smartphoniker
 * @since 1.1.0
 * @since 1.1.13 added repairs block
 */

get_header();

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


<!-- Infotext -->
<section class="content__section section">
    <h2 class="section__heading">Handy-Reparatur <?php the_title(); ?></h2>
    <?php
    $col1_text = "Die Filiale in Nähe von [area] ist für dich da, wenn du für dein Gerät professionelle Hilfe benötigst. Dein Smartphone macht Probleme oder dein Notebook ist kaputt? Wir machen deine Teile heile!";
    $col1_args['text'] = str_replace("[area]", get_the_title(), $col1_text );
    get_template_part( "template-parts/component", "col-1", $col1_args )
    ?>
</section>

<!-- The table with devices -->
<section class="content__section section">
    <h2 class="section__heading">Die beliebtesten Reparaturen</h2>
    <?php
    $repair_args['rows'] = carbon_get_theme_option('area_rows');
    get_template_part( "template-parts/component", "repairs", $repair_args  ); ?>
</section>


<!-- Nächstgelegener shop -->
<section class="content__section section">
    <h2 class="section__heading">Repariere dein Gerät vor Ort</h2>
    <?php 
    $store_id = carbon_get_post_meta( get_the_ID(), 'store' );
    $store_name = get_the_title( $store_id );
    $store_image = carbon_get_post_meta( $store_id, 'header_image' );
    $store_hours = get_post_meta( $store_id, '_opening_hours' )[0];
    $store_address = str_replace( ',', '<br>', carbon_get_post_meta( $store_id, 'address' )['address'] );;
    $store_maps_link = get_post_meta( $store_id, '_google_maps_url' )[0];
    ?>
    <div class="section__content section__content--large block-2 block-2--orange">
         
        <!-- Image -->
        <div class="block-2__block">
            <picture>
                <img src="<?php echo $store_image; ?>" alt="Bild vom Store" class="block-2__img">
            </picture>
        </div>
        
        <!-- Text -->
        <div class="block-2__block block-2__block--center">
            <p class="block-2__text block-2__text--large"><?php echo $store_name; ?></p>
            <br>
            <p class="block-2__text block-2__text--center"><?php echo $store_hours; ?></p>
            <br>
            <br>
            <p class="block-2__text block-2__text--large">
                Adresse
            </p>
            <br>
            <p class="block-2__text block-2__text--center"><?php echo $store_address; ?></p>
            <a class="block-2__button button button--orange" href="<?php echo $store_maps_link; ?>" target="_blank">
                zum Routenplaner
            </a>
        </div>          
    
    </div>

    <!-- The 3 columns with services -->
    <?php
    $repairs = get_all_posts( 'repair' );
    $col3_args = array(
        'column_options' => array(),
    );
    $i = 0;
    foreach ( (array) $repairs as $id => $name ) {
        $col3_args['columns'][$i]['_type'] = 'icon-heading-text';
        $col3_args['columns'][$i]['icon'] = intval( carbon_get_post_meta( $id, 'icon' ) );
        $col3_args['columns'][$i]['heading'] = $name;
        $col3_args['columns'][$i]['text'] = carbon_get_post_meta( $id, 'description' );
        $i++;
    }

    get_template_part( "template-parts/component", "col-3", $col3_args );
    ?>
</section>

<section class="content__section section">
    <h2 class="section__heading">Versandreparatur in 3 einfachen Schritten:</h2>
    
    <!-- Send in manual -->
    <?php 
    $manual_args = array(
        'list_options' => array(
            'columnlayout', 'numbers'
        ),
    );

    // Text 1
    $manual_args['list_items'][0]['_type'] = 'heading-text';
    $manual_args['list_items'][0]['icon'] = 23;
    $manual_args['list_items'][0]['text'] = "Kostenlos dein Gerät an uns senden";

    // Text 2
    $manual_args['list_items'][1]['_type'] = 'heading-text';
    $manual_args['list_items'][1]['icon'] = 23;
    $manual_args['list_items'][1]['text'] = "Wir reparieren dein Gerät";

     // Text 3
    $manual_args['list_items'][2]['_type'] = 'heading-text';
    $manual_args['list_items'][2]['icon'] = 23;
    $manual_args['list_items'][2]['text'] = "Wir senden dir dein repariertes Gerät zurück";

    get_template_part( 'template-parts/component', 'block-list', $manual_args );
    ?>

    <!-- Send in form -->
    <?php get_template_part( "template-parts/form", "sendin", [] ); ?>

    <!-- Seo Texts -->
    <?php
    $seo_args = array(
        'column_options' => array(
            'text_is_left_aligned'
        ),
    );
    
    // Text 1
    $seo_args['columns'][0]['_type'] = 'heading-text';
    $seo_args['columns'][0]['heading'] = "Mit gewohnter Smartphoniker-Qualität";
    $seo_args['columns'][0]['text'] = 
    "Dein Smartphone soll wieder wie neu sein und zwar je eher desto besser? 
    Dann bist du bei Smartphoniker an der richtigen Adresse. 
    Wir haben jahrelange Erfahrung in der Reparatur von mobilen Endgeräten 
    und bringen dein Gerät wieder in Ordnung. 
    Unser Team arbeitet zuverlässig, schnell und nachhaltig – 
    und im Handumdrehen kannst du dein Gerät wie gewohnt nutzen.";
    
    // Text 2
    $seo_args['columns'][1]['_type'] = 'heading-text';
    $seo_args['columns'][1]['heading'] = "Wir kümmern uns um die Details";
    $seo_args['columns'][1]['text'] = 
    "Als Spezialisten für Handy- und Tablet-Reparaturen bringen wir dein Gerät wiederauf Vordermann. 
    Ob iPhone, iPad, Samsung oder Huawei – unser Service kann sich sehen lassen. 
    Mache es wie viele zufriedene Smartphoniker-Kunden und überzeuge dich selbst. 
    Sende dein Gerät ein, wir kümmern uns um den Rest und du hältst dein Lieblingsgerät bald wieder in Händen.";
    
    // Text 3
    $seo_args['columns'][2]['_type'] = 'heading-text';
    $seo_args['columns'][2]['heading'] = "Dein nachhaltiger Reparatur-Dienst in [area]";
    $seo_args['columns'][2]['heading'] = str_replace("[area]", get_the_title(), $seo_args['columns'][2]['heading'] );
    $seo_args['columns'][2]['text'] = 
    "Smartphoniker steht für hohe Qualität und exzellenten Service. 
    Wir reparieren zerbrochene Displays, defekte Akkus und vieles mehr. 
    So können wir gemeinsam dafür sorgen, dass weniger Ressourcen verbraucht werden 
    und dadurch sogar bares Geld sparen. Also profitiere auch du von unseren nachhaltigen 
    und regionalverankerten Smartphoniker-Angeboten und nutze unseren smarten Versandreparatur-Service.";
    
    get_template_part( "template-parts/component", "col-3", $seo_args ); 
    ?>

</section>

<!-- FAQ Excerpt -->
<section class="content__section section">
    <h2 class="section__heading">Antworten auf häufige Fragen</h2>
    <div class="long-text">
        <h3>Wie kann ich den Status meiner Reparatur verfolgen?</h3>
        <p>
        Damit Sie ganz bequem auf dem Laufenden gehalten werden, erhalten Sie von uns 
        zu verschiedenen Etappen des Vorgangs E-Mails mit dem aktuellen Status der Reparatur. 
        Sollten Sie keine E-Mails erhalten oder mehr als 4 Tage keine E-Mail erhalten haben, 
        kontaktieren Sie bitte unseren <a href="mailto:support@smartphoniker.de">Kundenservice</a>.
        </p>

        <h3>Wie läuft der Bezahlvorgang ab?</h3>
        <p>
        Privatkunden: Aktuell bieten wir eine Zahlung per Paypal, als Überweisung oder 
        bei Abgabe in einer unserer Filialen in Bar, mit EC-Karte oder mit Kreditkarte an. 
        Nachdem wir die Zahlung erhalten haben, senden wir Ihnen das Gerät umgehend und sicher verpackt zu. 
        Bei vor Ort Reparaturen, händigen wir das Gerät nach Fertigstellung an Sie aus. 
        Rechnungen sind vollständig, vor Ausgabe des Gerätes an Sie, zu zahlen. 
        Ausnahme: Abtretungserklärung <a href="https://smartphoniker.shop/faq?q=12">siehe hier</a>. <br>
        Geschäftskunden: Geschäftskunden profitieren ab der zweiten Reparatur, von einem Kauf auf Rechnung 
        mit Zahlungsziel von 14 Tagen.
        </p>

        <h3>Welche Hersteller repariert ihr alles?</h3>
        <p>
        Momentan bieten wir gelistete Reparaturen für Apple, Huawei, Samsung, Sony, HTC, LG, Google, OnePlus, 
        Nokia, Honor, Wiko, CAT, Xiaomi, Vivo, Motorola, Oppo und ZTE an. Sollte Ihr Gerät nicht dabei sein, 
        kontaktieren Sie gerne unseren Kundenservice. Häufig bekommen wir auch für andere Hersteller passende 
        Ersatzteile und können Ihnen dann ein individuelles Angebot unterbreiten.
        </p>
    </div>
</section>


<?php
get_footer();
