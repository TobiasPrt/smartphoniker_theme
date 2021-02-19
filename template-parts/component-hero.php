<section class="content__section content__section--hero section hero">
    <img
        width="1"
        height="1"
        class="hero__image"
        src="<?= get_template_directory_uri() ?>/assets/images/hero_image_phone.png"
        alt="Nachhaltiges Handy"
    />
    <div class="hero__wrapper">
        <h1 class="section__heading hero__heading">
        <?= $args["heading"] ?>
        </h1>
        <p class="hero__text">
        <?= $args["subtitlemobile"] ?>
        <span class="hero__text hero__text--hidden">
        <?= $args["subtitledesktop"] ?>
        </span>
        </p>
    </div>



    <!-- Components within hero section -->
    <?php 
    foreach($args["components"] as $component):
        get_template_part( "template-parts/component", $component["type"], $component["content"] ); 
    endforeach;  
    ?>

</section>