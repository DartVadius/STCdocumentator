<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $product_id
 * @property string $product_title
 * @property string $product_capacity_hour
 * @property string $product_date
 * @property string $product_update
 * @property integer $product_linear_meter
 * @property string $product_unit_id
 * @property string $product_price
 *
 * @property File[] $files
 * @property Lp[] $lps
 * @property Loss[] $lpLosses
 * @property Op[] $ops
 * @property OtherExpenses[] $opOthers
 * @property Pap[] $paps
 * @property Papr[] $paprs
 * @property Parameter[] $paprParameters
 * @property Pm[] $pms
 * @property Material[] $pmMaterials
 * @property Pop[] $pops
 * @property Position[] $popPositions
 * @property Unit $productUnit
 * @property Rp[] $rps
 * @property Recipe[] $rpRecipes
 * @property Sp[] $sps
 * @property Solution[] $spSolutions
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_title', 'product_capacity_hour', 'product_date', 'product_update', 'product_unit_id'], 'required'],
            [['product_capacity_hour', 'product_linear_meter', 'product_unit_id'], 'integer'],
            [['product_date', 'product_update'], 'safe'],
            [['product_price'], 'number'],
            [['product_title'], 'string', 'max' => 255],
            [['product_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['product_unit_id' => 'unit_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_title' => 'Product Title',
            'product_capacity_hour' => 'Product Capacity Hour',
            'product_date' => 'Product Date',
            'product_update' => 'Product Update',
            'product_linear_meter' => 'Product Linear Meter',
            'product_unit_id' => 'Product Unit ID',
            'product_price' => 'Product Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['file_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLps()
    {
        return $this->hasMany(Lp::className(), ['lp_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLpLosses()
    {
        return $this->hasMany(Loss::className(), ['loss_id' => 'lp_loss_id'])->viaTable('lp', ['lp_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOps()
    {
        return $this->hasMany(Op::className(), ['op_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpOthers()
    {
        return $this->hasMany(OtherExpenses::className(), ['other_expenses_id' => 'op_other_id'])->viaTable('op', ['op_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaps()
    {
        return $this->hasMany(Pap::className(), ['pap_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaprs()
    {
        return $this->hasMany(Papr::className(), ['papr_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaprParameters()
    {
        return $this->hasMany(Parameter::className(), ['parameter_id' => 'papr_parameter_id'])->viaTable('papr', ['papr_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPms()
    {
        return $this->hasMany(Pm::className(), ['pm_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmMaterials()
    {
        return $this->hasMany(Material::className(), ['material_id' => 'pm_material_id'])->viaTable('pm', ['pm_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPops()
    {
        return $this->hasMany(Pop::className(), ['pop_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPopPositions()
    {
        return $this->hasMany(Position::className(), ['position_id' => 'pop_position_id'])->viaTable('pop', ['pop_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductUnit()
    {
        return $this->hasOne(Unit::className(), ['unit_id' => 'product_unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRps()
    {
        return $this->hasMany(Rp::className(), ['rp_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRpRecipes()
    {
        return $this->hasMany(Recipe::className(), ['recipe_id' => 'rp_recipe_id'])->viaTable('rp', ['rp_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSps()
    {
        return $this->hasMany(Sp::className(), ['sp_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpSolutions()
    {
        return $this->hasMany(Solution::className(), ['solution_id' => 'sp_solution_id'])->viaTable('sp', ['sp_product_id' => 'product_id']);
    }
}
