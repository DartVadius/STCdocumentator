<?php

namespace app\modules\calculation\models;

/**
 * This is the ActiveQuery class for [[Calcpos]].
 *
 * @see Calcpos
 */
class CalcposQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Calcpos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Calcpos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
