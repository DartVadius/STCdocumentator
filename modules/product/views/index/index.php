<?php

use yii\widgets\LinkPager;

$this->title = 'Продукция';
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <h3><a href="/product/index/view?id=<?= $product->product_id ?>"><?= $product->product_title ?></a></h3>
                <p class="small">Дата создания: <?= $product->product_date ?></p>
                <p class="small">Категория: <?= $product->productCategory->category_product_title ?></p>
            <?php endforeach; ?>
        <?php else: ?> 
            <h3>Ничего не найдено</h3>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-9">
        <?php
        echo LinkPager::widget([
            'pagination' => $pages,
            'registerLinkTags' => true
        ]);
        ?>
    </div>
</div>
