<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "recipe".
 *
 * @property string $recipe_id
 * @property string $recipe_title
 * @property string $recipe_note
 * @property string $recipe_date
 * @property string $recipe_update
 * @property integer $recipe_approved
 *
 * @property Mr[] $mrs
 * @property Material[] $mrMaterials
 * @property Product[] $products
 */
class Recipe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recipe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recipe_title', 'recipe_date', 'recipe_update', 'quantity_by_hour'], 'required'],
            [['recipe_note'], 'string'],
            [['recipe_date', 'recipe_update'], 'safe'],
            [['recipe_approved'], 'integer'],
            [['recipe_title'], 'string', 'max' => 255],
            [['quantity_by_hour'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recipe_id' => 'ID',
            'recipe_title' => 'Название Рецептуры',
            'recipe_note' => 'Примечание',
            'recipe_date' => 'Дата создания',
            'recipe_update' => 'Дата редактирования',
            'recipe_approved' => 'Утверждено',
            'quantity_by_hour' => 'Выработка, кг/час',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrs()
    {
        return $this->hasMany(Mr::className(), ['mr_recipe_id' => 'recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrMaterials()
    {
        return $this->hasMany(Material::className(), ['material_id' => 'mr_material_id'])->viaTable('mr', ['mr_recipe_id' => 'recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_recipe_id' => 'recipe_id']);
    }

    /**
     * @inheritdoc
     * @return RecipeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecipeQuery(get_called_class());
    }
}
