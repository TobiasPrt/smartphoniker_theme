<div class="
    section__content 
    <?= array_key_exists("large", $args) ? "section__content--large" : "" ?> 
    block-2 
    <?= "block-2--".$args["color"] ?>"
    >
    <div class="block-2__block">
        <picture>
            <img class="block-2__img" src="<?= $args["image"]["sizes"]["medium"] ?>" alt="<?= $args["image"]["alt"] ?>" />
        </picture>
    </div>

    <div class="block-2__block block-2__block--center">
        <p class="block-2__text">
            <?= $args['text']?>
        </p>
        <a 
            class="block-2__button button <?= "button--".$args["color"] ?>" 
            href="<?= $args["link"]["url"] ?>" 
            target="<?= $args["link"]['target']?>"
        >
            <?= $args["link"]["title"] ?>
        </a>
    </div>
</div>