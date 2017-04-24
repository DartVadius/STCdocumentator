<?php

namespace app\modules\calculation\models;

use Yii;

/**
 * This is the model class for table "calcmat".
 *
 * @property string $calcmat_id
 * @property string $calcmat_calculation_id
 * @property string $calcmat_material_title
 * @property string $calcmat_material_price
 * @property string $calcmat_quantity
 * @property string $calcmat_unit_title
 * @property string $calcmat_unit_id
 *
 * @property Calculation $calcmatCalculation
 */
class Calcmat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calcmat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calcmat_calculation_id', 'calcmat_material_title', 'calcmat_material_price', 'calcmat_quantity', 'calcmat_unit_title', 'calcmat_unit_id'], 'required'],
            [['calcmat_calculation_id', 'calcmat_unit_id'], 'integer'],
            [['calcmat_material_price', 'calcmat_quantity'], 'number'],
            [['calcmat_material_title', 'calcmat_unit_title'], 'string', 'max' => 255],
            [['calcmat_calculation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calculation::className(), 'targetAttribute' => ['calcmat_calculation_id' => 'calculation_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'calcmat_id' => 'Calcmat ID',
            'calcmat_calculation_id' => 'Calcmat Calculation ID',
            'calcmat_material_title' => 'Calcmat Material Title',
            'calcmat_material_price' => 'Calcmat Material Price',
            'calcmat_quantity' => 'Calcmat Quantity',
            'calcmat_unit_title' => 'Calcmat Unit Title',
            'calcmat_unit_id' => 'Calcmat Unit ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcmatCalculation()
    {
        return $this->hasOne(Calculation::className(), ['calculation_id' => 'calcmat_calculation_id']);
    }

    /**
     * @inheritdoc
     * @return CalcmatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CalcmatQuery(get_called_class());
    }
}
