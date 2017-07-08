<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "pma".
 *
 * @property string $pma_id
 * @property string $pma_product_id
 * @property string $pma_material_id
 * @property string $pma_quantity
 * @property string $pma_unit_id
 * @property string $pma_loss
 * @property string $pma_weight 
 * @property string $pma_brutto 
 *
 * @property Material $pmaMaterial
 * @property Product $pmaProduct
 * @property Unit $pmaUnit
 */
class Pma extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'pma';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['pma_product_id', 'pma_material_id', 'pma_quantity', 'pma_unit_id'], 'required'],
            [['pma_product_id', 'pma_material_id', 'pma_unit_id', 'pma_brutto'], 'integer'],
            [['pma_quantity', 'pma_loss', 'pma_weight'], 'number'],
            [['pma_product_id', 'pma_material_id'], 'unique', 'targetAttribute' => ['pma_product_id', 'pma_material_id'], 'message' => 'The combination of Pma Product ID and Pma Material ID has already been taken.'],
            [['pma_material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['pma_material_id' => 'material_id']],
            [['pma_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pma_product_id' => 'product_id']],
            [['pma_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['pma_unit_id' => 'unit_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'pma_id' => 'ID',
            'pma_product_id' => 'Продукт',
            'pma_material_id' => 'Материал',
            'pma_quantity' => 'Расход',
            'pma_unit_id' => 'Ед.учета',
            'pma_loss' => 'Плановые потери, %',
            'pma_weight' => 'Вес на ед.продукции, гр',
            'pma_brutto' => 'Учитывать в брутто',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmaMaterial() {
        return $this->hasOne(Material::className(), ['material_id' => 'pma_material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmaProduct() {
        return $this->hasOne(Product::className(), ['product_id' => 'pma_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmaUnit() {
        return $this->hasOne(Unit::className(), ['unit_id' => 'pma_unit_id']);
    }

    /**
     * @inheritdoc
     * @return PmaQuery the active query used by this AR class.
     */
    public static function find() {
        return new PmaQuery(get_called_class());
    }

}
