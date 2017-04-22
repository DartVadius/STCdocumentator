<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "solution".
 *
 * @property string $solution_id
 * @property string $solution_title
 * @property string $solution_desc
 *
 * @property Sp[] $sps
 * @property Product[] $spProducts
 */
class Solution extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'solution';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['solution_title'], 'required'],
            [['solution_title'], 'string', 'max' => 255],
            [['solution_desc'], 'string', 'max' => 15000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'solution_id' => 'ID',
            'solution_title' => 'Название Решения',
            'solution_desc' => 'Описание Решения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSps() {
        return $this->hasMany(Sp::className(), ['sp_solution_id' => 'solution_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpProducts() {
        return $this->hasMany(Product::className(), ['product_id' => 'sp_product_id'])->viaTable('sp', ['sp_solution_id' => 'solution_id']);
    }

    /**
     * @inheritdoc 
     * @return SolutionQuery the active query used by this AR class. 
     */
    public static function find() {
        return new SolutionQuery(get_called_class());
    }

}
