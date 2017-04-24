<?php

namespace app\modules\calculation\models;

use Yii;

/**
 * This is the model class for table "calculation".
 *
 * @property string $calculation_id
 * @property string $calculation_date
 * @property string $calculation_product_id
 * @property string $calculation_product_title
 * @property string $calculation_note
 * @property string $calculation_product_capacity_hour
 *
 * @property Calcexp[] $calcexps
 * @property Calcloss[] $calclosses
 * @property Calcmat[] $calcmats
 * @property Calcpack[] $calcpacks
 * @property Calcpos[] $calcpos
 * @property Product $calculationProduct
 */
class Calculation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calculation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calculation_date', 'calculation_product_title', 'calculation_product_capacity_hour'], 'required'],
            [['calculation_date'], 'safe'],
            [['calculation_product_id', 'calculation_product_capacity_hour'], 'integer'],
            [['calculation_note'], 'string'],
            [['calculation_product_title'], 'string', 'max' => 255],
            [['calculation_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['calculation_product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'calculation_id' => 'Calculation ID',
            'calculation_date' => 'Calculation Date',
            'calculation_product_id' => 'Calculation Product ID',
            'calculation_product_title' => 'Calculation Product Title',
            'calculation_note' => 'Calculation Note',
            'calculation_product_capacity_hour' => 'Calculation Product Capacity Hour',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcexps()
    {
        return $this->hasMany(Calcexp::className(), ['calcexp_calculation_id' => 'calculation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalclosses()
    {
        return $this->hasMany(Calcloss::className(), ['calcloss_calculation_id' => 'calculation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcmats()
    {
        return $this->hasMany(Calcmat::className(), ['calcmat_calculation_id' => 'calculation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcpacks()
    {
        return $this->hasMany(Calcpack::className(), ['calcpack_calculation_id' => 'calculation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcpos()
    {
        return $this->hasMany(Calcpos::className(), ['calcpos_calculation_id' => 'calculation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalculationProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'calculation_product_id']);
    }

    /**
     * @inheritdoc
     * @return CalculationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CalculationQuery(get_called_class());
    }
}
