<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property string $currency_id
 * @property string $currency_code
 * @property string $currency_value
 *
 * @property Material[] $materials
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_code'], 'required'],
            [['currency_value'], 'number'],
            [['currency_code'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'currency_id' => 'ID',
            'currency_code' => 'Код валюты',
            'currency_value' => 'Курс',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['material_currency_type' => 'currency_id']);
    }

    /**
     * @inheritdoc
     * @return CurrencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CurrencyQuery(get_called_class());
    }
}
