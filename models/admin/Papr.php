<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "papr".
 *
 * @property string $papr_id
 * @property string $papr_parameter_id
 * @property string $papr_product_id
 * @property string $papr_value
 * @property string $papr_unit_id
 *
 * @property Parameter $paprParameter
 * @property Product $paprProduct
 * @property Unit $paprUnit
 */
class Papr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'papr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['papr_parameter_id', 'papr_product_id', 'papr_unit_id'], 'required'],
            [['papr_parameter_id', 'papr_product_id', 'papr_unit_id'], 'integer'],
            [['papr_value'], 'string', 'max' => 45],
            [['papr_parameter_id', 'papr_product_id'], 'unique', 'targetAttribute' => ['papr_parameter_id', 'papr_product_id'], 'message' => 'The combination of Papr Parameter ID and Papr Product ID has already been taken.'],
            [['papr_parameter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parameter::className(), 'targetAttribute' => ['papr_parameter_id' => 'parameter_id']],
            [['papr_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['papr_product_id' => 'product_id']],
            [['papr_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['papr_unit_id' => 'unit_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'papr_id' => 'ID',
            'papr_parameter_id' => 'Параметр',
            'papr_product_id' => 'Продукция',
            'papr_value' => 'Значение',
            'papr_unit_id' => 'Ед.изм.',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaprParameter()
    {
        return $this->hasOne(Parameter::className(), ['parameter_id' => 'papr_parameter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaprProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'papr_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaprUnit()
    {
        return $this->hasOne(Unit::className(), ['unit_id' => 'papr_unit_id']);
    }

    /**
     * @inheritdoc
     * @return PaprQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaprQuery(get_called_class());
    }
}
