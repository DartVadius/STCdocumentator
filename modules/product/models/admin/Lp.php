<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "lp".
 *
 * @property string $lp_id
 * @property string $lp_loss_id
 * @property string $lp_product_id
 * @property string $lp_percentage
 *
 * @property Loss $lpLoss
 * @property Product $lpProduct
 */
class Lp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lp_loss_id', 'lp_product_id', 'lp_percentage'], 'required'],
            [['lp_loss_id', 'lp_product_id'], 'integer'],
            [['lp_percentage'], 'number'],
            [['lp_loss_id', 'lp_product_id'], 'unique', 'targetAttribute' => ['lp_loss_id', 'lp_product_id'], 'message' => 'The combination of Lp Loss ID and Lp Product ID has already been taken.'],
            [['lp_loss_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loss::className(), 'targetAttribute' => ['lp_loss_id' => 'loss_id']],
            [['lp_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['lp_product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lp_id' => 'Id',
            'lp_loss_id' => 'Потери',
            'lp_product_id' => 'Продукт',
            'lp_percentage' => '%',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLpLoss()
    {
        return $this->hasOne(Loss::className(), ['loss_id' => 'lp_loss_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLpProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'lp_product_id']);
    }

    /**
     * @inheritdoc
     * @return LpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LpQuery(get_called_class());
    }
}
