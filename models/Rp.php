<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rp".
 *
 * @property string $rp_id
 * @property string $rp_recipe_id
 * @property string $rp_product_id
 * @property string $rp_weight
 * @property string $rp_unit_id
 *
 * @property Product $rpProduct
 * @property Recipe $rpRecipe
 * @property Unit $rpUnit
 */
class Rp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rp_recipe_id', 'rp_product_id', 'rp_weight', 'rp_unit_id'], 'required'],
            [['rp_recipe_id', 'rp_product_id', 'rp_unit_id'], 'integer'],
            [['rp_weight'], 'number'],
            [['rp_recipe_id', 'rp_product_id'], 'unique', 'targetAttribute' => ['rp_recipe_id', 'rp_product_id'], 'message' => 'The combination of Rp Recipe ID and Rp Product ID has already been taken.'],
            [['rp_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['rp_product_id' => 'product_id']],
            [['rp_recipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::className(), 'targetAttribute' => ['rp_recipe_id' => 'recipe_id']],
            [['rp_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['rp_unit_id' => 'unit_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rp_id' => 'Rp ID',
            'rp_recipe_id' => 'Rp Recipe ID',
            'rp_product_id' => 'Rp Product ID',
            'rp_weight' => 'Rp Weight',
            'rp_unit_id' => 'Rp Unit ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRpProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'rp_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRpRecipe()
    {
        return $this->hasOne(Recipe::className(), ['recipe_id' => 'rp_recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRpUnit()
    {
        return $this->hasOne(Unit::className(), ['unit_id' => 'rp_unit_id']);
    }
}
