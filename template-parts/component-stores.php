<?php 
/**
 * Template-Part: Stores
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<div class="section__content columns-3">

    <?php foreach ( (array) $args as $store => $store_id ): ?>

        <div class="columns-3__column card">
            <picture>
                <img
                class="card__img"
                src="<?php echo get_post_meta( intval( $store_id ), '_header_image' )[0]; ?>"
                alt="Shop <?php echo get_post_field( 'post_title', intval( $store_id ) ); ?>"
              />
            </picture>
            <div class="card__wrapper">
                <h3 class="card__heading">
                    <?php echo get_post_field( 'post_title', intval( $store_id ) ); ?>
                </h3>
                <p class="card__text">
                    <?php echo str_replace( ',', '<br>', carbon_get_post_meta( intval( $store_id ), 'address' )['address'] ); ?>
                </p>
                <br>
                <p class="card__text">
                    <?php echo get_post_meta( intval( $store_id ), '_opening_hours' )[0]; ?>
                </p>
                <a href="<?php echo get_permalink( $store_id ); ?>" class="card__link"
                ><img
                    class="card__icon"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/arrowright_box.svg"
                    alt="Arrow right"
                />mehr erfahren</a
                >
            </div>
        </div>

    <?php endforeach; ?>

    
</div>