<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "loss".
 *
 * @property string $loss_id
 * @property string $loss_title
 * @property string $loss_desc
 *
 * @property Lp[] $lps
 * @property Product[] $lpProducts
 */
class Loss extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loss';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loss_title'], 'required'],
            [['loss_title', 'loss_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loss_id' => 'ID',
            'loss_title' => 'Название',
            'loss_desc' => 'Примечание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLps()
    {
        return $this->hasMany(Lp::className(), ['lp_loss_id' => 'loss_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLpProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'lp_product_id'])->viaTable('lp', ['lp_loss_id' => 'loss_id']);
    }

    /**
     * @inheritdoc
     * @return LossQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LossQuery(get_called_class());
    }
}
