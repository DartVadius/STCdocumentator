<?php

namespace app\modules\calculation\models;

use Yii;

/**
 * This is the model class for table "calcexp".
 *
 * @property string $calcexp_id
 * @property string $calcexp_calculation_id
 * @property string $calcexp_other_expenses_title
 * @property string $calcexp_other_expenses_costs_hour
 *
 * @property Calculation $calcexpCalculation
 */
class Calcexp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calcexp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calcexp_calculation_id', 'calcexp_other_expenses_title', 'calcexp_other_expenses_costs_hour'], 'required'],
            [['calcexp_calculation_id'], 'integer'],
            [['calcexp_other_expenses_costs_hour'], 'number'],
            [['calcexp_other_expenses_title'], 'string', 'max' => 255],
            [['calcexp_calculation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calculation::className(), 'targetAttribute' => ['calcexp_calculation_id' => 'calculation_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'calcexp_id' => 'Calcexp ID',
            'calcexp_calculation_id' => 'Calcexp Calculation ID',
            'calcexp_other_expenses_title' => 'Calcexp Other Expenses Title',
            'calcexp_other_expenses_costs_hour' => 'Calcexp Other Expenses Costs Hour',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcexpCalculation()
    {
        return $this->hasOne(Calculation::className(), ['calculation_id' => 'calcexp_calculation_id']);
    }

    /**
     * @inheritdoc
     * @return CalcexpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CalcexpQuery(get_called_class());
    }
}
