<div class="section__content section__content--large block-2">
    <div class="block-2__block block-2__block--center">
    <a href="<?= $args['link']['url'] ?>">
        <img
        class="block-2__img"
        src="<?= get_template_directory_uri() ?>/assets/images/googlerating.svg"
        alt="4.5 Sterne auf Google"
        />
    </a>
    </div>
    <div class="block-2__block block-2__block--center">
        <p class="block-2__text block-2__text--center">
        <?= $args['text'] ?>
        </p>
        <a class="block-2__button button" href="<?= $args['link']['url'] ?>" target="<?= $args['link']['target'] ?>"
        ><?= $args['link']['title'] ?></a
        >
    </div>
    </div>
</div>