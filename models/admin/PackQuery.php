<?php

namespace app\models\admin;

/**
 * This is the ActiveQuery class for [[Pack]].
 *
 * @see Pack
 */
class PackQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Pack[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pack|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
