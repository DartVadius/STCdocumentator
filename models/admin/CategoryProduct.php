<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "category_product".
 *
 * @property string $category_product_id
 * @property string $category_product_title
 * @property string $category_product_desc
 * @property string $category_product_img
 *
 * @property Product[] $products
 */
class CategoryProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_product_title'], 'required'],
            [['category_product_title', 'category_product_desc', 'category_product_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_product_id' => 'ID',
            'category_product_title' => 'Название Категории',
            'category_product_desc' => 'Описание Категории',
            'category_product_img' => 'Картинка Категории',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_category_id' => 'category_product_id']);
    }

    /**
     * @inheritdoc
     * @return CategoryProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryProductQuery(get_called_class());
    }
}
