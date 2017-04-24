<?php

namespace app\modules\calculation\models;

use Yii;

/**
 * This is the model class for table "calcloss".
 *
 * @property string $calcloss_id
 * @property string $calcloss_calculation_id
 * @property string $calcloss_loss_title
 * @property string $calcloss_loss_percentage
 *
 * @property Calculation $calclossCalculation
 */
class Calcloss extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calcloss';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calcloss_calculation_id', 'calcloss_loss_title', 'calcloss_loss_percentage'], 'required'],
            [['calcloss_calculation_id'], 'integer'],
            [['calcloss_loss_percentage'], 'number'],
            [['calcloss_loss_title'], 'string', 'max' => 255],
            [['calcloss_calculation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calculation::className(), 'targetAttribute' => ['calcloss_calculation_id' => 'calculation_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'calcloss_id' => 'Calcloss ID',
            'calcloss_calculation_id' => 'Calcloss Calculation ID',
            'calcloss_loss_title' => 'Calcloss Loss Title',
            'calcloss_loss_percentage' => 'Calcloss Loss Percentage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalclossCalculation()
    {
        return $this->hasOne(Calculation::className(), ['calculation_id' => 'calcloss_calculation_id']);
    }

    /**
     * @inheritdoc
     * @return CalclossQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CalclossQuery(get_called_class());
    }
}
