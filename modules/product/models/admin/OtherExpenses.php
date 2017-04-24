<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "other_expenses".
 *
 * @property string $other_expenses_id
 * @property string $other_expenses_title
 * @property string $other_expenses_desc
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
            [['other_expenses_title'], 'required'],
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
            'other_expenses_title' => 'Статья затрат',
            'other_expenses_desc' => 'Описание',
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

    /**
     * @inheritdoc
     * @return OtherExpensesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OtherExpensesQuery(get_called_class());
    }
}
