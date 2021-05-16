<?php
/**
 * Template: Area
 *
 * @package Smartphoniker
 * @since 1.1.0
 */

get_header();



?>


<!-- Infotext -->
<section class="content__section section">
    <h2 class="section__heading">Handy-Reparatur <?php the_title(); ?></h2>
    <?php
    $col1_text = "Die Filiale in Nähe von [area] ist für dich da, wenn du für dein Gerät professionelle Hilfe benötigst. Dein Smartphone macht Probleme oder dein Notebook ist kaputt? Wir machen deine Teile heile!";
    $col1_args['text'] = str_replace("[area]", get_the_title(), $col1_text );
    get_template_part( "template-parts/component", "col-1", $col1_args );

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


<!-- Nächstgelegener shop -->
<section class="content__section section">
    <h2 class="section__heading">Unser nächstgelegener Shop</h2>
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
</section>

<!-- Devices -->
<section class="content__section section">
    <h2 class="section__heading">Unsere Top-Modelle</h2>
    <?php 
    $query = new WP_Query( array(
        'posts_per_page' => 10,
        'post_type' => 'device',
        'meta_query' => array(
            array(
                'key' => 'is_bestseller',
                'value' => 'yes'
            )
        )
    ) );
    ?>
    <div class="section__content grid-5">
        <?php if ($query->have_posts() ): while ( $query->have_posts() ): $query->the_post();?>

            <div class="grid-5__card">
                <?php echo wp_get_attachment_image( carbon_get_post_meta( get_the_ID(), 'device_image' ), 'medium', false, array( 'class' => 'grid-5__img grid-5__img--device') ); ?>
                <a href="<?php echo carbon_get_post_meta( get_the_ID(), 'link' ); ?>" class="grid-5__subtitle"><?php echo get_the_terms( get_the_ID(), 'manufacturer' )[0]->name . ' '; the_title(); ?></a>
            </div>
        <?php wp_reset_postdata(); ?>
        <?php endwhile; endif: ?>
    </div>
</section>



<?php
get_footer();
