<?php

namespace app\modules\product\models\admin;

/**
 * This is the ActiveQuery class for [[Mr]].
 *
 * @see Mr
 */
class MrQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Mr[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Mr|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
