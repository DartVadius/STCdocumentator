<?php

namespace app\modules\product\models\admin;

/**
 * This is the ActiveQuery class for [[Pm]].
 *
 * @see Pm
 */
class PmQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Pm[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pm|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
