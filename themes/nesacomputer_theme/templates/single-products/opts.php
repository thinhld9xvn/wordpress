<div class="choose__group">
    <h2>Tuỳ chọn sản phẩm</h2>
    <form action="">
        <?php foreach ($prod_opts as $opt) : ?>
            <label>
                <input type="radio" checked="checked" name="radio">
                <div class="type__product">
                    <p class="type__product-name"><?= $opt['text'] ?></p>
                    <p class="type__product-price">
                        <?= $opt['value'] ?>
                    </p>
                </div>
            </label>
        <?php endforeach; ?>
    </form>
</div>