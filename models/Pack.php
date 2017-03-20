<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pack".
 *
 * @property string $pack_id
 * @property string $pack_title
 * @property string $pack_desc
 * @property string $pack_price
 *
 * @property Pap[] $paps
 */
class Pack extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pack';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pack_id', 'pack_title', 'pack_price'], 'required'],
            [['pack_id'], 'integer'],
            [['pack_price'], 'number'],
            [['pack_title', 'pack_desc'], 'string', 'max' => 255],
            [['pack_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pack_id' => 'Pack ID',
            'pack_title' => 'Pack Title',
            'pack_desc' => 'Pack Desc',
            'pack_price' => 'Pack Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaps()
    {
        return $this->hasMany(Pap::className(), ['pap_pack_id' => 'pack_id']);
    }
}
