<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "pop".
 *
 * @property string $pop_id
 * @property string $pop_position_id
 * @property string $pop_product_id
 * @property string $pop_num
 *
 * @property Position $popPosition
 * @property Product $popProduct
 */
class Pop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pop_position_id', 'pop_product_id', 'pop_num'], 'required'],
            [['pop_position_id', 'pop_product_id'], 'integer'],
            [['pop_num'], 'number'],
            [['pop_position_id', 'pop_product_id'], 'unique', 'targetAttribute' => ['pop_position_id', 'pop_product_id'], 'message' => 'The combination of Pop Position ID and Pop Product ID has already been taken.'],
            [['pop_position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['pop_position_id' => 'position_id']],
            [['pop_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pop_product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pop_id' => 'Id',
            'pop_position_id' => 'Должность',
            'pop_product_id' => 'Продукт',
            'pop_num' => 'Число сотрудников',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPopPosition()
    {
        return $this->hasOne(Position::className(), ['position_id' => 'pop_position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPopProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'pop_product_id']);
    }
}
