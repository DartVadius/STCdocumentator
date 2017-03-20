<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property string $file_id
 * @property string $file_data
 * @property string $file_product_id
 * @property string $file_title
 * @property string $file_desc
 *
 * @property Product $fileProduct
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_data', 'file_product_id', 'file_title'], 'required'],
            [['file_data'], 'string'],
            [['file_product_id'], 'integer'],
            [['file_title', 'file_desc'], 'string', 'max' => 255],
            [['file_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['file_product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'file_data' => 'File Data',
            'file_product_id' => 'File Product ID',
            'file_title' => 'File Title',
            'file_desc' => 'File Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFileProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'file_product_id']);
    }
}
