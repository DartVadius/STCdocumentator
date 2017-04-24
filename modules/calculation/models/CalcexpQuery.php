<?php

namespace app\modules\calculation\models;

/**
 * This is the ActiveQuery class for [[Calcexp]].
 *
 * @see Calcexp
 */
class CalcexpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Calcexp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Calcexp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
