<?php
/**
 * Template-Part: Hero
 * 
 * This file contains the hero section from the landing page.
 *
 * @package Smartphoniker
 * @since 1.0.0
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


<section class="content__section content__section--hero section hero">

    <!-- Hero image -->
    <img
        width="1"
        height="1"
        class="hero__image"
        src="<?php echo get_template_directory_uri(); ?>/assets/images/hero_image_phonex600.png"
        alt="Nachhaltiges Handy"
    />

    <!-- Slogan and subtitle -->
    <div class="hero__wrapper">
        <!-- Slogan -->
        <h1 class="section__heading hero__heading">
            <?php echo carbon_get_theme_option( 'slogan' ); ?>
        </h1>
        <!-- Subtitle Mobile -->
        <p class="hero__text">
            <?php echo carbon_get_theme_option( 'slogan_subtitle' ); ?>
            <!-- Subtitle Extension -->
            <span class="hero__text hero__text--hidden">
                <?php echo carbon_get_theme_option( 'slogan_subtitle_extension' ); ?>
            </span>
        </p>
    </div>


    <!-- Formular -->
    <div class="hero__form block-form" action="#">

            <!-- Manufacturer -->
            <div class="block-form__wrapper select">

                <!-- Label Manufacturer -->
                <label class="select__label" for="select-manufacturer">
                    Hersteller wählen
                </label>

                <!-- Select Manufacturer-->
                <select class="select__select" name="manufacturer" id="select-manufacturer">
                    <?php foreach ( (array) $manufacturers as $manufacturer ):  ?>
                        <option value="<?php echo $manufacturer->name; ?>"><?php echo $manufacturer->name; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            

            <!-- Device -->
            <div class="block-form__wrapper select">

                <!-- Label Device -->
                <label class="select__label" for="select-modell">
                    Modell wählen
                </label>
                
                <!-- Select Device -->
                <?php foreach ( (array) $manufacturers as $manufacturer ):  ?>
                    <?php if ($devices->have_posts() ) : ?>
                        <select class="select__select hidden" name="modell" id="<?php echo $manufacturer->name; ?>">
                            <?php while ( $devices->have_posts() ) : $devices->the_post(); ?>
                                <?php if ( get_the_terms(get_the_ID(), 'manufacturer')[0]->name === $manufacturer->name ): ?>
                                    <option value="<?php the_title(); ?>" data-url="<?php echo get_post_meta( get_the_ID(), '_link' )[0] ?>" ><?php the_title(); ?></option>
                                <?php endif; ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </select>
                    <?php endif; ?>                    
                <?php endforeach; ?>

            </div>

        <!-- Submit button -->
        <a class="block-form__button button" id="repair-device" href="">
            Handy reparieren lassen
        </a>

    </div>


    <!-- Brands -->
    <ul class="hero__brands columns-5">

        <?php foreach ( carbon_get_theme_option('partner_logos') as $partner_logo_id ): ?>
            <li class="columns-5__column">
                <?php
                echo wp_get_attachment_image(
                    $partner_logo_id,
                    'thumbnail',
                    false,
                    array( 'class' => 'columns-5__image' )
                );
                ?>
            </li>
        <?php endforeach; ?>

    </ul>

</section>