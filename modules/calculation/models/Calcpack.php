<?php

namespace app\modules\calculation\models;

use Yii;

/**
 * This is the model class for table "calcpack".
 *
 * @property string $calcpack_id
 * @property string $calcpack_calculation_id
 * @property string $calcpack_pack_title
 * @property string $calcpack_pack_price
 * @property string $calcpack_pack_capacity
 *
 * @property Calculation $calcpackCalculation
 */
class Calcpack extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calcpack';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calcpack_calculation_id', 'calcpack_pack_title', 'calcpack_pack_price', 'calcpack_pack_capacity'], 'required'],
            [['calcpack_calculation_id'], 'integer'],
            [['calcpack_pack_price', 'calcpack_pack_capacity'], 'number'],
            [['calcpack_pack_title'], 'string', 'max' => 255],
            [['calcpack_calculation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calculation::className(), 'targetAttribute' => ['calcpack_calculation_id' => 'calculation_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'calcpack_id' => 'Calcpack ID',
            'calcpack_calculation_id' => 'Calcpack Calculation ID',
            'calcpack_pack_title' => 'Calcpack Pack Title',
            'calcpack_pack_price' => 'Calcpack Pack Price',
            'calcpack_pack_capacity' => 'Calcpack Pack Capacity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcpackCalculation()
    {
        return $this->hasOne(Calculation::className(), ['calculation_id' => 'calcpack_calculation_id']);
    }

    /**
     * @inheritdoc
     * @return CalcpackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CalcpackQuery(get_called_class());
    }
}
