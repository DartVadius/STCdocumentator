<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "pap".
 *
 * @property string $pap_id
 * @property string $pap_pack_id
 * @property string $pap_product_id
 * @property string $pap_capacity
 *
 * @property Pack $papPack
 * @property Product $papProduct
 */
class Pap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pap_pack_id', 'pap_product_id'], 'required'],
            [['pap_pack_id', 'pap_product_id'], 'integer'],
            [['pap_capacity'], 'number'],
            [['pap_pack_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pack::className(), 'targetAttribute' => ['pap_pack_id' => 'pack_id']],
            [['pap_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pap_product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pap_id' => 'Pap ID',
            'pap_pack_id' => 'Pap Pack ID',
            'pap_product_id' => 'Pap Product ID',
            'pap_capacity' => 'Pap Capacity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPapPack()
    {
        return $this->hasOne(Pack::className(), ['pack_id' => 'pap_pack_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPapProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'pap_product_id']);
    }
}
