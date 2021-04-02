<?php 
/**
 * Template-Part: Map
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<div id="map" class="map section__content"></div>
<script>
    function initMap() {
        const mapCenter = {
            lat: 54.327656,
            lng: 10.0685555
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: mapCenter,
            styles: [
                {
                    featureType: "all",
                    stylers: [
                        { "saturation": -100 },
                    ]
                }
            ],
            streetViewControl: false,
            fullscreenControl: false,
            rotateControl: false,
            mapTypeControl: false,
        });

        

        <?php foreach ( (array) $args['locations'] as $location_index => $location ): ?>
            
            const marker<?php echo $location_index; ?> = new google.maps.Marker({
                position: {
                    lat: parseFloat('<?php echo $location['lat']; ?>'),
                    lng: parseFloat('<?php echo $location['lng']; ?>')
                },
                map: map,
                title: '<?php echo $location['title']; ?>',
                icon: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map_needle_filled.png",
            });

            const infowindow<?php echo $location_index; ?> = new google.maps.InfoWindow({
                content: `
                    <div id="content">
                        <div id="siteNotice">
                            <h3 class="card__heading">
                                <?php echo get_post_field( 'post_title', intval( $location['id'] ) ); ?>
                            </h3>
                            <p class="card__text">
                                <?php echo str_replace( ',', '<br>', carbon_get_post_meta( intval( $location['id'] ), 'address' )['address'] ); ?>
                            </p>
                            <br>
                            <p class="card__text">
                                <?php echo get_post_meta( intval( $location['id'] ), '_opening_hours' )[0]; ?>
                            </p>
                            <a href="<?php echo get_permalink( $location['id'] ); ?>" class="card__link"
                            ><img
                                class="card__icon"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/arrowright_box-orange.svg"
                                alt="Arrow right"
                            />mehr erfahren</a
                            >
                        </div>
                    </div>
                `,
            });

            marker<?php echo $location_index; ?>.addListener( 'click', () => {
                infowindow<?php echo $location_index; ?>.open(map, marker<?php echo $location_index; ?>);
            } );

        <?php endforeach; ?>
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4QnNCsxxSj4yOixOksho0L4EP7vO-SuI&libraries=places&callback=initMap" async defer></script>