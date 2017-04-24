<?php

namespace app\modules\product;

/**
 * product module definition class
 */
class ProductModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\product\controllers';
    public $layout = '/admin';
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
}
