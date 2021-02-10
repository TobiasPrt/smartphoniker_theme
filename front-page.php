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
          "heading" => get_field("news_heading"),
          "components" => array(
            array(
              "type" => "block-2",
              "content" => array(
                "large" => true,
                "color" => get_field("news_color"),
                "image" => get_field("news_image"),
                "text" => get_field("news_text"),
                "link" => get_field("news_link"),
              ),
            ),
          ),
        );

        get_template_part( "template-parts/component", "section", $news ); 
        ?>

          

        <!-- Benefits -->
        <?php 
        $benefits = array(
          "heading" => get_field("benefits_heading"),
          "components" => array(
            array(
              "type" => "columns-3",
              "content" => array(
                "modifications" => array(
                  "headings"
                ),
                "columns" => array(
                  array(
                    "image" => get_field("benefit1_image"),
                    "heading" => get_field("benefit1_heading"),
                    "text" => get_field("benefit1_text"),
                  ),
                  array(
                    "image" => get_field("benefit2_image"),
                    "heading" => get_field("benefit2_heading"),
                    "text" => get_field("benefit2_text"),
                  ),
                  array(
                    "image" => get_field("benefit3_image"),
                    "heading" => get_field("benefit3_heading"),
                    "text" => get_field("benefit3_text"),
                  ),
                ),
              ),
            ),
            array(
              "type" => "video",
              "content" => array(
                "url" => get_field("benefits_video_url"),
              ),
            ),
          ),
        );
        
        get_template_part( "template-parts/component", "section", $benefits );
        ?>




        <!-- Feature -->
        <?php 
        $feature = array(
          "heading" => get_field("feature_heading"),
          "components" => array(
            array(
              "type" => "block-2",
              "content" => array(
                "large" => true,
                "color" => get_field("feature_color"),
                "image" => get_field("feature_image"),
                "text" => get_field("feature_text"),
                "link" => get_field("feature_link"),
              ),
            ),
          ),
        );

        get_template_part( "template-parts/component", "section", $feature ); 
        ?>




      <!-- Testimonial -->
      <?php 
        $testimonial = array(
          "heading" => get_field("testimonial_heading"),
          "components" => array(
            array(
              "type" => "columns-3",
              "content" => array(
                "modifications" => array(
                  "small-icons", "subtitles"
                ),
                "columns" => array(
                  array(
                    "image" => get_field("rating1_image"),
                    "subtitle" => get_field("rating1_subtitle"),
                    "text" => get_field("rating1_text"),
                  ),
                  array(
                    "image" => get_field("rating2_image"),
                    "subtitle" => get_field("rating2_subtitle"),
                    "text" => get_field("rating2_text"),
                  ),
                  array(
                    "image" => get_field("rating3_image"),
                    "subtitle" => get_field("rating3_subtitle"),
                    "text" => get_field("rating3_text"),
                  ),
                ),
              ),
            ),
            array(
              "type" => "google-rating-block",
              "content" => array(
                "text" => get_field("google_rating_text"),
                "link" => get_field("google_rating_link"),
              ),
            ),
          ),
        );
        
        get_template_part( "template-parts/component", "section", $testimonial );
        ?>



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
