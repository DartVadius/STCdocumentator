<?php

namespace app\modules\directory\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property string $config_id
 * @property string $config_name
 * @property string $config_system_name
 * @property string $config_value
 */
class Config extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'config';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['config_name', 'config_system_name'], 'required'],
            [['config_name', 'config_system_name', 'config_value'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'config_id' => 'ID',
            'config_name' => 'Название',
            'config_system_name' => 'Системное имя',
            'config_value' => 'Значение',
        ];
    }

    /**
     * @inheritdoc
     * @return ConfigQuery the active query used by this AR class.
     */
    public static function find() {
        return new ConfigQuery(get_called_class());
    }

}
