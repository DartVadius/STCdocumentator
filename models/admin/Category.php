<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $category_id
 * @property string $category_title
 * @property string $category_desc
 *
 * @property Material[] $materials
 */
class Category extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['category_title'], 'required'],
            [['category_title', 'category_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'category_id' => 'ID',
            'category_title' => 'Название категории',
            'category_desc' => 'Описание категории',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials() {
        return $this->hasMany(Material::className(), ['material_category_id' => 'category_id']);
        }

    /**
     * @inheritdoc 
     * @return CategoryQuery the active query used by this AR class. 
     */
    public static function find() {
        return new CategoryQuery(get_called_class());
    }

}
