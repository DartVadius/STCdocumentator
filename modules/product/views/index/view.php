<?php
/**
 * @param ProductAggregator $product
 */
$this->title = 'Продукция';
?>
<div class="row">
    <div class="col-lg-12">
        <h2><?=$product->title?></h2>
        <?php if ($product->tech_map != ''): ?>
        <object width="800px" height="1200px" type="application/pdf" data="<?= Yii::$app->getUrlManager()->createUrl($product->tech_desc) ?>" ></object>
        <?php endif; ?>
    </div>
</div>

