<?php

namespace app\models\admin;

/**
 * This is the ActiveQuery class for [[Pop]].
 *
 * @see Pop
 */
class PopQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Pop[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pop|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
