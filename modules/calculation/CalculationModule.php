<?php

namespace app\modules\calculation;

/**
 * calculation module definition class
 */
class CalculationModule extends \yii\base\Module {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\calculation\controllers';
    public $layout = '/admin';
    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();

        // custom initialization code goes here
    }

}
