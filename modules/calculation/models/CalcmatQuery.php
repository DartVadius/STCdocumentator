<?php

namespace app\modules\calculation\models;

/**
 * This is the ActiveQuery class for [[Calcmat]].
 *
 * @see Calcmat
 */
class CalcmatQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Calcmat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Calcmat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
