<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "parameter".
 *
 * @property string $parameter_id
 * @property string $parameter_title
 * @property string $parameter_desc
 *
 * @property Papr[] $paprs
 * @property Product[] $paprProducts
 */
class Parameter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parameter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parameter_title'], 'required'],
            [['parameter_title', 'parameter_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parameter_id' => 'ID',
            'parameter_title' => 'Название параметра',
            'parameter_desc' => 'Описание параметра',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaprs()
    {
        return $this->hasMany(Papr::className(), ['papr_parameter_id' => 'parameter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaprProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'papr_product_id'])->viaTable('papr', ['papr_parameter_id' => 'parameter_id']);
    }
}
