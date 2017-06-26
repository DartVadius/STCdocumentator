<?php
$this->title = 'Настройки приложения';
?>
<div class="row">
    <div class="col-lg-12 top-margin">
        <form action="/directory/index/save" method="POST">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">
            <?php foreach ($config as $value): ?>
                <div class="input-group input-group-sm">
                    <label for="<?= $value->config_id ?>"><?= $value->config_name ?></label>
                    <input class="form-control" type="text" size="20" id="<?= $value->config_id ?>" name="value[<?= $value->config_id ?>]" value="<?= $value->config_value ?>">
                </div>
            <?php endforeach; ?>
            <br>
            <div class="input-group input-group-sm">
                <p><button class="btn btn-success">Сохранить</button></p>
            </div>
        </form>
    </div>
</div>

