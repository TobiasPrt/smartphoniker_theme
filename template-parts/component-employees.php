<?php 
/**
 * Template-Part: Employees
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
?>

<div class="section__content grid-4">

    <!-- Grid of employees -->
    <?php foreach ( (array) $args['employees'] as $employee_id => $employee ): ?>
        <div class="grid-4__element person">
            <?php echo wp_get_attachment_image( $employee['_image'][0], 'medium', false, array( 'class' => 'person__img' ) ); ?>
            <p class="person__name"> <?php echo $employee['name'] ?></p>
            <p class="person__title"><?php echo $employee['_role'][0]; ?></p>
        </div>
    
    <?php endforeach; ?>


    <!-- Link for application -->
    <?php if ( in_array( 'show_application_link', $args ) ): ?>
        <div class="grid-4__element person">
            <a class="person__button button button--white" href="/karriere/"
            >Jetzt bewerben</a
            >
        </div>
    <?php endif; ?>

</div>