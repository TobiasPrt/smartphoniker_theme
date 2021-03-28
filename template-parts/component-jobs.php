<?php
/**
 * Template-Part: Jobs
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<div class="section__content jobs">

    <div class="jobs__tabs">

        <?php foreach ( (array) $args['jobs'] as $location => $jobs): ?>
            
            <button class="jobs__tab-button" data-id="<?php echo $location?>">
                <h3 class="jobs__tab-heading">
                    <?php echo $location?>
                </h3>    
            </button>
        
        <?php endforeach; ?>

    </div>
    
    <?php foreach ( (array) $args['jobs'] as $location => $jobs): ?>

            <div id="<?php echo $location; ?>" class="jobs__tab-content">
            
            <?php foreach ( (array) $jobs as $job_id => $job_title): ?>

                <div class="jobs__item job">
                    <!-- Left Side -->
                    <div class="job__info">
                        <!-- Job title -->
                        <p class="job__title">
                            <?php echo $job_title; ?>
                        </p>
                        <!-- Job short description -->
                        <p class="job__description">
                            <?php echo get_post_meta( intval( $job_id ), '_short_description')[0]; ?>
                        </p>
                    </div>
                    <!-- right side / button -->
                    <a href="<?php echo get_permalink( $job_id ); ?>" class="job__button button button--white">
                        Jetzt bewerben
                    </a>
                </div>

            <?php endforeach; ?>

        </div>

    <?php endforeach; ?>

</div>