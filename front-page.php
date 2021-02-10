<!-- Custom Field Deklarationen -->
<?php
$benefits = get_field("category2");
$feature = get_field("category3");
$testimonial = get_field("category4");
$info = get_field("category5");
?>




<!-- Header -->
<?php 
get_header();
?>

    <!-- Main -->
    <main class="content">

      <!-- Hero -->
      <?php 
        $hero = array(
          "heading" => get_field("pagetitle"),
          "subtitlemobile" => get_field("subtitle-mobile"),
          "subtitledesktop" => get_field("subtitle-desktop"),
          "components" => array(
            array(
              "type" => "block-form",
              "content" => array(
                "label_manufacturer" => get_field("label-manufacturer"),
                "label_device" => get_field("label-modell"),
                "label_button" => get_field("label-button"),
              ),
            ),
            array (
              "type" => "columns-5",
              "content" => array(
                "images" => array(
                  get_field("logo1"),
                  get_field("logo2"),
                  get_field("logo3"),
                  get_field("logo4"),
                  get_field("logo5"),
                ),
              )
            )
          ),
        );

        get_template_part( "template-parts/component", "hero", $hero );
      ?>

      <!-- News -->
      <?php 
        $news = array(
          "heading" => get_field("category1"),
          "components" => array(
            array(
              "type" => "block-2",
              "large" => true,
              "color" => "orange",
              "content" => array(
                "image" => "image",
                "text" => get_field("news_text"),
              ),
            ),
          ),
        );

        get_template_part( "template-parts/component", "section", $news ); 
      ?>

      

      <!-- Benefits -->
      <section class="content__section section">
        <h2 class="section__heading">Warum Smartphoniker?</h2>
          <div class="section__content columns-3">
            <div class="columns-3__column">
              <img
                class="columns-3__icon"
                src="images/icons/clock.svg"
                alt="Uhr"
              />
              <h3 class="columns-3__heading">kurze Reparaturdauer</h3>
              <p class="columns-3__text">
                Die Reparatur dauert in der Regel nicht länger als 1-2 Stunden
                Gerne kannst du auch einen Termin für den Einbau vereinbaren.
                Während du wartest kannst du dich in unserem gemütlichen
                Loungebereich entspannen oder in unserem Sharing-Bücherregal
                stöbern.
              </p>
            </div>
            <div class="columns-3__column">
              <img
                class="columns-3__icon"
                src="images/icons/hands.svg"
                alt="Uhr"
              />
              <h3 class="columns-3__heading">Lebenslange Garantie</h3>
              <p class="columns-3__text">
                Seit über 7 Jahren bieten wir hochqualitative Smartphone- &
                Tablet- Reparaturen an. Wir sind von unserer Qualität überzeugt
                und geben daher eine lebenslange Garantie auf alle
                Display-Reparaturen. Dein Gerät ist bei uns in guten Händen
              </p>
            </div>
            <div class="columns-3__column">
              <img
                class="columns-3__icon"
                src="images/icons/map_needle.svg"
                alt="Uhr"
              />
              <h3 class="columns-3__heading">Wir reparieren vor Ort</h3>
              <p class="columns-3__text">
                Augenkontakt ist uns wichtig und schafft Vertrauen. Unsere
                Standorte sind zentral gelegen und wir sind direkt telefonisch
                und per e-Mail erreichbar. Deinen Termin bei uns kannst du
                wunderbar mit einer Einkaufstour verbinden.
              </p>
            </div>
          </div>
        <div class="section__content section__content--small">
          <div class="video">
            <iframe
              src="https://www.youtube.com/embed/R5J75Pl-n_k?ps=docs&controls=1"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
            ></iframe>
          </div>
        </div>
      </section>

      <!-- Feature -->
      <section class="content__section section">
        <h2 class="section__heading">Unser Nachhaltigkeitsversprechen</h2>
        <div class="section__content section__content--large block-2 block-2--green">
          <div class="block-2__block">
            <picture>
              <img
                class="block-2__img"
                src="images/people/bene_new.jpg"
                alt="Bene im Laden"
              />
            </picture>
          </div>
          <div class="block-2__block block-2__block--center">
            <p class="block-2__text">
              „Auch traditionelles Zubehör schadet der Umwelt. Bei uns gibt es
              deshalb ausgewählte und nachhaltige Produkte von Firmen, die sich
              für die Umwelt einsetzen. Ob Bäume pflanzen oder die Meere von
              Plastik befreien - jedes Produkt unterstützt ein nachhaltiges
              Projekt.”
            </p>
            <a class="block-2__button button button--green" href="#"
              >mehr zum Thema</a
            >
          </div>
        </div>
      </section>

      <!-- Testimonial -->
      <section class="content__section section">
        <h2 class="section__heading">Das sagen unsere Kund:innen!</h2>
        <div class="section__content">
          <div class="columns-3">
            <div class="columns-3__column">
              <img
                class="columns-3__icon columns-3__icon--small"
                src="images/icons/5-stars.svg"
                alt="Uhr"
              />
              <p class="columns-3__text">
                „Tolle Beratung mein Smartphone hat nicht mehr richtig
                funktioniert und durch die schnelle und professionelle Betreuung
                konnte das Problem fix gelöst werden.“
              </p>
              <p class="columns-3__subtitle">Marina H.</p>
            </div>
            <div class="columns-3__column">
              <img
                class="columns-3__icon columns-3__icon--small"
                src="images/icons/5-stars.svg"
                alt="Uhr"
              />
              <p class="columns-3__text">
                „Ich war heute im Shop und bin begeistert, der Kollege ist sehr
                professionell und kann alles super erklären. Es standen viele
                Menschen an, trotzdem hat er sich Die Zeit genommen. Kompetent,
                schnell und günstig.“
              </p>
              <p class="columns-3__subtitle">Gerd H.</p>
            </div>
            <div class="columns-3__column">
              <img
                class="columns-3__icon columns-3__icon--small"
                src="images/icons/5-stars.svg"
                alt="Uhr"
              />
              <p class="columns-3__text">
                „Danke für die schnelle Reparatur und die kompetente Beratung.
                Es wurde ein originales Display verbaut und war sogar noch etwas
                günstiger als bei der Konkurrenz!“
              </p>
              <p class="columns-3__subtitle">Julian K.</p>
            </div>
          </div>
        </div>
        <div class="section__content section__content--large block-2">
          <div class="block-2__block block-2__block--center">
            <a href="https://g.page/Smartphoniker-Express-S?gm">
              <img
              class="block-2__img"
                src="images/googlerating.svg"
                alt="4.5 Sterne auf Google"
              />
            </a>
          </div>
          <div class="block-2__block block-2__block--center">
              <p class="block-2__text block-2__text--center">
                Bewertet uns auf Google und sichert euch einen 10 Euro
                Gutschein.
              </p>
              <a class="block-2__button button" href="#"
                >Jetzt bewerten</a
              >
            </div>
          </div>
        </div>
      </section>

      <!-- Info -->
      <section class="content__section section">
        <h2 class="info__heading section__heading">
          Zuverlässiger Handy-Reparatur-Service
        </h2>
        <div class="section__content section__content--small columns-1">
          <p class="columns-1__text">
            Ein Leben ohne Smartphone – in der heutigen Zeit ist ein solches
          Szenario für viele Menschen nahezu undenkbar. Doch was tun, wenn das
          geliebte Smartphone defekt ist und all diese Dinge, die mit einem
          Handy machbar und vor allem so angenehm praktisch sind, nicht mehr
          funktionieren? Falls Sie dann einen überaus erfahrenen
          Handy-Reparatur-Service im hohen Norden Deutschlands suchen, der Ihr
          Smartphone schnellstmöglich wieder auf Kurs bringt, stehen die
          Experten von Smartphoniker bereit.
          </p>
          
        </div>
        <div class="section__content columns-3">
          <div class="columns-3__column">
            <h3
              class="columns-3__heading columns-3__heading--left columns-3__heading--altcolor"
            >
              iPhone-Reparatur in Kiel
            </h3>
            <p class="columns-3__text columns-3__text--left">
              iPhones sind immer noch Kult! Wer auf die innovativen Smartphones
              schwört, macht keinen Schritt mehr ohne sie. Ist das Gerät jedoch
              nicht mehr voll funktionsfähig und liegt ein Display-
              beziehungsweise Hard- oder Software-Schaden vor, ist das noch
              lange kein Weltuntergang: Sie können gerne jederzeit eine
              iPhone-Reparatur an unseren weiteren Standorten vornehmen lassen.
              Unser versierter Reparaturservice kennt alle iPhone-Versionen aus
              dem Effeff und ist in der Lage, das beliebte Apple-Handy wieder in
              Top-Zustand zu versetzen.
            </p>
          </div>
          <div class="columns-3__column">
            <h3
              class="columns-3__heading columns-3__heading--left columns-3__heading--altcolor"
            >
              Samsung Galaxy-Reparatur
            </h3>
            <p class="columns-3__text columns-3__text--left">
              Wenn Sie Ihr Samsung Galaxy-Handy in die Reparatur geben müssen,
              haben Sie in uns einen Partner gefunden, der Ihnen schnell
              weiterhilft. Das gilt natürlich auch, wenn ein
              Huawei-Reparatur-Service benötigt wird. Entweder Sie besuchen uns
              in den Stores in Schleswig-Holstein oder Sie senden uns Ihr
              defektes Handy per Post. In diesem Fall wäre es von Vorteil, wenn
              Sie uns vorab per Telefon oder E-Mail kontaktieren und uns
              mitteilen, was an Ihrem Handy gemacht werden muss.
            </p>
          </div>
          <div class="columns-3__column">
            <h3
              class="columns-3__heading columns-3__heading--left columns-3__heading--altcolor"
            >
              Datenrettung
            </h3>
            <p class="columns-3__text columns-3__text--left">
              Sei es durch einen Sturz oder Virus – wenn Sie befürchten, dass
              Fotos, Videos, Dokumente etc. auf Ihrem Smartphone nicht mehr
              abrufbar sind, sollten Sie zu uns kommen. Daten vom defekten Handy
              retten oder einen Displayschaden beheben – für unseren erfahrenen
              Handy-Reparatur-Service ist das Alltag! Wir kennen uns mit allen
              Smartphone-Marken aus und stehen Ihnen ebenfalls zur Verfügung,
              wenn Sie Probleme mit Ihrem Tablet oder PC haben. Wir reparieren
              Ihre Consumer Elektronik-Geräte und retten Ihre Daten zum
              Festpreis!
            </p>
          </div>
        </div>
      </section>
    </main>

<!-- Footer -->
<?php get_footer(); ?>
