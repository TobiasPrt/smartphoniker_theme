<?php
/**
 * Template-Part: Repairs
 * 
 * @package Smartphoniker
 * @since 1.2.0
 */

$manufacturers;
$devices;
$repairs;
$links;

foreach ( (array) $args['rows'] as $row ) {
    $manufacturers[] = get_the_terms( $row['device'], 'manufacturer' )[0]->name;
    $devices[] = get_the_title( $row['device'] );
    $repairs[] = $row['repair'];
    $links[] = carbon_get_post_meta( $args['rows'][0]['device'], 'link' );
}

?>

<div class="section__content repairs">
    <table class="repairs__table">
        <tr class="repairs__row">
            <th class="repairs__col">Model</th>
            <th class="repairs__col">Reparatur</th>
            <th class="repairs__col">Dauer</th>
            <th class="repairs__col"></th>
        </tr>
        <?php foreach ( (array) $devices as $key => $device ): ?>
    
            <tr class="repairs__row">
                <td class="repairs__col">
                    <?php echo $manufacturers[$key], ' ', $device; ?>
                </td>
                <td class="repairs__col">
                    <?php switch ($repairs[$key]): case 'display': ?>
                        <div class="repairs__repair repairs__repair--orange">
                            <div></div>
                            <p>Displayreparatur</p>
                        </div>
                    <?php break;?>
                    <?php case 'backcover': ?>
                        <div class="repairs__repair repairs__repair--darkblue">
                            <div></div>
                            <p>Backcover</p>
                        </div>
                    <?php break;?>
                    <?php case 'battery': ?>
                        <div class="repairs__repair repairs__repair--green">
                            <div></div>
                            <p>Akkutausch</p>
                        </div>
                    <?php break;?>
                    <?php case 'camera': ?>
                        <div class="repairs__repair repairs__repair--red">
                            <div></div>
                            <p>Kamerareparatur</p>
                        </div>
                    <?php break;?>
                    <?php case 'mic': ?>
                        <div class="repairs__repair repairs__repair--yellow">
                            <div></div>
                            <p>Mikrofonreparatur</p>
                        </div>
                    <?php break;?>
                    <?php default ?>
                        <div class="repairs__repair repairs__repair--grey">
                            <div></div>
                            <p><?php echo $repairs[$key]; ?></p>
                        </div>
                    <?php endswitch; ?> 
                </td>
                <td class="repairs__col">
                <img class="repairs__img" width="1" height="1"
                            src="<?php echo get_template_directory_uri() ?>/assets/images/icons/quick.png"
                            alt="Running Stopwatch" />
                            2 Stunden
                </td>
                <td class="repairs__col">
                <a class="repairs__link button button--orange" href="<?php echo $links[$key] ?>">Jetzt reparieren lassen</a>    
                </td>
            </tr>
        
        <?php endforeach; ?>
    </table>
</div>
