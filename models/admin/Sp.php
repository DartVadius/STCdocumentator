<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "sp".
 *
 * @property string $sp_id
 * @property string $sp_solution_id
 * @property string $sp_product_id
 *
 * @property Product $spProduct
 * @property Solution $spSolution
 */
class Sp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sp_solution_id', 'sp_product_id'], 'required'],
            [['sp_solution_id', 'sp_product_id'], 'integer'],
            [['sp_solution_id', 'sp_product_id'], 'unique', 'targetAttribute' => ['sp_solution_id', 'sp_product_id'], 'message' => 'The combination of Sp Solution ID and Sp Product ID has already been taken.'],
            [['sp_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['sp_product_id' => 'product_id']],
            [['sp_solution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solution::className(), 'targetAttribute' => ['sp_solution_id' => 'solution_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sp_id' => 'Sp ID',
            'sp_solution_id' => 'Sp Solution ID',
            'sp_product_id' => 'Sp Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'sp_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpSolution()
    {
        return $this->hasOne(Solution::className(), ['solution_id' => 'sp_solution_id']);
    }
}
