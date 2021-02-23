<?php
/**
 * Hero Section of Landing Page.
 *
 * @package Smartphoniker
 */
?>

<section class="content__section content__section--hero section hero">

    <!-- Hero image -->
    <img
        width="1"
        height="1"
        class="hero__image"
        src="<?php echo get_template_directory_uri() ?>/assets/images/hero_image_phone.svg"
        alt="Nachhaltiges Handy"
    />

    <!-- Slogan and subtitle -->
    <div class="hero__wrapper">
        <!-- Slogan -->
        <h1 class="section__heading hero__heading">
            <?php echo carbon_get_theme_option('slogan') ?>
        </h1>
        <!-- Subtitle Mobile -->
        <p class="hero__text">
            <?php echo carbon_get_theme_option('slogan_subtitle') ?>
            <!-- Subtitle Extension -->
            <span class="hero__text hero__text--hidden">
                <?php echo carbon_get_theme_option('slogan_subtitle_extension') ?>
            </span>
        </p>
    </div>



    <form class="hero__form block-form" action="#">
    <div class="block-form__wrapper select">
    <label class="select__label" for="select-manufacturer">
    <?php echo $args["label_manufacturer"] ?>
    </label>
    <select
        class="select__select"
        name="manufacturer"
        id="select-manufacturer"
    >
        <option value="apple">Apple</option>
        <option value="htc">HTC</option>
        <option value="huawei">Huawei</option>
        <option value="lg">LG</option>
        <option value="samsung">Samsung</option>
        <option value="sony">Sony</option>
        <option value="xiaomi">Xiaomi</option>
        <option value="other">nicht dabei?</option>
    </select>
    </div>
    <div class="block-form__wrapper select">
    <label class="select__label" for="select-modell"
        ><?php echo $args["label_device"] ?></label
    >
    <select class="select__select" name="modell" id="select-modell">
        <option value="ip6">iPhone 6</option>
        <option value="other">nicht dabei?</option>
    </select>
    </div>

    <button class="block-form__button button" type="submit">
    <?php echo $args["label_button"] ?>
    </button>
</form>

    <ul class="hero__brands columns-5">

    <?php foreach ($args["images"] as $image): ?>
        <li class="columns-5__column">
            <img
                class="columns-5__image"
                src="<?php echo $image["sizes"]["thumbnail"] ?>"
                alt="<?php echo $image["alt"] ?>"
            />
        </li>
    <?php endforeach; ?>

</ul>

</section>