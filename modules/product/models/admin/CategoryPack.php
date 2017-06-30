<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "category_pack".
 *
 * @property string $category_pack_id
 * @property string $category_pack_title
 * @property string $category_pack_desc
 */
class CategoryPack extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_pack';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_pack_title'], 'required'],
            [['category_pack_title', 'category_pack_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_pack_id' => 'Id',
            'category_pack_title' => 'Название',
            'category_pack_desc' => 'Примечание',
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryPackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryPackQuery(get_called_class());
    }
}
