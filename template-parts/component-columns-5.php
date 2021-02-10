<ul class="hero__brands columns-5">

    <?php foreach($args["images"] as $image): ?>
        <li class="columns-5__column">
            <img
                class="columns-5__image"
                src="<?= $image["sizes"]["thumbnail"] ?>"
                alt="<?= $image["alt"] ?>"
            />
        </li>
    <?php endforeach; ?>

</ul>