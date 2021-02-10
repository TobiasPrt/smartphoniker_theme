<div class="section__content columns-3">


    <!-- Single Columns -->
    <?php foreach($args["columns"] as $column): ?>
        <div class="columns-3__column">
            
            <!-- Icon -->
            <img
            class="columns-3__icon <?= in_array('small-icons', $args['modifications']) ? 'columns-3__icon--small' : '' ?>"
            src="<?= $column["image"]["sizes"]["thumbnail"] ?>"
            alt="<?= $column["image"]["alt"] ?>"
            />

            <!-- Heading -->
            <?php if (in_array("headings", $args["modifications"])): ?>
                <h3 class="columns-3__heading"><?= $column["heading"] ?></h3>
            <?php endif; ?>

            <!-- Text -->
            <p class="columns-3__text"><?= $column["text"] ?></p>

            <!-- Subtitle -->
            <?php if (in_array("subtitles", $args["modifications"])): ?>
                <p class="columns-3__subtitle"><?= $column["subtitle"] ?></p>
            <?php endif; ?>


        </div>
    <?php endforeach; ?>



</div>