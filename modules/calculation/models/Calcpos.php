<?php

namespace app\modules\calculation\models;

use Yii;

/**
 * This is the model class for table "calcpos".
 *
 * @property string $calcpos_id
 * @property string $calcpos_calculation_id
 * @property string $calcpos_position_title
 * @property string $calcpos_position_salary_hour
 * @property string $calcpos_position_num
 *
 * @property Calculation $calcposCalculation
 */
class Calcpos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calcpos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calcpos_calculation_id', 'calcpos_position_title', 'calcpos_position_salary_hour', 'calcpos_position_num'], 'required'],
            [['calcpos_calculation_id'], 'integer'],
            [['calcpos_position_salary_hour', 'calcpos_position_num'], 'number'],
            [['calcpos_position_title'], 'string', 'max' => 255],
            [['calcpos_calculation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calculation::className(), 'targetAttribute' => ['calcpos_calculation_id' => 'calculation_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'calcpos_id' => 'Calcpos ID',
            'calcpos_calculation_id' => 'Calcpos Calculation ID',
            'calcpos_position_title' => 'Calcpos Position Title',
            'calcpos_position_salary_hour' => 'Calcpos Position Salary Hour',
            'calcpos_position_num' => 'Calcpos Position Num',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcposCalculation()
    {
        return $this->hasOne(Calculation::className(), ['calculation_id' => 'calcpos_calculation_id']);
    }

    /**
     * @inheritdoc
     * @return CalcposQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CalcposQuery(get_called_class());
    }
}
