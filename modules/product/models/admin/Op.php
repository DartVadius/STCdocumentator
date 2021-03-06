<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "op".
 *
 * @property string $op_id
 * @property string $op_other_id
 * @property string $op_product_id
 * @property string $op_cost_hour
 *
 * @property OtherExpenses $opOther
 * @property Product $opProduct
 */
class Op extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'op';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['op_other_id', 'op_product_id', 'op_cost_hour'], 'required'],
            [['op_other_id', 'op_product_id'], 'integer'],
            [['op_cost_hour'], 'number'],
            [['op_other_id', 'op_product_id'], 'unique', 'targetAttribute' => ['op_other_id', 'op_product_id'], 'message' => 'The combination of Op Other ID and Op Product ID has already been taken.'],
            [['op_other_id'], 'exist', 'skipOnError' => true, 'targetClass' => OtherExpenses::className(), 'targetAttribute' => ['op_other_id' => 'other_expenses_id']],
            [['op_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['op_product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'op_id' => 'ID',
            'op_other_id' => 'Статья затрат',
            'op_product_id' => 'Продукт',
            'op_cost_hour' => 'грн/час',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpOther()
    {
        return $this->hasOne(OtherExpenses::className(), ['other_expenses_id' => 'op_other_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'op_product_id']);
    }

    /**
     * @inheritdoc
     * @return OpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OpQuery(get_called_class());
    }
}
