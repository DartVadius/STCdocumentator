<?php

namespace app\modules\product\models\admin;

/**
 * This is the ActiveQuery class for [[Loss]].
 *
 * @see Loss
 */
class LossQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Loss[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Loss|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
