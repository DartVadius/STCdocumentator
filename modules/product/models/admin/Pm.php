<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "pm".
 *
 * @property string $pm_id
 * @property string $pm_product_id
 * @property string $pm_material_id
 * @property string $pm_quantity
 * @property string $pm_unit_id
 * @property integer $pm_square
 *
 * @property Unit $pmUnit
 * @property Material $pmMaterial
 * @property Product $pmProduct
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
            [['pm_product_id', 'pm_material_id', 'pm_quantity', 'pm_unit_id', 'pm_square'], 'required'],
            [['pm_product_id', 'pm_material_id', 'pm_unit_id', 'pm_square'], 'integer'],
            [['pm_quantity'], 'number'],
            [['pm_product_id', 'pm_material_id'], 'unique', 'targetAttribute' => ['pm_product_id', 'pm_material_id'], 'message' => 'The combination of Pm Product ID and Pm Material ID has already been taken.'],
            [['pm_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['pm_unit_id' => 'unit_id']],
            [['pm_material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['pm_material_id' => 'material_id']],
            [['pm_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pm_product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pm_id' => 'ID',
            'pm_product_id' => 'Продукция',
            'pm_material_id' => 'Материал',
            'pm_quantity' => 'Расход',
            'pm_unit_id' => 'Ед.учета',
            'pm_square' => 'Расход на м2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmUnit()
    {
        return $this->hasOne(Unit::className(), ['unit_id' => 'pm_unit_id']);
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
     * @inheritdoc
     * @return PmQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PmQuery(get_called_class());
    }
}
