<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property string $position_id
 * @property string $position_title
 * @property string $position_desc
 * @property string $position_salary_hour
 *
 * @property Pop[] $pops
 * @property Product[] $popProducts
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position_title'], 'required'],
            [['position_salary_hour'], 'number'],
            [['position_title', 'position_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'position_id' => 'Position ID',
            'position_title' => 'Position Title',
            'position_desc' => 'Position Desc',
            'position_salary_hour' => 'Position Salary Hour',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPops()
    {
        return $this->hasMany(Pop::className(), ['pop_position_id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPopProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'pop_product_id'])->viaTable('pop', ['pop_position_id' => 'position_id']);
    }
}
