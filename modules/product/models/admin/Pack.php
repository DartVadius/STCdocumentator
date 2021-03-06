<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "pack".
 *
 * @property string $pack_id
 * @property string $pack_title
 * @property string $pack_desc
 * @property string $pack_price
 * @property string $pack_weight
 * @property string $pack_category_id
 * @property string $pack_delivery
 *
 * @property CategoryPack $packCategory
 * @property Pap[] $paps
 */
class Pack extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'pack';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['pack_title', 'pack_price'], 'required'],
            [['pack_price', 'pack_weight', 'pack_delivery'], 'number'],
            [['buying_date'], 'date', 'format' => 'yyyy-mm-dd'],
            [['pack_category_id'], 'integer'],
            [['pack_title', 'pack_desc'], 'string', 'max' => 255],
            [['pack_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryPack::className(), 'targetAttribute' => ['pack_category_id' => 'category_pack_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'pack_id' => 'ID',
            'pack_title' => 'Название упаковки',
            'pack_desc' => 'Описание',
            'pack_price' => 'Цена',
            'pack_weight' => 'Вес упаковки, гр',
            'pack_category_id' => 'Категория',
            'pack_delivery' => 'Доставка',
            'buying_date' => 'Дата закупки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaps() {
        return $this->hasMany(Pap::className(), ['pap_pack_id' => 'pack_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPapsProducts() {
        return $this->hasMany(Product::className(), ['product_id' => 'pap_product_id'])->viaTable('pap', ['pap_pack_id' => 'pack_id']);
    }

    public function getPackCategory() {
        return $this->hasOne(CategoryPack::className(), ['category_pack_id' => 'pack_category_id']);
    }

    /**
     * @inheritdoc
     * @return PackQuery the active query used by this AR class.
     */
    public static function find() {
        return new PackQuery(get_called_class());
    }

}
