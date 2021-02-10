<form class="hero__form block-form" action="#">
    <div class="block-form__wrapper select">
    <label class="select__label" for="select-manufacturer">
    <?= $args["label_manufacturer"] ?>
    </label>
    <select
        class="select__select"
        name="manufacturer"
        id="select-manufacturer"
    >
        <option value="apple">Apple</option>
        <option value="htc">HTC</option>
        <option value="huawei">Huawei</option>
        <option value="lg">LG</option>
        <option value="samsung">Samsung</option>
        <option value="sony">Sony</option>
        <option value="xiaomi">Xiaomi</option>
        <option value="other">nicht dabei?</option>
    </select>
    </div>
    <div class="block-form__wrapper select">
    <label class="select__label" for="select-modell"
        ><?= $args["label_device"] ?></label
    >
    <select class="select__select" name="modell" id="select-modell">
        <option value="ip6">iPhone 6</option>
        <option value="other">nicht dabei?</option>
    </select>
    </div>

    <button class="block-form__button button" type="submit">
    <?= $args["label_button"] ?>
    </button>
</form>