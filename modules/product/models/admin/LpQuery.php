<?php

namespace app\modules\product\models\admin;

/**
 * This is the ActiveQuery class for [[Lp]].
 *
 * @see Lp
 */
class LpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Lp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Lp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
