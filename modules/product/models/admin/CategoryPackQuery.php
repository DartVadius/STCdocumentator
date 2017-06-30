<?php

namespace app\modules\product\models\admin;

/**
 * This is the ActiveQuery class for [[CategoryPack]].
 *
 * @see CategoryPack
 */
class CategoryPackQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CategoryPack[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CategoryPack|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
