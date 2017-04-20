<?php

namespace app\models\admin;

/**
 * This is the ActiveQuery class for [[Op]].
 *
 * @see Op
 */
class OpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Op[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Op|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
