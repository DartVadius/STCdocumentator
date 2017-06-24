<?php 
$this->title = 'Меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-2 calculation-index">
        <p><a class="btn btn-primary btn-block" href="/calculation/calculation/index">Калькуляции</a></p>
        <p><a class="btn btn-primary btn-block" href="/calculation/calculation/index">Отчет по группам</a></p>
        <p><a class="btn btn-primary btn-block" href="/calculation/calculation/index">Сводный отчет</a></p>
    </div>
</div>