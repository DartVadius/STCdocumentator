<?php

namespace app\models\admin;

/**
 * This is the ActiveQuery class for [[Papr]].
 *
 * @see Papr
 */
class PaprQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Papr[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Papr|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
