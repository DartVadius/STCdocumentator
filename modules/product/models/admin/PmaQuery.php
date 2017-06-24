<?php

namespace app\modules\product\models\admin;

/**
 * This is the ActiveQuery class for [[Pma]].
 *
 * @see Pma
 */
class PmaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Pma[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pma|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
