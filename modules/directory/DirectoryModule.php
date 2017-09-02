<?php

namespace app\modules\directory;

/**
 * product module definition class
 */
class DirectoryModule extends \yii\base\Module {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\directory\controllers';
    public $layout = '/admin';

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
        // custom initialization code goes here
    }

}
