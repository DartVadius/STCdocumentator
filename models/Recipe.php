<?php

namespace app\models;

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
 * @property Rp[] $rps
 * @property Product[] $rpProducts
 */
class Recipe extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'recipe';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['recipe_title', 'recipe_date', 'recipe_update'], 'required'],
            [['recipe_note'], 'string'],
            [['recipe_date', 'recipe_update'], 'safe'],
            [['recipe_approved'], 'integer'],
            [['recipe_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'recipe_id' => 'Recipe ID',
            'recipe_title' => 'Recipe Title',
            'recipe_note' => 'Recipe Note',
            'recipe_date' => 'Recipe Date',
            'recipe_update' => 'Recipe Update',
            'recipe_approved' => 'Recipe Approved',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrs() {
        return $this->hasMany(Mr::className(), ['mr_recipe_id' => 'recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrMaterials() {
        return $this->hasMany(Material::className(), ['material_id' => 'mr_material_id'])->viaTable('mr', ['mr_recipe_id' => 'recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRps() {
        return $this->hasMany(Rp::className(), ['rp_recipe_id' => 'recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRpProducts() {
        return $this->hasMany(Product::className(), ['product_id' => 'rp_product_id'])->viaTable('rp', ['rp_recipe_id' => 'recipe_id']);
    }

}
