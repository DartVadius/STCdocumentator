<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mr".
 *
 * @property string $mr_id
 * @property string $mr_percentage
 * @property string $mr_recipe_id
 * @property string $mr_material_id
 *
 * @property Material $mrMaterial
 * @property Recipe $mrRecipe
 */
class Mr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mr_percentage', 'mr_recipe_id', 'mr_material_id'], 'required'],
            [['mr_percentage'], 'number'],
            [['mr_recipe_id', 'mr_material_id'], 'integer'],
            [['mr_recipe_id', 'mr_material_id'], 'unique', 'targetAttribute' => ['mr_recipe_id', 'mr_material_id'], 'message' => 'The combination of Mr Recipe ID and Mr Material ID has already been taken.'],
            [['mr_material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['mr_material_id' => 'material_id']],
            [['mr_recipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::className(), 'targetAttribute' => ['mr_recipe_id' => 'recipe_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mr_id' => 'ID',
            'mr_percentage' => '%',
            'mr_recipe_id' => 'Рецептура',
            'mr_material_id' => 'Материал',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrMaterial()
    {
        return $this->hasOne(Material::className(), ['material_id' => 'mr_material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrRecipe()
    {
        return $this->hasOne(Recipe::className(), ['recipe_id' => 'mr_recipe_id']);
    }

    /**
     * @inheritdoc
     * @return MrQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MrQuery(get_called_class());
    }
}
