<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "other_expenses".
 *
 * @property string $other_expenses_id
 * @property string $other_expenses_title
 * @property string $other_expenses_desc
 * @property string $other_expenses_costs_hour
 *
 * @property Op[] $ops
 * @property Product[] $opProducts
 */
class OtherExpenses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'other_expenses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['other_expenses_title', 'other_expenses_costs_hour'], 'required'],
            [['other_expenses_costs_hour'], 'number'],
            [['other_expenses_title', 'other_expenses_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'other_expenses_id' => 'ID',
            'other_expenses_title' => 'Название',
            'other_expenses_desc' => 'Описание',
            'other_expenses_costs_hour' => 'Затраты грн. в час',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOps()
    {
        return $this->hasMany(Op::className(), ['op_other_id' => 'other_expenses_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'op_product_id'])->viaTable('op', ['op_other_id' => 'other_expenses_id']);
    }
}
