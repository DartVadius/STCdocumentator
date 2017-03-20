<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property string $material_id
 * @property string $material_title
 * @property string $materil_price
 * @property string $material_article
 * @property string $material_catrgory_id
 * @property string $material_unit_id
 *
 * @property Category $materialCatrgory
 * @property Unit $materialUnit
 * @property Mr[] $mrs
 * @property Recipe[] $mrRecipes
 * @property Pm[] $pms
 * @property Product[] $pmProducts
 */
class Material extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['materil_price', 'material_unit_id'], 'required'],
            [['materil_price'], 'number'],
            [['material_catrgory_id', 'material_unit_id'], 'integer'],
            [['material_title'], 'string', 'max' => 255],
            [['material_article'], 'string', 'max' => 12],
            [['material_catrgory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['material_catrgory_id' => 'category_id']],
            [['material_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['material_unit_id' => 'unit_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'material_id' => 'ID',
            'material_title' => 'Назавание',
            'materil_price' => 'Цена',
            'material_article' => 'Артикул',
            'material_catrgory_id' => 'ID категории',
            'material_unit_id' => 'ID единицы измерения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialCatrgory() {
        return $this->hasOne(Category::className(), ['category_id' => 'material_catrgory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialUnit() {
        return $this->hasOne(Unit::className(), ['unit_id' => 'material_unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrs() {
        return $this->hasMany(Mr::className(), ['mr_material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrRecipes() {
        return $this->hasMany(Recipe::className(), ['recipe_id' => 'mr_recipe_id'])->viaTable('mr', ['mr_material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPms() {
        return $this->hasMany(Pm::className(), ['pm_material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmProducts() {
        return $this->hasMany(Product::className(), ['product_id' => 'pm_product_id'])->viaTable('pm', ['pm_material_id' => 'material_id']);
    }

}
