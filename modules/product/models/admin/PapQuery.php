<?php

namespace app\modules\product\models\admin;

/**
 * This is the ActiveQuery class for [[Pap]].
 *
 * @see Pap
 */
class PapQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Pap[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pap|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
