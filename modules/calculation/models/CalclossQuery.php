<?php

namespace app\modules\calculation\models;

/**
 * This is the ActiveQuery class for [[Calcloss]].
 *
 * @see Calcloss
 */
class CalclossQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Calcloss[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Calcloss|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
