<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pm".
 *
 * @property string $pm_id
 * @property string $pm_product_id
 * @property string $pm_material_id
 * @property string $pm_quantity
 * @property string $pm_unit_id
 *
 * @property Material $pmMaterial
 * @property Product $pmProduct
 * @property Unit $pmUnit
 */
class Pm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pm_product_id', 'pm_material_id', 'pm_quantity', 'pm_unit_id'], 'required'],
            [['pm_product_id', 'pm_material_id', 'pm_unit_id'], 'integer'],
            [['pm_quantity'], 'number'],
            [['pm_product_id', 'pm_material_id'], 'unique', 'targetAttribute' => ['pm_product_id', 'pm_material_id'], 'message' => 'The combination of Pm Product ID and Pm Material ID has already been taken.'],
            [['pm_material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['pm_material_id' => 'material_id']],
            [['pm_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pm_product_id' => 'product_id']],
            [['pm_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['pm_unit_id' => 'unit_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pm_id' => 'Pm ID',
            'pm_product_id' => 'Pm Product ID',
            'pm_material_id' => 'Pm Material ID',
            'pm_quantity' => 'Pm Quantity',
            'pm_unit_id' => 'Pm Unit ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmMaterial()
    {
        return $this->hasOne(Material::className(), ['material_id' => 'pm_material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'pm_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmUnit()
    {
        return $this->hasOne(Unit::className(), ['unit_id' => 'pm_unit_id']);
    }
}
